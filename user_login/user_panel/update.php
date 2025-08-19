<?php
require("../../database/conn_db.php");

if (isset($_POST['save_Changes'])) {
    $user_id = $_POST['user_id'];

    // Sanitize text inputs
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $contact_no = mysqli_real_escape_string($conn, $_POST['contact_no']);
    $house_no = mysqli_real_escape_string($conn, $_POST['house_no']);
    $sitio_pook = mysqli_real_escape_string($conn, $_POST['sitio_pook']);

    // Handle image uploads
    $profileImage = handleImageUpload($_FILES['image_profile'], '../../asset/image/user_profile/');
    $documentImage = handleImageUpload($_FILES['image_document'], '../../asset/image/user_profile/');

    if ($profileImage === false || $documentImage === false) {
        exit(); // Upload error already handled
    }

    // Start SQL update
    $sql = "UPDATE user_account SET 
        firstname = '$firstname',
        middlename = '$middlename',
        lastname = '$lastname',
        age = '$age',
        birthday = '$birthday',
        gender = '$gender',
        contact_no = '$contact_no',
        house_no = '$house_no',
        sitio_pook = '$sitio_pook'";

    // ✅ Only update profile image if a new one is uploaded
    if ($profileImage !== '') {
        $sql .= ", profile = '$profileImage'";
    }

    // ✅ Only update supporting document if a new one is uploaded
    if ($documentImage !== '') {
        $sql .= ", support_doc = '$documentImage'";
    }

    $sql .= " WHERE user_id = $user_id";

    if (mysqli_query($conn, $sql)) {
        echo "<script> window.location.href='loading.php';</script>";
    } else {
        echo "<script>alert('Database error: " . mysqli_error($conn) . "'); window.location.href='loading.php';</script>";
    }

    mysqli_close($conn);
}

// Function to handle image uploads
function handleImageUpload($file, $targetDir) {
    $validExtensions = ['jpg', 'jpeg', 'png'];
    $maxSize = 1000000; // 1MB

    if ($file['error'] === 4) return ''; // ✅ Return empty string if no file uploaded

    $fileName = $file['name'];
    $fileTmp = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (!in_array($fileExt, $validExtensions)) {
        echo "<script>alert('Invalid file type: $fileName'); window.location.href='loading.php';</script>";
        return false;
    }

    if ($fileSize > $maxSize) {
        echo "<script>alert('File too large: $fileName'); window.location.href='loading.php';</script>";
        return false;
    }

    $newFileName = uniqid() . '.' . $fileExt;
    $uploadPath = $targetDir . $newFileName;

    if (!move_uploaded_file($fileTmp, $uploadPath)) {
        echo "<script>alert('Failed to upload file: $fileName'); window.location.href='loading.php';</script>";
        return false;
    }

    return $newFileName;
}
?>
