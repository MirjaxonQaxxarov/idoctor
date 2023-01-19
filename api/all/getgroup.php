<?php
//if ($_SERVER['REQUEST_METHOD'] != 'POST') {
//    header("location: /error");
//}
print_r($_SESSION);
session_start();
$ret= [];
if($_POST['token']!=$_SESSION['_csrfchat'] or $RouteArray['4']!=$_SESSION['for_chat']){
    $ret += ['xatolik' => $RouteArray['4'].' '.$_SESSION['for_chat']];
    $ret += ['xatoli2' => $_POST['token']." ".$_SESSION['_csrfchat']];
    $ret += ['xabar' => "Taqiqlangan so'rov"];
}

else{
    $type = str_rot13($RouteArray['5']);
    if ($type=='in') {
        header('Content-Type: application/json; charset=utf-8');
        $table = 'chat';
        $obj = [];
        require_once './model/model.php';
        foreach ($_POST as $key => $value){
            if ($key != 'token') {
                $obj += [clean($key) => ($value)];
            }
        }
        $obj += ['who' => 'user'];
            $fetch = Functions::add($obj,$table);
        if ($fetch) {
            $ret += ['xatolik' => "0"];
            $ret += ['xabar' => "Ma'lumot kiritildi!"];
            $randchat=rand(100000,999999);
            $_SESSION['for_chat']=$randchat;
            $_SESSION['_csrfchat'] = md5(time());
            $ret += ['token' => $_SESSION['_csrfchat']];
            $ret += ['chran' => $_SESSION['for_chat']];
        }
        else{
            $ret += ['xatolik' => "1"];
            $ret += ['xabar' => "Ma'lumotda kamchilik bor!"];
        }

    }elseif ($type=='out') {
        header('Content-Type: application/json; charset=utf-8');
        $table = 'chat';
        $ip = $_POST['ip'];
        require_once './model/model.php';
        $obj='';
        $no=0;

        $fetch = Functions::getbytable($table,"ip=:ip ",array("ip"=>$ip));
        foreach ($fetch as  $value){
            $no++;
            if ($value['who']=='user'){
                $obj.='<div class="messageme">            <p>'.$value['message'].'</p>        </div> ';
            }else
                $obj.='<div class="messageother">            <p>'.$value['message'].'</p>        </div> ';
        }

        if ($no>0) {
            $ret += ['xatolik' => "0"];
            $ret += ['xabar' => "Xabar mavjud!"];
            $randchat=rand(100000,999999);
            $_SESSION['for_chat']=$randchat;
            $_SESSION['_csrfchat'] = md5(time());
            $ret += ['token' => $_SESSION['_csrfchat']];
            $ret += ['chran' => $_SESSION['for_chat']];
            $ret += ['message'=>$obj];
        }
        else{
            $ret += ['xatolik' => "1"];
            $ret += ['xabar' => "Xabar yuq!"];
        }

    }
    else{
        $ret += ['xatolik' => "2"];
        $ret += ['xabar' => "Ma'lumot Yetarli emas! "];
    }
}
echo json_encode($ret);
?>