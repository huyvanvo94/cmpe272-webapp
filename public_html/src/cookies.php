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

define("TRACK_COUNT", "track_count");
define("TRACK_TIME", "track_time");

define("T_CS", "Computer Science");
define("T_MATH", "Mathematics");
define("T_ART", "Arts");
define("T_ENGLISH", "English");
define("T_FL", "Foreign Language");
define("T_SCI", "Sciences");
define("T_MUSIC", "Music");
define("T_ENG", "Engineering");
define("T_SPORTS", "Sports");
define("T_COOK", "Cooking");

function setCookieCounting($key){
    if(isset($_COOKIE[TRACK_COUNT])){
        $obj = json_decode($_COOKIE[TRACK_COUNT]);
        $obj->{$key} += 1;
        $jsonize = json_encode($obj);
        setcookie(TRACK_COUNT, $jsonize, time() + (86400 * 30), "/");
    }else{
        $arr = array(
            "Computer Science" => 0,
            "Mathematics" => 0,
            "Arts" => 0,
            "English" => 0,
            "Foreign Language" => 0,
            "Sciences"=>0,
            "Music" => 0,
            "Engineering" => 0,
            "Sports" => 0,
            "Cooking" => 0,
        );

        $arr[$key] += 1;

        $jsonize = json_encode($arr);
        setcookie(TRACK_COUNT, $jsonize, time() + (86400 * 30), "/");
    }

}

function setCookieTiming($key){

    if(isset($_COOKIE[TRACK_TIME])){
        $obj = json_decode($_COOKIE[TRACK_TIME]);
        $obj->{$key} = time();
        // put back
        $jsonize = json_encode($obj);
        setcookie(TRACK_TIME, $jsonize, time() + (86400 * 30), "/");
    }else{

        // create array
        // set all value to -1
        $arr = array(
            "Computer Science" => -1,
            "Mathematics" => -1,
            "Arts" => -1,
            "English" => -1,
            "Foreign Language" => -1,
            "Sciences"=>-1,
            "Music" => -1,
            "Engineering" => -1,
            "Sports" => -1,
            "Cooking" => -1,
        );

        $arr[$key] = time();
        $jsonize = json_encode($arr);
        setcookie(TRACK_TIME, $jsonize, time() + (86400 * 30), "/");
    }


}

function fetchFiveMostViewed(){
    if(isset($_COOKIE[TRACK_COUNT])){
        $obj = json_decode($_COOKIE[TRACK_COUNT]);
        $list = array();
        foreach ($obj as $key=>$value){
            if ($value != 0){
                $list[$key] = $value;
            }
        }

        if(count($list) != 0){
            arsort($list);

            if(count($list) <= 5){
                return $list;
            }
            return array_slice($list, 0, 5);
        }else{
            return -1;
        }

    }


    return -1;

}

function fetchFiveLastView(){
    if(isset($_COOKIE[TRACK_TIME])){
        $obj = json_decode($_COOKIE[TRACK_TIME]);

        $list = array();
        $currentTime = time();
        foreach ($obj as $key => $value){
            if($value != -1){
                $list[$key] = $currentTime - $value;
            }
        }

        if(count($list) != 0){
            asort($list);

            if(count($list) <= 5){
                return $list;
            }
            return array_slice($list, 0, 5);
        }else{
            return -1;
        }
    }

    return -1;
}


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