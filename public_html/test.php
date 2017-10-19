<?php


function setTimerCookie($key){
    setcookie($key, time(), time() + (86400 * 30), "/");
}

setTimerCookie("hello");

echo time() - $_COOKIE["hello"];

?>