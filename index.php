
<?php 

require_once 'head.php';
require_once 'config.php';

?>

<?php 

  $is_connect = true;
  if (!$is_connect) {
      die("Connection failed: " . mysqli_connect_error());
  }
  $sql = "SELECT * FROM `products_table`";
  $data = $connect->query($sql);
  $get_data = mysqli_fetch_all($data,);
  

//   echo "<pre>";
//   print_r($get_data);



?>


  <body class="d-flex flex-column h-100">      
    <main role="main" class="flex-shrink-0 pt-4 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>List of Products</h1>
                </div>
                <div class="col-md-6 text-right">
                    <a href="create.php"><button class="btn btn-primary">Create New Product</button></a>
                </div>
            </div>
            <table class="table table-striped table-hover">

                    <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Thumbnail Image</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                    <?php foreach($data as $products) : ?> 
                <tbody>
                    <tr>
                    <th scope="row"><?php echo $products['id']; ?></th>
                    <td><?php echo $products['name']; ?></td>
                    <td><?php echo $products['price']; ?></td>
                    <td class="w"><img src="<?php echo $products['image']; ?>"></td>
                    <td>
                        <a href="view.php?id=<?php echo $products['id'];?>"><button class="btn btn-primary btn-sm">View</button></a>
                        <a href="edit.php?id=<?php echo $products['id'];?>"><button class="btn btn-outline-primary btn-sm">Edit</button></a>
                        <a href="delete.php?id=<?php echo $products['id'];?>"><button class="btn btn-outline-primary btn-sm">Delete</button></a>
                    </td>
                    </tr>
                </tbody>
              <?php endforeach; ?>
            </table>
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