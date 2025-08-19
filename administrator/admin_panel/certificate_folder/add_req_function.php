<?php

    require("../../../database/conn_db.php");

  if(isset($_POST['sub_add_request'])){
        $id = trim($_POST["id_manage_add"]);
        $firstname = trim($_POST["firstname_add"]);
        $middlename = trim($_POST["middlename_add"]);
        $lastname = trim($_POST["lastname_add"]);

        $age = trim($_POST["age_add"]);
        $request_document = trim($_POST["request_document_add"]);
        $house_no = trim($_POST["house_no_add"]);

        $sitio_pook = $_POST["sitio_pook_add"];

        $birthday = trim($_POST["birthday_add"]);
        $place_of_birth = trim($_POST["place_of_birth_add"]);
        $contact_no = trim($_POST["contact_no_add"]);

        $contact_person = trim($_POST["contact_person_add"]);
        $contact_no_contact_person = trim($_POST["contact_person_no_add"]);
        $live_since_year  = trim($_POST["live_since_add"]);

        $purpose  = trim($_POST["purpose_add"]);
        $status  = trim($_POST["status_add"]);
        $gender  = trim($_POST["gender_add"]);
        
        date_default_timezone_set("Asia/Manila");
        $date_request = date("Y-m-d");

        $control_no =  $id . date("hs");

        $fileName = $_FILES["image"]["name"];
        $fileSize =$_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validImageExtension =  ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
    
        
        if($_FILES["image"]["error"] == 4){
          echo "<script>alert('Image Does Not Exist')</script>";
         echo " <script>window.location.href = '/BIS/administrator/admin_panel/certificate.php'</script>";
        }else{
          $fileName = $_FILES["image"]["name"];
          $fileSize =$_FILES["image"]["size"];
          $tmpName = $_FILES["image"]["tmp_name"];

          $validImageExtension =  ['jpg', 'jpeg', 'png'];
          $imageExtension = explode('.', $fileName);
          $imageExtension = strtolower(end($imageExtension));

          if(!in_array($imageExtension, $validImageExtension)){
            echo "
              <script>alert('Invalid Image Extension ');
              
              window.location.href = '/BIS/administrator/admin_panel/certificate.php'
              </script>
             
            ";
         
            
          }else if($fileSize > 1000000){
            echo "<script>alert('Image Size Is too Large');
            window.location.href = '/BIS/administrator/admin_panel/certificate.php'
            </script>";
           
          }else{
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;

            move_uploaded_file($tmpName, '../../../asset/image/user_profile/'. $newImageName );

           
            $sql = "INSERT INTO barangay_request (firstname, middlename, lastname, age, 	request_document, house_number, birthday, place_of_birth, contact_no, contact_person, contact_no_contact_person, live_since_year, 	purpose, 	status, gender ,sitio_pook, date_request, profile , control_no)
            VALUES ( '$firstname', '$middlename','$lastname','$age','$request_document' 
            ,'$house_no','$birthday','$place_of_birth','$contact_no','$contact_person','$contact_no_contact_person','$live_since_year','$purpose'
            ,'$status','$gender','$sitio_pook', '$date_request' , '$newImageName', '$control_no')";


            $result = mysqli_query($conn, $sql);


            
           if ($result === TRUE) {

            ?>
            <script>
                window.location.href = "/BIS/administrator/admin_panel/certificate_folder/loading_add.php";
            </script>
            
             <?php
            
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }

          }
        }


        



      
     }
?>