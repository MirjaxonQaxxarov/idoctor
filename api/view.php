<?php
require_once './model/model.php';
require_once './view/route.php';
require_once './view/sites/menu/head.php';


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
            if (!file_exists("./view/sites/".$geturl)){
                echo "<script>console.log('File does not found!')</script>";
                throw new Exception ('File does not exist');
            }
            else {
                $miniurl="./view/sites/".$geturl;
                require_once ($miniurl);
            }
        }else
            require_once "./view/sites/404.php";
    }
    catch (Exception $e) {
//        require_once "./view/sites/404.php";
    }
}
else{
    require_once "./view/sites/404.php";
}


require_once './view/sites/menu/footer.php';

?>