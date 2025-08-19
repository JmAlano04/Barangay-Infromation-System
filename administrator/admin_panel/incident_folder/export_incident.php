<?php
require("../../../database/conn_db.php");

// Get filter parameters from POST
$name_filter = isset($_POST['name_filter']) ? trim($_POST['name_filter']) : '';
$year_filter = isset($_POST['year_filter']) ? trim($_POST['year_filter']) : '';
$status_filter = isset($_POST['status_filter']) ? trim($_POST['status_filter']) : '';
$vehicle_filter = isset($_POST['vehicle_filter']) ? trim($_POST['vehicle_filter']) : '';


// Build the query with filters
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

// Fetch all filtered records
$sql = "SELECT * FROM barangay_incident $whereSQL ORDER BY id DESC";
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
header('Content-Disposition: attachment; filename="barangay_incident_'.date('Y-m-d').'.csv"');

// Open output stream
$output = fopen('php://output', 'w');

// Add BOM for UTF-8 compatibility with Excel
fwrite($output, "\xEF\xBB\xBF");

// Write CSV headers
fputcsv($output, [
    'Name Involved',
    'Address',
    'Date',
    'Time',
    'Vehicle',
    'License',
    'Plate Number',
    'Status',
    'Cause of Incident'
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
        $row['name_involve'] ?? '',
        $row['address'] ?? '',
        $row['date'] ?? '',
        $row['time'] ?? '',
        $row['vehicle'] ?? '',
        $row['license'] ?? '',
        $row['plate_no'] ?? '',
        $status,
        $row['cause_incident'] ?? ''
    ]);
}

fclose($output);
exit;
?>