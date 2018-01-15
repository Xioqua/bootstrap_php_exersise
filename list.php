<!DOCTYPE html>
<?php
include "php/common.php";
$con = new mysqli('localhost', 'root', 'root', 'myitem');
if ($con->connect_error) die('连接失败');
$column = empty($_GET['column']) ? '全部内容' : $_GET['column'];
$pageSize = 3; //每页显示条数
$pages = empty($_GET['page']) ? 1 : $_GET['page']; //当前页码
$pageStart = ($pages - 1) * $pageSize; //从的几条开始
if( $column == '全部内容' )
{
    $sql = "SELECT * FROM u_article ORDER BY u_id LIMIT $pageStart,$pageSize";
    $sqlTotal = "SELECT * FROM u_article";
}
else
{
    $sql = "SELECT * FROM u_article WHERE u_column='$column' ORDER BY u_id LIMIT $pageStart,$pageSize";
    $sqlTotal = "SELECT * FROM u_article WHERE u_column='$column' ORDER BY u_id";
}
$result = $con->query($sql);
$resultTotal = $con->query($sqlTotal);
$pageNum = ceil($resultTotal->num_rows/$pageSize); //想上去取整得到页码
?>
<html lang="zh-CN">
<head>
    <?php include "include/head.php"; ?>
    <title>列表页</title>
    <style>.li_line {
            list-style: none;
            height: 30px;
        }</style>
</head>
<body>
<?php include "include/navbar.php"; ?>
<div class="container">
    <?php include "include/carousel.html"; ?>
    <ol class="breadcrumb">
        <li><a href="index.php">首页</a></li>
        <li class="active"><?php echo $column; ?></li>
    </ol>
    <div class="page-header">
        <h2 class="text-muted"><?php echo $column; ?></h2>
    </div>
    <ul class=" list-group list">
        <?php
        $j = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $j++;
                ?>
                <li class="list-group-item row">
                    <a href="#" class="col-md-10"><?php echo $row['u_title'] ?></a>
                    <span class="text-muted col-md-2"><?php echo date('Y-m-d H:i:s', $row['u_add_date']) ?></span>
                </li>
                <?php
                if ($j % 5 == 0) {
                    echo '<li class="li_line"></li>';
                }
            }
        } else {
            echo '此栏目下没有文章';
        }
        ?>
    </ul>

    <nav aria-label="Page navigation" class="text-center">
        <ul class="pagination">
            <li>
                <a href="list.php?column=<?php echo $column;?>&page=<?php echo $pages-1;?>" aria-label="Previous"  class="<?php if($pages==1) echo 'btn disabled'?>">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php
                for ($i=1;$i<=$pageNum;$i++) {
            ?>
            <li class="<?php if ($i==$pages) echo 'active';?>"><a href="list.php?column=<?php echo $column;?>&page=<?php echo $i;?>"><?php echo $i?></a></li>
            <?php
                }
            ?>
            <li>
                <a href="list.php?column=<?php echo $column;?>&page=<?php echo $pages+1;?>" aria-label="Next" class="<?php if($pages==$pageNum) echo 'btn disabled'?>">
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