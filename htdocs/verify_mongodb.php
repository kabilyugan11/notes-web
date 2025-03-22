<?php
// Script to verify MongoDB connection and configuration

// Load Composer's autoloader
require_once __DIR__ . '/vendor/autoload.php';

echo "<h1>MongoDB Verification</h1>";

// Check if MongoDB extension is installed
if (!extension_loaded('mongodb')) {
    echo "<p style='color: red;'>ERROR: MongoDB PHP extension is not installed!</p>";
    echo "<p>Please install the MongoDB PHP extension using:</p>";
    echo "<pre>sudo pecl install mongodb</pre>";
    echo "<p>Then add <code>extension=mongodb.so</code> to your php.ini file.</p>";
    exit;
} else {
    echo "<p style='color: green;'>MongoDB PHP extension is installed.</p>";
}

// Verify MongoDB client class exists
if (!class_exists('MongoDB\Client')) {
    echo "<p style='color: red;'>ERROR: MongoDB\Client class not found!</p>";
    echo "<p>Please install the MongoDB PHP library using Composer:</p>";
    echo "<pre>composer require mongodb/mongodb</pre>";
    exit;
} else {
    echo "<p style='color: green;'>MongoDB PHP library is installed correctly.</p>";
}

// Try to connect to MongoDB
try {
    $config = include(__DIR__ . '/api/config/db_config.php');
    echo "<p>Connecting to: mongodb.selfmade.ninja:27017</p>";
    
    // Create MongoDB client
    $client = new MongoDB\Client($config['dsn']);
    
    // Verify connection by listing databases
    $databaseNames = [];
    $cursor = $client->listDatabases();
    
    foreach ($cursor as $db) {
        $databaseNames[] = $db->getName();
    }
    
    echo "<p style='color: green;'>Successfully connected to MongoDB!</p>";
    echo "<p>Available databases: " . implode(", ", $databaseNames) . "</p>";
    
    // Check if our specific database exists
    if (in_array($config['dbname'], $databaseNames)) {
        echo "<p style='color: green;'>Database '{$config['dbname']}' exists.</p>";
    } else {
        echo "<p style='color: orange;'>Warning: Database '{$config['dbname']}' not found. It will be created when you first insert data.</p>";
    }
    
} catch (Exception $e) {
    echo "<p style='color: red;'>ERROR: Failed to connect to MongoDB!</p>";
    echo "<p>Error message: " . $e->getMessage() . "</p>";
    echo "<p>Please check your connection string and credentials in api/config/db_config.php</p>";
}
?>
