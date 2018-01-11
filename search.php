<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <?php include "include/head.php"; ?>
    <title>搜索页</title>
</head>

<body>
<?php include "include/navbar.php"; ?>
    <div class="container">
        <?php include "include/carousel.html"; ?>
        <ol class="breadcrumb">
            <li><a href="#">首页</a></li>
            <li class="active">搜索</li>
        </ol>
        <div class="form-vPos text-center">
            <form action="#" class="form-inline" role="form">
                <div class="form-group">
                    <input type="text" placeholder="请输入要搜索的内容" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" value="搜索" class="btn btn-default">
                </div>
            </form>
        </div>
        <?php include "include/footer.html"; ?>
    </div>
<?php include "include/foot_script.html"; ?>
</body>

</html>