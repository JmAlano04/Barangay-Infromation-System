<?php
        require("../../../database/conn_db.php");
        // Get ID from AJAX request
        $id = $_POST["id"];

        // Delete query
        $sql = "DELETE FROM barangay_blotter WHERE id = '$id'";

        // Execute query
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully!";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }

      
        // Close connection
        mysqli_close($conn);
?>