<?php

// You can find the keys here : https://apps.twitter.com/

return [
	'debug'               => function_exists('env') ? env('APP_DEBUG', false) : false,

	'API_URL'             => 'api.twitter.com',
	'UPLOAD_URL'          => 'upload.twitter.com',
	'API_VERSION'         => '1.1',
	'AUTHENTICATE_URL'    => 'https://api.twitter.com/oauth/authenticate',
	'AUTHORIZE_URL'       => 'https://api.twitter.com/oauth/authorize',
	'ACCESS_TOKEN_URL'    => 'https://api.twitter.com/oauth/access_token',
	'REQUEST_TOKEN_URL'   => 'https://api.twitter.com/oauth/request_token',
	'USE_SSL'             => true,

	'CONSUMER_KEY'        =>  'VtAz3UYow2QA09D0gctiNGKRv',
	'CONSUMER_SECRET'     =>  '9KrwtoCINbKOJXbFm0HK7dWiD2ZL4Ifr3H7x8DRO9W118pxK44',
	'ACCESS_TOKEN'        =>  '2394477662-p6TaVF26cOdPAMImvx3plVpdI7XJTN2RcMHgcdz',
	'ACCESS_TOKEN_SECRET' =>  'NpQzjiEljDMF2ZiCMtpqgelDXt95Qn9pAiVFY8D3v7iNv',

 //  'CONSUMER_KEY'        =>  'ajdnDMQkO7uIDyd8VjlXOvYUp',
	// 'CONSUMER_SECRET'     =>  'umEi0E7fdS2MupyHk6rCTarGfVSQpP5FvsjGUXMtCsrmq2EIoN',
	// 'ACCESS_TOKEN'        =>  '874516306925559808-cNVXkzbKe1Kk26sbllRTFEwmeiovBS1',
	// 'ACCESS_TOKEN_SECRET' =>  'FQ0uavUUSqo7bwsi1b0NFr2tYgeydd0RXOgD0UxVp3Wbp',
  
];
