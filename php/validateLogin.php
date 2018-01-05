<?php
function input_fn($data)
{
    $outData = trim($data);
    $outData = htmlspecialchars($outData);
    return $outData;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = input_fn($_POST['username']);
    $password = input_fn($_POST['password']);
    $re_username = '/^[a-zA-Z0-9]{5,8}$/';
    $re_password = '/^[a-zA-Z0-9]{5,8}$/';

    if (empty($_POST['username'])) {
        echo '用户名不能为空';
    } elseif (empty($_POST['password'])) {
        echo '密码不能为空';
    } elseif (!preg_match($re_username, $username)) {
        echo '用户名不正确';
    } elseif (!preg_match($re_password, $password)) {
        echo '密码不正确';
    } else {
        echo '<p style="text-align: center;color: #0f0f0f;">用户名是' . $username . ',' . '密码是' . $password . '<p>';
    }
}
