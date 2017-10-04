<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <title>Contacts</title>
</head>


<body>

<h3>Contact Information</h3>

<?php
$fileName = "contacts.txt";

$contactsList = file($fileName, FILE_IGNORE_NEW_LINES);
for($i = 0; $i < count($contactsList); $i++){
    echo "$contactsList[$i]</br>";
}
?>

</body>
</html>