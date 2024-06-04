<?php

include('../server/connection.php');

// Initialize an empty array to hold order details
$order = [];
$customer_name = "";

// Check if order_id is provided in the URL parameters
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    
    // Fetch order information based on order_id
    $stmt = $conn->prepare("SELECT * FROM orders WHERE order_id=?");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $order = $stmt->get_result()->fetch_assoc();
    
    if ($order) {
        $user_id = $order['user_id']; // Assuming 'user_id' is a column in the 'orders' table

        // Fetch customer name based on user_id
        $stmt = $conn->prepare("SELECT user_name FROM users WHERE user_id=?");
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $customer = $stmt->get_result()->fetch_assoc();
        $customer_name = $customer['user_name'];
    }
} else if (isset($_POST['edit_btn'])) {

    $order_id = $_POST['order_id'];
    $order_date = $_POST['order_date'];
    $order_cost = $_POST['order_cost'];
    $order_status = $_POST['order_status'];

    $stmt = $conn->prepare("UPDATE orders SET order_date=?, order_cost=?, order_status=? WHERE order_id=?");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    $stmt->bind_param('sssi', $order_date, $order_cost, $order_status, $order_id);

    if ($stmt->execute()) {
        header('location: index.php?message=Order Has Been Updated');
    } else {
        header('location: index.php?error=Error Occurred');
    }
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
            <a href="orders.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
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
                <h2 class="form-weight-bold">Edit Order</h2>
                <hr class="mx-auto">
            </div>
            <div class="mx-auto container text-center">
            <form id="edit-form" method="POST" action="edit_order.php">
                <div class="mb-3 edit-small-element">
                    <input type="hidden" name="order_id" value="<?php echo htmlspecialchars($order['order_id']); ?>">
                    <label class="form-label">Customer Name</label>
                    <input type="text" class="form-control" id="customer-name" value="<?php echo htmlspecialchars($customer_name); ?>" name="customer_name" placeholder="Customer name" required readonly>
                </div>

                <div class="mb-3 edit-small-element">
                    <label class="form-label">Delivery Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($order['user_address']); ?>" placeholder="Delivery Address" required>
                </div>

                <div class="mb-3 edit-small-element">
                    <label class="form-label">Order Date</label>
                    <?php
                        // Extracting only the date part from the datetime string
                        $order_date = date('Y-m-d', strtotime($order['order_date']));
                        ?>
                        <input type="date" class="form-control" id="order-date" name="order_date" value="<?php echo htmlspecialchars($order_date); ?>" placeholder="Order Date" required>

                </div>

                <div class="mb-3 edit-small-element">
                    <label class="form-label">Order Cost</label>
                    <input type="text" class="form-control" id="order-cost" name="order_cost" value="<?php echo htmlspecialchars($order['order_cost']); ?>" placeholder="Order Cost" required>
                </div>

                <div class="mb-3 edit-small-element">
                    <label class="form-label">Order Status</label>
                    <input type="text" class="form-control" id="order-status" name="order_status" value="<?php echo htmlspecialchars($order['order_status']); ?>" placeholder="Order Status" required>
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
