<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>验证跳转页面</title>
</head>

<body>
<h2><?php echo $msg; ?></h2>
<div>还有<span id="span1">3</span>秒进行跳转，如果不想等待，<a href="<?php echo $jumpUrl; ?>" id="aA">请点击</a></div>
<script>
    var oSpan = document.getElementById('span1');
    var timer = null;
    var num = oSpan.innerHTML;
    var oHref = document.getElementById('aA').href;
    timer = setInterval(function () {

        num--;
        if (num <= 0) {
            num = 0;
            clearInterval(timer);
            window.location.href = oHref;
        }
        oSpan.innerHTML = num;

    }, 1000);
</script>
</body>
</html>