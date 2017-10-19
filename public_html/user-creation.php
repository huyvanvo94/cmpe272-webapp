<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New User</title>

    <script>
        // validate inputs

    </script>

    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:300);

        .form-container {
            width: 360px;
            margin: auto;
        }

        .form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }
        .form input {
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 10px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .form button {
            text-transform: uppercase;
            outline: 0;
            background: #5190af;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            cursor: pointer;
        }
        .form button:hover,.form button:active,.form button:focus {
            background: #52809f;
        }
        .form .message {
            margin: 15px 0 0;
            color: #b3b3b3;
            font-size: 12px;
        }
        .form .message a {
            color: #5190af;
            text-decoration: none;
        }
        .form .register-form {
            display: none;
        }
        .container {
            position: relative;
            z-index: 1;
            max-width: 300px;
            margin: 0 auto;
        }
        .container:before, .container:after {
            content: "";
            display: block;
            clear: both;
        }
        .container .info {
            margin: 50px auto;
            text-align: center;
        }
        .container .info h1 {
            margin: 0 0 15px;
            padding: 0;
            font-size: 36px;
            font-weight: 300;
            color: #1a1a1a;
        }
        .container .info span {
            color: #4d4d4d;
            font-size: 12px;
        }
        .container .info span a {
            color: #000000;
            text-decoration: none;
        }

        body {
            background-color: whitesmoke;
            font-family: "Roboto", sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>
</head>
<body>

<div class="form-container">
    <!--Will validate soon -->

    <form class="form" method="post" action="response/user-create-handle.php">
        <h1>New User</h1>
        <input type="text" name="firstName" placeholder="first name"> <br>
        <input type="text" name="lastName" placeholder="last name"><br>
        <input type="text" name="email" placeholder="email address"><br>

        <input type="text" name="mobile" placeholder="mobile phone number"><br>
        <input type="text" name="home" placeholder="home phone number"><br>
        <input type="text" name="zip" placeholder="zip code"><br>
        <input type="text" name="street" placeholder="address"><br>
        <input type="text" name="city" placeholder="city"><br>
        <input type="text" name="state" placeholder="state"><br>
        <input type="submit" name="submit" value="Submit">

    </form>
</div>
</body>
</html>