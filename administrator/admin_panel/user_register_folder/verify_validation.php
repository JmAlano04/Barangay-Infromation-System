<?php
    include ('../../../database/conn_db.php');
    if(isset($_POST['submit_verify'])){
        $id_verify = trim($_POST['id_verify']);
        $new_verify = trim($_POST['new_verify']); ;

            $sqls= "UPDATE user_account SET verify='$new_verify'  WHERE user_id= $id_verify";
                    
      
                
                if (mysqli_query($conn, $sqls)) {

                  ?>
                    <script>
                    alert('Account has Been Verified!');
                    
                    window.location.href = '/BIS/administrator/admin_panel/user_registered.php';
                    </script>
                  <?php 



                    
                  } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                  }
                  
                  mysqli_close($conn);





    }




?>