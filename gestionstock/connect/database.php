<?php

$username = 'root';
$password = 'root';
$dbname = 'gestionstock';
$servername = 'localhost';

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>