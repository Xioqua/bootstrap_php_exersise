<?php
include "../../php/common.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = input_fn($_POST['ht_username']);
    $password = input_fn($_POST['ht_password']);
    $re_usr1 = '/([^\x00-\x40\x5B-\x60\x7B-\x7F])+/';
    $re_pwd = '/^[a-zA-Z0-9]{5,8}$/';

    if (empty($_POST['ht_username'])) {
        echo '用户名不能为空';
    } elseif (empty($_POST['ht_password'])) {
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
        $sql_select = "SELECT * FROM myitem.u_admin WHERE u_username='$username'";
        $result = $con->query($sql_select);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row["u_password"] == $password) {
                session_start();
                $_SESSION['htuser'] = $username;
                jump('登录成功', '../column.php');
            } else {
                jump('密码错误,请重新登录', '../admin.php');
            }
        } else {
            jump('用户名不存在', '../admin.php');
        }
    }
}
