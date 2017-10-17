<?php

include 'src/database.php';
include '../settings.php';

$db = new DbConnect($settings);
$user = new User($db);
//1
$user->insertUser("John", "Le", "john.le.@sjsu.edu");
$id = $user->getUserId("John", "Le", "john.le.@sjsu.edu");
$user->insertPhoneNumber($id, "5102341232", "4354532901");
$user->insertAddress($id, "94632", "1033 Lincoln Ave", "Oakland", "CA");
//2
$user->insertUser("Bobby", "Le", "Bobby.le.@sjsu.edu");
$id = $user->getUserId("Bobby", "Le", "Bobby.le.@sjsu.edu");
$user->insertPhoneNumber($id, "5102641232", "4334532901");
$user->insertAddress($id, "94652", "1013 Lincoln Ave", "Oakland", "CA");
//3
$user->insertUser("Jessica", "Johnson", "Jessica.johnson.@sjsu.edu");
$id = $user->getUserId("Jessica", "Johnson", "Jessica.johnson.@sjsu.edu");
$user->insertPhoneNumber($id, "321395489","888454348");
$user->insertAddress($id, "94651", "1013 Park Ave", "New York", "NY");
//4 


function loadUser($firstName, $lastName, $email, $mobile, $home, $zip, $address, $city, $state){
	$user->insertUser($firstName, $lastName, $email);
	$id = $user->getUserId($firstName, $lastName, $email);
	$user->insertPhoneNumber($id, $mobile, $home);
	$user->insertAddress($id, $zip, $address, $city, $state);
}






echo "Status = OK!";






?>