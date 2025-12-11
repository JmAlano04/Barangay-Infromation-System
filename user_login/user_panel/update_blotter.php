<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


     <style></style>
</head>
<body>
 
    <section id="blotter_form" class="form-request" style="width:90%;">
      
        <form action="upd_blotter.php" method="POST">
            <input type="hidden" id="edit_id" name="id_blotter">

            <label>Subject:</label>
            <input type="text" id="edit_subject" name="subject_upd"><br>

            <label>Place:</label>
            <input type="text" id="edit_place" name="place_upd"><br>

            <label>Complained Name:</label>
            <input type="text" id="edit_complained_name" name="complained_name"><br>

            <label>Address of Complained Person:</label>
            <input type="text" id="edit_add_complained_name" name="add_complained_name"><br>
            
            <label>Complainant Contact Number:</label>
            <input type="text" id="edit_contact_no" name="contact_no"><br>

            <label>Details:</label>
            <textarea id="edit_details_reason" rows="8" cols="60" style="padding:5px;" name="details_reason"></textarea><br>


       

            <button style="margin-top: 10px; color: white; background-color: #00c510ff; border: none; padding: 10px 20px; border-radius: 5px;" type="submit" name = "save_blotter_upd">Save</button>
        </form>
        
</section>  
</body>
</html>