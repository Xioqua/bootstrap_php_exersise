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
//        登录
        $con = new mysqli('localhost', 'root', 'root', 'myitem');
        if ($con->connect_error) {
            die('连接失败');
        }
        $sql_select = "SELECT * FROM myitem.u_user WHERE u_name='$username'";
        $result = $con->query($sql_select);//查到的结果集只有1条，因为已经限制了重名，下面没必要循环

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
//            echo '<pre>';
//            var_dump($row);
            if ($row["u_password"] == md5($password)) {
                    if (!empty($_POST['keeplogin'])) {
                        setcookie('name', $username, time() + 7 * 24 * 60 * 60, '/');
                    } else {
                        session_start();
                        $_SESSION['name'] = $username;
                    }
                    jump('登录成功', '../index.php');
                } else {
                    jump('密码错误,请重新登录', '../login.php');
                }
        } else {
            jump('用户名不存在', '../login.php');
        }
    }
}
