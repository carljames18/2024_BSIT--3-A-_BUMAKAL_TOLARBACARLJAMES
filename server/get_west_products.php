<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE campus = 'WEST' LIMIT 4");

$stmt->execute();


$west = $stmt->get_result();




?>