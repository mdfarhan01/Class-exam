
<?php 

require_once 'head.php';
require_once 'config.php';

?>


<?php 

  $is_connect = true;
  if (!$is_connect) {
      die("Connection failed: " . mysqli_connect_error());
  }

$id = $_GET['id']; // Get the student ID from the URL parameter
$sql = "SELECT * FROM `products_table` WHERE id = " . $_GET['id']; // Example student ID from URL parameter
$data =  $connect->query($sql);
$get_data = mysqli_fetch_all($data, MYSQLI_ASSOC);
$products = $get_data[0]; // Assuming you want to view the first book's details
  

//   echo "<pre>";
//   print_r($get_data);



?>

  <body class="d-flex flex-column h-100">
    

        
    <main role="main" class="flex-shrink-0 pt-4 pb-4">
        <div class="container">
            <h1>View Products Detail</h1>
            <p>ID: <?php echo $products['id'];?></p>
            <p>Name: <?php echo $products['name'];?></p>
            <p>Description: <?php echo $products['description'];?></p>
            <p>Price: <?php echo $products['price'];?></p>
            <p class="w">Image: <img src="<?php echo $products['image']; ?>"></p>
            <p>Created At: <?php echo $products['created_at'];?></p>
        </div>
        <div class="container">
            <a href="index.php"><button class="btn btn-primary">Back to Products List</button></a>
    </main>
      
 <?php require_once 'footer.php'; ?>

   <style>
        .w{
    width: 100px;
    height: 100px;
    overflow: hidden;
    display: inline-block;
    padding: 15px 0; 
}   
        img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>