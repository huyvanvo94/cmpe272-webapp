<?php
/**
 * Handle users creation into DB
 */

define('ROOTPATH', __DIR__);
include('../../settings.php');
include('util.php');
include('../src/database.php');
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

            echo $home;

            $dbConn = new DbConnect($settings);
            $user = new User($dbConn);

            $result = $user->insertUser($firstName, $lastName, $email);

            if($result == true){
                $userId = $user->getUserId($firstName, $lastName, $email);
                $user->insertPhoneNumber($userId, $home, $mobile);
                $user->insertAddress($userId, $zip, $street, $city, $state);
            }

            redirect('../user-creation.php');

        }catch (PDOException $e){
            // redirect to error page

        }
    }
}

?>