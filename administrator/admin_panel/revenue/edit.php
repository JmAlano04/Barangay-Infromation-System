
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
            color:#4A9D4f;
            font-family:"sub_text";
        }
        #purpose_cert,#OR_no,#amount,#date_issue_print,#purpose_print,#status_print{
            width: 100%;
            height:40px;
            margin-top:10px;
            margin-bottom: 10px;
            padding: 0px 0px 0px 10px ;
            border:none;
            border-radius:2px;
        }
        #purpose_cert:focus,#OR_no:focus,#amount:focus,#date_issue_print:focus,#purpose_print:focus,#status_print:focus{
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
        <h1 class = "h1">
        <svg style = "width:20px;fill:#4A9D4f;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg> Edit Payment</h1>
    </header>

    <form action="/BIS/administrator/admin_panel/revenue/edit_function.php" method = "POST" id = "certForm">
        

        <label for="">Amount</label><br>
        <input type="number" name = "amount" min = "0" placeholder = "Enter Amount"  id = "amount"  step="0.00001" required><br>

       
        <input type="hidden" name = "id_edit" id = "id_edit">
       
       <input type="button" id = "cancel" onclick="this.parentElement.parentElement.parentElement.style.display='none';" value = "Cancel" id = "cancel">
       <input type="submit" name = "sub_income" id = "submit">
    </form>
    


</body>
</html>