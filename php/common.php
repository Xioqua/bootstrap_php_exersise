<?php
function input_fn($data)
{
    $outData = trim($data);
    $outData = htmlspecialchars($outData);
    return $outData;
}

function jump($_msg,$_jumpUrl) {
    global $msg,$jumpUrl;
    $msg = $_msg;
    $jumpUrl = $_jumpUrl;
    include "tips.php";
    exit;
}