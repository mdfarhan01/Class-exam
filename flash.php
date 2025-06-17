<?php

require_once 'head.php';
require_once 'config.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id']; // Typecast to prevent SQL injection

    // Use prepared statement for better security
    $stmt = $connect->prepare("DELETE FROM `products_table` WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php?message=Product+deleted+successfully");
        exit;
    } else {
        echo "Error deleting product: " . $connect->error;
    }

    $stmt->close();
} else {
    echo "Invalid ID.";
}

?>
