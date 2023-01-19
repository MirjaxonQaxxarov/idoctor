<?php

///////////////// All Methods\\\\\\\\\\\\\\
///
///
///
///
///
///////////////// ADMIN  all Pages\\\\\\\\\\\\\\
if ( ($RouteArray[1] == 'locadmin') ){
    try {
        if (!file_exists("./controller/admin.php")){
            echo "<script>console.log('File does not found!')</script>";
            throw new Exception ('File does not exist');
        }
        else
            require_once("./controller/admin.php");
    }
    catch (Exception $e) {

    }
}






///////////////// GHOST  all Pages\\\\\\\\\\\\\\
elseif ( ($RouteArray[1] == 'api') ){
    try {
        if (!file_exists("./api/view.php")){
            echo "<script>console.log('File does not found!')</script>";
            throw new Exception ('File does not exist');
        }
        else{

            require_once("./api/view.php");
        }
    }
    catch (Exception $e) {

    }
}


///////////////// GHOST  all Pages\\\\\\\\\\\\\\
else{
    try {
        if (!file_exists("./view/view.php")){
            echo "<script>console.log('File does not found!')</script>";
            throw new Exception ('File does not exist');
        }
        else{
            $lang = $RouteArray[1];
            require_once("./view/view.php");
        }
    }
    catch (Exception $e) {

    }
}

?>