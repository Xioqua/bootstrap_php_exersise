<!doctype html>
<html lang="zh-CN">
<head>
    <?php include "../include/head.php"; ?>
    <title>后台登录</title>
</head>
<body>
<div class="container" style="width: 500px;padding-top: 200px;">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">后台登录</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" action="php/doadmin.php" method="post">
                <div class="form-group">
                    <label for="ht_username" class="col-sm-2 control-label">用户名</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ht_username" name="ht_username"
                               placeholder="请输入用户名">
                    </div>
                </div>
                <div class="form-group">
                    <label for="ht_password" class="col-sm-2 control-label">密码</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="ht_password" name="ht_password"
                               placeholder="请输入密码">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-7">
                        <input type="submit" class="btn btn-danger" value="登录">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
