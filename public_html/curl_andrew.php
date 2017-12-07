<?php


include 'src/database.php';
include 'table.php';
include '../settings.php';


include 'response/util.php';

echo "<h1>List of Users from Andrew</h1>";


$username = 'admin';
$password = 'admin';

$arr = array(
    "username" => $username,
    "password" => $password
);

$result2 = curl_login($arr, "http://adluusolutions.com/accounts.php");


if($result2){
    echo "<h1>List of Users</h1>";
    echo $result2;
}


?>