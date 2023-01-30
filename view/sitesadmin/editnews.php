<?php
$_SESSION['_csrfadd'] = md5(time());


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
                            <label class="control-label">Sarlovha</label>
                            <input required class="form-control" name="title" type="text" placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Qisqacha ma`lumot</label>
                            <input required class="form-control" name="shortabout" type="text" placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Ichki Sarlovha</label>
                            <input required class="form-control" name="bigtitle" type="text" placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Umumiy ma`lumot</label>
                            <textarea id="editor1" required class="form-control " name="editor1"   placeholder=""></textarea>
                            <input  type="hidden" name="_csrf" value="<?=$_SESSION['_csrfadd']?>" id="_csrf">
                            <input  type="hidden" name="type" value="news">
                            <input id="about" type="hidden" name="about" value="">

                        </div>
                        <div class="form-group">
                            <label class="control-label">Rasm</label>
                            <input  class="form-control" name="news" type="file">
                        </div>
                    </form>
                </div>
                <div class="tile-footer">
                    <button id="ok1"  class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Saqlash</button>&nbsp;&nbsp
                </div>
            </div>
        </div>

        <div class="clearix"></div>

    </div>
</main>


<script src="/locadmin/js/jquery-3.3.1.min.js"></script>
<script>


    let submitBtn = document.getElementById('ok1');
    submitBtn.addEventListener("click", function submit(e) {
        e.preventDefault();
        const editorData =  CKEDITOR.instances.editor1.getData();
        document.getElementById('editor1').removeAttribute('name');
        document.getElementById("about").value=editorData;
        $.ajax({
            url: "/locadmin/add/password=<?=str_rot13("Rememberme")?>&token=<?=str_rot13("kvjdfvdfkj@dsd.fd")?><?=4*$keyuser?>/<?=str_rot13('news')?>/",
            type: 'POST',
            processData: false,
            contentType: false,
            data: new FormData($("#form")[0]),
            success: function (data) {
                console.log(data);

                document.getElementById('editor1').setAttribute('name','editor1');
                try {
                    var obj = jQuery.parseJSON(data);
                    if (obj.xatolik == 0) {
                        document.getElementById('error').innerHTML = "Ma`lumotlar saqlandi";
                        setTimeout(() => {
                            location.href = "/locadmin/post";
                        }, 1000);
                    } else {
                        $('#_csrf').val(obj._csrf);
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




    CKEDITOR.replace( 'editor1' , {
        filebrowserUploadUrl: '/api/ckedit/<?=str_rot13('news')?>/',
        filebrowserUploadMethod: 'form'
    });


</script>
