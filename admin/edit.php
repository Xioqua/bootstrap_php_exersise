<?php
session_start();
include "../php/common.php";

if (empty($_SESSION['htuser'])) {
    jump('没有登录,请登录', '../admin/admin.php');
};

$id = $_GET['id'];

$con = new mysqli('localhost', 'root', 'root', 'myitem');
if ($con->connect_error) {
    die('连接失败');
}

$sql = "SELECT * FROM u_article WHERE u_id=$id";
$result = $con->query($sql);
$row = $result->fetch_assoc();
?>
<!doctype html>
<html lang="zh-CN">
<head>
    <?php include "../include/head.php"; ?>
    <title>发布文章</title>
    <style>
        body {
            padding-top: 0;
        }

        .backend .footer {
            margin-top: 50px;
        }
    </style>
    <link href="umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="umeditor/third-party/jquery.min.js"></script>
    <script type="text/javascript" src="umeditor/third-party/template.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="umeditor/umeditor.min.js"></script>
    <script type="text/javascript" src="umeditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body class="backend">
<div class="container">
    <?php include "include/column_header.php"; ?>
    <div class="row">
        <?php include "include/column_nav.php"; ?>
        <div class="col-md-9" style="border-left:1px solid #eaeaea;">
            <form method="post" action="php/doedit.php?id=<?php echo $row['u_id']?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">文章标题</label>
                    <input type="text" class="form-control" name="title" placeholder="文章标题" value="<?php echo $row['u_title'] ?>">
                </div>
                <div class="form-group">
                    <label for="column">栏目名称</label>
                    <select class="form-control" name="column">
                        <option>Web前端开发</option>
                        <option>UI设计</option>
                        <option>PHP开发</option>
                        <option>JAVA开发</option>
                        <option>网络营销</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="describe">文章描述</label>
                    <!-- 足以读取ytextarea不要空格-->
                    <textarea class="form-control" rows="3" name="description"><?php echo $row['u_description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="keyworld">关键词</label>
                    <input type="text" class="form-control" id="keyworld" name="keyword" placeholder="关键词" value="<?php echo $row['u_keywords'] ?>">
                </div>
                <h5>文章内容</h5>
                <!-- style给定宽度可以影响编辑器的最终宽度-->
                <!--style给定宽度可以影响编辑器的最终宽度-->
                <script type="text/plain" id="myEditor" style="width:100%;height:300px;">
                    <?php echo $row['u_contents'] ?>
                </script>
                <hr>
                <div class="form-group">
                    <label for="exampleInputFile">上传缩略图</label>
                    <input type="file" id="exampleInputFile" name="upfile">
                    </div>
                    <input type="submit" class="btn btn-success" value="修改文章">
                    <input type="reset" class="btn btn-danger" value="重置内容">
                    </form>
                    <script type="text/javascript">
                //实例化编辑器
                var um = UM.getEditor('myEditor');
                </script>
        </div>
    </div>
    <?php include '../include/footer.html' ?>
</div>
</body>
</html>