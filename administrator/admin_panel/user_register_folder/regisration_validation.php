<?php
require('../../../database/conn_db.php');

if (isset($_POST['registraion_user'])) {

    function clean($data) {
        return htmlspecialchars(trim($data));
    }

    $firstname       = clean($_POST['fname']);
    $middlename      = clean($_POST['mname']);
    $lastname        = clean($_POST['lname']);
    $suffix          = clean($_POST['suffix']);
    $gender          = clean($_POST['gender']);
    $birthday        = clean($_POST['birthday']);
    $email           = clean($_POST['ename']);
    $password        = clean($_POST['pword']);
    $confirm_pword   = clean($_POST['confirm_pword']);
    $profile_default = clean($_POST['profile_default']);
    $verify          = clean($_POST['verify']);

    date_default_timezone_set("Asia/Manila");
    $date_registered = date("Y-m-d");

    // Compute age on backend (secure)
    $bday = new DateTime($birthday);
    $today = new DateTime();
    $age = $bday->diff($today)->y;

    // Prevent tampering
    if ($age < 18) {
        echo "<script>
            alert('Invalid age. Must be 18 or above.');
            // window.location.href = '/BIS/administrator/admin_panel/user_registered.php';
        </script>";
        exit;
    }

    // Password check
    if ($password !== $confirm_pword) {
        echo "<script>
            alert('Passwords do not match.');
            window.location.href = '/BIS/administrator/admin_panel/user_registered.php';
        </script>";
        exit;
    }

    // Check email duplicate
    $check_email = mysqli_query($conn, "SELECT user_id FROM user_account WHERE email='$email'");
    if (mysqli_num_rows($check_email) > 0) {
        echo "<script>
            alert('Email already exists.');
            window.location.href = '/BIS/administrator/admin_panel/user_registered.php';
        </script>";
        exit;
    }

    // Check person duplicate
    $check_person = mysqli_query($conn,
        "SELECT user_id FROM user_account 
         WHERE firstname='$firstname'
         AND lastname='$lastname'
         AND birthday='$birthday'
         AND suffix='$suffix'"
    );

    if (mysqli_num_rows($check_person) > 0) {
        echo "<script>
            alert('This person already has an account.');
            window.location.href = '/BIS/administrator/admin_panel/user_registered.php';
        </script>";
        exit;
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user
    $insert = "
        INSERT INTO user_account 
            (firstname, middlename, lastname, suffix, email, password, gender, birthday, age, date_registered, profile, verify)
        VALUES
            ('$firstname', '$middlename', '$lastname', '$suffix', '$email', '$hashed_password', '$gender', '$birthday', '$age', '$date_registered', '$profile_default', '$verify')
    ";

    if (mysqli_query($conn, $insert)) {
        echo "<script>
           
            window.location.href = '/BIS/administrator/admin_panel/user_registered.php';
        </script>";
    } else {
        echo "<script>
            alert('Database Error: " . mysqli_error($conn) . "');
            window.location.href = '/BIS/administrator/admin_panel/user_registered.php';
        </script>";
    }

    mysqli_close($conn);
}
?>
