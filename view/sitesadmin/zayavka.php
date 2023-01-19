
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Dori yetkazib berish</h1>
            <h1></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
<!--            <li class="breadcrumb-item"><a href="/locadmin/addmedicaments/"><i class="fa fa-plus"></i> Yangi Dorilar kiritish</a></li>-->
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="stble">
                            <thead>
                            <tr>
                                <th>Clent ismi</th>
                                <th>Clent address</th>
                                <th>Clent telefon</th>
                                <th>Dorilar</th>
                                <th>Jami summa</th>
                                <th>Vaqti</th>
                                <th>Holat</th>
                                <th>Retsept</th>
                            </tr>
                            </thead>
                            <tbody>

                    <?php


                    $_SESSION['_csrfzay'] = md5(time());
                    $fetch = Functions::getbytable("sale_order",'1 order by`date` ASC',array());
                    $no=0;
                    foreach($fetch as $value) {

                        $no++;
                        $found = 0;
                        $clientn="";
                        $clienta="";
                        $clientp="";
                        $fetch2=Functions::getbyid("clients",$value['client_id']);
                        foreach ($fetch2 as $value2){
                            $clientn=$value2['client_fio'];
                            $clienta=$value2['address'];
                            $clientp=$value2['phone'];
                        }

                        $mname="";
                        $count="";
                        $m_id="";
                        $alldori='';
                        $fetch4=Functions::getbytable("order_items",'order_id=:oid',array("oid"=>$value['id']));
                        foreach ($fetch4 as $value4){
                            $count=$value4['count'];
                            $m_id=$value4['medicament_id'];
                            $fetch5=Functions::getbyid("medicaments",$m_id);
                            foreach ($fetch5 as $value5){
                                $mname=$value5['name'];

                            }
                            $alldori.= $mname." ".$count.'ta<br>';
                        }
                        $dis='';
                        if ($value['status']==0){
                            $colorr='#e990b8';
                            $sect='<option value="0">Tugatilmadi</option><option value="1">Tugatildi</option><option value="2">Bekor qilindi</option>';
                        }
                        elseif ($value['status']==2) {
                            $colorr='#9c9c9c';
                            $sect='<option value="2">Bekor qilindi</option>';
                            $dis='disabled';

                        }
                    else {
                            $colorr='#53ba6b';
                            $sect='<option value="1">Tugatildi</option>';
                            $dis='disabled';

                        }
                        echo('
                           <tr id="col" style="background-color:'.$colorr.'">
                                <td>' . $clientn . '</td>
                                <td>' . $clienta . '</td>
                                <td>' . $clientp . '</td>
                                <td>' . $alldori . '</td>
                                <td>' . $value['summ'] . '</td>
                                <td>' . date("Y/m/d",strtotime($value['date'])) . '</td>
                                <td id="res'.$value['id'].'"><select class="form-control chenchsts" data-index="'.$value['id'].'"  style="background: transparent" '.$dis.' >'.$sect.' </select></td>
                                <td><img src="/files/images/orderimg/' . $value['orderimg'] . '" alt="' . $clientn . '" width="100px"></td>
                            </tr>');
                        }
                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/locadmin/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/locadmin/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/locadmin/js/plugins/dataTables.bootstrap.min.js"></script>

<script>

    let analogsbtn = document.querySelectorAll('.chenchsts');
    analogsbtn.forEach((item)=>{
        item.addEventListener('change',()=>{
            Swal.fire({
                title: 'O`zgartirishga ishonchingiz komilmi?',
                showDenyButton: true,
                confirmButtonText: 'O`zgartirish',
                denyButtonText: `Bekor qilish`,
            }).then((result) => {
                if (result.isConfirmed) {

                    let ind = item.dataset.index;
                    let val = item.value;
                    $.ajax({
                        url: "/api/zayavka/",
                        type: 'POST',
                        data: {'token':'<?=$_SESSION['_csrfzay']?>','zay': ind,'val': val},
                        success: function (data) {
                            Swal.fire('O`zgartirildi!', '', 'success');
                            if (val==1) {
                                document.getElementById('col').style = 'background-color:#53ba6b';
                                document.getElementById('res'+ind).innerHTML='<select class="form-control chenchsts" style="background: transparent"  disabled ><option value="1">Tugatildi</option></section>';
                            }
                            else{
                                document.getElementById('col').style = 'background-color:#9c9c9c';
                                document.getElementById('res'+ind).innerHTML='<select class="form-control chenchsts" style="background: transparent"  disabled ><option value="2">Bekor qilindi</option></section>';
                            }

                        }
                    })
                } else if (result.isDenied) {
                    this.value='0';
                    Swal.fire('O`zgartirish bekor qilindi', '', 'info')
                }
            })

        })
    })



        $('#stble').DataTable({
            order: [[6, 'desc']],
        });

</script>