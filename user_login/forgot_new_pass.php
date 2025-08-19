<?php


require("../database/conn_db.php");

if (isset($_POST['new_pass'])) {
    $email = trim($_POST['email']);
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $new_pass = trim($_POST['new_password']);
        
    $sql = "UPDATE user_account SET password='$new_pass' WHERE email='$email' AND firstname='$firstname' AND lastname='$lastname'";

    if ($conn->query($sql) === TRUE) {
    echo "<script>window.location.href = 'loading_new_password.php'</script>";
    } else {
    echo "Error updating record: " . $conn->error;
    }

    $conn->close();
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Pasword | Barangay Information System</title>
    <link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="login_user.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body::-webkit-scrollbar{
            display:none;
        }
       </style>
</head>
<body>
    <?php
        session_start();
        require("../database/conn_db.php");


        $sql = "SELECT * FROM barangay_information";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0){
            
        $row = mysqli_fetch_array($result);
        
            ?>
            <p hidden  id = "logo_get_image">../asset/image/logo/<?php echo  $row['logo'] ?></p>
            
            <?php
        
        }
    ?>

    <header class = "header">
            <img src="../asset/image/logo/679b85db30f8c.png" alt="" id = "logo_image">

            <h1><span style = "color:#FCFAEE;">BARANGAY </span><span style = "color:#F5E402;">ONLINE CERTIFICATION REQUEST</span></h1>
    </header>


    <main id = "main">
        <div class = "sub_main_div">
    <form action="forgot_new_pass.php" method = "POST">

    <h1 style = "font-size:1rem;"><span><svg style = "width:40px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 125.7-86.8 86.8c-10.3 10.3-17.5 23.1-21 37.2l-18.7 74.9c-2.3 9.2-1.8 18.8 1.3 27.5L64 512c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM549.8 235.7l14.4 14.4c15.6 15.6 15.6 40.9 0 56.6l-29.4 29.4-71-71 29.4-29.4c15.6-15.6 40.9-15.6 56.6 0zM311.9 417L441.1 287.8l71 71L382.9 487.9c-4.1 4.1-9.2 7-14.9 8.4l-60.1 15c-5.5 1.4-11.2-.2-15.2-4.2s-5.6-9.7-4.2-15.2l15-60.1c1.4-5.6 4.3-10.8 8.4-14.9z"/></svg></span>FORGOT PASSWORD</h1>

    <div>
    <label for="">Create New Password</label><br>
    <input type="text" id = "uname" name = "new_password" placeholder = "New Password" required><br>
    <input type="hidden" id = "uname" name = "email" value = <?php echo $_SESSION['email'];?> placeholder = "New Password" required><br>
    <input type="hidden" id = "uname" name = "firstname" value = <?php echo $_SESSION['firstname'];?> placeholder = "New Password" required><br>
    <input type="hidden" id = "uname" name = "lastname" value = <?php echo $_SESSION['lastname'];?> placeholder = "New Password" required><br>
   


    <input type="submit" id = "submit" value = "Submit" name = "new_pass"> 
    </div>


    </form>

  


    <div id = "validation">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <p><?php include('email_validation_pass.php'); ?></p>
        </div>

   

      
    </main>



      <!-- ADD FORM -->
      <div id="modal_add_blotter" class="modal_blotter">
                                <!-- Modal content -->
                                <div class="modal-content_blotter">
                                <span class="close">&times;</span>
                                    <?php  include('registration.php') ;?>
                                </div>
                        </div>
      <!-- Js function visibility eye -->
      <script>
    

    function show_pwd() {
        var x = document.getElementById("pwd");
        if (x.type === "password") {
            document.getElementById("checkbox");
            x.type = "text";
        } else {
            document.getElementById("checkbox");
            x.type = "password";
        }
        };
        
</script>

        <script src = "registration.js"></script>
        <script src = "validation.js"></script>


        <script>
        // Function to close the modal
        function closeModal() {
            document.getElementById('validation').style.display = 'none';
        }

        // Set a timer to automatically close the modal after 5 seconds (5000 ms)
        setTimeout(closeModal, 5000);   
    </script>

    
<script>
                let logo = document.getElementById("logo_get_image").textContent;
             
                ;
                document.getElementById("logo_image").src =  logo;
           
                
        </script>
</body>

</html>