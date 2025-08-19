



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/BIS/administrator/admin_panel/incident_folder/view.css"/>
</head>
<body>

<form action="/BIS/administrator/admin_panel/incident_folder/update.php" method = "POST">
    <h1 class = "h1">CASE INFORMATION :</h1>
    <div class = "main_div_blotter">
        <div>
           
           
            <label for="">Cause of the incident :</label><br>
            <input type="text" name="cause_incident_upd" id="cause_incident_view" placeholder = "Enter incident cause" readonly><br>

            <label for="">Time of the incident :</label><br>
            <input type="time" name="time_upd" id="time_view"  readonly ><br>

            <label for="">Date Happened :</label><br>
            <input type="date" name="date_upd" id="date_view" value = "" readonly><br>

            
            <label for="">Status</label><br>
                <input name="status_upd" id="status_view" readonly>
                   
                <br>
        </div>

     
        
    </div>

    <div class = "div_2nd">
        <h3 class = "h1">Parties involve</h3>
       <div class = "div">
        <div>
            <label for="">Names : </label>
            <input type="text" name = "person1_upd" id = "person1_view" readonly><br>
            <label for="">address : </label>
            <input type="text" name = "address1_upd" id = "address1_view" readonly><br>
            <label for="">vehicle : </label>
            <input type="text" name = "vehicle1_upd" id = "vehicle1_view" readonly><br>
            <label for="">License no : </label>
            <input type="text" name = "license1_upd" id = "license1_view" readonly><br>
            <label for="">Plate : </label>
            <input type="text" name = "plate1_upd" id = "plate1_view" readonly>
        </div>
      
      
        <input type="hidden" name="id_upd" id="id_view">
            

       </div>
        
    </div>
   

    </form>
</body>
</html>