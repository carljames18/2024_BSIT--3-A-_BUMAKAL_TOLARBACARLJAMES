<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE campus = 'DARAGA' LIMIT 4");

$stmt->execute();


$daraga = $stmt->get_result();




?>