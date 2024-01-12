<?php
require_once 'vendor/autoload.php';

$clientID = '819801148446-18qu00tp4sub5eb9tdf9nl0tasem15nd.apps.googleusercontent.com';
$clientSecret = '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';
$redirectURI = 'http://localhost/AIRIN-WEB-RESPONSIVE/konsumen/login.php';

// CREATE CLIENT REQUEST TO GOOGLE
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectURI);
$client->addScope('profile');
$client->addScope('email');
