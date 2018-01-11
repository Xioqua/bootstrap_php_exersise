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
    <?php include 'include/head.php'; ?>
    <title>首页</title>
</head>

<body>
<?php include 'include/navbar.php'; ?>
<div class="container">
    <?php include 'include/carousel.html'; ?>
    <div class="page-header">
        <h3>Web前端课程推荐</h3>
        <p>这些项目或者是对Bootstrap进行了有益的补充，或者是基于Bootstrap开发的</p>
    </div>
    <div class="row">
        <?php
        //        根据自己数据库的条数-8,这是个死值，只是方便测试
        $sql = "SELECT * FROM u_article WHERE u_id > 22";
        $result = $con->query($sql);
        //        echo $result->num_rows;
        //        exit;
        if ($result->num_rows > 0) {
//            一条条读取
            while ($row = $result->fetch_assoc()) {
                ?>

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <a href="#"><img src="img/index-1.png" alt="Dreamweaver"></a>
                        <div class="caption">
                            <h4 class="text-info"><a href="#">Dreamweaver</a></h4>
                            <p class="text-muted">网页制作基础</p>
                            <p><a href="#"
                                  class="text-inherit">DW是第一套针对专业网页设计师特别发展的视觉化网页开发工具，利用它可以轻而易举地制作出跨越平台限制和跨越浏览器限制的......</a>
                            </p>
                        </div>
                    </div>
                </div>

                <?php
            }
        } else {
            echo '查询到0条数据';
        }
        ?>
    </div>
    <div class="page-header">
        <h3>Web前端课程选择</h3>
        <p>这些项目或者是对Bootstrap进行了有益的补充，或者是基于Bootstrap开发的</p>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>班级名称</th>
            <th>课时</th>
            <th>价格</th>
            <th>免费试听</th>
            <th>购买课程</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>就业精品班（面授封闭班/包食宿）</td>
            <td>4个月</td>
            <td>优惠价17800.00
                <del>原价17800.00</del>
            </td>
            <td><a href="#" class="text-inherit"><span class="glyphicon glyphicon-headphones"></span> 预约</a></td>
            <td><a href="#" class="btn btn-danger">立即报名</a></td>
        </tr>
        <tr>
            <td>软件基础班（网课/远程教学班）</td>
            <td>96</td>
            <td>优惠价580.00
                <del>原价980.00</del>
            </td>
            <td><a href="#" class="text-inherit"><span class="glyphicon glyphicon-headphones"></span> 预约</a></td>
            <td><a href="#" class="btn btn-danger">立即报名</a></td>
        </tr>
        <tr>
            <td>Dreamweaver网页制作基础</td>
            <td>41</td>
            <td>优惠价399.00
                <del>原价499.00</del>
            </td>
            <td><a href="#" class="text-inherit"><span class="glyphicon glyphicon-headphones"></span> 预约</a></td>
            <td><a href="#" class="btn btn-danger">立即报名</a></td>
        </tr>
        </tbody>
    </table>
    <?php include 'include/footer.html'; ?>
</div>
<?php include 'include/foot_script.html'; ?>
<script src="js/triggerAdmin.js"></script>
</body>

</html>