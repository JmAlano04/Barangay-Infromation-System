<?php
       
    require('../../../database/conn_db.php');
        if(isset($_POST["save_blotter"])){

        $subject = trim($_POST["subject"]);
        $cell_no = trim($_POST["cell_no"]);
        $place = trim($_POST["place"]);

      
        $tanod = trim($_POST["tanod"]);
        $date = trim($_POST["date"]);
        $time = trim($_POST["time"]);

      
         $remarks = trim($_POST["remarks_upd"]);   
        

        $status = trim($_POST["status"]);
  
        $complainant = trim($_POST["complainant"]);
        $age = trim($_POST["age"]);

        $address_complainant = trim($_POST["address_complainant"]);
        $complained_name = trim($_POST["complained_name"]);
        $add_complained_name = trim($_POST["add_complained_name"]);

        $details_reason = trim($_POST["details_reason"]);

        $sql = "INSERT INTO barangay_blotter (subject, cell_no, tanod, date, time, status, complainant, age, address_complainant, complained_name, add_complained_name, details_reason, place, remarks)
        VALUES ('$subject', '$cell_no', '$tanod','$date','$time','$status','$complainant','$age','$address_complainant' , '$complained_name' ,'$add_complained_name','$details_reason', '$place' , '$remarks');";

        
        $result = $conn->multi_query($sql);

        
         if ($result === TRUE) {

        echo"
            <script>window.location.href = '/BIS/administrator/admin_panel/blotter.php'</script>
        ";
            
        
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }


}



?>
