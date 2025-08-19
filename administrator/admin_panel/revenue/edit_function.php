<?php
 
 require("../../../database/conn_db.php");


 if(isset($_POST['sub_income'])){
    $id = trim($_POST["id_edit"]);
    $amount = trim($_POST["amount"]);


    $sql = "UPDATE  barangay_revenue 
    SET document_amount= '$amount'  WHERE OR_no  = $id";

      $result = mysqli_query($conn, $sql);
      if ($result == true) {
        ?>
        <script>
                window.location.href = '/BIS/administrator/admin_panel/revenue/loading_update.php';
        </script>
        
        <?php
      }

 }

 ?>