<?php
include "common.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usr1 = input_fn($_POST['username1']);
    $pwd1 = input_fn($_POST['password1']);
    $pwd2 = input_fn($_POST['password2']);
    $email = input_fn($_POST['email']);
    $phone = input_fn($_POST['phone']);
    $area = $_POST['area'];
    $sex = $_POST['sex'];
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
        $msg = '密码格式不正确';
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
            $hobbyStr .= empty($hobbyStr) ? $_POST['hobby'][$i] : ',' . $_POST['hobby'][$i];
        }
//        $userInfo = "$usr1|$pwd1|$email|$phone|$area|$sex|$hobbyStr";
        $pwd1 = md5($pwd1);
//  注册
        $conn = new mysqli('localhost', 'root', 'root', 'myitem');
        if ($conn->connect_error) {
            die('连接失败');
        }

        $sql_select = "SELECT * FROM myitem.u_user WHERE u_name = '$usr1'";
        $sql_insert = "INSERT INTO myitem.u_user (u_name, u_password, u_email, u_tel, u_area, u_sex, u_hobby) VALUES
                ('$usr1','$pwd1','$email','$phone','$area','$sex','$hobbyStr')";

        $query = $conn->query($sql_select);
        $rows = $query->num_rows;

        if ($rows > 0) {
            jump('用户名已存在,请换一个名字', '../register.php');
        }
        if ($conn->query($sql_insert)) {
            jump('恭喜注册成功', '../login.php');
        } else {
            echo '无法插入数据' . mysqli_error($conn);
            exit;
        }
    }
} else {
    echo '非法注册';
    exit;
}