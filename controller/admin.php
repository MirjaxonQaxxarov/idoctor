<?php


if ( ($RouteArray[1] == 'locadmin') and  ($RouteArray[2] == 'login') ){
    try {
        if (!file_exists("./view/sitesadmin/login.php")){
            echo "<script>console.log('File does not found!')</script>";
            throw new Exception ('File does not exist');
        }
        else
            require_once("./view/sitesadmin/login.php");
    }
    catch (Exception $e) {

    }

}elseif (  ($RouteArray[1] == 'locadmin') and ($RouteArray[2] == 'core') ){
    try {
        if (!file_exists("./view/core.php")){
            echo "<script>console.log('File does not found!')</script>";
            throw new Exception ('File does not exist');
        }
        else
            require_once("./view/core.php");
    }
    catch (Exception $e) {

    }
}


elseif (  ($RouteArray[1] == 'locadmin') and ($RouteArray[2] == 'logout') ){
    try {
        if (!file_exists("./view/logout.php")){
            echo "<script>console.log('File does not found!')</script>";
            throw new Exception ('File does not exist');
        }
        else
            require_once("./view/logout.php");
    }
    catch (Exception $e) {

    }
}


elseif ( ($RouteArray[1] == 'locadmin') and  ($RouteArray[2] == 'add') ){
    try {
        if (!file_exists("./controller/add.php")){
            echo "<script>console.log('File does not found!')</script>";
            throw new Exception ('File does not exist');
        }
        else
            require_once("./controller/add.php");
    }
    catch (Exception $e) {

    }
}
elseif ( ($RouteArray[1] == 'locadmin') ){

    try {
        if (!file_exists("./view/viewadmin.php")){
            echo "<script>console.log('File does not found!')</script>";
            throw new Exception ('File does not exist');
        }
        else
            require_once("./view/viewadmin.php");
    }
    catch (Exception $e) {

    }
}