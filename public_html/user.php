<?php
session_start();

include '../settings.php';
include 'response/util.php';
include 'src/database.php';
include 'table.php';
/*Denies access if users try to enter this web page without entering in password/username */

if(!isset($_SESSION['username'])){
    echo "<h1>Access Restricted</h1>";
}else{
    unset($_SESSION['password']);
    unset($_SESSION['username']);
    displayUsersTable();

}

function displayUsersTable(){
    global $settings;
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
    echo "<h1>List of Users:</h1>";


    /*
    $usersList = file("../users.txt");
    for($i = 0; $i < count($usersList); $i++){
        echo "<li>$usersList[$i]</li>";
    } */


    $user = new User(new DbConnect($settings));
    $users = $user->fetchUsers();

    $table = new HTMLTable();

    $table->addHeader('firstName')->addHeader('lastName');
    $table->setDatas($users);

    echo $table->getHTML();
}
?>

