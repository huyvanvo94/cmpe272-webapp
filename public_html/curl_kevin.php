<?php

include 'src/database.php';
include 'table.php';
include '../settings.php';


include 'response/util.php';


echo "<h1>List of Users from Kevin</h1>";
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
}else{
    echo "<p>Error</p>";
}





?>