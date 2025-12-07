<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Table</title>
    <style>
        @font-face {
            font-family: "main_text";
            src: url(../../../asset/font/Syncopate/Syncopate-Regular.ttf);
        }
        @font-face {
            font-family: "sub_text";
            src: url(../../../asset/font/Afacad_Flux/AfacadFlux-VariableFont_slnt,wght.ttf);
        }
        .table-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            padding: 10px;
            margin-left:0px;
            background-color:#4A9D4f;
            border-radius: 4px;
            width: 100%;
            transition:all 0.5s ease;
        }
        .sidebar.active ~ .dashboard_content .table-footer{
            width: 92vw;
            margin-left:-210px;
        }
        .total-count {
            font-weight: 400;
            color:#FCFAEE;
            font-family:"sub_text";
            letter-spacing:2px;
        }
        .pagination-info {
            color: #666;
            color:#FCFAEE;
            font-family:"sub_text";
        }
        .limit-selector {
            height:max-content;
            width:100%;
  
            margin-left:0px;
            margin-bottom:0px;
            margin-top:15px;
            margin-bottom:0px;
        }
        .limit-selector form {
            padding:0px;
            margin-top:0px;
        }
        /* Filter styles */
        .filter-container {
            margin-bottom: 15px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
        }
        .filter-form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
        }
        .filter-group {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .filter-group label {
            font-family: "sub_text";
            font-size: 1.1rem;
            margin-left:0px;
            margin-top:0px;
        }
        .filter-group select, 
        .filter-group input {
            padding: 0px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: "sub_text";
            margin-top:10px;
        }
        .filter-btn {
            padding: 5px 15px;
            background-color: rgb(93,185,255);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: "sub_text";
            margin-top:-5px;
        }
        .filter-btn:hover {
            background-color: rgb(86, 202, 255);
        }
        .reset-btn {
            padding: 5px 15px;
            background-color: rgb(93,185,255);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top:-5px;
            font-family: "sub_text";
        }
        .reset-btn:hover {
            background-color: rgb(94, 202, 252);
        }
        .export-btn {
            padding: 5px 15px;
            background-color: rgb(212,182,47);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: "sub_text";
            margin-top:-5px;
        }
        .export-btn:hover {
            background-color: rgb(252, 217, 64);
        }
        @media only screen and (min-width: 1441px) {
            .table-footer {
                display: flex;
                justify-content: space-between;
                margin-top: 10px;
                padding: 10px;
                margin-left:0px;
                background-color:#4A9D4f;
                border-radius: 4px;
                width: 110%;
            }
        }
             /* SCROLL BAR */
             .view-modal_blotter::-webkit-scrollbar,
        .delete-modal::-webkit-scrollbar,
        .modal_import::-webkit-scrollbar,
        .edit-modal_blotter::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body>

<?php 
require("../../database/conn_db.php");

// Get filter parameters from query string
$name_filter = isset($_GET['name_filter']) ? $_GET['name_filter'] : '';
$year_filter = isset($_GET['year_filter']) ? $_GET['year_filter'] : '';
$status_filter = isset($_GET['status_filter']) ? $_GET['status_filter'] : '';
$vehicle_filter = isset($_GET['vehicle_filter']) ? $_GET['vehicle_filter'] : '';

// Get the current page and limit from query parameters, set defaults if not provided
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$limit = isset($_GET['limit']) ? max(1, (int)$_GET['limit']) : 10;
$offset = ($page - 1) * $limit;

// Build the base query with filters
$whereClause = [];
$params = [];
$types = '';

if (!empty($name_filter)) {
    $whereClause[] = "name_involve LIKE ?";
    $params[] = "%$name_filter%";
    $types .= 's';
}

if (!empty($year_filter)) {
    $whereClause[] = "YEAR(date) = ?";
    $params[] = $year_filter;
    $types .= 's';
}

if (!empty($status_filter)) {
    $whereClause[] = "status = ?";
    $params[] = $status_filter;
    $types .= 's';
}

if (!empty($vehicle_filter)) {
    $whereClause[] = "vehicle LIKE ?";
    $params[] = "%$vehicle_filter%";
    $types .= 's';
}

$whereSQL = !empty($whereClause) ? 'WHERE ' . implode(' AND ', $whereClause) : '';

// Get the total number of records with filters applied
$countQuery = "SELECT COUNT(*) AS total FROM barangay_incident $whereSQL";
$countStmt = $conn->prepare($countQuery);

if (!empty($params)) {
    $countStmt->bind_param($types, ...$params);
}

$countStmt->execute();
$countResult = $countStmt->get_result();
$totalRows = $countResult->fetch_assoc()['total'];
$totalPages = max(1, ceil($totalRows / $limit));

// Calculate the range being displayed
$startRow = ($page - 1) * $limit + 1;
$endRow = min($page * $limit, $totalRows);

// Fetch the records based on the current page, limit and filters
$sql = "SELECT * FROM barangay_incident $whereSQL ORDER BY id DESC LIMIT ? OFFSET ?";
$stmt = $conn->prepare($sql);

if (!empty($params)) {
    $params[] = $limit;
    $params[] = $offset;
    $types .= 'ii';
    $stmt->bind_param($types, ...$params);
} else {
    $stmt->bind_param('ii', $limit, $offset);
}

$stmt->execute();
$result = $stmt->get_result();

// Get unique values for dropdown filters
$years = $conn->query("SELECT DISTINCT YEAR(date) as year FROM barangay_incident WHERE date IS NOT NULL ORDER BY year DESC");
$statuses = $conn->query("SELECT DISTINCT status FROM barangay_incident WHERE status IS NOT NULL ORDER BY status");
$vehicles = $conn->query("SELECT DISTINCT vehicle FROM barangay_incident WHERE vehicle IS NOT NULL ORDER BY vehicle");

if ($result->num_rows > 0) {?>

    <!-- Filter Form -->
    <div class="limit-selector">
        <form method="GET" action="" class="filter-form">
            
            <div class="filter-group">
                <label for="year_filter">Year:</label>
                <select name="year_filter" id="year_filter">
                    <option value="">All Years</option>
                    <?php while ($row = $years->fetch_assoc()): ?>
                        <option value="<?php echo $row['year']; ?>" 
                            <?php echo $year_filter == $row['year'] ? 'selected' : ''; ?>>
                            <?php echo $row['year']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            
            <div class="filter-group">
                <label for="vehicle_filter">Vehicle:</label>
                <select name="vehicle_filter" id="vehicle_filter">
                    <option value="">All Vehicles</option>
                    <?php while ($row = $vehicles->fetch_assoc()): ?>
                        <option value="<?php echo $row['vehicle']; ?>" 
                            <?php echo $vehicle_filter == $row['vehicle'] ? 'selected' : ''; ?>>
                            <?php echo $row['vehicle']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            
            <div class="filter-group">
                <label for="status_filter">Status:</label>
                <select name="status_filter" id="status_filter">
                    <option value="">All Statuses</option>
                    <option value="Active" <?php echo $status_filter == 'Active' ? 'selected' : ''; ?>>Active</option>
                    <option value="Settled" <?php echo $status_filter == 'Settled' ? 'selected' : ''; ?>>Settled</option>
                    <option value="Scheduled" <?php echo $status_filter == 'Scheduled' ? 'selected' : ''; ?>>Scheduled</option>
                </select>
            </div>
            
            <input type="hidden" name="page" value="1"> <!-- Reset to page 1 when filtering -->
            <input type="hidden" name="limit" value="<?php echo $limit; ?>">
            
            <button type="submit" class="filter-btn"><svg style="width:8px; margin-right:5px; fill:white;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8L32 224c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8l256 0c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"/></svg>Filter</button>
            <button type="button" class="reset-btn" onclick="window.location.href='?page=1&limit=<?php echo $limit; ?>'"><svg style="width:10px; margin-right:5px; fill:white;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z"/></svg>Reset</button>
            <button type="button" class="export-btn" id="export-btn"><svg style="width:12px; margin-right:5px; fill:white;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 128-168 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l168 0 0 112c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64zM384 336l0-48 110.1 0-39-39c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l80 80c9.4 9.4 9.4 24.6 0 33.9l-80 80c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l39-39L384 336zm0-208l-128 0L256 0 384 128z"/></svg>Export</button>
        </form>
        
        <form method="GET" action="">
            <label for="limit">Rows per page:</label>
            <select name="limit" id="limit" onchange="this.form.submit()">
                <option value="10" <?php if ($limit == 10) echo 'selected'; ?>>10</option>
                <option value="20" <?php if ($limit == 20) echo 'selected'; ?>>20</option>
                <option value="50" <?php if ($limit == 50) echo 'selected'; ?>>50</option>
            </select>
            <!-- Preserve filter values when changing limit -->
            <input type="hidden" name="name_filter" value="<?php echo htmlspecialchars($name_filter); ?>">
            <input type="hidden" name="year_filter" value="<?php echo htmlspecialchars($year_filter); ?>">
            <input type="hidden" name="status_filter" value="<?php echo htmlspecialchars($status_filter); ?>">
            <input type="hidden" name="vehicle_filter" value="<?php echo htmlspecialchars($vehicle_filter); ?>">
            <input type="hidden" name="page" value="<?php echo $page; ?>">
        </form>
    </div>

    <table>
        <caption>Barangay Incident List</caption>
        <tr>
            <th>Names</th>
            <th>Address</th>
            <th>Date Happened</th>
             <th>Date/Time Filed</th>
            <th>Vehicle</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            $id = $row ["id"];
            $date = $row ["date"];
            $time = $row ["time"];
            $name_involve = $row ["name_involve"];
            $address = $row ["address"];
            $vehicle = $row ["vehicle"];
            $license = $row ["license"];
            $plate_no = $row ["plate_no"];
            $status = $row ["status"];
            $cause_incident = $row ["cause_incident"];
            $date_filed = $row["date_filed"];
        ?>
            <tr class="table_hover">
                <td hidden><?php echo $date ?></td>
                <td hidden><?php echo $time ?></td>
                <td hidden><?php echo $name_involve ?></td>
                <td hidden><?php echo $address ?></td>
                <td hidden><?php echo $vehicle ?></td>
                <td hidden><?php echo $license ?></td>
                <td hidden><?php echo $plate_no ?></td>
                <td hidden><?php echo $cause_incident ?></td>
                <td hidden><?php echo $status ?></td>

                <td><?php echo $name_involve ?></td>
                <td><?php echo $address ?></td>
                <td><?php echo $date  ?></td>
                  <td><?php echo $date_filed  ?></td>
                <td><?php echo $vehicle ?></td>
                
                <td><?php 
                    if($status == "Active"){
                        echo "<p style='color:red;'>Active</p>";
                    }elseif($status == "Settled"){
                        echo "<p style='color:green;'>Settled</p>";
                    }
                    elseif($status == "Schedule"){
                        echo "<p style='color:orange;'>Schedule</p>";
                    }
                ?></td>
                <td>
                    <div id="form_up_del_official">
                        <button id="view_resident_btn" class="view_btn" data-id=<?php echo $row["id"] ?>>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                        </button>
                        <button id="update_official_btn" class="update_btn" data-id=<?php echo $row["id"] ?>>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg>
                        </button>
                        <button id="delete_official_btn" class="delete_btn_blotter" data-id=<?php echo $row["id"] ?>>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                        </button>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </table>

    <!-- Table Footer -->
    <div class="table-footer">
        <div class="total-count">Total Incidents: <?php echo $totalRows; ?></div>
        <div class="pagination-info">
            Showing <?php echo $startRow; ?> to <?php echo $endRow; ?> of <?php echo $totalRows; ?> entries
        </div>
    </div>

    <!-- Pagination Controls -->
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo $page - 1; ?>&limit=<?php echo $limit; ?>&name_filter=<?php echo urlencode($name_filter); ?>&year_filter=<?php echo urlencode($year_filter); ?>&status_filter=<?php echo urlencode($status_filter); ?>&vehicle_filter=<?php echo urlencode($vehicle_filter); ?>">Previous</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?php echo $i; ?>&limit=<?php echo $limit; ?>&name_filter=<?php echo urlencode($name_filter); ?>&year_filter=<?php echo urlencode($year_filter); ?>&status_filter=<?php echo urlencode($status_filter); ?>&vehicle_filter=<?php echo urlencode($vehicle_filter); ?>" 
               class="<?php echo $i == $page ? 'active' : ''; ?>">
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <a href="?page=<?php echo $page + 1; ?>&limit=<?php echo $limit; ?>&name_filter=<?php echo urlencode($name_filter); ?>&year_filter=<?php echo urlencode($year_filter); ?>&status_filter=<?php echo urlencode($status_filter); ?>&vehicle_filter=<?php echo urlencode($vehicle_filter); ?>">Next</a>
        <?php endif; ?>
    </div>

<?php 
} else { 
?>
<style>
    .Data-not-found h1 {
        color: rgba(255, 0, 0, 0.37);
        position: absolute;
        top: 300px;
        left: 25%;
        font-size: 3.5rem;
    }
</style>
<div class="Data-not-found">
    <h1>DATA NOT FOUND</h1>
</div>
<?php
}

// Close the database connection
mysqli_close($conn);
?>

<!-- MODAL DELETE -->
<div id="delete-modal" class="delete-modal">
    <div class="delete-modal-content">
        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg></span>
        <h2>Delete Confirmation</h2>
        <h3>Are you sure you want to delete this record!</h3>
        <div class="div-delete">   
            <button id="confirm-delete" class="btn-delete">Delete</button>
            <button id="cancel-delete" class="btn-delete">Cancel</button>
        </div>
    </div>
</div>

<!-- MODAL UPDATE -->
<div id="edit-modal_update" class="edit-modal_blotter">
    <div class="edit-modal-content_blotter">
        <span onclick="this.parentElement.parentElement.style.display='none';" class="update-close-btn">&times;</span>
        <?php include("update_temp.php");?> 
    </div>
</div>

<!-- MODAL VIEW -->
<div id="view-modal" class="view-modal_blotter">
    <div class="view-modal-content_blotter">
        <span onclick="this.parentElement.parentElement.style.display='none';" class="update-close-btn">&times;</span>
        <?php include('view_temp.php')?> 
    </div>
</div>

<script>
// Export functionality
document.getElementById('export-btn').addEventListener('click', function() {
    // Get all the current filter values
    const nameFilter = document.querySelector('input[name="name_filter"]').value;
    const yearFilter = document.querySelector('select[name="year_filter"]').value;
    const statusFilter = document.querySelector('select[name="status_filter"]').value;
    const vehicleFilter = document.querySelector('select[name="vehicle_filter"]').value;
    
    // Create a form with all filter parameters
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = './incident_folder/export_incident.php';
    
    // Add hidden inputs for each filter
    function addHiddenInput(name, value) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = value;
        form.appendChild(input);
    }
    
    addHiddenInput('name_filter', nameFilter);
    addHiddenInput('year_filter', yearFilter);
    addHiddenInput('status_filter', statusFilter);
    addHiddenInput('vehicle_filter', vehicleFilter);
    
    // Submit the form
    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form);
});
</script>

</body>
</html>