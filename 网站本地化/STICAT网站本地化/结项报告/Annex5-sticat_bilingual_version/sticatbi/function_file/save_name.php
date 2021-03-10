<?php
    #include "../connection/conn.php";
    include "../connection/lock.php";
    $name_raw =  $_POST["value"];
    $fid = $_POST["id"];

    $name = addslashes($name_raw);
    
    $sql_update_name = "UPDATE file SET `fname` ='{$name}' WHERE `fid` = '{$fid}'";

    $update = mysqli_query($conn,$sql_update_name);

    if(!$update)
    {
    	echo $lang["save_failed"];
    }
    else{
    	echo stripslashes($name); 
    }
?>