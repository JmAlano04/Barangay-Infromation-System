<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         /* SCROLL BAR */
         .edit-modal::-webkit-scrollbar,
        .delete-modal::-webkit-scrollbar,
        .modal_import::-webkit-scrollbar,
        .modal::-webkit-scrollbar {
            display: none;
        }

    </style>
</head>
<body>
        
<?php 
require("../../../database/conn_db.php");


 
$input = $_POST['input']; 

// Fetch records for the current page
$sql =  "SELECT * FROM barangay_official WHERE fullname LIKE '{$input}%' OR id LIKE '{$input}%' OR id LIKE '{$input}%' OR chairmanship LIKE '{$input}%' OR position LIKE '{$input}%' OR term_start LIKE '{$input}%' OR term_end LIKE '{$input}%' OR status LIKE '{$input}%'";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>
    <div style = "margin-bottom:150px;"></div>
<table>
    <caption>Barangay Official List</caption>
    <tr>
        <th>Profile</th>
        <th>Fullname</th>
        <th>Chairman</th>
        <th>Position</th>
        <th>Term_start</th>
        <th>Term_end</th>
     
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $fullname = $row["fullname"];
        $chairman = $row["chairmanship"];
        $position = $row["position"];
        $term_start = $row["term_start"];
        $term_end = $row["term_end"];
        $status = $row["status"];
        $image = $row["photo"];
        ?>
        <tr class="table_hover">
        <td class = "img"><img src="../../asset/image/official/<?php echo $image?>" alt="" width = "500"  /></td>
            <td><?php echo $fullname; ?></td>
            <td><?php echo $chairman; ?></td>
            <td><?php echo $position; ?></td>
            <td><?php echo $term_start; ?></td>
            <td><?php echo $term_end; ?></td>
            
        
            <td>
                <?php echo $status == "Active" ? "<p style='color:blue;'>Active</p>" : "<p style='color:red;'>Inactive</p>"; ?>
            </td>
            <td>
                <div id="form_up_del_official">
                    <button id="update_official_btn" class="update_btns" data-id="<?php echo $id; ?>"><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg></button>
                    <button id="delete_official_btn" class="delete_btn_officials" data-id="<?php echo $id; ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>
                </div>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

    <div style = "padding-bottom:100px;"></div>

<?php 
} else { ?>
        <style>
        .Data-not-found h1{
            color:rgba(255, 0, 0, 0.37);
            position:absolute;
            top:300px;
            left:25%;
            font-size:3.5rem;
        }
    </style>
    <div class = "Data-not-found">
    <h1>DATA NOT FOUND</h1>
    </div>
    <?php
}

// Close the connection
mysqli_close($conn);
?>     
        
                    <!-- MODAL DELETE -->
                     <div id = "delete-modals" class = "delete-modal">
                        <div class = "delete-modal-content">
                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg></span>
                            <h2>Delete Confirmation</h2>
                            <h3>Are you sure you want to delete this record!</h3>
                            <div class = "div-delete">   
                            <button id = "confirm-deletes" class = "btn-delete">Delete</button>
                            <button id = "cancel-deletes" class = "btn-delete">Cancel</button>
                            </div>
                        </div>
                     </div>
                  
                    
        
                    <!-- MODAL UPDATE -->
                    <div id = "edit-modals" class = "edit-modal">
                            <div class = "edit-modal-content">
                            <span onclick="this.parentElement.parentElement.style.display='none';" class = "update-close-btn">&times;</span>
                                <?php include("update_temp.php");?>
                            </div>
                       </div>
                >
        </body>
        </html>