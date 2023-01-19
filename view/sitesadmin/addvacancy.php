<?php
session_start();
$_SESSION['_csrfadd'] = md5(time());


$keyuser=rand(1000,9999);

$_SESSION['keyuser']=$keyuser;

?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> <? if (isset($routes[$RouteArray['2']]["params"]["mtitle"])) echo $routes[$RouteArray['2']]["params"]["mtitle"]; else echo "Error";?></h1>
            <p>Yangi <? if (isset($routes[$RouteArray['2']]["params"]["mtitle"])) echo $routes[$RouteArray['2']]["params"]["mtitle"]; else echo "Error";?></p>
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
                            <input  type="hidden" name="_csrf" value="<?=$_SESSION['_csrfadd']?>" id="_csrf">
                            <label class="control-label">Doctorni tanlang</label>
                            <select name="doctorid" id="doctorid"   class="form-control">
                                <option value="0">--Tanlang--</option>
                                <?php
                                $fetch=Functions::getall("doctor");
                                foreach ($fetch  as  $value) {
                                    echo"<option value=\"".$value['id']."\">".$value['fullname']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Konsultatsiya vaqti</label>
                            <input required class="form-control" name="consultationtime" type="text" value="Maslahat vaqti to'lovdan keyin kelishiladi">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Boshlang`ich narx</label>
                            <input required class="form-control" name="price" type="text" placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Manzil</label>
                            <input required class="form-control" name="address" type="text" placeholder="">
                        </div>
                    </form>
                </div>
                <div class="tile-footer">
                    <button id="ok1" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Saqlash</button>&nbsp;&nbsp
                </div>
            </div>
        </div>

        <div class="clearix"></div>

    </div>
</main>


<script>

    let submitBtn = document.getElementById('ok1');
    submitBtn.addEventListener("click", function submit(e) {
        e.preventDefault();
        $.ajax({
            url: "/locadmin/add/password=<?=str_rot13("Rememberme")?>&token=<?=str_rot13("kvjdfvdfkj@dsd.fd")?><?=4*$keyuser?>/<?=str_rot13('consultation')?>/",
            type: 'POST',
            processData: false,
            contentType: false,
            data: new FormData($("#form")[0]),
            success: function (data) {
                console.log(data);

                var obj = jQuery.parseJSON(data);
                if (obj.xatolik==0) {
                    document.getElementById('error').innerHTML="Malumotlar saqlandi";
                    setTimeout(() => {
                        location.href = "/locadmin/online-consult";
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
