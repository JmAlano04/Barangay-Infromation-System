<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "style.css/user_register.css"/>
   
</head>
<body>
    <h1 class = "registration_h1"><svg style = "width:20px;fill:#4A9D4f;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg>Edit User List</h1>
    <form action="user_register_folder/update.php" class = "form_registration" method = "POST">
    <h2>Personal Information</h2>
    <div class = "item1">
      <div><label for="">Firstname</label><br>
      <input type="text" name = "firstname_user" placeholder = "Enter Firstname" id = "firstname_user" required><br></div>
      <div>   <label for="">Middlename</label><br>
      <input type="text" name = "middlename_user" placeholder = "Enter Middlename" id = "middlename_user"><br></div>
      <div><label for="">Lastname</label><br>
      <input type="text" name = "lastname_user" placeholder = "Enter Lastname" id = "lastname_user" required><br></div>
      <div><label for="">Suffix</label><br>
      <input type="text" name = "suffix" placeholder = "Enter Suffix" id="suf_user" style="width:90px;" required><br></div>

    </div>

    <div class = "item2">
        <div> <label for="">Sex</label><br>
       <select name="gender_user" id="gender_user" required>
        
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Prefer not to say">Prefer not to say</option>
       </select>
    </div>

     <div>
        <label style="margin-left:20px;">Birthday</label><br />

        <input 
            type="date" 
            name="birthday_user" 
            id="birthday_user"
            style="margin-left:20px;" 
            required 
        />
    </div>
    
        
       
    </div>
    <h2 ></h2>
    <div class = "item3">
       
        <div><label for="">Email</label><br>
        <input type="email" id = "email_user" name = "username_user" placeholder = "Create username" required><br></div>
        <br>
        <br>
       
        



                    
              

            
                <input type="hidden" name = "profile_default" value = "images.png">
              
                <input type="hidden" id = "id_user_edit" name = "id_user_edit">

                <div class = item4>
                <input type="reset" name = "reset" value = "Reset"  id = "reset">
                <input type="submit" name = "submit_user_edit" value = "Submit"  id = "submit_btn" ><br>
              
                </div>

            
                

        
    </div>

   

    </form>
     
     
     
  


    <script src = "user_register_folder/validation.js"></script>

    <script>
        
    // password visibility //
function myFunc() {
var x = document.getElementById("password_user");
if (x.type === "password") {
   document.getElementById("eyes").className = "fa-solid fa-eye";
   x.type = "text";
} else {
   document.getElementById("eyes").className = "fa-solid fa-eye-slash";
   x.type = "password";
}
}
    </script>


  <script>
    // Compute today's date minus 18 years
    const today = new Date();
    const year = today.getFullYear() - 18;
    const month = ("0" + (today.getMonth() + 1)).slice(-2);
    const day = ("0" + today.getDate()).slice(-2);
    const maxDate = `${year}-${month}-${day}`;
    document.getElementById("birthday").setAttribute("max", maxDate);
    </script>

   
</body>
</html>