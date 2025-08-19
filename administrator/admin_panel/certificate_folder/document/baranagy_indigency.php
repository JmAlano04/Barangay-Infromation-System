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
            <title>Barangay Certificate</title>
            <link rel = "stylesheet" href = "/BIS/administrator/admin_panel/certificate_folder/document/indigency.css"/>
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
                <h1>CERTIFICATION OF INDIGENCY</h1>

                

                <h2 class = "to_whom">TO WHOM IT MAY CONCERN:</h2>

                <p class = "dear">Dear Sir/Madam,</p>

                <p class = "p1">This is to certify that <u><b>MR./MRS./MS.<?php echo $firstname ." " . $middlename .". " .$lastname . ","; ?></b></u> of legal age, FIlipino Citizen, is a bonafide reside <u><b><?php echo $house_no . " " .  $sitio_pook ; ?> Paliparan II, Dasmariñas City, Cavite.</b></u>

                <p class = "p2">I further certify that <b><u>MR./MRS./MS. <?php echo $firstname . " " . $middlename . ". " .$lastname . ","; ?></u></b>  is one of the members of an indigency family in our community and is not capable to sustain his/her financial expenses due to financial constraint. </p>

                <p class = "p3">This Certification is being issued upon request of the above-named person for <u><b> <?php echo $purpose ?>.</b></u></p>

                <p class = "p4"><b>CERTIFIED AND ISSUED</b> this <u><b>
                    <?php echo $day_issue = date('d',strtotime($date_issue)); 
                           $second_character = substr($day_issue, 1, 1);  $second_character ;
                    switch ($second_character) {
                        case 1:
                            echo "<sup>st</sup>";
                          break;
                        case 2:
                            echo "<sup>nd</sup>";
                          break;
                        case 3:
                          echo "<sup>rd</sup>";
                        break;
                        case 9 || 8 || 7 || 6 || 5 || 4 :
                          echo "<sup>th</sup>";
                          break;
                        default:
                            echo "<sup>th</sup>";
                      }
                    ?></b></u> of <u><b><?php echo date('F Y',strtotime($date_issue)) .".";?></b></u> at the office of the Barangay Chairman, Paliparan II, City of Dasmarinas, Cavite.</p>


                <div class = "brgy_chair">
                    <h2>PB. RORALDO C. AMBAL</h2>
                    <h3>Barangay Chairman</h3>
                    <h3>Paliparan II</h3>
                </div>
                <footer class = "footer">
                        <img src="/BIS/administrator/admin_panel/certificate_folder/document/footer.png" alt="">
                </footer>
            </main>
            
            <p id = "document_name" hidden><?php echo $lastname ?></p>
            <p id = "document_type" hidden><?php echo $request_document ?></p>
            
      
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

