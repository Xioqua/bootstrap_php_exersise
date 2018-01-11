<?php
if (empty($_SESSION['htuser'])) {
    jump('没有登录,请登录', '../../admin/admin.php');
    exit;
};
?>
<div class="page-header">
    <h2>后台信息系统
        <small>欢迎您 : <?php echo $_SESSION['htuser']; ?>
            <!-- webStorm的bug: 解析include异常,      -->
            <a href="php/dohtlogout.php">注销</a>
            <!--            <a href="../php/dohtlogout.php">注销</a>-->
        </small>
    </h2>
</div>