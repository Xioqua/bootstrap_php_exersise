<?php
include "../php/common.php";
session_start();
$con = new mysqli('localhost', 'root', 'root', 'myitem');
if ($con->connect_error) {
    die('连接失败');
}
$sql = "SELECT * FROM u_article ORDER BY u_id DESC";
$result = $con->query($sql);
?>
<!doctype html>
<html lang="zh-CN">
<head>
    <?php include "../include/head.php"; ?>
    <title>后台列表页</title>
    <style>
        body {
            padding-top: 0;
        }

        .backend .footer {
            margin-top: 50px;
        }
    </style>
</head>
<body class="backend">
<div class="container">
    <?php include "include/column_header.php"; ?>
    <div class="row">
        <?php include "include/column_nav.html"; ?>
        <div class="col-md-9" style="border-left:1px solid #eaeaea;">
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>文章标题</th>
                    <th>发布日期</th>
                    <th>操作</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['u_id']?></td>
                            <td><?php echo $row['u_title']?></td>
                            <td><?php echo date('Y-m-d H:i:s',$row['u_add_date'])?></td>
                            <td><a href="delete.php">删除</a> <a href="">修改</a></td>
                        </tr>
                <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="4" style="text-align: center">没有数据</td>
                    </tr>
            <?php
                }
            ?>
            </table>
        </div>
    </div>
    <?php include "../include/footer.html"; ?>
</div>
</body>
</html>