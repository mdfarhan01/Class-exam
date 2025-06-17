<?php
require_once 'head.php';
require_once 'config.php';

// Validate and sanitize the ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid product ID.");
}

$id = (int)$_GET['id'];

// Use prepared statement for secure DB access
$stmt = $connect->prepare("SELECT * FROM `products_table` WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$products = $result->fetch_assoc();

if (!$products) {
    die("Product not found.");
}
?>

<body class="d-flex flex-column h-100">
    <main role="main" class="flex-shrink-0 pt-4 pb-4">
        <div class="container">
            <h1>View Product Detail</h1>

            <!-- Display product details -->
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($products['name']); ?></h5>
                    <p class="card-text"><strong>Description:</strong> <?php echo htmlspecialchars($products['description']); ?></p>
                    <p class="card-text"><strong>Price:</strong> $<?php echo htmlspecialchars($products['price']); ?></p>
                    <p class="card-text"><strong>Created At:</strong> <?php echo htmlspecialchars($products['created_at']); ?></p>

                    <?php if (!empty($products['image'])): ?>
                        <img src="<?php echo htmlspecialchars($products['image']); ?>" alt="Product Image" style="max-width: 200px;" class="img-fluid mt-2">
                    <?php endif; ?>

                    <!-- Hidden ID input (if needed for other actions) -->
                    <input type="hidden" name="id" value="<?php echo $products['id']; ?>">

                    <!-- Delete button -->
                    <a href="flash.php?id=<?php echo $products['id']; ?>" onclick="return confirm('Are you sure you want to delete this product?');">
                        <button class="btn btn-outline-danger btn-sm mt-3">Delete</button>
                    </a>
                </div>
            </div>

            <!-- Back to product list -->
            <a href="index.php"><button class="btn btn-primary mt-4">Back to Products List</button></a>
        </div>
    </main>

<?php require_once 'footer.php'; ?>
