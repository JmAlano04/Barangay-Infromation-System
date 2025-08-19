<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Table</title>
    <style>
        tfoot {
            font-weight: bold;
            background-color:rgb(0, 170, 11);
            color:white;
        }
        .status-count {
            margin-top: 10px;
            padding: 5px;
            background-color: #f8f9fa;
            border-radius: 4px;
            color:#4A9D4f;
        }
        .pagination {
            margin: 20px 0;
            display: flex;
            justify-content: center;
            gap: 5px;
        }
        .pagination a {
            padding: 5px 10px;
            border: 1px solid #ddd;
            text-decoration: none;
            color: #4A9D4f;
            border-radius: 3px;
        }
        .pagination a.active {
            background-color: #4A9D4f;
            color: white;
            border: 1px solid #4A9D4f;
        }
        .pagination a:hover:not(.active) {
            background-color: #f0f0f0;
        }
        .pagination-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 15px 0;
        }
        .limit-selector {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top:10px;
        }
        .limit-selector select {
            padding: 5px;
            border: 1px solid #4A9D4f;
            border-radius: 4px;
            margin-top:-50px;
        }
        .page-info {
            font-size: 0.9em;
            color: #555;
            margin-left:40px;
            margin-top:20px;
        }
        .ellipsis {
            padding: 5px 10px;
        }
        @media only screen and (min-width: 320px ){
            tfoot {
            font-weight: bold;
            background-color: #4A9D4f;
            color:white;
        }
        .status-count {
            margin-top: 10px;
            padding: 5px;
            background-color: #f8f9fa;
            border-radius: 4px;
            color:#4A9D4f;
        }
        .pagination {
            margin: 20px 0;
            display: flex;
            justify-content: center;
            gap: 5px;
        }
        .pagination a {
            padding: 5px 10px;
            border: 1px solid #ddd;
            text-decoration: none;
            color: #4A9D4f;
            border-radius: 3px;
        }
        .pagination a.active {
            background-color: #4A9D4f;
            color: white;
            border: 1px solid #4A9D4f;
        }
        .pagination a:hover:not(.active) {
            background-color: #f0f0f0;
        }
        .pagination-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 15px 0;
        }
        .limit-selector {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top:10px;
        }
        .limit-selector select {
            padding: 5px;
            border: 1px solid #4A9D4f;
            border-radius: 4px;
            margin-top:-50px;
        }
        .page-info {
            font-size: 0.5em;
            color: #555;
            margin-left:-180px;
            margin-top:20px;
        }
        .ellipsis {
            padding: 5px 10px;
        }
        @media only screen and (min-width: 1080px ){
            tfoot {
            font-weight: bold;
            background-color: #4A9D4f;
            color:white;
        }
        .status-count {
            margin-top: 10px;
            padding: 5px;
            background-color: #f8f9fa;
            border-radius: 4px;
            color:#4A9D4f;
        }
        .pagination {
            margin: 20px 0;
            display: flex;
            justify-content: center;
            gap: 5px;
        }
        .pagination a {
            padding: 5px 10px;
            border: 1px solid #ddd;
            text-decoration: none;
            color: #4A9D4f;
            border-radius: 3px;
        }
        .pagination a.active {
            background-color: #4A9D4f;
            color: white;
            border: 1px solid #4A9D4f;
        }
        .pagination a:hover:not(.active) {
            background-color: #f0f0f0;
        }
        .pagination-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 15px 0;
        }
        .limit-selector {
         display:none;
        }
        .limit-selector select {
            padding: 5px;
            border: 1px solid #4A9D4f;
            border-radius: 4px;
            margin-top:-50px;
     
        }
        .page-info {
            font-size: 1em;
            color: #555;
            margin-left:60px;
            margin-top:20px;
            transition:all 0.5s ease ;
        }
        .ellipsis {
            padding: 5px 10px;
        }
        .sidebar.active ~ .dashboard_content .page-info{
                margin-left:-180px;
        }
        }
        }
    </style>
