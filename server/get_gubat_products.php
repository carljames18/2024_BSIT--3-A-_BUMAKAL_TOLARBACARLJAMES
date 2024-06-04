<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE campus = 'GUBAT' LIMIT 4");

$stmt->execute();


$gubat = $stmt->get_result();




?>