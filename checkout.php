<?php 
session_start();

if (!empty($_SESSION['cart'])) {
    // Let the user proceed to checkout
} else {
    header('location: index.php');
}
?>

<?php include('layouts/header.php'); ?>

<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Checkout</h2>
        <hr class="checkout-hr mx-auto">
    </div>
    <div class="mx-auto container">
        
        <form id="checkout-form" method="POST" action="payment.php">
            <p class="text-center" style="color: orange;"> 
              <?php if(isset($_GET['message'])) { echo $_GET['message']; } ?>
              <?php if(isset($_GET['message'])) { ?>
                   <a href="login.php" class="btn btn-primary">Login</a>
                <?php } ?>
            </p>
            <div class="form-group checkout-small-element">
                <label>Full Name</label>
                <input type="text" class="form-control" id="checkout-fullname" name="name" placeholder="Enter Your Full Name" required/>
            </div>

            <div class="form-group checkout-small-element">
                <label>BU Email</label>
                <input type="text" class="form-control" id="checkout-email" name="email" placeholder="Enter Your BU Email" required/>
            </div>

            <div class="form-group checkout-small-element">
                <label>Phone Number</label>
                <input type="text" class="form-control" id="checkout-phone-number" name="phone" placeholder="Enter Your Active Phone Number" required/>
            </div>

            <div class="form-group checkout-small-element">
                <label>Campus</label>
                <input type="text" class="form-control" id="checkout-campus" name="campus" placeholder="Ex: BUP" required/>
            </div>

            <div class="form-group checkout-small-element">
                <label>Course</label>
                <input type="text" class="form-control" id="checkout-course" name="course" placeholder="Enter your Course" required/>
            </div>

            <div class="form-group checkout-small-element">
                <label>City / Municipality</label>
                <input type="text" class="form-control" id="checkout-city" name="city" placeholder="Enter Your City / Municipality" required/>
            </div>

            <div class="form-group checkout-large-element">
                <label>Address</label>
                <input type="text" class="form-control" id="checkout-address" name="address" placeholder="Enter Your Full Address" required/>
            </div>

            <div class="form-group checkout-small-element">
                <label>Payment Method</label><br>
                <input type="radio" id="cod" name="payment_method" value="cod" required>
                <label for="cod">Cash on Delivery</label><br>
                <input type="radio" id="gcash" name="payment_method" value="gcash" required>
                <label for="gcash">GCash</label>
            </div>

            <!-- Additional fields for GCash payment -->
            <div id="gcash-fields" style="display: none;">
            <p>G-CASH ACCT NAME: BUMAKAL NA KAMO</p>
            <p>ACCOUNT NUMBER: 09282040817</p>
                <div class="form-group">
                    <label>Account Name</label>
                    <input type="text" class="form-control" id="account-name" name="account_name" placeholder="Enter Your GCash Account Name" required>
                </div>
                <div class="form-group">
                    <label>Account Number</label>
                    <input type="text" class="form-control" id="account-number" name="account_number" placeholder="Enter Your GCash Account Number" required>
                </div>
                <div class="form-group">
                    <label>Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount" required>
                </div>
                <div class="form-group">
                    <label>Reference Number</label>
                    <input type="text" class="form-control" id="reference-number" name="reference_number" placeholder="Enter Reference Number" required>
                </div>
            </div>
            
            <div class="form-group checkout-btn-container">
                <p>Total amount: Php <?php echo $_SESSION['total'] ?>.00</p>
                <input type="submit" class="btn" id="checkout-btn" name="place_order" value="Place Order"/>
            </div>
        </form>
    </div>
</section>

<?php include('layouts/footer.php'); ?>

<script>

document.getElementById('checkout-form').addEventListener('submit', function(event) {
    var paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
    if (paymentMethod === 'gcash') {
        var accountName = document.getElementById('account-name').value.trim();
        var accountNumber = document.getElementById('account-number').value.trim();
        var amount = document.getElementById('amount').value.trim();
        var referenceNumber = document.getElementById('reference-number').value.trim();
        
        if (!accountName || !accountNumber || !amount || !referenceNumber) {
            event.preventDefault();
            alert('Please fill in all required fields for GCash payment.');
        }
    }
});

document.querySelectorAll('input[name="payment_method"]').forEach(function(radio) {
    radio.addEventListener('change', function() {
        if (this.value === 'gcash') {
            document.getElementById('gcash-fields').style.display = 'block';
        } else {
            document.getElementById('gcash-fields').style.display = 'none';
        }
    });
});
</script>
