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
    $request_document = $row["request_document"];
    $birthday = $row["birthday"];
    $house_no = strtoupper($row["house_number"]);
    $sitio_pook = strtoupper($row["sitio_pook"]);
    $date_issue = $row["date_issue"];

    $month_issued = date('m', strtotime($date_issue));
    $day_issued = date('d', strtotime($date_issue));
    $year_issued = date('Y', strtotime($date_issue));

    $tax1 = 5;
    $tax2 = 5;
    $sum = $tax1 + $tax2;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Cedula</title>
    <link rel="stylesheet" href="/BIS/administrator/admin_panel/certificate_folder/document/cedula.css"/>
</head>
<body>
  <main>
    <p class="year"><b><?php echo $year_issued; ?></b></p>

    <div class="issue_date">
        <p class="p1"><b><?php echo $month_issued; ?></b></p>
        <p class="p2"><b><?php echo $day_issued; ?></b></p>
        <p class="p3"><b><?php echo $year_issued; ?></b></p>
    </div>

    <div class="place_issued">
      <p class="p6"><b><?php echo "DASMARINAS CITY"; ?></b></p>
    </div>

    <div class="name_div">
        <p class="p6"><b><?php echo $lastname; ?></b></p>
        <p class="p4"><b><?php echo $firstname; ?></b></p>
        <p class="p5"><b><?php echo $middlename . "."; ?></b></p>
    </div>

    <div class="address">
      <p class="p6"><b><?php echo $house_no . " " . $sitio_pook; ?></b></p>
    </div>

    <div class="citizenship">
      <p class="p6"><b><?php echo "FILIPINO"; ?></b></p>
    </div>

    <div class="place_of_birth">
      <p class="p6"><b><?php echo strtoupper($row["place_of_birth"]); ?></b></p>
    </div>

    <div class="birthday">
      <p class="p6"><b><?php echo date('d.m.Y', strtotime($birthday)); ?></b></p>
    </div>

    <div class="tax1">
      <p class="p6"><b><?php echo $tax1; ?></b></p>
    </div>

    <div class="tax2">
      <p class="p6"><b><?php echo $tax2; ?></b></p>
    </div>

    <div class="sum">
      <p class="p6"><b><?php echo $sum; ?></b></p>
    </div>

    <div class="cedula_div">
      <img src="./document/CEDULA (3).png" alt="" class="cedula">
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
