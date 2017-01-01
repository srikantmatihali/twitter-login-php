<?php
	error_reporting(E_ALL); 
	//ini_set('display_errors',1);

	session_start();
	require_once('includes/global.php');
	require_once('twitteroauth/twitteroauth.php');
	//require_once('includes/config.php');


	$connection = new TwitterOauth(CONSUMER_KEY, CONSUMER_SECRET);

	$request_token = $connection->getRequestToken(OAUTH_CALLBACK);

	$_SESSION['oauth_token'] = $token = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

	switch ($connection->http_code) {
		case 200:
			$url = $connection->getAuthorizeURL($token);
			header('Location:'. $url);
			break;
		default:
			echo 'Oops! Something went wrong.' . $connection->http_code;
			break;
	}

?>