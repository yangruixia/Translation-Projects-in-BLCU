<?php
    #include "../connection/conn.php";
    include "../connection/lock.php";
    $source_raw =  $_POST["value"];
    $sid = $_POST["id"];

    $source = addslashes($source_raw);
    
    $sql_update_source = "UPDATE source SET `context` ='{$source}' WHERE `sid` = '{$sid}'";

    $update = mysqli_query($conn,$sql_update_source);

    if(!$update)
    {
    	echo $lang["save_failed"];
    }
    else{
    	echo stripslashes($source); 
    }
?>