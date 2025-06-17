
<?php 

require_once 'head.php';

?>
  <body class="d-flex flex-column h-100">    
<main role="main" class="flex-shrink-0 pt-4 pb-4">
  <div class="container pt-5">
    <h1>Create New Products</h1>
    <form action="add-new-products.php" method="POST" enctype="multipart/form-data" class="pt-3">
      <div class="form-group">
        <label for="name">Name</label>
      </div>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
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