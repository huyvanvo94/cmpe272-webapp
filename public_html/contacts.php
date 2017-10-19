<!DOCTYPE html>
<html>
<head>
    <title>Contacts</title>
    <style>

        @import url(https://fonts.googleapis.com/css?family=Roboto:300);

        .title{

        }
        body {
            background-color: whitesmoke;
            font-family: "Roboto", sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        textarea{
            resize: none;
        }

        form, div {
            max-width: 300px;
            margin: 10px auto;
            padding: 10px 20px;
            background: #f4f7f8;
            border-radius: 8px;
        }

        .submit-button{
            background: rgba(255,255,255,0.1);
            border: none;
            font-size: 16px;
            height: auto;
            margin: 0;
            outline: 0;
            padding: 15px;
            width: 100%;
            background-color: #e8eeef;
            color: #8a97a0;
            box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
            margin-bottom: 30px;
        }

        ul{
            list-style: none;

        }


    </style>
</head>



<body>

<div>
    <h3>Contact Information</h3>

    <ul>
        <?php
            $fileName = "contacts.txt";
            $contactsList = file($fileName, FILE_IGNORE_NEW_LINES);
            for($i = 0; $i < count($contactsList); $i++){
                echo "<li>$contactsList[$i] </li>";
            }
        ?>
    </ul>
</div>
<form action="response/form-contact.php" method="post">
    <h4>Contact Us</h4>
    <input type="text" name="email-address" placeholder="address"> <br>

    <label>Comments</label><br>
    <textarea name="message" rows="10" cols="30">
    </textarea><br>
    <input class="submit-button" type="submit" name="submit" value="Submit">

</form>


</body>
</html>