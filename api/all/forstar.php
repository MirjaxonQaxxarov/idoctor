<?php
//if ($_SERVER['REQUEST_METHOD'] != 'POST') {
//    header("location: /error");
//}

$ret= [];
if($_POST['token']!=$_SESSION['_csrfchatdoc'] ){
    $ret += ['xatolik' => '1'];
    $ret += ['xabar' => "Taqiqlangan so'rov"];
}

else{
    $type = str_rot13($RouteArray['5']);
    if ($type=='in') {
        header('Content-Type: application/json; charset=utf-8');
        $table = 'chatfordoc';
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
        }
        else{
            $ret += ['xatolik' => "1"];
            $ret += ['xabar' => "Ma'lumotda kamchilik bor!"];
        }

    }elseif ($type=='out') {
        header('Content-Type: application/json; charset=utf-8');
        $table = 'chatfordoc';
        $ip = $_POST['ip'];
        require_once './model/model.php';
        $obj='';
        $no=0;

        $fetch = Functions::getbytable($table,"ip=:ip ",array("ip"=>$ip));
        foreach ($fetch as  $value){
            $no++;
            if ($value['who']=='user'){
                $obj.='<div class="media media-chat media-chat-reverse"><div class="media-body"><p>'.$value['message'].'</p> </div></div>';
            }else
                $obj.='<div class="media media-chat "><div class="media-body"><p>'.$value['message'].'</p> </div></div>';
        }

        if ($no>0) {
            $ret += ['xatolik' => "0"];
            $ret += ['xabar' => "Xabar mavjud!"];
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