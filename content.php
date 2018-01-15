<?php
//session_start();
include "php/common.php";
$con = new mysqli('localhost', 'root', 'root', 'myitem');
if ($con->connect_error) {
    die('连接失败');
}

$id = $_GET['id'];

$sql = "SELECT * FROM u_article WHERE  u_id=$id";
$result = $con->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <?php include "include/head.php"; ?>
    <title>内容页</title>
</head>

<body>
<?php include "include/navbar.php"; ?>
<div class="container">
    <?php include "include/carousel.html"; ?>

    <ol class="breadcrumb">
        <li><a href="index.php">首页</a></li>
        <li><a href="list.php?column=<?php echo $row['u_column']?>"><?php echo $row['u_column'] ?></a></li>
        <li class="active"><?php echo $row['u_title'] ?></li>
    </ol>

    <div class="text-center page-header">
        <h3><?php echo $row['u_title'] ?></h3>
        <p>
            作者: <span class="author bg-info text-primary"><?php echo $row['u_author'] ?></span>&nbsp;&nbsp; 发布时间: <span
                    class="time bg-info text-primary"><?php echo date('Y-m-d H:i:s', $row['u_add_date']); ?></span>
        </p>
    </div>
    <?php echo $row['u_contents'] ?>
    <div class="panel panel-info">
        <div class="panel-heading">相关文章</div>
        <ul class="list-group">
            <li class="list-group-item"><a href="#" class="text-inherit"><span class="glyphicon glyphicon-star-empty"></span> 2016年1月28日荣获： 大众点评2015"十佳职业技术培训品牌奖"</a></li>
            <li class="list-group-item"><a href="#" class="text-inherit"><span class="glyphicon glyphicon-star-empty"></span> 2016年1月26日荣获: 新京报2015"年度我信赖的培训品牌奖"</a></li>
            <li class="list-group-item"><a href="#" class="text-inherit"><span class="glyphicon glyphicon-star-empty"></span> 2015年12月12日荣获: 中国网2015"广受学员好评职业教育机构奖"</a></li>
            <li class="list-group-item"><a href="#" class="text-inherit"><span class="glyphicon glyphicon-star-empty"></span> 2015年12月1日荣获: 腾讯2015"年度实力教育品牌奖"</a></li>
        </ul>
    </div>
    <?php include "include/footer.html"; ?>
</div>
<?php include "include/foot_script.html"; ?>
</body>

</html>