<?php
$host = "localhost";
$username = "root";
$password = "Wikum@123";
$dbname = "gallery_cafe";

// Create connection
$database = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($database->connect_error) {
    die("Connection failed: " . $database->connect_error);
}
