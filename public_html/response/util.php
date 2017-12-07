<?php
function httpPost($url,$params)
{
    $postData = '';
    //create name value pairs seperated by &
    foreach($params as $k => $v)
    {
        $postData .= $k . '='.$v.'&';
    }
    $postData = rtrim($postData, '&');

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, count($postData));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

    $output = curl_exec($ch);

    curl_close($ch);
    return $output;

}
function curl_mysite(){
    $ch2 = curl_init();
    $username = 'admin';
    $password = 'admin';
    $myurl2 = "http://huyvanvo94.com/login-admin.html";
    curl_setopt ($ch2, CURLOPT_URL, $myurl2);
    curl_setopt ($ch2, CURLOPT_POST, 1);
    curl_setopt ($ch2, CURLOPT_POSTFIELDS, 'username='.$username.'&password='.$password.'&submit=Submit');
    curl_setopt ($ch2, CURLOPT_HEADER, 0);
    curl_setopt ($ch2, CURLOPT_RETURNTRANSFER, 1);
    curl_exec($ch2);
    curl_setopt($ch2, CURLOPT_URL, 'http://huyvanvo94.com/response/login.php');
    $content=curl_exec($ch2);
    curl_close($ch2);

    return $content;
}


function curl_login($loginData, $url){

    $ch = curl_init();

    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $loginData,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_COOKIESESSION => true,
        CURLOPT_COOKIEJAR => 'cookie.txt',
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_PROXYPORT => "80",

    ));

    $output = curl_exec($ch);


    return $output;
}

function redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}
?>
