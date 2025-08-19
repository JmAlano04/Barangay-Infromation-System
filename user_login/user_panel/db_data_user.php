<?php

    require('../../database/conn_db.php');

    $user_id =  $_SESSION['user_id'];

    $sqls = "SELECT * FROM user_account WHERE user_id = $user_id; ";
    $result = mysqli_query($conn, $sqls);
    if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);
      ?>
      <!-- This data send to user.php file -->
      <p hidden id = "fullname_user"><?php echo  $row['firstname'] ." ".  $row['middlename'] ." ". $row['lastname'] ?></p>
      <p hidden id = "address_user"><?php echo  $row['house_no'] . " " . $row['sitio_pook'] ?></p>
      <p hidden id = "contact_no_user"><?php echo  $row['contact_no'] ?></p>
      <p hidden id = "verify_user"><?php echo  $row['verify'] ?></p>
      <p hidden id = "profile_user"><?php echo "/BIS/asset/image/user_profile/" . $row['profile'] ?></p>
      <p hidden id = "profile_profile"><?php echo  $row['profile'] ?></p>
      
       <!-- This data send to profile.php file -->
            <p hidden id = "firstname_my_profile"><?php echo  $row['firstname'] ;?></p>
             <p hidden id = "middlename_my_profile"><?php echo  $row['middlename'] ;?></p>
            <p hidden id = "lastname_my_profile"><?php echo  $row['lastname'] ;?></p>
            <p hidden id = "age_my_profile"><?php echo  $row['age'] ;?></p>
            <p hidden id = "gender_my_profile"><?php echo  $row['gender'] ;?></p>
            <p hidden id = "user_id_my_profile"><?php echo  $row['user_id'] ;?></p>
            <p hidden id = "birthday_my_profile"><?php echo  $row['birthday'] ;?></p>
            <p hidden id = "contact_phone_my_profile"><?php echo  $row['contact_no'] ;?></p>
            <p hidden id = "house_no_my_profile"><?php echo  $row['house_no'] ;?></p>
            <p hidden id = "sitio_pook_my_profile"><?php echo  $row['sitio_pook'] ;?></p>
            
          

    <?php 
   


        $sql = "SELECT * FROM user_account as u LEFT JOIN barangay_request as r ON u.user_id = r.user_id  WHERE u.user_id = $user_id ORDER BY r.id DESC ";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0){
            
          $row = mysqli_fetch_array($result);
          
            ?>
      
    
            <!-- This data send to profile.php file -->
            <p hidden id = "firstname_my_profile"><?php echo  $row['firstname'] ;?></p>
            <p hidden id = "middlename_my_profile"><?php echo  $row['middlename'] ;?></p>
            <p hidden id = "lastname_my_profile"><?php echo  $row['lastname'] ;?></p>
            <p hidden id = "age_my_profile"><?php echo  $row['age'] ;?></p>
            <p hidden id = "gender_my_profile"><?php echo  $row['gender'] ;?></p>
            <p hidden id = "user_id_my_profile"><?php echo  $row['user_id'] ;?></p>
            <p hidden id = "birthday_my_profile"><?php echo  $row['birthday'] ;?></p>
            <p hidden id = "contact_phone_my_profile"><?php echo  $row['contact_no'] ;?></p>
            <p hidden id = "house_no_my_profile"><?php echo  $row['house_no'] ;?></p>
            <p hidden id = "sitio_pook_my_profile"><?php echo  $row['sitio_pook'] ;?></p>
            <p hidden id = "place_of_birth_my_profile"><?php echo  $row['place_of_birth'] ;?></p>
            <p hidden id = "contact_no_contact_person_my_profile"><?php echo  $row['contact_no_contact_person'] ;?></p>
            <p hidden id = "contact_person_my_profile"><?php echo  $row['contact_person'] ;?></p>
            <p hidden id = "live_since_year_my_profile"><?php echo  $row['live_since_year'] ;?></p>
            <p hidden id = "purpose_my_profile"><?php echo  $row['purpose'] ;?></p>
            <p hidden id = "id_my_profile"><?php echo  $row['id'] ;?></p>
           
          <?php 
         
  
         
      }


    }
        
   





?>