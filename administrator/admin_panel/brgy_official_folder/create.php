
<?php
       
       require('../../database/conn_db.php');
       if(isset($_POST["create_submit"])){
         $fullname = trim($_POST["fullname"]);
         $chairman = trim($_POST["chairman"]);
         $position = trim($_POST["position"]);
         $date_start = trim($_POST["date_start"]);
         $date_end = trim($_POST["date_end"]);
         $active = trim($_POST["active"]);


         if(empty($fullname) || empty($chairman) || empty($position) || empty($date_start) || empty($date_end) ){
             echo"Complete the Form";
           echo"
                  <script> 
                       document.getElementById('pop_success').style.display = 'block';
                         document.getElementById('form_add_official').style.display = 'block';
                   </script> ";
               

         }
         elseif($_FILES["image"]["error"] == 4) {
          echo "<script>alert('Image Does Not Exist')</script>";
          // echo " <script>window.location.href = '/BIS/administrator/admin_panel/brgy_resident_folder/add_resident.php'</script>";
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
            echo " <script>window.location.href = '/BIS/administrator/admin_panel/brgy_official.php'</script>";
            
          }else if($fileSize > 1000000){
            echo "<script>alert('Image Size Is too Large')</script>";
            echo " <script>window.location.href = '/BIS/administrator/admin_panel/brgy_official.php'</script>";
          }else{
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;

            move_uploaded_file($tmpName, '../../asset/image/official/'. $newImageName );

            $sql = "INSERT INTO barangay_official (fullname, chairmanship, position, term_start, term_end, status, photo)
            VALUES ('$fullname', '$chairman', '$position','$date_start','$date_end','$active','$newImageName')";
 
             
             $result = $conn->multi_query($sql);

                
              if ($result === TRUE) {

            echo"<script> 
                     window.location.href ='/BIS/administrator/admin_panel/brgy_official_folder/loading_add.php';
                  </script> ";
                 
            
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }

          }
        }


       }
       
       
       ?>