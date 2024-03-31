<?php 

session_start();

include("assets/connections.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password) && !is_numeric($username)) {
        // Read from database
        $query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($con, $query);

        if($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            
            // Verify password
            if($user_data['password'] === $password) {
                $_SESSION['user_id'] = $user_data['user_id'];
                
                // Check user role
                if($user_data['role'] === 'A') {
                    // If user role is 'A', direct the user to admin.php
                    header("Location: admin.php");
                    die;
                } elseif($user_data['role'] === 'C') {
                    // If user role is 'C', direct the user to shop.php
                    header("Location: shop.php");
                    die;
                } else {
                    // Handle other roles or redirect to a default page
                    // For example, redirect to shop.php for unknown roles
                    header("Location: shop.php");
                    die;
                }
            }
        }
        
        echo "Invalid username or password!";
    } else {
        echo "Invalid username or password!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="container-login">
        <div id="box">
            <form method="post">
                <div class="title">Login</div>

                <input class="input-field" type="text" name="username"><br><br>
                <input class="input-field" type="password" name="password"><br><br>

                <input class="submit-button" type="submit" value="Login"><br><br>

                <a href="register.php">Signup</a><br><br>
            </form>
        </div>
    </div>

</body>
</html>


