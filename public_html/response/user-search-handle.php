<?php
include('../../settings.php');
include('util.php');
include('../src/database.php');
include '../table.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST['submit'] == 'Submit'){

        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $home = $_POST["home"];
        $mobile = $_POST["mobile"];
        $email = $_POST["email"];


        echo "<style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            text-align: left;
            padding: 8px;
        }
        
        tr:nth-child(even){background-color: #f2f2f2;}
        
        th {
            background-color: #1a16af;
            color: white;
        }
        </style>";


        echo "<h1>Found Users</h1>";

        $db = new DbConnect($settings);
        $user = new User($db);


        $results = $user->search($firstName, $lastName, $email, $home, $mobile);



        $table = new HTMLTable();

        $table->addHeader('firstName')
            ->addHeader('lastName')
            ->addHeader('email')
            ->addHeader('home')
            ->addHeader('mobile')
            ->addHeader('zip')
            ->addHeader('street')
            ->addHeader('city')
            ->addHeader('state');

        $table->setDatas($results);

        echo $table->getHTML();

        echo "</table>";



    }
}


?>