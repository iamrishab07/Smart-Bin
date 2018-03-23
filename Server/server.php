<?php

// Connecting to the database

$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "smartbin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Getting the data sent from the wifi module

$bin_id = $_GET['id'];
$content = $_GET['content'];

// Updating the information in the database

$sql = "UPDATE bin SET content = " . $content . ", last_updated= \"". date('Y-m-d H:i:s') ."\" WHERE id = " .$bin_id;


$result = $conn->query($sql);


?>