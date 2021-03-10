<!-- 用于移除tm -->
<!-- YRX -->


<?php

include('../connection/function_lock.php');
$tmid = $_GET["id"];
$pr_id = $_SESSION['project'];

mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况

$sql_delete_share = "DELETE FROM tmshare WHERE `tmid` = '{$tmid}' AND `pid` = '{$pr_id}'";
$delete_share = mysqli_query($conn,$sql_delete_share);

if(!$delete_share)
{
    echo  "<script>alert('".$lang["move_failed"]."');history.go(-1);</script>";
}
else{
    echo  "<script>alert('".$lang["move_successfully"]."');history.go(-1);</script>";
}

?>