<?php
        require("../../../database/conn_db.php");
        // Get ID from AJAX request
        $id = $_POST["id"];

        // Delete query
        $sql = "DELETE FROM barangay_official WHERE id = '$id'";

        // Execute query
        if (mysqli_query($conn, $sql)) {
            echo "<script>window.location.href = '/BIS/administrator/admin_panel/brgy_official_folder/loading_delete.php'</script>";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }

      
        // Close connection
        mysqli_close($conn);
?>