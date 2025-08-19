<?php
require('../../database/conn_db.php');
    // Connect to database
      
    
        if(isset($_POST['update_pass'])){
            $id = trim($_POST["id"]);
            
            $Password = trim($_POST["pword"]);
           
    
    
    
          
                  $sql = "UPDATE user_account SET password= '$Password' WHERE user_id=$id";
    
    
                  if (mysqli_query($conn, $sql)) {
                    
                    echo "<script>
                    alert('Update Password Successfully!');
                    window.location.href = 'user.php';</script>";
                   
                } else {
                    echo "<script>
                    window.location.href = 'user.php';</script>";
                   
                }
                
                mysqli_close($conn);
                }
    
     ?>           