<?php
SS::ns('del_once',md5(time()));
SS::ns('edit_once',md5(time()));
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Daraja</h1>
            <h1></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><a href="/locadmin/addrank/"><i class="fa fa-plus"></i> Yangi Daraja kiritish</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h5 id="error"></h5>
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Uskunalar</th>
                            </tr>
                            </thead>
                            <tbody>

                    <?php
                    $fetch = Functions::getall("rank");
                    $no=0;
                    foreach($fetch as $value) {

                        $no++;
                        $found = 0;
                        $rank="";

                    {?>
                            <tr>
                                <td><?= $value['id'] ?></td>
                                <td><?= $value['name'] ?></td>
                        <td><i  style="color: green" onclick="if(confirm('Tahrirlaysizmi?')){fedit('<?=$keyuser.$value['id'].$keyuser ?>')};" class="ml-1 fa fa-2x fa-pen-alt"></i>
                            <i style="color: red" onclick="if(confirm('Chindan xam o`chirmoqchimisiz?')){fdel('<?=$keyuser.$value['id'].$keyuser ?>')};" class=" ml-1 fa fa-2x fa-trash"></i>
                        </td>
                            </tr><?php
                    }
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
<script>
    function fedit(id) {
        window.location='/locadmin/editrank/'+id+'/'+'<?=SS::gs('edit_once')?>/';
    }
    function fdel(id) {
        $.ajax({
            url: "/locadmin/delete/password=<?=str_rot13("Rememberme")?>&token=<?=str_rot13("kvjdfvdfkj@dsd.fd")?><?=4*$keyuser?>/<?=str_rot13('rank')?>/",
            type: 'POST',
            data: {
                id:id,
                token:'<?=SS::gs('del_once')?>'
            },
            success: function (data) {
                try {
                    var obj = data;
                    if (true) {
                        document.getElementById('error').innerHTML = "Ma`lumotlar o`chirildi";
                        setTimeout(() => {
                            document.getElementById('error').innerHTML = "";
                            window.location.reload();
                        }, 1000);
                    } else {
                        document.getElementById('error').innerHTML = "Ma`lumotlar o`chirilmadi!";
                        setTimeout(() => {
                            document.getElementById('error').innerHTML = "";
                        }, 3000);
                    }
                }catch ( e ){
                    document.getElementById('error').innerHTML = "Noma`lum  xatolik!";
                    setTimeout(() => {
                        document.getElementById('error').innerHTML = "";
                    }, 3000);
                }
            },
            error: function () {
                document.getElementById('error').innerHTML="Aloqa uzilib qoldi!";
                setTimeout(() => {
                    document.getElementById('error').innerHTML = "";
                }, 3000);
            },
        });
    }
</script>