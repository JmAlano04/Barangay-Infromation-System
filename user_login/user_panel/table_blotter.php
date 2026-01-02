<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Table</title>
    
    <style>
        #form_up_del_official{
 display: flex;
 justify-content:space-evenly ;
 align-items: center;
}
.update-close-btn {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.update-close-btn:hover,
.update-close-btn:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
#update_official_btn{
  color: var(--bg-color);
  cursor: pointer;
  padding: 3px 5px 3px 5px;
  background-color: transparent;
  border-radius: 4px;
  font-size: 0.9rem;
  outline: none;
  border: none;
}
#update_official_btn svg{
width: 20px;
fill: var(--other-color);
}

#update_official_btn svg:hover{
  fill: rgb(150, 202, 250);
  color: var(--1st-text-color);
}
#delete_official_btn{
  color: var(--bg-color);
  cursor: pointer;
  padding: 3px 5px 3px 5px;
  background-color: transparent;
  border-radius: 4px;
  border: 1px solid rgb(197, 197, 197);
  outline: none;
  border: none;
  font-size: 0.9rem;
}
#delete_official_btn svg{
width: 18px;
fill: red;
}
#delete_official_btn svg:hover{
  fill: rgb(252, 134, 134);
  color: var(--1st-text-color);
}
        .delete-modal,.delete-modals{
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow-y: scroll; /* Enable scroll if needed */
  background-color: rgb(153, 0, 0); /* Fallback color */
  background-color:rgba(58, 58, 58, 0.548);; /* Black w/ opacity */
  animation-name: background ;
  animation-duration: 0.7s; 
  display: flex;
  align-items: center;
  display: none;
}
.delete-modal-content,.delete-modal-contents{
  background-color: rgb(235, 235, 235);
  margin: 6% auto; /* 15% from the top and centered */
  padding: 20px;
  border: none;
  width: 40%; /* Could be more or less, depending on screen size */
  animation-name: down ;
  animation-duration: 0.7s; 
  border-radius: 4px;
  text-align: center;
  font-family: "sub_text";
  border-radius: 8px;
}
.delete-modal-content svg, .delete-modal-contents svg{
  width: 100px;
  fill: #d4b62f;
  padding-top: 20px;
}
.delete-modal-content h2,.delete-modal-contents h2{
  padding: 20px 0px 40px 0px;
  font-size: 2.5rem;
  color: var(--1st-text-color);
}
.delete-modal-content h3,.delete-modal-contents h3{
  padding: 20px 0px 50px 0px;
  font-size: 1.4rem;
  color: var(--1st-text-color);
}
.delete-modal-content .div-delete,.delete-modal-contents .div-delete{
display: flex;
justify-content: space-evenly;
}
#confirm-delete,#confirm-deletes{
  background-color: red;
  padding: 20px;
  width: 10vw;
  border: none;
  font-size: 1.2rem;
  color: var(--bg-color);
  cursor: pointer;
  border-radius: 4px;
  
}
#cancel-delete, #cancel-deletes{
  background-color: var(--2nd-bg-color);
  width: 10vw;
  padding: 20px;
  border: none;
  font-size: 1.2rem;
  color: var(--bg-color);
  cursor: pointer;
  border-radius: 4px;
}
.edit-modal,.edit-modals,.edit-modal_blotter,.edit-modal_blotters{
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width:100%; /* Full width */
  height: 100%; /* Full height */
  overflow-y: scroll; /* Enable scroll if needed */
  background-color: rgb(153, 0, 0); /* Fallback color */
  background-color: rgba(58, 58, 58, 0.548); /* Black w/ opacity */
  animation-name: background ;
  animation-duration: 0.7s; 
  display: none;
}
.edit-modal-content,.edit-modal-contents,.edit-modal-content_blotters{
background-color: rgb(235, 235, 235);
  margin: 2% auto; /* 15% from the top and centered */
  padding: 40px 80px 40px 80px;
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
  animation-name: down ;
  animation-duration: 0.7s; 
  border-radius: 8px;
}
.edit-modal-content_blotter{
  background-color: rgb(235, 235, 235);
  margin: 2% auto; /* 15% from the top and centered */
  padding: 40px 80px 40px 80px;
  border: 1px solid #888;
  width: 40%; /* Could be more or less, depending on screen size */
  height: max-content;
  animation-name: down ;
  animation-duration: 0.7s; 
  border-radius: 8px;
}
        tfoot {
            font-weight: bold;
            background-color: #4A9D4f;
            color:white;
        }
        .status-count {
            margin-top: 10px;
            padding: 5px;
            background-color: #f8f9fa;
            border-radius: 4px;
            color:#4A9D4f;
        }
        .pagination {
            margin: 20px 0;
            display: flex;
            justify-content: center;
            gap: 5px;
        }
        .pagination a {
            padding: 5px 10px;
            border: 1px solid #ddd;
            text-decoration: none;
            color: #4A9D4f;
            border-radius: 3px;
        }
        .pagination a.active {
            background-color: #4A9D4f;
            color: white;
            border: 1px solid #4A9D4f;
        }
        .pagination a:hover:not(.active) {
            background-color: #f0f0f0;
        }
        .pagination-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 15px 0;
        }
        .limit-selector {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top:10px;
        }
        .limit-selector select {
            padding: 5px;
            border: 1px solid #4A9D4f;
            border-radius: 4px;
            margin-top:-50px;
        }
        .page-info {
            font-size: 0.9em;
            color: #555;
            margin-left:40px;
            margin-top:20px;
        }
        .ellipsis {
            padding: 5px 10px;
        }
        @media only screen and (min-width: 320px ){
            tfoot {
            font-weight: bold;
            background-color: #4A9D4f;
            color:white;
        }
        .status-count {
            margin-top: 10px;
            padding: 5px;
            background-color: #f8f9fa;
            border-radius: 4px;
            color:#4A9D4f;
        }
        .pagination {
            margin: 20px 0;
            display: flex;
            justify-content: center;
            gap: 5px;
          
        }
        
        .pagination a {
            padding: 5px 10px;
            border: 1px solid #ddd;
            text-decoration: none;
            color: #4A9D4f;
            border-radius: 3px;
        }
        .pagination a.active {
            background-color: #4A9D4f;
            color: white;
            border: 1px solid #4A9D4f;
        }
        .pagination a:hover:not(.active) {
            background-color: #f0f0f0;
        }
        .pagination-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 15px 0;
        }
        .limit-selector {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top:10px;
        }
        .limit-selector select {
            padding: 5px;
            border: 1px solid #4A9D4f;
            border-radius: 4px;
            margin-top:-50px;
        }
        .page-info {
            font-size: 0.5em;
            color: #555;
            margin-left:-180px;
            margin-top:20px;
        }
        .ellipsis {
            padding: 5px 10px;
        }
        @media only screen and (min-width: 1080px ){
            tfoot {
            font-weight: bold;
            background-color: #4A9D4f;
            color:white;
        }
        .status-count {
            margin-top: 10px;
            padding: 5px;
            background-color: #f8f9fa;
            border-radius: 4px;
            color:#4A9D4f;
        }
        .pagination {
            margin: 20px 0;
            display: flex;
            justify-content: center;
            gap: 5px;
        }
        .pagination a {
            padding: 5px 10px;
            border: 1px solid #ddd;
            text-decoration: none;
            color: #4A9D4f;
            border-radius: 3px;
        }
        .pagination a.active {
            background-color: #4A9D4f;
            color: white;
            border: 1px solid #4A9D4f;
        }
        .pagination a:hover:not(.active) {
            background-color: #f0f0f0;
        }
        .pagination-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 15px 0;
        }
        .limit-selector {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top:10px;
        }
        .limit-selector select {
            padding: 5px;
            border: 1px solid #4A9D4f;
            border-radius: 4px;
            margin-top:-50px;
        }
        .page-info {
            font-size: 1em;
            color: #555;
            margin-left:60px;
            margin-top:20px;
            transition:all 0.5s ease ;
        }
        .ellipsis {
            padding: 5px 10px;
        }
        .sidebar.active ~ .dashboard_content .page-info{
                margin-left:-180px;
        }
        }
        }
    </style>
