<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   

    <form action="certificate_folder/add_req_function.php" class = "form_manage" method = "POST" enctype = "multipart/form-data">
    <h1>Add Request List</h1>

    <div class = "main_div_manage">
        <div>
             <input type="file"  name = "image" accept = ".jpg, .jpeg, .png" id = "images" style = "border:1px solid #4A9D4f; padding-top:10px;"><br>
            <label for="">Firstname</label><br>
            <input type="text" name = "firstname_add" id = "firstname_add" placeholder = "Enter Firstname" required><br>

            <label for="">Middlename</label><br>
            <input type="text" name = "middlename_add" id = "middlename_add" placeholder = "Enter Middlename"><br>
            
            <label for="">Lastname</label><br>
            <input type="text" name = "lastname_add" id = "lastname_add" required placeholder = "Enter Lastname"><br>

            <label for="">Age</label><br>
            <input type="number" name = "age_add" id = "age_add" placeholder = "Enter Age" required><br>

            <label for="">Birthday</label><br>
            <input type="date" name = "birthday_add" id = "birthday_add" placeholder = "Enter Birthday" required><br>

            <label for="">Place of Birth</label><br>
            <input type="text" name = "place_of_birth_add" id = "place_of_birth_add" placeholder = "Enter Place of birth"><br>

            <label for="">Gender</label><br>
                <select id = "gender_add" name = "gender_add" placeholder = "Enter gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Prefer not to say">Prefer not to say</option>
                </select><br>

                <label for="">House no.</label><br>
            <input type="text" id = "house_no_add" name = "house_no_add" placeholder = "Enter House number" required><br>

          
               
        </div>


         <div style = "margin-top:-20px;">
         <label for="">Sitio/Pook</label><br>
         <input type = "text" id = "sitio_pook_add" name = "sitio_pook_add" placeholder = "Enter Sitio/Pook" required/> <br>

                 <label for="">Purpose</label><br>
                <input type="text" id = "purpose_add" name = "purpose_add" placeholder = "Enter valid Purpose" required><br>


            <label for="">Contact no.</label><br>
            <input type="tel" id = "contact_no_add" name = "contact_no_add" placeholder = "Enter Contact Number" pattern="[0-9]{11}"> <br>

             <label for="">Contact Person</label><br>
            <input type="text" id = "contact_person_add" placeholder = "Add Contact Person" name = "contact_person_add" ><br>

            <label for="">Contact no.</label><br>
            <input type="tel" id = "contact_person_no_add" placeholder = "Enter Contact number" name = "contact_person_no_add" pattern="[0-9]{11}"><br>
            
            <label for="">Document Type</label><br>
                <select id="request_document_add" name = "request_document_add" required>
                    <option value="Barangay Certificate">Barangay Certificate</option>
                    <option value="Barangay Clearance">Barangay Clearance</option>
                    <option value="Barangay Indigency">Barangay Indigency</option>
                    <option value="Barangay ID">Barangay ID</option>

                </select><br>

         
            <label for="">Live Since (Month/Year)</label><br>
            <input type="month" id = "live_since_add" name = "live_since_add"><br>

            <label for="">Status</label><br>
            <select id="status_add" name = "status_add">
            <option value= "No data">No data</option>
            <option value= "Pending">Pending</option>
            <option value= "Processing">Processing</option>
            <option value= "Ready to Pick-up">Ready to Pick-up</option>
            <option value= "Released">Released</option>
            <option value= "Invalid Purpose">Invalid Purpose</option>
            </select><br>

      

           


            <input type="hidden" name = "id_manage_add" id = "id_add">
            
            <input type="hidden" name = "profile_default" value = "images.png">
           
        </div>
    </div>
       

    <div class = "action_submit">
            
            <input type="reset" id = "cancel_add_manage" name = "cancel_add_manage">
            <input type="submit" id = "submit_add_manage" name = "sub_add_request">
    </div>



    </form>
</body>
</html>