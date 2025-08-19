<?php

    require('../../database/conn_db.php');
    
     if (isset($_POST['submit_request'])) {
        $user_id = trim($_POST['user_id']);
        $id = trim($_POST['id']);

        $business_name = trim($_POST['business_permit']);
        $firstname = trim($_POST['firstname']);
        $middlename = trim($_POST['middlename']);
        $lastname = trim($_POST['lastname']);

        $age = trim($_POST['age']);
        $house_no = trim($_POST['house_no']);
        $request_document = trim($_POST['request_document']);

        $birthday = trim($_POST['date_birthday']);
        $place_of_birth = trim($_POST['place_of_birth']);
        $contact_no = trim($_POST['contact_no']);

        $contact_person = trim($_POST['contact_person']);
        $contact_person_no = trim($_POST['contact_person_no']);
        $live_since_year = trim($_POST['live_since_year']);

        $purpose = trim($_POST['purpose']);
        $status = trim($_POST['status']);
        $gender = trim($_POST['gender']);

        $sitio_pook = trim($_POST['Sitio_Pook']);

        $profile = trim($_POST['profile_user']);

        date_default_timezone_set("Asia/Manila");
        $date_request = date("Y-m-d");

        date_default_timezone_set("Asia/Manila");

        $control_no =  $id . date("hs");

        
            if( true){
                
                $sqls = "INSERT INTO barangay_request (firstname, middlename, lastname, age, request_document, house_number, birthday, place_of_birth, contact_no, contact_person, contact_no_contact_person, live_since_year, purpose, status, gender, date_request, sitio_pook, user_id , profile, business_name, control_no)
            VALUES ('$firstname', '$middlename', '$lastname' , '$age', '$request_document', '$house_no', '$birthday', '$place_of_birth', '$contact_no' , '$contact_person', '$contact_person_no' , '$live_since_year' , '$purpose' , '$status', '$gender', '$date_request', '$sitio_pook' , '$user_id' , '$profile' , '$business_name', '$control_no')";

                if(mysqli_query($conn, $sqls)){
                    echo "<script>window.location.href = 'successful.php'</script>";
                // }
                
                    
            }


        else if ($id == $id){

            $sqls = "INSERT INTO barangay_request (firstname, middlename, lastname, age, request_document, house_number, birthday, place_of_birth, contact_no, contact_person, contact_no_contact_person, live_since_year, purpose, status, gender, date_request, sitio_pook, user_id , profile, business_name, control_no)
            VALUES ('$firstname', '$middlename', '$lastname' , '$age', '$request_document', '$house_no', '$birthday', '$place_of_birth', '$contact_no' , '$contact_person', '$contact_person_no' , '$live_since_year' , '$purpose' , '$status', '$gender', '$date_request', '$sitio_pook' , '$user_id' , '$profile' , '$business_name' , '$control_no')";


            if(mysqli_query($conn, $sqls)){
                echo "<script>window.location.href = 'successful.php'</script>";
            }
            
        }
        
         }
     }



?>