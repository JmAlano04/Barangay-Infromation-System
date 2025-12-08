

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Barangayy Information System</title>
    <link rel = "stylesheet" href = "style_user/user_style_main.css"/>
    <link rel = "stylesheet" href = "style_user/dashboard_style.css"/>
    <link rel = "stylesheet" href = "style_user/layout_main.css"/>
    <link rel="icon" href="/BIS/favicon/favicon.ico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body::-webkit-scrollbar{
            display:none;
        }
       </style>
</head>
<body>
    <?php
        
        require('../session.php');
        require('select_data_db.php');
        require('db_data_user.php');

   
    

    ?>
    
    <div class = "sidebar" >
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
                        <a href="user.php" id = "selected">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" transform: ;msFilter:;"><path d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z"></path></svg><span class = "link_name">Dashboard</span></a>
                        <span class = "tooltip">Dashboard</span>
                    </li>

                    <li>
                        <a href="profile.php">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/></svg><span class = "link_name">My Profile</span></a>
                        <span class = "tooltip">My Profile</span>
                    </li>
                    <li >
                        <a href="document.php">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M211 7.3C205 1 196-1.4 187.6 .8s-14.9 8.9-17.1 17.3L154.7 80.6l-62-17.5c-8.4-2.4-17.4 0-23.5 6.1s-8.5 15.1-6.1 23.5l17.5 62L18.1 170.6c-8.4 2.1-15 8.7-17.3 17.1S1 205 7.3 211l46.2 45L7.3 301C1 307-1.4 316 .8 324.4s8.9 14.9 17.3 17.1l62.5 15.8-17.5 62c-2.4 8.4 0 17.4 6.1 23.5s15.1 8.5 23.5 6.1l62-17.5 15.8 62.5c2.1 8.4 8.7 15 17.1 17.3s17.3-.2 23.4-6.4l45-46.2 45 46.2c6.1 6.2 15 8.7 23.4 6.4s14.9-8.9 17.1-17.3l15.8-62.5 62 17.5c8.4 2.4 17.4 0 23.5-6.1s8.5-15.1 6.1-23.5l-17.5-62 62.5-15.8c8.4-2.1 15-8.7 17.3-17.1s-.2-17.4-6.4-23.4l-46.2-45 46.2-45c6.2-6.1 8.7-15 6.4-23.4s-8.9-14.9-17.3-17.1l-62.5-15.8 17.5-62c2.4-8.4 0-17.4-6.1-23.5s-15.1-8.5-23.5-6.1l-62 17.5L341.4 18.1c-2.1-8.4-8.7-15-17.1-17.3S307 1 301 7.3L256 53.5 211 7.3z"/></svg><span class = "link_name">Document</span></a>
                        <span class = "tooltip">Document</span>
                    </li>
                    <li >
                        <a href="complaints.php" >
                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg><span class = "link_name">My Blotter</span></a>
                        <span class = "tooltip">My Blotter</span>
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
                    <h1>DASHBOARD</h1>
                    <div class = "setting">
                      
                       
                        <div class = "svg">
                            <a href="../logout.php">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
                            </a>
                       
                        </div>
                           
                            
                    </div>
                            


                </div>
                <div class = "date_today">
                    <span></span>
                        <p><?php
                            $date_today = date("F d, Y / l");
                            echo  $date_today;
                        ?></p>
                </div>
                
                <div class = "div_content">
                            
                    <div class = "dasdboard_profile">
                        <div class = "sub_dashboard_profile">
                            <div class = "item1">
                            <img src="/BIS/asset/image/user_profile/images.png" alt="" id = "profile_user_display">
                            </div>
                            
                            <div class = "item2">
                                <h4 id = "fullname_user_display"></h4><br>
                                <h3 id = "address_user_display" style = "text-align:left;">Address </h3>
                                <h3></h3><br>
                                <h3 id = "contact_no_user_display">Contact</h3>
                                <h3 id = "verify_display">Not</h3>
                            </div>
                        </div>

                        <div class = "sub2_dashboard_profile">
                         
                            <div class = "item2">
                                
                            </div>
                        </div>
                    </div>

                    <div class = "dashboard_profile2">
                           
                            <div class = "item1">
                            <h2 style = "text-align:left; margin-top:30px; color:#4A9D4f; ">Quick Access</h2>
                            <div style = "border:none;"></div>
                            <div>
                                <h4><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 38.6C310.1 219.5 256 287.4 256 368c0 59.1 29.1 111.3 73.7 143.3c-3.2 .5-6.4 .7-9.7 .7L64 512c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zm48 96a144 144 0 1 1 0 288 144 144 0 1 1 0-288zm16 80c0-8.8-7.2-16-16-16s-16 7.2-16 16l0 48-48 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l48 0 0 48c0 8.8 7.2 16 16 16s16-7.2 16-16l0-48 48 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-48 0 0-48z"/></svg>Request Document</h4>
                                <a href="document.php"><button>Proceed</button></a>
                                </div>
                                <div>
                                    <h4><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 96l576 0c0-35.3-28.7-64-64-64L64 32C28.7 32 0 60.7 0 96zm0 32L0 416c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-288L0 128zM64 405.3c0-29.5 23.9-53.3 53.3-53.3l117.3 0c29.5 0 53.3 23.9 53.3 53.3c0 5.9-4.8 10.7-10.7 10.7L74.7 416c-5.9 0-10.7-4.8-10.7-10.7zM176 192a64 64 0 1 1 0 128 64 64 0 1 1 0-128zm176 16c0-8.8 7.2-16 16-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16zm0 64c0-8.8 7.2-16 16-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16zm0 64c0-8.8 7.2-16 16-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16z"/></svg>
                                    My Profile</h4>
                                    <a href="profile.php"><button>Proceed</button></a>
                                </div>
                           
                       
                               
                              
                              
                            </div>
                            <div  class = "item2">
                                <div>
                                    <h1>Activity </h1>
                                    <div class = "status">
                                        <h2>Document type : </h2>
                                        <h2><?php  ?>
                                        <?php  $document = $row['request_document']; 
                                         if($document  == true){
                                            echo $document;
                                         }else if (empty($document)){
                                            echo "<h2 style = 'color:#00572060;'>No data</h2>";
                                         }

                                        ?></h2>

                                    </div>
                                    <div class = "status">
                                        
                                        <h2>Date Request : </h2>

                                        <h2><?php $date = $row['date_request'];
                                             if($date == true){
                                                echo date('M. d, Y',strtotime($date));
                                             }else if (empty($date)){
                                                echo "<h2 style = 'color:#00572060;'>No data</h2>";
                                             }
                                        ?>
                                         
                                        </h2>

                                    </div>

                                   
                                    <div class = "status">
                                        <h2>Purpose : </h2>
                                      

                                        <h2>
                                        <?php  $purpose = $row['purpose']; 
                                         if($purpose == true){
                                            echo $row['purpose'];
                                         }else if (empty($purpose)){
                                            echo "<h2 style = 'color:#00572060;'>No data</h2>";
                                         }

                                        ?></h2>

                                    </div>

                                      <div class="status">
                                            <h2>Processing Fee :</h2>

                                            <?php
                                                 $purpose = $row['purpose'];
                                                 if(empty($purpose)){
                                                    echo "<h2 style = 'color:#00572060;'>No data</h2>";
                                                 }else{
                                                      // Correct amount source from barangay_revenue table
                                                $processing_fee = isset($rev['document_amount']) ? $rev['document_amount'] : null;

                                                if (!empty($processing_fee) && $processing_fee > 0) {
                                                    echo "<h2>₱ " . number_format($processing_fee, 2) . "</h2>";
                                                } else {
                                                    echo "<h2 style='color:#00572060;'>No data</h2>";
                                                }
                                                 }
                                              
                                            ?>
                                        </div>

                                   
                                    
                                    <div class = "status">
                                        <h2>Status :</h2>
                                        <h2>
                                        <?php
                                            $satus_document =  trim($row['status'] );

                                            if ($satus_document == "No data"){
                                                echo "<h2 style = 'color:#00572060;'>No data</h2>";
                                            }
                                            else if ($satus_document == "Pending"){
                                                echo "<h2 style = 'color:red;'>Pending</h2>";
                                            }
                                            else if ($satus_document == "Processing"){
                                                echo "<h2 style = 'color:orange;'>Processing</h2>";
                                            }
                                            else if ($satus_document == "Ready to Pick-up"){
                                                echo "<h2 style = 'color:blue;'>Ready to Pick-up</h2>";
                                            }
                                            else if ($satus_document  == "Released"){
                                                echo "<h2 style = 'color:#00cc0e;'>Released</h2>";
                                            }
                                            else if ($satus_document == "Invalid Purpose"){
                                                echo "<p style = 'color:red;'>Invalid Purpose</p>";
                                            }
                                            
                                        ?>
                                        </h2>
                                    </div>
                                   
                                   
                                    
                       
                                </div>
                            </div>
                           
                    </div>
                            
                    <footer style = "height:10vh;">

                    </footer>
                          
                </div>
            <!-- ------------------------ -->
            </div>
          
           

     
