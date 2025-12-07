<?php
require('../../database/conn_db.php');

$user_id = $_SESSION['user_id'];


// =========================
// GET USER ACCOUNT DETAILS
// =========================
$sqls = "SELECT * FROM user_account WHERE user_id = $user_id";
$result = mysqli_query($conn, $sqls);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
?>
    <!-- Hidden data from user_account -->
    <p hidden id="fullname_user"><?php echo $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'] . " " . $row['suffix'] ?></p>
    <p hidden id="address_user"><?php echo $row['house_no'] . " " . $row['sitio_pook'] ?></p>
    <p hidden id="contact_no_user"><?php echo $row['contact_no'] ?></p>
    <p hidden id="verify_user"><?php echo $row['verify'] ?></p>

    <p hidden id="profile_user"><?php echo "/BIS/asset/image/user_profile/" . $row['profile'] ?></p>
    <p hidden id="profile_profile"><?php echo $row['profile'] ?></p>

    <!-- Profile details -->
    <p hidden id="firstname_my_profile"><?php echo $row['firstname']; ?></p>
    <p hidden id="middlename_my_profile"><?php echo $row['middlename']; ?></p>
    <p hidden id="lastname_my_profile"><?php echo $row['lastname']; ?></p>
    <p hidden id="suffix_my_profile"><?php echo $row['suffix']; ?></p>
    <p hidden id="age_my_profile"><?php echo $row['age']; ?></p>
    <p hidden id="gender_my_profile"><?php echo $row['gender']; ?></p>
    <p hidden id="user_id_my_profile"><?php echo $row['user_id']; ?></p>
    <p hidden id="birthday_my_profile"><?php echo $row['birthday']; ?></p>
    <p hidden id="contact_phone_my_profile"><?php echo $row['contact_no']; ?></p>
    <p hidden id="house_no_my_profile"><?php echo $row['house_no']; ?></p>
    <p hidden id="sitio_pook_my_profile"><?php echo $row['sitio_pook']; ?></p>

<?php
}

// =====================================================
// GET LATEST barangay_request INFORMATION
// =====================================================
$sql = "SELECT * FROM user_account AS u 
        LEFT JOIN barangay_request AS r ON u.user_id = r.user_id  
        WHERE u.user_id = $user_id
        ORDER BY r.id DESC LIMIT 1";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
?>
    <p hidden id="purpose_my_profile"><?php echo $row['purpose']; ?></p>
    <p hidden id="id_my_profile"><?php echo $row['id']; ?></p>
    <p hidden id="place_of_birth_my_profile"><?php echo $row['place_of_birth']; ?></p>
    <p hidden id="contact_person_my_profile"><?php echo $row['contact_person']; ?></p>
    <p hidden id="contact_no_contact_person_my_profile"><?php echo $row['contact_no_contact_person']; ?></p>
    <p hidden id="live_since_year_my_profile"><?php echo $row['live_since_year']; ?></p>

<?php
    $request_id = intval($row['id']);

    
    // ===================================================
    // GET PAYMENT FROM barangay_revenue (LATEST PAYMENT)
    // ===================================================
    // FIXED: Added backticks around OR_no (reserved keyword)
    $sql_revenue = "SELECT * FROM barangay_revenue AS r
        LEFT JOIN barangay_request AS br ON r.user_id = br.id  
        WHERE r.user_id =  $request_id
        ORDER BY br.id DESC LIMIT 1";

    $result_revenue = mysqli_query($conn, $sql_revenue);

    if (mysqli_num_rows($result_revenue) > 0) {
        $rev = mysqli_fetch_array($result_revenue);
?>
        <!-- Revenue / Payment Details -->
        <p hidden id="document_amount"><?php echo $rev['document_amount']; ?></p>
        <p hidden id="document_type_payment"><?php echo $rev['document_type']; ?></p>
        <p hidden id="or_no"><?php echo $rev['OR_no']; ?></p>
        <p hidden id="date_issue"><?php echo $rev['date_issue']; ?></p>
        <p hidden id="expired_date"><?php echo $rev['expired_date']; ?></p>
<?php
    }
}
?>