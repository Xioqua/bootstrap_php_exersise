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
    $username = input_fn($_POST['username']);
    $password = input_fn($_POST['password']);
    $re_usr1 = '/([^\x00-\x40\x5B-\x60\x7B-\x7F])+/';
    $re_pwd = '/^[a-zA-Z0-9]{5,8}$/';

    if (empty($_POST['username'])) {
        echo '用户名不能为空';
    } elseif (empty($_POST['password'])) {
        echo '密码不能为空';
    } elseif (!preg_match($re_usr1, $username)) {
        echo '用户名格式不正确';
    } elseif (!preg_match($re_pwd, $password)) {
        echo '密码格式不正确';
    } else {
        $file = fopen('../config/userinfo.txt', 'r');

        while ($f = fgets($file)) {
            $userArr = explode('|', $f);
            if ($userArr[0] == $username) {
                if ($userArr[1] == $password) {
                    $msg = '登录成功';
                    $jumpUrl = '../index.php';
                    include "tips.php";
                    exit;
                } else {
                    $msg = '密码不正确';
                    $jumpUrl = '../login.php';
                    include "tips.php";
                    exit;
                }
            }
        }

        $msg = '用户名不存在';
        $jumpUrl = '../login.php';
        include "tips.php";
        exit;
    }
}
