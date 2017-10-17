<?php

// Will validate input
// Validate login admin
use function utilities\redirect;
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

function isValid($username, $password){


    return true;
}

?>