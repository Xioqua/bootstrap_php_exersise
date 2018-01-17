<?php
    include "php/common.php";
    $con = new mysqli('localhost', 'root', 'root', 'myitem');
    if ($con->connect_error) { die('连接失败'); }
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <?php include 'include/head.php'; ?>
    <title>课程页</title>
</head>

<body>
<?php include 'include/navbar.php'; ?>

<div class="container">
    
    <?php include 'include/carousel.html'; ?>
        
        <ol class="breadcrumb">
            <li><a href="#">首页</a></li>
            <li class="active">前端资讯</li>
        </ol>

    <div class="dropdown projects-header page-header">
        <select class="form-control" style="width:230px" id="change" onChange="change(0)">
            <option>全部课程</option>
            <option>Web前端开发</option>
            <option>UI设计</option>
            <option>网络营销</option>
            <option>PHP开发</option>
        </select>
    </div>

    <div id="cont"></div>
    
    <?php include 'include/footer.html'; ?>

</div>

<?php include 'include/foot_script.html'; ?>
<script>
    function change(page){
	var changeValue = document.getElementById("change").value;
	//alert(changeValue);
	if(window.XMLHttpRequest){
		var xHttp = new XMLHttpRequest();	
	}else{
		var xHttp = new ActiveXObject("Microsoft.XMLHTTP");	
	}
	xHttp.open("GET","php/docourse.php?clumn="+changeValue+"&page="+page);
	xHttp.send();
	xHttp.onreadystatechange = function(){
		if(xHttp.readyState==4 && xHttp.status==200){
			document.getElementById("cont").innerHTML = xHttp.responseText;
		}	
	    }	
    }
    change();
</script>
</body>
</html>