<?php

return [
    'dsn' => 'mongodb://kabil:' . urlencode('hi@ky@...') . '@mongodb.selfmade.ninja:27017/kabil_notes_app',
    'dbname' => 'kabil_notes_app',
    'options' => [
        'retryWrites' => true,
        'w' => 'majority'
    ]
];
