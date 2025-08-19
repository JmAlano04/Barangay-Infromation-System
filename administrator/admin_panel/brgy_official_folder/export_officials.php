<?php
require("../../../database/conn_db.php");

// Get filter parameters from POST data
$name_filter = isset($_POST['name_filter']) ? $_POST['name_filter'] : '';
$position_filter = isset($_POST['position_filter']) ? $_POST['position_filter'] : '';
$chairman_filter = isset($_POST['chairman_filter']) ? $_POST['chairman_filter'] : '';
$term_start_year = isset($_POST['term_start_year']) ? $_POST['term_start_year'] : '';
$term_end_year = isset($_POST['term_end_year']) ? $_POST['term_end_year'] : '';
$status_filter = isset($_POST['status_filter']) ? $_POST['status_filter'] : '';

// Build the WHERE clause for filtering
$whereClause = [];
$params = [];
$types = '';

if (!empty($name_filter)) {
    $whereClause[] = "fullname LIKE ?";
    $params[] = "%$name_filter%";
    $types .= 's';
}

if (!empty($position_filter)) {
    $whereClause[] = "position = ?";
    $params[] = $position_filter;
    $types .= 's';
}

if (!empty($chairman_filter)) {
    $whereClause[] = "chairmanship = ?";
    $params[] = $chairman_filter;
    $types .= 's';
}

if (!empty($term_start_year)) {
    $whereClause[] = "YEAR(term_start) = ?";
    $params[] = $term_start_year;
    $types .= 's';
}

if (!empty($term_end_year)) {
    $whereClause[] = "YEAR(term_end) = ?";
    $params[] = $term_end_year;
    $types .= 's';
}

if (!empty($status_filter)) {
    $whereClause[] = "status = ?";
    $params[] = $status_filter;
    $types .= 'i';
}

$whereSQL = !empty($whereClause) ? 'WHERE ' . implode(' AND ', $whereClause) : '';

// Fetch all filtered records
$sql = "SELECT * FROM barangay_official $whereSQL ORDER BY id DESC";
$stmt = $conn->prepare($sql);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();

// Set headers for CSV download
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=barangay_officials_' . date('Y-m-d') . '.csv');

// Create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// Output the CSV column headers
fputcsv($output, array( 'Fullname', 'Chairmanship', 'Position', 'Term Start', 'Term End', 'Status', 'photo'));

// Output the data
while ($row = $result->fetch_assoc()) {
    $status = $row['status'] == "Active" ? 'Active' : 'Inactive';
    fputcsv($output, array(
       
        $row['fullname'],
        $row['chairmanship'],
        $row['position'],
        $row['term_start'],
        $row['term_end'],
        $status,
        $row['photo']
    ));
}

fclose($output);
exit;
?>