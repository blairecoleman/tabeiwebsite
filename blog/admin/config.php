<?php

// connect to database
$conn = new mysqli("localhost", "root", "password","tabeiBlog");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// define global constants
//define('ROOT_PATH', realpath(dirname(__FILE__)));
//define('BASE_URL', '/usr/local/mysql-8.0.18-macos10.14-x86_64/tabeiBlog');
