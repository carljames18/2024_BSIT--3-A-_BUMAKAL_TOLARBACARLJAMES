<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE campus = 'EAST' LIMIT 4");

$stmt->execute();


$east = $stmt->get_result();




?>