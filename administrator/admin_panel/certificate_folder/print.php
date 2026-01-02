<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Payment</title>

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

        #purpose_cert,#OR_no,#amount,#date_issue_print,#purpose_print,#status_print,#fullname{
            width: 100%;
            height:40px;
            margin-top:10px;
            margin-bottom: 10px;
            padding: 0px 0px 0px 10px ;
            border:none;
            border-radius:2px;
            font-size: medium;
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
        <h1 id="create_payment_header">Create Payment</h1>
    </header>

    <form action="/BIS/administrator/admin_panel/certificate_folder/print_insert.php" method="POST" id="certForm" target="_blank">

       
            
        
        <label id= "fullname_label">Fullname</label><br>
        <input type="text" id="fullname"><br>

        <label>Purpose</label><br>
        <input type="text" name="purpose_print" id="purpose_print" required><br>

        <label for="amount" id="label_amount">Amount</label><br>
        <input type="number" style="margin-top: -20px;"  class="printer" name="amount" id="amount" min="0" step="0.00001" placeholder="Enter Amount" required><br>
        
        <label hidden id="date_issue_print_label">Date issued</label><br>

        <?php 
            // Correct format for HTML date input
            $current_date = date('Y-m-d');  
        ?>

        <input hidden type="date" 
            name="current_date" 
            id="date_issue_print"
            value="<?php echo $current_date; ?>"
        ><br>
       
        <label  id="status_print_label" >Status</label><br>
        <select   id="status_print" required>
            <option value="No data">No data</option>
            <option value="Pending">Pending</option>
            <option value="Processing">Processing</option>
            <option value="Ready to Pick-up">Ready to Pick-up</option>
            <option value="Released">Released</option>
            <option value="Invalid Purpose">Invalid Purpose</option>
        </select><br>

     

        <input hidden type="text" name="status_print" value="Ready to Pick-up">

       

        <input type="hidden" name="firstname_print" id="firstname_print">
        <input type="hidden" name="middlename_print" id="middlename_print">
        <input type="hidden" name="lastname_print" id="lastname_print">
        
        <input type="hidden" name="document_print" id="document_print">
        <input type="hidden" name="id_print" id="id_print">

        <input type="button" style="margin-top: -30px;" id="cancel" onclick="this.parentElement.parentElement.parentElement.style.display='none';" value="Cancel">

        <input type="submit" style="margin-top: -30px;" name="sub_print" id="submit">
    </form>

    <!-- EXTERNAL JS -->
    <script src="print.js"></script>

</body>
</html>
