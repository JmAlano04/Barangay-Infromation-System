<?php

    require("../../../database/conn_db.php");

  if(isset($_POST['sub_cert'])){
        $id = trim($_POST["id_cert"]);
        $firstname = trim($_POST["firstname_cert"]);
        $middlename = trim($_POST["middlename_cert"]);
        $lastname = trim($_POST["lastname_cert"]);

        $age = trim($_POST["age_cert"]);
        $request_document = trim($_POST["request_document_cert"]);
        $house_no = trim($_POST["house_no_cert"]);

        $sitio_pook = $_POST["sitio_pook"];

        $birthday = trim($_POST["birthday_cert"]);
        $place_of_birth = trim($_POST["place_of_birth_cert"]);
        $contact_no = trim($_POST["contact_no_cert"]);

        $contact_person = trim($_POST["contact_person_cert"]);
        $contact_no_contact_person = trim($_POST["contact_no_contact_person_cert"]);
        $live_since_year  = trim($_POST["live_since_year_cert"]);

        $purpose  = trim($_POST["purpose_cert"]);
        $status  = trim($_POST["status_cert"]);
        $gender  = trim($_POST["gender_cert"]);


        $date_issue  = trim($_POST["date_issue_cert"]);

        $exp_date_issue  = trim($_POST["ex_date_issue_cert"]);

        $exp_date_issue = strtotime("+12 Months");
        
        $ex = date("Y-m-d", $exp_date_issue);
      
            
        $sql = "INSERT INTO barangay_manage (id, firstname, middlename, lastname, age, request_document, house_no, birthday, place_of_birth, contact_no, contact_person, contact_no_contact_person, live_since_year, purpose, status, gender , date_issue, expired_date ,sitio_pook)
        VALUES ('$id', '$firstname', '$middlename', '$lastname', '$age', '$request_document', '$house_no', '$birthday', '$place_of_birth', '$contact_no', '$contact_person', '$contact_no_contact_person', '$live_since_year', '$purpose', '$status', '$gender' , '$date_issue', '$ex', '$sitio_pook')";
                
                if (mysqli_query($conn, $sql)) {

                    ?>
                    <script>
                        window.location.href = "/BIS/administrator/admin_panel/certificate_folder/loading.php";
                    </script>
                    
                    <?php
                   



                    
                  } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                  }
                  
                  mysqli_close($conn);
      
     }
?>