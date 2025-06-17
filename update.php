<?php 
require_once 'head.php';
require_once 'config.php';

$id = $_POST['id'] ?? '';

// Validation for ID
if (empty($id) || !is_numeric($id)) {
    die("Invalid product ID.");
}

$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';
$price = $_POST['price'] ?? '';
$created_at = $_POST['created_at'] ?? '';
$image = $_FILES['image'] ?? null;

// Basic validation
$errors = [];
if (empty($name)) $errors[] = "Product name is required.";
if (empty($description)) $errors[] = "Product description is required.";
if (empty($price)) $errors[] = "Product price is required.";
if (empty($created_at)) $errors[] = "Product creation date is required.";

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
    exit;
}

// File upload handling
$targetFile = null;
if (!empty($image['name'])) {
    $targetDir = "uploads/";
    $fileName = basename($image["name"]);
    $targetFile = $targetDir . $fileName;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($image["tmp_name"]);
    if ($check === false) {
        die("File is not a valid image.");
    }

    if ($image["size"] > 2 * 1024 * 1024) {
        die("File is too large. Max size is 2MB.");
    }

    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowedTypes)) {
        die("Only JPG, JPEG, PNG & GIF formats are allowed.");
    }

    if (!move_uploaded_file($image["tmp_name"], $targetFile)) {
        die("There was an error uploading the file.");
    }
}

// Now update the database
if ($targetFile) {
    $sql = "UPDATE `products_table` SET 
                `name` = '$name', 
                `description` = '$description', 
                `price` = '$price', 
                `image` = '$targetFile', 
                `created_at` = '$created_at' 
            WHERE `id` = $id";
} else {
    $sql = "UPDATE `products_table` SET 
                `name` = '$name', 
                `description` = '$description', 
                `price` = '$price', 
                `created_at` = '$created_at' 
            WHERE `id` = $id";
}

if ($connect->query($sql) === TRUE) {
    header("Location: index.php");
    exit;
} else {
    echo "Error updating product: " . $connect->error;
}
?>
