<?php
require('../database/conn_db.php');

if (isset($_POST['registration'])) {
    $firstname = trim($_POST['fname']);
    $middlename = trim($_POST['mname']);
    $lastname = trim($_POST['lname']);
    $gender = trim($_POST['gender']);
    $age = trim($_POST['age']);
    $email = trim($_POST['ename']);
    $password = trim($_POST['pword']);
    $confirm_pword = trim($_POST['confirm_pword']);
    $profile_default = trim($_POST['profile_default']);
    $verify = trim($_POST['verify']);

    date_default_timezone_set("Asia/Manila");
    $date_issue = date("Y-m-d");

    // Check if passwords match
    if ($password !== $confirm_pword) {
        echo "<script>alert('Passwords do not match.');
            window.location.href = '/BIS/user_login/user_login_page.php';
        </script>";
        exit;
    }

    // Check if email or name already exists
    $checkQuery = "SELECT COUNT(*) AS c FROM user_account WHERE (firstname = ? AND lastname = ?) OR email = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("sss", $firstname, $lastname, $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        echo "<script>alert('Name or Email already exists.');
            window.location.href = '/BIS/user_login/user_login_page.php';
        </script>";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user into database
    $insertQuery = "INSERT INTO user_account (firstname, middlename, lastname, email, password, gender, age, date_registered, profile, verify)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ssssssisss", $firstname, $middlename, $lastname, $email, $hashed_password, $gender, $age, $date_issue, $profile_default, $verify);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful.');
            window.location.href = '/BIS/user_login/user_login_page.php';
        </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
