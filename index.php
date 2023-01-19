
<?php

//ini_set('display_errors', 0);
//
//ini_set('display_startup_errors', 0);
//
//error_reporting(0);

session_start();
$_SESSION['_csrf'] = md5(time());


if (!isset($_SESSION['keyuser'])){
    $keyuser=rand(1000,9999);
    $_SESSION['keyuser']=$keyuser;

}

$keyuser=$_SESSION['keyuser'];


function current_url()
{
    $validURL="";
    $url   =  $_SERVER['REQUEST_URI'];
    $validURL = str_replace("&", "&amp;", $url);
    return $validURL;
}

$offer_url = current_url();
$RouteArray = explode("/", htmlspecialchars($offer_url));


require_once './controller/controller.php';

?>
