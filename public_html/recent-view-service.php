<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recent View</title>
</head>
<body>

<p>Last Five Previously Visited Service</p>

<ul id="five-view">
<?php
include 'src/cookies.php';

$data = getFivePreviouslyViewItems();
foreach ($data as $key => $value){
    echo "<li>$key viewed $value millis ago </li>";
}
?>
</ul>
</body>
</html>

