

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Barangayy Information System</title>
    <link rel = "stylesheet" href = "style_user/user_style_main.css"/>
    <link rel = "stylesheet" href = "style_user/profile_user.css"/>
    <link rel = "stylesheet" href = "style_user/layout_main.css"/>
    <link rel="icon" href="/BIS/favicon/favicon.ico" type="image/x-icon">
    <style>
        body::-webkit-scrollbar{
            display:none;
        }

        .sex_radio_group {
            display: flex;
            align-items: center;
           
            margin-top: 20px;
             font-family: "sub_text";
        }

        .thin_radio input[type="radio"] {
            width: 15px;
            height: 15px;
            accent-color: #1ca828ff; /* black thin look */
            
        }
        .thin_radio input[type="radio"]:focus{
            outline: none;
        }

        .sex_label {
            width: 120px;
            font-weight: bold;
        }
        @media only screen and (min-width: 320px ){
            .sex_radio_group {
            display: flex;
            align-items: center;
           font-size: 0.8rem;
            margin-top: 20px;
             font-family: "sub_text";
        }

        .thin_radio input[type="radio"] {
            width: 12px;
            height: 12px;
            accent-color: #1ca828ff; /* black thin look */
            
        }
        .thin_radio input[type="radio"]:focus{
            outline: none;
        }

        .sex_label {
            width: 120px;
            font-weight: bold;
        }
        }
       </style>
</head>
<body>
    <?php
    
        require('../session.php');
        require('select_data_db.php');
         require('db_data_user.php');
    
    
    ?>
    <div class = "sidebar">
        <div class = "logo_content">
        <div class = "logo">
                    <img src="../../asset/image/logo/6736e31f2c7d1.png" alt="" id = "logo_user">
                        <div class = "logo_name">BARANGAY <span style = "color:#F5E402;" id = "baranagay_name_user">
                     
                         </span>
                
        </div>
        </div>
            <span id = "btn_menu">
            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" ;transform: ;msFilter:;><path d="M4 11h12v2H4zm0-5h16v2H4zm0 12h7.235v-2H4z"></path></svg>
            </span>
           <hr><br>
        </div>

        <?php 
            require_once 'navigation.php';
         ?>
          

        </div>
        
        <div class = "dashboard_content">
                <div class = "text">
                    <h1>MY PROFILE</h1>
                    <div class = "setting">
                      
                       
                      <div class = "svg">
                            <a href="../logout.php">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
                            </a>
                       
                        </div>
                           
                            
                    </div>
                            


                </div>
            
                
                <div class = "div_content">
                            
               

         <form action="update.php" method = "POST" class = "form" enctype = "multipart/form-data">
           
                        <div class = "personal_info">
                            <h3>Personal Information</h3>
                            <h5>Update your Personal Information to Verified your Account</h5>
                        </div><hr>

            <div class = "profile">
                <h1>Profile</h1>

              
                    <img src="/BIS/asset/image/user_profile/images.png" alt="" id = "profile_user_display" class = "img"><br>
                   
              
                
            </div>

        <div class="container">
            <div class="label_div">
                 
                <div class = "label_label">
                <label for="">Firstname</label>
                <label for="">Middlename</label>
                <label for="">Lastname</label>
                <label for="">Suffix</label>
                <label for="">Age</label>
                <label for="">Birthday</label>
                <label for="" >Sex</label>
                </div>
             
                
            </div>
            <div class="input_div">
            <input type="file"  name="image_profile" accept=".jpg, .jpeg, .png" id = "images" style = "padding-top:10px;">
                <input type="text" id = "firstname_my_profile_id" name = "firstname" value ="" placeholder="Enter Firstname" required>
                <input type="text" id = "middlename_my_profile_id" name = "middlename" value ="" placeholder="Leave it blank if not applicable.">
             
                <input type="text" id = "lastname_my_profile_id"  name = "lastname" value ="" placeholder="Enter Lastname" required>
                 <input name="suffix" id = "suffix_id_my_profile" style="width: 130px; margin-right:200px;" placeholder="Enter Suffix here">
               
                <input type="number" id = "age_my_profile_id"  style="width: 70px; margin-right:200px;" readonly name = "age" value = "" max = "110" >
                <input type="date" id = "birthday_my_profile_id" name = "birthday" value = "" required>
            <div>
          
            <select name="gender" id="gender_my_profile_id" required >
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Prefer not to say">Prefer not to say</option>
           
            </select><br>
            </div>

                
            </div>
            
            
        </div>
            <h1 class ="contact">Contact</h1>
            <hr>
        <div class="container">
            <div class="label_div">
                <label for="" class = "label2">Contact Phone</label>
            </div>
            <div class="input_div">
                <input type="tel"  id = "contact_phone_my_profile_id"  name = "contact_no" placeholder="ex. 09123456789" value ="" pattern="[0-9]{11}" >
            </div>
            
            
        </div>
        <h1 class ="contact">Address</h1>
        <hr>
        <div class="container">
            <div class="label_div">
              

                <label for="" class = "label2">House no.</label>
                <label for="" class = "label2">Sitio/Pook</label>
                <label for="" class = "label2">Supporting Document <br> (HOA Certificate/ID, Student ID)</label>
                
            </div>
            <div class="input_div">
                <input type="text" id = "house_no_my_profile_id" name = "house_no" value ="" placeholder="ex. Blk 123 lot 2" ><br>

                <input type ="text" name="sitio_pook" placeholder="ex. Mabuhay homes" id="select">
                <input type="file"  name="image_document"    accept=".jpg, .jpeg, .png"  id = "images" style = "padding-top:10px;" >
                <input type="hidden" name = "user_id" id = "user_id_my_profile_id"   value ="" ><br>
                
            </div>
              
            </div>
            <input type="submit" value = "Save Changes" id = "submit" name = "save_Changes">
        </form>
        
                </div>
            <!-- ------------------------ -->
            </div>
          
            <footer style = "height:30vh;">

            </footer>
            
           
        </div>

       

     
