<?php session_start(); ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php">首页</a>
        </div>


        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <!-- <li><a href="#">首页</a></li> -->
                <li>
                    <a href="../news.php">前端资讯</a>
                </li>
                <li>
                    <a href="../course.php">课程选择</a>
                </li>
                <li>
                    <a href="../vote.php">投票</a>
                </li>
                <li>
                    <a href="../search.php">搜索</a>
                </li>
                <li>
                    <?php
                    if (!empty($_SESSION['name'])) {
                        echo '<a href="#">欢迎您: ' . $_SESSION['name'] . '</a>';
                    } elseif (!empty($_COOKIE['name'])) {
                        echo '<a href="javascript:">欢迎您: ' . $_COOKIE['name'] . '</a>';
                    } else {
                        echo '<a href="../register.php">注册</a>';
                    }
                    ?>
                </li>
                <li>
                    <?php

                    if (!empty($_SESSION['name'])) {
                        echo '<a href="../php/dologout.php">注销</a>';
                    } elseif (!empty($_COOKIE['name'])) {
                        echo '<a href="../php/dologout.php">注销</a>';
                    } else {
                        echo '<a href="../login.php">登录</a>';
                    }
                    ?>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="admin/admin.php">关于我们</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
</nav>