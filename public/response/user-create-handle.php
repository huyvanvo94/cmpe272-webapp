<?php
/**
 * Handle users creation into DB
 */

define('ROOTPATH', __DIR__);
include('../../settings.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST['submit'] == 'Submit'){

        try{
            // get user

            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            // compute user id
            $userId = md5($firstName+$lastName+$email);

            // TODO: get address

            // TODO: get phone number

            // init database connection

            $pdo = new PDO(sprintf(
                'mysql:host=%s;dbname=%s;port=%s;charset=%s',
                $settings['host'],
                $settings['name'],
                $settings['port'],
                $settings['charset']
            ),
                $settings['username'],
                $settings['password']

            );
            // set mode
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // avoid sql injection
            // insert user
            $userInsertStmt = "INSERT INTO User(firstName, lastName, email) VALUES (':firstName', ':lastName', ':email'); ";

            $stmt = $pdo->prepare($userInsertStmt);
            $stmt->bindValue(':firstName', $firstName);
            $stmt->bindValue(':lastName', $lastName);
            $stmt->bindValue(':email', $email);
            $stmt->execute(); 

        }catch (PDOException $e){
            // redirect to error page

        }
    }
}

?>