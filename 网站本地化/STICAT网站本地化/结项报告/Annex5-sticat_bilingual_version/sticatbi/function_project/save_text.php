<?php
    #include "../connection/conn.php";
    include "../connection/lock.php";
    $text_row =  $_POST["value"];
    $pid = $_POST["id"];

    $text = addslashes($text_row);
    
    $sql_update_name = "UPDATE project SET `text` ='{$text}' WHERE `pid` = '{$pid}'";

    $update = mysqli_query($conn,$sql_update_name);

    if(!$update)
    {
    	echo $lang["save_failed"];
    }
    else{
    	echo stripslashes($text); 
    }
?>