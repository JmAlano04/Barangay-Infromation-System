<?php

require("../../../database/conn_db.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['upload']) && isset($_FILES['photos']) && isset($_POST['ids'])) {
    // Check if the number of uploaded files exceeds 18
    $numFiles = count($_FILES['photos']['name']);
    if ($numFiles > 18) {
        echo "
        <script>alert('Error: You can only upload a maximum of 18 files.')
        window.location.href = '/BIS/administrator/admin_panel/brgy_info.php'
        </script>";
        
        exit; // Stop the script if files exceed the limit
    }

    $uploadDir = '../../../asset/image/gallery/'; // Don't forget the slash at the end

    foreach ($_FILES['photos']['tmp_name'] as $key => $tmpName) {
        $fileName = basename($_FILES['photos']['name'][$key]);
        $targetFile = $uploadDir . $fileName;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

        // Get the matching ID for this file
        $id = intval($_POST['ids'][$key]);

        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($tmpName, $targetFile)) {
                // Update existing record in database
                $stmt = $conn->prepare("UPDATE gallery SET photo = ? WHERE id = ?");
                $stmt->bind_param("si", $fileName, $id);

                if ($stmt->execute()) {
                    
                    echo "
                    <script>alert('Updated photo: $fileName')
                    window.location.href = '/BIS/administrator/admin_panel/brgy_info.php'
                    </script>";
                } else {
                   
                    echo "
                    <script>alert('DB update failed for ID $id')
                    window.location.href = '/BIS/administrator/admin_panel/brgy_info.php'
                    </script>";
                }
                $stmt->close();
            } else {
                
                echo "
                <script>alert('File move failed for: $fileName.')
                window.location.href = '/BIS/administrator/admin_panel/brgy_info.php'
                </script>";
            }
        } else {
           
            echo "
                <script>alert('Invalid file type for: $fileName')
                window.location.href = '/BIS/administrator/admin_panel/brgy_info.php'
                </script>";
        }
    }
}

$conn->close();
?>
