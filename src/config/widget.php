<?php

return [
	'calendar' => [
		'parents' => ['page', 'event'],
		'class' => '\App\Widget',
		'method' => 'calendar'
	],
	
	'quote' => [
		'parents' => ['page'],
		'class' => '\App\Widget',
		'method' => 'quote'
	]
];