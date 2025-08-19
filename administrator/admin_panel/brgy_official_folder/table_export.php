<?php  require("../../../database/conn_db.php"); ?>
<table border = 1>

                <tr>
                     <th>ID</th>
                     <th>Fullname</th>
                     <th>Chairmanship</th>
                     <th>Position</th>

                     <th>Term_start</th>
                     <th>Term_end</th>
                     <th>Status</th>

                     <th>photo</th>
                   
                        
                 </tr>
  <?php
  $i = 1;
  $rows = mysqli_query($conn, "SELECT * FROM barangay_official");

  foreach($rows as $row) :
    $id = $row["id"];
  
    $fullname = $row["fullname"];
    $chairman = $row["chairmanship"];
    $position = $row["position"];
    $term_start = $row["term_start"];
    $term_end = $row["term_end"];
    $status = $row["status"];
    $image = $row["photo"];
  ?>
  <tr>
            <td ><<?php echo $id;?>  </td>
            <td><?php echo  $fullname; ?></td>
            <td><?php echo $chairman; ?></td>
            <td><?php echo $position; ?></td>
            <td><?php echo $term_start; ?></td>
            <td><?php echo $term_end; ?></td>
            <td>
                <?php echo $status == 1 ? "<p style='color:blue;'>Active</p>" : "<p style='color:red;'>Inactive</p>"; ?>
            </td>
            <td><?php echo $image ; ?></td>
        
          
     
           

  </tr>
  <?php endforeach; ?>
</table>
