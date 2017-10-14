<?php
// Will validate input
// Validate login admin
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST['submit'] == 'Submit'){
        $username = $_POST['username'];
        $password = $_POST['password'];
    }
}

?>