<!-- 删除翻译记忆库 -->

<?php

    include "../connection/lock.php";
    $tmid = $_GET["id"];

    mysqli_query($conn,"set names utf8");
    $sql_tmd = mysqli_query($conn,"SELECT * FROM tmdetail WHERE `tmid` = '{$tmid}'");
    if(mysqli_num_rows($sql_tmd)>=1){
        $sql_delete_tmd = mysqli_query($conn,"DELETE FROM tmdetail WHERE `tmid` = '{$tmid}'");
        if(!$sql_delete_tmd){
    	echo  "<script>alert('".$lang["delete_failed"]."');history.go(-1);</script>";
        }
    }

    $sql_tms = mysqli_query($conn,"SELECT * FROM tmshare WHERE `tmid` = '{$tmid}'");
    if(mysqli_num_rows($sql_tms)>=1){
        $sql_delete_tms = mysqli_query($conn,"DELETE FROM tmshare WHERE `tmid` = '{$tmid}'");
        if(!$sql_delete_tms){
    	echo  "<script>alert('".$lang["delete_failed"]."');history.go(-1);</script>";
        }
    }

    $sql_delete_tm = "DELETE FROM tm WHERE `tmid` = '{$tmid}'";
    $delete_tm = mysqli_query($conn,$sql_delete_tm);
    if(!$delete_tm)
    {
    	echo  "<script>alert('".$lang["delete_failed"]."');history.go(-1);</script>";
    }
    else{
    	echo  "<script>alert('".$lang["delete_successfully"]."');history.go(-1);</script>";
    }
?>