

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


            <ul class = "nav_list">
            
                    <li>
                        <a href="user.php" >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" transform: ;msFilter:;"><path d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z"></path></svg><span class = "link_name">Dashboard</span></a>
                        <span class = "tooltip">Dashboard</span>
                    </li>

                    <li>
                        <a href="profile.php" id = "selected">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/></svg><span class = "link_name">My Profile</span></a>
                        <span class = "tooltip">My Profile</span>
                    </li>
                    <li >
                        <a href="document.php">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M211 7.3C205 1 196-1.4 187.6 .8s-14.9 8.9-17.1 17.3L154.7 80.6l-62-17.5c-8.4-2.4-17.4 0-23.5 6.1s-8.5 15.1-6.1 23.5l17.5 62L18.1 170.6c-8.4 2.1-15 8.7-17.3 17.1S1 205 7.3 211l46.2 45L7.3 301C1 307-1.4 316 .8 324.4s8.9 14.9 17.3 17.1l62.5 15.8-17.5 62c-2.4 8.4 0 17.4 6.1 23.5s15.1 8.5 23.5 6.1l62-17.5 15.8 62.5c2.1 8.4 8.7 15 17.1 17.3s17.3-.2 23.4-6.4l45-46.2 45 46.2c6.1 6.2 15 8.7 23.4 6.4s14.9-8.9 17.1-17.3l15.8-62.5 62 17.5c8.4 2.4 17.4 0 23.5-6.1s8.5-15.1 6.1-23.5l-17.5-62 62.5-15.8c8.4-2.1 15-8.7 17.3-17.1s-.2-17.4-6.4-23.4l-46.2-45 46.2-45c6.2-6.1 8.7-15 6.4-23.4s-8.9-14.9-17.3-17.1l-62.5-15.8 17.5-62c2.4-8.4 0-17.4-6.1-23.5s-15.1-8.5-23.5-6.1l-62 17.5L341.4 18.1c-2.1-8.4-8.7-15-17.1-17.3S307 1 301 7.3L256 53.5 211 7.3z"/></svg><span class = "link_name">Document</span></a>
                        <span class = "tooltip">Document</span>
                    </li>
                   
                    <li >
                        <a href="new_password.php">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M336 352c97.2 0 176-78.8 176-176S433.2 0 336 0S160 78.8 160 176c0 18.7 2.9 36.8 8.3 53.7L7 391c-4.5 4.5-7 10.6-7 17l0 80c0 13.3 10.7 24 24 24l80 0c13.3 0 24-10.7 24-24l0-40 40 0c13.3 0 24-10.7 24-24l0-40 40 0c6.4 0 12.5-2.5 17-7l33.3-33.3c16.9 5.4 35 8.3 53.7 8.3zM376 96a40 40 0 1 1 0 80 40 40 0 1 1 0-80z"/></svg><span class = "link_name">Change Password</span></a>
                        <span class = "tooltip">Change Password</span>
                    </li>

            </ul>

          

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
                <input type="text" id = "firstname_my_profile_id" name = "firstname" value ="" required>
                <input type="text" id = "middlename_my_profile_id" name = "middlename" value ="" >
             
                <input type="text" id = "lastname_my_profile_id"  name = "lastname" value ="" required>
                 <input name="suffix" id = "suffix_id_my_profile" style="width: 130px; margin-right:200px;" placeholder="Enter Suffix here">
               
                <input type="number" id = "age_my_profile_id"  style="width: 70px; margin-right:200px;" readonly name = "age" value = "" max = "110" >
                <input type="date" id = "birthday_my_profile_id" name = "birthday" value = "" required>

                
                

              <div class="sex_radio_group">

                <label class="thin_radio">
                    <input type="radio" name="gender" value="Male" id="gender_male" required>
                    Male
                </label>

                <label class="thin_radio">
                    <input type="radio" name="gender" value="Female" id="gender_female">
                    Female
                </label>

                <label class="thin_radio">
                    <input type="radio" name="gender" value="Prefer not to say" id="gender_none">
                    Prefer not to say
                </label>
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

                

                let gender_my_profile = document.getElementById("gender_my_profile").textContent.trim();

                if (gender_my_profile === "Male") {
                    document.getElementById("gender_male").checked = true;
                } 
                else if (gender_my_profile === "Female") {
                    document.getElementById("gender_female").checked = true;
                }
                else {
                    document.getElementById("gender_none").checked = true;
                }


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