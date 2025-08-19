



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/BIS/administrator/admin_panel/incident_folder/brgy_incident_upd.css"/>
</head>
<body>


<form action="/BIS/administrator/admin_panel/incident_folder/update.php" method = "POST">
    <h1 class = "h1"><svg style = "width:20px;fill:#4A9D4f;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg>Edit Incident Report :</h1>
    <div class = "main_div_blotter">
        <div>
           
           
            <label for="">Cause of the incident :</label><br>
            <input type="text" name="cause_incident_upd" id="cause_incident_upd" placeholder = "Enter incident cause" required><br>

            <label for="">Time of the incident :</label><br>
            <input type="time" name="time_upd" id="time_upd"  required ><br>

            <label for="">Date Happened :</label><br>
            <input type="date" name="date_upd" id="date_upd" value = "" required><br>

            
            <label for="">Status</label><br>
                <select name="status_upd" id="status_upd" required>
                     <option value="" readonly>--Select Blotter Status--</option>
                    <option value="Active">Active</option>
                    <option value="Settled">Settled</option>
                    <option value="Scheduled">Scheduled</option>
                </select><br>
        </div>

     
        
    </div>

    <div class = "div_2nd">
        <h3 class = "h1">Parties involve</h3>
       <div class = "div">
        <div>
            <label for="">Names : </label>
            <input type="text" name = "person1_upd" id = "person1_upd"><br>
            <label for="">address : </label>
            <input type="text" name = "address1_upd" id = "address1_upd"><br>
            <label for="">vehicle : </label>
            <input type="text" name = "vehicle1_upd" id = "vehicle1_upd"><br>
            <label for="">License no : </label>
            <input type="text" name = "license1_upd" id = "license1_upd"><br>
            <label for="">Plate : </label>
            <input type="text" name = "plate1_upd" id = "plate1_upd">
        </div>
      
      
        <input type="hidden" name="id_upd" id="id_upd">
            

       </div>
        
    </div>
        
    <div class = "div_3rd">
       
        <input type="reset" value = "Reset" id = "reset">
        <input type="submit" name = "save_incident_upd" value = "Save" id = "save">
    </div>

    </form>
</body>
</html>