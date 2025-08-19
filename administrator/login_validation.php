<?php
require("../database/conn_db.php");

if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])){
    // set default session invalid
    $_SESSION['status'] = 'invalid';
}

if ($_SESSION['status'] == 'valid'){
    header('location: admin_panel/dashboard.php');
}

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['pname']);
  
    if(empty($username) || empty($password)){
        echo "Please Fill up this form ";
        echo "
            <script> 
                document.getElementById('validation').style.display = 'block';
                document.getElementById('pwd').style.outline = '1px rgb(253, 42, 42) solid';
            </script>";
    } else {
        // Use a prepared statement to prevent SQL injection
         $query = "SELECT * FROM admin_account WHERE email = ?";
        
       if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_array($result)) {
                // Verify password
                if (password_verify($password, $row['password'])) {
                    $_SESSION['status'] = 'valid';
                    $_SESSION['admin_id'] = $row['user_id'];
                    header('Location: loading.php');
                    exit;
                } else {
                    // Incorrect password
                    $_SESSION['status_input'] = 'invalid_input';
                    echo "Incorrect password.";
                      echo "<script>document.getElementById('validation').style.display = 'block';</script>";
                }
            } else {
                // No user found with that email
                $_SESSION['status'] = 'invalid';
                echo "Invalid credentials. Email not found.";
                echo "<script>document.getElementById('validation').style.display = 'block';</script>";
            }

            // Close the prepared statement
            mysqli_stmt_close($stmt);
        } else {
            // Handle query preparation failure
            echo "Failed to prepare the query.";
        }
    }
}
?>
