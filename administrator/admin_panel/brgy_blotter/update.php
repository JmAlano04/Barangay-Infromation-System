<?php

    require("../../../database/conn_db.php");

  if(isset($_POST['save_blotter_upd'])){
        
      $id = trim($_POST["id_blotter"]);
        $subject = trim($_POST["subject_upd"]);
        $cell_no = trim($_POST["cell_no_upd"]);
        $place = trim($_POST["place_upd"]);

        $tanod = trim($_POST["tanod_upd"]);
        $date = trim($_POST["date_upd"]);
        $time = trim($_POST["time_upd"]);

        $status = trim($_POST["status_upd"]);
        $type = trim($_POST["type_of_blotter"]);
        $complainant = trim($_POST["complainant_upd"]);
        $age = trim($_POST["age_upd"]);

        $address_complainant = trim($_POST["address_complainant_upd"]);
        $complained_name = trim($_POST["complained_name_upd"]);
        $add_complained_name = trim($_POST["add_complained_name_upd"]);

        $details_reason = trim($_POST["details_reason_upd"]);
            
    
        $sql= "UPDATE barangay_blotter
               SET subject='$subject' , cell_no='$cell_no', tanod='$tanod' , date='$date' , time='$time', status='$status', complainant='$complainant', age='$age', address_complainant=' $address_complainant' , complained_name='$complained_name' ,add_complained_name='$add_complained_name' , details_reason='$details_reason', place='$place',type='$type' WHERE id='$id'";
        
      
                
                if (mysqli_query($conn, $sql)) {

                    ?>
                    <script>
                        window.location.href = "/BIS/administrator/admin_panel/brgy_blotter/loading_update.php";
                    </script>
                    
                    <?php
                   



                    
                  } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                  }
                  
                  mysqli_close($conn);
      
     }
?>