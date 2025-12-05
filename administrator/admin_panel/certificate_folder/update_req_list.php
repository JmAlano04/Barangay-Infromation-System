<?php

    require("../../../database/conn_db.php");

  if(isset($_POST['sub_upd'])){
        $id = trim($_POST["id_manage"]);
        $firstname = trim($_POST["firstname_upd"]);
        $middlename = trim($_POST["middlename_upd"]);
        $lastname = trim($_POST["lastname_upd"]);

        $age = trim($_POST["age_upd"]);
        $request_document = trim($_POST["request_document_upd"]);
        $house_no = trim($_POST["house_no_upd"]);

        $sitio_pook = $_POST["sitio_pook_upd"];

        $birthday = trim($_POST["birthday_upd"]);
        $place_of_birth = trim($_POST["place_of_birth_upd"]);
        $contact_no = trim($_POST["contact_no_upd"]);

        $contact_person = trim($_POST["contact_person_upd"]);
        $contact_no_contact_person = trim($_POST["contact_person_no_upd"]);
        $live_since_year  = trim($_POST["live_since_upd"]);

        $purpose  = trim($_POST["purpose_upd"]);
        $status  = trim($_POST["status_upd"]);
        $gender  = trim($_POST["gender_upd"]);
   
        $fileName = $_FILES["image"]["name"];
        $fileSize =$_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validImageExtension =  ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));



        if($_FILES["image"]["error"] == 4){

            $sql = "UPDATE  barangay_request as req JOIN barangay_revenue as rev ON rev.user_id = req.id
            SET req.firstname= '$firstname' , req.middlename= '$middlename' , req.lastname= '$lastname' , req.age= '$age', req.request_document= '$request_document', req.house_number= '$house_no' , req.sitio_pook='$sitio_pook' , req.birthday='$birthday', req.place_of_birth='$place_of_birth' , req.contact_no='$contact_no', req.contact_person='$contact_person', req.contact_no_contact_person='$contact_no_contact_person' , req.contact_no_contact_person='$contact_no_contact_person', req.live_since_year='$live_since_year' , req.purpose='$purpose', req.status='$status', req.gender='$gender'   WHERE rev.OR_no= rev.OR_no";
              
              $sql = "UPDATE  barangay_request 
              SET firstname= '$firstname' , middlename= '$middlename' , lastname= '$lastname' , age= '$age', request_document= '$request_document', house_number= '$house_no' , sitio_pook='$sitio_pook' , birthday='$birthday', place_of_birth='$place_of_birth' , contact_no='$contact_no', contact_person='$contact_person', contact_no_contact_person='$contact_no_contact_person' , contact_no_contact_person='$contact_no_contact_person', live_since_year='$live_since_year' , purpose='$purpose', status='$status', gender='$gender'  WHERE id = $id";
  
                $result = mysqli_query($conn, $sql);
                if ($result == true) {
                  
                    ?>
                    <script>
                        window.location.href = "/BIS/administrator/admin_panel/certificate_folder/loading_update.php";
                      
                    </script>
                    
                    <?php
                   
                  } 
              }else{
                $fileName = $_FILES["image"]["name"];
                $fileSize =$_FILES["image"]["size"];
                $tmpName = $_FILES["image"]["tmp_name"];
      
                $validImageExtension =  ['jpg', 'jpeg', 'png'];
                $imageExtension = explode('.', $fileName);
                $imageExtension = strtolower(end($imageExtension));
      
                if(!in_array($imageExtension, $validImageExtension)){
                  echo "
                    <script>alert('Invalid Image Extension ')</script>
                   
                  ";
                  echo "<script>window.location.href = '/BIS/administrator/admin_panel/brgy_info.php'</script>";
                }else if($fileSize > 1000000){
                  echo "<script>alert('Image Size Is too Large')</script>";
                  echo "<script>window.location.href = '/BIS/administrator/admin_panel/brgy_info.php'</script>";
                }else{
                  $newImageName = uniqid();
                  $newImageName .= '.' . $imageExtension;
      
                  move_uploaded_file($tmpName, '../../../asset/image/user_profile/'. $newImageName );
    
                  $sql = "UPDATE  barangay_request as req JOIN barangay_revenue as rev ON rev.user_id = req.id
            SET req.firstname= '$firstname' , req.middlename= '$middlename' , req.lastname= '$lastname' , req.age= '$age', req.request_document= '$request_document', req.house_number= '$house_no' , req.sitio_pook='$sitio_pook' , req.birthday='$birthday', req.place_of_birth='$place_of_birth' , req.contact_no='$contact_no', req.contact_person='$contact_person', req.contact_no_contact_person='$contact_no_contact_person' , req.contact_no_contact_person='$contact_no_contact_person', req.live_since_year='$live_since_year' , req.purpose='$purpose', req.status='$status', req.gender='$gender', req.profile='$newImageName' WHERE req.id = $id";
              
              $sql = "UPDATE  barangay_request 
              SET firstname= '$firstname' , middlename= '$middlename' , lastname= '$lastname' ,  age= '$age', request_document= '$request_document', house_number= '$house_no' , sitio_pook='$sitio_pook' , birthday='$birthday', place_of_birth='$place_of_birth' , contact_no='$contact_no', contact_person='$contact_person', contact_no_contact_person='$contact_no_contact_person' , contact_no_contact_person='$contact_no_contact_person', live_since_year='$live_since_year' , purpose='$purpose', status='$status', gender='$gender' , profile='$newImageName'  WHERE id = $id";
    
    
                  if (mysqli_query($conn, $sql)) {
                
                    ?>
                    <script>
                        
                        window.location.href = "/BIS/administrator/admin_panel/certificate_folder/loading_update.php";
                        // <button id = "certificate" type ="button" click="loadContent('certificate_folder/certificate.php')">Barangay Certificate</button>

   
                    </script>
                    
                    <?php
                   
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }
                
                mysqli_close($conn);
                }
    
                }

     
        
    
      
     }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   

    <form action="certificate_folder/update_req_list.php" class = "form_manage" method = "POST" enctype = "multipart/form-data" >
    <h1 style = "color:#4A9D4f; font-size:1.3rem;"><svg style = "width:20px;fill:#4A9D4f;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg> Edit List</h1>

    <div class = "main_div_manage">
        <div>
            <input type="file"  name = "image" accept = ".jpg, .jpeg, .png" id = "images" style = "border:1px solid #4A9D4f; padding-top:5px;"><br>
            <label for="">Firstname</label><br>
            <input type="text" name = "firstname_upd" id = "firstname_upd" required><br>

            <label for="">Middlename</label><br>
            <input type="text" name = "middlename_upd" id = "middlename_upd" ><br>
            
            <label for="">Lastname</label><br>
            <input type="text" name = "lastname_upd" id = "lastname_upd" required><br>

            <label for="">Age</label><br>
            <input type="number" name = "age_upd" id = "age_upd" required><br>

            <label for="">Birthday</label><br>
            <input type="date" name = "birthday_upd" id = "birthday_upd" required><br>

            <label for="">Place of Birth</label><br>
            <input type="text" name = "place_of_birth_upd" id = "place_of_birth_upd" required><br>

            <label for="">Gender</label><br>
                <select id = "gender_upd" name = "gender_upd" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Prefer not to say">Prefer not to say</option>
                </select><br>

            <label for="">House no.</label><br>
            <input type="text" id = "house_no_upd" name = "house_no_upd" required><br>

           
            

         


        </div>


         <div style = "margin-top:-20px;">
         <label for="">Sitio/Pook</label><br>
         <input id = "sitio_pook_update" name = "sitio_pook_upd" required /> <br>

         <label for="">Purpose</label><br>
        <input type="text" id = "purpose_upd" name = "purpose_upd" required><br>

         <label for="">Contact no.</label><br>
         <input type="tel" id = "contact_no_upd" name = "contact_no_upd" pattern="[0-9]{11}"> <br>

             <label for="">Contact Person</label><br>
            <input type="text" id = "contact_person_upd" name = "contact_person_upd" ><br>

            <label for="">Contact no.</label><br>
            <input type="tel" id = "contact_person_no_upd" name = "contact_person_no_upd" pattern="[0-9]{11}"><br>
            
            <label for="">Document Type</label><br>
                <select id="request_document_upd" name = "request_document_upd" required>
                <option value="Barangay Clearance">Barangay Clearance</option>
                <option value="Barangay Certificate">Barangay Certificate</option>
                <option value="Barangay Indigency">Barangay Indigency</option>
                <option value="Barangay ID">Barangay ID</option>
                <option value="Business Permit">Business Permit</option>
                <option value="Barangay Cedula">Barangay Cedula</option>

                </select><br>

          

            <label for="">Live Since (Month/Year)</label><br>
            <input type="month" id = "live_since_upd" name = "live_since_upd" required><br>

            
            <label for="">Status</label><br>
            <select id="status_upd" name = "status_upd" required>
            <option value= "No data" >No data</option>
            <option value= "Pending">Pending</option>
            <option value= "Processing">Processing</option>
            <option value= "Ready to Pick-up">Ready to Pick-up</option>
            <option value= "Released">Released</option>
            <option value= "Invalid Purpose">Invalid Purpose</option>
    
            </select><br>

           



            <input type="hidden" name = "id_manage" id = "id_upd">
            

           
        </div>
    </div>
       

    <div class = "action_submit">
            
            <input type="reset" id = "cancel" name = "cancel_upd">
            <input type="submit" id = "submit" name = "sub_upd">
    </div>



    </form>
</body>
</html>