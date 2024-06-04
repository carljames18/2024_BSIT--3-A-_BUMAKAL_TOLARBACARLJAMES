<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE campus = 'BUP' LIMIT 4");

$stmt->execute();


$polangui = $stmt->get_result();




?>