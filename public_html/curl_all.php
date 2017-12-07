<?php

include 'src/database.php';
include 'table.php';
include '../settings.php';


include 'response/util.php';

echo "<h1>List of Users from my website</h1>";


$result = curl_mysite();

if($result){
    echo $result;
}

echo "<h1>List of Users from other websites</h1>";
$username = 'admin';
$password = 'admin';
$loginUrl = 'https://gadek.000webhostapp.com/process.php';

$arr = array(
    "username" => $username,
    "password" => $password
);


$result1 = curl_login($arr, $loginUrl);

if($result1){
    echo "<h1>List of Users</h1>";
    echo $result1;
}



$result2 = curl_login($arr, "http://adluusolutions.com/accounts.php");


if($result2){
    echo "<h1>List of Users</h1>";
    echo $result2;
}


?>