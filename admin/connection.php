<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'qrtmnkl1205');
define('DB_NAME', 'aca-pre-exam-2');

// Create connection
$dbConnection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection
if (!$dbConnection) {
    die("Connection failed: " . mysqli_connect_error());
}