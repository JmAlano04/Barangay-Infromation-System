<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Table</title>
    <style>
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
    $user_id = $_SESSION['user_id']; 
    ?>

    <?php 
    require("../../database/conn_db.php");

    // Get the current page and limit from query parameters, set defaults if not provided
    $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
    $limit = isset($_GET['limit']) ? max(1, (int)$_GET['limit']) : 10;
    $offset = ($page - 1) * $limit;

    // Get the total number of records from the correct table
    $countQuery = "SELECT COUNT(*) AS total FROM barangay_request WHERE user_id = $user_id";
    $countResult = $conn->query($countQuery);
    $totalRows = $countResult->fetch_assoc()['total'];
    $totalPages = max(1, ceil($totalRows / $limit));

    // Adjust current page if it exceeds total pages
    if ($page > $totalPages) {
        $page = $totalPages;
        $offset = ($page - 1) * $limit;
    }

    // Get status counts
    $statusCounts = [
        'total' => 0,
        'no_data' => 0,
        'pending' => 0,
        'processing' => 0,
        'ready' => 0,
        'released' => 0,
        'invalid' => 0
    ];
    
    $statusQuery = "SELECT status, COUNT(*) as count FROM barangay_request WHERE user_id = $user_id GROUP BY status";
    $statusResult = $conn->query($statusQuery);
    
    if ($statusResult) {
        while ($row = $statusResult->fetch_assoc()) {
            $statusCounts['total'] += $row['count'];
            switch ($row['status']) {
                case 0: $statusCounts['no_data'] = $row['count']; break;
                case 1: $statusCounts['pending'] = $row['count']; break;
                case 2: $statusCounts['processing'] = $row['count']; break;
                case 3: $statusCounts['ready'] = $row['count']; break;
                case 4: $statusCounts['released'] = $row['count']; break;
                case 5: $statusCounts['invalid'] = $row['count']; break;
            }
        }
    }

    // Fetch records for the current page
    $sql = "SELECT * FROM barangay_request WHERE user_id = $user_id ORDER BY id DESC LIMIT $limit OFFSET $offset";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>

    <!-- Pagination Controls Top -->
    <div class="pagination-controls">
       
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
    </div>
<main class = "overflow">
    <table>
        <caption>Request Information</caption>
        <thead>
            <tr>
                <th>Fullname</th>
                <th>Document Type</th>
                <th>Purpose</th>
                <th>Date <br> Requested</th>
                <th>Reference #</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                $control_no = $row['control_no'];
                $id = $row['id'];
                $firstname = $row["firstname"];
                $middlename = $row["middlename"];
                $lastname = $row["lastname"];
                $document_type = $row["request_document"];
                $purpose = $row["purpose"];
                $date_requested = $row["date_request"];
                $status = $row["status"];
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
                <td colspan="6">
                    <div>Total Records: <?php echo $statusCounts['total']; ?></div>
                </td>
            </tr>
        </tfoot>
    </table>
</main>
    <!-- Pagination Controls Bottom -->
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=1&limit=<?php echo $limit; ?>">First</a>
            <a href="?page=<?php echo $page - 1; ?>&limit=<?php echo $limit; ?>">Previous</a>
        <?php endif; ?>

        <?php 
        // Show page numbers with smart truncation
        $maxVisiblePages = 5;
        $startPage = max(1, $page - floor($maxVisiblePages / 2));
        $endPage = min($totalPages, $startPage + $maxVisiblePages - 1);
        
        if ($startPage > 1) {
            echo '<a href="?page=1&limit='.$limit.'">1</a>';
            if ($startPage > 2) echo '<span class="ellipsis">...</span>';
        }
        
        for ($i = $startPage; $i <= $endPage; $i++): ?>
            <a href="?page=<?php echo $i; ?>&limit=<?php echo $limit; ?>" class="<?php echo $i == $page ? 'active' : ''; ?>">
                <?php echo $i; ?>
            </a>
        <?php endfor; 
        
        if ($endPage < $totalPages) {
            if ($endPage < $totalPages - 1) echo '<span class="ellipsis">...</span>';
            echo '<a href="?page='.$totalPages.'&limit='.$limit.'">'.$totalPages.'</a>';
        }
        ?>

        <?php if ($page < $totalPages): ?>
            <a href="?page=<?php echo $page + 1; ?>&limit=<?php echo $limit; ?>">Next</a>
            <a href="?page=<?php echo $totalPages; ?>&limit=<?php echo $limit; ?>">Last</a>
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
        @media only screen and (min-width: 320px ){
            .Data-not-found h1 {
            color: rgba(255, 0, 0, 0.37);
            position: absolute;
            top: 300px;
            left: -100%;
            font-size: 2rem;
        }
        }
        @media only screen and (min-width: 481px ){
            .Data-not-found h1 {
            color: rgba(255, 0, 0, 0.37);
            position: absolute;
            top: 300px;
            left: -60%;
            font-size: 2rem;
            }
        }
        @media only screen and (min-width: 601px ){
            .Data-not-found h1 {
            color: rgba(255, 0, 0, 0.37);
            position: absolute;
            top: 300px;
            left: -30%;
            font-size: 2.1rem;
            }
        }
        @media only screen and (min-width:  769px ){
            .Data-not-found h1 {
            color: rgba(255, 0, 0, 0.37);
            position: absolute;
            top: 300px;
            left: 0%;
            font-size: 2.1rem;
            }
        }
        @media only screen and (min-width:  1081px  ){
            .Data-not-found h1 {
            color: rgba(255, 0, 0, 0.37);
            position: absolute;
            top: 300px;
            left: 30%;
            font-size: 2.54rem;
            }
        }
        @media only screen and (min-width: 1441px) {
            .Data-not-found h1 {
            color: rgba(255, 0, 0, 0.37);
            position: absolute;
            top: 300px;
            left: 50%;
            font-size: 2.54rem;
            }
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
    <div class="page-info">
            Showing <?php echo min($offset + 1, $totalRows) . " to " . min($offset + $limit, $totalRows) . " of " . $totalRows; ?> entries
        </div>
    </footer>    
</body>
</html>