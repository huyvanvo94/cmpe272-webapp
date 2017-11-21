<?php
/**
 * Handle users creation into DB
 */

define('ROOTPATH', __DIR__);
include  '../../settings.php';
include('../src/database.php');
include 'util.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST['submit'] == 'Submit'){
        try{



            // get user
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];

            // get address
            $zip = $_POST["zip"];
            $street = $_POST["street"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            // get phone number
            $mobile = $_POST["mobile"];
            $home = $_POST["home"];

            /*
            echo $firstName."</br>";
            echo $lastName."</br>";

            echo $email."</br>";
            echo $zip."</br>";
            echo $city."</br>";
            echo $state."</br>";
            echo $mobile."</br>";
            echo $home."</br>";*/

            $dbConn = new DbConnect($settings);
            $user = new User($dbConn);

            $firstName = ucfirst(strtolower($firstName));
            $lastName = ucfirst(strtolower($lastName));


            $result = $user->insertUser($firstName, $lastName, $email, $home, $mobile, $zip, $street, $city, $state);



            header('Location: ' . '../user-creation.html');

        }catch (PDOException $e){
            // redirect to error page

        }
    }
}

?>