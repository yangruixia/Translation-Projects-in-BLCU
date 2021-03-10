<!-- 结项 -->

<?php

    include "../connection/lock.php";
    $pid = $_GET["id"];

    
    #将结项项目的默认翻译记忆库状态改成1
    $sql_status="UPDATE tm INNER JOIN tmshare 
    ON tm.tmid = tmshare.tmid AND tmshare.pid = $pid
    SET tm.status = 1 WHERE tm.status = 0";
    $sql_s_update = mysqli_query($conn,$sql_status);
    if(!$sql_s_update){
    	echo  "<script>alert('".$lang["tmoutput_failed"]."');history.go(-1);</script>";
    }
    
    #删除share表关系
    $sql_tbs = mysqli_query($conn,"SELECT * FROM tbshare WHERE `pid` = '{$pid}'");
    if(mysqli_num_rows($sql_tbs)>=1){
        $sql_delete_tbs = mysqli_query($conn,"DELETE FROM tbshare WHERE `pid` = '{$pid}'");
        if(!$sql_delete_tbs){
    	echo  "<script>alert('".$lang["failed_tryagain"]."');history.go(-1);</script>";
        }
    }

    $sql_tms = mysqli_query($conn,"SELECT * FROM tmshare WHERE `pid` = '{$pid}'");
    if(mysqli_num_rows($sql_tms)>=1){
        $sql_delete_tms = mysqli_query($conn,"DELETE FROM tmshare WHERE `pid` = '{$pid}'");
        if(!$sql_delete_tms){
    	echo  "<script>alert('".$lang["failed_tryagain"]."');history.go(-1);</script>";
        }
    }

    #结项项目的状态改成2
    $sql_update_status = "UPDATE project SET `status` = 2 WHERE `pid` = '{$pid}'";
    $update = mysqli_query($conn,$sql_update_status);
    if(!$update)
    {
    	echo  "<script>alert('".$lang["failed_tryagain"]."');history.go(-1);</script>";
    }
    else{
    	echo  "<script>alert('".$lang["project_finished"]."');history.go(-1);</script>";
    }
?>