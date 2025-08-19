<?php


function certificate_notif(){
    require("../../database/conn_db.php");
    $result = $conn->query("SELECT 	request_document FROM barangay_request WHERE status = 'Pending' AND request_document = 'Barangay Certificate'");
    $count = $result->num_rows;

    if ($count >= 1) {
        echo $count;
    } else {
        echo '<script>
                document.getElementById("notif").style.display = "none";
              </script>';
    }
}

function clearance_notif(){
    require("../../database/conn_db.php");
    $result = $conn->query("SELECT 	request_document FROM barangay_request WHERE status = 'Pending' AND request_document = 'Barangay clearance'");
    $count = $result->num_rows;

    if ($count >= 1) {
        echo $count;
    } else {
        echo '<script>
                document.getElementById("clearance_notif").style.display = "none";
              </script>';
    }
}

function indigency_notif(){
    require("../../database/conn_db.php");
    $result = $conn->query("SELECT 	request_document FROM barangay_request WHERE status = 'Pending' AND request_document = 'Barangay Indigency'");
    $count = $result->num_rows;

    if ($count >= 1) {
        echo $count;
    } else {
        echo '<script>
                document.getElementById("indigency_notif").style.display = "none";
              </script>';
    }
}

function id_notif(){
    require("../../database/conn_db.php");
    $result = $conn->query("SELECT 	request_document FROM barangay_request WHERE status = 'Pending' AND request_document = 'Barangay id'");
    $count = $result->num_rows;

    if ($count >= 1) {
        echo $count;
    } else {
        echo '<script>
                document.getElementById("id_notif").style.display = "none";
              </script>';
    }
}

function permit_notif(){
    require("../../database/conn_db.php");
    $result = $conn->query("SELECT 	request_document FROM barangay_request WHERE status = 'Pending' AND request_document = 'Business Permit'");
    $count = $result->num_rows;

    if ($count >= 1) {
        echo $count;
    } else {
        echo '<script>
                document.getElementById("permit_notif").style.display = "none";
              </script>';
    }
}

function cedula_notif(){
    require("../../database/conn_db.php");
    $result = $conn->query("SELECT 	request_document FROM barangay_request WHERE status = 'Pending' AND request_document = 'Barangay Cedula'");
    $count = $result->num_rows;

    if ($count >= 1) {
        echo $count;
    } else {
        echo '<script>
                document.getElementById("cedula_notif").style.display = "none";
              </script>';
    }
}
?>
