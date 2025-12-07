<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/BIS/administrator/admin_panel/incident_folder/incident.css"/>
    <style>
        .main_div_blotter input, select{
            border:none;
            color:#005720;
        }
    </style>

</head>
<body>
    <br>
    <br>
    <form class = "form_class" action="/BIS/administrator/admin_panel/incident_folder/insert_incident.php" method="POST">
        <h1 class="h1">Add Incident Report:</h1>
        <div class="main_div_blotter">
            <div>
                <label for="">Cause of the incident:</label><br>
                <input class = "input_class" type="text" name="cause_incident" placeholder="Enter incident cause" required><br>

                <label for="">Date Happened:</label><br>
                <input class = "input_class" type="date" name="date" required><br>

                <label for="">Time of the incident:</label><br>
                <input class = "input_class" type="time" name="time" required><br>


                <label for="">Status:</label><br>
                <select class = "input_class" name="status" required>
                    <option value="" readonly>--Select Blotter Status--</option>
                    <option value="Active">Active</option>
                    <option value="Settled">Settled</option>
                    <option value="Scheduled">Scheduled</option>
                </select><br>

               
            </div>
        </div>

        <div class="div_2nd">
            <h3 class="h1">Parties Involved</h3>
                <div class="div" id="partyFields">
                    <div class="party" id="party1">
                    <label for="">Names:</label>
                    <input type="text" name="person[]">
                    <label for="">Address:</label>
                    <input type="text" name="address[]">
                    <label for="">Vehicle:</label>
                    <input type="text" name="vehicle[]">
                    <label for="">License no:</label>
                    <input type="text" name="license[]">
                    <label for="">Plate:</label>
                    <input type="text" name="plate[]">
                    </div>
            </div>

            <!-- Button to add a new set of input fields -->
            <button type="button" id = "Add_another" onclick="addPartyField()">+ Add Involve</button>
        </div>

        <div class="div_3rd">
            <input type="reset" value="Reset" id="reset">
            <input type="submit" name="save_incident" value="Save" id="save">
        </div>
    </form>

   

</body>
</html>
