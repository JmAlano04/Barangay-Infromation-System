<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
             @font-face {
             font-family: "main_text";
            src: url(../../../asset/font/Syncopate/Syncopate-Regular.ttf);
            }
            @font-face {
                font-family: "sub_text";
                src: url(../../../asset/font/Afacad_Flux/AfacadFlux-VariableFont_slnt,wght.ttf);
            }
            *{
                margin: 0px;
                padding: 0px;
                box-sizing: content-box;
                list-style-type: none ;
            }
            :root{
                --bg-color: #FCFAEE;
                --2nd-bg-color:#4A9D4f;
                --sub-bg-color: #005720 ;
            
                --1st-text-color: #005720 ;
                --2nd-text-color: rgb(53, 53, 53);
                --3rd-text-color: #FCFAEE;
            
                --btn-color: #d4b62f;

                --other-color :rgb(0, 183, 255);
            }
            .h1{
                color: #4A9D4f;
                font-size:1.3rem;
                margin-top:20px;
                font-family :"sub_text";
            }
            .main_container .img-profile-resident img{
                border-radius: 4px;
                width: 300px;
                height: 250px;
                margin-top: 20px;
                margin-left: 1px;
                border: 2px solid var(--2nd-bg-color);
                box-shadow: 1px 1px 20px #d4b62f;
                color: var(--2nd-bg-color);
            }
            .main_container .form .item1 #image{
            padding: 5px;
                margin-left: 20px;
                margin-top: 20px;
                margin-bottom: 20px;
                border-radius: 4px;
            border: 2px solid #4a9d504d;
            }
         

            .main_container .form .item1 label{
                margin-left: 20px;
                font-size: 1.1rem;
                font-family: "sub_text";
                color: #005720;
            }
            .main_container .form{
                display: flex;
                justify-content: space-evenly;
                position: relative;
                color: var(--1st-text-color);
            }

            .main_container .form .item-form1,.item-form2,.item-form3,.item-form4{
                display: flex;
                justify-content: space-evenly;
                padding: 10px;
                font-family: "sub_text";
                width: 50vw;
                color:var(#005720);
            } 

            .main_container .form .item-form1 input{
                height:15px;
                width: 12vw;
                margin-top: 5px;
                border: none;
                padding: 10px;
                border-radius: 4px;
                color: var(--sub-bg-color);
            }
            .main_container .form .item-form1 input:focus{
                outline: 2px solid var(--2nd-bg-color);
            }
           
            .main_container .form .item-form2 input{
                height:15px;
                width: 13vw;
                margin-top: 5px;
                padding: 10px 0px 10px 10px;
                border-radius: 4px;
                border: none;
                color: var(--sub-bg-color);
            }
            .main_container .form .item-form2 input:focus{
                outline: 2px solid var(--2nd-bg-color);
            }
            .main_container .form .item-form3 input,select{
                height:15px;
                width: 13vw;
                margin-top: 5px;
                padding: 10px 0px 10px 10px;
                border-radius: 4px;
                border: none;
                color: var(--sub-bg-color);
            }
            .main_container .form .item-form3 input:focus{
                outline: 2px solid var(--2nd-bg-color);
            }
            .main_container .form .item-form3 select:focus{
                outline: 2px solid var(--2nd-bg-color);
            }
            .main_container .form .item-form4 input{
                height:15px;
            width: 13vw;
            margin-top: 5px;
            padding: 10px 0px 10px 10px;
            border-radius: 4px;
            border: none;
            color: var(--sub-bg-color);
            
            }
            .main_container .form .item-form4 input:focus{
                outline: 2px solid var(--2nd-bg-color);
            }
            .item-form-other{
                padding: 20px 20px 20px 40px;
                font-family: "sub_text";
            }
            .div_form .item-form-other #voter-status,#sitio_pook_add{
                width: 45vw;
                height: 15px;
                text-align: center;
                margin-bottom: 10px;
                border-radius: 4px;
                border: none;
                margin-top: 10px;
                color: var(--sub-bg-color);
            }
            .div_form .item-form-other #voter-status:focus, .div_form .item-form-other #sitio_pook_add:focus{
                outline: 2px solid var(--2nd-bg-color);
            }
            .div_form .item-form-other input{
                width: 45.5vw;
                height: 30px;
                text-align: center;
                margin-bottom: 10px;
                border-radius: 4px;
                border: none;
                margin-top: 10px;
                color: var(--sub-bg-color);
            }
            .div_form .item-form-other input:focus{
                outline: 2px solid var(--2nd-bg-color);
            }
            .submit_reset_div{
                display: flex;
                justify-content: end;
                align-items: center;
                font-family: "sub_text";
                margin-right:40px;
            }
            .div_form #submit,#reset,#cancel{
            padding: 12px;
            font-size: 0.9rem;
            margin: 20px 20px 20px 20px;
            border-radius: 4px;
            border: none;
            color: var(--bg-color);
            letter-spacing: 2px;
            width: 80px;

            }
            #submit{
                background-color: #4A9D4f;
                cursor: pointer;
            }
            #reset{
                background-color: var(--other-color);
                cursor: pointer;
            }
            #cancel{
                background-color: red;
                cursor: pointer;
            }
    </style>
