<?php
include "php/common.php";
$con = new mysqli('localhost', 'root', 'root', 'myitem');
if ($con->connect_error) die('连接失败');
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <?php include 'include/head.php'; ?>
    <title>新闻页</title>
</head>

<body>
<?php include 'include/navbar.php'; ?>
    <div class="container">
        <?php include 'include/carousel.html'; ?>
        <ol class="breadcrumb">
            <li><a href="index.php">首页</a></li>
            <li class="active">前端资讯</li>
        </ol>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> 面试技巧</div>
                    <ul class="list-group">
                        <?php
                        $sql = "SELECT * FROM u_article WHERE u_column='Web前端开发' limit 4";
                        $result = $con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                ?>
            <li class="list-group-item">
                <a href="content.php?id=<?php echo $row['u_id']?>" class="inherit"><?php echo $row['u_title']?></a>
            </li>
                        <?php
                    }
                }
                ?>
                    </ul>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading panel-unstyled"><span class="glyphicon glyphicon-th-large"></span> HTML5</div>
                    <ul class="list-group">
                    <?php
$sql = "SELECT * FROM u_article WHERE u_column='Java开发' limit 4";
$result = $con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                ?>
            <li class="list-group-item">
                <a href="content.php?id=<?php echo $row['u_id']?>" class="inherit"><?php echo $row['u_title']?></a>
            </li>
                        <?php
                    }
                }
                ?>
                    </ul>
                </div>
                <div class="panel panel-warning">
                    <div class="panel-heading"><span class="glyphicon glyphicon-list"></span> JQuery</div>
                    <ul class="list-group">
                    <?php
$sql = "SELECT * FROM u_article WHERE u_column='PHP开发' limit 4";
$result = $con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                ?>
            <li class="list-group-item">
                <a href="content.php?id=<?php echo $row['u_id']?>" class="inherit"><?php echo $row['u_title']?></a>
            </li>
                        <?php
                    }
                }
                ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading"><span class="glyphicon glyphicon-question-sign"></span> 常见问题</div>
                    <ul class="list-group">
                    <?php
$sql = "SELECT * FROM u_article WHERE u_column='网络营销' limit 4";
$result = $con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                ?>
            <li class="list-group-item">
                <a href="content.php?id=<?php echo $row['u_id']?>" class="inherit"><?php echo $row['u_title']?></a>
            </li>
                        <?php
                    }
                }
                ?>
                    </ul>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading"><span class="glyphicon glyphicon-list-alt"></span> JavaScript</div>
                    <ul class="list-group">
                    <?php
                    $sql = "SELECT * FROM u_article WHERE u_column='Java开发' limit 4";
                    $result = $con->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                <li class="list-group-item">
                                    <a href="content.php?id=<?php echo $row['u_id']?>" class="inherit"><?php echo $row['u_title']?></a>
                                </li>
                                            <?php
                                        }
                                    }
                                    ?>
                    </ul>
                </div>
                <div class="panel panel-danger">
                    <div class="panel-heading"><span class="glyphicon glyphicon-align-left"></span> 常见问题</div>
                    <ul class="list-group">
                    <?php
$sql = "SELECT * FROM u_article WHERE u_column='Java开发' limit 4";
$result = $con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                ?>
            <li class="list-group-item">
                <a href="content.php?id=<?php echo $row['u_id']?>" class="inherit"><?php echo $row['u_title']?></a>
            </li>
                        <?php
                    }
                }
                ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php include 'include/footer.html'; ?>
    </div>

<?php include 'include/foot_script.html'; ?>
</body>

</html>