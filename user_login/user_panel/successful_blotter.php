<?php
     require('../../database/conn_db.php');


     $sql = "SELECT * FROM user_account as u LEFT JOIN barangay_request as r ON u.user_id = r.user_id ORDER BY r.id DESC ";
     $result = mysqli_query($conn, $sql);
     
     if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
      
     }
    //  $t = time();
    //  $t_str = strval($t); // Convert timestamp to string
    //  $eight_digit = $t_str[8]; // 3rd digit (index 2)
    //  $last_digit = $t_str[strlen($t_str) - 1]; // Last digit
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Successfull Blotter | Barangay Information System</title>
    <link rel = "stylesheet" href = "style_user/style_succ.css.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
</head>


            
<body > 
    <div class = "container">

    <div class = "popup" id = "popup">
    
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
       
        </i>
        <h2>Successfully!!</h2>
        <br>
            
        <p>Your blotter has been submitted. Our team will contact you for updates.</p>
   
        <button type = "button" class = "btn" onclick = "closepopup()">Done</button>
    </div>
    </div>
    
</body>

<script>
    let popup = document.getElementById("popup");
    
    function closepopup(){
        popup.classList.remove("open-popup");
        window.location.href = "complaints.php";
    }
    </script>
</html>