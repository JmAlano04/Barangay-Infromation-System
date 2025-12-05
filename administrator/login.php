
<?php
// Enable maintenance mode
    $maintenance_mode = false;

    if ($maintenance_mode && !in_array($_SERVER['REMOTE_ADDR'], ['123.456.789.000'])) {
        include 'maintenance.php';
        exit;
    } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page | Barangay Information System</title>

     <link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">
    <link rel = "stylesheet" href = "login.admin.css"/>
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

            // Barangay Info
            $sql = "SELECT * FROM barangay_information";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0){
                
            $row = mysqli_fetch_array($result);
            
                ?>
                <p hidden  id = "logo_get">../asset/image/logo/<?php echo  $row['logo'] ?></p>
                
                
                <?php

            }

            
    ?>


    <header class = "header">
            <img src="../asset/image/logo/679b85db30f8c.png" alt="" id = "logo">
         
           
            <h1><span style = "color:#FCFAEE;">BARANGAY </span><span style = "color:#F5E402;">INFORMATION SYSTEM</span></h1>
    </header>


    
    <main id = "main">

        <form action="login.php" method = "POST">

            <h1><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" transform: ;msFilter:;"><path d="m13 16 5-4-5-4v3H4v2h9z"></path><path d="M20 3h-9c-1.103 0-2 .897-2 2v4h2V5h9v14h-9v-4H9v4c0 1.103.897 2 2 2h9c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2z"></path></svg></span>SIGN IN</h1>

            <div>
            <label for=""><span><svg style = "margin-right:3px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg></span>Email</label><br>
            <input type="email" id = "uname" name = "email" placeholder = "Email" required><br>

            <label for=""><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" transform: ;msFilter:;"><path d="M20 12c0-1.103-.897-2-2-2h-1V7c0-2.757-2.243-5-5-5S7 4.243 7 7v3H6c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-8zM9 7c0-1.654 1.346-3 3-3s3 1.346 3 3v3H9V7z"></path></svg></span>Password</label><br>
            <input type="Password" id = "pwd" name = "pname" placeholder = "Password" ><br>

          
            <input type="checkbox" id = "checkbox" onclick="show_pwd()"><label for="" id = "check_span">SHOW PASSWORD</label><br>
          
            <input type="submit" id = "submit" name = "login" value = "Sign in"> 
            </div>
            
          
        </form>
        

        <div id = "validation">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <p><?php include('login_validation.php'); ?></p>
        </div>

        <div>
            
            <img src="../asset/image/background/admin_bg/image-removebg-preview 1.png" alt="">
            <h4 style = "padding-left :60px;">All records should be stored in a 
            secure and confidential.</h4>
        </div>

    </main>
<?php

   

?>


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


    <script>
        // Function to close the modal
        function closeModal() {
            document.getElementById('validation').style.display = 'none';
        }

        // Set a timer to automatically close the modal after 5 seconds (5000 ms)
        setTimeout(closeModal, 5000);   
    </script>


        <script>
                let logo = document.getElementById("logo_get").textContent;
             
                ;
                document.getElementById("logo").src =  logo;
           
                
        </script>
</body>
</html>