
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
$data = $connect->query($sql);
$get_data = mysqli_fetch_all($data, MYSQLI_ASSOC);
$products = $get_data[0]; // Assuming you want to edit the first student's details

  
//   echo "<pre>";
//   print_r($get_data);

?>

  <body class="d-flex flex-column h-100">     
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <h1>Edit Prodcuts</h1>
            <form action="add-new-products.php" method="POST" enctype="multipart/form-data" class="pt-3">
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $products['name']; ?>" placeholder="Enter name" required>
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Enter price" required>
            </div>
            
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>
            
            <div class="form-group">
                <label for="created_at">Created At</label>
                <input type="date" class="form-control" id="created_at" name="created_at" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Add New Product</button>
            </form>
        </div>
    </main>
      
 <?php require_once 'footer.php'; ?>
   


    <style>
        .w{
    width: 100px;
    height: 100px;
}   
        img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>