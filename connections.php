<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "bu_makal";

$con = mysqli_connect($serverName, $userName, $password, $dbName);

if(mysqli_connect_errno()){
    echo "failed to connect!";
    exit();
}
echo " ";
?>