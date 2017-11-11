<?php


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


?>