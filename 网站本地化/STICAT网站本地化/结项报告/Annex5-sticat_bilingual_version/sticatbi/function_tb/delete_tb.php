<!-- 删除翻译记忆库 -->

<?php

    include "../connection/lock.php";
    $tbid = $_GET["id"];

    mysqli_query($conn,"set names utf8");
    $sql_tbd = mysqli_query($conn,"SELECT * FROM tbdetail WHERE `tbid` = '{$tbid}'");
    if(mysqli_num_rows($sql_tbd)>=1){
        $sql_delete_tbd = mysqli_query($conn,"DELETE FROM tbdetail WHERE `tbid` = '{$tbid}'");
        if(!$sql_delete_tbd){
    	echo  "<script>alert('".$lang["delete_failed"]."');history.go(-1);</script>";
        }
    }

    $sql_tbs = mysqli_query($conn,"SELECT * FROM tbshare WHERE `tbid` = '{$tbid}'");
    if(mysqli_num_rows($sql_tbs)>=1){
        $sql_delete_tbs = mysqli_query($conn,"DELETE FROM tbshare WHERE `tbid` = '{$tbid}'");
        if(!$sql_delete_tbs){
    	echo  "<script>alert('".$lang["delete_failed"]."');history.go(-1);</script>";
        }
    }

    $sql_delete_tb = "DELETE FROM tb WHERE `tbid` = '{$tbid}'";
    $delete_tb = mysqli_query($conn,$sql_delete_tb);
    if(!$delete_tb)
    {
    	echo  "<script>alert('".$lang["delete_failed"]."');history.go(-1);</script>";
    }
    else{
    	echo  "<script>alert('".$lang["delete_successfully"]."');history.go(-1);</script>";
    }
?>
