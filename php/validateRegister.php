<?php
function input_fn($data)
{
    $outData = trim($data);
    $outData = htmlspecialchars($outData);
    return $outData;
}

$msg = '';
$jumpUrl = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usr1 = input_fn($_POST['username1']);
    $pwd1 = input_fn($_POST['password1']);
    $pwd2 = input_fn($_POST['password2']);
    $email = input_fn($_POST['email']);
    $phone = input_fn($_POST['phone']);
    $re_usr1 = '/([^\x00-\x40\x5B-\x60\x7B-\x7F])+/';
    $re_pwd = '/^[a-zA-Z0-9]{5,8}$/';
    $re_email = "/\w+@\w+\.\w+/";
    $re_phone = "/^1[3578]\d{9}$/";

    if (empty($_POST['username1'])) {
        $msg = '用户名非空';
        include 'tips.php';
    } elseif (!preg_match($re_usr1, $usr1)) {
        $msg = '用户名格式非法';
        include 'tips.php';
    } elseif (empty($_POST['password1'])) {
        $msg = '密码不能为空';
        include 'tips.php';
    } elseif ($pwd1 <> $pwd2) {
        $msg = '密码输入不一致';
        include 'tips.php';
    } elseif (!preg_match($re_pwd, $pwd1)) {
        $msg = '密码不正确';
        include 'tips.php';
    } elseif (empty($_POST['email'])) {
        $msg = 'email不为空';
        include "tips.php";
    } elseif (!preg_match($re_email, $email)) {
        $msg = '邮箱格式不正确';
        include "tips.php";
    } elseif (empty($_POST['phone'])) {
        $msg = '手机号不为空';
        include 'tips.php';
    } elseif (!preg_match($re_phone, $phone)) {
        $msg = '手机号格式不正确';
        include 'tips.php';
    } elseif ($_POST['area'] == '0') {
        $msg = '请选择地区';
        include 'tips.php';
    } elseif (empty($_POST['sex'])) {
        $msg = '请选择性别';
        include 'tips.php';
    } elseif (empty($_POST['hobby'])) {
        $msg = '请选择一个爱好';
        include 'tips.php';
    } elseif (empty($_POST['assign'])) {
        $msg = '不同意协议就别注册';
        include "tips.php";
    } else {
//            验证成功后收集用户信息
        $hobbyStr = '';
        for ($i = 0; $i < count($_POST['hobby']); $i++) {
            $hobbyStr .= empty($hobbyStr) ? $_POST['hobby'][$i] : '&' . $_POST['hobby'][$i];
        }
//        echo $hobbyStr;

        $userInfo = "$usr1|$pwd1";
//        echo $userInfo;
        $file = fopen('../config/userinfo.txt', 'a+');
        while ($f = fgets($file)) {
            $userArr = explode('|', $f);
            if ($userArr[0] == $usr1) {
                $msg = '用户名已经存在';
                $jumpUrl = '../register.php';
                include "tips.php";
//                exit会直接退出当前脚本，下面语句都不会执行
                exit;
            }
        }
        if (fwrite($file, $userInfo . "|\r\n")) {
            $jumpUrl = '../login.php';
            $msg = '注册成功';
            include "tips.php";
            exit;
        } else {
            $msg = '注册失败';
            $jumpUrl = '../register.php';
            include "tips.php";
            exit;
        }
    }
}