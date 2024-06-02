<?php

session_start();

if(isset($_POST['add_to_cart'])){
        
    //if user has already added to cart
    if(isset($_SESSION['cart'])){

        $products_array_ids = array_column($_SESSION['cart'],"product_id"); //return all the id of the added products
        
        //if product has already been added to cart or not
        if( !in_array($_POST['product_id'], $products_array_ids)){

            $product_id = $_POST['product_id'];

                    $product_array = array(
                                            'product_id' => $_POST['product_id'],
                                            'product_name' => $_POST['product_name'],
                                            'product_price' => $_POST['product_price'],
                                            'product_image' => $_POST['product_image'],
                                            'product_quantity' => $_POST['product_quantity']
                    );
            
                    $_SESSION['cart'][$product_id] = $product_array;

        //product has already been added
        }else{

            echo '<script>alert("Product was already added to cart")</script>';
            
        }

        //if this is the first product.
    }else{

        $product_id = $_POST['product_id'];
        $product_name =$_POST['product_name'];
        $product_price =$_POST['product_price'];
        $product_image =$_POST['product_image'];
        $product_quantity =$_POST['product_quantity'];

        $product_array = array(
                                'product_id' => $product_id,
                                'product_name' => $product_name,
                                'product_price' => $product_price,
                                'product_image' => $product_image,
                                'product_quantity' => $product_quantity
        );

        $_SESSION['cart'][$product_id] = $product_array;
        // []
    }
 
//calculate total
calculateTotalCart();


//remove product from cart
}elseif(isset($_POST['remove_product'])){
    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);

    //calculate total
    calculateTotalCart();


}else if(isset($_POST['edit_quantity'])){

    //get id and quantity from the form
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];

    //get the product array from the session
    $product_array = $_SESSION['cart'][$product_id];
    //update product quantity
    $product_array['product_quantity'] = $product_quantity;
    //return array back to its place
    $_SESSION['cart'][$product_id] = $product_array;


    //calculate total
    calculateTotalCart();

}else{
   // header('location: index.php');

}


function calculateTotalCart(){

    $total = 0;
    foreach($_SESSION['cart'] as $key => $value){

        $product = $_SESSION['cart'][$key];

        $price = $product['product_price'];
        $quantity = $product['product_quantity'];

        $total = $total + ($price * $quantity);
    }

    $_SESSION['total'] = $total;
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
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
                <a class="nav-link" href="account.html">Account</a>
              </li>




            </ul>
          </div>
        </div>
      </nav>

    <!--Cart-->
    <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bolde">Your Cart</h2>
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>

            <?php if(isset($_SESSION['cart'])) { ?>


            <?php foreach($_SESSION['cart'] as $key => $value) {?>


            <tr>
                <td>
                <div class="product-info">
                    <img src="assets/imgs/<?php echo $value['product_image']?>"/>
                    <div>
                        <p><?php echo $value['product_name']?></p>
                        <small><span>P</span><?php echo $value['product_price']?></small>
                        <br>
                        <form method="POST" action="cart.php">
                            <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>" />
                            <input type="submit" name="remove_product" class="remove-btn" value="remove" />
                        </form>
                        
                    </div> 
                </div> 
            </td>
            
            <td>
                
                <form method="POST" action="cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>"/>
                    <input type="number" name="product_quantity" value="<?php echo $value['product_quantity']?>" />
                    <input type="submit" class="edit-btn" value="edit" name="edit_quantity"/>

                </form>
                
            </td>
            
            <td>
                <span>P</span>
                <span class="product-price"><?php echo $value['product_quantity'] * $value['product_price']; ?>.00</span>
            </td>
            </tr>
            <?php } ?>

            <?php }?>

        </table>


            <div class="cart-total">
                <table>
                   <!--<tr>
                        <td>Subtotal</td>
                        <td>P123</td>
                    </tr>--->
                    <tr>
                        <td>Total Amount</td>

                        <?php if(isset($_SESSION['total'])) { ?>
                        <td>P <?php echo $_SESSION['total']; ?>.00</td>
                        <?php }?>

                    </tr>
                </table>
            </div>
        <div class="checkout-container">
            <form method="POST" action="checkout.php">
            <input type="submit" class="btn checkout-btn" value="Checkout" name="checkout"/>
            </form>
           
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