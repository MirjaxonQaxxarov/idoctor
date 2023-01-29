<?php
require_once './model/model.php';
require_once './api/route.php';


if (!isset($_SESSION['keyuser'])){
    
    $keyuser=rand(1000,9999);
    $_SESSION['keyuser']=$keyuser;

}

$keyuser=$_SESSION['keyuser'];


///////////////// edit , add , delete  Do not use these names  \\\\\\\\\\\\\\
if (Check::Route($RouteArray[2])) {
    try {
        $routeinfos = Check::GetRoute($RouteArray[2]);
        $geturl   = $routeinfos["url"];
        if (!isset($routeinfos["errors"])){
            if (!file_exists("./api/all/".$geturl)){
                echo "<script>console.log('File does not found!')</script>";
                throw new Exception ('File does not exist');
            }
            else {

                $miniurl="./api/all/".$geturl;
                require_once ($miniurl);
            }
        }else{
            header("location:/view/sites/404.php");
            exit();
        }
    }
    catch (Exception $e) {
//        header(location:/view/sites/404.php");
            exit();
    }
}
else{
    header("location:/view/sites/404.php");
    exit();
}


?>