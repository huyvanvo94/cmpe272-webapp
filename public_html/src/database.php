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
        $query = "SELECT * FROM Users 
                  WHERE firstName = ? AND lastName = ?";
        $stmt = $this->dbConnect->prepare($query);
        $stmt->execute([$firstName, $lastName]);
        $users = $stmt->fetchAll();
        return $users;
    }

    // Must be a string
    // lastname1, lastname2, lastname3, etc
    public function searchByLastNames($lastNames){
        $query = "SELECT * FROM Users WHERE lastName IN (?)";
        $stmt = $this->dbConnect->prepare($query);
        $stmt->execute([$lastNames]);
        $users = $stmt->fetchAll();
        return $users;

    }


    public function insertUser($firstName, $lastName, $email, $home, $mobile, $zip, $street, $city, $state)
    {
        try {
            $userInsertStmt = "INSERT INTO Users 
                            (firstName, lastName, email, home, mobile, zip, street, city, state)
                            VALUES (:firstName, :lastName, :email, :home, :mobile, :zip, :street, :city, :state)
                            ";

            $stmt = $this->dbConnect->prepare($userInsertStmt);
            $stmt->bindValue(':firstName', $firstName);
            $stmt->bindValue(':lastName', $lastName);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':home', $home);
            $stmt->bindValue(':mobile', $mobile);
            $stmt->bindValue(':zip', $zip);
            $stmt->bindValue(':street', $street);
            $stmt->bindValue(':city', $city);
            $stmt->bindValue(':state', $state);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }


    public function search($firstName=null, $lastName=null, $email=null, $home=null, $mobile=null ){

        if($firstName == null && $lastName == null && $email == null && $home == null && $mobile==null){
            $sql = "SELECT * FROM Users";

            $stmt = $this->dbConnect->prepare($sql);
            $stmt->execute();

            return  $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        /*
        $stmt = $this->dbConnect->query("SELECT * FROM Users WHERE firstName = 'huy' ");
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;*/


        $baseQuery = "SELECT * FROM Users WHERE ";// firstName = :firstName AND lastName = :lastName";


        if($firstName){
            $baseQuery .= "firstName = :firstName AND";
        }
        if($lastName){
           $baseQuery .= " lastName = :lastName AND";
        }
        if($email){
            $baseQuery .= " email = :email AND";
        }

        if($home){
            $baseQuery .= " home = :home AND";

        }

        if($mobile){
            $baseQuery .= " mobile = :mobile AND";
        }

        if(substr($baseQuery, count($baseQuery) -4) === 'AND'){
            $baseQuery = substr($baseQuery, 0, count($baseQuery) - 5);
        }

        $stmt = $this->dbConnect->prepare($baseQuery);


        if($firstName)
            $stmt->bindValue(':firstName', $firstName);

        if($lastName)
            $stmt->bindValue(':lastName', $lastName);

        if($email)
            $stmt->bindValue(':email', $email);

        if($home)
            $stmt->bindValue(':home', $home);

        if($mobile)
            $stmt->bindValue(':mobile', $mobile);

        $stmt->execute();

        return  $stmt->fetchAll(PDO::FETCH_ASSOC);
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

class ServiceCount{
    private $dbConnect;
    function __construct($dbConnect)
    {
        $this->dbConnect = $dbConnect->getConnection();
    }
}
?>