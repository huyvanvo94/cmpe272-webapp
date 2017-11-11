<?php

$username = 'admin';
$password = 'admin';
$loginUrl = 'https://gadek.000webhostapp.com/process.php';

//init curl
$ch = curl_init();

//Set the URL to work with
curl_setopt($ch, CURLOPT_URL, $loginUrl);

// ENABLE HTTP POST
curl_setopt($ch, CURLOPT_POST, 1);

//Set the post parameters
curl_setopt($ch, CURLOPT_POSTFIELDS, 'username='.$username.'&password='.$password);

//Setting CURLOPT_RETURNTRANSFER variable to 1 will force cURL
//not to print out the results of its query.
//Instead, it will return the results as a string return value
//from curl_exec() instead of the usual true/false.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
//execute the request (the login)
$store = curl_exec($ch);

echo $store;




?>