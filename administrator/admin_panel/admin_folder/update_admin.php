<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="/BIS/administrator/admin_panel/admin_folder/update.php" method = "POST" enctype = "multipart/form-data">
    <h1 style = "font-size:1.3rem;color:#4A9D4f; margin:20px 0px 40px 0px;"><svg style = "width:20px;fill:#4A9D4f;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg>Edit Admin Account</h1>

       
    <div class = "container">

    <div class = "div_1">
        <img src="../../../asset/image/admin/<?php echo $admin_profile; ?>" alt="" id = "images_edit"> <br>
         <label for="">Upload Profile</label><br>
        <input name = "image" type="file" value = ""  accept = ".jpg, .jpeg, .png" style = "border:1px solid green; padding-top:10px;"><br>

        <label for="">Fisrtname</label><br>
        <input name = "firstname_edit" type="text" placeholder ="Enter Firstname" id = "firstname_edit" required><br>

        <label for="">Middlename</label><br>
        <input name = "middlename_edit" type="text" placeholder ="Enter Middlename" id = "middlename_edit"><br>

        <label for="">Lastname</label><br>
        <input name = "lastname_edit" type="text" placeholder ="Enter Lastname" required id = "lastname_edit"><br>

        <label for="">Gender</label><br>
        <select name="gender_edit" id = "gender_edit" required>
        
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        </select><br>

        <label for="">Age</label><br>
        <input name = "age_edit" type="number" min = "18" max = "110" placeholder ="Enter Age" id = "age_edit" required><br>
        
    
    </div>
        
    <div  class = "div_2" id = "div_2" style = "margin-top:320px;">

    <div class = "id_number">
        <label hidden for="">User Number</label><br>
        <input type="hidden" style = "cursor: no-drop;"  name = "user_id" id = "id_edit" readonly><br>
    </div>
        
         <label for="">Date Created</label><br>
        <input name = "date_created_edit" type="date" style = "cursor: no-drop;" readonly id = "date_created_edit"><br>
        <label for="">User Type</label><br>
        <select name="user_type_edit" id="user_type_edit">
            <option value="ADMINISTRATOR">ADMINISTRATOR</option>
      
        </select><br>
        <label for="">Status</label><br>
        <select name="status_edit" id="status_edit" required>
            <option value= 1>Active</option>
            <option value= 0>Inactive</option>
        </select><br>
        <label for="">Email</label><br>
        <input name = "email_edit" type="email" placeholder ="Enter Email" id = "email_edit" ><br>

            <label hidden for="">Password</label><br>
            <input type = "hidden" name = "password_edit" type="password" id = "password_edit" placeholder ="Enter Password" style = "cursor: no-drop;"readonly>
        
            <input hidden type="checkbox" id = "checkbox_edit" onclick="show_pwd_edit()"><br>
      
    </div>

  
        
    </div>
    <div class = "div_3">
       
        <input name = "reset_add_edit" type="reset"  id = "reset_add">
        <input name = "submit_add_edit" type="submit" id = "submit_add">
    </div>

        
    </form>


    
  


</body>
</html>