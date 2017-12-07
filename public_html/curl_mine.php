<?php

include 'src/database.php';
include 'table.php';
include '../settings.php';


include 'response/util.php';

echo "<h1>List of Users from my website</h1>";


$result = curl_mysite();

if($result){
    echo $result;
}else{
    echo "<p>Error</p>";
}