</head>
<body>
    <?php 
    $user_id = $_SESSION['user_id']; 
    ?>

    <?php 
    require("../../database/conn_db.php");

    // Get current page and limit
    $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
    $limit = isset($_GET['limit']) ? max(1, (int)$_GET['limit']) : 10;
    $offset = ($page - 1) * $limit;

    // FIXED: correct table name (barangay_blotter)
    $countQuery = "SELECT COUNT(*) AS total FROM barangay_blotter WHERE user_id = $user_id";
    $countResult = $conn->query($countQuery);
    $totalRows = $countResult->fetch_assoc()['total'];
    $totalPages = max(1, ceil($totalRows / $limit));

    if ($page > $totalPages) {
        $page = $totalPages;
        $offset = ($page - 1) * $limit;
    }

    // FIXED: correct table for status counts
    $statusCounts = [
        'total' => 0,
        'no_data' => 0,
        'pending' => 0,
        'processing' => 0,
        'ready' => 0,
        'released' => 0,
        'invalid' => 0
    ];
    
    $statusQuery = "SELECT status, COUNT(*) as count 
                    FROM barangay_blotter 
                    WHERE user_id = $user_id 
                    GROUP BY status";
    $statusResult = $conn->query($statusQuery);
    
    if ($statusResult) {
        while ($row = $statusResult->fetch_assoc()) {
            $statusCounts['total'] += $row['count'];
        }
    }

    // Fetch records
    $sql = "SELECT * FROM barangay_blotter AS bb 
            JOIN user_account AS ua ON bb.user_id = ua.user_id
            WHERE bb.user_id = $user_id 
            ORDER BY id DESC 
            LIMIT $limit OFFSET $offset";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>

    <div class="pagination-controls">
        <div class="limit-selector">
            <form method="get" action="">
                <label for="limit">Items per page:</label>
                <select name="limit" id="limit" onchange="this.form.submit()">
                    <option value="5" <?php echo $limit == 5 ? 'selected' : ''; ?>>5</option>
                    <option value="10" <?php echo $limit == 10 ? 'selected' : ''; ?>>10</option>
                    <option value="20" <?php echo $limit == 20 ? 'selected' : ''; ?>>20</option>
                    <option value="50" <?php echo $limit == 50 ? 'selected' : ''; ?>>50</option>
                </select>
                <input type="hidden" name="page" value="1">
            </form>
        </div>
    </div>

