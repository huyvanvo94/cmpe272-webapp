<?php

// Will validate input
// Validate login admin
include 'util.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST['submit'] == 'Submit'){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(isValid($username, $password)){
            redirect("../user.php");
        }else{
            echo "<h1>Unauthorized access!</h1>";

        }
    }
}

/**
 * @param $username
 * @param $password
 * @return bool
 */
function isValid($username, $password){
    $textFile = file("../../password.txt", FILE_IGNORE_NEW_LINES);
    $theUserName = $textFile[0];
    $thePassword = $textFile[1];
    

    if($username === $theUserName & $password === $thePassword){
        return true;
    }

    return false;
}

function onLoad(){

}

?>