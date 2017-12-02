<?php
include('../../settings.php');
include('util.php');
include('../src/database.php');
include '../table.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST['submit'] == 'Submit'){

        try {

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


            $db = new DbConnect($settings);
            $user = new User($db);


            $results = $user->search($firstName, $lastName, $email, $home, $mobile);

            if ($results) {
                echo "<h1>Found Users</h1>";
                $table = new HTMLTable();

                $table->addHeader('firstName')
                    ->addHeader('lastName')
                    ->addHeader('email')
                    ->addHeader('home')
                    ->addHeader('mobile')
                    ->addHeader('zip')
                    ->addHeader('street')
                    ->addHeader('city')
                    ->addHeader('state')
                    ->addHeader('country');

                $table->setDatas($results);

                echo $table->getHTML();

                echo "</table>";


            } else {
                echo "<h1>No users found</h1>";
            }
        }catch (Exception $e){

            echo "<h1>No users found! </h1>";
        }

    }
}


?>