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
            margin-left:40px;
            background-color:#4A9D4f;
            border-radius: 4px;
            width: 93%;
        }
        .sidebar.active ~ .dashboard_content .table-footer{
            width: 92vw;
            margin-left:-180px;
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
        .filter-container {
            margin-bottom: 15px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
            margin-top:200px;
       
        }
        .limit-selector{
            display:block;
        }
         .form_limit{
            display:flex;
            
            margin-left: -10px;
        }
        .form_limit form {
            display:flex;
        }
        .filter-group {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .filter-group label {
            font-family: "sub_text";
            font-size: 14px;
            margin-left:10px;
        }
        .filter-group select, 
        .filter-group input {
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: "sub_text";
        }
        .filter-group input {
            min-width: 150px;
        }
        .filter-btn {
            padding: 5px 15px;
            background-color:rgb(93,185,255);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: "sub_text";
            margin-left:20px;
        }
        .filter-btn:hover {
            background-color: rgb(86, 202, 255);
        }
        .reset-btn {
            padding: 5px 15px;
            background-color:rgb(93,185,255);
            color: #333;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: "sub_text";
            color:white;
            margin-left:20px;
        }
        .reset-btn:hover {
            background-color: rgb(94, 202, 252);
        }
        @media only screen and (min-width: 1441px) {
            .table-footer{
                display: flex;
            justify-content: space-between;
            margin-top: 10px;
            padding: 10px;
            margin-left:40px;
            background-color:#4A9D4f;
            border-radius: 4px;
            width: 96%;
            }
        }
        .export-btn {
    padding: 5px 15px;
    background-color: rgb(212,182,47);
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-family: "sub_text";
    margin-left: 20px;
}
.export-btn:hover {
    background-color: rgb(252, 217, 64);
}
      /* SCROLL BAR */
      .edit-modal::-webkit-scrollbar,
        .delete-modal::-webkit-scrollbar,
        .modal_import::-webkit-scrollbar,
        .modal::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body>
<?php 
require("../../database/conn_db.php");

// Get filter parameters from query string
$name_filter = isset($_GET['name_filter']) ? $_GET['name_filter'] : '';
$contact_filter = isset($_GET['contact_filter']) ? $_GET['contact_filter'] : '';
$age_filter = isset($_GET['age_filter']) ? $_GET['age_filter'] : '';
$civil_status_filter = isset($_GET['civil_status_filter']) ? $_GET['civil_status_filter'] : '';
$gender_filter = isset($_GET['gender_filter']) ? $_GET['gender_filter'] : '';
$voter_filter = isset($_GET['voter_filter']) ? $_GET['voter_filter'] : '';

// Get the current page and limit from query parameters, set defaults if not provided
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$limit = isset($_GET['limit']) ? max(1, (int)$_GET['limit']) : 10;
$offset = ($page - 1) * $limit;

// Build the base query with filters
$whereClause = [];
$params = [];
$types = '';

if (!empty($name_filter)) {
    $whereClause[] = "(firstname LIKE ? OR middlename LIKE ? OR lastname LIKE ?)";
    $params[] = "%$name_filter%";
    $params[] = "%$name_filter%";
    $params[] = "%$name_filter%";
    $types .= 'sss';
}

if (!empty($contact_filter)) {
    $whereClause[] = "contact_no LIKE ?";
    $params[] = "%$contact_filter%";
    $types .= 's';
}

if (!empty($age_filter)) {
    $whereClause[] = "age = ?";
    $params[] = $age_filter;
    $types .= 'i';
}

if (!empty($civil_status_filter)) {
    $whereClause[] = "civil_status = ?";
    $params[] = $civil_status_filter;
    $types .= 's';
}

if (!empty($gender_filter)) {
    $whereClause[] = "gender = ?";
    $params[] = $gender_filter;
    $types .= 's';
}

if (!empty($voter_filter)) {
    $whereClause[] = "voter_status = ?";
    $params[] = $voter_filter;
    $types .= 's';
}

$whereSQL = !empty($whereClause) ? 'WHERE ' . implode(' AND ', $whereClause) : '';

// Get the total number of records with filters applied
$countQuery = "SELECT COUNT(*) AS total FROM barangay_resident $whereSQL";
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
$sql = "SELECT * FROM barangay_resident $whereSQL ORDER BY id DESC LIMIT ? OFFSET ?";
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
$civilStatuses = $conn->query("SELECT DISTINCT civil_status FROM barangay_resident WHERE civil_status IS NOT NULL ORDER BY civil_status");
$genders = $conn->query("SELECT DISTINCT gender FROM barangay_resident WHERE gender IS NOT NULL ORDER BY gender");
$voterStatuses = $conn->query("SELECT DISTINCT voter_status FROM barangay_resident WHERE voter_status IS NOT NULL ORDER BY voter_status");

// Check if there are any records
if ($result->num_rows > 0) { ?>

    <!-- Filter Form -->
    <div class="filter-container">
 
    </div>

    <!-- Limit Selector -->
    <div class="limit-selector">
       
        <form method="GET" action="" class = "form_limit">
            
      
            
            <div class="filter-group">
                <label for="civil_status_filter">Civil Status:</label>
                <select name="civil_status_filter" id="civil_status_filter">
                    <option value="">All</option>
                    <?php while ($row = $civilStatuses->fetch_assoc()): ?>
                        <option value="<?php echo $row['civil_status']; ?>" <?php echo $civil_status_filter == $row['civil_status'] ? 'selected' : ''; ?>>
                            <?php echo $row['civil_status']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            
            <div class="filter-group">
                <label for="gender_filter">Sex:</label>
                <select name="gender_filter" id="gender_filter">
                    <option value="">All</option>
                    <?php while ($row = $genders->fetch_assoc()): ?>
                        <option value="<?php echo $row['gender']; ?>" <?php echo $gender_filter == $row['gender'] ? 'selected' : ''; ?>>
                            <?php echo $row['gender']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            
            <div class="filter-group">
                <label for="voter_filter">Voter Status:</label>
                <select name="voter_filter" id="voter_filter">
                    <option value="">All</option>
                    <?php while ($row = $voterStatuses->fetch_assoc()): ?>
                        <option value="<?php echo $row['voter_status']; ?>" <?php echo $voter_filter == $row['voter_status'] ? 'selected' : ''; ?>>
                            <?php echo $row['voter_status']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            
            <input type="hidden" name="page" value="1"> <!-- Reset to page 1 when filtering -->
            <input type="hidden" name="limit" value="<?php echo $limit; ?>">
            
            <button type="submit" class="filter-btn"><svg style = "width:8px; margin-right:5px; fill:white;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8L32 224c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8l256 0c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"/></svg>Filter</button>
            <button type="button" class="reset-btn" onclick="window.location.href='?page=1&limit=<?php echo $limit; ?>'"><svg style =  "width:10px; margin-right:5px; fill:white;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z"/></svg>Reset</button>
            <button type="button" class="export-btn" id="export-btn"><svg style = "width:12px; margin-right:5px; fill:white;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 128-168 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l168 0 0 112c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64zM384 336l0-48 110.1 0-39-39c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l80 80c9.4 9.4 9.4 24.6 0 33.9l-80 80c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l39-39L384 336zm0-208l-128 0L256 0 384 128z"/></svg>Export</button>

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
            <input type="hidden" name="contact_filter" value="<?php echo htmlspecialchars($contact_filter); ?>">
            <input type="hidden" name="age_filter" value="<?php echo htmlspecialchars($age_filter); ?>">
            <input type="hidden" name="civil_status_filter" value="<?php echo htmlspecialchars($civil_status_filter); ?>">
            <input type="hidden" name="gender_filter" value="<?php echo htmlspecialchars($gender_filter); ?>">
            <input type="hidden" name="voter_filter" value="<?php echo htmlspecialchars($voter_filter); ?>">
            <input type="hidden" name="page" value="<?php echo $page; ?>">
        </form>
       
    </div>

    <table>
        <caption>Barangay Resident List</caption>
        <tr>
            <th>Fullname</th>
            <th>Contact no.</th>
            <th>Age</th>
            <th>Civil Status</th>
            <th>Sex</th>
            <th>Voter Status</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { 
            $firstname = $row["firstname"];
            $middlename = $row["middlename"];
            $lastname = $row["lastname"];

            $age = $row["age"];
            $civil_status = $row["civil_status"];
            $gender = $row["gender"];

            $voter_status = $row["voter_status"];
            $house_no = $row["house_no"];

            $place_of_birth = $row["place_of_birth"];
            $birthday = $row["birthday"];

            $email = $row["email"];
            $contact_no = $row["contact_no"];

            $citizenship = $row["citizenship"];
            $occupation = $row["occupation"];
            $sitio_pook = $row["sitio_pook"];

            $id = $row["id"];
        ?>
        <tr class="table_hover">
            <td><?php echo $firstname . " " . $middlename . " " . $lastname; ?></td>
            <td><?php echo $contact_no; ?></td>
            <td><?php echo $age; ?></td>
            <td><?php echo $civil_status; ?></td>
            <td><?php echo $gender; ?></td>
            <td><?php echo $voter_status; ?></td>
            <td hidden><?php echo $house_no; ?></td>

            <td hidden><?php echo  $firstname; ?></td>
            <td hidden><?php echo $middlename; ?></td>
            <td hidden><?php echo  $lastname; ?></td>

            <td hidden><?php echo   $place_of_birth ; ?></td>
            <td hidden><?php echo   $birthday; ?></td>
            <td hidden><?php echo  $lastname; ?></td>

            <td hidden><?php echo   $email; ?></td>

            <td hidden><?php echo    $citizenship; ?></td>
            <td hidden><?php echo   $occupation; ?></td>
            <td hidden><?php echo   $sitio_pook; ?></td>
           
            <td>
                <div id = "form_up_del_official">
                    
                    <button  id = "update_official_btn" class = "update_btn" data-id= <?php echo $row ["id"] ?>><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg></button>
                    <button id = "delete_official_btn" class = "delete_btn" data-id= <?php echo $row ["id"] ?>><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>
                </div>
            </td>
        </tr>
        <?php } ?>
    </table>

    <!-- Table Footer -->
    <div class="table-footer">
        <div class="total-count">Total Residents: <?php echo $totalRows; ?></div>
        <div class="pagination-info">
            Showing <?php echo $startRow; ?> to <?php echo $endRow; ?> of <?php echo $totalRows; ?> entries
        </div>
    </div>

    <!-- Pagination Controls -->
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo $page - 1; ?>&limit=<?php echo $limit; ?>&name_filter=<?php echo urlencode($name_filter); ?>&contact_filter=<?php echo urlencode($contact_filter); ?>&age_filter=<?php echo urlencode($age_filter); ?>&civil_status_filter=<?php echo urlencode($civil_status_filter); ?>&gender_filter=<?php echo urlencode($gender_filter); ?>&voter_filter=<?php echo urlencode($voter_filter); ?>">Previous</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?php echo $i; ?>&limit=<?php echo $limit; ?>&name_filter=<?php echo urlencode($name_filter); ?>&contact_filter=<?php echo urlencode($contact_filter); ?>&age_filter=<?php echo urlencode($age_filter); ?>&civil_status_filter=<?php echo urlencode($civil_status_filter); ?>&gender_filter=<?php echo urlencode($gender_filter); ?>&voter_filter=<?php echo urlencode($voter_filter); ?>" class="<?php echo $i == $page ? 'active' : ''; ?>">
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <a href="?page=<?php echo $page + 1; ?>&limit=<?php echo $limit; ?>&name_filter=<?php echo urlencode($name_filter); ?>&contact_filter=<?php echo urlencode($contact_filter); ?>&age_filter=<?php echo urlencode($age_filter); ?>&civil_status_filter=<?php echo urlencode($civil_status_filter); ?>&gender_filter=<?php echo urlencode($gender_filter); ?>&voter_filter=<?php echo urlencode($voter_filter); ?>">Next</a>
        <?php endif; ?>
    </div>

<?php 
} else { ?>
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
<?php }

// Close the database connection
mysqli_close($conn);
?>

<!-- Modal for Delete -->
<div id="delete-modal" class="delete-modal">
    <div class="delete-modal-content">
        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg></span>
        <h2>Delete Confirmation</h2>
        <h3>Are you sure you want to delete this record?</h3>
        <div class="div-delete">
            <button id="confirm-delete" class="btn-delete">Delete</button>
            <button id="cancel-delete" class="btn-delete">Cancel</button>
        </div>
    </div>
</div>

<!-- Modal for Update -->
<div id="edit-modal" class="edit-modal">
    <div class="edit-modal-content">
        <span onclick="this.parentElement.parentElement.style.display='none';" class="update-close-btn">&times;</span>
        <?php include("update_temp.php"); ?>
    </div>
</div>

<script src="/BIS/administrator/admin_panel/brgy_resident_folder/delete_modal_button.js"></script>
<script src="/BIS/administrator/admin_panel/brgy_resident_folder/update_modal.js"></script>
<script>
document.getElementById('export-btn').addEventListener('click', function() {
    // Get all the current filter values
    const nameFilter = document.getElementById('name_filter') ? document.getElementById('name_filter').value : '';
    const contactFilter = document.getElementById('contact_filter') ? document.getElementById('contact_filter').value : '';
    const ageFilter = document.getElementById('age_filter') ? document.getElementById('age_filter').value : '';
    const civilStatusFilter = document.getElementById('civil_status_filter').value;
    const genderFilter = document.getElementById('gender_filter').value;
    const voterFilter = document.getElementById('voter_filter').value;
    
    // Create a form with all filter parameters
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = './brgy_resident_folder/export_residents.php';
    
    // Add hidden inputs for each filter
    function addHiddenInput(name, value) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = value;
        form.appendChild(input);
    }
    
    addHiddenInput('name_filter', nameFilter);
    addHiddenInput('contact_filter', contactFilter);
    addHiddenInput('age_filter', ageFilter);
    addHiddenInput('civil_status_filter', civilStatusFilter);
    addHiddenInput('gender_filter', genderFilter);
    addHiddenInput('voter_filter', voterFilter);
    
    // Submit the form
    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form);
});
</script>
</body>
</html>