<?php
$ret= [];
//print_r($_POST);
//print_r($_FILES);
//print_r($_SESSION);

if($_POST['token']!=$_SESSION['_csrfzay']){
    $ret += ['xatolik' => "1"];
    $ret += ['xatoli2' => $_SESSION['_csrfzay']];
    $ret += ['xabar' => "Taqiqlangan so'rov"];

}
else {
    $soni = 0;
    $checkall = true;

    if (true) {

        $objzay = [];
        require_once './model/model.php';


            $objzay += ['status' => intval($_POST['val'])];
            $objzay += ['id' => intval($_POST['zay'])];
//            print_r($objzay);
            $fetch1 = Functions::edit($objzay, 'sale_order');
        if ($fetch1) {
            $ret += ['xatolik' => "0"];
            $ret += ['xabar' => "Ma'lumot kiritildi!"];
            $ret += ['_csrf' => $_SESSION['_csrfzay']];
        }
        else{
            $ret += ['xatolik' => "1"];
            $ret += ['xabar' => "Ma'lumotda kamchilik bor!"];
            $ret += ['_csrf' => $_SESSION['_csrfzay']];
        }
        }


}




echo json_encode($ret);
 ?>