<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => '',
		'secret' => '',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'User',
		'secret' => '',
	],
	'facebook' => [
	    'client_id' => getenv('FB_ID'),
	    'client_secret' => getenv('FB_Secret'),
	    'redirect' => 'http://localhost/allofhome/public/blog',
	],
	'twitter' => [
		'client_id' => 'lNWoQ1Oo3ivZ85eS8YE3hoIRQ',
		'client_secret' => 'BhQvA3CR4oxCpt9tVSsVTP20iZajuBLidHpv9EK59d01ZXEMfQ',
		'owner_id' => '3092995340',
		'owner' => 'ThaiAllofhome'
	]
];
