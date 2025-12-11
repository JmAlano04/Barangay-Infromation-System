<?php 
  include('db_data_user.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Barangay Blotter Form</title>
</head>

<body>

<section id="blotter_form" class="form-request">

<form action="submit_blotter.php" method="POST">

    <h1>
        <svg xmlns="http://www.w3.org/2000/svg" style="width:40px;" viewBox="0 0 512 512">
            <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 
            30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 
            220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 
            18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 
            21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 
            0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 
            96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 
            17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 
            14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/>
        </svg>
        Barangay Blotter Form
    </h1>

    <div class="item1">
          <div>
            <label>Subject:</label><br>
            <input id="subject_blotter_id" type="text" name="subject" placeholder="Enter Subject" required>
        </div>

        <div>
            <label>Place:</label><br>
            <input type="text" name="place" placeholder="Enter Place" required>
        </div>

        <div>
            <label>Complained Person Name:</label><br>
            <input type="text" name="complained_name" placeholder="Complained Person Name" required>
        </div>

        <div>
            <label>Address of Complained Person:</label><br>
            <input type="text" name="add_complained_name" placeholder="Address Complained Person Name" >


        </div>
        <div>
        <label>Complainant Contact Number:</label><br>
        <input type="tel" name = "contact_no" placeholder = "Enter Contact Number" pattern="[0-9]{11}" id = "contact_phone_my_profile_id" required>
          
        </div>
          
        <div>
            <input type="hidden"name = "firstname" id = "firstname_my_profile_id" ><br>
            <input type="hidden"name = "middlename" id = "middlename_my_profile_id" ><br>
            <input type="hidden"name = "lastname" id = "lastname_my_profile_id" ><br>

            <input type="hidden"name = "age" id = "age_my_profile_id" ><br>
            
        </div>

         
        <div>
        <input type="hidden" name = "house_no" placeholder = "Enter House Number" id = "house_no_my_profile_id" >
        
        <input type="hidden" name = "Sitio_Pook"  placeholder = "Ex. Mabuhay Homes 2000 " id = "sitio_pook_my_profile_id"  ><br>
        
       
        </div>
       
         
         
      

        <div style="grid-column:  1/ -1;">
            <label>Details / Reason:</label><br>
            <textarea name="details_reason" rows="10" cols="100" style="padding:5px;"></textarea>
        </div>

    </div>

    <input type="hidden" name="status" value="Pending">
    <input type="hidden" name="user_id" value="<?= $user_id ?>">

    <div class="submit_reset_return_div" style = "margin-top:100px;">
        <input type="reset" id="reset">
        <input type="submit" name="submit_blotter" id="submit">
    </div>

</form>

</section>  
            
            
            
     <script>
               

                let house_no_my_profile = document.getElementById("house_no_my_profile").textContent;
                document.getElementById("house_no_my_profile_id").value = house_no_my_profile; 

                let sitio_pook_my_profile = document.getElementById("sitio_pook_my_profile").textContent;
                document.getElementById("sitio_pook_my_profile_id").value = sitio_pook_my_profile;

                

                let firstname_my_profile = document.getElementById("firstname_my_profile").textContent;
                document.getElementById("firstname_my_profile_id").value =  firstname_my_profile;

                let middlename_my_profile = document.getElementById("middlename_my_profile").textContent;
                document.getElementById("middlename_my_profile_id").value =  middlename_my_profile;
                
                let lastname_my_profile = document.getElementById("lastname_my_profile").textContent;
                document.getElementById("lastname_my_profile_id").value =  lastname_my_profile;

                let age_my_profile = document.getElementById("age_my_profile").textContent;
                document.getElementById("age_my_profile_id").value =  age_my_profile;

                   let contact_phone_my_profile = document.getElementById("contact_phone_my_profile").textContent;
                document.getElementById("contact_phone_my_profile_id").value = contact_phone_my_profile;
            </script>




            <script>
                 let firstname = document.getElementById("firstname").textContent;
                document.getElementById("firstname_id").value = subject_blotter;

              
            </script>

</body>
</html>
