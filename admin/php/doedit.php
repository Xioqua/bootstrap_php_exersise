<?php
include "../../php/common.php";
session_start();
$conn = new mysqli('localhost', 'root', 'root', 'myitem');
if ($conn->connect_error) {
    die('连接错误');
};

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $title = $_POST['title'];
    $column = $_POST['column'];
    $description = $_POST['description'];
    $keyword = $_POST['keyword'];
    $content = $_POST['editorValue'];
//    $author = $_SESSION['htuser']; //只有登录才能发布文章，记得开启session
//    $thumb = 'upload/' . $fileNewName;
//    $times = time();

    $id = $_GET['id'];
    $file = $_FILES['upfile'];

    if (empty($file['name'])) {
        $sql = "UPDATE u_article SET u_title='$title',u_column='$column',u_description='$description',u_keywords='$keyword',u_contents='$content' WHERE u_id=$id";

        if ($conn->query($sql)) {
            jump('修改成功', '../column.php');
        } else {
            jump('执行数据库失败', '../edit.php');
        }
    }

//    下面是没上传缩略图的情况

//       1. 获取错误码
    if ($file['error'] > 0) {
        jump('上传错误', '../publish.php');
    }
//    2        自定义文件大小
    $fileSize = $file['size'];
    $fileMaxSize = 1 * 1024 * 1024; //1m
    if ($fileSize > $fileMaxSize) {
        jump('上传文件过大', '../publish.php');
    }
//    3 文件类型
    $fileUploadType = $file['type'];
    $typeArr = [
        'image/jpg',
        'image/png',
        'image/gif'
    ];
    if (!in_array($fileUploadType, $typeArr)) {
        jump('请上传一个图片', '../publish.php');
    }
// 4.生成文件名
    $fileName = $file['name'];
    $fileNameArr = explode('.', $fileName);
    $suffixName = array_pop($fileNameArr);
    $fileNewName = date('YmdHis' . rand(10000, 99999) . '.' . $suffixName);
//    5. 移动文件
    $dir = '../../upload/';
    if (!move_uploaded_file($file['tmp_name'], $dir . $fileNewName)) {
        jump('上传失败', '../publish.php');
    }

    $thumb = 'upload/' . $fileNewName;

    $sql = "UPDATE u_article SET u_title='$title',u_column='$column',u_description='$description',u_keywords='$keyword',u_contents='$content',u_thumb='$thumb' WHERE u_id=$id";

    if ($conn->query($sql)) {
        jump('修改成功', '../column.php');
    } else {
        jump('执行数据库失败', '../edit.php');
    }

} else {
    jump('非法发布', '../edit.php');
}

