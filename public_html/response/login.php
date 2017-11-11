<?php
session_start();
include 'util.php';
include '../../settings.php';
include '../src/database.php';
include '../table.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST['submit'] == 'Submit'){
        $username = $_POST['username'];
        $password = $_POST['password'];

        validate($username, $password);
    }
}
/*Function to validate inputs. Will print error if incorrect password or username*/
function validate($username, $password){
    $textFile = file("../../password.txt", FILE_IGNORE_NEW_LINES);
    $theUserName = $textFile[0];
    $thePassword = $textFile[1];

    if($theUserName != $username || $thePassword != $password){
        echo "<h1>Error. Username or password does not match!</h1>";
    } else{

        $_SESSION['username'] = $theUserName;
        $_SESSION['password'] = $thePassword;

        //redirect("../user.php");

        displayUsersTable();
    }
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


function isValid($username, $password){
    $textFile = file("../../password.txt", FILE_IGNORE_NEW_LINES);
    $theUserName = $textFile[0];
    $thePassword = $textFile[1];

    if($username === $theUserName && $password === $thePassword){
        return true;
    }

    return false;
}

function isValidPassword($password){
    $textFile = file("../../password.txt", FILE_IGNORE_NEW_LINES);
    return $textFile[1] == $password;
}

?>