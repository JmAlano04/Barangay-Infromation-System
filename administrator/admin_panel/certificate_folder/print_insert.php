<?php

    require("../../../database/conn_db.php");

  if(isset($_POST['sub_print'])){
        $id = trim($_POST["id_print"]);
        $purpose =trim($_POST["purpose_print"]);

        $document = trim($_POST["document_print"]);
    
        $status = trim($_POST["status_print"]);

        $amount = trim($_POST["amount"]);
        $current_date = trim($_POST["current_date"]);

         // Add 1 month using strtotime
        $exd_date = date('Y-m-d', strtotime($current_date . ' +12 month'));

     

        $firstname = trim($_POST["firstname_print"]);
        $middlename = trim($_POST["middlename_print"]);
        $lastname = trim($_POST["lastname_print"]);
          

          $sql = "INSERT INTO barangay_revenue (user_id,expired_date, firstname, middlename, lastname, document_amount, date_issue, document_type )
           VALUES ('$id', '$exd_date', '$firstname', '$middlename', '$lastname', '$amount', '$current_date', '$document')";



                if (mysqli_query($conn, $sql)) {


                  $sqls = "UPDATE  barangay_request 
                  SET status='$status', purpose='$purpose' WHERE id = $id";


                    $result = mysqli_query($conn, $sqls);
                    if ($result == true) {
                    
                   switch ($document) {
                    case "Barangay Clearance":
                      
                      include('document/barangay_clearance.php');
                      break;
                    case "Barangay Certificate":
                    
                          include('document/barangay_certificate.php');
                      break;
                    case "Barangay Indigency":
                      include('document/baranagy_indigency.php');
                      break;
                    case "Barangay ID":
                      include('document/barangay_ID.php');
                      break;
                     case "Business Permit":
                        include('document/business_permit.php');
                        break;
                      case "Barangay Cedula":
                            ?>
                            <script>
                              window.location.href = '/BIS/administrator/admin_panel/certificate_folder/loading.php';
                            </script>
                            <?php
                          break;
                    
                      default:
                      echo "error";
                    }

                   }
                   
                  }
                

                
               
                  
               
  }
                  

              

      
     
?>