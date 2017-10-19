<!DOCTYPE html>
<html lang="en">
<!-- Display Users from Database -->
<head>
    <meta charset="UTF-8">
    <title>Users</title>

    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>

    <script>

    </script>
</head>
<body>

<?php

include '../settings.php';
include 'src/database.php';
include 'table.php';

echo "<h1>List of Users:</h1>";

$user = new User(new DbConnect($settings));
$users = $user->fetchUsers();

$table = new HTMLTable();

$table->addHeader('firstName')->addHeader('lastName');
$table->setDatas($users);

echo $table->getHTML();



?>


</body>
</html>

