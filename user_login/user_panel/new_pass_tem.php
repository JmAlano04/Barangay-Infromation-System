
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/BIS/user_login/user_panel/responsive_new_pass.css"/>
</head>

<body>
   
    <form action="/BIS/user_login/user_panel/new_pass_validation.php" method = "POST">
    <h1>Change Password</h1><hr><br><br>
                 <div class = "input_pass">
                    <label for="lname" id = "plabel">Create your new password</label><br>
                    <input type="text"  id="pname" name="pword" placeholder = "New password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required><br>
                  
                    <br>

                    <input type="hidden" name = "id" value = "<?php echo $_SESSION['user_id']; ?>">
                </div>

                    
                <!-- password field -->
                <div id="message">
                    <h3>Password must contain the following:</h3>
                    <p id="letter" class="invalid">A lowercase letter</p>
                    <p id="capital" class="invalid">A capital (uppercase)letter</p>
                    <p id="number" class="invalid">A number</p>
                    <p id="length" class="invalid">Minimum 8 characters</p>
                </div><hr><br>

                <div>
                    <input type="submit" id = "submit" name = "update_pass"value = "Save Changes">
                </div>

    </form>

    

</body>
</html>