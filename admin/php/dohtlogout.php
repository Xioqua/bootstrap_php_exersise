<?php
include "../../php/common.php";
session_start();

if (!empty($_SESSION['htuser'])) {
    unset($_SESSION['htuser']);
    jump('退出成功', '../admin.php');
};