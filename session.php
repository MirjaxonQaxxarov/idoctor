<?php
session_start();
class SS
{
    static public function ns($name,$val){
        $time=time();
        $_SESSION[$name]=$val;
        $_SESSION[$name.'_time']=$time;
    }

    static public function ds(){
        $time=time();
        foreach ($_SESSION as $key=>$value){

        }
    }
}