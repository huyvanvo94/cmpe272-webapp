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

<h4>Contact Us</h4>

<form action="response/form-contact.php" method="post">
    <fieldset>Information
        <p>
            <label for="email-address">You Email Address:</label></br>
            <input type="text" name="email-address"> <br>
        </p>

        <label>Comments</label><br>
        <textarea name="message" rows="10" cols="30">
        </textarea><br>
        <input type="submit" name="submit" value="Submit">
    </fieldset>
</form>


</body>
</html>