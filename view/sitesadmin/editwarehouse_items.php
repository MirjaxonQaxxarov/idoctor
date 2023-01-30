<?php
$_SESSION['_csrfadd'] = md5(time());


$un_id=time();
$keyuser=rand(1000,9999);

$_SESSION['keyuser']=$keyuser;

?>
<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> <? if (isset($routes[$RouteArray['2']]["params"]["mtitle"])) echo $routes[$RouteArray['2']]["params"]["mtitle"]; else echo "Error";?></h1>
            <p>Yangi <? if (isset($routes[$RouteArray['2']]["params"]["mtitle"])) echo $routes[$RouteArray['2']]["params"]["mtitle"]; else echo "Error";?> </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><? if (isset($routes[$RouteArray['2']]["params"]["mtitle"])) echo $routes[$RouteArray['2']]["params"]["mtitle"]; else echo "Error";?></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title"><? if (isset($routes[$RouteArray['2']]["params"]["mtitle"])) echo $routes[$RouteArray['2']]["params"]["mtitle"]; else echo "Error";?></h3>
                <h6 style="color: red"  id="error" class="tile-title"></h6>
                <div class="tile-body">

                            <form id="form">
                                <div class="form-group">
                                    <label class="control-label">Dorini tanlang</label>
                                    <select name="medicament_id" id="medicament_id"   class="form-control">
                                        <option value="0">--Tanlang--</option>
                                        <?php
                                        $fetch=Functions::getall("medicaments");
                                        foreach ($fetch  as  $value) {
                                            echo"<option value=\"".$value['id']."\">".$value['name']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Packageni tanlang</label>
                                    <input  type="hidden" name="_csrf" value="<?=$_SESSION['_csrfadd']?>" id="_csrf">
                                    <select name="package_id" id="package_id"   class="form-control">
                                        <option value="0">--Tanlang--</option>
                                        <?php
                                        $fetch=Functions::getall("package");
                                        foreach ($fetch  as  $value) {
                                            echo"<option value=\"".$value['id']."\">".$value['package_type']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Olingan narx</label>
                                    <input required class="form-control" name="price_in" type="number"  placeholder="">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Sotish narx</label>
                                    <input required class="form-control" name="price_out" type="number"  placeholder="">
                                </div>
                        <div class="form-group">
                            <label class="control-label">Soni</label>
                            <input required class="form-control" name="count" type="number" placeholder="">
                        </div>
                    </form>
                </div>
                <div class="tile-footer">
                    <button id="okru" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Saqlash</button>&nbsp;&nbsp
                </div>
            </div>
        </div>

        <div class="clearix"></div>

    </div>
</main>


<script src="/locadmin/js/jquery-3.3.1.min.js"></script>

<script>


    let submitBtn = document.getElementById('okru');
    submitBtn.addEventListener("click", function submit(e) {
        e.preventDefault();
        $.ajax({
            url: "/locadmin/add/password=<?=str_rot13("Rememberme")?>&token=<?=str_rot13("kvjdfvdfkj@dsd.fd")?><?=4*$keyuser?>/<?=str_rot13('warehouse_items')?>/",
            type: 'POST',
            processData: false,
            contentType: false,
            data: new FormData($("#form")[0]),
            success: function (data) {
                console.log(data);

                // document.getElementById('editoruz').setAttribute('name','editoruz');
                try {
                    var obj = jQuery.parseJSON(data);
                    if (obj.xatolik == 0) {
                        document.getElementById('error').innerHTML = "Ma`lumotlar saqlandi";
                        setTimeout(() => {
                            document.getElementById("form").reset();
                        }, 1000);
                    } else {
                        document.getElementById('error').innerHTML = "Ma`lumotlar saqlanmadi!";
                    }
                }catch ( e ){
                    document.getElementById('error').innerHTML = "Noma`lum  xatolik!";
                }
            },
            error: function () {
                document.getElementById('error').innerHTML="Aloqa uzilib qoldi!";
            },
        });
    });




</script>
