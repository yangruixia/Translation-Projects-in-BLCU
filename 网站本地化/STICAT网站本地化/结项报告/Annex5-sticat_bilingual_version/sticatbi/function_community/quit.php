<!-- YRX -->


<?php

include('../connection/function_lock.php');
$pid = $_GET["id"];

mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况

$sql_delete_share = "UPDATE projectshare SET status = 0 WHERE `pid` = '{$pid}' AND `uid` = '{$user_id}'";
$delete_share = mysqli_query($conn,$sql_delete_share);

if(!$delete_share)
{
    echo  "<script>alert('".$lang["quit_failed"]."');history.go(-1);</script>";
}
else{
    echo  "<script>alert('".$lang["quit_successfully"]."');history.go(-1);</script>";
}

?>

