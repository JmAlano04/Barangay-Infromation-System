<?php
require("../../../database/conn_db.php");

// Get filter parameters from POST
$name_filter = isset($_POST['name_filter']) ? trim($_POST['name_filter']) : '';
$date_from = isset($_POST['date_from']) ? trim($_POST['date_from']) : '';
$date_to = isset($_POST['date_to']) ? trim($_POST['date_to']) : '';
$gender_filter = isset($_POST['gender_filter']) ? trim($_POST['gender_filter']) : '';
$year_filter = isset($_POST['year_filter']) ? trim($_POST['year_filter']) : ''; // ✅ FIXED

// Build the query with filters
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

if (!empty($date_from) && !empty($date_to)) {
    $whereClause[] = "date_registered BETWEEN ? AND ?";
    $params[] = $date_from;
    $params[] = $date_to;
    $types .= 'ss';
} elseif (!empty($date_from)) {
    $whereClause[] = "date_registered >= ?";
    $params[] = $date_from;
    $types .= 's';
} elseif (!empty($date_to)) {
    $whereClause[] = "date_registered <= ?";
    $params[] = $date_to;
    $types .= 's';
}

if (!empty($gender_filter)) {
    $whereClause[] = "gender = ?";
    $params[] = $gender_filter;
    $types .= 's';
}

if (!empty($year_filter)) {
    $whereClause[] = "YEAR(date_registered) = ?";
    $params[] = $year_filter;
    $types .= 'i';
}

$whereSQL = !empty($whereClause) ? 'WHERE ' . implode(' AND ', $whereClause) : '';

// Fetch all filtered records
$sql = "SELECT * FROM user_account $whereSQL ORDER BY user_id DESC";
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
header('Content-Disposition: attachment; filename="user_registrations_'.date('Y-m-d').'.csv"');

// Open output stream
$output = fopen('php://output', 'w');

// Add BOM for UTF-8 compatibility with Excel
fwrite($output, "\xEF\xBB\xBF");

// Write CSV headers
fputcsv($output, [
    'User ID',
    'Full Name',
    'Age',
    'Gender',
    'Email',
    'Date Registered'
]);

// Write data rows
while ($row = $result->fetch_assoc()) {
    $fullname = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];
    
    fputcsv($output, [
        $row['user_id'] ?? '',
        $fullname ?? '',
        $row['age'] ?? '',
        $row['gender'] ?? '',
        $row['email'] ?? '',
        date('m/d/Y', strtotime($row['date_registered'])) ?? ''
    ]);
}

fclose($output);
exit;
?>
