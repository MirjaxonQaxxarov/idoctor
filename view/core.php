<?php
if (isset($_POST['login']) && isset($_POST['password'])) {
    $ret = [];

    if ($_POST['_csrf'] != $_SESSION['_csrflogin']) {
        $ret += ['auth' => "yes"];
        $ret += ['xatolik' => "1"];
        $ret += ['auth' => "no"];
        $ret += ['xabar' => "Taqiqlangan so'rov"];
        $ret += ['_csrf' => $_SESSION['_csrf']];
    } else {
        $_SESSION['_csrf'] = md5(time());
        require './model/model.php';
        $login = $_POST['login'];
        $parol = md5($_POST['password']);

        $fetch = Logins::login($login, $parol);
        if ($fetch['login'] == $login and $parol == $fetch['password']) {
            $_SESSION['login'] = $fetch['login'];
            $_SESSION['rol'] = $fetch['type'];
            $_SESSION['userid'] = $fetch['id'];
            $ret += ['xatolik' => "0"];
            $ret += ['auth' => "yes"];
            $ret += ['xabar' => "Hammasi joyida"];
        } else {
            $ret += ['xatolik' => "1"];
            $ret += ['auth' => "no"];
            $ret += ['xabar' => "Login yoki parol xato"];
            $ret += ['_csrf' => $_SESSION['_csrf']];
        }
    }
    echo json_encode($ret);
} else {
    $ret = [];
    $ret += ['xatolik' => "2"];
    $ret += ['auth' => "no"];
    $ret += ['xabar' => "Login yoki parol xato"];
    $ret += ['_csrf' => $_SESSION['_csrf']];
    echo json_encode($ret);
    exit;
}
