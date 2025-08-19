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
                color: var(--1st-text-color);
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
            .main_container .form .item1 #precinct,#id_type,#id_number{
                padding: 5px;
                margin-left: 20px;
                margin-top: 20px;
                margin-bottom: 20px;
                border-radius: 4px;
                border: none;
                width: 250px;
                height: 28px;
                color: #005720;
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
                color: var(--2nd-bg-color);
            } 

            .main_container .form .item-form1 input{
                height:15px;
                width: 12vw;
                margin-top: 5px;
                border: none;
                padding: 10px;
                border-radius: 4px;
                color: var(--2nd-bg-color);
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
                color: var(--2nd-bg-color);
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
                color: var(--2nd-bg-color);
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
            color: var(--2nd-bg-color);
            
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
                color: var(--2nd-bg-color);
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
                color: var(--2nd-bg-color);
            }
            .div_form .item-form-other input:focus{
                outline: 2px solid var(--2nd-bg-color);
            }
            .submit_reset_div{
                display: flex;
                justify-content: space-evenly;
                align-items: center;
                font-family: "sub_text";
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
        <h1 class = "h1">Edit Resident List</h1>
    </header>
    <main class = "main_container">
           
        <form action="/BIS/administrator/admin_panel/brgy_resident_folder/update.php" method = "POST" enctype = "multipart/form-data" class = "form">
            <div class = "item1">

            <div class = "img-profile-resident">
                <img src="../../asset/image/resident_profile/672cb2c54fafb.png" alt="error" id = "images">
            </div>
                <input type="file" name = "image" accept = ".jpg, .jpeg, .png" id = "image"><br>
               
                <label for="">ID Type</label><br>
                <select name="id_type" id="id_type_live">
                   <option value="No ID">No ID</option>
                   <optgroup label = "Recommended">
                        <option value="Barangay ID">Barangay ID</option>
                        <option value="National ID">National ID</option>
                        <option value="UMID">UMID</option>
                        <option value="TIN ID">TIN ID</option>
                        <option value="Philhealth Card">Philhealth Card</option>
                        <option value="Drivers License">Drivers License</option>
                  </optgroup>
                  <optgroup label = "Other ID">
                        <option value="Passport">Passport</option>
                        <option value="Students ID">Students ID</option>
                        <option value="Voters ID">Voters ID</option>
                        <option value="SSS ID">SSS ID</option>
                        <option value="Alien/Immigrant COR">Alien/Immigrant COR</option>
                        <option value="Government Office/GOCC ID">Government Office/GOCC ID</option>
                        <option value="HDMF ID (Pagibig)">HDMF ID (Pagibig)</option>
                        <option value="Postal ID">Postal ID</option>
                        <option value="PRC ID">PRC ID</option>
                  </optgroup>
                </select><br>


                <label for="" >ID Number</label><br>
                <input type="text" name = "id_number"  id = "id_number_live" style = "color:#005720;">
            </div>

            <div class = "div_form">
                    <div class = "item-form1">
                        <div>
                        <label for="">Firstname : </label><br>
                        <input type="text" name = "firstname" placeholder = "Enter name" required id = "firstname_live">
                        </div>
                        <div>
                        <label for="">Middlename :</label><br>
                        <input type="text" name = "middlename" placeholder = "Enter Middlename" id = "middlename_live">
                        </div>
                        <div>
                        <label for="">Lastname :</label><br>
                        <input type="text" name = "lastname" placeholder = "Enter Lastname" id = "lastname_live" required>
                        </div>
                       
                    </div>
                    <div class = "item-form2">
                        <div>
                        <label for="">Alias:</label><br>
                        <input type="text" name = "alias" placeholder = "Enter Alias" id = "alias_live">
                        </div>
                        <div>
                        <label for="">Place of birth :</label><br>
                        <input type="text" name = "place_of_birth" placeholder = "Enter Place of Birth" id = "place_of_birth_live"required>
                        </div>
                        <div>
                        <label for="">Birthday :</label><br>
                        <input type="date" name = "date" required id = "birthday_live">
                        </div>
                        
                        
                    </div>
                    <div class = "item-form3">
                        <div>
                        <label for="" >Age:</label><br>
                        <input type="number" name = "age" placeholder = "Enter Age" id = "age_live" max = "110" min = "1" required>
                        </div>
                        <div>
                        <label for="">Civil Status :</label><br>
                    <select name="civil-status" id = "civil_status_live"required>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Seperated">Seperated</option>
                        <option value="Widowed">Widowed</option>
                        <option value="Divorced">Divorced</option>
                    </select>
                        </div>
                        <div>
                        <label for="">Gender:</label><br>
                        <select name="gender" id="gender_live" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        </div>
                    </div>
                    <div class = "item-form4">
                        <div>
                        <label for="" >Email :</label><br>
                        <input type="email" name = "email" placeholder = "Enter email" id = "email_live">
                        </div>
                        <div>
                        <label for="">Contact number :</label><br>
                        <input type="tel" name = "contact_no" placeholder = "Enter Contact.no" id = "contact_no_live" pattern="[0-9]{11}">
                        </div>
                        <div>
                        <label for="">Occupation</label><br>
                        <input type="text" name = "occupation" placeholder = "Enter Occupation" id = "occupation_live">
                        </div>
                    </div>
                    <div class = "item-form-other">
                        <div>
                        <label for="">Voter Status :</label><br>
                        <select name="voter-status" id="voter-status_live">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                        </div>
                        <div>
                        <label for="" >Citizenship :</label><br>
                        <input type="text" name = "citizenship" placeholder = "Enter Citizenship" id = "citizenship_live">
                        </div>  
                        <div>
                        <label for="">House number :</label><br>
                        <input type="text" name = "house_no" placeholder = "Enter Complete Address" id = "house_no_live"required> <br>
                        <label for="">Sitio/Pook</label><br>
                            <select id = "sitio_pook_add_live" name = "sitio_pook_add" placeholder = "Enter Sitio/Pook" required>
                                <option value="Iyala">Iyala</option>
                                <option value="Sitio Burol">Sitio Burol</option>
                                <option value="Sitio Kubuhan & Rigde View">Sitio Kubuhan & Rigde View</option>
                                <option value="Mabuhay Homes 2000">Mabuhay Homes 2000</option>
                                <option value="Sitio Pook Boundary">Sitio Pook Boundary</option>
                                <option value="Camella at the Island Park">Camella at the Island Park</option>
                            </select><br>
                     </div>
                        
                        
                        
                    </div>
                    <input type="hidden" id = "id" name = "id">
                    <div class = "submit_reset_div">
                        <input type="submit" name = "submit_resident_list" id = "submit">
                        <input type="reset" id = "reset">
                        <a href="/BIS/administrator/admin_panel/resident.php"><input type="button" value = "Cancel" id = "cancel"></a>
                        
                    
                    </div>
            </div>
           
        </form>
    
    </main>
</body>
</html>