<?php
function input_fn($data)
{
    $outData = trim($data);
    $outData = htmlspecialchars($outData);
    return $outData;
}

$msg = '';
$jumpUrl = '../register.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usr1 = input_fn($_POST['username1']);
    $pwd1 = input_fn($_POST['password1']);
    $pwd2 = input_fn($_POST['password2']);
    $email = input_fn($_POST['email']);
    $phone = input_fn($_POST['phone']);

    $re_usr1_pwd = '/^[a-zA-Z0-9]{5,8}$/';
    $re_email = "/\w+@\w+\.\w+/";
    $re_phone = "/^1[3578]\d{9}$/";

    if (empty($_POST['username1'])) {
        $msg = '用户名不为空';
        include 'tips.php';
    } elseif (!preg_match($re_usr1_pwd, $usr1)) {
        $msg = '用户格式不正确';
        include 'tips.php';
    } elseif (empty($_POST['password1'])) {
        $msg = '密码不能为空';
        include 'tips.php';
    } elseif ($pwd1 <> $pwd2) {
        $msg = '密码输入不一致';
        include 'tips.php';
    } elseif (!preg_match($re_usr1_pwd, $pwd1)) {
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
    } else {
        $hobbyStr = '';
        for ($i = 0; $i < count($_POST['hobby']); $i++) {
            if (empty($hobbyStr)) {
                $hobbyStr .= $_POST['hobby'][$i];
            } else {
                $hobbyStr .= '|' . $_POST['hobby'][$i];
            };
        }

        $msg = '你的用户名是' . $usr1 . '<br>' .
            '你的密码是' . $pwd1 . '<br>' .
            '你的邮箱是是' . $email . '<br>' .
            '你的手机号是' . $phone . '<br>' .
            '你选择的地区是' . $_POST['area'] . '<br>' .
            '你的性别是' . $_POST['sex'] . '<br>' .
            '你的爱好是: ' . $hobbyStr . '<br>';
        $jumpUrl = '../login.php';
        include "tips.php";
    }
}