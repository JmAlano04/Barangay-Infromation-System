
<?php
       
       require('../../../database/conn_db.php');

       if(isset($_POST["submit_resident"])){
      

     

         $firstname = trim($_POST["firstname"]);
         $middlename = trim($_POST["middlename"]);
         $lastname = trim($_POST["lastname"]);

        
         $place_of_birth = trim($_POST["place_of_birth"]);
         $birthday = trim($_POST["date"]);
        
         $age = trim($_POST["age"]);
         $civil_status = trim($_POST["civil-status"]);
         $gender = trim($_POST["gender"]);

         $email = trim($_POST["email"]);
         $contact_no = trim($_POST["contact_no"]);
         $occupation = trim($_POST["occupation"]);

         $voter_status = trim($_POST["voter-status"]);
         $citizenship = trim($_POST["citezenship"]);
         $house_no = trim($_POST["house_no"]);
        
         $sitio_pook = trim($_POST["sitio_pook_add"]);
    

        // if($_FILES["image"]["error"] == 4){
        //   echo "<script>alert('Image Does Not Exist')</script>";
        //  echo " <script>window.location.href = '/BIS/administrator/admin_panel/brgy_resident_folder/add_resident.php'</script>";
        // }else{
        //   $fileName = $_FILES["image"]["name"];
        //   $fileSize =$_FILES["image"]["size"];
        //   $tmpName = $_FILES["image"]["tmp_name"];

        //   $validImageExtension =  ['jpg', 'jpeg', 'png'];
        //   $imageExtension = explode('.', $fileName);
        //   $imageExtension = strtolower(end($imageExtension));

        //   if(!in_array($imageExtension, $validImageExtension)){
        //     echo "
        //       <script>alert('Invalid Image Extension ')</script>
             
        //     ";
        //     echo " <script>window.location.href = '/BIS/administrator/admin_panel/brgy_resident_folder/add_resident.php'</script>";
            
        //   }else if($fileSize > 1000000){
        //     echo "<script>alert('Image Size Is too Large')</script>";
        //     echo " <script>window.location.href = '/BIS/administrator/admin_panel/brgy_resident_folder/add_resident.php'</script>";
        //   }else{
        //     $newImageName = uniqid();
        //     $newImageName .= '.' . $imageExtension;

        //     move_uploaded_file($tmpName, '../../../asset/image/resident_profile/'. $newImageName );

            $sql = "INSERT INTO barangay_resident (firstname, middlename, lastname, place_of_birth, birthday, age, civil_status, gender, email, contact_no, occupation, voter_status, citizenship, house_no,sitio_pook)
            VALUES ( '$firstname','$middlename','$lastname','$place_of_birth','$birthday','$age','$civil_status','$gender','$email','$contact_no'
            ,'$occupation','$voter_status','$citizenship','$house_no','$sitio_pook')";

            $result = mysqli_query($conn, $sql);


            
           if ($result === TRUE) {

            echo"
                 <script> 
                     window.location.href ='loading_add.php';
                  </script> ";
                 
            
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }

          }
        






          

         

       
       
       
       ?>