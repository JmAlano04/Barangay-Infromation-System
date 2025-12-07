<?php
require("../../../database/conn_db.php");

// Get filter parameters from POST
$name_filter = isset($_POST['name_filter']) ? trim($_POST['name_filter']) : '';
$contact_filter = isset($_POST['contact_filter']) ? trim($_POST['contact_filter']) : '';
$age_filter = isset($_POST['age_filter']) ? intval($_POST['age_filter']) : '';
$civil_status_filter = isset($_POST['civil_status_filter']) ? trim($_POST['civil_status_filter']) : '';
$gender_filter = isset($_POST['gender_filter']) ? trim($_POST['gender_filter']) : '';
$voter_filter = isset($_POST['voter_filter']) ? trim($_POST['voter_filter']) : '';

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

// Fetch all filtered records
$sql = "SELECT * FROM barangay_resident $whereSQL ORDER BY id DESC";
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
header('Content-Disposition: attachment; filename="barangay_residents_'.date('Y-m-d').'.csv"');

// Open output stream
$output = fopen('php://output', 'w');

// Add BOM for UTF-8 compatibility with Excel
fwrite($output, "\xEF\xBB\xBF");

// Write CSV headers
fputcsv($output, [
    'Firstname',
    'Middlename',
    'Lastname',
    'House Number',
    'Place of Birth',
    'Birthday',
    'Age',
    'Civil Status',
    'Sex',
    'Voter Status',
    'Email',
    'Contact Number',
    'Occupation',
    'Citizenship',
    'Sitio/Pook'
]);

// Write data rows
while ($row = $result->fetch_assoc()) {
    fputcsv($output, [
        $row['firstname'] ?? '',
        $row['middlename'] ?? '',
        $row['lastname'] ?? '',
        $row['house_no'] ?? '',
        $row['place_of_birth'] ?? '',
        $row['birthday'] ?? '',
        $row['age'] ?? '',
        $row['civil_status'] ?? '',
        $row['gender'] ?? '',
        $row['voter_status'] ?? '',
        $row['email'] ?? '',
        $row['contact_no'] ?? '',
        $row['occupation'] ?? '',
        $row['citizenship'] ?? '',  // Fixed typo from 'citezenship'
        $row['sitio_pook'] ?? '',
    ]);
}

fclose($output);
exit;
?>