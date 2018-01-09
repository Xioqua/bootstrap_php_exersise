<?php
include "common.php";
session_start();

if (!empty($_SESSION['name'])) {
    unset($_SESSION['name']);
} elseif (!empty($_COOKIE['name'])) {
    setcookie('name', $_COOKIE['name'], time() - 1, '/');
};
jump('注销成功', '../index.php');
