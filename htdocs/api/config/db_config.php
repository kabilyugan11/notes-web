<?php
return [
    'dsn' => 'mongodb://kabil:hi%40ky%40...@mongodb.selfmade.ninja:27017',
    'dbname' => 'notes_app', // Adjust if your database name is different
    'options' => [
        'retryWrites' => true,
        'w' => 'majority'
    ]
];
?>