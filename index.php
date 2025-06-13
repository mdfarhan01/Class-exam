
<?php 

require_once 'head.php';

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
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Otto</td>
                    <td>
                        <a href="view.php"><button class="btn btn-primary btn-sm">View</button></a>
                        <a href="edit.php"><button class="btn btn-outline-primary btn-sm">Edit</button></a>
                        <button class="btn btn-sm">Delete</button>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
      
   



    <?php require_once 'footer.php'; ?>