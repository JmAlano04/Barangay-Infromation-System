<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "style.css/user_register.css"/>
</head>
<body>
<h1 class = "registration_h1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 125.7-86.8 86.8c-10.3 10.3-17.5 23.1-21 37.2l-18.7 74.9c-2.3 9.2-1.8 18.8 1.3 27.5L64 512c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM549.8 235.7l14.4 14.4c15.6 15.6 15.6 40.9 0 56.6l-29.4 29.4-71-71 29.4-29.4c15.6-15.6 40.9-15.6 56.6 0zM311.9 417L441.1 287.8l71 71L382.9 487.9c-4.1 4.1-9.2 7-14.9 8.4l-60.1 15c-5.5 1.4-11.2-.2-15.2-4.2s-5.6-9.7-4.2-15.2l15-60.1c1.4-5.6 4.3-10.8 8.4-14.9z"/></svg>Registration Form</h1>
    <form action="user_register_folder/regisration_validation.php" class = "form_registration" method = "POST">
    <h2>Personal Information</h2>
    <div class = "item1">
      <div><label for="">Firstname</label><br>
      <input type="text" name = "fname" placeholder = "Enter Firstname" required><br></div>
      <div>   <label for="">Middlename</label><br>
      <input type="text" name = "mname" placeholder = "Enter Middlename"><br></div>
      <div><label for="">Lastname</label><br>
      <input type="text" name = "lname" placeholder = "Enter Lastname" required><br></div>
        
            <!-- SUFFIX (optional with red message ON CLICK only) -->
    <div>   
      <label>Suffix</label><br />
      <input 
        type="text" 
        name="suffix" 
        placeholder="Enter Suffix"
        style="width:70px; margin-right:200px;"
      /><br />
      <p id="suffix-msg" class="required-message" style="font-size:12px; display:none;">
        Leave it blank if not applicable.
      </p>
    </div>
    

        
    </div>

   

    <div class = "item2">
        <div> <label for="">Sex</label><br>
       <select name="gender" id="" required>
        
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Prefer not to say">Prefer not to say</option>
       </select>
    </div>

        <div>

         <label for="" style = "margin-left:-30px;">Birthday</label><br>
        <input type="date" name = "birthday" style = "margin-left:-30px;" required>
     </div>
      
       
    </div>
    <h2>Account</h2>
    <div class = "item3">
       
        <div><label for="">Email</label><br>
        <input type="email" name = "ename" placeholder = "Enter Email" required><br></div>
    
       
                


                    <div>
                    <label for="lname" id = "plabel">Create your password</label><br>
                    <input type="Password"  id="pname" name="pword" placeholder = "Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required><br>
                    <i class="fa-solid fa-eye-slash" id = "eye" onclick="myFunction()"></i>
                    <br>
                    </div>

                    
                <!-- password field -->
                <div id="message">
                    <h3>Password must contain the following:</h3>
                    <p id="letter" class="invalid">A lowercase letter</p>
                    <p id="capital" class="invalid">A capital (uppercase)letter</p>
                    <p id="number" class="invalid">A number</p>
                    <p id="length" class="invalid">Minimum 8 characters</p>
                </div>

                
                <div>
                <label for="lname" id = "confirm_plabel">Confirm your password</label><br>
                <input type="Password" id="confirm_pname"  name="confirm_pword" placeholder = "Enter New password again" required><br>
                <i class="fa-solid fa-eye-slash" id = "eye_confirm" onclick="myFunction_confirm()"></i>
                </div>
                <input type="hidden" name = "profile_default" value = "images.png">
               

                <div class = item4>
                <input type="reset" name = "reset" value = "Reset"  id = "reset">
                <input type="submit" name = "registraion_user" value = "Submit"  id = "submit_btn" ><br>
              
                </div>

              
                

        
    </div>

   

    </form>
     
  


    <script src = "user_register_folder/validation.js"></script>
</body>
</html>