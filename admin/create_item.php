<?php

include('../server/connection.php');

if(isset($_POST['add_btn'])){

    $name = $_POST['name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $product_image = $_POST['image'];
    $product_image2 = $_POST['image2'];
    $product_image3 = $_POST['image3'];
    $product_image4 = $_POST['image4'];
    $price = $_POST['price'];
    $product_color = $_POST['product_color'];
    $campus = $_POST['campus'];
    $status = $_POST['status'];

    //Creates Item
    $stmt = $conn->prepare("INSERT INTO products (product_name, product_category, product_description, product_image, product_image2, product_image3, product_image4, product_price, product_color, campus, product_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        // Handle prepare() error
        die('Error in preparing statement: ' . mysqli_error($conn));
    }

    $stmt->bind_param('sssssssssss', $name, $category, $description, $product_image, $product_image2, $product_image3, $product_image4, $price, $product_color, $campus, $status);


    if($stmt->execute()){
        header('location: items.php?message=Item has been Added');
    } else {
        header('location: items.php?error=Error Occurred');
    }

    $stmt->close();
    $conn->close();
}
?>

