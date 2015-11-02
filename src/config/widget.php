<?php

return [
    'calendar' => [
        'groups' => ['page', 'event'],
        'render' => '\App\Widget@calendar',
    ],
    
    'quote' => [
        'groups' => ['page'],
        'render' => '\App\Widget@quote',
    ]
];
