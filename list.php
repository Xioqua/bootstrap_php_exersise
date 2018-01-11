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
        <li class="list-group-item">
            <a href="#">职场达人放弃高薪 来优就业寻蜕变之路</a>
            <span class="time text-muted pull-right">2017-05-22 11:11:11</span>
        </li>
        <li class="list-group-item">
            <a href="#">放弃导游专业来优就业学互联网营销 获7k+月薪成功转型</a>
            <span class="time text-muted pull-right">2017-05-22 11:11:11</span>
        </li>
        <li class="list-group-item">
            <a href="#">关于Web Workers 你需要了解的7件事</a>
            <span class="time text-muted pull-right">2017-05-22 11:11:11</span>
        </li>
        <li class="list-group-item">
            <a href="#">HTML5前端（移动端网站）性能优化指南</a>
            <span class="time text-muted pull-right">2017-05-22 11:11:11</span>
        </li>
        <li class="list-group-item">
            <a href="#">关于jQuery UI 使用心得及技巧</a>
            <span class="time text-muted pull-right">2017-05-22 11:11:11</span>
        </li>
    </ul>
    <ul class=" list-group list">
        <li class="list-group-item">
            <a href="#">职场达人放弃高薪 来优就业寻蜕变之路</a>
            <span class="time text-muted pull-right">2017-05-22 11:11:11</span>
        </li>
        <li class="list-group-item">
            <a href="#">放弃导游专业来优就业学互联网营销 获7k+月薪成功转型</a>
            <span class="time text-muted pull-right">2017-05-22 11:11:11</span>
        </li>
        <li class="list-group-item">
            <a href="#">关于Web Workers 你需要了解的7件事</a>
            <span class="time text-muted pull-right">2017-05-22 11:11:11</span>
        </li>
        <li class="list-group-item">
            <a href="#">HTML5前端（移动端网站）性能优化指南</a>
            <span class="time text-muted pull-right">2017-05-22 11:11:11</span>
        </li>
        <li class="list-group-item">
            <a href="content.php">关于jQuery UI 使用心得及技巧</a>
            <span class="time text-muted pull-right">2017-05-22 11:11:11</span>
        </li>
    </ul>
    <ul class=" list-group list">
        <li class="list-group-item">
            <a href="#">职场达人放弃高薪 来优就业寻蜕变之路</a>
            <span class="time text-muted pull-right">2017-05-22 11:11:11</span>
        </li>
        <li class="list-group-item">
            <a href="#">放弃导游专业来优就业学互联网营销 获7k+月薪成功转型</a>
            <span class="time text-muted pull-right">2017-05-22 11:11:11</span>
        </li>
        <li class="list-group-item">
            <a href="#">关于Web Workers 你需要了解的7件事</a>
            <span class="time text-muted pull-right">2017-05-22 11:11:11</span>
        </li>
        <li class="list-group-item">
            <a href="#">HTML5前端（移动端网站）性能优化指南</a>
            <span class="time text-muted pull-right">2017-05-22 11:11:11</span>
        </li>
        <li class="list-group-item">
            <a href="#">关于jQuery UI 使用心得及技巧</a>
            <span class="time text-muted pull-right">2017-05-22 11:11:11</span>
        </li>
    </ul>
    <ul class=" list-group list">
        <li class="list-group-item">
            <a href="#">职场达人放弃高薪 来优就业寻蜕变之路</a>
            <span class="time text-muted pull-right">2017-05-22 11:11:11</span>
        </li>
        <li class="list-group-item">
            <a href="#">放弃导游专业来优就业学互联网营销 获7k+月薪成功转型</a>
            <span class="time text-muted pull-right">2017-05-22 11:11:11</span>
        </li>
        <li class="list-group-item">
            <a href="#">关于Web Workers 你需要了解的7件事</a>
            <span class="time text-muted pull-right">2017-05-22 11:11:11</span>
        </li>
        <li class="list-group-item">
            <a href="#">HTML5前端（移动端网站）性能优化指南</a>
            <span class="time text-muted pull-right">2017-05-22 11:11:11</span>
        </li>
        <li class="list-group-item">
            <a href="#">关于jQuery UI 使用心得及技巧</a>
            <span class="time text-muted pull-right">2017-05-22 11:11:11</span>
        </li>
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