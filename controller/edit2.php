<?php
$ret= [];
//print_r($_POST);
//print_r($_SESSION);
if (!isset($_POST['_csrf'])){
    header('Location: /locadmin/index');
    exit();
}
if($_POST['_csrf']!=SS::gs('_csrfedit')){
    $ret += ['xatolik' => "1"];
	$ret += ['xabar' => "Taqiqlangan so'rov"];

}
else{

		$table = str_rot13($RouteArray['4']);
		$obj = [];
		require_once './model/model.php';
        $fe = Functions::getbytable($table,'un_id=:ui',array('ui'=>$_POST['id']));
        $no=0;
        $id=0;
        foreach ($fe as $val){
            $id=$val['id'];
            $no++;
        }
    foreach ($_POST as $key => $value){
        if ($key != '_csrf') {
            $obj += [clean($key) => ($value)];
        }

    }
        if ($no==0){
            $ret += ['xatolik' => "1"];
            $ret += ['xabar' => "Malumot topilmadi!"];
            echo  json_encode($ret);
            exit();
        }

        $obj['id']=$id;
		$keycheck=0;
		foreach ($_FILES as $key => $value){
			  $file='';
			  $keycheck = 1;
			  if (!empty($value)) {
			    $target_dir="./files/images/".clean($key)."/";
				if (!is_dir($target_dir)) {
					mkdir($target_dir);
				}
			  $keycheck = 2;
			  $y=md5(time());
			    $tip = strtolower(pathinfo($value["name"],PATHINFO_EXTENSION));
				$listfile = json_decode(file_get_contents('./listfiles.json'));
				$key1 = array_search($tip, $listfile);
				if (is_numeric($key1)) {
					$keycheck = 3;
					$value["name"]=clean($key)."_".$y.".".$tip;
					$target_file=$target_dir.basename($value["name"]);
					if (move_uploaded_file($value["tmp_name"], $target_file)){
						$file=$value["name"];
						$obj += [clean($key) => ($file)];
					}
				}
			}
		}
		if (true){
			$fetch = Functions::edit($obj,$table);
			if ($fetch) {
				$ret += ['xatolik' => "0"];
				$ret += ['xabar' => "Ma'lumot kiritildi!"];
			}			
			else{
				$ret += ['xatolik' => "1"];
				$ret += ['xabar' => "Ma'lumotda kamchilik bor!"];
				}
		}
				

}
echo json_encode($ret);
 ?>