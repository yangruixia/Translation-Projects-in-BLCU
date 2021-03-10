<?php

    include "../connection/lock.php";
    $name_row =  $_POST["value"];
    $tbid = $_POST["id"];

    $name = addslashes($name_row);
    
    $sql_update_name = "UPDATE tb SET `name` ='{$name}' WHERE `tbid` = '{$tbid}'";

    $update = mysqli_query($conn,$sql_update_name);

    if(!$update)
    {
    	echo $lang["save_failed"];
    }
    else{
    	echo stripslashes($name);
    }
?>