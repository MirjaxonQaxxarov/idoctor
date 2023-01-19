<?php
require_once './model/config.php';



function clean($string) {
    $string = str_replace(' ', '_', $string); // Replaces all spaces with hyphens.

    return strtolower(preg_replace('/[^A-Za-z0-9_\-]/', '', $string)); // Removes special chars.
}


function cleanname($string) {
    $string = str_replace(' ', '_', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9_\-]/', '', $string); // Removes special chars.
}


function getip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

class Logins
{
// LOGIN CHECK BEGIN \\
    static function login($login, $parol)
    {

        global  $link;
        $query="SELECT * FROM `user` WHERE login = :login and password=:password";
        $stmt = $link->prepare($query);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $parol);

        $stmt->execute();

        $result = $stmt->fetch();
        return $result;
    }
// LOGIN CHECK END \\
}

class Functions
{

///////////////////******************GETS******************\\\\\\\\\\\\\\\\\\
//// GET ID VALUE  BEGIN \\
    static function getbytable($table,$query, $array)
    {
        global  $link;
        $qs= "SELECT * FROM `$table` WHERE ".$query;
        $stmt = $link->prepare($qs);
        foreach ($array as $key => &$value) {
            $stmt->bindParam(':'.$key, $value);
        }
        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
    }
// GET ID VALUE  END \\

// GET ID VALUE  BEGIN \\
    static function getbyid($table, $id)
    {
        global  $link;
        $query="SELECT * FROM `$table` WHERE id = :id";
        $stmt = $link->prepare($query);
        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $result = $stmt->fetchAll();
        return $result;
    }
// GET ID VALUE  END \\

// GET ALL  BEGIN \\
    static function getall($table)
    {
        global  $link;
        $query="SELECT * FROM `$table` ";
        $stmt = $link->prepare($query);

        $stmt->execute();

        $result = $stmt->fetchAll();
        return $result;
    }
// GET ALL  END \\


/////////////////******************GETS******************\\\\\\\\\\\\\\\\\\

    static  function add($data,$table){
        global  $link;
        $sql = "INSERT INTO `$table` (";
        foreach ($data as $key => &$value) {
            $sql.="$key , ";
        }
        $sql=rtrim($sql, ", ");
        $sql.=" ) VALUES ( ";
        foreach ($data as $key => &$value) {
            $sql.=":$key , ";
        }
        $sql=rtrim($sql, ", ");
        $sql.=");";
        try {
            $stmt= $link->prepare($sql);
            foreach ($data as $key => &$value) {
                $stmt->bindParam(':'.$key, $value);
            }
            $stmt->execute();
            return true;
        }catch (PDOException $e){
            return false;
        }

    }



    static  function edit($data,$table){
        global  $link;
        $sql = "UPDATE $table SET";
        $vname='';
        $id=0;
        $arr=[];
        foreach ($data as $key => $value) {
            $value1 = $value;
            if($key == "id"){
                $id = $value1;
            }else{
                $vname .= " `$key` = '$value' ,";
                $arr+=[$key=>$value];
            }
        }
        $id=intval($id);

        $sql.= rtrim($vname,",");
        $sql.= " WHERE `id` = $id";
        try {
            $stmt= $link->prepare($sql);


              $stmt->execute();
            return true;
        } catch (PDOException $e) {
            $message = $e->getMessage();

            return false;
            }

    }

    static function begintran(){
        global $link;
        try {
            $link->beginTransaction();
        }catch (PDOException $e){
            $message = $e->getMessage();

        }
    }

    static function endtran(){
        global $link;
        try {

            $link->commit();
        }catch (PDOException $e){
            $message = $e->getMessage();

        }
    }

    static function bekor(){
        global $link;
        try {
            $link->rollBack();
        }catch (PDOException $e){
            $message = $e->getMessage();

        }
    }

    static function getlast(){
        global $link;
        try {
            $link->lastInsertId();
        }catch (PDOException $e){
            $message = $e->getMessage();

        }
    }
}

?>