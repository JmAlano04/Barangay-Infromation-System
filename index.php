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
   <title>Home page | Barangayy Information System</title>
    <link rel = "stylesheet" href = "index.css"/>
    <link rel = "stylesheet" href = "respon_index.css"/>
    <link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">
   <link rel = "stylesheet" href = "animation.css"/>
   
    <script>
        // Check if the page has already reloaded
        if (!sessionStorage.getItem("reloaded")) {
            // Set a flag in sessionStorage
            sessionStorage.setItem("reloaded", true);

            // Reload the page
            window.location.reload();
        }
    </script>

       <!-- If it's a PNG or another format -->
       <link rel="icon" href="/BIS/favicon/favicon-32x32.png" type="image/png">

       <style>
        body::-webkit-scrollbar{
            display:none;
        }
       </style>
</head>
<body>  
            <?php
                
                require('select_data_db.php');
                
                session_start();

            
            ?>

        <header class = "header">
            <div class = "social_logo">
                <a href="https://www.facebook.com/profile.php?id=61553666895025" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64h98.2V334.2H109.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H255V480H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"/></svg></a>
               
           
            </div>
            <div class = "btn_e-barangay">
                <a href="user_login/user_login_page.php"><button id="loginButton" class = "svg_login">Sign In</button></a>
            </div>
            
            <?php
            
          if ($_SESSION['status_input'] == 'invalid_input' || empty($_SESSION['status_input'])){
            // set default session invalid
            $_SESSION['status_input'] = 'invalid_input';
        }else{
            if( $_SESSION['status_input'] == 'valid_input'){
           
                ?>
                     <script>
                          // Simulate user login status (true for logged in, false for logged out)
                            let isLoggedIn = true;
                              // Get the button element
                              const button = document.getElementById("loginButton");

                              const button_svg = document.querySelector('.iconContainer');
                              
                              
      
                              // Function to update button based on login status
                              function updateButton() {
                                  if (isLoggedIn) {
                                    button.innerHTML = `<span style="display: inline-block; width: 10px; height: 10px; background-color: green; border-radius: 50%; margin-right: 5px;"></span>${"ACTIVE"}`;

                                    
                                        // Add a style directly to the button
                                     
                                        button.style.width = 'max-content';
                                    
                                        button_svg.style.position = 'relative';
                                        
                                        button_svg.style.right = '10px'; // Move 20px to the right
                                      button.onclick = () => {
                                          isLoggedIn = true; // Update the status
                                          updateButton(); // Update button again

                                       
                                      };
                                  } 
                              }
                              
                              // Initial update
                              updateButton();
                   </script>
                <?php
            }

        }
            
      
            ?>
        </header>
        
        <nav class = "nav">
            <div class = "logo">
                <img src="asset/image/6798e1930e952.png" alt="" id = "logo">
            </div>
            <div class = "headings">
                <h1>BARANGAY <span id = "barangay_name">PALIPARAN II</span> </h1><br>
                <h3>CITY OF <span id = "municipality">DASMARIÑAS</span></h3>
            </div>
            
            <div class = "nav_" id = "_nav">
          
                <a href="#home">Home</a>
                <a href="#services">Services</a>
                <a href="#official">Officer</a>
                <a href="#hotlines">Hotlines</a>
                <a href="#footer">Contact</a>
                <span class="closebtn" onclick="this.parentElement.classList.toggle('active');">&times;</span>
            </div>
            <div class = "humber_menu" id = "menu_btn">
            
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/></svg>
            </div>

        </nav>
       
        <section id = "home">
            <img src="asset/image/background/bg.jpg" alt="" id = "barangay_image_id">

          
            <h1><span >WELCOME TO</span> <br> <span style = "color:#F5E402;">BARANGAY <span id = "barangay_name-2nd">PALIPARAN</span> </span></h1>
            
        </section>

  
        <h1 class = "h1-services">SERVICES</h1>
        <section id = "services">
           
        <div>
            <a href="user_login/user_login_page.php"><button>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" transform: ;msFilter:;"><path d="M19.965 8.521C19.988 8.347 20 8.173 20 8c0-2.379-2.143-4.288-4.521-3.965C14.786 2.802 13.466 2 12 2s-2.786.802-3.479 2.035C6.138 3.712 4 5.621 4 8c0 .173.012.347.035.521C2.802 9.215 2 10.535 2 12s.802 2.785 2.035 3.479A3.976 3.976 0 0 0 4 16c0 2.379 2.138 4.283 4.521 3.965C9.214 21.198 10.534 22 12 22s2.786-.802 3.479-2.035C17.857 20.283 20 18.379 20 16c0-.173-.012-.347-.035-.521C21.198 14.785 22 13.465 22 12s-.802-2.785-2.035-3.479zm-9.01 7.895-3.667-3.714 1.424-1.404 2.257 2.286 4.327-4.294 1.408 1.42-5.749 5.706z"></path></svg>
            </button></a>
            <h4>BARANGAY CERTIFICATION</h4>
            <p>Request Barangay Certification<br></p>
            <a href="user_login/user_login_page.php"><button  class = "btn_proceed">Proceed</button></a>
        </div>
      
        
        <div>
        <a href="user_login/user_login_page.php"><button><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" transform: ;msFilter:;"><circle cx="6" cy="4" r="2"></circle><path d="M9 7H3a1 1 0 0 0-1 1v7h2v7h4v-7h2V8a1 1 0 0 0-1-1z"></path><circle cx="17" cy="4" r="2"></circle><path d="M20.21 7.73a1 1 0 0 0-1-.73h-4.5a1 1 0 0 0-1 .73L12 14h2l-1 4h2v4h4v-4h2l-1-4h2z"></path></svg></button></a>
        <h4>BARANGAY INDIGENCY</h4>
        <p>Request Barangay Indigency<br></p>
        <a href="user_login/user_login_page.php"><button class = "btn_proceed">Proceed</button></a>
        </div>
       
        <div>
            <a href="user_login/user_login_page.php"><button><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" transform: ;msFilter:;"><path d="M2.047 14.667a.992.992 0 0 0 .466.607l1.909 1.104v2.199a1 1 0 0 0 1 1h2.199l1.104 1.91a1.002 1.002 0 0 0 1.366.366L12 20.75l1.91 1.104a1.002 1.002 0 0 0 1.366-.366l1.103-1.909h2.199a1 1 0 0 0 1-1V16.38l1.909-1.104a.999.999 0 0 0 .366-1.366L20.75 12l1.104-1.909a1 1 0 0 0-.366-1.366l-1.909-1.104V5.422a1 1 0 0 0-1-1H16.38l-1.103-1.909a1.004 1.004 0 0 0-.607-.466.994.994 0 0 0-.759.1L12 3.25l-1.909-1.104a.998.998 0 0 0-1.366.365l-1.104 1.91H5.422a1 1 0 0 0-1 1V7.62L2.513 8.725a1.001 1.001 0 0 0-.365 1.366L3.251 12l-1.104 1.909a1.003 1.003 0 0 0-.1.758z"></path></svg></button>
            </a>
            <h4>BARANGAY CLEARANCE</h4>
            <p>Request Barangay Clearance<br></p>
            <a href="user_login/user_login_page.php"><button class = "btn_proceed">Proceed</button></a>
        </div>
           
        <div>
            <a href="user_login/user_login_page.php"><button><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 96l576 0c0-35.3-28.7-64-64-64L64 32C28.7 32 0 60.7 0 96zm0 32L0 416c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-288L0 128zM64 405.3c0-29.5 23.9-53.3 53.3-53.3l117.3 0c29.5 0 53.3 23.9 53.3 53.3c0 5.9-4.8 10.7-10.7 10.7L74.7 416c-5.9 0-10.7-4.8-10.7-10.7zM176 192a64 64 0 1 1 0 128 64 64 0 1 1 0-128zm176 16c0-8.8 7.2-16 16-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16zm0 64c0-8.8 7.2-16 16-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16zm0 64c0-8.8 7.2-16 16-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16z"/></svg></button></a>
            <h4>BARANGAY ID</h4>
            <p>Request Barangay ID<br></p>
            <a href="user_login/user_login_page.php"><button class = "btn_proceed" >Proceed</button></a>
        </div>
        <div>
            <a href="user_login/user_login_page.php"><button><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M48 0C21.5 0 0 21.5 0 48L0 464c0 26.5 21.5 48 48 48l96 0 0-80c0-26.5 21.5-48 48-48s48 21.5 48 48l0 80 89.9 0c-6.3-10.2-9.9-22.2-9.9-35.1c0-46.9 25.8-87.8 64-109.2l0-95.9L384 48c0-26.5-21.5-48-48-48L48 0zM64 240c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 32c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-32zm112-16l32 0c8.8 0 16 7.2 16 16l0 32c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-32c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 32c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-32zM80 96l32 0c8.8 0 16 7.2 16 16l0 32c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-32c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 32c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-32zM272 96l32 0c8.8 0 16 7.2 16 16l0 32c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-32c0-8.8 7.2-16 16-16zM576 272a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM352 477.1c0 19.3 15.6 34.9 34.9 34.9l218.2 0c19.3 0 34.9-15.6 34.9-34.9c0-51.4-41.7-93.1-93.1-93.1l-101.8 0c-51.4 0-93.1 41.7-93.1 93.1z"/></svg></button>
            </a>
            <h4>BUSINESS PERMIT</h4>
            <p>Request Business Permit<br></p>
            <a href="user_login/user_login_page.php"><button class = "btn_proceed">Proceed</button></a>
        </div>
        <div>
            <a href="user_login/user_login_page.php"><button><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M312 201.8c0-17.4 9.2-33.2 19.9-47C344.5 138.5 352 118.1 352 96c0-53-43-96-96-96s-96 43-96 96c0 22.1 7.5 42.5 20.1 58.8c10.7 13.8 19.9 29.6 19.9 47c0 29.9-24.3 54.2-54.2 54.2L112 256C50.1 256 0 306.1 0 368c0 20.9 13.4 38.7 32 45.3L32 464c0 26.5 21.5 48 48 48l352 0c26.5 0 48-21.5 48-48l0-50.7c18.6-6.6 32-24.4 32-45.3c0-61.9-50.1-112-112-112l-33.8 0c-29.9 0-54.2-24.3-54.2-54.2zM416 416l0 32L96 448l0-32 320 0z"/></svg></button>
            </a>
            <h4>BARANGAY CEDULA</h4>
            <p>Request Barangay Cedula<br></p>
            <a href="user_login/user_login_page.php"><button class = "btn_proceed">Proceed</button></a>
        </div>
        

        </section>

        <section id = "official">
        <h1>BARANGAY OFFICIALS</h1>
            <div class = "chairman">
                <?php
                    require('database/conn_db.php');
                    // Fetch records for the current page
                    $sql = "SELECT * FROM barangay_official WHERE chairmanship = 'Chairman' ORDER BY id DESC";


                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                           $row = mysqli_fetch_assoc($result);

                        
                            $id = $row['id'];
                            $fullname = $row["fullname"];
                            $chairman = $row["chairmanship"];
                       
                            $position = $row["position"];
                            $term_start = $row["term_start"];
                            $term_end = $row["term_end"];
                            $status = $row["status"];
                            $image = $row["photo"];

                            ?>
                             <img src="asset/image/official/<?php echo $image;?>" alt="">
                                <p><?php echo  $fullname ;?></p>
                                <p>PUNONG BARANGAY</p>
                            <?php
                        }
                
                ?>
               
                
            </div>

            <div class = "_kagawad">

            <?php

                require('database/conn_db.php');
            // Fetch records for the current page
                $sql = "SELECT * FROM barangay_official WHERE chairmanship = 'Kagawad' OR chairmanship = 'SK Chairman' OR chairmanship = 'SK Kagawad'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $fullname = $row["fullname"];
                        $chairman = $row["chairmanship"];
                        $firstThreeLetters = substr($chairman, 0, 3);
                        $position = $row["position"];
                        $term_start = $row["term_start"];
                        $term_end = $row["term_end"];
                        $status = $row["status"];
                        $image = $row["photo"];
                        ?>
                        
                        <div>
                            <img src="asset/image/official/<?php echo $image ?>" alt="">
                            <p><?php echo  $firstThreeLetters . ". " . $fullname;?></p>
                            <p>BARANGAY COUNCIL</p>
                         </div>
                        
                        <?php
                    }

                }
            
            ?>

               
           
               
            </div>
        </section>

        <section id = "online_request"> 
            <h1>ONLINE BARANGAY <br>REQUEST</h1>
            <a href="user_login/user_login_page.php"><button>Let's Go</button></a>
        </section>

        <section id = "galllery">
            <h1>GALLERY</h1>

            <div class="div_gallery" >
            <?php

            require('database/conn_db.php');
            // Fetch records for the current page
            $sql = "SELECT photo FROM gallery WHERE id <= 9";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    
                    $photo = $row["photo"];
                    ?>
                          
                            <div>
                            <img src="asset/image/gallery/<?php echo $photo?>" alt="" class="img">
                            
                            </div> 
                      
                 
                    
                    <?php
                }

            }

            ?>
            </div>
      
            <button style = "cursor:pointer; margin-top:100px; "  onclick="loadmore()">Load more..</button>
        </section>

        <section id = "hotlines">
            <h1><span style = "color:red;">EMERGENCY</span> HOTLINES</h1>
            <div class = "item1">
                <h2>Emergency operation Hotlines</h2>
                <div class = "emergency">
                    <div>
                        <p>(046) 435 0183</p>
                        <p>(046) 481 0555</p>
                        <p>(046) 686 6608</p>
                    </div>
                    <div>
                        <p>0917 721 8825</p>
                        <p>0998 843 5477</p>
                        <p>0908 818 5555</p>
                    </div>
                </div>
                
            </div>

            <div class = "item2">

            <h2>BFP</h2>
                <div class = "bfp">
                    <div>
                        <p>(046) 416 0875</p>
                        <p>(046) 424 2537</p>
                    </div>
                    <div>
                        <p>0995 336 9534</p>
                        <p>0902 448 7857</p>
                    </div>
                </div>
            </div>

            <div class = "item3">
            <h2>PNP</h2>
                <div class = "pnp">
                    <div>
                        <p>(046) 416 0254</p>
                        <p>(046) 416 2924</p>
                    </div>
                    <div>
                        <p>0929 665 9533</p>
                        <p>0998 598 5595</p>
                        <p>0956 800 3329</p>
                    </div>
                </div>
            </div>

            <div class = "item4">
                <div>   
                    <h2>MERALCO</h2>
                    <p>0917 551 6211</p>
                    <p>0920 971 6211</p>
                </div>
                <div>   
                    <h2>ABULANCE</h2>
                    <p>0998 566 5555</p>
                </div>
            </div>

            <div class = "item5">
                <div>   
                    <h2>BARANGAY PALIPARAN 2</h2>
                    <p>0951 385 6318</p>
                </div>
            </div>



        </section>

        <section id = "maps">
                
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3866.1402204626515!2d120.99125687414404!3d14.30328438428866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d673f808ef65%3A0xf1e2a9d39e40bb!2sPaliparan%202%2C%20Dasmari%C3%B1as%2C%20Cavite!5e0!3m2!1sen!2sph!4v1728217955989!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>


        <footer id = "footer">
            <div class = "item1_footer">
                <h1></h1>
                <div class = "div_img">
                <img src="asset/image/logo/6736e31f2c7d1.png" alt="" id = "logo-about">
                   
                </div>
            </div>
            <div class = "item2_footer">
                <h1>Get in Touch</h1>
                <p><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" transform: ;msFilter:;"><path d="m20.487 17.14-4.065-3.696a1.001 1.001 0 0 0-1.391.043l-2.393 2.461c-.576-.11-1.734-.471-2.926-1.66-1.192-1.193-1.553-2.354-1.66-2.926l2.459-2.394a1 1 0 0 0 .043-1.391L6.859 3.513a1 1 0 0 0-1.391-.087l-2.17 1.861a1 1 0 0 0-.29.649c-.015.25-.301 6.172 4.291 10.766C11.305 20.707 16.323 21 17.705 21c.202 0 .326-.006.359-.008a.992.992 0 0 0 .648-.291l1.86-2.171a.997.997 0 0 0-.085-1.39z"></path></svg></span>0951 385 6318</p>
                <p><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" transform: ;msFilter:;"><path d="m20.487 17.14-4.065-3.696a1.001 1.001 0 0 0-1.391.043l-2.393 2.461c-.576-.11-1.734-.471-2.926-1.66-1.192-1.193-1.553-2.354-1.66-2.926l2.459-2.394a1 1 0 0 0 .043-1.391L6.859 3.513a1 1 0 0 0-1.391-.087l-2.17 1.861a1 1 0 0 0-.29.649c-.015.25-.301 6.172 4.291 10.766C11.305 20.707 16.323 21 17.705 21c.202 0 .326-.006.359-.008a.992.992 0 0 0 .648-.291l1.86-2.171a.997.997 0 0 0-.085-1.39z"></path></svg></span>0951 385 6318</p>
                <p><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" transform: ;msFilter:;"><path d="m9 6.882-7-3.5v13.236l7 3.5 6-3 7 3.5V7.382l-7-3.5-6 3zM15 15l-6 3V9l6-3v9z"></path></svg></span>Paliparan II, Dasmariñas, Philippines</p>
                <p><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" transform: ;msFilter:;"><path d="m18.73 5.41-1.28 1L12 10.46 6.55 6.37l-1.28-1A2 2 0 0 0 2 7.05v11.59A1.36 1.36 0 0 0 3.36 20h3.19v-7.72L12 16.37l5.45-4.09V20h3.19A1.36 1.36 0 0 0 22 18.64V7.05a2 2 0 0 0-3.27-1.64z"></path></svg></span>Barangay.paliparanII@gmail.com</p>
            </div>
          
   


        </footer>

        <div class = "copy_right">
            <p>&copy; BARANGAY <span id = "barangay_name-3nd"></span> 2025 . All rights reserved. | <br>  Developed by <br> <a href="https://www.facebook.com/jm.alano.2025/" target = _blank>Jenmar Alano</a>, <a href="https://www.facebook.com/crlxndr" target = _blank>Alexandra Peralta</a>,<a href="https://www.facebook.com/Seiji.xzx" target = _blank> Niel Alegiojo</a> </p>
        </div>

        <script>
         
                            // ----------------------MODAL_ADD_OFFIICIAL--------------------
            // Get the modal
            let modal = document.getElementById("_nav");
           
            // Get the button that opens the modal
            let btn_create = document.querySelector("#menu_btn");
         

            // When the user clicks on the button, open the modal
            btn_create.onclick = function() {
         
            modal.classList.toggle("active");
            }
         
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
            if (event.target == modal || event.target == btn_create) {
                modal.classList.toggle("active");
            }
            }

        </script>

        <script>
                let logo = document.getElementById("logo_get").textContent;
                let barangay_image = document.getElementById("barangay_image").textContent;
                let barangay_name = document.getElementById("barangay_get").textContent;
                let municipality = document.getElementById("municipality_get").textContent;
                
                document.getElementById("municipality").innerHTML =  municipality;
                document.getElementById("barangay_name").innerHTML =  barangay_name;
                document.getElementById("barangay_name-2nd").innerHTML =  barangay_name;
                document.getElementById("barangay_name-3nd").innerHTML =  barangay_name;
                document.getElementById("logo").src =  logo;
                document.getElementById("logo-about").src =  logo;

                document.getElementById("barangay_image_id").src =  barangay_image;
        </script>

     
