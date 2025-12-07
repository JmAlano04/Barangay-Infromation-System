<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Resident</title>
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
            html {
                scroll-behavior: smooth;
            }
            :root{
                --bg-color: #FCFAEE;
                --2nd-bg-color:#4A9D4f;
                --sub-bg-color: #005720 ;
            
                --1st-text-color: #005720 ;
                --2nd-text-color: rgb(53, 53, 53);
                --3rd-text-color: #FCFAEE;
            
                --btn-color: #F5E402;

                --other-color :rgb(0, 183, 255);
            }
            body{
                background-color: var(--bg-color);
                overflow-x: hidden;
            }
            header h1{
                background-color: var(--2nd-bg-color);
                padding: 20px 20px 20px 70px;
                border-radius: 20px;
                margin-top: 5px;
                font-family: "sub_text";
                color: #d4b62f;
                margin-left: 1px;
                margin-right: 1px;
                animation-name: side_animation;
                animation-duration: 2s ;
                
            }
            .main_container{
                
                width: 80vw;
                height: max-content;
                margin-bottom: 5%;
                margin-top: 2%;
                border-radius: 4px;
                margin-left: 10px;
                color: #4A9D4f;
                padding-top: 10px;
                animation-name: side_animation;
                animation-duration: 2s ;
                margin-top:80px;
                
                
            
            }
            .img-profile-resident{
            
            
                margin-left: 40%;
                margin-top: 50px;
                border: 2px solid var(--2nd-bg-color);
                width: fit-content;
                box-shadow: 1px 1px 20px var(--btn-color);
                border-radius: 4px;
            }
            .main_container .item1{
            
                text-align: center;
                padding: 20px 0px 20px 0px;
                font-size: 1.4rem;
                font-family: "sub_text";
                letter-spacing: 2px;
                
            }
            .main_container .item1 input{
                border: 2px solid #4a9d5052;
                padding: 5px;
                margin-bottom: 40px;
                border-radius: 4px;
                font-family: "sub_text";
                color: #4A9D4f;
                cursor: pointer;
                border:1px solid #4A9D4f;

            }
            form label{
                font-size:1.2rem;
                font-family:"sub_text";
            }
            form input:focus, select:focus{
                outline:3px solid #4A9D4f;
            }
            form .item-form input,.item-form select{
               
                width: 300px;
                height:30px;
                margin-top:10px;
                margin-bottom:10px;
                padding :5px 10px 5px 10px;
                border-radius:4px;
                border:none;
                color:#4A9D4f;
                
            }
            form .item-form1 input,.item-form1 select,.item-form2 input,.item-form2 select,.item-form3 input,.item-form3 select,.item-form4 input,.item-form4 select{
                color:#4A9D4f;
                width: 300px;
                height:30px;
                margin-top:10px;
                margin-bottom:10px;
                padding :5px 10px 5px 10px;
                border-radius:4px;
                border:1px solid #4A9D4f;
                color:#4A9D4f;
            }
            form .item-form5{
                display:grid;
                justify-content:center;
            }
            form .item-form5 label{
                text-align:left;
            }
            form .item-form5 input,.item-form5 select{
                color:#4A9D4f;
                width: 50vw;
                height:30px;
                border:1px solid #4A9D4f;
                padding :5px 10px 5px 10px;
                border-radius:4px;
                
                
            }
    
          
            
           
            .submit_reset_div{
                display: flex;
                justify-content: end;
                padding: 40px 20px 40px 10px;
                margin-right:230px;
            }
            .submit_reset_div input{
                padding: 10px;
                width: 10vw;
                cursor: pointer;
                border-radius: 4px;
                border: none;
                height: 30px;
             
             
            }
          
            .submit_reset_div #submit{
                background-color: #4A9D4f;
                color: var(--bg-color);
                
            }
            .submit_reset_div #reset{
                background-color: red;
                color: var(--bg-color);
                margin-right:10px;
            }
            .submit_reset_div #return{
                padding: 10px;
                width: 10vw;
                height: 30px;
                cursor: pointer;
                border-radius: 4px;
                border: none;
                background-color: var(--other-color);
                color: var(--bg-color);
                margin-right:10px;
            
            }

            @keyframes side_animation {
                from {opacity: 1%;}
                to {opacity: 100%;}
                
            
            }

            form .grid{
                display :grid;
                grid-template-columns:auto auto;
                justify-items:center;
                padding:20px 200px 20px 200px;
            }

            form .item-form{
                display :grid;
                grid-template-columns:auto auto;
                justify-items:center;
                padding-bottom:30px;
            }
    </style>
</head>
<body>
    <header>
        
    </header>
    <main class = "main_container">
       
        <form action="/BIS/administrator/admin_panel/brgy_resident_folder/create.php" method = "post">

          
            <div class = "item-form">
           
              
               
            </div>


            <div class = "grid">
            <div class = "item-form1">
                <label for="">Firstname :</label><br>
                <input type="text" name = "firstname" placeholder = "Enter name" required><br>
                <label for="">Middlename :</label><br>
                <input type="text" name = "middlename" placeholder = "Enter Middlename" ><br>
                <label for="">Lastname :</label><br>
                <input type="text" name = "lastname" placeholder = "Enter Lastname" required>
            </div>
            <div class = "item-form2">
                
                <label for="">Place of birth :</label><br>
                <input type="text" name = "place_of_birth" placeholder = "Enter Place of Birth" required><br>
                <label for="">Birthday :</label><br>
                <input type="date" name = "date" required>
            </div>
            <div class = "item-form3">
                <label for="">Age :</label><br>
                <input type="number" name = "age" placeholder = "Enter Age"  max = "110" min = "1" required ><br>
                <label for="">Civil Status :</label><br>
                <select name="civil-status" id = "civil_status"required>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Seperated">Seperated</option>
                        <option value="Widowed">Widowed</option>
                </select><br>

                <label for="">Sex :</label><br>
                <select name="gender" id="gender" required>
                <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Prefer not to say">Prefer not to say</option>
                </select>
            </div>
            <div class = "item-form4">
                <label for="" >Email :</label><br>
                <input type="email" name = "email" placeholder = "Enter email"><br>
                <label for="">Contact number :</label><br>
                <input type="tel" name = "contact_no" placeholder = "Enter Contact.no" pattern="[0-9]{11}"><br>
                <label for="">Occupation</label><br>
                <input type="text" name = "occupation" placeholder = "Enter Occupation">
            </div>
           
        </div>
        <div class = "item-form5">
                <label for="">Voter Status :</label><br>
                <select name="voter-status" id="voter-status">
                <option value="Registered">Registered</option>
                <option value="Not Registered">Not Registered</option>
                </select><br>
                <label for=""   >Citizenship :</label><br>
                <input type="text" name = "citezenship" placeholder = "Enter Citezenship"><br>
                <label for="">House No :</label><br>
                <input type="text" name = "house_no" placeholder = "Enter house number" required><br>
            
            <label for="">Sitio/Pook</label><br>
            <input type = "text" id = "sitio_pook_add" name = "sitio_pook_add" placeholder = "Enter Sitio/Pook" required>
               <br>
            
            </div>

            <div class = "submit_reset_div">
              
              
                <input type="reset" id = "reset">
                <input type="submit" name = "submit_resident" id = "submit">
               
            </div>
        </form>
    
    </main>
</body>
</html>


