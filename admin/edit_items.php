<?php

include('../server/connection.php');

// Initialize an empty array to hold product details
$products = [];

// Check if product_id is provided in the URL parameters
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    
    // Fetch product information based on product_id
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id=?");
    $stmt->bind_param('i', $product_id);
    $stmt->execute();
    $products = $stmt->get_result()->fetch_assoc();
} else if (isset($_POST['edit_btn'])) {

    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $product_image = $_POST['image'];
    $product_image2 = $_POST['image2'];
    $product_image3 = $_POST['image3'];
    $product_image4 = $_POST['image4'];
    $price = $_POST['price'];
    $product_color = $_POST['color'];
    $campus = $_POST['campus'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE products SET product_name=?, product_category=?, product_description=?, 
                           product_image=?, product_image2=?, product_image3=?, product_image4=?, product_price=?, product_color=?, campus=?, product_status=? WHERE product_id=?");
    $stmt->bind_param('sssssssssssi', $name, $category, $description, $product_image, $product_image2, $product_image3, $product_image4, $price, $product_color, $campus, $status, $product_id);

    if ($stmt->execute()) {
        header('location: items.php?message=Item Has Been Updated');
    } else {
        header('location: items.php?error=Error Occurred');
    }
    exit;

} else {
    header('location: items.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin BUMAKAL Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="../styleee.css">
</head>
<body>

<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                class="fas fa-carrot me-2 me-2"></i><span>BU</span>MAKAL</div>
        <div class="list-group list-group-flush my-3">
            <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                    class="fas fa-project-diagram me-2"></i>Dashboard</a>
            <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    class="fas fa-shopping-cart me-2"></i>Orders</a>
            <a href="items.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    class="fas fa-solid fa-tshirt me-2"></i>Items</a>
            <a href="items_add.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    class="fas fa-cog me-2"></i>Create Items</a>
            <a href="account.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    class="fas fa-user-cog me-2"></i>Account</a>
            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    class="fas fa-wrench me-2"></i>Help</a>
            <a href="../server/logout.php?logout=1" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                    class="fas fa-power-off me-2"></i>Logout</a>
        </div>
    </div>

    <!-- Content Home -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                <h2 class="fs-2 m-0">Dashboard</h2>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>

        <section class="my-5 py-5">
            <div class="container text-center mt-3 pt-5">
                <h2 class="form-weight-bold">Edit Products</h2>
                <hr class="mx-auto">
            </div>
            <div class="mx-auto container text-center">
            <form id="edit-form" method="POST" action="edit_items.php">
                <div class="mb-3 edit-small-element">
                    <input type="hidden" name="product_id" value="<?php echo $products['product_id'] ?>">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="check-name" value="<?php echo $products['product_name'] ?>" name="name" placeholder="Product name" required>
                </div>

                <div class="mb-3 edit-small-element">
                    <label class="form-label">Category</label>
                    <input type="text" class="form-control" id="check-cat" name="category" value="<?php echo $products['product_category'] ?>" placeholder="Category" required>
                </div>

                <div class="mb-3 edit-small-element">
                    <label class="form-label">Description</label>
                    <input type="text" class="form-control" id="reg-desc" name="description" value="<?php echo $products['product_description'] ?>" placeholder="Description" required>
                </div>

                <div class="mb-3 edit-large-element">
                    <label class="form-label">Image</label>
                    <input type="text" class="form-control" id="reg-img" name="image" value="<?php echo $products['product_image'] ?>" placeholder="Image" required>
                </div>

                <div class="mb-3 edit-large-element">
                    <label class="form-label">Image2</label>
                    <input type="text" class="form-control" id="reg-img" name="image2" value="<?php echo $products['product_image2'] ?>" placeholder="Image2" required>
                </div>

                <div class="mb-3 edit-large-element">
                    <label class="form-label">Image3</label>
                    <input type="text" class="form-control" id="reg-img" name="image3" value="<?php echo $products['product_image3'] ?>" placeholder="Image3" required>
                </div>

                <div class="mb-3 edit-large-element">
                    <label class="form-label">Image4</label>
                    <input type="text" class="form-control" id="reg-img" name="image4" value="<?php echo $products['product_image4'] ?>" placeholder="Image4" required>
                </div>

                <div class="mb-3 edit-small-element">
                    <label class="form-label">Price</label>
                    <input type="text" class="form-control" id="reg-img" name="price" value="<?php echo $products['product_price'] ?>" placeholder="Price" required>
                </div>

                <div class="mb-3 edit-small-element">
                    <label class="form-label">Special Offer</label>
                    <input type="text" class="form-control" id="reg-img" name="special_offer" value="<?php echo $products['product_special_offer'] ?>" placeholder="Special Offer" required>
                </div>

                <div class="mb-3 edit-small-element">
                    <label class="form-label">Color</label>
                    <input type="text" class="form-control" id="reg-img" name="color" value="<?php echo $products['product_color'] ?>" placeholder="Color" required>
                </div>

                <div class="mb-3 edit-small-element">
                    <label class="form-label">Campus</label>
                    <input type="text" class="form-control" id="reg-img" name="campus" value="<?php echo $products['campus'] ?>" placeholder="Campus" required>
                </div>
                
                <div class="mb-3 edit-small-element">
                    <label class="form-label">Status</label>
                    <input type="text" class="form-control" id="reg-img" name="status" value="<?php echo $products['product_status'] ?>" placeholder="Status" required>
                </div>
                    <div class="form-group edit-btn-container">
                        <input type="submit" class="btn" id="edit-btn" name="edit_btn" value="Edit">
                    </div>  
                </form>
            </div>
        </section>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function () {
        el.classList.toggle("toggled");
    };
</script>

</body>
</html>
