

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


        $profile = $row["profile"];

    
        ?>
              
          <!DOCTYPE html>
          <html lang="en">
          <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>Barangay ID</title>
              <link rel = "stylesheet" href = "/BIS/administrator/admin_panel/certificate_folder/document/ID_style_brgy.css"/>
          </head>
          <body>
          <main class = "main">

                  <div class = "front">
                      <h1 class = "h1_front_title">FRONT</h1>
                      <img src="/BIS/administrator/admin_panel/certificate_folder/document/front.png" alt="">
                      
                      <div class = "front_header">
                              <h1>Republic of the Phillipines <br> <span>Province of Cavite</span> <br><span>City of Dasmariñas Cavite</span> <H1 class = "h1">BARANGAY PALIPARAN II</H1></h1>
                              <img class = "img" src="/BIS/asset/image/user_profile/<?php echo $profile; ?>" alt="" />
                              <div class = "div_id_no">
                              <h3>ID NO. <?php echo "#". date("Y") ."-". date('d',strtotime($birthday)) . "-" ."P" ."-". $OR_no?></h3>
                              <span>Issue <br>Valid Until : <?php echo date('m/d/Y',strtotime($expired_date))?></span>
                              </div>
                              <div class = "id_name">
                                  <h1><?php echo $firstname ." ". $middlename .". ". $lastname?></h1>
                                  <h1 class = "footer_front">BARANGAY RESIDENT ID</h1>
                              </div>
                      </div>
                  </div>
                  

                  <div class = "back">
                      <h1 class = "h1_back_title">BACK</h1>
                        <img src="/BIS/administrator/admin_panel/certificate_folder/document/back.png" alt="">
                        <div  class = "div_id_info">
                          <p class = "p1"><?php echo $house_no ." ". $sitio_pook  ?> Paliparan II, Dasmariñas City, Cavite 4114</p><span class = "span">ADDRESS</span>
                          <p class = "p2"><?php echo date('F d, Y',strtotime($birthday))?></p><span class = "span">BIRTHDAY</span>
                          <p class = "p3"><?php echo $place_of_birth ?></p><span class = "span">BIRTH PLACE</span>
                          <p class = "p4"><span class = "p4_span">CONTACT PERSON IN CASE OF EMERGENCY</span><br><?php echo $contact_person ?><br><?php echo $contact_no_contact_person ?></p>
                          
                          <p class = "p5">IMPORTANT </p><h6>This card is proof that he/she is a BONIFIDE RECIDENT brgy. PALIPARAN 2 DAMARINAS CITY, CAVITE in case of loss. finder is requested to surrender this card to Bgry. Admin OFFICE PALIPARAN 2 DASMARINAS CITY, CAVITE</h6>

                          <div class = "p6">
                              <h4>ROLANDO AMBAL</h4>
                              <h5>BRGY. CHAIRMAN</h5>
                          </div>

                        </div>

                        
                  </div>
          
          </main>

          <script>
              let doc_name = "<?php echo addslashes($lastname . ', ' . $firstname . ' ' . $middlename . '.'); ?>";
              let doc_type = "<?php echo addslashes($request_document); ?>";
              let doc_id = "<?php echo $id; ?>";

              // Set a descriptive and printable document title
              document.title = `${doc_type} - ${doc_name} (ID: ${doc_id})`;

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
