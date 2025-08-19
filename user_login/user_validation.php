<?php
require("../database/conn_db.php");

if ($_SESSION['status_input'] == 'invalid_input' || empty($_SESSION['status_input'])){
    // set default session invalid
    $_SESSION['status_input'] = 'invalid_input';
}

if ($_SESSION['status_input'] == 'valid_input'){
    header('location: loading.php');
}

if (isset($_POST['user_login'])) {
    $email = trim($_POST['ename']);
    $password = trim($_POST['pword']); // From login form

    if (empty($email) || empty($password)) {
        $_SESSION['error_message'] = "Please fill in both fields.";
    } else {
        $query = "SELECT * FROM user_account WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // ✅ Correct way to verify hashed password
            if (password_verify($password, $row['password'])) {
                $_SESSION['status_input'] = 'valid_input';
                $_SESSION['user_id'] = $row['user_id'];
                header('Location: loading.php');
                exit;
            } else {
                $_SESSION['error_message'] = "Invalid email or password.";
            }
        } else {
            $_SESSION['error_message'] = "Invalid email or password.";
        }

        $stmt->close();
    }

    // Redirect back to login page
    header("Location: user_login_page.php");
    exit;
}
?>
