<?php


    $server="localhost";
    $username="root";
    $password="";
    $database="connect";
    



// Create connection
$conn = new mysqli($server, $username, $password, $database,"3307");
// $conn = new mysqli($server, $username, $password, $database);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>