<?php
require("../../database/conn_db.php");

// Get and sanitize the search input to avoid SQL injection
$input = isset($_GET['input']) ? $conn->real_escape_string($_GET['input']) : '';

// Check if there is an input to search
if ($input != '') {
    // SQL query to search for matching records based on the input
    $sql = "SELECT * FROM barangay_request 
            WHERE request_document LIKE '%$input%' 
            OR firstname LIKE '%$input%' 
                OR lastname LIKE '%$input%' 
                OR control_no LIKE '%$input%' 
                OR purpose LIKE '%$input%'
                 OR status LIKE '%$input%'
                  OR date_request LIKE '%$input%'
            ORDER BY id DESC";

    $result = $conn->query($sql);

    // Set headers to initiate CSV file download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="barangay_cert_export.csv"');

    $output = fopen('php://output', 'w');

    // Write CSV headers
    fputcsv($output, ['Firstname', 'Middlename' , 'Lastname' , 'Age', 'House Number', 'Sitio/Pook', 'Birthday' , 'Place of Birth', 'Contact #' , 'Contact Person' , 'Contact # of Contact Person', 'Live Since Year', 'Purpose', 'sex', 'Business Name', 'Photo' , 'User ID' , 'Request Documnet' , 'Date Requst' , 'Status', 'Control Number']);

    // If results are found, write them to the CSV
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $firstname = $row['firstname'];
            $middlename = $row['middlename'];
            $lastname = $row['lastname'];

            $age = $row['age'];
            $house_no = $row['house_number'];
            $sitio_pook = $row['sitio_pook'];

            $birthday = $row['birthday'];
            $place_of_birth  = $row['place_of_birth'];
            $contact_no = $row['contact_no'];

            $contact_person = $row['contact_person'];
            $contact_no_contact_person = $row['contact_no_contact_person'];
            $live_since_year = $row['live_since_year'];

            $purpose = $row['purpose'];
            $gender = $row['gender'];
            $business_name  = $row['business_name'];

            $profile = $row['profile'];
            $user_id = $row['user_id'];
            $request_document = $row['request_document'];

            $date_request = date('m/d/Y', strtotime($row['date_request']));
            
            $status_map = [
                'No data' => 'No data',
                'Pending' => 'Pending',
                'Processing' => 'Processing',
                'Ready to Pick-up' => 'Ready to Pick-up',
                'Released' => 'Released',
                'Invalid Purpose' => 'Invalid Purpose'
            ];
            
            $status = $status_map[$row['status']] ?? 'Unknown';

            $control_no = $row['control_no'];
            

            // Write each record to CSV
            fputcsv($output, [$firstname,$middlename,$lastname, $age, $house_no, $sitio_pook, $birthday, $place_of_birth, $contact_no, $contact_person, $contact_no_contact_person, $live_since_year, $purpose, $gender, $business_name, $profile, $user_id, $request_document, $date_request, $status, $control_no]);
        }
    } else {
        // If no results, indicate it in the CSV file
        fputcsv($output, ['No matching records found.', '', '', '', '', '']);
    }

    // Close the file output and the database connection
    fclose($output);
} else {
    // If no search input provided, you might want to handle this case
    echo "<script>alert('Please enter a search term.');
        window.location.href = '/BIS/administrator/admin_panel/certificate.php';
    </script>";
}

$conn->close();
exit;
?>
