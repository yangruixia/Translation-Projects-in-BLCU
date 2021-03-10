<?php

    include "../connection/lock.php";
    $zh_row =  $_POST["value"];
    $tbdid = $_POST["id"];

    $zh = addslashes($zh_row);
    
    $sql_update_name = "UPDATE tbdetail SET `zh` ='{$zh}' WHERE `tbdid` = '{$tbdid}'";

    $update = mysqli_query($conn,$sql_update_name);

    if(!$update)
    {
    	echo $lang["save_failed"];
    }
    else{
    	echo stripslashes($zh); 
    }
?>