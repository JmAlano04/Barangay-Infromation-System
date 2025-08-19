<?php
require("../../../database/conn_db.php");

// Get filter parameters from POST
$month = isset($_POST['month']) ? trim($_POST['month']) : '';
$year = isset($_POST['year']) ? trim($_POST['year']) : '';

// Build the query with filters
$whereClause = [];
$params = [];
$types = '';

if (!empty($month)) {
    $whereClause[] = "MONTH(date_issue) = ?";
    $params[] = $month;
    $types .= 's';
}

if (!empty($year)) {
    $whereClause[] = "YEAR(date_issue) = ?";
    $params[] = $year;
    $types .= 's';
}

$whereSQL = !empty($whereClause) ? 'WHERE ' . implode(' AND ', $whereClause) : '';

// Fetch all filtered records
$sql = "SELECT * FROM barangay_revenue $whereSQL ORDER BY OR_no DESC";
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
header('Content-Disposition: attachment; filename="barangay_revenue_'.date('Y-m-d').'.csv"');

// Open output stream
$output = fopen('php://output', 'w');

// Add BOM for UTF-8 compatibility with Excel
fwrite($output, "\xEF\xBB\xBF");

// Write CSV headers
fputcsv($output, [
    'OR Number',
    'Full Name',
    'Document Type',
    'Date Issued',
    'Amount',
    'Control Number'
]);

// Write data rows
$total_amount = 0;
while ($row = $result->fetch_assoc()) {
    $fullname = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];
    
    // Prevent Excel from interpreting as date
    $control_no = "\t" . $row['OR_no'] . '-' . date('Y', strtotime($row['date_issue']));
    
    $amount = $row['document_amount'];
    $total_amount += $amount;

    fputcsv($output, [
        $row['OR_no'] ?? '',
        $fullname ?? '',
        $row['document_type'] ?? '',
        date('m/d/Y', strtotime($row['date_issue'])) ?? '',
        '₱' . number_format($amount, 2),
        $control_no
    ]);
}

// Add total row
fputcsv($output, ['', '', '', 'Total:', '₱' . number_format($total_amount, 2), '']);
