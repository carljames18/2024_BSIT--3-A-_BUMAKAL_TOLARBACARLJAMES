<?php 
session_start();

include("assets/connections.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname']; 
    $bu_email = $_POST['bu_email']; 
    $address = $_POST['address']; 
    $gender = $_POST['gender'];
    $cp_number = $_POST['cp_number'];
    $campus = $_POST['campus'];

    if(!empty($username) && !empty($password) && !is_numeric($username) && !empty($fullname) && !empty($bu_email) && !empty($address) && !empty($gender) && !empty($cp_number) && !empty($campus))  {

        // Check if username or email already exists
        $check_query = "SELECT * FROM users WHERE username='$username' OR `bu-email`='$bu_email'";
        $check_result = mysqli_query($con, $check_query);
        $check_count = mysqli_num_rows($check_result);

        if($check_count == 0) {
            // No duplicate found, proceed with insertion
            $query = "INSERT INTO users (username, password, fullname, `bu-email`, address, gender, cp_number, campus, role) VALUES ('$username','$password','$fullname', '$bu_email', '$address','$gender','$cp_number','$campus', 'C')";

            if(mysqli_query($con, $query)) {
                echo '<p style="font-family: Poppins; color: green;">Registration successful. Redirecting to login page...</p>';
                header("refresh:2;url=login.php");
                exit;
            } else {
                echo "Error: " . mysqli_error($con);
            }
        } else {
            echo "Username or email already exists. Please choose a different one.";
        }

    } else {
        echo "Please enter some valid information!";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<div class="container-signup">
    <div id="box">
        <form method="post">
            <div class="title">Signup</div>

            <!-- Input fields for username, password, fullname, bu_email, and address -->
            <input class="input-field" type="text" name="username" placeholder="Username"><br><br>
            <input class="input-field" type="password" name="password" placeholder="Password"><br><br>
            <input class="input-field" type="text" name="fullname" placeholder="Full Name"><br><br>
            <input class="input-field" type="email" name="bu_email" placeholder="BU Email"><br><br>
            <input class="input-field" type="text" name="address" placeholder="Address"><br><br>
            <input class="input-field" type="text" name="gender" placeholder="Gender"><br><br>
            <input class="input-field" type="text" name="cp_number" placeholder="Phone Number"><br><br>
            <input class="input-field" type="text" name="campus" placeholder="Campus"><br><br>

            <input class="submit-button" type="submit" value="Signup"><br><br>

            <a href="login.php">Login</a><br><br>
        </form>
    </div>
</div>

</body>
</html>
