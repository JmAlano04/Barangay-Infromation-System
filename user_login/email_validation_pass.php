<?php


require("../database/conn_db.php");

if (isset($_POST['verify'])) {
    $email = trim($_POST['email']);
    $firstname = trim($_POST['fname']);
    $lastname = trim($_POST['lname']);
  
    // Check if any input is empty
    if(empty($email) || empty($firstname) || empty($lastname)){
        echo "Please fill up this form.";
        echo "
            <script> 
                document.getElementById('validation').style.display = 'block';
                document.getElementById('pwd').style.outline = '1px rgb(253, 42, 42) solid';
            </script>";
    } else {
        // Use prepared statements to prevent SQL injection
        $query = "SELECT * FROM user_account WHERE email = ? AND firstname = ? AND lastname = ?";
        
        // Prepare the SQL statement
        if ($stmt = mysqli_prepare($conn, $query)) {
            // Bind the parameters
            mysqli_stmt_bind_param($stmt, "sss", $email, $firstname, $lastname);
            
            // Execute the prepared statement
            mysqli_stmt_execute($stmt);
            
            // Get the result
            $result = mysqli_stmt_get_result($stmt);
            
            // Check if a matching record was found
            if (mysqli_num_rows($result) > 0) {
                $rowValidate = mysqli_fetch_array($result);
                
                // Optionally store user ID or other session info
                // $_SESSION['status_input'] = 'valid_input';
                $_SESSION['email'] = $rowValidate['email'];
                
                // Redirect to the "forgot password" page
                header('location: forgot_new_pass.php');
                exit(); // Ensure the script ends here after the redirect
            } else {
                $_SESSION['status_input'] = 'invalid_input';
                echo "Invalid credentials. They do not match our records.";
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
