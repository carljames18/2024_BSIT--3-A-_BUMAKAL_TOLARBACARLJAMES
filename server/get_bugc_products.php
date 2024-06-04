<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE campus = 'GUINOBATAN' LIMIT 4");

$stmt->execute();


$guinobatan = $stmt->get_result();




?>