<?php
// Check if MongoDB extension is installed
if (extension_loaded('mongodb')) {
    echo "<h1>MongoDB Connection Test</h1>";
    
    try {
        require_once __DIR__ . '/vendor/autoload.php';
        
        // Get config from the config file
        $config = include(__DIR__ . '/api/config/db_config.php');
        echo "<p>Attempting to connect to: mongodb.selfmade.ninja:27017</p>";
        
        // Create MongoDB client with the specified DSN
        $client = new MongoDB\Client($config['dsn']);
        
        // List databases as a connection test
        $dbs = [];
        foreach ($client->listDatabases() as $db) {
            $dbs[] = $db->getName();
        }
        
        echo "<p style='color: green; font-weight: bold;'>✓ Successfully connected to MongoDB server.</p>";
        echo "<p>Available databases: " . implode(', ', $dbs) . "</p>";
        
        // Test connection to the specific database
        echo "<p>Testing connection to database: " . $config['dbname'] . "</p>";
        $db = $client->selectDatabase($config['dbname']);
        
        // List collections in the database
        echo "<p>Collections in database:</p>";
        echo "<ul>";
        foreach ($db->listCollections() as $collection) {
            echo "<li>" . $collection->getName() . "</li>";
        }
        echo "</ul>";
        
    } catch (Exception $e) {
        echo "<p style='color: red; font-weight: bold;'>✗ Error connecting to MongoDB: " . $e->getMessage() . "</p>";
        echo "<p>Please check your connection string and credentials.</p>";
    }
} else {
    echo "<p style='color: red; font-weight: bold;'>✗ MongoDB PHP extension is NOT installed.</p>";
    echo "<p>Please install the MongoDB PHP extension using:</p>";
    echo "<pre>sudo pecl install mongodb</pre>";
    echo "<p>Then add <code>extension=mongodb.so</code> to your php.ini file.</p>";
}

// Output additional PHP information for debugging
echo "<h2>PHP Info</h2>";
echo "<h3>Loaded Extensions</h3>";
echo "<pre>";
print_r(get_loaded_extensions());
echo "</pre>";
?>
