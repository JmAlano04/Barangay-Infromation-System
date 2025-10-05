<?php
require("../database/conn_db.php");

if ($_SESSION['status_input'] == 'invalid_input' || empty($_SESSION['status_input'])){
    // set default session invalid
    $_SESSION['status_input'] = 'invalid_input';
}

if ($_SESSION['status_input'] == 'valid_input'){
    header('location: loading.php');
}

if (isset($_POST['forgot'])) {
    $fistname = trim($_POST['fname']);
    $lastname = trim($_POST['lname']);
  
    if(empty($fistname) || empty($lastname)){
        echo "Please Fill up this form ";
        echo "
            <script> 
                document.getElementById('validation').style.display = 'block';
                document.getElementById('pwd').style.outline = '1px rgb(253, 42, 42) solid';
            </script>";
    } else {
        // Use prepared statements to prevent SQL injection
        $query = "SELECT * FROM user_account WHERE firstname = ? AND lastname = ?";

        // Prepare the SQL statement
        if ($stmt = mysqli_prepare($conn, $query)) {
            // Bind the parameters
            mysqli_stmt_bind_param($stmt, "ss", $fistname, $lastname);
            
            // Execute the prepared statement
            mysqli_stmt_execute($stmt);
            
            // Get the result
            $result = mysqli_stmt_get_result($stmt);
            
            // Check if a matching record was found
            if (mysqli_num_rows($result) > 0) {
                $rowValidate = mysqli_fetch_array($result);
                
                $_SESSION['status_input'] = 'invalid_input';
                $_SESSION['firstname'] = $rowValidate['firstname'];
                $_SESSION['lastname'] = $rowValidate['lastname'];
                
                

                header('location: forgot_email.php');
               
                
            } else {
                $_SESSION['status_input'] = 'invalid_input';
                echo "Invalid Credential do not match our records. ";
                echo "<script>document.getElementById('validation').style.display = 'block'</script>";
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
