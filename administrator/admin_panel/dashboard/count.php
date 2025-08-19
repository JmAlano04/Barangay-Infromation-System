<?php


function population_total() {
   require("../../database/conn_db.php");
   $result = $conn->query("SELECT * FROM barangay_request");
   $count = $result->num_rows;
   echo number_format($count);
 }


 function completed_total() {
  require("../../database/conn_db.php");

  $result = $conn->query("SELECT * FROM barangay_request WHERE status = 'Released' OR status = 'Ready to Pick-up'");

  if ($result) {
      $count = $result->num_rows;
      echo number_format($count);
  } else {
      echo "Error in query: " . $conn->error;
  }
}

 
  function pending_total() {
    require("../../database/conn_db.php");
    $result = $conn->query("SELECT * FROM barangay_request WHERE status='Pending'");
    $count = $result->num_rows;
    echo number_format($count);
  }
 
 function document_male_total(){
  require("../../database/conn_db.php");
  $result = $conn->query("SELECT * FROM barangay_request WHERE gender = 'male'");
  $count = $result->num_rows;
  echo  number_format($count);
 }

 function document_female_total(){
  require("../../database/conn_db.php");
  $result = $conn->query("SELECT * FROM barangay_request WHERE gender = 'female'");
  $count = $result->num_rows;
  echo  number_format($count);
 }

 function document_prefer_total(){
    require("../../database/conn_db.php");
    $result = $conn->query("SELECT * FROM barangay_request WHERE gender = 'Prefer not to say'");
    $count = $result->num_rows;
    echo  number_format($count);
   }
  

 
 function user_registered_list(){
    require("../../database/conn_db.php");
    $result = $conn->query("SELECT *  FROM user_account ");
    $count = $result->num_rows;
    echo  number_format($count);
   }

   function admin_list(){
    require("../../database/conn_db.php");
    $result = $conn->query("SELECT *  FROM admin_account ");
    $count = $result->num_rows;
    echo  number_format($count);
   }


 function revenue_total() {
    require("../../database/conn_db.php");

    // Query to calculate the total sum of document_amount
    $result = $conn->query("SELECT SUM(document_amount) AS total FROM barangay_revenue");

    if ($result) {
        $row = $result->fetch_assoc();
        $total = $row['total'] ?? 0; // Default to 0 if NULL

        // Format as money (e.g., 1,234.00)
        echo "₱" . number_format($total, 2);
    } else {
        echo "Error: " . $conn->error; // Display error if query fails
    }
}



?>