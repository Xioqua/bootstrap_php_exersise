<?php
//session_start();
include "php/common.php";
$con = new mysqli('localhost', 'root', 'root', 'myitem');
if ($con->connect_error) {
    die('连接失败');
}
/* 如何做分页
每页条数: 固定
一共多少页 = 总体数/每页条数
总条数?

1. 怎么知道当前页

 */

// 处理get参数
if (empty($_GET['column'])) {
    $column = '全部内容';
} else {
    $column = $_GET['column'];
}

$pageSize = 6;  //每页条数
/* 
第几页  开始   取几条
    1:   0     6     
    2：  6     6
    3    12    6
    4   18    6
公式 N:  (N-1)*6 6  
N表示当前是第几页,即后来的$pages变量
*/
if (empty($_GET['page'])) {
    // 默认应该从第一页开始
    $pages = 1;
} else {
    $pages = $_GET['page'];
}

$pageStart = ($pages - 1) * $pageSize;


// 不同的column对应不同的sql语句
if ($column == '全部内容') {
    // limit [start,] offset  其中下标从0开始
    $sql = "SELECT * FROM u_article limit $pageStart,$pageSize";
    $sqlTotal = "SELECT * FROM u_article";

} else {
    $sqlTotal = "SELECT * FROM u_article WHERE u_column='$column'";
}
$result = $con->query($sql);
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <?php include "include/head.php"; ?>
    <title>列表页</title>
    <style>
        .li_line {
            list-style: none;
            height: 30px;
        }
    </style>
</head>

<body>
<?php include "include/navbar.php"; ?>
<div class="container">
    <?php include "include/carousel.html"; ?>
    <ol class="breadcrumb">
        <li><a href="#">首页</a></li>
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
                };
            }
        } else {
            echo '此栏目下没有文章';
        }
        ?>
    </ul>

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