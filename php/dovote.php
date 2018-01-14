<?php
$q = $_GET['q'];
$file = file_get_contents('../config/vote.txt');
$fileArr = explode('|',$file);
$fileArr[$q] += 1;
$fileStr = implode('|',$fileArr);
file_put_contents('../config/vote.txt',$fileStr);
echo $fileStr;