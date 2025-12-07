<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="/BIS/administrator/admin_panel/admin_folder/add_account.php" method = "POST" enctype = "multipart/form-data">
    <h1>Add Admin Account</h1>

       
    <div class = "container">

    <div class = "div_1">
         <label for="">Upload Profile</label><br>
        <input name = "image" style = "border:1px solid green; padding-top:10px;" type="file" value = ""  accept = ".jpg, .jpeg, .png" required><br>

        <label for="">Fisrtname</label><br>
        <input name = "firstname" type="text" placeholder ="Enter Firstname" required><br>

        <label for="">Middlename</label><br>
        <input name = "middlename" type="text" placeholder ="Enter Middlename"><br>

        <label for="">Lastname</label><br>
        <input name = "lastname" type="text" placeholder ="Enter Lastname" required><br>

        <label for="">Sex</label><br>
        <select name="gender" id="">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        </select><br>

       
    
    </div>
        
    <div  class = "div_2">
    
        <label for="">Age</label><br>
        <input name = "age" type="number" min = "0" max = "110" placeholder ="Enter Age" required><br>
        
       
        <label for="">Status</label><br>
        <select name="status" id="" required>
            <option value= 1>Active</option>
            <option value= 0>Inactive</option>
        </select><br>
        <label for="">Email</label><br>
        <input name = "email" type="email" placeholder ="Enter Email" ><br>
       
        <label for="">Password</label><br>
        <input name = "password" type="password" id = "password" placeholder ="Enter Password" required>


        
        <input type="checkbox" id = "checkbox" onclick="show_pwd()"><br>


         <label hidden for="">User Type</label><br>
        <select hidden name="user_type" id="">
        <option  value="ADMINISTRATOR">ADMINISTRATOR</option>
   
        </select><br>

        <label hidden for="">Date Created</label><br>
        <input hidden name = "date_created" type="date" value="<?=  date('Y-m-d'); ?>"  ><br>
    </div>

  
        
    </div>
    <div class = "div_3">
       
        <input name = "reset_add" type="reset"  id = "reset_add">
        <input name = "submit_add" type="submit" id = "submit_add">
        
    </div>

        
    </form>



</body>
</html>