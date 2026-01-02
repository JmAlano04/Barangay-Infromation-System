<?php
require('../../database/conn_db.php');

if (isset($_POST['save_blotter_upd'])) {

    // REQUIRED FIELDS
    $id = mysqli_real_escape_string($conn, trim($_POST["id_blotter"]));
    $subject = mysqli_real_escape_string($conn, trim($_POST["subject_upd"]));
    $cell_no = mysqli_real_escape_string($conn, trim($_POST["contact_no"]));
    $place = mysqli_real_escape_string($conn, trim($_POST["place_upd"]));

    // COMPLAINED PERSON
    $complained_name = mysqli_real_escape_string($conn, trim($_POST["complained_name"]));
    $add_complained_name = mysqli_real_escape_string($conn, trim($_POST["add_complained_name"]));

    // DETAILS
    $details_reason = mysqli_real_escape_string($conn, trim($_POST["details_reason"]));

    // ADDRESS COMPLAINANT (only if available in POST)
    $house_no = mysqli_real_escape_string($conn, trim($_POST["house_no"] ?? ""));
    $sitio_pook = mysqli_real_escape_string($conn, trim($_POST["sitio_pook"] ?? ""));
    $address_complainant = trim("$house_no $sitio_pook");

    // Auto Date & Time
    date_default_timezone_set('Asia/Manila');
    $date = date('Y-m-d');
    $time = date('H:i:s');

    // Status (optional)
    $status = mysqli_real_escape_string($conn, trim($_POST["status_upd"] ?? "Pending"));

    // SQL UPDATE with only current submitted data
    $sql = "
        UPDATE barangay_blotter SETaaa
            subject = '$subject',
            cell_no = '$cell_no',
            date = '$date',
            time = '$time',
            status = '$status',
            address_complainant = '$address_complainant',
            complained_name = '$complained_name',
            add_complained_name = '$add_complained_name',
            details_reason = '$details_reason',
            place = '$place'
        WHERE id = '$id'
    ";

    if (mysqli_query($conn, $sql)) {
        echo "<script>window.location.href='/BIS/user_login/user_panel/loading_update.php';</script>";
    } else {
        echo "Error updating blotter: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
