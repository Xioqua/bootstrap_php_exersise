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
            $i=0;
            while($row=$result->fetch_assoc()){
                $i++;
                if($i>5) break;
    ?>
    <li>
        <a href="<?php echo 'content.php?id='.$row['u_id']?>"><?php echo mb_substr($row['u_title'],0,10);?>
        </a>
    </li>
    <?php
                }
        }
    ?>

</ul>