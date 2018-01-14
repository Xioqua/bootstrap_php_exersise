<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <?php include "include/head.php"; ?>
    <title>投票页</title>
</head>

<body>
<?php include "include/navbar.php"; ?>
    <div class="container">
        <?php include "include/carousel.html"; ?>
        <ol class="breadcrumb">
            <li><a href="#">首页</a></li>
            <li class="active">投票</li>
        </ol>
        <div class="page-header">
            <h2 class="text-muted">请选择你喜欢的课程</h2>
            <p>你觉得你比较喜欢下面哪个课程，请选择</p>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="radio">
                    <label>
                    <input type="radio" name="optionsRadios" checked>
                    PC端网站重构
                  </label>
                </div>
                <div class="radio">
                    <label>
                    <input type="radio" name="optionsRadios">
                    移动端网站重构
                  </label>
                </div>
                <div class="radio">
                    <label>
                    <input type="radio" name="optionsRadios">
                    JavaScript
                  </label>
                </div>
                <div class="radio">
                    <label>
                    <input type="radio" name="optionsRadios">
                    JQuery
                  </label>
                </div>
                <div class="radio">
                    <label>
                    <input type="radio" name="optionsRadios">
                    Bootstrap
                  </label>
                </div>
                <div class="radio">
                    <label>
                    <input type="radio" name="optionsRadios">
                    Angular
                  </label>
                </div>
                <div class="radio">
                    <label>
                    <input type="radio" name="optionsRadios">
                   H5高级课程
                  </label>
                </div>
            </div>
            <button class="btn btn-success" id="btn1">投票</button>
        </div>
        <div class="page-header">
            <h2 class="text-muted">各个科目受欢迎的百分比</h2>
            <p>此数据来自网络<span id="voteCount">xxx</span>份用户投票结果</p>
        </div>

        <div class="voteWrap"><h4>PC端网站重构（20%）</h4>
            <div class="progress">
                <div id="vote0" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                    20%
                </div>
            </div>
            <h4>移动端网站重构（40%）</h4>
            <div class="progress">
                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                    40%
                </div>
            </div>
            <h4>JavaScript（75%）</h4>
            <div class="progress">
                <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar"
                     aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                    75%
                </div>
            </div>
            <h4>JQuery（50%）</h4>
            <div class="progress">
                <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar"
                     aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                    50%
                </div>
            </div>
            <h4>Bootstrap（30%）</h4>
            <div class="progress">
                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
                     aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                    30%
                </div>
            </div>
            <h4>Angular（35%）</h4>
            <div class="progress">
                <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar"
                     aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" style="width: 35%">
                    35%
                </div>
            </div>
            <h4>H5高级课程（90%）</h4>
            <div class="progress">
                <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar"
                     aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                    90%
                </div>
            </div>
        </div>
        <?php include "include/footer.html" ?>
    </div>
<?php include "include/foot_script.html"; ?>
<script>
    var btn1 = document.getElementById('btn1');
    var optionsRadios = voteWrap.getElementsByName('optionsRadios');
    var voteWrap = document.getElementsByClassName('voteWrap')[0];
    var vote_h4 = voteWrap.getElementsByTagName('h4');
    var vote_div = voteWrap.querySelectorAll('.progress > div');

    btn1.onclick = function () {
        ajax('config/vote.txt',);
    };

    function ajax(url,q){
        if( window.XMLHttpRequest ){
            var Ajax = new window.XMLHttpRequest();
        }else{
            var Ajax = new ActiveXObject('Microsoft.XMLHTTP');
        }
        Ajax.open('get',url+'?m='+q+'&t='+Math.random(),true);
        Ajax.send();

        Ajax.onreadystatechange = function(){
            if( Ajax.readyState === 4 && Ajax.status === 200 ){
                alert(Ajax.responseText);
            }
        }
    }
</script>
</body>
</html>