<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Table</title>

    <style>
        table{
            margin-right: 10px;
        }
        tfoot {
            font-weight: bold;
            background-color:#4A9D4f;
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
        .limit-selector select {
            padding: 5px;
            border: 1px solid #4A9D4f;
            border-radius: 4px;
            margin-top: -10px;
        }
    </style>
</head>
<body>

<?php

require("../../database/conn_db.php");
session_start();

// Logged-in user
$user_id = $_SESSION['user_id'];

// Pagination
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 10;
$offset = ($page - 1) * $limit;

// Search input (fix SQL injection)
$input = isset($_POST['input']) ? mysqli_real_escape_string($conn, $_POST['input']) : "";

// Count Query (for pagination)
$countQuery = "
    SELECT COUNT(*) AS total 
    FROM barangay_request
    WHERE user_id = '$user_id'
    AND (
        firstname LIKE '$input%'
        OR lastname LIKE '$input%'
        OR middlename LIKE '$input%'
        OR request_document LIKE '$input%'
        OR status LIKE '$input%'
        OR control_no LIKE '$input%'
        OR id LIKE '$input%'
    )
";
$countResult = mysqli_query($conn, $countQuery);
$totalRows = $countResult->fetch_assoc()['total'];
$totalPages = ceil($totalRows / $limit);

// Main Data Query
$query = "
    SELECT *
    FROM barangay_request
    WHERE user_id = '$user_id'
    AND (
        firstname LIKE '$input%'
        OR lastname LIKE '$input%'
        OR middlename LIKE '$input%'
        OR request_document LIKE '$input%'
        OR status LIKE '$input%'
        OR control_no LIKE '$input%'
        OR id LIKE '$input%'
    )
    ORDER BY id DESC
    LIMIT $limit OFFSET $offset
";

$result = mysqli_query($conn, $query);


if ($result && $result->num_rows > 0) {
?>

<!-- Limit Selector -->
<div class="limit-selector" style="margin-top: 15px;">
    <form method="get" action="">
        <label for="limit">Items per page:</label>
        <select name="limit" id="limit" onchange="this.form.submit()">
            <option value="5"  <?= $limit == 5 ? 'selected' : '' ?>>5</option>
            <option value="10" <?= $limit == 10 ? 'selected' : '' ?>>10</option>
            <option value="20" <?= $limit == 20 ? 'selected' : '' ?>>20</option>
            <option value="50" <?= $limit == 50 ? 'selected' : '' ?>>50</option>
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
            <th>Date Requested</th>
            <th>Control No.</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>

<?php
while ($row = $result->fetch_assoc()) {
    $fullname = $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'];
?>
    <tr class="table_hover">
        <td><?= $fullname ?></td>
        <td><?= $row['request_document'] ?></td>
        <td><?= $row['purpose'] ?></td>
        <td><?= $row['date_request'] ?></td>
        <td><?= $row['control_no'] ?></td>
        <td>
            <?php
                $status = trim($row['status']);
                $color = [
                    "No data" => "#005720",
                    "Pending" => "red",
                    "Processing" => "orange",
                    "Ready to Pick-up" => "blue",
                    "Released" => "#00cc0e",
                    "Invalid Purpose" => "red"
                ];
                echo "<p style='color:{$color[$status]};'>$status</p>";
            ?>
        </td>
    </tr>
<?php } ?>

    </tbody>

<tfoot>
<tr>
    <td colspan="6">
        Showing <?= ($offset + 1) ?> to <?= min($offset + $limit, $totalRows) ?> of <?= $totalRows ?> entries
    </td>
</tr>
</tfoot>

</table>

<!-- Pagination -->
<div class="pagination">
    <?php if ($page > 1): ?>
        <a href="?page=<?= $page - 1 ?>&limit=<?= $limit ?>">Previous</a>
    <?php endif; ?>

    <?php 
    $startPage = max(1, $page - 2);
    $endPage = min($totalPages, $page + 2);

    if ($startPage > 1) {
        echo '<a href="?page=1&limit='.$limit.'">1</a>';
        if ($startPage > 2) echo '<span>...</span>';
    }

    for ($i = $startPage; $i <= $endPage; $i++): ?>
        <a href="?page=<?= $i ?>&limit=<?= $limit ?>" class="<?= $i == $page ? 'active' : '' ?>">
            <?= $i ?>
        </a>
    <?php endfor;

    if ($endPage < $totalPages) {
        if ($endPage < $totalPages - 1) echo '<span>...</span>';
        echo '<a href="?page='.$totalPages.'&limit='.$limit.'">'.$totalPages.'</a>';
    }
    ?>

    <?php if ($page < $totalPages): ?>
        <a href="?page=<?= $page + 1 ?>&limit=<?= $limit ?>">Next</a>
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
mysqli_close($conn);
?>

<footer style="height:100px;"></footer>

</body>
</html>
