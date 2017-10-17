<?php
include('../../settings.php');
include('util.php');
include('../src/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['submit'] == 'Submit') {


       // $names = explode(" ", $_POST["names"]);

        $db = new DbConnect($settings);
        $user = new User($db);

        while ( $row = $user->searchByName("john", "le") ) {

            echo $row['firstName'];

        }


    }
}

?>