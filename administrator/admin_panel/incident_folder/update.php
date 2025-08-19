<?php

    require("../../../database/conn_db.php");

  if(isset($_POST['save_incident_upd'])){
           
    $id = trim($_POST["id_upd"]);

    $cause_incident = trim($_POST["cause_incident_upd"]);
    $time = trim($_POST["time_upd"]);
    $date = trim($_POST["date_upd"]);
    $status = trim($_POST["status_upd"]);

    $person1 = trim($_POST["person1_upd"]);
    $address1 = trim($_POST["address1_upd"]);
    $vehicle1 = trim($_POST["vehicle1_upd"]);
    $license1 = trim($_POST["license1_upd"]);
    $plate1 = trim($_POST["plate1_upd"]);
            
    
        $sql= "UPDATE barangay_incident
               SET cause_incident='$cause_incident', time='$time' , date='$date' , name_involve='$person1', 	address='$address1', 	vehicle='$vehicle1' , 	license='$license1', 		plate_no='$plate1', 	status='$status' WHERE id=$id";
        
      
                
                if (mysqli_query($conn, $sql)) {

                    ?>
                    <script>
                        window.location.href = "/BIS/administrator/admin_panel/incident_folder/loading_update.php";
                    </script>
                    
                    <?php
                   



                    
                  } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                  }
                  
                  mysqli_close($conn);
      
     }
?>