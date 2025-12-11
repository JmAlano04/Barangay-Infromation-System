<?php
require("../../../database/conn_db.php");

if (isset($_POST['sub_print'])) {

  

    // --- GET BARANGAY REQUEST + BLOTTER BASED ON USER ID ---
    $sql = "
        SELECT *
        FROM barangay_blotter AS bb
        JOIN barangay_request AS req 
            ON bb.user_id = req.user_id
        WHERE bb.user_id = req.user_id
        LIMIT 1
    ";

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

         // --- SAFE VALUES ---
    $id = intval(trim($_POST["id_upd"])); // IMPORTANT: User ID
    $subject = trim($_POST["subject_upd"]);
    $cell_no = trim($_POST["cell_no_upd"]);
    $place = trim($_POST["place_upd"]);
    $tanod = trim($_POST["tanod_upd"]);
    $birthday = trim($row["birthday"]);
    $date = trim($_POST["date_upd"]);
    $time = trim($_POST["time_upd"]);
    $status = trim($_POST["status_upd"]);
    $remarks_upd = trim($_POST["remarks_upd"]);
    $complainant = trim($_POST["complainant_upd"]);
    $age = trim($_POST["age_upd"]);
    $gender = trim($row["gender"]);
    $address_complainant = trim($_POST["address_complainant_upd"]);
    $complained_name = trim($_POST["complained_name_upd"]);
    $add_complained_name = trim($_POST["add_complained_name_upd"]);
    $details_reason = trim($_POST["details_reason_upd"]);

        include('document/barangay_certificate.php'); // CERTIFICATE TEMPLATE
    } 
    else {
        echo "No matching record found for user_id = $id";
    }

    mysqli_close($conn);
}
?>
