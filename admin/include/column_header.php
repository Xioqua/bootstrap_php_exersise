<?php
if (empty($_SESSION['htuser'])) {
    jump('没有登录,请登录', '../../admin/admin.php');
    exit;
};
?>
<div class="page-header">
    <h2>后台信息系统
        <small>欢迎您 : <?php echo $_SESSION['htuser']; ?>
            <!-- 这个链接跳转很奇怪,如果include会影响路径，这就会随着column变化。是IDE还是浏览器的的bug？      -->
            <a href="php/dohtlogout.php">注销</a>
        </small>
    </h2>
</div>