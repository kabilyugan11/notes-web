<?php
// Script to test connection to MongoDB server

// Load Composer's autoloader
require_once __DIR__ . '/vendor/autoload.php';

echo "MongoDB Connection Test\n";
echo "======================\n\n";

// Check if MongoDB extension is loaded
if (!extension_loaded('mongodb')) {
    echo "ERROR: MongoDB PHP extension is not installed!\n";
    exit(1);
}

echo "✓ MongoDB PHP extension is installed.\n";

// Load the configuration
try {
    $config = include(__DIR__ . '/api/config/db_config.php');
    echo "✓ Configuration loaded successfully.\n";
    echo "Connecting to: mongodb.selfmade.ninja:27017\n";
    
    // Create MongoDB client
    $client = new MongoDB\Client($config['dsn']);
    
    // Test connection by listing databases
    echo "Listing available databases...\n";
    $dbs = [];
    foreach ($client->listDatabases() as $db) {
        $dbs[] = $db->getName();
    }
    
    echo "✓ Connection successful!\n";
    echo "Available databases: " . implode(', ', $dbs) . "\n\n";
    
    // Test access to the specific database
    echo "Testing access to '{$config['dbname']}' database...\n";
    $database = $client->selectDatabase($config['dbname']);
    
    // List collections
    echo "Collections in database:\n";
    $collections = [];
    foreach ($database->listCollections() as $collection) {
        $collections[] = $collection->getName();
    }
    
    if (count($collections) > 0) {
        echo "✓ Found collections: " . implode(', ', $collections) . "\n";
    } else {
        echo "No collections found in database (this may be normal for a new database).\n";
    }
    
    echo "\nAll tests completed successfully!\n";
    exit(0);
    
} catch (Exception $e) {
    echo "\nERROR: " . $e->getMessage() . "\n";
    echo "Please check your MongoDB connection string and credentials.\n";
    exit(1);
}
