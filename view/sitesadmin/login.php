<?php

$_SESSION['_csrflogin'] = md5(time());


$keyuser=rand(1000,9999);

$_SESSION['keyuser']=$keyuser;


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="/locadmin/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - I-DOCTOR</title>
</head>
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo">
        <h1 style='font-family: "Courier New", Courier, monospace'>I-DOCTOR</h1>
    </div>
    <div class="login-box">
        <form class="login-form"  id="form">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
            <h6 style="color: red" id="error"></h6>
            <div class="form-group">
                <label class="control-label">Login</label>
                <input class="form-control" type="text" placeholder="Login" name="login" id="login" autofocus>
            </div>
            <div class="form-group">
                <label class="control-label">Parol</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <div class="utility">
                    <div class="animated-checkbox">
                        <label>
                            <input type="checkbox"><span class="label-text">Stay Signed in</span>
                        </label>
                    </div>
                    <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
                </div>
            </div>
            <div class="form-group btn-container">
                <button id="ok1" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
            </div>
            <input type="hidden" name="_csrf" value="<?=$_SESSION['_csrflogin']?>" id="_csrf">

        </form>
    </div>
</section>
<!-- Essential javascripts for application to work-->
<script src="/locadmin/js/jquery-3.3.1.min.js"></script>
<script src="/locadmin/js/popper.min.js"></script>
<script src="/locadmin/js/bootstrap.min.js"></script>
<script src="/locadmin/js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="/locadmin/js/plugins/pace.min.js"></script>
<script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
    });
</script>


<script>

    let submitBtn = document.getElementById('ok1');
    submitBtn.addEventListener("click", function submit(e) {
        e.preventDefault();
        $.ajax({
            url: "/locadmin/core/checklogin/password=<?=str_rot13("Remember me")?>&email=<?=str_rot13("Login or  Password is wrong")?><?=4*$keyuser?>",
            type: 'POST',
            processData: false,
            contentType: false,
            data: new FormData($("#form")[0]),
            success: function (data) {
                console.log(data);
                var obj = jQuery.parseJSON(data);
                if (obj.xatolik==0) {
                    document.getElementById('error').innerHTML="Kirishingiz mumkin";
                    setTimeout(() => {
                        location.href = "/locadmin/index";
                    }, 1000);
                } else {
                    $('#_csrf').val(obj._csrf);
                    document.getElementById('error').innerHTML="Login yoki parolda xatolik!";
                }
            },
            error: function () {
                document.getElementById('error').innerHTML="Aloqa uzilib qoldi!";
            },
        });
    });

</script>
</body>
</html>