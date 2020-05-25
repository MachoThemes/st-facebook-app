<?php

session_id( $_GET['state'] );
session_start();

require_once 'sdk/Facebook/autoload.php';

$fb = new Facebook\Facebook(
	[
		'app_id'                => 'our app id',
		'app_secret'            => 'our app secret',
		'default_graph_version' => 'v4.0',
	]
);

$helper = $fb->getRedirectLoginHelper();

try {
	$accessToken = $helper->getAccessToken();
} catch ( Facebook\Exceptions\FacebookResponseException $e ) {
	// When Graph returns an error
	echo 'Graph returned an error: ' . $e->getMessage();
	exit;
} catch ( Facebook\Exceptions\FacebookSDKException $e ) {
	// When validation fails or other local issues
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
	exit;
}

$_SESSION['access_token'] = (string) $accessToken;
?>

<!DOCTYPE html><html><body onload="setTimeout('close()', 400)"></body></html>
