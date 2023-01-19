<?php
$ret= [];
//print_r($_POST);
//print_r($_SESSION);
if (!isset($_POST['_csrf'])){
    header('Location: /locadmin/index');
    exit();
}
if($_POST['_csrf']!=$_SESSION['_csrfadd']){
    $ret += ['xatolik' => "1"];
    $ret += ['xatoli1' => $_POST['_csrf']];
    $ret += ['xatoli2' => $_SESSION['_csrfadd']];
	$ret += ['xabar' => "Taqiqlangan so'rov"];

}
else{
    $soni=0;
	$s1 = "";
	foreach ($_POST as $key => $value){
		$soni++;
	}
	foreach ($_FILES as $key => $value){
		$soni++;
	}
	if (true) {
		$table = str_rot13($RouteArray['4']);
		$obj = [];
		require_once './model/model.php';
		foreach ($_POST as $key => $value){
			if ($key != '_csrf') {
				$obj += [clean($key) => ($value)];
			}

		}
		$keycheck=0;
		foreach ($_FILES as $key => $value){
			  $file='';
			  $keycheck = 1;
			  if (isset($value)) {
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
		if ($keycheck==2) {
			$ret += ['xatolik' => "1"];
			$ret += ['xabar' => "Fayl turida xatolik!"];
			$ret += ['_csrf' => $_SESSION['_csrf']];
		}else{
//            print_r($obj);
			$fetch = Functions::add($obj,$table);
			if ($fetch) {
				$ret += ['xatolik' => "0"];
				$ret += ['xabar' => "Ma'lumot kiritildi!"];
				$ret += ['_csrf' => $_SESSION['_csrfadd']];
			}			
			else{
				$ret += ['xatolik' => "1"];
				$ret += ['xabar' => "Ma'lumotda kamchilik bor!"];
				$ret += ['_csrf' => $_SESSION['_csrfadd']];
				}
		}
				
	}
	else{
		$ret += ['xatolik' => "1"];
		$ret += ['xabar' => "Ma'lumot Yetarli emas! "];
		$ret += ['_csrf' => $_SESSION['_csrf']];
	}
}
echo json_encode($ret);
 ?>