<main class="overflow">
    <table>
        <caption>My Blotter/Complaints</caption>
        <thead>
            <tr>
                <th>Subject</th>
                <th>Place</th>
                <th>Complained Person</th>
                 <th>Address of Complained Person</th>
                <th>Date/Time Filed</th>
               
                <th>Status</th>
                 <th>Remarks</th>
                  <th>Action</th>
            </tr>
        </thead>
        <tbody>

<?php while ($row = $result->fetch_assoc()): ?>
            <tr class="table_hover">
               
                <td><?= $row['subject'] ?></td>
                <td><?= $row['place'] ?></td>
                
              
                <td><?= $row['complained_name'] ?></td>
                  <td><?= $row['add_complained_name'] ?></td>
                  
                
                <td><?= $row['date'] . "/" . $row['time'] ?></td>
                <td>
                <?php
                    $status = trim($row['status']);

                    if ($status === "Active") echo "<p style='color:#005720;'>Active</p>";
                    elseif ($status === "Settled") echo "<p style='color:red;'>Settled</p>";
                    elseif ($status === "Schedule") echo "<p style='color:orange;'>Schedule</p>";
                    elseif ($status === "Pending") echo "<p style='color:#53252d;'>Pending</p>";
                    elseif ($status === "Rejected") echo "<p style='color:#c2d328;'>Rejected</p>";
                ?>
                </td>
                <td><?= $row['remarks'] ?></td>
                 <!-- ✅ Hidden TD fields -->
                <td style="display:none"><?= $row['firstname'] ?></td>
                <td style="display:none"><?= $row['middlename'] ?></td>
                <td style="display:none"><?= $row['lastname'] ?></td>
                <td style="display:none"><?= $row['age'] ?></td>
                <td style="display:none"><?= $row['house_no'] ?></td>
                <td style="display:none"><?= $row['sitio_pook'] ?></td>
                <td style="display:none"><?= $row['cell_no'] ?></td>
                <td style="display:none"><?= $row['details_reason'] ?></td>
                 <td>

                    <?php 
                    if ($status === "Pending")
                        {
                    ?>  
                        <div id="form_up_del_official">
                      
                        <button id="update_official_btn" class="update_btn" data-id="<?php echo $row["id"]; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg>
                        </button>
                        <button id="delete_official_btn" class="delete_btn_blotter" data-id="<?php echo $row["id"]; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                        </button>
                        <?php
                        }
                        
                    
                    ?>
                    
                        
                         </div>
        </td>
            </tr>
<?php endwhile; ?>

        </tbody>
        <tfoot>
            <tr>
                <td colspan="8">
                    <div>Total Records: <?= $statusCounts['total'] ?></div>
                </td>
            </tr>
        </tfoot>
    </table>
