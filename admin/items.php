<?php

include('../server/connection.php');
include('../server/logout.php');

// Fetch products for admin
$stmt = $conn->prepare("SELECT * FROM products");
if (!$stmt) {
    die("Error in prepared statement: " . $conn->error);
}
$stmt->execute();
$products = $stmt->get_result();

// Fetch total items
$stmtItems = $conn->prepare("SELECT COUNT(*) as totalItems FROM products");
if (!$stmtItems) {
    die("Error in prepared statement: " . $conn->error);
}
$stmtItems->execute();
$resultItems = $stmtItems->get_result();
$rowItems = $resultItems->fetch_assoc();
$totalItems = $rowItems['totalItems'];

// Get total number of deliveries
$stmtDeliveries = $conn->prepare("SELECT COUNT(*) as totalDeliveries FROM orders WHERE order_status = 'D'");
if (!$stmtDeliveries) {
    die("Error in prepared statement: " . $conn->error);
}
$stmtDeliveries->execute();
$resultDeliveries = $stmtDeliveries->get_result();
$rowDeliveries = $resultDeliveries->fetch_assoc();
$totalDeliveries = $rowDeliveries['totalDeliveries'];

// Get total sales
$stmtSales = $conn->prepare("SELECT SUM(order_cost) as totalSales FROM orders");
if (!$stmtSales) {
    die("Error in prepared statement: " . $conn->error);
}
$stmtSales->execute();
$resultSales = $stmtSales->get_result();
$rowSales = $resultSales->fetch_assoc();
$totalSales = $rowSales['totalSales'];

// Close statements and connection
$stmtItems->close();
$stmtDeliveries->close();
$stmtSales->close();
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUMAKAL Dashboard</title>
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

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $totalItems; ?></h3>
                                <p class="fs-5">Items</p>
                            </div>
                            <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">PHP <?php echo $totalSales; ?></h3>
                                <p class="fs-5">Sales</p>
                            </div>
                            <i class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $totalDeliveries; ?></h3>
                                <p class="fs-5">Delivered</p>
                            </div>
                            <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Products</h3>
                    
                    <?php if(isset($_GET['message'])){ ?>
                        <p class="text-center" style="color: green;"><?php echo $_GET['message']; ?></p>
                    <?php } ?>

                    <?php if(isset($_GET['error'])){ ?>
                        <p class="text-center" style="color: red;"><?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <?php if(isset($_GET['delete'])){ ?>
                        <p class="text-center" style="color: green;"><?php echo $_GET['delete']; ?></p>
                    <?php } ?>
                    <?php if(isset($_GET['failure'])){ ?>
                        <p class="text-center" style="color: red;"><?php echo $_GET['failure']; ?></p>
                    <?php } ?>

                    <div class="col">
                        <table class="table bg-white rounded shadow-sm table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">Product ID</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product Category</th>
                                    <th scope="col">Product Img</th>
                                    <th scope="col">Product Price</th>
                                    <th scope="col">Product Status(A-Active,O-No Stock,R-Removed)</th>
                                    <th scope="col">Product Description</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($row = $products->fetch_assoc()){ ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['product_id']; ?></th>
                                        <td><?php echo $row['product_name']; ?></td>
                                        <td><?php echo $row['product_category']; ?></td>
                                        <td><img src="../assets/imgs/<?php echo htmlspecialchars($row['product_image']); ?>" style="width: 70px; height: 70px;" alt="Product Image"/></td>
                                        <td><?php echo "PHP " . $row['product_price']; ?></td>
                                        <td><?php echo $row['product_status']; ?></td>
                                        <td><?php echo $row['product_description']; ?></td>
                                        <td><a href="edit_items.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-success">Edit</a></td>
                                        <td><a href="delete_product.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
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
