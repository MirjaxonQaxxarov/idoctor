<?php
session_start();
$sLifeTime=5*60;
$refTime=4;

class SS
{

    static public function ns($name,$val){
        $time=time();
        global $refTime;
        if (isset($_SESSION[$name])){
            if (time()-$_SESSION[$name.'/time']>=$refTime){
                $_SESSION[$name]=$val;
                $_SESSION[$name.'/time']=$time;
            }
        }else{
            $_SESSION[$name]=$val;
            $_SESSION[$name.'/time']=$time;
        }

    }

    static public  function gs($name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        } else
            return false;
    }

    static public function ds(){
        global $sLifeTime;
        foreach ($_SESSION as $key => $value){
            $key2=$key.'/';
            $sarr=explode('/',$key2);
            if ($sarr[1]=='time'){
                if (time()-$value>=$sLifeTime){
                    unset($_SESSION[$key]);
                    unset($_SESSION[$sarr[0]]);
                }

            }
        }
    }
}
//SS::ns('salom','fdf');
//SS::ds();

