
<?php
  
    require("../../database/conn_db.php");

        $user_id = $_SESSION['admin_id'];
    $sql = "SELECT *  FROM admin_account WHERE user_id =  $user_id";
        
    
    $result = $conn->query($sql);

    $result->num_rows > 0;

    if ($result->num_rows > 0) {
        
        $row = mysqli_fetch_array($result);
    

        ?>
      
      
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Profile</title>
    <link rel = "stylesheet" href = "/BIS/administrator/admin_panel/admin_folder/admin_style.css">
  
</head>
<body>


        
        <form action="/BIS/administrator/admin_panel/admin_folder/update.php" method = "POST" class = "form">

        <div class = "profile">
            <h1>Profile</h1>

            <div class = "img">
            <img src="../../asset/image/admin/<?php echo $row['admin_profile']?>" alt=""><br>
            
            </div>
            
        </div>

        <div class="container">
    <div class="label_div">
         <label for="">Fullname</label>
        <label for="">Usertype</label>
      
    
        
        <label for="">Date Created</label>
    </div>
    <div class="input_div">
     
    <input type="text" name = "fullname" value ="<?php echo $row['firstname'] . " " . $row['middlename'] . " ". $row['lastname']?>" readonly>
        <input type="text" name = "user_type" value = "<?php echo  $row['user_type'] ?>" readonly>
       
        <input type="date"  value="<?php echo $row['date_created']; ?>" readonly>
        <input type="hidden" name = "date" value="<?php echo $row['date_created']; ?>" readonly>
        <input type="hidden" name = "user_id" value="<?php echo $row['user_id']; ?>" readonly>
    </div>
    
</div>
    
 </form>
    


    
</body>
</html>
      
      
      <?php


   }
   
?>

