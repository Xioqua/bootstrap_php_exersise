<?php
//session_start();
include "php/common.php";
$con = new mysqli('localhost', 'root', 'root', 'myitem');
if ($con->connect_error) {
    die('连接失败');
}
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <?php include "include/head.php"; ?>
    <title>列表页</title>
</head>

<body>
<?php include "include/navbar.php"; ?>
<div class="container">
    <?php include "include/carousel.html"; ?>
    <ol class="breadcrumb">
        <li><a href="#">首页</a></li>
        <li class="active">前端资讯</li>
    </ol>
    <div class="page-header">
        <h2 class="text-muted">前端资讯</h2>
    </div>
    <ul class=" list-group list">
        <?php
        $column = $_GET['column'];
        //sql中的字符串要用引号
        $sql = "SELECT * FROM u_article WHERE u_column='$column'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while ($result->fetch_assoc()) {
                ?>
                <li class="list-group-item">
                    <a href="#">职场达人放弃高薪 来优就业寻蜕变之路</a>
                    <span class="time text-muted pull-right">2017-05-22 11:11:11</span>
                </li>
                <?php
            }
        } else {
            echo '此栏目下没有文章';
        }
        ?>
    </ul>
    <!--    --><?php //echo $_GET['column'];?>
    <nav aria-label="Page navigation" class="text-center">
        <ul class="pagination">
            <li>
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
                <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
    <?php include "include/footer.html"; ?>
</div>
<?php include "include/foot_script.html"; ?>
</body>

</html>