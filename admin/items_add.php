<?php

include('../server/connection.php');
include('../server/logout.php');

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
        <h2 class="form-weight-bold">Add Item</h2>
        <hr class="mx-auto">
    </div>
    <div class="mx-auto container">
        <form id="edit-form" method="POST" action="create_item.php">
	
  <div class="mb-3 edit-small-element">
    <input type="hidden" name="product_id" value="<?php echo $products['product_id']  ?>">
    <label class="form-label">Product Name</label>
    <input type="text" class="form-control" id="check-name" value="" name="name" placeholder="Product name" required>
  </div>

	<div class="mb-3 edit-small-element">
    <label class="form-label">Category</label>
    <input type="text" class="form-control" id="check-cat" name="category" value="" placeholder="Category" required>
  </div>

  <div class="mb-3 edit-small-element">
    <label class="form-label">Description</label>
    <input type="text" class="form-control" id="reg-desc" name="description" value="" placeholder="Description" required>
  </div>

  <div class="mb-3 edit-large-element">
    <label class="form-label">Image</label>
    <input type="text" class="form-control" id="reg-img" name="image" value="" placeholder="Image" required>
  </div>

  <div class="mb-3 edit-large-element">
    <label class="form-label">Image2</label>
    <input type="text" class="form-control" id="reg-img" name="image2" value="" placeholder="Image2" required>
  </div>

  <div class="mb-3 edit-large-element">
    <label class="form-label">Image3</label>
    <input type="text" class="form-control" id="reg-img" name="image3" value="" placeholder="Image3" required>
  </div>

  <div class="mb-3 edit-large-element">
    <label class="form-label">Image4</label>
    <input type="text" class="form-control" id="reg-img" name="image4" value="" placeholder="Image4" required>
  </div>

  <div class="mb-3 edit-small-element">
    <label class="form-label">Price</label>
    <input type="text" class="form-control" id="reg-price" name="price" value="" placeholder="Price" required>
  </div>

  <div class="mb-3 edit-small-element">
    <label class="form-label">Special Offer</label>
    <input type="text" class="form-control" id="reg-status" name="product_special_offeer" value="" placeholder="Special Offer" required>
  </div>

  <div class="mb-3 edit-small-element">
    <label class="form-label">Color</label>
    <input type="text" class="form-control" id="reg-status" name="product_color" value="" placeholder="Color" required>
  </div>

  <div class="mb-3 edit-small-element">
    <label class="form-label">Campus</label>
    <input type="text" class="form-control" id="reg-status" name="campus" value="" placeholder="Campus" required>
  </div>
  
  <div class="mb-3 edit-small-element">
    <label class="form-label">Status</label>
    <input type="text" class="form-control" id="reg-status" name="status" value="" placeholder="Status" required>
  </div>
  
  <div class="form-group edit-btn-container">
  <input type="submit" class="btn" id="edit-btn" name="add_btn" value="Add">
      </div>  
    
    
    </form>
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