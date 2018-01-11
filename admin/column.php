<?php
include "../php/common.php";
session_start();
?>
<!doctype html>
<html lang="zh-CN">
<head>
    <?php include "../include/head.php"; ?>
    <title>后台列表页</title>
</head>
<body style="padding-top: 0;">
<div class="container" style="">
    <?php include "include/column_header.php"; ?>
    <div class="row" style="min-height: 400px">
        <?php include "include/column_nav.html"; ?>
        <div class="col-md-9" style="border-left:1px solid #eaeaea;">
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>文章标题</th>
                    <th>发布日期</th>
                    <th>操作</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>标题标题标题标题标题</td>
                    <td>2017-08-09 10：10：10</td>
                    <td><a href="delete.php">删除</a> <a href="">修改</a></td>
            </table>
        </div>
    </div>
    <?php include "../include/footer.html"; ?>
</div>
</body>
</html>