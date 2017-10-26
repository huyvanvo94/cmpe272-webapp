<?php
session_start();
include 'util.php';

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
        redirect("../user.php");
    }
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