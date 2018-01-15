<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <?php include "include/head.php"; ?>
    <title>搜索页</title>
    <style>
        .acomplete {
            display:none;
            position:absolute;
            width: 196px;
            text-align: left;
            background-color:#dec;
            border:1px solid #ccc;
        }
        .acomplete ul,.searchOutput ul {
            list-style:none;
            padding-left:0;
        }
        .acomplete ul li {
            border-bottom: 1px solid #fff;
            line-height:30px;
            height:30px;
            padding-left:10px;
            cursor:pointer;
        }
        .acomplete ul li:hover {
            background-color: #abc;
        }
        .acomplete ul li a {
            color: #333;
            text-decoration:none;
        }
        .acomplete ul li a:hover {
            color: #333;
            text-decoration:underline;
        }

        .searchOutput {
            text-align:left;
            width: 800px;
            margin: 50px auto;
        }
        .searchOutput .searchArticleTime {
            float:right;
        }
    </style>
</head>

<body>
<?php include "include/navbar.php"; ?>
    <div class="container">
        <?php include "include/carousel.html"; ?>
        <ol class="breadcrumb">
            <li><a href="index.php">首页</a></li>
            <li class="active">搜索</li>
        </ol>
        <div class="form-vPos text-center">
            <form action="php/doSearchOutput.php" class="form-inline" role="form" id="searchForm">
                <div class="form-group">
                    <input type="text" placeholder="请输入要搜索的内容" class="form-control" id="searchText" autocomplete="off">
                    <div id="acomplete" class="acomplete"></div>
                </div>
                <div class="form-group">
                    <input type="submit" value="搜索" class="btn btn-default">
                </div>
            </form>
            <div id="searchOutput" class="searchOutput"></div>
        </div>
        <?php include "include/footer.html"; ?>
    </div>
<?php include "include/foot_script.html"; ?>
<script>
    var searchText = document.getElementById('searchText');
    var acomplete = document.getElementById('acomplete');
    var searchForm = document.getElementById('searchForm');
    searchText.onkeyup = function() {
        if (this.value === '') {
            acomplete.innerHTML = '';
                return false;
            }
        acomplete.style.display = 'block';
        ajax(acomplete,'php/doacomplete.php',this.value);
    }
    searchForm.onsubmit = function(event) {
        event.preventDefault();
        acomplete.style.display = 'none';
        if (searchText.value === '') {
            searchOutput.innerHTML = '';
                return false;
            }
        ajax(searchOutput,'php/doSearchOutPut.php',searchText.value);
    }

    function ajax(obj,url,q) {
        var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        xhr.open('get',url+'?q='+q+'&t='+Date.now(),true);
        xhr.send();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                obj.innerHTML = xhr.responseText;
            }
        }
    }
</script>
</body>

</html>