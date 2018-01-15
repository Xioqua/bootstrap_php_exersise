<?php
    include "php/common.php";
    $con = new mysqli('localhost', 'root', 'root', 'myitem');
    if ($con->connect_error) { die('连接失败'); }
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <?php include 'include/head.php'; ?>
    <title>课程页</title>
</head>

<body>
<?php include 'include/navbar.php'; ?>
<div class="container">
    <?php include 'include/carousel.html'; ?>
        <ol class="breadcrumb">
            <li><a href="#">首页</a></li>
            <li class="active">前端资讯</li>
        </ol>
        <div class="page-header">
            <div class="btn-group dropup">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            请选择您要查询的课程 <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <?php
                        $sql_col = "SELECT distinct(u_column) FROM u_article";
                        $result_col = $con->query($sql_col);
                        if ($result_col->num_rows>0) {
                            while ($row_col = $result_col->fetch_assoc()) {
                                ?>
                                <li><a class="course_col" href="<?php echo 'course.php?column='. $row_col['u_column'];?>"><?php echo $row_col['u_column']?></a></li>
                                <?php
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div class="row">
        <?php
        $column = empty($_GET['column']) ? '全部内容' : $_GET['column'];
        $pages = empty($_GET['page']) ? 1 : $_GET['page']; //当前页码
        $pageSize = 16; //每页显示条数
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
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { 
                ?>
            <div class="col-xs-6 col-md-3">
                <a href="<?php echo 'content.php?id='.$row['u_id']?>" class="thumbnail" target="_blank">
                    <img src="<?php echo $row['u_thumb']?>" alt="<?php echo $row['u_title']?>">
                </a>
            </div>
            <?php
                 }
            }
        ?>

        </div>
        <nav aria-label="...">
            <ul class="pager">
                <li class="previous"><a href="course.php?column=<?php echo $column;?>&page=<?php echo $pages-1;?>" class="<?php if($pages==1) echo 'btn disabled'?>"><span aria-hidden="true">&larr;</span> Older</a></li>
                <li class="next"><a href="course.php?column=<?php echo $column;?>&page=<?php echo $pages+1;?>" class="<?php if($pages==$pageNum) echo 'btn disabled'?>">Newer <span aria-hidden="true">&rarr;</span></a></li>
            </ul>
        </nav>
    <?php include 'include/footer.html'; ?>
    </div>
<?php include 'include/foot_script.html'; ?>
</body>

</html>