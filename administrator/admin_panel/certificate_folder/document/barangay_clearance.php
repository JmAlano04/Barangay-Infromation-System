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

       $birthday = $row["birthday"];strtoupper($row["birthday"]);
       $place_of_birth = strtoupper($row["place_of_birth"]);
       $contact_no = $row["contact_no"];

       $contact_person = $row["contact_person"];
       $contact_no_contact_person = $row["contact_no_contact_person"];
       $live_since_year = $row["live_since_year"];

       $purpose = strtoupper($row["purpose"]);
       $status = $row["status"];
       
       $gender = $row["gender"];   
       $sitio_pook = strtoupper($row["sitio_pook"]);
       $date_issue = strtoupper($row["date_issue"]);

       $expired_date = strtoupper($row["expired_date"]);

       $OR_no = $row["OR_no"];


   
       ?>
            
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Barangay Certificate</title>
            <link rel = "stylesheet" href = "/BIS/administrator/admin_panel/certificate_folder/document/clearance.css"/>
        </head>
        <body>
      

             
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
                    <div class = "officer">
                                
                            <div class = "img_div">
                                <img src="/BIS/administrator/admin_panel/certificate_folder/document/RolandoAmbal.jpg" alt="">
                                <div class ="header_chairman">
                                    <h5>PB. ROLANDO C. AMBAL</h5>
                                    <h6>BARANGAY CHAIRMAN</h6>
                                </div>
                            </div>

                            <div class = "name_official">
                                <h4>Kag. Oscar B. Alvarez</h4>
                                <p>Com. on Environmental Protection</p>
                                <h4>Kag. Rosalie M. Andaya</h4>
                                <p>Com. on Health and Sanitation</p>
                                <h4>Kag. Alvin A. Andaya</h4>
                                <p>Com. on Cooperative and Livelihood</p>
                                <h4>Kag. Resie Martinez</h4>
                                <p>Com. on Peace & Order and Public safety</p>
                                <h4>Kag. Mark Jester M. Asilo</h4>
                                <p>Com. on Education and Culture</p>
                                <h4>Kag. Gilberto A. Magtaas</h4>
                                <p>Com. on Finance, Ways & Means, Budget <br> and Appropriation</p>
                                <h4>Kag. Ma. Teresa D. Sanchez</h4>
                                <p>Com. on Infrastructure & Public Works</p>
                                <h4>Ken Elderrine Ofianga</h4>
                                <p>Com. on Youth & Sport Development <br> <p>SK Chairman</p></p>
                                <br>
                                <br>
                                <h4>Lucila T. Anasco</h4>
                                <p>Barangay Secretary</p>
                                <br>
                                <h4>Miguel Ryan H. Alvarez</h4>
                                <p>Barangay Treasurer</p>
                            </div>
            
                    </div>
                    <div class = "content">
                        <div class = "control_number">
                                 <p >Control Number: <?php echo $OR_no ."-". date("Y");?></p>
                                 <p>Date: <?php echo date("F d, Y") ?></p>
                        </div>
                        <h1 class = "h1">BARANGAY CLEARANCE</h1>
                        <p class = "p">To Whom it May Concern:</p>
                        <div class = "sub_content">
                            <p>THIS IS TO CERTIFY THAT the person whose name, picture and signature prints appear herein has complied with the requirement which has been verified by this Barangay. The results of which are listed:</p>

                            <div class = "sub_content_info">
                            
                                <div class = "item1">
                                    <h6>Name </h6>
                                    <h6>Address</h6><br><br>

                                    <h6>Date of Birth</h6>
                                    <h6>Place of Birth</h6>
                                    <h6>Findings</h6>
                                    <h6>Purpose</h6>
                                    <h6>Valid Until</h6>
                                    <h6>Res. Certificate No. Date Issue</h6>
                                </div>
                                <div class = "item2">
                                    <h6><?php echo ":" . $firstname ." ". $middlename .". ".  $lastname?></h6>
                                    <h6>:<?php echo $house_no ." ". $sitio_pook . " PALIPARAN II DASMARIÑAS CITY CAVITE" ;?></h6><br>
                                    <h6>:<?php echo date('F d, Y',strtotime($birthday));?></h6>
                                    <h6>:<?php echo $place_of_birth;?></h6>
                                    <h6>:NO DEROGATORY RECORD</h6>
                                    <h6>:<?php echo $purpose?></h6>
                                    <h6>:<?php echo date('F d, Y',strtotime($expired_date)); ?></h6><br>
                                    <h6>:<?php echo date('F d, Y',strtotime($date_issue)) ?></h6>
                                </div>

                               
                               
                            </div>
                            <div class = "sub_content_2nd">
                                        <div class = "signature">
                                            <h2>Signature</h2>
                                        </div>
                                        
                                        <div class = "chairman">
                                            <h2>PB ROLANDO C. AMBAL</h2>
                                            <h3>Punong Barangay</h3>
                                        </div>
                            </div>
                            <div class = "footer">
                                <h2>NOT VALID WITHOUT OFFICIAL SEAL</h2><br>
                                <h3>Note: This Clearance shall be invalid if there is an erasure or <br> any alteration of entry.</h3>
                            </div>
                        </div>
                    </div>

            </main>

      
                    <script>
        // Retrieve PHP values dynamically and assign them to JavaScript variables
        let doc_name = "<?php echo addslashes($lastname); ?>";
        let doc_type = "<?php echo addslashes($request_document); ?>";

        // Combine the document type and name to set the title
        document.title = doc_type + " - " + doc_name;

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

