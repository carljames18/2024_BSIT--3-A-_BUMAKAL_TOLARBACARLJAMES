<?php

include('../server/connection.php');
include('../server/logout.php');

// Check if the user is logged in and is an admin
if (!isset($_SESSION['logged_in']) || $_SESSION['user_control'] !== 'A') {
    header('location: ../login.php?message=You cannot be here');
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
                    class="fas fa-carrot me-2 me-2"></i><span>Corn</span>Hub</div>
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
        <h2 class="form-weight-bold">Account</h2>
        <hr class="mx-auto">
    </div>
    <div class="mx-auto container">
		<div class="mb-3 edit-small-element">


        <div class="account-info">
                <?php if (isset($_SESSION['user_control']) && $_SESSION['user_control'] === 'A') { ?>
                    <p>ID:<span><?php if (isset($_SESSION['user_id'])) { echo $_SESSION['user_id']; } ?></span></p>
                    <p>Name:<span><?php if (isset($_SESSION['user_name'])) { echo $_SESSION['user_name']; } ?></span></p>
                    <p>Contact:<span><?php if (isset($_SESSION['user_contact'])) { echo $_SESSION['user_contact']; } ?></span></p>
                <?php } ?>
            </div>
    
</div>
</section>

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