<?php
 function jan_total() {
    require("../../database/conn_db.php");

    // Adjust 'date_column' to the actual name of your date column
    $result = $conn->query("
        SELECT * 
        FROM barangay_request 
        WHERE MONTH(date_request) = 1
    ");

    $count = $result->num_rows;
    echo number_format($count);
}
function feb_total() {
    require("../../database/conn_db.php");

    // Adjust 'date_column' to the actual name of your date column
    $result = $conn->query("
        SELECT * 
        FROM barangay_request 
        WHERE MONTH(date_request) = 2
    ");

    $count = $result->num_rows;
    echo number_format($count);
}
function mar_total() {
    require("../../database/conn_db.php");

    // Adjust 'date_column' to the actual name of your date column
    $result = $conn->query("
        SELECT * 
        FROM barangay_request 
        WHERE MONTH(date_request) = 3
    ");

    $count = $result->num_rows;
    echo number_format($count);
}function apr_total() {
    require("../../database/conn_db.php");

    // Adjust 'date_column' to the actual name of your date column
    $result = $conn->query("
        SELECT * 
        FROM barangay_request 
        WHERE MONTH(date_request) = 4
    ");

    $count = $result->num_rows;
    echo number_format($count);
}function may_total() {
    require("../../database/conn_db.php");

    // Adjust 'date_column' to the actual name of your date column
    $result = $conn->query("
        SELECT * 
        FROM barangay_request 
        WHERE MONTH(date_request) = 5
    ");

    $count = $result->num_rows;
    echo number_format($count);
}function jun_total() {
    require("../../database/conn_db.php");

    // Adjust 'date_column' to the actual name of your date column
    $result = $conn->query("
        SELECT * 
        FROM barangay_request 
        WHERE MONTH(date_request) = 6
    ");

    $count = $result->num_rows;
    echo number_format($count);
}function jul_total() {
    require("../../database/conn_db.php");

    // Adjust 'date_column' to the actual name of your date column
    $result = $conn->query("
        SELECT * 
        FROM barangay_request 
        WHERE MONTH(date_request) = 7
    ");

    $count = $result->num_rows;
    echo number_format($count);
}function aug_total() {
    require("../../database/conn_db.php");

    // Adjust 'date_column' to the actual name of your date column
    $result = $conn->query("
        SELECT * 
        FROM barangay_request 
        WHERE MONTH(date_request) = 8
    ");

    $count = $result->num_rows;
    echo number_format($count);
}function sept_total() {
    require("../../database/conn_db.php");

    // Adjust 'date_column' to the actual name of your date column
    $result = $conn->query("
        SELECT * 
        FROM barangay_request 
        WHERE MONTH(date_request) = 9
    ");

    $count = $result->num_rows;
    echo number_format($count);
}function oct_total() {
    require("../../database/conn_db.php");

    // Adjust 'date_column' to the actual name of your date column
    $result = $conn->query("
        SELECT * 
        FROM barangay_request 
        WHERE MONTH(date_request) = 10
    ");

    $count = $result->num_rows;
    echo number_format($count);
}function nov_total() {
    require("../../database/conn_db.php");

    // Adjust 'date_column' to the actual name of your date column
    $result = $conn->query("
        SELECT * 
        FROM barangay_request 
        WHERE MONTH(date_request) = 11
    ");

    $count = $result->num_rows;
    echo number_format($count);
}function dec_total() {
    require("../../database/conn_db.php");

    // Adjust 'date_column' to the actual name of your date column
    $result = $conn->query("
        SELECT * 
        FROM barangay_request 
        WHERE MONTH(date_request) = 12
    ");

    $count = $result->num_rows;
    echo number_format($count);
}



?>