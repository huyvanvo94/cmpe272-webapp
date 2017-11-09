<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Five Most View Service</title>

    <style>
        #title{
            color: #16589c;
        }


        #most-view-list{
            font-size: 25px;
        }

    </style>
</head>
<body>

<div class="main-container">
<h1 id="title">Five Most View Services</h1>

<?php

include "src/cookies.php";

$data = getFiveMostViewItems();
if(empty($data)){
    echo "<h1>No Service Was Viewed!</h1>";
}

echo "<ol id=\"most-view-list\">";
foreach ($data as $key => $value){
    echo "<li class='info'>$key Service (View $value times)</li>";
}
echo "</ol>";
?>



</div>
</body>
</html>


