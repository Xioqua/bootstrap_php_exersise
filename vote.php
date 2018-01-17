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
            <li><a href="index.php">首页</a></li>
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
                    <input type="radio" name="optionsRadios" value='0'>
                    PC端网站重构
                  </label>
                </div>
                <div class="radio">
                    <label>
                    <input type="radio" name="optionsRadios" value='1'>
                    移动端网站重构
                  </label>
                </div>
                <div class="radio">
                    <label>
                    <input type="radio" name="optionsRadios" value='2'>
                    JavaScript
                  </label>
                </div>
                <div class="radio">
                    <label>
                    <input type="radio" name="optionsRadios" value='3'>
                    JQuery
                  </label>
                </div>
                <div class="radio">
                    <label>
                    <input type="radio" name="optionsRadios" value='4'>
                    Bootstrap
                  </label>
                </div>
                <div class="radio">
                    <label>
                    <input type="radio" name="optionsRadios" value='5'>
                    Angular
                  </label>
                </div>
                <div class="radio">
                    <label>
                    <input type="radio" name="optionsRadios" value='6'>
                   H5高级课程
                  </label>
                </div>
            </div>
            <button class="btn btn-success" id="btn1">投票</button>
        </div>
        <?php 
            $file = file_get_contents('config/vote.txt');
            $fileArr = explode('|',$file);
            $sum = array_sum($fileArr);
        ?>
        <div class="page-header">
            <h2 class="text-muted">各个科目受欢迎的百分比</h2>
            <p>此数据来自网络
            <span id="voteCount"><?php echo $sum;?></span>份用户投票结果</p>
        </div>

        <div class="voteWrap">
        <h4>PC端网站重构（<span><?php echo round($fileArr[0]/$sum*100);?></span>%）</h4>
            <div class="progress">
                <div id="vote0" class="progress-bar progress-bar-striped active" role="progressbar"
                     aria-valuenow="<?php echo round($fileArr[0]/$sum*100);?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round($fileArr[0]/$sum*100);?>%">
                     <?php echo round($fileArr[0]/$sum*100);?>%
                </div>
            </div>
            <h4>移动端网站重构（<span><?php echo round($fileArr[1]/$sum*100);?></span>%）</h4>
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar"
                     aria-valuenow="<?php echo round($fileArr[1]/$sum*100);?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round($fileArr[1]/$sum*100);?>%">
                     <?php echo round($fileArr[1]/$sum*100);?>%
                </div>
            </div>
            <h4>JavaScript（<span><?php echo round($fileArr[2]/$sum*100);?></span>%）</h4>
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar"
                     aria-valuenow="<?php echo round($fileArr[2]/$sum*100);?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round($fileArr[2]/$sum*100);?>%">
                     <?php echo round($fileArr[2]/$sum*100);?>%
                </div>
            </div>
            <h4>JQuery（<span><?php echo round($fileArr[3]/$sum*100);?></span>%）</h4>
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar"
                     aria-valuenow="<?php echo round($fileArr[3]/$sum*100);?>50" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round($fileArr[3]/$sum*100);?>%">
                     <?php echo round($fileArr[3]/$sum*100);?>%
                </div>
            </div>
            <h4>Bootstrap（<span><?php echo round($fileArr[4]/$sum*100);?></span>%）</h4>
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar"
                     aria-valuenow="<?php echo round($fileArr[4]/$sum*100);?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round($fileArr[4]/$sum*100);?>%">
                     <?php echo round($fileArr[4]/$sum*100);?>%
                </div>
            </div>
            <h4>Angular（<span><?php echo round($fileArr[5]/$sum*100);?></span>%）</h4>
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar"
                     aria-valuenow="<?php echo round($fileArr[5]/$sum*100);?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round($fileArr[5]/$sum*100);?>%">
                     <?php echo round($fileArr[5]/$sum*100);?>%
                </div>
            </div>
            <h4>H5高级课程（<span><?php echo round($fileArr[6]/$sum*100);?></span>%）</h4>
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar"
                     aria-valuenow="<?php echo round($fileArr[6]/$sum*100);?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round($fileArr[6]/$sum*100);?>%">
                     <?php echo round($fileArr[6]/$sum*100);?>%
                </div>
            </div>
        </div>
        <?php include "include/footer.html" ?>
    </div>
<?php include "include/foot_script.html"; ?>
<script>
    var btn1 = document.getElementById('btn1');
    var voteWrap = document.getElementsByClassName('voteWrap')[0];
    var optionsRadios = document.getElementsByName('optionsRadios');
    var vote_h4_span = document.querySelectorAll('.voteWrap h4 > span');
    var vote_div = voteWrap.querySelectorAll('.progress > div');
    var voteCount = document.getElementById('voteCount');

    btn1.onclick = function () {
        for(var i=0;i<7;i++) {
            if (optionsRadios[i].checked) {
                ajax('php/dovote.php',optionsRadios[i].value);
                break;
            }
        }
    };

    function ajax(url,q){
        if( window.XMLHttpRequest ){
            var Ajax = new window.XMLHttpRequest();
        }else{
            var Ajax = new ActiveXObject('Microsoft.XMLHTTP');
        }
        Ajax.open('get',url+'?q='+q+'&t='+Date.now(),true);
        Ajax.send();

        Ajax.onreadystatechange = function(){
            if( Ajax.readyState === 4 && Ajax.status === 200 ){
                var b = Ajax.responseText.split('|');
                var c = b.map(e => +e);
                var sum = c.reduce((sum,value) => {return sum + value});
                for(var j=0;j<c.length;j++) {
                   console.log( Math.round(c[j]/sum*100));
                    vote_h4_span[j].innerHTML = Math.round(c[j]/sum*100);
                    vote_div[j].style.width =  Math.round(c[j]/sum*100) + '%';
                    vote_div[j].innerHTML =  Math.round(c[j]/sum*100) + '%';
                    voteCount.innerHTML = sum;
                }
                changeColor();
            }
        }
    }

    /* 改变颜色 */
    function changeColor() {
        var voteNumArr = Array.from(vote_h4_span).map(e => +e.innerHTML);
        for (var i = 0; i < voteNumArr.length; i++) {
            var voteNum = voteNumArr[i];
            console.log(voteNum);
            if (voteNum>=0 &&voteNum <=10) {
                vote_div[i].className += ' progress-bar-info';
            } else if(voteNum>10 && voteNum <=20) {
                vote_div[i].className += ' progress-bar-success';
            } else if(voteNum >20 && voteNum <=30) {
                vote_div[i].className += ' progress-bar-warning';
            } else {
                vote_div[i].className += ' progress-bar-danger';
            }
        }
    }
    changeColor();
</script>
</body>
</html>