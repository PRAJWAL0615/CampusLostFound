<?php
$conn = new mysqli("127.0.0.1", "root", "Prajwal2006@", "campus_lost_found", 3306);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
?>