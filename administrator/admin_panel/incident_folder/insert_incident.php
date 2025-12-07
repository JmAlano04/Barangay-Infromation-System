<?php
require('../../../database/conn_db.php');

if (isset($_POST["save_incident"])) {

    // Retrieve the general incident data
    $cause_incident = trim($_POST["cause_incident"]);
    $time = trim($_POST["time"]);
    $date = trim($_POST["date"]);
    $status = trim($_POST["status"]);

    // Retrieve the array of parties involved
    $persons = $_POST["person"]; // Array of names
    $addresses = $_POST["address"]; // Array of addresses
    $vehicles = $_POST["vehicle"]; // Array of vehicles
    $licenses = $_POST["license"]; // Array of licenses
    $plates = $_POST["plate"]; // Array of plates

    date_default_timezone_set('Asia/Manila'); // Philippine Time

    $date_filed = date('Y-m-d H:i:s'); // Format: 2025-12-07 14:30:22

    // Loop through each party's data and insert it into the database
    foreach ($persons as $key => $person) {
        $address = $addresses[$key];
        $vehicle = $vehicles[$key];
        $license = $licenses[$key];
        $plate = $plates[$key];

        // Ensure data is safe for SQL by escaping input values
        $person = $conn->real_escape_string($person);
        $address = $conn->real_escape_string($address);
        $vehicle = $conn->real_escape_string($vehicle);
        $license = $conn->real_escape_string($license);
        $plate = $conn->real_escape_string($plate);

        // Prepare and execute the SQL insert query for each person involved
        $sql = "INSERT INTO barangay_incident 
                (cause_incident, date, time, name_involve, address, vehicle, license, plate_no, status, date_filed) 
                VALUES 
                ('$cause_incident', '$date', '$time', '$person', '$address', '$vehicle', '$license', '$plate', '$status', '$date_filed')";

        if (!$conn->query($sql)) {
            // If there is an error in the query, output the error
            echo "Error: " . $sql . "<br>" . $conn->error;
            exit;
        }
    }

    // If all inserts are successful, redirect to the incident page
    echo "<script>window.location.href = '/BIS/administrator/admin_panel/incident.php'</script>";
}
?>
