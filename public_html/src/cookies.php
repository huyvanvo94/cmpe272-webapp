<?php

define("TRACKER", "track");

define("CS", "cs");
define("MATHS", "maths");
define("ARTS", "arts");
define("ENGL", "english");
define("FL", "foreign_la");
define("SCIENCE", "science");
define("MUSIC", "music");
define("ENG", "engineering");
define("SPORTS", "sports");
define("COOKING", "cooking");

define("CS_COUNT", "cs_count");
define("MATHS_COUNT", "maths_count");
define("ARTS_COUNT", "arts_count");
define("ENGL_COUNT", "english_count");
define("FL_COUNT", "foreign_la_count");
define("SCIENCE_COUNT", "science_count");
define("MUSIC_COUNT", "music_count");
define("ENG_COUNT", "engineering_count");
define("SPORTS_COUNT", "sports_count");
define("COOKING_COUNT", "cooking_count");

function setCountCookie($key){
    if(isset($_COOKIE[$key])){
        $value = $_COOKIE[$key];
        setcookie($key, $value + 1, time() + (86400 * 30), "/");
    }else{
        setcookie($key, 1, time() + (86400 * 30), "/");
    }

}

function setTimerCookie($key){
    setcookie($key, time(), time() + (86400 * 30), "/");
}

function clearCookie($key){
    setcookie($key, "", time()-3600);
}

function clearAllCookie(){

}

function getFiveMostViewItems(){
    $list = array();
    if(isset($_COOKIE[CS_COUNT])){
        $list["Computer Science"] = $_COOKIE[CS_COUNT];
    }

    if(isset( $_COOKIE[MATHS_COUNT])){
        $list["Mathematics"] = $_COOKIE[MATHS_COUNT];
    }

    if(isset($_COOKIE[ARTS_COUNT])){
        $list["Arts"] = $_COOKIE[ARTS_COUNT];
    }

    if(isset($_COOKIE[ENGL_COUNT])){
        $list["English"] = $_COOKIE[ENGL_COUNT];
    }

    if(isset($_COOKIE[FL_COUNT])){
        $list["Foreign Language"] = $_COOKIE[FL_COUNT];
    }

    if(isset($_COOKIE[SCIENCE_COUNT])){
        $list["Sciences"] = $_COOKIE[SCIENCE_COUNT];
    }

    if(isset($_COOKIE[MUSIC_COUNT])){
        $list["Music"] = $_COOKIE[MUSIC_COUNT];
    }

    if(isset($_COOKIE[ENG_COUNT])){
        $list["Engineering"] = $_COOKIE[ENG_COUNT];
    }

    if(isset($_COOKIE[SPORTS_COUNT])){
        $list["Sports"] = $_COOKIE[SPORTS_COUNT];
    }

    if(isset($_COOKIE[COOKING_COUNT])){
        $list["Cooking"] = $_COOKIE[COOKING_COUNT];
    }


    arsort($list);

    if(count($list) <= 5){
        return $list;
    }
    return array_slice($list, 0, 5);
}

function getFivePreviouslyViewItems(){
    $list = array();

    $time = time();

    if(isset($_COOKIE[CS])){
       $list["Computer Science"] = $time - $_COOKIE[CS];
    }

    if(isset( $_COOKIE[MATHS])){
        $list["Mathematics"] = $time - $_COOKIE[MATHS];
    }

    if(isset($_COOKIE[ARTS])){
        $list["Arts"] = $time - $_COOKIE[ARTS];
    }

    if(isset($_COOKIE[ENGL])){
       $list["English"] = $time - $_COOKIE[ENGL];
    }

    if(isset($_COOKIE[FL])){
        $list["Foreign Language"] = $time - $_COOKIE[FL];
    }

    if(isset($_COOKIE[SCIENCE])){
        $list["Sciences"] = $time - $_COOKIE[SCIENCE];
    }

    if(isset($_COOKIE[MUSIC])){
        $list["Music"] = $time - $_COOKIE[MUSIC];
    }

    if(isset($_COOKIE[ENG])){
        $list["Engineering"] = $time - $_COOKIE[ENG];
    }

    if(isset($_COOKIE[SPORTS])){
        $list["Sports"] = $time - $_COOKIE[SPORTS];
    }

    if(isset($_COOKIE[COOKING])){
        $list["Cooking"] = $time - $_COOKIE[COOKING];
    }


    asort($list);

    if(count($list) <= 5){
        return $list;
    }
    return array_slice($list, 0, 5);
}
?>