<?php

session_id( $_GET['sessionID'] );
session_start();

header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Methods: GET,POST,OPTIONS");
header("Access-Control-Allow-Origin: *");

echo json_encode( array(
	'access_token' => $_SESSION['access_token']
));

?>
