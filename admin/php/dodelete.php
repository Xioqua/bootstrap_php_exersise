<?php
include "../../php/common.php";
session_start();
$con = new mysqli('localhost', 'root', 'root', 'mytest');
if ($con->connect_error) {
    die('连接失败');
}
$id = $_GET['id'];
$sql = "DELETE FROM mytest.u_user WHERE u_id=$id";
//$result = $con->query($sql);
if ($con->query($sql)) {
    jump('删除成功','../column.php');
} else {
    jump('删除失败','../column.php');
}
?>
