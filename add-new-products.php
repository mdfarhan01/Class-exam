<?php

require_once 'config.php';
$error = '';

?>






<?php
// echo "<pre>";
// print_r($_POST);




if( $is_connect = true ){
    $name = !empty($_POST['name'] ) ? $_POST['name'] : '';
    $description = !empty($_POST['description'] ) ? $_POST['description'] : '';
    $price = !empty($_POST['price'] ) ? $_POST['price'] : '';
    $image =  $_FILES['image'];
    $created_at = !empty($_POST['created_at'] ) ? $_POST['created_at'] : '';

    // echo "<pre>";
    // print_r($image);
    // echo "</pre>";
    // echo die();

    if(!empty($image['name'])) {
        // Target directory to save uploaded images
        $targetDir        = "uploads/";

        // Get original file name and create full path
        $fileName         = basename($image["name"]);
        $targetFile       = $targetDir . $fileName;

        // Get file extension
        $imageFileType    = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if file is an actual image
        $check            = getimagesize($image["tmp_name"]);
        if ($check === false) {
            die("File is not an image.");
        }

        // Check file size (e.g. 5MB max)
        if ($image["size"] > 2 * 1024 * 1024) {
            die("File is too large.");
        }

        // Allow certain file formats
        $allowedTypes     = ['jpg' , 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowedTypes)) {
            die("Only JPG, JPEG, PNG & GIF files are allowed.");
        }

        // Move file to target directory
        if (move_uploaded_file($image["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars($fileName) . " has been uploaded.";
        } else {
            die("Sorry, there was an error uploading your file.");
        }
    } else {
        $targetFile       = null; // If no image is uploaded, set targetFile to null
    }

}else {
    die("Database connection failed.");
}



// require all field 
if(empty($name)) {
    $errors[]             = "Products Name is required.";
}
if(empty($description)) {
    $errors[]             = "Products Description is required.";
}
if(empty($price)) {
    $errors[]             = "Products Price is required.";
}
if(empty($created_at)) {
    $errors[]             = "Products Created At is required.";
}


// add all fiedl data into the database 


    
$is_connect = true;
  
    $sql = "INSERT INTO `products_table` (`name`, `description`, `price`, `image`, `created_at`) VALUES ('$name', '$description', '$price', '$targetFile', '$created_at');";
    
    if($connect->query($sql) == true){
        echo"New Student Added Successfully";
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }




?>




