



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/BIS/administrator/admin_panel/brgy_blotter/view.css"/>
</head>
<body>


<form action="/BIS/administrator/admin_panel/brgy_blotter/print_blotter.php" method = "POST">
    <h1 class = "h1">Case Information</h1>
    <div class = "main_div_blotter">
        <div>
           
           
            <label for="">SUBJECT :</label><br>
            <input type="text" name="subject_upd" id="subject_view" readonly ><br>

            <label for="">CELLPHONE NUMBER :</label><br>
            <input type="text" name="cell_no_upd" id="cell_no_view"  pattern="[0-9]{11}" readonly ><br>

            <label for="">PLACE :</label><br>
            <input type="text" name="place_upd" id="place_view" value = "Barangay Paliparan II" readonly><br>

            <label for="">TANOD DUTY :</label><br>
            <input type="text" name="tanod_upd" id="tanod_view"  readonly><br>
        </div>

        <div>
           

         

            <label for="">Date Filed:</label><br>
            <input type="Date" name="date_upd" id="date_view" readonly><br>

            <label for="">Time Filed :</label><br>
                <input type = "time" name="time_upd" id="time_view"  readonly />
                   
               <br>
                <label for="">REMARKS :</label><br>
            <input type="text" name="remarks_upd" id="remarks_view"readonly><br><br>
            <label for="">STATUS :</label><br>
                <input name="status_upd" id="status_view" readonly/><br>
                    <input type="hidden" name = "id_view" id = "id_view">
                <input type="hidden" name = "type_of_blotter" id = "type_view"value = "Blotter" readonly>
        </div>
        
    </div>

    <div class = "div_2nd">
        <h3 class = "h1">Details</h3>
       <div class = "div">
        <p>Ako si <input type="text" id = "complainant_view" name = "complainant_upd" style= "width:200px; margin-right:20px;" readonly>Edad <input type="number" id = "age_view" name = "age_upd" min = "1" max = "105"style = "width:50px; " readonly><br>
        Nakatira sa <input type="text" name = "address_complainant_upd" id = "address_complainant_view" style= "width:300px;" readonly> ay dumudulong sahimpilan ng Barangay Paliparan II upang aking ireklamo si <input type="text" name = "complained_name_upd" id = "complained_name_view" style= "width:300px;" readonly><br>
        Address <input type="text" name = "add_complained_name_upd" id = "add_complained_name_view" style= "width:400px;" readonly> sa kadahilanan na
        <textarea style="padding:10px;" name="details_reason_upd" id="details_reason_view" readonly>
        
        </textarea>
        </p>
       </div>
        
    </div>
        
    <input type="hidden" name="id_upd" id="id_view" hidden>
    
       
        <input type="submit" name="sub_print" value="Generate PDF" id="save">
   
    </form>
</body>
</html>