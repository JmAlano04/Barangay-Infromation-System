<?php
require('../../database/conn_db.php'); // adjust if needed

if (isset($_POST['submit_blotter'])) {

    // Collect data from form
    $subject = trim($_POST['subject']);
    $place = trim($_POST['place']);
    $complained_name = trim($_POST['complained_name']);
    $add_complained_name = trim($_POST['add_complained_name']);

    $firstname = trim($_POST['firstname']);
    $middlename = trim($_POST['middlename']);
    $lastname = trim($_POST['lastname']);
    $age = trim($_POST['age']);

    $house_no = trim($_POST['house_no']);
    $sitio_pook = trim($_POST['Sitio_Pook']);
    $contact_no = trim($_POST['contact_no']);

    $details_reason = trim($_POST['details_reason']);
    $status = trim($_POST['status']);
    $user_id = trim($_POST['user_id']);

    // ===========================
    // AUTO DATE & TIME (PH)
    // ===========================
    date_default_timezone_set("Asia/Manila");

    $today_date = date("Y-m-d");        // example: 2025-12-08
    $today_time = date("H:i:s");        // example: 14:35:55
    $last_update = date("Y-m-d H:i:s"); // timestamp

    // FULL NAME as complainant
    $complainant = $firstname . " " . $middlename . " " . $lastname;

    // COMPLETE ADDRESS
    $address_complainant = $house_no . " " . $sitio_pook;

    // ===========================
    // INSERT QUERY
    // ===========================
    $sql = "INSERT INTO barangay_blotter 
    (subject, cell_no, place, tanod, date, time, status, complainant, age, address_complainant, 
     complained_name, add_complained_name, details_reason, last_update, user_id)
    
    VALUES 
    ('$subject', '$contact_no', '$place', '', '$today_date', '$today_time', '$status',
     '$complainant', '$age', '$address_complainant', 
     '$complained_name', '$add_complained_name', '$details_reason', '$last_update', '$user_id')";
    

    if (mysqli_query($conn, $sql)) {
        echo "<script>
        window.location.href='successful_blotter.php';</script>";
    } else {
        echo "ERROR: " . mysqli_error($conn);
    }
}
?>
