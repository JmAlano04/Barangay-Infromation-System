<?php
        require("../../../database/conn_db.php");
        // Get ID from AJAX request
        $user_id = $_POST["id"];

        // Delete query
        $sql = "DELETE FROM admin_account WHERE user_id = '$user_id'";

        // Execute query
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully!";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }

      
        // Close connection
        mysqli_close($conn);
?>