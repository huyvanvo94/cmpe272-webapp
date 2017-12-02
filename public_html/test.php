<?php

include 'src/database.php';
include 'table.php';
include '../settings.php';


include 'response/util.php';
$username = 'admin';
$password = 'admin';
$loginUrl = 'https://gadek.000webhostapp.com/process.php';

$arr = array(
    "username" => $username,
    "password" => $password
);


echo curl_login($arr, $loginUrl);


?>