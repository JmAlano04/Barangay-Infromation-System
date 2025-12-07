<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/BIS/administrator/admin_panel/certificate_folder/table.css">
    <style>
        .print-modal::-webkit-scrollbar,
        .edit-modal_manage::-webkit-scrollbar,
        .add-modal_manage::-webkit-scrollbar,
        .delete-modal_id::-webkit-scrollbar,
        .import-modal_manage::-webkit-scrollbar
         {
            display: none;
        }
    </style>
</head>
<body>

        <?php require("../../../database/conn_db.php");
                
                // Updated SQL query with JOIN to barangay_revenue
           
                        $sql = "SELECT DISTINCT 
                            br.*, 
                            rev.date_issue, 
                            rev.expired_date, 
                            rev.document_amount, 
                            rev.OR_no
                        FROM barangay_request br
                        LEFT JOIN barangay_revenue rev 
                            ON br.id = rev.user_id
                        WHERE br.request_document = 'Barangay ID'
                        ORDER BY br.id DESC
                        LIMIT 12";

                $result = $conn->query($sql);
    
                if ($result->num_rows > 0) {?>
                  <div id = "searchresult">
                <table>
                        <caption>Barangay I.D Request</caption>
                        <tr>
                            <th>Profile</th>
                            <th>Fullname</th>
                            <th>Sex</th>
                            <th>Control No.</th>
                            <th>Purpose</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php
                             while($row = $result->fetch_assoc()) {
                                $control_no = $row['control_no'];
                                $id = $row['id'];
                                $user_id = $row['user_id'];
                                $firstname = $row["firstname"];
                                $lastname = $row["lastname"];
                                $middlename = $row["middlename"];

                                $age = $row["age"];
                                $request_document = $row["request_document"];
                                $house_no = $row["house_number"];

                                $sitio_pook = $row["sitio_pook"];

                                $birthday = $row["birthday"];
                                $place_of_birth = $row["place_of_birth"];
                                $contact_no = $row["contact_no"];

                                $contact_person = $row["contact_person"];
                                $contact_no_contact_person = $row["contact_no_contact_person"];
                                $live_since_year = $row["live_since_year"];

                                $purpose = $row["purpose"];
                                $status = $row["status"];
                                $gender = $row["gender"];

                                $profile = $row["profile"];
                                
                                // Revenue data from joined table
                                $document_amount = $row['document_amount'] ?? '0';
                                $or_no = $row['OR_no'] ?? 'N/A';
                                $date_request = $row["date_request"];
                                $date_issue = $row['date_issue'] ?? 'N/A';
                                $expired_date = $row['expired_date'] ?? 'N/A';

                                date_default_timezone_set("Asia/Manila");
                                $current_date = date("Y-m-d");

                                ?>
                                 <tr class = "table_hover">
                                 <td class = "img"><img src="/BIS/asset/image/user_profile/<?php echo $profile; ?>" alt="" width = 500/></td>
                                    <td><?php echo $firstname ." ". $middlename ." ". $lastname; ?></td>
                                    <td><?php echo $gender; ?></td>
                                    <td><?php echo $control_no; ?></td>
                                    <td><?php echo $purpose; ?></td>
                        
                                    <td style = 'color:blue;'>
                                    <?php
                                            $status_document =  trim($row['status']);

                                            if ($status_document == "No data"){
                                                echo "<p style = 'color:#00572060;'>No data</p>";
                                            }
                                            else if ($status_document == "Pending"){
                                                echo "<p style = 'color:red;'>Pending</p>";
                                            }
                                            else if ($status_document == "Processing"){
                                                echo "<p style = 'color:orange;'>Processing</p>";
                                            }
                                            else if ($status_document == "Ready to Pick-up"){
                                                echo "<p style = 'color:blue;'>Ready to Pick-up</p>";
                                            }
                                            else if ($status_document == "Released"){
                                                echo "<p style = 'color:#00cc0e;'>Released</p>";
                                            }
                                            else if ($status_document == "Invalid Purpose"){
                                                echo "<p style = 'color:red;'>Invalid Purpose</p>";
                                            }
                                        ?>
                                    </td>
                                
                                    <td>
                                        
                                        <div id="form_up_del_official">
                                       
                                                <p hidden><?php echo $firstname ?></p>
                                                <p hidden><?php echo $middlename ?></p>
                                                <p hidden><?php echo $lastname ?></p>
                                                
                                                <p hidden><?php echo $age ?></p>
                                                <p hidden><?php echo $birthday ?></p>
                                                <p hidden><?php echo $place_of_birth ?></p>
    
                                               
                                                <p hidden><?php echo $gender ?></p>
                                                <p hidden><?php echo $house_no ?></p>
                                                <p hidden><?php echo $sitio_pook ?></p>
                                             
                                                <p hidden><?php echo $purpose ?></p>

                                                <p hidden><?php echo $contact_no ?></p>
                                                <p hidden><?php echo $contact_person ?></p>
                                                <p hidden><?php echo $contact_no_contact_person ?></p>
    
                                                <p hidden><?php echo $request_document ?></p>
                                                
                                                <p hidden><?php echo $live_since_year ?></p>
                                                <p hidden><?php echo $status ?></p>

                                                <p hidden><?php echo $profile ?></p>
                                               
                                                
                                             
                                                <p hidden class="revenue-data"><?php echo  number_format($document_amount, 2); ?></p>
                                                <p hidden class="revenue-data"><?php echo $or_no ?></p>
                                                <p hidden class="revenue-data"><?php echo $date_issue ?></p>
                                                <p hidden class="revenue-data"><?php echo $expired_date ?></p>

                                            <button id = "barangay_print" class = "print_btn" data-id= <?php echo $row ["id"] ?> >
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <path d="M128 0C92.7 0 64 28.7 64 64l0 96 64 0 0-96 226.7 0L384 93.3l0 66.7 64 0 0-66.7c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0L128 0zM384 352l0 32 0 64-256 0 0-64 0-16 0-16 256 0zm64 32l32 0c17.7 0 32-14.3 32-32l0-96c0-35.3-28.7-64-64-64L64 192c-35.3 0-64 28.7-64 64l0 96c0 17.7 14.3 32 32 32l32 0 0 64c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-64zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/>
                                                </svg>
                                            </button>
                                            <button id = "edit_list" class = "edit_btn_manage" data-id= <?php echo $row ["id"] ?>>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/>
                                                </svg>
                                            </button>

                                            <button id = "delete_official_btn" class = "delete_btn_id" data-id= <?php echo $row ["id"] ?>>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                    <path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                                </svg>
                                            </button>
                                        </div>    
                                           
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                    </table>
                </div>
                <?php
                }
                
                // Close connection 
                mysqli_close($conn);
                ?> 

            <!-- print CERT -->
            <div id = "print-modal" class = "print-modal">
                <div class = "print-modal-content">
                    <span onclick="this.parentElement.parentElement.style.display='none';" class = "print-close-btn">&times;</span>
                    <?php include("print.php");?>  
                </div>
            </div>
            
            <!-- MODAL UPDATE -->
            <div id = "edit-modal_manage" class = "edit-modal_manage">
                <div class = "edit-modal-content_manage">
                    <span onclick="this.parentElement.parentElement.style.display='none';" class = "update-close-btn_manage">&times;</span>
                    <?php include("update_req_list.php");?>
                </div>
            </div>
            
            <!-- MODAL ADD -->
            <div id = "add-modal_manage" class = "add-modal_manage">
                <div class = "add-modal-content_manage">
                    <span onclick="this.parentElement.parentElement.style.display='none';" class = "add-close-btn_manage">&times;</span>
                    <?php include("add_request.php");?>
                </div>
            </div>
            
            <!-- MODAL import -->
            <div id = "import-modal_manage" class = "import-modal_manage">
                <div class = "import-modal-content_manage">
                    <span onclick="this.parentElement.parentElement.style.display='none';" class = "import-close-btn_manage">&times;</span>
                    <?php include("../certificate_folder/import_temp.php");?>
                </div>
            </div>
            
            <!-- MODAL Delete -->    
            <div id = "delete-modal_id" class = "delete-modal_id">
                <div class = "delete-modal-content_id">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/>
                        </svg>
                    </span>
                    <h2>Delete Confirmation</h2>
                    <h3>Are you sure you want to delete this record!</h3>
                    <div class = "div-delete">   
                        <button id = "confirm-delete_id" class = "btn-delete_id">Delete</button>
                        <button id = "cancel-delete_id" class = "btn-delete_id">Cancel</button>
                    </div>
                </div>
            </div>

</body>                               
</html>