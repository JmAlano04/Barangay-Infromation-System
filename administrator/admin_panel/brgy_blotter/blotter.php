<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Blotter</title>
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
            color:#FCFAEE;
            font-family:"sub_text";
        }
        .limit-selector{
            height:max-content;
            width:100%;
            margin-left:0px;
            margin-top:30px;
            margin-bottom:50px;
        }
        .limit-selector form{
            padding:0px;
            margin-top:0px;
        }
        .filter-container, .filter-form {
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
            font-size: 0.9rem;
            margin-left:10px;
            margin-top:-10px;
        }
        .filter-group select, .filter-group input {
            padding: 0px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: "sub_text";
            font-size:0.9rem;
        }
        .filter-btn, .reset-btn, .export-btn {
            padding: 5px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: "sub_text";
            margin-top:-10px;
        }
        .filter-btn { background-color: rgb(93,185,255); color:white; }
        .filter-btn:hover { background-color: rgb(86, 202, 255); }
        .reset-btn { background-color: rgb(93,185,255); color:white; }
        .reset-btn:hover { background-color: rgb(94, 202, 252); }
        .export-btn { background-color: rgb(212,182,47); color:white; }
        .export-btn:hover { background-color: rgb(252, 217, 64); }
        .view-btn, .edit-btn, .delete-btn {
            padding: 3px 8px;
            margin: 2px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-family: "sub_text";
            font-size: 0.8rem;
        }
        .view-btn { background-color: #4A9D4F; color: white; }
        .edit-btn { background-color: #5DA3FF; color: white; }
        .delete-btn { background-color: #FF5D5D; color: white; }
        .view-btn:hover, .edit-btn:hover, .delete-btn:hover { opacity: 0.8; }
        @media only screen and (min-width: 1441px) {
            .table-footer { width: 110%; }
        }
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
$complainant_filter = isset($_GET['complainant_filter']) ? $_GET['complainant_filter'] : '';
$year_filter = isset($_GET['year_filter']) ? $_GET['year_filter'] : '';
$subject_filter = isset($_GET['subject_filter']) ? $_GET['subject_filter'] : '';
$status_filter = isset($_GET['status_filter']) ? $_GET['status_filter'] : '';

// Pagination
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$limit = isset($_GET['limit']) ? max(1, (int)$_GET['limit']) : 10;
$offset = ($page - 1) * $limit;

// Build filter query
$whereClause = [];
$params = [];
$types = '';

if (!empty($complainant_filter)) {
    $whereClause[] = "complainant LIKE ?";
    $params[] = "%$complainant_filter%";
    $types .= 's';
}
if (!empty($year_filter)) {
    $whereClause[] = "YEAR(date) = ?";
    $params[] = $year_filter;
    $types .= 's';
}
if (!empty($subject_filter)) {
    $whereClause[] = "subject = ?";
    $params[] = $subject_filter;
    $types .= 's';
}
if (!empty($status_filter)) {
    $whereClause[] = "status = ?";
    $params[] = $status_filter;
    $types .= 's'; 
}

$whereSQL = !empty($whereClause) ? 'WHERE ' . implode(' AND ', $whereClause) : '';

// Count total rows
$countQuery = "SELECT COUNT(*) AS total FROM barangay_blotter $whereSQL";
$countStmt = $conn->prepare($countQuery);
if (!empty($params)) { $countStmt->bind_param($types, ...$params); }
$countStmt->execute();
$totalRows = $countStmt->get_result()->fetch_assoc()['total'];
$totalPages = max(1, ceil($totalRows / $limit));

// Fetch data
$sql = "SELECT * FROM barangay_blotter $whereSQL ORDER BY id DESC LIMIT ? OFFSET ?";
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

// Dropdowns
$years = $conn->query("SELECT DISTINCT YEAR(date) as year FROM barangay_blotter WHERE date IS NOT NULL ORDER BY year DESC");
$subjects = $conn->query("SELECT DISTINCT subject FROM barangay_blotter WHERE subject IS NOT NULL ORDER BY subject");

$startRow = ($page - 1) * $limit + 1;
$endRow = min($page * $limit, $totalRows);
?>

<div class="limit-selector">
    <form method="GET" action="" class="filter-form">
        <div class="filter-group">
            <label for="year_filter">Year:</label>
            <select name="year_filter" id="year_filter">
                <option value="">All</option>
                <?php while ($row = $years->fetch_assoc()): ?>
                    <option value="<?= $row['year']; ?>" <?= $year_filter == $row['year'] ? 'selected' : ''; ?>><?= $row['year']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="filter-group">
            <label for="subject_filter">Subject:</label>
            <select name="subject_filter" id="subject_filter">
                <option value="">All</option>
                <?php while ($row = $subjects->fetch_assoc()): ?>
                    <option value="<?= $row['subject']; ?>" <?= $subject_filter == $row['subject'] ? 'selected' : ''; ?>><?= $row['subject']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="filter-group">
            <label for="status_filter">Status:</label>
            <select name="status_filter" id="status_filter">
                <option value="">All</option>
                <option value="Active" <?= $status_filter == 'Active' ? 'selected' : ''; ?>>Active</option>
                <option value="Settled" <?= $status_filter == 'Settled' ? 'selected' : ''; ?>>Settled</option>
                <option value="Scheduled" <?= $status_filter == 'Scheduled' ? 'selected' : ''; ?>>Scheduled</option>
            </select>
        </div>

        <input type="hidden" name="page" value="1">
        <input type="hidden" name="limit" value="<?= $limit; ?>">

        <button type="submit" class="filter-btn">Filter</button>
        <button type="button" class="reset-btn" onclick="window.location.href='?page=1&limit=<?= $limit; ?>'">Reset</button>
        <button type="button" class="export-btn" id="export-btn">Export</button>
    </form>
</div>

<table>
    <caption>Barangay Blotter List</caption>
    <tr>
        <th>Complainant</th>
        <th>Contact No.</th>
        <th>Date/Time Filed</th>
        <th>Subject</th>
        <th>Remarks</th>    
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr class="table_hover">
        <td><?php echo $row["complainant"]; ?></td>
                <td><?php echo $row["cell_no"]; ?></td>
                <td hidden><?php echo $row["subject"]; ?></td>
                <td hidden><?php echo $row["place"]; ?></td>
                <td hidden><?php echo $row["tanod"]; ?></td>
                <td hidden><?php echo $row["time"]; ?></td>
                <td hidden><?php echo $row["status"]; ?></td>
                <td hidden><?php echo $row["type"]; ?></td>
                <td hidden><?php echo $row["age"]; ?></td>
                <td hidden><?php echo $row["address_complainant"]; ?></td>
                <td hidden><?php echo $row["complained_name"]; ?></td>
                <td hidden><?php echo $row["add_complained_name"]; ?></td>
                <td hidden><?php echo $row["details_reason"]; ?></td>
                <td hidden><?php echo $row["date"]; ?></td>
                <td hidden><?php echo $row["remarks"]; ?></td>
                <td><?php echo $row["date"] . " / " . $row["time"]; ?></td>
                <td><?php echo $row["subject"]; ?></td>
                 <td><?php echo $row["remarks"]; ?></td>
                <td>
                    <?php 
                    $status = $row["status"];
                    if ($status == "Active") {
                        echo "<p style='color:red;'>Active</p>";
                    } elseif ($status == "Settled") {
                        echo "<p style='color:green;'>Settled</p>";
                    } elseif ($status == "Scheduled") {
                        echo "<p style='color:orange;'>Scheduled</p>";
                    }elseif ($status == "Pending") {
                        echo "<p style='color:#53252d;'>Pending</p>";
                    }elseif ($status == "Rejected") {
                        echo "<p style='color:rgb(201, 114, 0);'>Rejected</p>";
                    }
                    ?>
                </td>
        <td>
          <div id="form_up_del_official">
                        <button id="view_resident_btn" class="view_btn" data-id="<?php echo $row["id"]; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                        </button>
                        <button id="update_official_btn" class="update_btn" data-id="<?php echo $row["id"]; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg>
                        </button>
                        <button id="delete_official_btn" class="delete_btn_blotter" data-id="<?php echo $row["id"]; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                        </button>
                    </div>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<div class="table-footer">
    <div class="total-count">Total Blotter Records: <?= $totalRows; ?></div>
    <div class="pagination-info">
        Showing <?= $startRow; ?> to <?= $endRow; ?> of <?= $totalRows; ?> entries
    </div>
</div>

<?php $conn->close(); ?>
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
<div id="edit-modal_blotter" class="edit-modal_blotter">
    <div class="edit-modal-content_blotter">
        <span onclick="this.parentElement.parentElement.style.display='none';" class="update-close-btn">&times;</span>
        <?php include("update_temp.php");?> 
    </div>
</div>

<!-- MODAL VIEW -->
<div id="view-modal_blotter" class="view-modal_blotter">
    <div class="view-modal-content_blotter">
        <span onclick="this.parentElement.parentElement.style.display='none';" class="update-close-btn">&times;</span>
        <?php include('view_temp.php')?> 
    </div>
</div>


<script>
// Export functionality
document.getElementById('export-btn').addEventListener('click', function() {
    const yearFilter = document.getElementById('year_filter').value;
    const subjectFilter = document.getElementById('subject_filter').value;
    const statusFilter = document.getElementById('status_filter').value;

    const form = document.createElement('form');
    form.method = 'POST';
    form.action = './brgy_blotter/export_blotter.php';

    function addHiddenInput(name, value) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = value;
        form.appendChild(input);
    }

    addHiddenInput('year_filter', yearFilter);
    addHiddenInput('subject_filter', subjectFilter);
    addHiddenInput('status_filter', statusFilter);

    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form);
});
</script>

</body>
</html>
