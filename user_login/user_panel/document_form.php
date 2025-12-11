
<?php
    include('db_data_user.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Request | Barangayy Information System</title>
    <script>
        function handleDocumentRequestChange() {
            const select = document.getElementById("select");
            const businessPermitInputContainer = document.getElementById("business_permit_input_container");

            // Clear any previous input
            businessPermitInputContainer.innerHTML = "";

            // If "Business Permit" is selected, create and append a new input field
            if (select.value === "Business Permit") {
                const label = document.createElement("label");
                label.setAttribute("for", "business_permit_details");
                label.textContent = "Business Name: ";

                const input = document.createElement("input");
                input.type = "text";
                input.name = "business_permit";
                input.placeholder = "Enter Business Permit Name";
                input.id = "business_permit_details";
                input.required = true;  // Make this input field required
                
                businessPermitInputContainer.appendChild(label);
                businessPermitInputContainer.appendChild(input);
            }
        else if (select.value !== "Business Permit" && document.getElementById("business_permit_details") === null) {
                const label = document.createElement("label");
                label.setAttribute("for", "business_permit_details");
               

                const input = document.createElement("input");
                input.type = "hidden";
                input.name = "business_permit";
                input.placeholder = "Enter Business Permit Name";
                input.id = "business_permit_details";
                input.required = true;  // Make this input field required
                input.value = "N/A";  // Make this input field required
                
                businessPermitInputContainer.appendChild(label);
                businessPermitInputContainer.appendChild(input);
    }
        }
    </script>


</head>
<body>

    <section id = "form_request" class = "form-request">
        <!-- Example element showing user verification status -->      
        <form action="submit_update.php" method = "POST">
            <h1><svg xmlns="http://www.w3.org/2000/svg" style = "width:40px;" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg>Fill up the Form</h1>
            <select name="request_document" id="select" required onchange="handleDocumentRequestChange()">
                <option value="">-- Select Document Request --</option>
                <option value="Barangay Clearance">Barangay Clearance</option>
                <option value="Barangay Certificate">Barangay Certificate</option>
                <option value="Barangay Indigency">Barangay Indigency</option>
                <option value="Barangay ID">Barangay ID</option>
                <option value="Business Permit">Business Permit</option>
                <option value="Barangay Cedula">Barangay Cedula</option>
            </select><br>
            <div class = "item1">
            
            <div>
                <label for="">House no: </label><br>
                <input type="text" name = "house_no" placeholder = "Enter House Number" id = "house_no_my_profile_id" required>
                
            </div>
           
            <div>
                <label for="">Sitio/Pook: </label><br>
                <input type="text" name = "Sitio_Pook"  placeholder = "Ex. Mabuhay Homes 2000 " id = "sitio_pook_my_profile_id"  required><br>
            </div>
                 
            <div>
                <label for="">Birthday: </label><br>
                <input type="date" name = "date_birthday"  id = "birthday_my_profile_id" required>
                
            </div>
           
            <div>
                <label for="">Place of Birthday: </label><br>
                <input type="text" name = "place_of_birth"  placeholder = "Enter Place of Birth" id = "place_of_birth_my_profile_id" max = "110" min = "1" required><br>
            </div>
           
            <div>
                <label for="">Cell Phone No : </label><br>
                <input type="tel" name = "contact_no" placeholder = "Enter Contact Number" pattern="[0-9]{11}" id = "contact_phone_my_profile_id" required>
                
            </div>
            <div>
            <label for="">Sex : </label><br>
            <select name="gender" id="gender_my_profile_id" required >
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Prefer not to say">Prefer not to say</option>
           
            </select><br>
            </div>

            </div>
           
            <!-- Container for the dynamically added Business Permit input field -->
            <div id="business_permit_input_container"></div>
            
            <label for="">Contact Person : </label><br>
            <input type="text" name = "contact_person"  placeholder = "Enter fullname of contact Person" id = "contact_person_my_profile_id" >
            <label for="">Contact # of Contact Person: </label><br>
            <input type="text" name = "contact_person_no"  placeholder = "Enter your fullname" id = "contact_no_contact_person_my_profile_id" pattern="[0-9]{11}" required>
            <label for="">How long do you live here and what year (Month/Year): </label><br>
            <input type="month" name = "live_since_year"  placeholder = "Enter your fullname" id = "live_since_year_my_profile_id" required>
           
            <label for="">Purpose : </label><br>
            <input type="text"name = "purpose" placeholder = "Enter Valid Purpose" id = "purpose_my_profile_id" required><br>


            <input type="hidden"name = "firstname" id = "firstname_my_profile_id" required><br>
            <input type="hidden"name = "middlename" id = "middlename_my_profile_id" required><br>
            <input type="hidden"name = "lastname" id = "lastname_my_profile_id" required><br>

            <input type="hidden"name = "age" id = "age_my_profile_id" required><br>
            <input type="hidden"name = "user_id" id = "user_id_my_profile_id" required><br>
            <input type="hidden"name = "profile_user" id = "profile_user_display" required><br>
            <input type="hidden"name = "id" id = "id_my_profile_id" required><br>
            <input type="hidden"name = "status" id = "status" value = "Pending" required><br>

            <div class = "submit_reset_return_div">
                <input type="reset" id = "reset" >
                <input type ="submit" name = "submit_request" id = "submit">
               
            </div>
           
           
<script>
    window.onload = function () {
        let verify_user = document.getElementById("verify_user").textContent.trim(); // fixed typo and trimmed whitespace
        let isVerified = verify_user; // now a plain string

        if (isVerified === "Pending Verification") {
            const restrictedOptions = [
                "Barangay Clearance",
                "Barangay Certificate",
                "Barangay Indigency",
                "Barangay ID"
            ];

            const select = document.getElementById("select");
            for (let i = 0; i < select.options.length; i++) {
                if (restrictedOptions.includes(select.options[i].value)) {
                    select.options[i].hidden = true;
                }
            }
        }

    };
</script>


            <script>
               

                let house_no_my_profile = document.getElementById("house_no_my_profile").textContent;
                document.getElementById("house_no_my_profile_id").value = house_no_my_profile; 

                let sitio_pook_my_profile = document.getElementById("sitio_pook_my_profile").textContent;
                document.getElementById("sitio_pook_my_profile_id").value = sitio_pook_my_profile;

                let birthday_my_profile = document.getElementById("birthday_my_profile").textContent;
                document.getElementById("birthday_my_profile_id").value = birthday_my_profile;

                let firstname_my_profile = document.getElementById("firstname_my_profile").textContent;
                document.getElementById("firstname_my_profile_id").value =  firstname_my_profile;

                let middlename_my_profile = document.getElementById("middlename_my_profile").textContent;
                document.getElementById("middlename_my_profile_id").value =  middlename_my_profile;
                
                let lastname_my_profile = document.getElementById("lastname_my_profile").textContent;
                document.getElementById("lastname_my_profile_id").value =  lastname_my_profile;

                let age_my_profile = document.getElementById("age_my_profile").textContent;
                document.getElementById("age_my_profile_id").value =  age_my_profile;

                let gender_my_profile = document.getElementById("gender_my_profile").textContent;
                document.getElementById("gender_my_profile_id").value =  gender_my_profile;

                 let user_id_my_profile = document.getElementById("user_id_my_profile").textContent;
                document.getElementById("user_id_my_profile_id").value = user_id_my_profile;

                let contact_phone_my_profile = document.getElementById("contact_phone_my_profile").textContent;
                document.getElementById("contact_phone_my_profile_id").value = contact_phone_my_profile;

                
                let contact_person_my_profile = document.getElementById("contact_person_my_profile").textContent;
                document.getElementById("contact_person_my_profile_id").value = contact_person_my_profile;
                
                let place_of_birth_my_profile = document.getElementById("place_of_birth_my_profile").textContent;
                document.getElementById("place_of_birth_my_profile_id").value = place_of_birth_my_profile;
                
                let contact_no_contact_person_my_profile = document.getElementById("contact_no_contact_person_my_profile").textContent;
                document.getElementById("contact_no_contact_person_my_profile_id").value = contact_no_contact_person_my_profile;

                
                let live_since_year_my_profile = document.getElementById("live_since_year_my_profile").textContent;
                document.getElementById("live_since_year_my_profile_id").value = live_since_year_my_profile;

                let purpose_my_profile = document.getElementById("purpose_my_profile").textContent;
                document.getElementById("purpose_my_profile_id").value = purpose_my_profile;

                
                let id_my_profile = document.getElementById("id_my_profile").textContent;
                document.getElementById("id_my_profile_id").value = id_my_profile;

                let profile_user = document.getElementById("profile_profile").textContent;
                document.getElementById("profile_user_display").value =  profile_user;
            </script>



       
</body>
</head>