<!-- -------------------------------------JAVASCRIPT--------------------------------------------- -->
        <!-- LOGOUT AND SIDEBAR FUNCTION SCRIPT -->
        <script src = "../javascript_folder/sidebar.js"></script>

        <!-- ADD ACCOUNT ADMIN  -->
        <script src = "admin_folder/btn_function.js"></script>


    
   
        
        <script>
                
                // let fullname_user = document.getElementById("fullname_user").textContent;
                // document.getElementById("fullname_user_display").innerHTML =  fullname_user;

                                
                    let fullname_user = document.getElementById("fullname_user").textContent;
                    let svgIcon = `
                    <svg style = "width:25px; margin-right:20px; margin-left:10px; fill:rgb(74,156,78);" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M399 384.2C376.9 345.8 335.4 320 288 320l-64 0c-47.4 0-88.9 25.8-111 64.2
                        c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0
                        1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z"/>
                    </svg>
                    `;
                    document.getElementById("fullname_user_display").innerHTML = svgIcon + fullname_user;
  

                let address_user = document.getElementById("address_user").textContent;
                let svgIcon_add = `
                   <svg style = "width:20px; margin-right:20px; margin-left:10px; fill:rgb(74,156,78);"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                    `;
                document.getElementById("address_user_display").innerHTML =  svgIcon_add + address_user + " Paliparan 2 <br> <span style = 'margin-left:50px;'> Dasmariñas City, Cavite</span>";

                let contact_no_user = document.getElementById("contact_no_user").textContent;
                let svgIcon_phone = `
                  <svg style = "width:20px; margin-right:20px; margin-left:10px; fill:rgb(74,156,78);" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M16 64C16 28.7 44.7 0 80 0L304 0c35.3 0 64 28.7 64 64l0 384c0 35.3-28.7 64-64 64L80 512c-35.3 0-64-28.7-64-64L16 64zM224 448a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM304 64L80 64l0 320 224 0 0-320z"/></svg>
                    `;
                document.getElementById("contact_no_user_display").innerHTML = svgIcon_phone  + contact_no_user;


               let verify_user = document.getElementById("verify_user").textContent.trim();

    if (verify_user == "Pending Verification") {
        // Block of code to be executed if the user is not verified
        let svgIcon_phone = `
            <svg style="width:20px; margin-top:20px; margin-right:20px; margin-left:10px; fill:red;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/>
            </svg>
        `;
        document.getElementById("verify_display").innerHTML = svgIcon_phone + "Pending Resident Verification";
        document.getElementById("verify_display").style.color = "red";

    } else if (verify_user == "Account Verified") {
        // Block of code to be executed if the user is verified
        let svgIcon_phone = `
            <svg style="width:20px; margin-top:20px; margin-right:20px; margin-left:10px; fill:#4A9D4f;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/>
            </svg>
        `;
        document.getElementById("verify_display").innerHTML = svgIcon_phone + verify_user;
        document.getElementById("verify_display").style.color = "#265720";
    }

                
               


                let profile_user = document.getElementById("profile_user").textContent;
                document.getElementById("profile_user_display").src =  profile_user;

                let logo_get_user = document.getElementById("logo_get_user").textContent;
                document.getElementById("logo_user").src =  logo_get_user;

                let baranagy_name_get_user = document.getElementById("baranagay_name_get_user").textContent;
                document.getElementById("baranagay_name_user").innerHTML =  baranagy_name_get_user;


               
        </script>

        
   
</body>
</html>