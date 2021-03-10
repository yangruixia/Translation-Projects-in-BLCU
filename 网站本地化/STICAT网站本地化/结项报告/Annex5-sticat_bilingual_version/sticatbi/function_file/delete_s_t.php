<?php
    #include "../connection/conn.php";
    include "../connection/lock.php";
    $sid = $_GET["id"];

    mysqli_query($conn,"set names utf8");
    $sql_target = mysqli_query($conn,"SELECT * FROM target WHERE `sid` = '{$sid}'");
    if(mysqli_num_rows($sql_target)==1){
        $sql_delete_target = mysqli_query($conn,"DELETE FROM target WHERE `sid` = '{$sid}'");
        if(!$sql_delete_target){
    	echo  "<script>alert('".$lang["delete_failed"]."');history.go(-1);</script>";
        }
    }

    $sql_delete_source = "DELETE FROM source WHERE `sid` = '{$sid}'";
    $delete_source = mysqli_query($conn,$sql_delete_source);
    if(!$delete_source)
    {
    	echo  "<script>alert('".$lang["delete_failed"]."');history.go(-1);</script>";
    }
    else{
    	echo  "<script>alert('".$lang["delete_successfully"]."');history.go(-1);</script>";
    }
?>