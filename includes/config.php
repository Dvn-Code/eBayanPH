<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$connection = mysqli_connect('localhost', 'root', '', 'hackathon', 3306);

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>