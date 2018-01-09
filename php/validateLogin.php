<?php
include "common.php";

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
                    jump('登录成功','../index.php');
                } else {
                    jump('密码错误','../login.php');
                }
            }
        }
        jump('用户 名不存在','../index.php');
    }
}
