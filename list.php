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
            while ($row = $result->fetch_assoc()) {
                ?>
                <li class="list-group-item row">
                    <a href="#" class="col-md-10"><?php echo $row['u_title'] ?></a>
                    <span class="text-muted col-md-2"><?php echo date('Y-m-d H:i:s', $row['u_add_date']) ?></span>
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