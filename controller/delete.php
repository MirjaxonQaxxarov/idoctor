<?
$ret = [];
	if (isset($_POST['id'])) {

		if($_POST['token']!=SS::gs('del_once')){
			$ret += ['xatolik' => "1"];
			$ret += ['xabar' => "Taqiqlangan so'rov"];
//			$ret += ['token' => SS::gs('del_once')];
		}
		else{

            require_once './model/model.php';
			$id = $_POST['id'];
            $pid=substr($id, 4);
            $pid=strrev($pid);
            $pid=substr($pid, 4);
            $id=intval(strrev($pid));
            $table = str_rot13($RouteArray['4']);

//			$fetch = Functions::delete($table,$id);
			if (true) {
			$ret += ['xatolik' => "0"];
			$ret += ['xabar' => "Ma'lumot o`chirildi!"];
			$ret += ['token' => SS::gs('del_once')];
			}
			else{
			$ret += ['xatolik' => "1"];
			$ret += ['xabar' => "Nimadur xato ketdi"];
			$ret += ['token' => SS::gs('del_once')];
			}
				
		}

	}
    echo json_encode($ret);
?>