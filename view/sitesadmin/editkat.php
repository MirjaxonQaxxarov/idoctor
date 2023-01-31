<?php
if (isset($RouteArray[3])) {
    $id=(int)($RouteArray[3]);
    $pid=substr($id, 4);
    $pid=strrev($pid);
    $pid=substr($pid, 4);
    $id=intval(strrev($pid));
}else{
    exit();
}
$un_id=$id;
SS::ns('_csrfedit',md5(time()));
$no=0;
$fetchuz=Functions::getbyid('rank',$id);
foreach ($fetchuz as $valuz){
$no++;
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> <?php if (isset($routes[$RouteArray['2']]["params"]["mtitle"])) echo $routes[$RouteArray['2']]["params"]["mtitle"]; else echo "Error";?></h1>
            <p>Yangi <?php if (isset($routes[$RouteArray['2']]["params"]["mtitle"])) echo $routes[$RouteArray['2']]["params"]["mtitle"]; else echo "Error";?></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><?php if (isset($routes[$RouteArray['2']]["params"]["mtitle"])) echo $routes[$RouteArray['2']]["params"]["mtitle"]; else echo "Error";?></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title"><?php if (isset($routes[$RouteArray['2']]["params"]["mtitle"])) echo $routes[$RouteArray['2']]["params"]["mtitle"]; else echo "Error";?></h3>
                <h6 style="color: red"  id="error" class="tile-title"></h6>
                <div class="tile-body">
                    <form id="form">
                        <div class="form-group">
                            <label class="control-label">Nomi</label>
                            <input required class="form-control" name="name" value="<?=$valuz['name']?>" type="text" placeholder="">
                            <input required class="form-control" name="id" value="<?=$valuz['id']?>" type="hidden" placeholder="">
                            <input  type="hidden" name="_csrf" value="<?=SS::gs('_csrfedit')?>" id="_csrf">

                        </div>
                    </form>
                </div>
                <div class="tile-footer">
                    <button id="ok1" class="btn btn-primary" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Saqlash</button>&nbsp;&nbsp
                </div>
            </div>
        </div>

        <div class="clearix"></div>

    </div>
</main>

<?php
}
?>
<script>

    let submitBtn = document.getElementById('ok1');
    submitBtn.addEventListener("click", function submit(e) {
        e.preventDefault();
        $.ajax({
            url: "/locadmin/edit2/password=<?=str_rot13("Rememberme")?>&token=<?=str_rot13("kvjdfvdfkj@dsd.fd")?><?=4*$keyuser?>/<?=str_rot13('rank')?>/",
            type: 'POST',
            processData: false,
            contentType: false,
            data: new FormData($("#form")[0]),
            success: function (data) {
                console.log(data);

                var obj = data;
                if (obj.xatolik==0) {
                    document.getElementById('error').innerHTML="Malumotlar saqlandi";
                    setTimeout(() => {
                        location.href = "/locadmin/rank";
                    }, 1000);
                } else {
                    $('#_csrf').val(obj._csrf);
                    document.getElementById('error').innerHTML="Nomalum  xatolik!";
                }
            },
            error: function () {
                document.getElementById('error').innerHTML="Aloqa uzilib qoldi!";
            },
        });
    });

</script>
