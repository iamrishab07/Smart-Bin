<?php

$bin_id = $_GET['id'];

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


// Updating the information in the database

$sql = "UPDATE bin SET content = 0.0, last_updated= \"". date('Y-m-d H:i:s') ."\", last_cleaned= \"". date('Y-m-d') ."\" WHERE id = " .$bin_id;

$result = $conn->query($sql) or die("Error while cleaning");

session_start();
$_SESSION['clean_id'] = $bin_id;


header('Location: index.php');
exit();

?>