</head>
<body>
    <header>
        <h1 class = "h1"><svg style = "width:20px;fill:#4A9D4f;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg>Edit Resident List</h1>
    </header>
    <main class = "main_container">
           
        <form action="/BIS/administrator/admin_panel/brgy_resident_folder/update.php" method = "POST" enctype = "multipart/form-data" class = "form">
          

            <div class = "div_form">
                    <div class = "item-form1">
                        <div>
                        <label for="">Firstname : </label><br>
                        <input type="text" name = "firstname" placeholder = "Enter name" required id = "firstname">
                        </div>
                        <div>
                        <label for="">Middlename :</label><br>
                        <input type="text" name = "middlename" placeholder = "Enter Middlename" id = "middlename">
                        </div>
                        <div>
                        <label for="">Lastname :</label><br>
                        <input type="text" name = "lastname" placeholder = "Enter Lastname" id = "lastname" required>
                        </div>
                       
                    </div>
                    <div class = "item-form2">
                        
                        <div>
                        <label for="">Place of birth :</label><br>
                        <input type="text" name = "place_of_birth" placeholder = "Enter Place of Birth" id = "place_of_birth"required>
                        </div>
                        <div>
                        <label for="">Birthday :</label><br>
                        <input type="date" name = "date" required id = "birthday">
                        </div>
                        
                        
                    </div>
                    <div class = "item-form3">
                        <div>
                        <label for="" >Age:</label><br>
                        <input type="number" name = "age" placeholder = "Enter Age" id = "age" max = "110" min = "1" required>
                        </div>
                        <div>
                        <label for="">Civil Status :</label><br>
                    <select name="civil-status" id = "civil_status"required>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Seperated">Seperated</option>
                        <option value="Widowed">Widowed</option>
                       
                    </select>
                        </div>
                        <div>
                        <label for="">Gender:</label><br>
                        <select name="gender" id="gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Prefer not to say">Prefer not to say</option>
                        </select>
                        </div>
                    </div>
                    <div class = "item-form4">
                        <div>
                        <label for="" >Email :</label><br>
                        <input type="email" name = "email" placeholder = "Enter email" id = "email">
                        </div>
                        <div>
                        <label for="">Contact number :</label><br>
                        <input type="tel" name = "contact_no" placeholder = "Enter Contact.no" id = "contact_no" pattern="[0-9]{11}">
                        </div>
                        <div>
                        <label for="">Occupation</label><br>
                        <input type="text" name = "occupation" placeholder = "Enter Occupation" id = "occupation">
                        </div>
                    </div>
                    <div class = "item-form-other">
                        <div>
                        <label for="">Voter Status :</label><br>
                        <select name="voter-status" id="voter-status">
                        <option value="Registered">Registered</option>
                        <option value="Not Registered">Not Registered</option>
                        </select>
                        </div>
                        <div>
                        <label for="" >Citizenship :</label><br>
                        <input type="text" name = "citizenship" placeholder = "Enter Citizenship" id = "citizenship">
                        </div>  
                        <div>
                        <label for="">House number :</label><br>
                        <input type="text" name = "house_no" placeholder = "Enter Complete Address" id = "house_no"required> <br>
                        <label for="">Sitio/Pook</label><br>
                         <input style = "height:30px;" type = "text" id = "sitio_pook_add" name = "sitio_pook_add" placeholder = "Enter Sitio/Pook" required>
                                
                     </div>
                        
                        
                        
                    </div>
                    <input type="hidden" id = "id" name = "id">
                    <div class = "submit_reset_div">
                      
                      
                        <a href="/BIS/administrator/admin_panel/resident.php"><input type="button" value = "Cancel" id = "cancel"></a>
                        <input type="reset" id = "reset">
                        <input type="submit" name = "submit_resident_list" id = "submit">
                        
                    
                    </div>
            </div>
           
        </form>
    
    </main>
</body>
</html>