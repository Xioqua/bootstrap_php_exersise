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
        $sql = "SELECT * FROM u_article ORDER BY u_id DESC LIMIT 8";
        $result = $con->query($sql);
        //        echo $result->num_rows;
        //        exit;
        if ($result->num_rows > 0) {
//            一条条读取
            while ($row = $result->fetch_assoc()) {
                ?>

                <div class="col-sm-6 col-md-4 col-lg-3 ">
                    <div class="thumbnail">
                        <a href="content.php?id=2" target="_blank"
                           title="<?php echo $row['u_title']; ?>">
                            <img class="lazy" src="<?php echo $row['u_thumb'] ?>" width="300"
                                 alt="<?php echo $row['u_title']; ?>"></a>
                        <div class="caption">
                            <h3><!-- mb_substr() -->
                                <a href="content.php" target="_blank"
                                   title="<?php echo $row['u_title']; ?>"><?php echo mb_substr($row['u_title'], 0, 8, 'utf8'); ?></a>
                                <br>
                                <small><a href="#" target="_blank"><?php echo $row['u_column']; ?></a></small>
                            </h3>
                            <p>
                                <?php echo mb_substr($row['u_description'], 0, 44, 'utf8'); ?>……
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