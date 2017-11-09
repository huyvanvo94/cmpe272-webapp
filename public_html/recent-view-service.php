<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recent View</title>

    <style>
        #title{
            color: #1768b4;

        }
        #last-five-view{
            font-size: 25px;
        }
    </style>
</head>
<body>

<h1 id="title">Last Five Recently Visited Services</h1>


<?php
include 'src/cookies.php';

tDisplayFivePreviouslyViewItems();

function tDisplayFivePreviouslyViewItems(){
    $list = fetchFiveLastView();
    if($list != -1){
        echo "<ol id=\"last-five-view\">";

        foreach ($list as $key => $value){
            echo "<li>$key </li>";
        }

        echo "</ol>";
    }else{
        echo "<h1>No Service Was Viewed!</h1>";
    }
}

function displayFivePreviouslyViewItems(){
    $data = getFivePreviouslyViewItems();
    if(empty($data)){
        echo "<h1>No Service Was Viewed!</h1>";
    }
    echo "<ol id=\"last-five-view\">";
    foreach ($data as $key => $value){
        echo "<li>$key </li>";
    }
    echo "</ol>";
}
?>

</body>
</html>

