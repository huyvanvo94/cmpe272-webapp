<?php

include 'src/database.php';
include 'table.php';
include '../settings.php';

echo "<style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            text-align: left;
            padding: 8px;
        }
        
        tr:nth-child(even){background-color: #f2f2f2;}
        
        th {
            background-color: #1a16af;
            color: white;
        }
        </style>";


echo "<h1>Found Users</h1>";


$db = new DbConnect($settings);
$user = new User($db);


$results = $user->search('John', 'Le', null, null, null);



$table = new HTMLTable();

$table->addHeader('firstName')
    ->addHeader('lastName')
    ->addHeader('email')
    ->addHeader('home')
    ->addHeader('mobile')
    ->addHeader('zip')
    ->addHeader('street')
    ->addHeader('city')
    ->addHeader('state');
$table->setDatas($results);

echo $table->getHTML();

echo "</table>";



/*
include 'response/util.php';
$username = 'admin';
$password = 'admin';
$loginUrl = 'https://gadek.000webhostapp.com/process.php';

$arr = array(
    "username" => $username,
    "password" => $password
);


echo curl_login($arr, $loginUrl);
*/

?>