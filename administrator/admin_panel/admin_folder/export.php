<?php
// Set headers for CSV file download
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="Barangay-Administrator_Account_'.date('Y-m-d').'.csv"');

// Open output stream
$output = fopen('php://output', 'w');

// Add BOM for UTF-8 compatibility with Excel
fwrite($output, "\xEF\xBB\xBF");

// CSV Column Headers
fputcsv($output, [
    "User Type",
    "Full Name",
    "Email",
    "Password",
    "Date Created",
    "Admin Profile",
    "Sex",
    "Age",
    "Status"
]);

// Database connection
$conn = mysqli_connect("localhost", "root", "", "barangay_information_system", 3306);

if (!$conn) {
    exit("Database Error");
}

// Query
$sql = "SELECT user_type, firstname, middlename, lastname, email, password, date_created, admin_profile, gender, age, status FROM admin_account";
$result = mysqli_query($conn, $sql);

// Write rows
while ($row = mysqli_fetch_assoc($result)) {

    // Full name formatting (same logic as revenue export)
    $fullname = ($row['firstname'] ?? '') . ' ' . ($row['middlename'] ?? '') . ' ' . ($row['lastname'] ?? '');

    // Prevent Excel misformatting usernames (optional)
    $username = "\t" . ($row['username'] ?? '');

    fputcsv($output, [
        $row['user_type'] ?? '',
        $fullname,
        $row['email'] ?? '',
        $row['password'] ?? '',
        date('m/d/Y', strtotime($row['date_created'])),
        $row['admin_profile'] ?? '',
        $row['gender'] ?? '',
        $row['age'] ?? '',
        $row['status'] ?? ''
    ]);
}

mysqli_close($conn);
fclose($output);
exit;
