<?php
require("/database/conn_db.php");

// Validate request
if (!isset($_POST['id']) || empty($_POST['id'])) {
    echo "Invalid request!";
    exit;
}

$id = intval($_POST['id']); // sanitize

// Prepared delete
$stmt = $conn->prepare("DELETE FROM barangay_blotter WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "Error deleting record: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
