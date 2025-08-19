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
        form{
            font-family:"sub_text";
            color:#005720;
        }
        header h1{
            font-size:1.5rem;
            margin-bottom:20px;
            margin-top:20px;
            color:#005720;
        }
        #purpose_cert,#OR_no{
            width: 100%;
            height:40px;
            margin-top:10px;
            margin-bottom: 10px;
            padding: 0px 0px 0px 10px ;
            border:none;
            border-radius:2px;
        }
        #purpose_cert:focus,#OR_no:focus{
            outline:3px solid #4A9D4f;
            
        }
        label{
            font-size:1.3rem;
            font-weight:600;
        }
        #submit,#cancel{
            padding: 15px;
            margin-right:20px;
            margin-top:20px;
            margin-bottom:20px;
            cursor:pointer;
            border:none;
            border-radius:2px;
            color:white;
        }
        #submit{
            background-color:#4A9D4f;
        }
        #submit:hover{
            background-color:#3cca46;
        }
        #cancel{
            background-color:red;
        }
        #cancel:hover{
            background-color:rgb(255, 113, 113);
        }
    </style>
</head>
<body>
    <header>
        <h1 class = "h1" id = "h1">Barangay Certificate</h1>
    </header>

    <form action="/BIS/administrator/admin_panel/certificate_folder/insert_data.php" method = "POST" id = "certForm">
        

        <label for="">Purpose</label><br>
        <input type="text" name = "purpose_cert" placeholder = "Enter Valid Purpose"  id = "purpose_cert" required><br>

        <input type="hidden" name = "id_cert" value = "" id = "id_cert">
        <input type="hidden" name = "firstname_cert" value = "" id = "firstname_cert">
        <input type="hidden" name = "middlename_cert" value = "" id = "middlename_cert">
        <input type="hidden" name = "lastname_cert" value = "" id = "lastname_cert">
        
        <input type="hidden" name = "age_cert" value = "" id = "age_cert">
        <input type="hidden" name = "request_document_cert" value = "" id = "request_document_cert">
        <input type="hidden" name = "house_no_cert" value = "" id = "house_no_cert">

        <input type="hidden" name = "birthday_cert" value = "" id = "birthday_cert">
        <input type="hidden" name = "place_of_birth_cert" value = "" id = "place_of_birth_cert">
        <input type="hidden" name = "contact_no_cert" value = "" id = "contact_no_cert">

        <input type="hidden" name = "contact_person_cert" value = "" id = "contact_person_cert">
        <input type="hidden" name = "contact_no_contact_person_cert" value = "" id = "contact_no_contact_person_cert">
        <input type="hidden" name = "live_since_year_cert" value = "" id = "live_since_year_cert">

        <input type="hidden" name = "status_cert" value = "" id = "status_cert">
        <input type="hidden" name = "gender_cert" value = "" id = "gender_cert">

        <input type="hidden" id = "date_issue_cert" value = "" name = "date_issue_cert">
        <input type="hidden" id = "ex_date_issue_cert" value = "" name = "ex_date_issue_cert">

        <input type="hidden" id = "sitio_pook" value = "" name = "sitio_pook">


        <input type="submit" name = "sub_cert" id = "submit">
       <input type="button" id = "cancel" onclick="this.parentElement.parentElement.parentElement.style.display='none';" value = "Cancel" id = "cancel">
    </form>
    


</body>
</html>