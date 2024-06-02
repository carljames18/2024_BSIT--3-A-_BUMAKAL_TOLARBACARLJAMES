<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="assets/css/style.css"/>


</head>
<body>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-skyblue py-3 fixed-top">
        <div class="container">
          <img class="logo" src="assets/imgs/logoo.png"/>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="shop.html">Shop</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>


              <li class="nav-item">
                <a class="nav-link" href="cart.php">Cart</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="account.php">Account</a>
              </li>




            </ul>
          </div>
        </div>
      </nav>

      <!--Home-->
      <section id="home">
        <div class="container">
            <h5>NEW RELEASES!</h5>
            <h1><span>BU</span>MAKAL <span>NA KAMO!</span></h1>
            <p>Bicol University's Local Merch and Accessories Distributor</p>
            <button>Shop Now</button>
        </div>
      </section>

      <!--Campuses-->
      <section id="campus" class="container">
        <div class="row">
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/BUPC.png"/>
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/BUEAST.png"/>
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/BUWEST.png"/>
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/BUDARAGA.png"/>
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/BUGC.png"/>
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/BUGUBAT.png"/>
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/BUTC.png"/>
        </div>
      </section>

      <!--New-->
      <section id="new" class="w-100">
            <div class="row p-0 m-0">
            <!--One-->  
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/BUP_Lanyard2.png"/>
            <div class="details">
              <h2>BU Lanyards</h2>
              <button class="text-uppercase">Shop Now</button>
              </div>
            </div>
            <!--Two-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
              <img class="img-fluid" src="assets/imgs/BU_Label.jpg"/>
              <div class="details">
                <h2>BU Labels</h2>
                <button class="text-uppercase">Shop Now</button>
                </div>
              </div>

            <!--Three-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
              <img class="img-fluid" src="assets/imgs/Totebag1.jpg"/>
              <div class="details">
                <h2>BU Tote Bags</h2>
                <button class="text-uppercase">Shop Now</button>
                </div>
              </div>
            </div>
      </section>

      <!--Featured-->
      <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
          <h3>Featured Items</h3>
          <hr>
          <p>Checkout the latest products</p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php include('server/get_featured_products.php');  ?>

        <?php while($row= $featured_products->fetch_assoc()){ ?>

          <div class ="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" />
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price">Php <?php echo $row['product_price']; ?> </h4>
            <a href="<?php echo "select_item.php?product_id=".$row['product_id'];?>"> <button class="buy-btn">Buy Now</button> </a>
          </div>

          <?php } ?>
        </div>
      </section>

      <!--Banner-->
      <section id="banner" class="my-5 py-5">
        <div class="container">
          <h4>SUMMER RELEASE</h4>
          <h1>SUMMER COLLECTION <br> THE FRESHEST RELEASE YET!</h1>
          <button class="text-uppercase">Shop Now</button>
        </div>

      </section>

      <!--Merch-->
      <section id="merch" class="my-5">
        <div class="container text-center mt-5 py-5">
          <h3>Merch</h3>
          <hr>
          <p>Checkout the latest merch releases.</p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php include('server/get_merch.php'); ?>

        <?php while($row = $merch_products->fetch_assoc()) { ?>
    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" />
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
        <h4 class="p-price">Php <?php echo $row['product_price']; ?></h4>
        <a href="select_item.php"> <button class="buy-btn">Buy Now</button> </a>
    </div>
          <?php } ?>



        </div>
      </section>

      <!--Accessories-->
      <section id="accessories" class="my-5 py-3" >
        <div class="container text-center mt-5 py-5">
          <h3>Accessories</h3>
          <hr>
          <p>Checkout the latest University Accessories.</p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php include('server/get_accessories.php'); ?>

        <?php while($row = $accessories_products->fetch_assoc()) { ?>
          <div class ="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" />
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price">Php <?php echo $row['product_price']; ?> </h4>
            <a href="select_item.php"> <button class="buy-btn">Buy Now</button> </a>
          </div>

          <?php } ?>
          
        </div>
      </section>

      <!--Footer-->
      <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <img class="logo" src="assets/imgs/logoo.png"/>
                <p class="pt-3">We provide the best product for the most affordable prices</p>
            </div>
    
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Featured</h5>
                <ul class="text-uppercase">
                    <li><a href="#">Shirts</a></li>
                    <li><a href="#">Lanyards</a></li>
                    <li><a href="#">Totebags</a></li>
                    <li><a href="#">Stickers</a></li>
                    <li><a href="#">New Release</a></li>
                </ul>
            </div>
    
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Contact Us</h5>
                <div>
                    <h6 class="text-uppercase">Address:</h6>
                    <p>Rizal Street, Legazpi City, Albay, Legazpi, Philippines</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Contact Number:</h6>
                    <p>090909090909 / 09324142342</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Email Address:</h6>
                    <p>admin@bicol-u.edu.ph</p>
                </div>
            </div>
    
            <div class="footer-one col-lg-3 col-md-6 col-sm-12 ">
                <h5 class="pb-2">Instagram</h5>
                <div class="row">
                    <img src="assets/imgs/footer1.jpeg" class="img-fluid w-25 h-100 m-2"/>
                    <img src="assets/imgs/footer1.jpeg" class="img-fluid w-25 h-100 m-2"/>
                    <img src="assets/imgs/footer1.jpeg" class="img-fluid w-25 h-100 m-2"/>
                    <img src="assets/imgs/footer1.jpeg" class="img-fluid w-25 h-100 m-2"/>
                    <img src="assets/imgs/footer1.jpeg" class="img-fluid w-25 h-100 m-2"/>
                </div>
            </div>
        </div>
    
        <div class="copyright mt-5">
            <div class="row container mx-auto">
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                    <img src="assets/imgs/payment.png"/>
                    <img src="assets/imgs/Gcash.png"/>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mb-2">
                    <p>BUMAKAL@2024 All Right Reserved</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4"> 
                    <a href="#"><i class="fab fa-facebook"></i> </a>
                    <a href="#"><i class="fab fa-instagram"></i> </a>
                    <a href="#"><i class="fab fa-x"></i> </a>
                </div>
            </div>
        </div>
      </footer>
    

  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>