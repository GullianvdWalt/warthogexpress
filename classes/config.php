<?php

// DB Properties
$username = "root";
$password = "password";
$database = "users_database";

// Connection
$db = new PDO('mysql:host=localhost;dbname=' . $database . ';charset=utf8', $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
