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
    'domain' => 'sandboxaad394cde96b46e9abac767e939bca26.mailgun.org',
    'secret' => 'key-9cgvl2nb32afdrg5wh0hwxok4m-lba12',
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
		'model'  => 'App\User',
		'secret' => '',
	],

  'rollbar' => array(
    'access_token' => getenv('SERVICE_ROLLBAR_TOKEN') ?: '3f0266077c8241d9a97a606bb5205d4e',
    'level' => 'error'
  ),

];
