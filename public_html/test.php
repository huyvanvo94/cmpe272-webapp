<?php

include "src/cookies.php";
include "src/database.php";
include "../settings.php";
include "table.php";

echo "Tester";

$db = new DbConnect($settings);

$user = new User($db);

/**
$table = new HTMLTable();
$table->addHeader('firstName')->addHeader('lastName');
$table->setDatas($result);

echo $table->getHTML();*/

while ( $row = $user->searchByName("huy", "vo") ) {
    echo $row['firstName'];
}
?>