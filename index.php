<?php

$sid = $_GET['sessionID'] != '' ? $_GET['sessionID'] : 'stfbapp';

session_id( $sid );
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
$helper->getPersistentDataHandler()->set( 'state', $sid );

$permissions = [ 'manage_pages' ];
$loginUrl    = $helper->getLoginUrl( 'https://strongtestimonials.com/facebook_app_test/callback.php', $permissions );

header( 'Location: ' . $loginUrl );


