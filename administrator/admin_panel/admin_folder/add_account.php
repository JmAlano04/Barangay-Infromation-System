
<?php
       
       require('../../../database/conn_db.php');
       if(isset($_POST["submit_add"])){
         $firstname = trim($_POST["firstname"]);
         $middlename = trim($_POST["middlename"]);
         $lastname = trim($_POST["lastname"]);
         $gender = trim($_POST["gender"]);
         $age = trim($_POST["age"]);
         $date_created = trim($_POST["date_created"]);
         $status = trim($_POST["status"]);
         $user_type = trim($_POST["user_type"]);
         $email = trim($_POST["email"]);
      
         $password = trim($_POST["password"]);




        
         if($_FILES["image"]["error"] == 4){
            echo "<script>alert('Image Does Not Exist')</script>";
           echo " <script>window.location.href = '/BIS/administrator/admin_panel/admin_folder/admin_manage.php'</script>";
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
                
                window.location.href = '/BIS/administrator/admin_panel/admin_folder/admin_manage.php'
                </script>
               
              ";
           
              
            }else if($fileSize > 1000000){
              echo "<script>alert('Image Size Is too Large');
              window.location.href = '/BIS/administrator/admin_panel/admin_folder/admin_manage.php'
              </script>";
             
            }else{
              $newImageName = uniqid();
              $newImageName .= '.' . $imageExtension;
  
              move_uploaded_file($tmpName, '../../../asset/image/admin/'. $newImageName );
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
             
              $sql = "INSERT INTO admin_account (firstname, middlename, lastname, gender, age, date_created, status, email, password, admin_profile, user_type )
              VALUES ('$firstname', '$middlename', '$lastname','$gender','$age','$date_created','$status','$email','$hashed_password', '$newImageName', '$user_type')";

              $result = mysqli_query($conn, $sql);
  
  
              
             if ($result === TRUE) {
  
              include('loading.php');
                   
              
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
  
            }
          }
  
  
        }
       
       
       
       ?>