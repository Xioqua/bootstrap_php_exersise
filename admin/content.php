<?php
include "../php/common.php";
session_start();
$con = new mysqli('localhost', 'root', 'root', 'myitem');
if ($con->connect_error) {
    die('连接失败');
}
$col = $_GET['column'];
$sql = "SELECT * FROM u_article WHERE u_column = '$col' ORDER BY u_id DESC";
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
        <?php include "include/column_nav.php"; ?>
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
                            <td>
                                <a href="javascript:" onclick="deleteDate(<?php echo $row['u_id']?>)">删除</a>
                                <a href="edit.php?id=<?php echo $row['u_id']?>">修改</a>
                            </td>
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
<script>
    function deleteDate(id) {
        // window.location.href =
        if (confirm('你确定删除吗？')) {
            // window.location.href='php/dodelete.php';
            window.open('php/dodelete.php?id='+ id);
        }
    }
</script>
</body>
</html>