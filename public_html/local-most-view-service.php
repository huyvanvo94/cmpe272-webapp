<?php

include "src/cookies.php";

$data = getFiveMostViewItems();

foreach ($data as $key => $value){
    echo "$key : $value <br>";
}

?>