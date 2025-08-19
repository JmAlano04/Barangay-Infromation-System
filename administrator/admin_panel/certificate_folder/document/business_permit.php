<?php
    require('../../../database/conn_db.php');


    $sql = "SELECT * FROM  barangay_revenue as r LEFT JOIN barangay_request as req ON r.user_id = req.id  WHERE req.id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
       $row = mysqli_fetch_assoc($result);

       $id = $row['id'];
       $firstname = strtoupper($row["firstname"]);
       $lastname = strtoupper($row["lastname"]);
       $middlename = strtoupper(substr($row["middlename"], 0, 1));


       $age = $row["age"];
       $request_document = $row["request_document"];
       $house_no = strtoupper($row["house_number"]);

       $business_name = $row["business_name"];
       $birthday = $row["birthday"];
       $place_of_birth = $row["place_of_birth"];
       $contact_no = $row["contact_no"];

       $contact_person = $row["contact_person"];
       $contact_no_contact_person = $row["contact_no_contact_person"];
       $live_since_year = $row["live_since_year"];

       $purpose = strtoupper($row["purpose"]);
       $status = $row["status"];
       
       $gender = $row["gender"];   
       $sitio_pook =  $row["sitio_pook"];
       $date_issue = $row["date_issue"];

       $expired_date = $row["expired_date"];

       $OR_no = $row["OR_no"];


   
       ?>

              
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Barangay Business Clearance</title>
            <link rel = "stylesheet" href = "/BIS/administrator/admin_panel/certificate_folder/document/business_permit.css"/>
        </head>
        <body>
             <img src="/BIS/administrator/admin_panel/certificate_folder/document/bg_main.png" alt="" id = "main_bg_logo">
         <div class = "main_bg">
            <img src="/BIS/administrator/admin_panel/certificate_folder/document/bg_green.png" alt="">
            </div>
                
            <header class = "header">
                        <div>
                            <img src="/BIS/administrator/admin_panel/certificate_folder/document/logo.png" alt="">
                          
                        </div>
                        
                        <div class = "republic">
                            <h2>Republic of the Philippines</h2>
                            <h2>Province of Cavite</h2><br>

                           
                            <h1>CITY OF DASMARIÑAS</h1>
                            <h1>BARANGAY PALIPARAN II</h1><br>
                            <h1>OFFICE OF THE BARANGAY CHAIRMAN</h1>
                            
                            
                        </div>
                      
            
            </header>

            <main class = "main">
                <h1>BARANGAY BUSINESS CLEARANCE</h1>

                

                <h2 class = "to_whom">TO WHOM IT MAY CONCERN:</h2>

                <p class = "p1">This is to certify that the business or trade activity described below: </p>
                <div class = "div_info">
                    <p class = "p1_div"><?php echo $business_name ?> </p><span><b>Business/Trade Name</span></b>
                    <p class = "p2_div"><?php echo $firstname . " " . $middlename.". " . $lastname ?></p><span><b>Operator/Owner</b></span>
                    <p class = "p3_div"><?php echo $house_no . " " . $sitio_pook ?></p><span><b>Address</b></span>
                </div>
                <div class = "div_2nd">
                    <p class = "div_p1">Propose to be established in the barangay and is being applied for business clearance to be used in securing corresponding Mayor's Permit has been to be:</p>
                    <p class = "div_p2">_____ Complying with the provisions of existing Barangay Ordinanc, rules and regulations being enforce on this Barangay;</p>
                    <p class = "div_p3">_____ Partially complying with provisions of existing Barangay Ordinances, rules and regulations being enforced in this Barangay;</p>
                    <p class = "div_p4">_____ Interpose No objection for the issuance of the corresponding Barangay Permit applied for.</p>
                </div>
                
                <div class = "brgy_chair">
                    <h2>PB. RORALDO C. AMBAL</h2>
                    <h3>Barangay Chairman</h3>
                    <h3>Paliparan II</h3>
                </div>

                <div class = "div_date_issued">
                    <h4>Date : <span><?php echo $day_issue = date('F d, Y',strtotime($date_issue));  ?></span></h4>
                    <h4>Control no : <span><?php echo $OR_no ."-". date("Y")?></span></h4>
                    <p class = "footer_div"><i>This Business Clearance will be valid until December 31, <?php echo " ". date("Y")?></i></p>
                </div>
             
            </main>
            
           
            <script>
      let doc_name = "<?php echo addslashes($lastname); ?>";
      let doc_type = "<?php echo addslashes($request_document); ?>";
      let doc_id = "<?php echo $id; ?>"; // Optional: Include ID or other identifiers for uniqueness

      // Combine the document type, name, and optional ID to set the title
      document.title = doc_type + " - " + doc_name + " (" + doc_id + ")";

      // Trigger the print dialog
      window.print();
  </script>

        </body>
        </html>
       <?php

        
      } else {
        echo "0 results";
      }
      
      mysqli_close($conn);




?>

