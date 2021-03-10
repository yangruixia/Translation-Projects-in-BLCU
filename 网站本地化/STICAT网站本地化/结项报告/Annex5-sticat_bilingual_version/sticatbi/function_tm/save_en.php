<?php
    include "../connection/lock.php";
    $en_row =  $_POST["value"];
    $tmdid = $_POST["id"];

    $en = addslashes($en_row);
    
    $sql_update_name = "UPDATE tmdetail SET `en` ='{$en}' WHERE `tmdid` = '{$tmdid}'";

    $update = mysqli_query($conn,$sql_update_name);

    if(!$update)
    {
    	echo $lang["save_failed"];
    }
    else{
    	echo stripslashes($en); 
    }
?>