</head>
<body>
    <?php
    require("../../database/conn_db.php");
    
    // Get current page and items per page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
    $offset = ($page - 1) * $limit;
    
    $input = $_POST['input']; 
    
    // Get total count of records
    $countQuery = "SELECT COUNT(*) as total FROM barangay_request WHERE id ";
    $countResult = mysqli_query($conn, $countQuery);
    $totalRows = $countResult->fetch_assoc()['total'];
    $totalPages = ceil($totalRows / $limit);
    
    // Get paginated data
    $query = "SELECT * FROM barangay_request WHERE id LIKE '{$input}%' LIKE '{$input}%' OR firstname LIKE '{$input}%' OR lastname LIKE '{$input}%' OR request_document LIKE '{$input}%' OR status LIKE '{$input}%' OR control_no LIKE '{$input}%' ORDER BY id DESC  LIMIT $limit OFFSET $offset ";
    $result = mysqli_query($conn, $query);

    if ($result->num_rows > 0) {
    ?>

    <!-- Limit selector -->
    <div class="limit-selector">
        <form method="get" action="">
            <label for="limit">Items per page:</label>
            <select name="limit" id="limit" onchange="this.form.submit()">
                <option value="5" <?php echo $limit == 5 ? 'selected' : ''; ?>>5</option>
                <option value="10" <?php echo $limit == 10 ? 'selected' : ''; ?>>10</option>
                <option value="20" <?php echo $limit == 20 ? 'selected' : ''; ?>>20</option>
                <option value="50" <?php echo $limit == 50 ? 'selected' : ''; ?>>50</option>
            </select>
            <input type="hidden" name="page" value="1">
        </form>
    </div>

    <table>
        <caption>Request Information</caption>
        <thead>
            <tr>
                <th>Fullname</th>
                <th>Document Type</th>
                <th>Purpose</th>
                <th>Date <br> Requested</th>
                <th>Control No.</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $firstname = $row["firstname"];
                $middlename = $row["middlename"];
                $lastname = $row["lastname"];
                $document_type = $row["request_document"];
                $purpose = $row["purpose"];
                $date_requested = $row["date_request"];
                $status = $row["status"];
                $control_no = $row["control_no"];
            ?>
            <tr class="table_hover">
                <td><?php echo $firstname . " " . $middlename . " " . $lastname; ?></td>
                <td><?php echo $document_type; ?></td>
                <td><?php echo $purpose; ?></td>
                <td><?php echo $date_requested; ?></td>
                <td><?php echo $control_no; ?></td>
                <td>
                <?php
                   $status = trim($status);

                   if ($status === "No data") {
                       echo "<p style='color:#005720;'>No data</p>";
                   } elseif ($status === "Pending") {
                       echo "<p style='color:red;'>Pending</p>";
                   } elseif ($status === "Processing") {
                       echo "<p style='color:orange;'>Processing</p>";
                   } elseif ($status === "Ready to Pick-up") {
                       echo "<p style='color:blue;'>Ready to Pick-up</p>";
                   } elseif ($status === "Released") {
                       echo "<p style='color:#00cc0e;'>Released</p>";
                   } elseif ($status === "Invalid Purpose") {
                       echo "<p style='color:red;'>Invalid Purpose</p>";
                   }
            ?>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6">Showing <?php echo ($offset + 1) . " to " . min($offset + $limit, $totalRows) . " of " . $totalRows; ?> entries</td>
            </tr>
        </tfoot>
    </table>

    <!-- Pagination Controls -->
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo $page - 1; ?>&limit=<?php echo $limit; ?>">Previous</a>
        <?php endif; ?>

        <?php 
        // Show page numbers
        $startPage = max(1, $page - 2);
        $endPage = min($totalPages, $page + 2);
        
        if ($startPage > 1) {
            echo '<a href="?page=1&limit='.$limit.'">1</a>';
            if ($startPage > 2) echo '<span>...</span>';
        }
        
        for ($i = $startPage; $i <= $endPage; $i++): ?>
            <a href="?page=<?php echo $i; ?>&limit=<?php echo $limit; ?>" class="<?php echo $i == $page ? 'active' : ''; ?>">
                <?php echo $i; ?>
            </a>
        <?php endfor; 
        
        if ($endPage < $totalPages) {
            if ($endPage < $totalPages - 1) echo '<span>...</span>';
            echo '<a href="?page='.$totalPages.'&limit='.$limit.'">'.$totalPages.'</a>';
        }
        ?>

        <?php if ($page < $totalPages): ?>
            <a href="?page=<?php echo $page + 1; ?>&limit=<?php echo $limit; ?>">Next</a>
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
    <?php
    }

    // Close the connection
    mysqli_close($conn);
    ?>

    <footer style="height:100px;">
    </footer>    
</body>
</html>