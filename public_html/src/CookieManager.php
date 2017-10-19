<?php
namespace coookie;

define("TRACKER", "track");
// computer science
define("CS", "cs");
define("MATHS", "maths");
define("ARTS", "arts");
define("ENGL", "english");
define("FL", "foreign la");
define("SCIENCE", "science");
define("MUSIC", "music");
define("ENG", "engineering");
define("SPORTS", "sports");
define("COOKING", "cooking");

function setTimerCookie($key){
    setcookie($key, time(), time() + (86400 * 30), "/");
}

function getFivePreviouslyViewItems(){
    $list = array();

    $time = time();

    if(isset($_COOKIE[CS])){
       array_push($list, $time - $_COOKIE[CS]);
    }

    if(isset( $_COOKIE[MATHS])){
        array_push($list, $time - $_COOKIE[MATHS]);
    }

    if(isset($_COOKIE[ARTS])){
        array_push($list, $time - $_COOKIE[ARTS]);
    }

    if(isset($_COOKIE[ENGL])){
        array_push($list, $time - $_COOKIE[ENGL]);
    }

    if(isset($_COOKIE[FL])){
        array_push($list, $time - $_COOKIE);
    }

    if(isset($_COOKIE[SCIENCE])){
        array_push($list, $time - $_COOKIE[SCIENCE]);
    }

    if(isset($_COOKIE[MUSIC])){
        array_push($list, $time - $_COOKIE[MUSIC]);
    }

    if(isset($_COOKIE[ENG])){
        array_push($list, $time - $_COOKIE[ENG]);
    }

    if(isset($_COOKIE[SPORTS])){
        array_push($list, $time - $_COOKIE[SPORTS]);
    }

    if(isset($_COOKIE[COOKING])){
        array_push($list, $time - $_COOKIE[COOKING]);
    }

    sort($list);

    if(count($list) < 5){
        return $list;
    }
    return array_slice($list, 0, 5);
}

class CookieManager{

    function __construct()
    {
    }

    public function track(){
        if(!isset($_COOKIE[TRACKER])){
            setcookie(TRACKER, "1", time() + (86400 * 30), "/");
        }
    }

    public function getTracker(){

    }

}

?>