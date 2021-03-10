<?php

    include "../connection/lock.php";
    $en_row =  $_POST["value"];
    $tbdid = $_POST["id"];

    $en = addslashes($en_row);
    
    $sql_update_name = "UPDATE tbdetail SET `en` ='{$en}' WHERE `tbdid` = '{$tbdid}'";

    $update = mysqli_query($conn,$sql_update_name);

    if(!$update)
    {
    	echo $lang["save_failed"];
    }
    else{
    	echo stripslashes($en); 
    }
?>