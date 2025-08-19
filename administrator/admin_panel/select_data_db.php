<?php

require('../../database/conn_db.php');

// Barangay Info
$sqls = "SELECT * FROM barangay_information";
$result = mysqli_query($conn, $sqls);

if (mysqli_num_rows($result) > 0){
    
   $row = mysqli_fetch_array($result);
  
    ?>
     <p hidden  id = "logo_get">../../asset/image/logo/<?php echo  $row['logo'] ?></p>
     <p hidden  id = "baranagay_name_get_user"><?php echo  $row['barangay_name'] ?></p>
       
    <?php

}
// admin    data
$admin_id = $_SESSION['admin_id']; 

$sql = "SELECT * FROM admin_account WHERE user_id =  $admin_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
    
   $row = mysqli_fetch_array($result);
  
    ?>
     <p hidden  id = "user_type_get"><?php echo  $row['user_type'] ?></p>
     <p hidden  id = "user_admin"><?php echo  $row['firstname'] ?></p>
     <p hidden  id = "admin_picture">../../asset/image/admin/<?php echo  $row['admin_profile'] ?></p>
     
       
    <?php

}

?>


