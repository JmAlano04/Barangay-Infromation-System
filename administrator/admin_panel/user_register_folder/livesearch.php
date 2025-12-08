<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        
        <?php
            require("../../../database/conn_db.php");

            
            
            if(isset($_POST['input'])){
                
               
                $input = $_POST['input']; 

                $query = "SELECT * FROM user_account WHERE user_id LIKE '{$input}%' OR firstname LIKE '{$input}%' OR middlename LIKE '{$input}%' OR lastname LIKE '{$input}%'
                 OR age LIKE '{$input}%'  OR gender LIKE '{$input}%' OR email LIKE '{$input}%'";

                
                $result = mysqli_query($conn,$query);

                if ($result->num_rows > 0) {?>


                    
            <table style = "margin-top:150px;">
                    <caption>User Registered List</caption>
                    <tr>
                        
                        <th>Fullname</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Date Registered</th>
                        <th>Action</th>
                    </tr>
                    <?php
                         while($row = $result->fetch_assoc()) {
                            $verify = $row["verify"];
                            $id_registered =$row["user_id"];
                            
                            $firstname =$row["firstname"];
                            $middlename =$row["middlename"];
                            $lastname =$row["lastname"];

                            $gender =$row["gender"];
                            $age =$row["age"];

                            $email =$row["email"];
                            $password=$row["password"];
                            $date_registered=$row["date_registered"];
                            $profile=$row["profile"];
                             $birthday = $row["birthday"];
                                $suffix = $row["suffix"];
                            ?>
                             <tr class = "table_hover">
                                     <td hidden><?php echo $firstname;?></td>
                                    <td hidden><?php echo $middlename;?></td>
                                    <td hidden><?php echo $lastname;?></td>
                                    <td hidden><?php echo $gender;?></td>
                                    <td hidden><?php echo $birthday;?></td>
                                    <td hidden><?php echo $email;?></td>
                                    <td hidden><?php echo $password;?></td>
                                    
                                    <td hidden><?php echo $verify;?></td>
                                    <td hidden><?php echo $suffix;?></td>
                                    <td class = "img"><img src="/BIS/asset/image/user_profile/<?php echo  $profile; ?>" alt="" width = 500/></td>
                                     <td class = "img" ><button class="view_doc_btn" data-id="<?php echo $row["user_id"]; ?>" > <img src="/BIS/asset/image/user_profile/<?php echo  $support_doc; ?>" alt="" width = 500 style = "margin-left:auto;  "></button></td>
                                    <td><?php echo  $firstname . " " .$middlename ." " . $lastname;?></td>
                                    <td><?php echo  $age;?></td>
                                    <td><?php echo  $gender;?></td>
                                    <td><?php echo  $email;?></td>
                                    <td>
                                        <?php 
                                            $verify = $row["verify"];
                                            if ($verify  == "Not Verified") {
                                                echo "<p style='color:red;'>Not Verified</p>";
                                            } elseif ($verify == "Verified") {
                                                echo "<p style='color:green;'>Verified</p>";
                                            }
                                            ?>
                                    </td>
                                    <td><?php echo date('m/d/Y',strtotime($date_registered));?></td>
          
                                   
                                   
                               
                                <td>
                                


                                    <div id = "form_up_del_official">
                                        <button id="verify_btn" class="verify_btn_register" data-id="<?php echo $row["user_id"]; ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM625 177L497 305c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L591 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg></button>
                                
                                            
                                       
                                        <button  id = "update_official_btn" class = "update_btn_registers" data-id= <?php echo $row ["user_id"] ?>><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg></button>
                                        <button id = "delete_official_btn" class = "delete_btn_blotter_users" data-id= <?php echo $row ["user_id"] ?>><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>
                                      
                                    </div>
                                   
                                </td>
                                
                           
                            </tr>
                            

                          
                            <?php
                        
                        }
                    
                    
                    ?>
               
                
            </table>

                                    
       

                    
                    <?php
                    } else {
                        ?>
                            <style>
                                    .Data-not-found h1{
                                        color:rgba(255, 0, 0, 0.37);
                                        position:absolute;
                                        top:300px;
                                        left:25%;
                                        font-size:3.5rem;
                                    }
                            </style>
                            <div class = "Data-not-found">
                                <h1>DATA NOT FOUND</h1>
                            </div>

                        <?php
                       
                    }
                }
                    // -- close connection 
                    mysqli_close($conn);
                    ?>          
        
                     <!-- MODAL DELETE -->
             <div id = "delete-modals" class = "delete-modals">
                <div class = "delete-modal-contents">
                    <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg></span>
                    <h2>Delete Confirmation</h2>
                    <h3>Are you sure you want to delete this record!</h3>
                    <div class = "div-delete">   
                    <button id = "confirm-deletes" class = "btn-deletes">Delete</button>
                    <button id = "cancel-deletes" class = "btn-deletes">Cancel</button>
                    </div>
                </div>
             </div>

              <!-- MODAL UPDATE -->
            <div id = "edit-modal_blotters" class = "edit-modals" >
                    <div class = "edit-modal-contents" style = "width:50%;">
                    <span onclick="this.parentElement.parentElement.style.display='none';" class = "update-close-btn">&times;</span>
                        <?php include("update_user.php");?>
                    </div>
               </div>

                    <!-- MODAL UPDATE -->
            <div id="verify_blotter" class="verify_blotter">
                <div class="verify-modal-content_blotter">
                    <span class="update-close-btn" onclick="document.getElementById('verify_blotter').style.display='none';">&times;</span>
                    <?php include("verify.php"); ?>
                </div>
            </div>
        <div id="view_doc-modal" class="view_doc-modal">
        <div class="view_doc-modal-content">
            <span class="update-close-btn" onclick="document.getElementById('view_doc-modal').style.display='none';">&times;</span>
         

            <input type="hidden" id = "id_view_doc">
           <img src="" alt="" id="image_photo_view" style="width: 800px; height: 100%; margin: 50px 80px 50px 50px; border-radius:4px; ">

        </div>
        </div>

        
        </body>
        </html>