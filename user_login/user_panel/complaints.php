<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document | Barangayy Information System</title>
    <link rel = "stylesheet" href = "style_user/user_style_main.css"/>
    <link rel = "stylesheet" href = "style_user/doc_style.css"/>
    <link rel = "stylesheet" href = "style_user/layout_main.css"/>
    <link rel="icon" href="/BIS/favicon/favicon.ico" type="image/x-icon">
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
        // require('db_data_user.php');
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
                    <h1>MY BLOTTER</h1>
                    <div class = "setting">
                      
                       
                    <div class = "svg">
                            <a href="../logout.php">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
                            </a>
                       
                        </div>
                           
                            
                    </div>
                            


                </div>
             
               
                <div class = "div_content">
                
                <button class = "add_button" id = "add_btn">+ ADD</button>
                 <!-- SEARCH BUTTON -->
                 <input type="text" id="live_search" placeholder="SEARCH" data-url="./livesearch.php">
                           
                <div style = "margin-bottom:200px;" id = "searchresult">

                    <?php 
                        require('table_blotter.php');
                    ?>
                </div>                  
    
                   <!-- IMPORT FORM -->
                   <div id="modal_document" class="modal_document">
                                <!-- Modal content -->
                                <div class="modal-content_document">
                                <span onclick="this.parentElement.parentElement.style.display='none';" class = "closesss">&times;</span>
                                        <?php include('blotter_form.php')?>
                                </div>
                   </div>
                            
                           
         
                </div>
            <!-- ------------------------ -->
            </div>
          
         
           
        </div>

     
<!-- -------------------------------------JAVASCRIPT--------------------------------------------- -->
             <!-- SIDEBAR FUNCTION SCRIPT -->
             <script src = "../javascript_folder/sidebar.js"></script>

             <!-- AJAX SCRIPT FOR SEARCH BUTTON -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <script type = "text/javascript" >
                $(document).ready(function(){
                $("#live_search").keyup(function(){
                    var input = $(this).val();
                    // alert(input);

                    if(input != ""){
                        $.ajax({
                            url: "./livesearch.php",
                            method: "POST",
                            data: {input:input},

                            success:function (data){
                                $("#searchresult").html(data);
                            }
                        });
                    }

                });
            });
        </script>

        
        <script>
                


                let logo_get_user = document.getElementById("logo_get_user").textContent;
                document.getElementById("logo_user").src =  logo_get_user;

                
                
                let baranagy_name_get_user = document.getElementById("baranagay_name_get_user").textContent;
                document.getElementById("baranagay_name_user").innerHTML =  baranagy_name_get_user;


        </script>

        <script src = "documnet.js"></script>
</body>
</html>