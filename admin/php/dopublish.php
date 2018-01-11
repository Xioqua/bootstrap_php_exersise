<?php
//0	echo $_POST['editorValue'];
include "../../php/common.php";
session_start();

//-1 获取数据前先判断是不是post过来的
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//    做一下非空判断防止上传空值到数据库
    if (empty($_POST['title'])) {
        jump('标题不能为空', '../publish.php');
    }
    if (empty($_POST['column'])) {
        jump('栏目不能为空', '../publish.php');
    }
    if (empty($_POST['description'])) {
        jump('文章描述不能为空', '../publish.php');
    }
    if (empty($_POST['keyword'])) {
        jump('标题不能为空', '../publish.php');
    }
    if (empty($_POST['title'])) {
        jump('标题不能为空', '../publish.php');
    }
    if (empty($_POST['editorValue'])) {
        jump('文章内容不能为空', '../publish.php');
    }

    $file = $_FILES['upfile'];
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
//    echo $fileNewName;
//    5. 移动文件
    $dir = '../../upload/';
    if (!move_uploaded_file($file['tmp_name'], $dir . $fileNewName)) {
        jump('上传失败', '../publish.php');
    }

// -2       获取数据.发布文章一般不用过滤
    $title = $_POST['title'];
    $column = $_POST['column'];
    $description = $_POST['description'];
    $keyword = $_POST['keyword'];
    $content = $_POST['editorValue'];
    $author = $_SESSION['htuser']; //只有登录才能发布文章，记得开启session
    $thumb = 'upload/' . $fileNewName; //缩略图因在upload文件夹相对index页面来说的
    $times = time();
//        echo $title . $column . $description . $keyword . $content . $author;


//     获取完数据后 将数据填入数据库
    $conn = new mysqli('localhost', 'root', 'root', 'myitem');
    if ($conn->connect_error) {
        die('连接错误');
    };

    $sql = "INSERT INTO u_article (u_title, u_column, u_description, u_keywords, u_contents, u_thumb, u_author, u_add_date) VALUES 
          ('$title','$column','$description','$keyword','$content','$thumb','$author','$times')";
    if ($conn->query($sql)) {
        jump('发布文章成功', '../column.php');
    } else {
        jump('执行数据库失败', '../publish.php');
    }

} else {
//        -1
    jump('非法发布', '../publish.php');
}