</main>

    <div class="pagination">

<?php if ($page > 1): ?>
        <a href="?page=1&limit=<?= $limit ?>">First</a>
        <a href="?page=<?= $page - 1 ?>&limit=<?= $limit ?>">Previous</a>
<?php endif; ?>

<?php 
$maxVisiblePages = 5;
$startPage = max(1, $page - floor($maxVisiblePages / 2));
$endPage = min($totalPages, $startPage + $maxVisiblePages - 1);

if ($startPage > 1) {
    echo '<a href="?page=1&limit='.$limit.'">1</a>';
    if ($startPage > 2) echo '<span class="ellipsis">...</span>';
}

for ($i = $startPage; $i <= $endPage; $i++): ?>
        <a href="?page=<?= $i ?>&limit=<?= $limit ?>" class="<?= ($i == $page ? 'active' : '') ?>">
            <?= $i ?>
        </a>
<?php endfor;

if ($endPage < $totalPages) {
    if ($endPage < $totalPages - 1) echo '<span class="ellipsis">...</span>';
    echo '<a href="?page='.$totalPages.'&limit='.$limit.'">'.$totalPages.'</a>';
}

if ($page < $totalPages): ?>
        <a href="?page=<?= $page + 1 ?>&limit=<?= $limit ?>">Next</a>
        <a href="?page=<?= $totalPages ?>&limit=<?= $limit ?>">Last</a>
<?php endif; ?>

    </div>

<?php 
    } else { ?>
        <style>
        .Data-not-found h1 {
            color: rgba(255, 0, 0, 0.37);
            position: absolute;
            top: 300px;
            left: 25%;
            font-size: 3.5rem;
        }
        @media only screen and (min-width: 320px ){
            .Data-not-found h1 {
                color: rgba(255, 0, 0, 0.37);
                position: absolute;
                top: 300px;
                left: -100%;
                font-size: 2rem;
            }
        }
        @media only screen and (min-width: 481px ){
            .Data-not-found h1 {
                color: rgba(255, 0, 0, 0.37);
                position: absolute;
                top: 300px;
                left: -60%;
                font-size: 2rem;
            }
        }
        @media only screen and (min-width: 601px ){
            .Data-not-found h1 {
                color: rgba(255, 0, 0, 0.37);
                position: absolute;
                top: 300px;
                left: -30%;
                font-size: 2.1rem;
            }
        }
        @media only screen and (min-width: 769px ){
            .Data-not-found h1 {
                color: rgba(255, 0, 0, 0.37);
                position: absolute;
                top: 300px;
                left: 0%;
                font-size: 2.1rem;
            }
        }
        @media only screen and (min-width: 1081px ){
            .Data-not-found h1 {
                color: rgba(255, 0, 0, 0.37);
                position: absolute;
                top: 300px;
                left: 30%;
                font-size: 2.54rem;
            }
        }
        @media only screen and (min-width: 1441px ){
            .Data-not-found h1 {
                color: rgba(255, 0, 0, 0.37);
                position: absolute;
                top: 300px;
                left: 50%;
                font-size: 2.54rem;
            }
        }
        </style>

        <div class="Data-not-found">
            <h1>DATA NOT FOUND</h1>
        </div>
<?php


    }

    mysqli_close($conn);
    ?>

        <!-- MODAL DELETE -->
<div id="delete-modal" class="delete-modal">
    <div class="delete-modal-content">
        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg></span>
        <h2>Delete Confirmation</h2>
        <h3>Are you sure you want to delete this record!</h3>
        <div class="div-delete">   
            
            <button id="confirm-delete" class="btn-delete">Delete</button>
            <button id="cancel-delete" class="btn-delete">Cancel</button>
        </div>
    </div>
</div>

<!-- MODAL UPDATE -->
<div id="edit-modal_blotter" class="edit-modal_blotter">
    <div class="edit-modal-content_blotter">
        <span class="update-close-btn">&times;</span>
         <?php include 'update_blotter.php'; ?>
    </div>
</div>

    <footer style="height:100px;">
        <div class="page-info">
            Showing <?= min($offset + 1, $totalRows) . " to " . min($offset + $limit, $totalRows) . " of " . $totalRows ?> entries
        </div>
    </footer>






<script src="delete_modal_button.js"></script>
<script src="update_blotter.js"></script>
</body>
</html>
