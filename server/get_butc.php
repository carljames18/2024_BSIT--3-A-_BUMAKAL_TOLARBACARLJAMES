<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE campus = 'TABACO' LIMIT 4");

$stmt->execute();


$tabaco = $stmt->get_result();




?>