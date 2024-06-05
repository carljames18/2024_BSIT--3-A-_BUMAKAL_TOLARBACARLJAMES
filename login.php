<?php
session_start();
include('server/connection.php');

// If user is already logged in, redirect based on their control status
if (isset($_SESSION['logged_in'])) {
    // Check user control if admin has logged in
    if ($_SESSION['user_control'] === 'A') {
        header('location: admin/index.php');
        exit;
    } else {
        header('location: account.php');
        exit;
    }
}

if (isset($_POST['login_btn'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // Include user_control in the SELECT query
    $stmt = $conn->prepare("SELECT user_id, user_name, username, user_password, user_control FROM users WHERE username = ? AND user_password = ? LIMIT 1");
    $stmt->bind_param('ss', $username, $password);

    if ($stmt->execute()) {
        $stmt->bind_result($user_id, $user_name, $username, $user_password, $user_control);
        $stmt->store_result();

        if ($stmt->num_rows() == 1) {
            $stmt->fetch();

            // Set session variables
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['username'] = $username;
            $_SESSION['user_control'] = $user_control; // Set user_control
            $_SESSION['logged_in'] = true;

            // Redirect based on user_control
            if ($user_control === 'A') {
                header('location: admin/index.php?login_success=logged in successfully');
            } else {
                header('location: account.php?login_success=logged in successfully');
            }
        } else {
            header('location: login.php?error=could not verify your account');
        }
    } else {
        // Error handling
        header('location: login.php?error=something went wrong');
    }
}
?>

<?php include('layouts/header.php'); ?>

<!--Login-->
<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Login</h2>
        <hr class="login-hr mx-auto">
    </div>
    <div class="mx-auto container">
        <form id="login-form" method="POST" action="login.php">
            <p style="color:orange" class="text-center"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" id="login-username" name="username" placeholder="Enter Your Username" required/>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="login-password" name="password" placeholder="Enter Your Password" required/>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" id="login-btn" name="login_btn" value="Login"/>
            </div>
            <div class="form-group">
                <a id="register-url" href="register.php" class="btn">Don't have an account? Register</a>
            </div>
        </form>
    </div>
</section>

<?php include('layouts/footer.php'); ?>

<!--Login-->
<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Login</h2>
        <hr class="login-hr mx-auto">
    </div>
    <div class="mx-auto container">
        <form id="login-form" method="POST" action="login.php">
            <p style="color:orange" class="text-center"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" id="login-username" name="username" placeholder="Enter Your Username" required/>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="login-password" name="password" placeholder="Enter Your Password" required/>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" id="login-btn" name="login_btn" value="Login"/>
            </div>
            <div class="form-group">
                <a id="register-url" href="register.php" class="btn">Don't have an account? Register</a>
            </div>
        </form>
    </div>
</section>

<?php include('layouts/footer.php'); ?>