<?php
// Bootstrap file for the API

// Load the Composer autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// Load the Database class
require_once __DIR__ . '/classes/Database.php';

// Initialize the database connection
$database = new Database();

// You can add more initialization code here as needed
