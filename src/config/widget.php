<?php

return [
    'calendar' => [
        'groups' => ['page', 'date'],
        'render' => '\App\Widget@calendar',
    ],
    
    'quote' => [
        'groups' => ['page'],
        'render' => '\App\Widget@quote',
    ]
];
