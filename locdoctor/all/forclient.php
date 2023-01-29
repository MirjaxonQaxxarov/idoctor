<?php
$ret= [];
//print_r($_POST);
//print_r($_FILES);
//print_r($_SESSION);
if (!isset($_POST['_csrf'])){
    header('Location: /locadmin/index');
    exit();
}
if($_POST['_csrf']!=$_SESSION['_csrfcli']){
    $ret += ['xatolik' => "1"];
    $ret += ['xatoli1' => $_POST['_csrf']];
    $ret += ['xatoli2' => $_SESSION['_csrfcli']];
    $ret += ['xabar' => "Taqiqlangan so'rov"];

}
else {
    $soni = 0;
    $checkall = true;

    if (true) {

        $obj = [];
        $objsale = [];
        $objcli = [];
        $objorder = [];
        require_once './model/model.php';
        $fetch = Functions::getbytable('clients', 'phone=:ph', array('ph' => $_POST['phone']));
        $cli_id = 0;
       Functions::begintran();

        foreach ($fetch as $value) {
            $cli_id = $value['id'];
        }
        if ($cli_id == 0) {
            $objcli += ['client_fio' => $_POST['name']];
            $objcli += ['address' => $_POST['adress']];
            $objcli += ['phone' => $_POST['phone']];
            $fetch1 = Functions::add($objcli, 'clients');
            if (!$fetch1) {
                $checkall = false;
            } else {
                $fetch2 = Functions::getbytable('clients', 'phone=:ph', array('ph' => $_POST['phone']));
                foreach ($fetch2 as $value) {
                    $cli_id = $value['id'];
                }
            }
        }


//        ITEM
        $allcount = 0;
        $allprice = 0;
        $order_id = 0;
        $un_id = time();

        foreach ($_POST as $key => $val) {
            $teg = explode("_", htmlspecialchars($key));
            if ($teg[0] == 'item') {
                $allcount += intval($val);
                $narx = 0;
                $m_id = $teg[1];
                $fetch3 = Functions::getbytable('warehouse_items', 'medicament_id=:ph', array('ph' => $m_id));
                foreach ($fetch3 as $value3) {
                    $narx = $value3['price_out'];
                }
                $allprice += intval($narx) * intval($val);
            }
        }


        $keycheck = 0;
        foreach ($_FILES as $key => $value) {
            $file = '';
            $keycheck = 1;
            if (isset($value)) {
                $target_dir = "./files/images/" . clean($key) . "/";
                if (!is_dir($target_dir)) {
                    mkdir($target_dir);
                }
                $keycheck = 2;
                $y = md5(time());
                $tip = strtolower(pathinfo($value["name"], PATHINFO_EXTENSION));
                $listfile = json_decode(file_get_contents('./listfiles.json'));
                $key1 = array_search($tip, $listfile);
                if (is_numeric($key1)) {
                    $keycheck = 3;
                    $value["name"] = clean($key) . "_" . $y . "." . $tip;
                    $target_file = $target_dir . basename($value["name"]);
                    if (move_uploaded_file($value["tmp_name"], $target_file)) {
                        $file = $value["name"];
                        $objsale += [clean($key) => ($file)];
                    }
                }
            }
        }

        $objsale += ['client_id' => $cli_id];
        $objsale += ['count_total' => $allcount];
        $objsale += ['summ' => $allprice];
        $objsale += ['un_id' => $un_id];
        $fetch10 = Functions::add($objsale, 'sale_order');

        if (!$fetch10) {
            $checkall = false;
        } else {
            $fetch2 = Functions::getbytable('sale_order', 'un_id=:ph', array('ph' => $un_id));
            foreach ($fetch2 as $value) {
                $order_id = $value['id'];
            }
        }

//        ORDER


        foreach ($_POST as $key1 => $val1) {
            $teg = explode("_", htmlspecialchars($key1));
            $objorder = [];
            if ($teg[0] == 'item') {
                $m_id = $teg[1];
                $objorder += ['medicament_id' => $m_id];
                $objorder += ['count' => intval($val1)];
                $objorder += ['order_id' => $order_id];
                $fetch1 = Functions::add($objorder, 'order_items');

                if (!$fetch1) {
                    $checkall = false;
                }
            }
        }
        if ($checkall) {
            Functions::endtran();
            $ret += ['xatolik' => "0"];
            $ret += ['xabar' => "Ma'lumot kiritildi!"];
            $ret += ['_csrf' => $_SESSION['_csrfcli']];
        }
        else{
            Functions::bekor();
            $ret += ['xatolik' => "1"];
            $ret += ['xabar' => "Ma'lumotda kamchilik bor!"];
            $ret += ['_csrf' => $_SESSION['_csrfcli']];
        }
    }
}




echo json_encode($ret);
 ?>