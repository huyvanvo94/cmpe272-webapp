<?php


class Validation
{
    public static function isValidateEmail($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            return false;
        }

        return true;

    }

    public static function isValidateName($name){
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
            return false;
        }

        return true;
    }

}

?>