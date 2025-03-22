<?php
// This script returns a list of registered users from the mock database
// Only for development/testing purposes

// Output headers for JSON response
header('Content-Type: application/json');

// Define the path to user data
$dataDir = __DIR__ . '/data';
$usersFile = $dataDir . '/users.json';

// Check if the users file exists
if (!file_exists($usersFile)) {
    echo json_encode([
        'error' => 'No users found - database file does not exist'
    ]);
    exit;
}

// Read and parse the users file
$users = json_decode(file_get_contents($usersFile), true) ?: [];

// Remove sensitive information (passwords)
$safeUsers = [];
foreach ($users as $user) {
    // Create a copy without the password
    $safeUser = $user;
    unset($safeUser['password']);
    $safeUsers[] = $safeUser;
}

// Return the sanitized user list
echo json_encode($safeUsers);
?>
