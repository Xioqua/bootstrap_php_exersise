<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <?php include "include/head.php"; ?>
</head>
<body>
<?php include "include/navbar.html"; ?>
<div class="container">
    <?php include "include/carousel.html"; ?>
    <ol class="breadcrumb">
        <li><a href="#">首页</a></li>
        <li class="active">注册</li>
    </ol>
    <div class="page-header">
        <h2 class="text-muted">用户注册</h2>
    </div>

    <form class="form-horizontal" action="php/validateRegister.php" method="post" id="formRegister">
        <div class="form-group">
            <label for="username1" class="col-md-2 control-label">用户名：</label>
            <div class="col-md-10">
                <input id="username1" name="username1" type="text" value="" placeholder="用户名" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="password1" class="col-md-2 control-label">输入密码：</label>
            <div class="col-md-10">
                <input id="password1" name="password1" type="password" placeholder="输入密码" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="password2" class="col-md-2 control-label">输出密码：</label>
            <div class="col-md-10">
                <input id="password2" name="password2" type="password" placeholder="确认密码" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-md-2 control-label">Email：</label>
            <div class="col-md-10">
                <input id="email" type="email" name="email" placeholder="Email" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="phone" class="col-md-2 control-label">手机号：</label>
            <div class="col-md-10">
                <input id="phone" name="phone" type="tel" placeholder="手机号" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="location" class="col-md-2 control-label">地区: </label>
            <div class="col-md-10">
                <select id="location" class="form-control" name="area">
                    <option value="0">请选择省份</option>
                    <option>山东</option>
                    <option>湖北</option>
                    <option>云南</option>
                    <option>陕西</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">性别：</label>
            <div class="col-md-10 radio">
                <label><input type="radio" name="sex" value="男">男</label>
                <label><input type="radio" name="sex" value="女">女</label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">爱好：</label>
            <div class="col-md-10 checkbox">
                <label><input type="checkbox" name="hobby[]" value="音乐">音乐</label>
                <label><input type="checkbox" name="hobby[]" value="旅游">旅游</label>
                <label><input type="checkbox" name="hobby[]" value="登山">登山</label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3 col-md-offset-2">
                <label><input type="checkbox" id="assign" checked> 阅读并接受<a href="#">《用户协议》</a></label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3 col-md-offset-2">
                <input type="submit" value="注册" class="btn btn-success" id="register">
                <input type="reset" value="重置" class="btn btn-default">
                <input type="button" value="已有账号，去登录" class="btn btn-danger">
            </div>
        </div>
    </form>
    <?php include "include/footer.html"; ?>
</div>
<?php include "include/foot_script.html"; ?>
<script src="js/validateRegister.js"></script>
</body>

</html>