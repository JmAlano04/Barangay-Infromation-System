<?php
require('../database/conn_db.php');

if (isset($_POST['registration'])) {

    // ================================
    // SANITIZE USER INPUT
    // ================================
    $firstname       = mysqli_real_escape_string($conn, trim($_POST['fname']));
    $middlename      = mysqli_real_escape_string($conn, trim($_POST['mname']));
    $lastname        = mysqli_real_escape_string($conn, trim($_POST['lname']));
    $suffix          = mysqli_real_escape_string($conn, trim($_POST['suffix']));
    $gender          = mysqli_real_escape_string($conn, trim($_POST['gender']));
    $birthday        = mysqli_real_escape_string($conn, trim($_POST['birthday'])); // YYYY-MM-DD
    $email           = mysqli_real_escape_string($conn, trim($_POST['ename']));
    $password        = mysqli_real_escape_string($conn, trim($_POST['pword']));
    $confirm_pword   = mysqli_real_escape_string($conn, trim($_POST['confirm_pword']));
    $profile_default = mysqli_real_escape_string($conn, trim($_POST['profile_default']));
    $verify          = mysqli_real_escape_string($conn, trim($_POST['verify']));

    date_default_timezone_set("Asia/Manila");
    $date_registered = date("Y-m-d");

    // ================================
    // VALIDATE BIRTHDAY
    // ================================
    if (empty($birthday)) {
        echo "<script>
            alert('Please select a valid birthday.');
            window.location.href = '/BIS/user_login/registration_form.php';
        </script>";
        exit;
    }

    $birthday_formatted = $birthday;

    // ================================
    // AGE COMPUTATION
    // ================================
    $bday  = new DateTime($birthday_formatted);
    $today = new DateTime();
    $age   = $bday->diff($today)->y;

    if ($age < 18) {
        echo "<script>
            window.location.href = '/BIS/user_login/error_popup_age.php';
        </script>";
        exit;
    }

    // ================================
    // PASSWORD CHECK
    // ================================
    if ($password !== $confirm_pword) {
        echo "<script>
            window.location.href = '/BIS/user_login/error_popup_password.php';
        </script>";
        exit;
    }

    // ================================
    // CHECK IF EMAIL EXISTS
    // ================================
    $email_check_sql = "SELECT user_id FROM user_account WHERE email = '$email'";
    $result = mysqli_query($conn, $email_check_sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>
            window.location.href = '/BIS/user_login/error_popup_email.php';
        </script>";
        exit;
    }

    // ================================
    // CHECK IF SAME PERSON EXISTS
    // ================================
    $person_check_sql = "SELECT user_id FROM user_account 
                         WHERE firstname='$firstname' 
                         AND lastname='$lastname' 
                         AND birthday='$birthday_formatted' 
                         AND suffix='$suffix'";
    $result = mysqli_query($conn, $person_check_sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>
            window.location.href = '/BIS/user_login/error_popup_information.php';
        </script>";
        exit;
    }

    // ================================
    // HASH PASSWORD
    // ================================
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // ================================
    // INSERT NEW USER
    // ================================
    $insert_sql = "INSERT INTO user_account 
        (firstname, middlename, lastname, suffix, email, password, gender, birthday, age, date_registered, profile, verify)
        VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$email', '$hashed_password', '$gender', '$birthday_formatted', '$age', '$date_registered', '$profile_default', '$verify')";

    if (mysqli_query($conn, $insert_sql)) {
        echo "<script>
            window.location.href = '/BIS/user_login/register_success.php';
        </script>";
    } else {
        echo "<script>
            alert('Database error: " . mysqli_error($conn) . "');
            window.location.href = '/BIS/user_login/registration_form.php';
        </script>";
    }

    mysqli_close($conn);
}
?>
