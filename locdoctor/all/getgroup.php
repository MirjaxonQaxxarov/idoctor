<?
$ret= [];
if($_POST['token']!=$_SESSION['_csrfgroup'] ){
    $ret += ['xatolik' => $RouteArray['4'].' '.$_SESSION['for_chat']];
    $ret += ['xatoli2' => $_POST['token']." ".$_SESSION['_csrfchat']];
    $ret += ['xabar' => "Taqiqlangan so'rov"];

    echo json_encode($ret);
    exit();
}


?>

    <tr>
    <th></th>
    <th>Rasm</th>
    <th>Preparat nomi</th>
    <th>Ishlab chiqaruvchi</th>
    <th>Narxi</th>
    <th>Qo'llanilishi</th>
    <th>Retsept</th>
    <th>Farmakologik xususiyati</th>
</tr>

<?php
$fid = $_POST['farm'];
$fetch = Functions::getbytable("medicaments",'farm_group_id=:fid',array('fid'=>$fid));
$no=0;
foreach($fetch as $value) {

    $no++;
    $found = 0;
    $price='';
    $fetch1=Functions::getbytable("warehouse_items",'medicament_id=:cl',array("cl"=>$value['id']));
    foreach ($fetch1 as $value1){
        $price=$value1['price_out'];
    }
    $farm_group='';
    $farm_group_id='';
    $fetch2=Functions::getbyid("farm_group",$value['farm_group_id']);
    foreach ($fetch2 as $value2){
        $farm_group=$value2['name'];
        $farm_group_id=$value2['id'];
    }
    $purpose='';
    $fetch3=Functions::getbytable("purpose",'medicaments_id=:cl',array("cl"=>$value['id']));
    foreach ($fetch3 as $value3){
        $purpose=$value3['disease'];
    }
    echo('
        <tr>
                    <td><input type="checkbox" class="product-check" data-index="'.$value['id'].'" data-value="'.$value['id'].'|'.$price.'|'.$value['name'].'"></td>

          <td><img src="/assets/images/logo.png" height="30px" alt=""></td>
          <td>'.$value['name'].'</td>
          <td>'.$value['manufacturer_country'].'</td>
          <td>'.$price.'</td>
          <td style="color: green;">'.$purpose.'</td>
          <td style="color: red;">'.$value['form_getaway'].'</td>
          <td style="color: blue;">'.$farm_group.'</td>
          
        </tr>');
}
?>