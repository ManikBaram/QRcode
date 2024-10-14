<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = ""; // Empty string for password (default for XAMPP)
$dbName = "project";

// Create connection
$db = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>