<!-- -------------------------------------JAVASCRIPT--------------------------------------------- -->
        <!-- SIDEBAR FUNCTION SCRIPT -->
        <script src = "../javascript_folder/sidebar.js"></script>
        
        <script>
                 
                let firstname_my_profile = document.getElementById("firstname_my_profile").textContent;
                document.getElementById("firstname_my_profile_id").value =  firstname_my_profile;

                let middlename_my_profile = document.getElementById("middlename_my_profile").textContent;
                document.getElementById("middlename_my_profile_id").value =  middlename_my_profile;
                
                let lastname_my_profile = document.getElementById("lastname_my_profile").textContent;
                document.getElementById("lastname_my_profile_id").value =  lastname_my_profile;

                let age_my_profile = document.getElementById("age_my_profile").textContent;
                document.getElementById("age_my_profile_id").value =  age_my_profile;

                

                let gender_my_profile_id = document.getElementById("gender_my_profile").textContent;
                document.getElementById("gender_my_profile_id").value = gender_my_profile_id;


                 let user_id_my_profile = document.getElementById("user_id_my_profile").textContent;
                document.getElementById("user_id_my_profile_id").value = user_id_my_profile;

                let suffix_id_my_profile = document.getElementById("suffix_my_profile").textContent;
                document.getElementById("suffix_id_my_profile").value = suffix_id_my_profile;

                let birthday_my_profile = document.getElementById("birthday_my_profile").textContent;
                document.getElementById("birthday_my_profile_id").value = birthday_my_profile;

                let contact_phone_my_profile = document.getElementById("contact_phone_my_profile").textContent;
                document.getElementById("contact_phone_my_profile_id").value = contact_phone_my_profile;
                
               
                let house_no_my_profile = document.getElementById("house_no_my_profile").textContent;
                document.getElementById("house_no_my_profile_id").value = house_no_my_profile;

                
                let sitio_pook_my_profile = document.getElementById("sitio_pook_my_profile").textContent;
                document.getElementById("select").value = sitio_pook_my_profile;
                
                let profile_user = document.getElementById("profile_user").textContent;
                document.getElementById("profile_user_display").src =  profile_user;

                let logo_get_user = document.getElementById("logo_get_user").textContent;
                document.getElementById("logo_user").src =  logo_get_user;

                
                let baranagy_name_get_user = document.getElementById("baranagay_name_get_user").textContent;
                document.getElementById("baranagay_name_user").innerHTML =  baranagy_name_get_user;




        </script>


        <script>
            // Compute today's date minus 18 years
            const today = new Date();
            const year = today.getFullYear() - 18;
            const month = ("0" + (today.getMonth() + 1)).slice(-2);
            const day = ("0" + today.getDate()).slice(-2);

            const maxDate = `${year}-${month}-${day}`;

            // Apply max date
            document.getElementById("birthday_my_profile_id").setAttribute("max", maxDate);
        </script>



</body>
</html>