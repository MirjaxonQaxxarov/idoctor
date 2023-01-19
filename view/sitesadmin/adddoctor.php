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

                    <div class="row">
                        <div class="col-6" style="border:1px solid silver ">
                            <form id="form_uz">
                                <div class="row ml-1">
                                    <h4>
                                        O`zbekcha
                                    </h4>
                                </div>
                        <div class="form-group">
                            <label class="control-label">Ism</label>
                            <input required class="form-control" name="fullname" type="text" placeholder="">
                            <input  type="hidden" name="_csrf" value="<?=$_SESSION['_csrfadd']?>" id="_csrf">
                            <input  type="hidden" name="un_id" value="<?=$un_id?>" id="un_id">

                        </div>
                        <div class="form-group">
                            <label class="control-label">Darajani tanlang</label>
                            <select name="rankid" id="rankid"   class="form-control">
                                <option value="0">--Tanlang--</option>
                                <?php
                                $fetch=Functions::getall("rank");
                                foreach ($fetch  as  $value) {
                                    echo"<option value=\"".$value['id']."\">".$value['name']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Klinikani tanlang</label>
                            <select name="clinicid" id="clinicid"   class="form-control">
                                <option value="0">--Tanlang--</option>
                                <?php
                                $fetch=Functions::getall("clinic");
                                foreach ($fetch  as  $value) {
                                    echo"<option value=\"".$value['id']."\">".$value['name']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tajriba</label>
                            <input required class="form-control" name="experiment" type="text" placeholder="">
                        </div>
                                <div class="form-group">
                                    <label class="control-label">Umumiy ma`lumot</label>
                                    <textarea id="editoruz" required class="form-control " name="editoruz"   placeholder=""></textarea>
                                    <input id="aboutuz" type="hidden" name="about" value="">
                                </div>
                        <div class="form-group">
                            <label class="control-label">Telefon</label>
                            <input required class="form-control" name="phone" type="text" placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Telegram</label>
                            <input required class="form-control" name="telegram" type="text" placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input required class="form-control" name="email"  type="email" placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Manzil</label>
                            <input required class="form-control" name="location" type="text" placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Rasm</label>
                            <input  class="form-control" name="doctor" type="file">
                        </div>
                    </form>
                        </div>
                        <div class="col-6" style="border:1px solid silver ">
                            <form id="form_ru">
                                <div class="row ml-1">
                                    <h4>
                                        Ruscha
                                    </h4>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Ism</label>
                                    <input required class="form-control" name="fullname" type="text" placeholder="">
                                    <input  type="hidden" name="_csrf" value="<?=$_SESSION['_csrfadd']?>" id="_csrf">
                                    <input  type="hidden" name="un_id" value="<?=$un_id?>" id="un_id">


                                </div>
                                <div class="form-group">
                                    <label class="control-label">Darajani tanlang</label>
                                    <select name="rankid" id="rankid"   class="form-control">
                                        <option value="0">--Tanlang--</option>
                                        <?php
                                        $fetch=Functions::getall("rank");
                                        foreach ($fetch  as  $value) {
                                            echo"<option value=\"".$value['id']."\">".$value['name']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Klinikani tanlang</label>
                                    <select name="clinicid" id="clinicid"   class="form-control">
                                        <option value="0">--Tanlang--</option>
                                        <?php
                                        $fetch=Functions::getall("clinic");
                                        foreach ($fetch  as  $value) {
                                            echo"<option value=\"".$value['id']."\">".$value['name']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tajriba</label>
                                    <input required class="form-control" name="experiment" type="text" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Umumiy ma`lumot</label>
                                    <textarea id="editorru" required class="form-control " name="editorru"   placeholder=""></textarea>
                                    <input id="aboutru" type="hidden" name="about" value="">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Telefon</label>
                                    <input required class="form-control" name="phone" type="text" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Telegram</label>
                                    <input required class="form-control" name="telegram" type="text" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input required class="form-control" name="email"  type="email" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Manzil</label>
                                    <input required class="form-control" name="location" type="text" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Rasm</label>
                                    <input  class="form-control" name="doctor" type="file">
                                </div>

                                <div class="form-group">
                                    <button id="okru"  class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Saqlash</button>&nbsp;&nbsp
                                </div>
                            </form>
                        </div>
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
        const editorData =  CKEDITOR.instances.editoruz.getData();
        document.getElementById('editoruz').removeAttribute('name');
        document.getElementById("aboutuz").value=editorData;
        const editorDataru =  CKEDITOR.instances.editorru.getData();
        document.getElementById('editorru').removeAttribute('name');
        document.getElementById("aboutru").value=editorDataru;
        $.ajax({
            url: "/locadmin/add/password=<?=str_rot13("Rememberme")?>&token=<?=str_rot13("kvjdfvdfkj@dsd.fd")?><?=4*$keyuser?>/<?=str_rot13('doctor')?>/",
            type: 'POST',
            processData: false,
            contentType: false,
            data: new FormData($("#form_uz")[0]),
            success: function (data) {
                console.log(data);

                document.getElementById('editoruz').setAttribute('name','editoruz');
                try {
                    var obj = jQuery.parseJSON(data);
                    if (obj.xatolik == 0) {
                        document.getElementById('error').innerHTML = "Ma`lumotlar saqlandi";
                        setTimeout(() => {
                            document.getElementById("form_uz").reset();
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
        $.ajax({
            url: "/locadmin/add/password=<?=str_rot13("Rememberme")?>&token=<?=str_rot13("kvjdfvdfkj@dsd.fd")?><?=4*$keyuser?>/<?=str_rot13('doctor_ru')?>/",
            type: 'POST',
            processData: false,
            contentType: false,
            data: new FormData($("#form_ru")[0]),
            success: function (data) {
                console.log(data);

                document.getElementById('editorru').setAttribute('name','editorru');
                try {
                    var obj = jQuery.parseJSON(data);
                    if (obj.xatolik == 0) {
                        document.getElementById('error').innerHTML = "Ma`lumotlar saqlandi";
                        setTimeout(() => {
                            document.getElementById("form_ru").reset();
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




    CKEDITOR.replace( 'editorru' );
    CKEDITOR.replace( 'editoruz' );

</script>
