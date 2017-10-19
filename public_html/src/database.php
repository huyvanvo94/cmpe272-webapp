<?php

/**
 * Class DbConnect
 * Class to handle database operations
 */
// Tables
$USER_TABLE    = "User";
$PHONE_TABLE   = "PhoneNumber";
$ADDRESS_TABLE = "Address";
class DbConnect
{
    private $settings, $pdo;
    // The constructor
    // Database dependency from settings.php
    function __construct($settings)
    {
        $this->settings = $settings;
        $this->pdo = new PDO(sprintf(
            'mysql:host=%s;dbname=%s;port=%s;charset=%s',
            $this->settings['host'],
            $this->settings['name'],
            $this->settings['port'],
            $this->settings['charset']
        ),
            $this->settings['username'],
            $this->settings['password']
        );
    }
    function createDb(){
        $stmt = $this->pdo->prepare("CREATE DATABASE".$this->settings['name']);
        $stmt->execute();
    }
    function __destruct()
    {
        $this->pdo = null;
        $this->settings = null;
    }
    // get database connection
    public function getConnection()
    {
        return $this->pdo;
    }
}
/**
 * Class User
 *
 */
class User{
    private $dbConnect, $userId;
    function __construct($dbConnect)
    {
        $this->dbConnect = $dbConnect->getConnection();
    }
    public function searchByName($firstName, $lastName){
        $query = "SELECT * FROM User 
                  WHERE firstName = ? AND lastName = ?";
        $stmt = $this->dbConnect->prepare($query);
        $stmt->execute([$firstName, $lastName]);
        $users = $stmt->fetch();
        return $users;
    }
    public function searchByAddress(){
    }
    public function searchByNumbers(){
    }
    public function insertUser($firstName, $lastName, $email){
        try{
            $userInsertStmt = "INSERT INTO Users(firstName, lastName, email) 
                              VALUES (:firstName, :lastName, :email)";
            $stmt = $this->dbConnect->prepare($userInsertStmt);
            $stmt->bindValue(':firstName', $firstName);
            $stmt->bindValue(':lastName', $lastName);
            $stmt->bindValue(':email', $email);
            $stmt->execute();
            return true;
        }catch (PDOException $e){
            return false;
        }
    }
    public function insertPhoneNumber($userId, $home, $mobile){
        try{
            $numberStmt = "INSERT INTO PhoneNumber(userId, home, mobile) 
                          VALUES (:userId, :home, :mobile)";
            $stmt = $this->dbConnect->prepare($numberStmt);
            $stmt->bindValue(':userId', $userId);
            $stmt->bindValue(':home', $home);
            $stmt->bindValue(':mobile', $mobile);
            $stmt->execute();
            return true;
        }catch (PDOException $e){
            return false;
        }
    }
    public function insertAddress($userId, $zip, $street, $city, $state){
        try{
            $addressStmt = "INSERT INTO Address(userId, zip, street, city, state) 
                            VALUES (:userId, :zip, :street, :city, :state)";
            $stmt = $this->dbConnect->prepare($addressStmt);
            $stmt->bindValue(':userId', $userId);
            $stmt->bindValue(':zip', $zip);
            $stmt->bindValue(':street', $street);
            $stmt->bindValue(':city', $city);
            $stmt->bindValue(':state', $state);
            $stmt->execute();
            return true;
        }catch (PDOException $e){
            return false;
        }
    }
    public function getUserId($firstName, $lastName, $email){
        $userIdQuery = "SELECT userId FROM Users 
                        WHERE firstName= ? 
                        AND lastName = ? AND email = ?";
        $stmt = $this->dbConnect->prepare($userIdQuery);
        $stmt->execute([$firstName, $lastName, $email]);
        $row = $stmt->fetch();
        $userId = $row['userId'];
        return $userId;
    }
    public function fetchUsers(){
        $stmt = $this->dbConnect->query("SELECT firstName, lastName FROM Users");
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}
?>