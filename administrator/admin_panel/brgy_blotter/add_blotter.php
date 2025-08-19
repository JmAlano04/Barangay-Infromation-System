

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/BIS/administrator/admin_panel/brgy_blotter/brgy_blotter.css"/>
    <style>
        .main_div_blotter input, select{
            border:none;
            color:#005720;
        }
    </style>
</head>
<body>

    <form class = "form_class" action="/BIS/administrator/admin_panel/brgy_blotter/insert_blotter.php" method = "POST">
    <h1 class = "h1">Add Blotter List</h1>
    <div class = "main_div_blotter">
        <div>
           
           
            <label for="">SUBJECT :</label><br>
            <input type="text" name="subject" id="" placeholder = "Enter Subject" ><br>

            <label for="">CELLPHONE NUMBER :</label><br>
            <input type="text" name="cell_no" id="" placeholder = "Enter Phone number" pattern="[0-9]{11}" required ><br>

            <label for="">PLACE :</label><br>
            <input type="text" name="place" id="" value = "Barangay Paliparan II" readonly><br>
        </div>

        <div>
            <label for="">TANOD DUTY :</label><br>
            <input type="text" name="tanod" id="" placeholder = "Enter Tanod duty" required><br>

         

            <label for="">Date</label><br>
            <input type="Date" name="date" id="" required><br>

            <label for="">TIME :</label><br>
                <input type = "time" name="time" id=""  required />
                   
               <br>
            <label for="">Status</label><br>
                <select name="status" id="" required>
                     <option value="" readonly>--Select Blotter Status--</option>
                    <option value="Active">Active</option>
                    <option value="Settled">Settled</option>
                    <option value="Scheduled">Scheduled</option>
                </select><br>

                <input type="hidden" name = "type_of_blotter" value = "Blotter">
        </div>
        
    </div>

    <div class = "div_2nd">
        <h3 class = "h1">Details</h3>
       <div class = "div">
        <p>Ako si <input type="text" name = "complainant" style= "width:600px; margin-right:20px;">Edad <input type="number" name = "age" min = "1" max = "105"style = "width:100px; "><br>
        Nakatira sa <input type="text" name = "address_complainant" style= "width:600px;"> ay dumudulong sahimpilan ng Barangay Paliparan II upang aking ireklamo si <input type="text" name = "complained_name" style= "width:600px;"><br>
        Address <input type="text" name = "add_complained_name" style= "width:600px;"> sa kadahilanan na
        <textarea name="details_reason" id="" >
        
        </textarea>
        </p>
       </div>
        
    </div>
        
    <div class = "div_3rd">
       
        <input type="reset" value = "Reset" id = "reset">
        <input type="submit" name = "save_blotter" value = "Save" id = "save">
    </div>

    </form>
</body>
</html>