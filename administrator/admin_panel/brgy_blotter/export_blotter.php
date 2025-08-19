<?php
require("../../../database/conn_db.php");

// Get filter parameters from POST
$complainant_filter = isset($_POST['complainant_filter']) ? trim($_POST['complainant_filter']) : '';
$year_filter = isset($_POST['year_filter']) ? trim($_POST['year_filter']) : '';
$type_filter = isset($_POST['type_filter']) ? trim($_POST['type_filter']) : '';
$status_filter = isset($_POST['status_filter']) ? trim($_POST['status_filter']) : '';

// Build the query with filters
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

if (!empty($type_filter)) {
    $whereClause[] = "type = ?";
    $params[] = $type_filter;
    $types .= 's';
}

if (!empty($status_filter)) {
    $whereClause[] = "status = ?";
    $params[] = $status_filter;
    $types .= 's';
}

$whereSQL = !empty($whereClause) ? 'WHERE ' . implode(' AND ', $whereClause) : '';

// Fetch all filtered records
$sql = "SELECT * FROM barangay_blotter $whereSQL ORDER BY id DESC";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

if (!$stmt->execute()) {
    die("Error executing query: " . $stmt->error);
}

$result = $stmt->get_result();

// Set headers for CSV file download
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="barangay_blotter_'.date('Y-m-d').'.csv"');

// Open output stream
$output = fopen('php://output', 'w');

// Add BOM for UTF-8 compatibility with Excel
fwrite($output, "\xEF\xBB\xBF");

// Write CSV headers
fputcsv($output, [
    'Complainant',
    'Contact No.',
    'Date',
    'Time',
    'Type',
    'Status',
    'Subject',
    'Place of Incident',
    'Tanod on Duty',
    'Age',
    'Address',
    'Complained Name',
    'Complained Address',
    'Details/Reason'
]);

// Write data rows
while ($row = $result->fetch_assoc()) {
    $status = '';
    if ($row['status'] == "Active") {
        $status = 'Active';
    } elseif ($row['status'] == "Settled") {
        $status = 'Settled';
    } elseif ($row['status'] == "Scheduled") {
        $status = 'Scheduled';
    }
    
    fputcsv($output, [
        $row['complainant'] ?? '',
        $row['cell_no'] ?? '',
        $row['date'] ?? '',
        $row['time'] ?? '',
        $row['type'] ?? '',
        $status,
        $row['subject'] ?? '',
        $row['place'] ?? '',
        $row['tanod'] ?? '',
        $row['age'] ?? '',
        $row['address_complainant'] ?? '',
        $row['complained_name'] ?? '',
        $row['add_complained_name'] ?? '',
        $row['details_reason'] ?? ''
    ]);
}

fclose($output);
exit;
?>