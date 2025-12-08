<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blotter</title>
    <link rel="stylesheet" href="/BIS/administrator/admin_panel/brgy_blotter/brgy_blotter_upd.css"/>
</head>

<body>

<form action="/BIS/administrator/admin_panel/brgy_blotter/update.php" method="POST">

    <h1 class="h1">
        <svg style="width:20px;fill:#4A9D4f;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/>
        </svg>
        Edit Blotter List
    </h1>

    <div class="main_div_blotter">

        <div>
            <label>SUBJECT :</label><br>
            <input type="text" name="subject_upd" id="subject_blotter" placeholder="Enter Subject"><br>

            <label>CELLPHONE NUMBER :</label><br>
            <input type="text" name="cell_no_upd" id="cell_no_blotter" placeholder="Enter Phone Number" pattern="[0-9]{11}" required><br>

            <label>PLACE :</label><br>
            <input type="text" name="place_upd" id="place_blotter"  ><br>
        </div>

        <div>
            <label>TANOD DUTY :</label><br>
            <input type="text" name="tanod_upd" id="tanod_blotter" placeholder="Enter Tanod duty" required><br><br>
            <label for="">REMARKS :</label><br>
            <input type="text" name="remarks_upd" id="remarks_blotter" placeholder = "Enter Remarks" required><br><br>
            <label>STATUS :</label><br>
            <select name="status_upd" id="status_blotter" required>
                <option value="">--Select Blotter Status--</option>
                <option value="Active">Active</option>
                <option value="Settled">Settled</option>
                <option value="Scheduled">Scheduled</option>
                <option value="Pending">Pending</option>
                <option value="Rejected">Rejected</option>
            </select><br>

            <!-- Hidden Auto Date -->
            <input type="hidden" name="date_upd" id="date_blotter">

            <!-- Hidden Auto Time -->
            <input type="hidden" name="time_upd" id="time_blotter">

            <input type="hidden" name="id_blotter" id="id_blotter">
            <input type="hidden" name="type_of_blotter" id="type_blotter" value="Blotter">
        </div>

    </div>

    <div class="div_2nd">
        <h3 class="h1">Details</h3>

        <div class="div">
            <p>
                Ako si 
                <input type="text" id="complainant_blotter" name="complainant_upd" style="width:200px; margin-right:20px;">

                Edad 
                <input type="number" id="age_blotter" name="age_upd" min="1" max="105" style="width:50px;"> <br>

                Nakatira sa 
                <input type="text" name="address_complainant_upd" id="address_complainant_blotter" style="width:300px;"> 
                ay dumudulong sa himpilan ng Barangay Paliparan II upang aking ireklamo si 

                <input type="text" name="complained_name_upd" id="complained_name_blotter" style="width:300px;"> <br>

                Address 
                <input type="text" name="add_complained_name_upd" id="add_complained_name_blotter" style="width:400px;"> 
                sa kadahilanan na

                <textarea style="padding:10px;" name="details_reason_upd" id="details_reason_blotter"></textarea>
            </p>
        </div>
    </div>

    <div class="div_3rd">
        <input type="reset" value="Reset" id="reset">
        <input type="submit" name="save_blotter_upd" value="Save" id="save">
    </div>

</form>


<!-- AUTO DATE & TIME SCRIPT (PH TIMEZONE) -->
<script>
    function setDateTimeNow() {
        const now = new Date();

        // Date (Y-m-d)
        const date = now.toISOString().slice(0, 10);
        document.getElementById("date_blotter").value = date;

        // Time (H:i:s)
        const time = now.toLocaleTimeString('en-US', { hour12: false });
        document.getElementById("time_blotter").value = time;
    }

    setDateTimeNow();
</script>

</body>
</html>
