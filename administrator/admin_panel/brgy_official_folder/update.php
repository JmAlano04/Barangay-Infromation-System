<?php
// Connect to database
    require("../../../database/conn_db.php");

    if(isset($_POST['update_official_list'])){
        $id = trim($_POST["id"]);
        $fullnames = trim($_POST["fullname"]);
        $chairmans = trim($_POST["chairman"]);
        $positions = trim($_POST["position"]);
        $date_starts = trim($_POST["date_start"]);
        $date_ends = trim($_POST["date_end"]);
        $actives = trim($_POST["active"]);

        $fileName = $_FILES["image"]["name"];
        $fileSize =$_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validImageExtension =  ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));




        if($_FILES["image"]["error"] == 4){
            
            $sql = "UPDATE barangay_official SET fullname='$fullnames' , chairmanship='$chairmans', position='$positions' , term_start='$date_starts' , term_end='$date_ends' , status='$actives' WHERE id=$id";


            if (mysqli_query($conn, $sql)) {
                echo "<script>window.location.href = 'loading.php';</script>";
               
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
              echo "<script>window.location.href = '/BIS/administrator/admin_panel/resident.php';</script>";
            }else if($fileSize > 1000000){
              echo "<script>alert('Image Size Is too Large')</script>";
              echo "<script>window.location.href = '/BIS/administrator/admin_panel/resident.php';</script>";
            }else{
              $newImageName = uniqid();
              $newImageName .= '.' . $imageExtension;
  
              move_uploaded_file($tmpName, '../../../asset/image/official/'. $newImageName );


              $sql = "UPDATE barangay_official SET fullname='$fullnames' , chairmanship='$chairmans', position='$positions' , term_start='$date_starts' , term_end='$date_ends' , status='$actives' ,photo='$newImageName' WHERE id=$id";


              if (mysqli_query($conn, $sql)) {
            
                echo "<script>window.location.href = 'loading.php';</script>";
               
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
            
            mysqli_close($conn);
            }

            }

        

        
       
        }        
  ?>

    