<?php
          session_start();
          if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])){
              // set default session invalid
              $_SESSION['status'] = 'invalid';
      
              header('Location: ../login.php');
          }
          

          if (empty($_SESSION['admin_id'])){
            // set default session invalid
            $_SESSION['status'] = 'invalid';
    
            header('Location: ../login.php');
        }
        
?>