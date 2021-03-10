<?php
    include "../connection/lock.php";
    $name_row =  $_POST["value"];
    $tmid = $_POST["id"];

    $name = addslashes($name_row);
    
    $sql_update_name = "UPDATE tm SET `name` ='{$name}' WHERE `tmid` = '{$tmid}'";

    $update = mysqli_query($conn,$sql_update_name);

    if(!$update)
    {
    	echo $lang["save_failed"];
    }
    else{
    	echo stripslashes($name);
    }
?>