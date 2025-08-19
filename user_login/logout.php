<?php

    session_start();

    if( $_SESSION['status_input'] = 'invalid_input' ||  $_SESSION['status'] = 'invalid'){
        echo "<script>
        window.location.href = '/BIS/user_login/user_login_page.php'
    </script>";
    }
   

    
    
  
?>