<?php
if (!isset($_SESSION["rol"])) {

    header('Location: /locadmin/login');
    exit();
}

if (isset($_SESSION["rol"])&&$_SESSION["rol"]!="admin") {

    header('Location: /locadmin/login');
    exit();

}


if((!isset($_SESSION["login"]) && $_SESSION["rol"]!="admin")){

    header('Location: /locadmin/login');
    exit();

}
require_once './model/model.php';
require_once './view/routeadmin.php';
require_once './view/sitesadmin/menu/head.php';




///////////////// edit , add , delete  Do not use these names  \\\\\\\\\\\\\\
if (Check::Route($RouteArray[2])) {
    try {
        $routeinfos = Check::GetRoute($RouteArray[2]);
        $geturl   = $routeinfos["url"];
        if (!isset($routeinfos["errors"])){
            if (!file_exists("./view/sitesadmin/".$geturl)){
                echo "<script>console.log('File does not found!')</script>";
                require_once "./view/sitesadmin/404.php";
                throw new Exception ('File does not exist');

            }
            else {

                $miniurl="./view/sitesadmin/".$geturl;

                require_once ($miniurl);
            }
        }else {
            require_once "./view/sitesadmin/404.php";


        }
    }
    catch (Exception $e) {

//        require_once "./view/sitesadmin/404.php";
    }
}
else{
    require_once "./view/sitesadmin/404.php";
}


require_once './view/sitesadmin/menu/footer.php';

?>