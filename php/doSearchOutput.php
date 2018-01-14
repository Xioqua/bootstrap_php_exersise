<?php
header('Content-type:text/html;charset=utf8');
$conn = new mysqli('localhost','root','root','myitem');
if ($conn->connect_error) die('连接错误');
@$q = $_GET['q'];
$sql = "SELECT * FROM u_article WHERE u_title LIKE '%$q%'";
$result = $conn->query($sql);
?>

<ul>
    <?php
    $nums = $result->num_rows;
        if ($nums>0) {
            while($row=$result->fetch_assoc()){
    ?>
    <li>
        <a href="<?php echo 'content.php?id='.$row['u_id']?>" target="_blank">
            <?php echo $row['u_title'];?>
        </a>
        <span class="searchArticleTime"><?php echo date('Y-m-d H:i:s',$row['u_add_date']);?></span>
    </li>
    <?php
                }
        }
    ?>

</ul>