<script>
    let toggle = true; // Track state to swap images

    function loadmore() {
        let images = document.querySelectorAll(".img");

        let newImagesSet1 = [

            <?php

            require('database/conn_db.php');
            // Fetch records for the current page
            $sql = "SELECT photo FROM gallery WHERE id >= 10";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
             
                while ($row = $result->fetch_assoc()) {
                    $photo = $row["photo"];
                    ?>
                     "asset/image/gallery/<?php echo $photo ?>",
                    <?php
                   
                }

            }

            ?>
           
        ];

        let newImagesSet2 = [
            <?php

                require('database/conn_db.php');
                // Fetch records for the current page
                $sql = "SELECT photo FROM gallery WHERE id <= 9";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                
                    while ($row = $result->fetch_assoc()) {
                        $photo = $row["photo"];
                        ?>
                        "asset/image/gallery/<?php echo $photo ?>",
                        <?php
                    
                    }

                }

            ?>
        ];

        // Swap between sets when clicking
        images.forEach((img, index) => {
            img.src = toggle ? newImagesSet1[index] : newImagesSet2[index];
        });

        toggle = !toggle; // Toggle state for next click
    }
</script>
<script>
    // Scroll animation trigger
document.addEventListener('DOMContentLoaded', function() {
    // Intersection Observer for scroll animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
            }
        });
    }, {
        threshold: 0.1
    });

    // Observe all sections
    document.querySelectorAll('section').forEach(section => {
        observer.observe(section);
    });

    // Special animation for the header
    const header = document.querySelector('header');
    setTimeout(() => {
        header.style.transform = 'translateY(0)';
        header.style.opacity = '1';
    }, 500);
});
</script>
</body>
</html>