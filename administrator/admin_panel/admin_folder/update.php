<?php
// Connect to database
    require("../../../database/conn_db.php");

    if(isset($_POST['submit_add_edit'])){
        $user_id = trim($_POST["user_id"]);
        
        $firstname_edit = trim($_POST["firstname_edit"]);
        $middlename_edit = trim($_POST["middlename_edit"]);
        $lastname_edit = trim($_POST["lastname_edit"]);

        $gender_edit = trim($_POST["gender_edit"]);
        $age_edit = trim($_POST["age_edit"]);

        $date_created_edit = trim($_POST["date_created_edit"]);
        $user_type_edit = trim($_POST["user_type_edit"]);
        $status_edit = trim($_POST["status_edit"]);
        
        $email_edit = trim($_POST["email_edit"]);
        // $username_edit = trim($_POST["username_edit"]);
        // $password_edit = trim($_POST["password_edit"]);

        $age_edit = trim($_POST["age_edit"]);
       
       

        $fileName = $_FILES["image"]["name"];
        $fileSize =$_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validImageExtension =  ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));



        if($_FILES["image"]["error"] == 4){
          


            $sql = "UPDATE admin_account SET firstname='$firstname_edit' , middlename='$middlename_edit', lastname='$lastname_edit' , gender='$gender_edit' , age='$age_edit', date_created='$date_created_edit', user_type='$user_type_edit', status='$status_edit', email='$email_edit', age='$age_edit' WHERE user_id=$user_id";

            if (mysqli_query($conn, $sql)) {

                echo "<script>window.location.href = 'loading_update.php';</script>";
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
              echo "<script>window.location.href = '/BIS/administrator/admin_panel/admin_folder/admin_manage.php';</script>";
            }else if($fileSize > 1000000){
              echo "<script>alert('Image Size Is too Large')</script>";
              echo "<script>window.location.href = '/BIS/administrator/admin_panel/administrator_account.php';</script>";
            }else{
              $newImageName = uniqid();
              $newImageName .= '.' . $imageExtension;
  
              move_uploaded_file($tmpName, '../../../asset/image/admin/'. $newImageName );
                
              $sql = "UPDATE admin_account SET firstname='$firstname_edit' , middlename='$middlename_edit', lastname='$lastname_edit' , gender='$gender_edit' , age='$age_edit', date_created='$date_created_edit', user_type='$user_type_edit', status='$status_edit', email='$email_edit', age='$age_edit' , admin_profile='$newImageName' WHERE user_id=$user_id";


              if (mysqli_query($conn, $sql)) {
            
                echo "<script>window.location.href = 'loading_update.php';</script>";
               
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
            
            mysqli_close($conn);
            }

            }
       
    }
    
  ?>

    







