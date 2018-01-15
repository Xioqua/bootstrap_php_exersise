<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <?php include 'include/head.php'; ?>
    <title>登录页</title>
</head>

<body>
<?php include "include/navbar.php"; ?>
<div class="container">
    <?php include "include/carousel.html"; ?>
    <ol class="breadcrumb">
        <li><a href="index.php">首页</a></li>
        <li class="active">登录</li>
    </ol>
    <div class="page-header">
        <h2 class="text-muted">用户登录</h2>
    </div>
    <form class="form-horizontal" action="php/validateLogin.php" method="post" id="formLogin">
        <div class="form-group">
            <label for="username" class="col-md-2 control-label">用户名：</label>
            <div class="col-md-10">
                <input id="username" type="text" placeholder="用户名" class="form-control" name="username">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-md-2 control-label">输入密码：</label>
            <div class="col-md-10">
                <input id="password" type="password" placeholder="输入密码" class="form-control" name="password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="keeplogin[]" checked> 记住登录
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3 col-md-offset-2">
                <input type="submit" value="登录" class="btn btn-success" id="login">
                <input type="reset" value="重置" class="btn btn-default">
                <a href="register.php" class="btn btn-danger">还没账号，去注册</a>
            </div>
        </div>
    </form>
    <?php include "include/footer.html"; ?>
</div>
<?php include "include/foot_script.html"; ?>
<script src="js/validateLogin.js"></script>
</body>

</html>