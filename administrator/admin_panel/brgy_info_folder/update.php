<?php
require("../../../database/conn_db.php");

if(isset($_POST['update'])){
    // Sanitize text inputs
    $brgy_name = mysqli_real_escape_string($conn, $_POST['brgy']);
    $municipal = mysqli_real_escape_string($conn, $_POST['municipal']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone_no = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    // Initialize variables for file names
    $logoName = null;
    $bgImageName = null;
    
    // Valid image extensions
    $validImageExtensions = ['jpg', 'jpeg', 'png'];
    $maxFileSize = 1000000; // 1MB

    // Handle logo upload
    if($_FILES["logo"]["error"] != 4) { // If logo file was uploaded
        $logoName = handleFileUpload($_FILES["logo"], $validImageExtensions, $maxFileSize, '../../../asset/image/logo/');
        if($logoName === false) {
            // Error handling already done in the function
            exit();
        }
    }

    // Handle background image upload
    if($_FILES["bg_image"]["error"] != 4) { // If bg image file was uploaded
        $bgImageName = handleFileUpload($_FILES["bg_image"], $validImageExtensions, $maxFileSize, '../../../asset/image/background/');
        if($bgImageName === false) {
            // Error handling already done in the function
            exit();
        }
    }

    // Build SQL query based on which files were uploaded
    $sql = "UPDATE barangay_information SET 
            barangay_name = '$brgy_name', 
            municipality = '$municipal', 
            address = '$address', 
            email = '$email', 
            phone_no = '$phone_no'";
    
    if($logoName !== null) {
        $sql .= ", logo = '$logoName'";
    }
    
    if($bgImageName !== null) {
        $sql .= ", barangay_image = '$bgImageName'";
    }
    
    $sql .= " WHERE id=1";

    if(mysqli_query($conn, $sql)) {
        include('loading.php');
    } else {
        echo "<script>alert('Error updating record: " . mysqli_error($conn) . "')</script>";
        echo "<script>window.location.href = '/BIS/administrator/admin_panel/brgy_info.php'</script>";
    }
    
    mysqli_close($conn);
}

/**
 * Handles file upload with validation
 * 
 * @param array $file The $_FILES array element
 * @param array $validExtensions Allowed file extensions
 * @param int $maxSize Maximum file size in bytes
 * @param string $uploadPath Directory to upload to
 * @return string|false Returns filename if successful, false on failure
 */
function handleFileUpload($file, $validExtensions, $maxSize, $uploadPath) {
    $fileName = $file["name"];
    $fileSize = $file["size"];
    $tmpName = $file["tmp_name"];
    
    $imageExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    
    if(!in_array($imageExtension, $validExtensions)) {
        echo "<script>alert('Invalid Image Extension')</script>";
        echo "<script>window.location.href = '/BIS/administrator/admin_panel/brgy_info.php'</script>";
        return false;
    }
    
    if($fileSize > $maxSize) {
        echo "<script>alert('Image Size Is too Large')</script>";
        echo "<script>window.location.href = '/BIS/administrator/admin_panel/brgy_info.php'</script>";
        return false;
    }
    
    $newImageName = uniqid() . '.' . $imageExtension;
    
    if(!move_uploaded_file($tmpName, $uploadPath . $newImageName)) {
        echo "<script>alert('Error uploading file')</script>";
        echo "<script>window.location.href = '/BIS/administrator/admin_panel/brgy_info.php'</script>";
        return false;
    }
    
    return $newImageName;
}
?>