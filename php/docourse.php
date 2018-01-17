<?php
    include "../php/common.php";
    $con = new mysqli('localhost', 'root', 'root', 'myitem');
    if ($con->connect_error) { die('连接失败'); }
?>
<?php
	$pagesum = 4; // 每一页多少条
	$clumn = $_REQUEST["clumn"]; // 获取选择了那个栏目
	$page = $_REQUEST["page"]; // 当前第几页
	$pageStart = $page * $pagesum; // 从第一条开始调取数据
	
	if($clumn=="全部课程"){
		$sql = "select * from u_article order by u_id limit $pageStart,$pagesum";
		$ssql = "select * from u_article order by u_id"; // 获取总条数
	}else{
		$sql = "select * from u_article where u_column='$clumn' order by u_id limit $pageStart,$pagesum";
		$ssql = "select * from u_article where u_column='$clumn' order by u_id";  // 获取对应栏目的总条数
	}
	
	$result = $con->query($sql);
	$sresult = $con->query($ssql);
	$sumPage = ceil($sresult->num_rows/$pagesum); // 一共多少页
?>
<div class="row">

		<?php
        	if($result->num_rows>0){
				while($row = $result->fetch_assoc()){
		
		?>
    	<div class="col-lg-3">
        	<a href="show.php?id=<?php echo $row["u_id"]; ?>" class="thumbnail">
            	<img class="lazy" src="<?php echo $row["u_thumb"]; ?>" width="100%" data-src="images/pic_01.jpg" alt="<?php echo $row["u_title"]; ?>">
            </a>
        </div>
        <?php
        				
				}
			}
		?>
    </div>
    <nav>
      <ul class="pager">
        <li class="previous"><a href="javascript:change(<?php if($page-1==-1){echo 0;}else{echo $page-1;} ?>)">&larr; Older</a></li>
        <li class="next"><a href="javascript:change(<?php if($page==$sumPage-1){echo $sumPage-1;}else{echo $page+1;}?>)">Newer &rarr;</a></li>
      </ul>
    </nav>