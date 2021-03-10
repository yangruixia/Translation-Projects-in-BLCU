<?php

    include "../connection/lock.php";
    $text_row =  $_POST["value"];
    $tbid = $_POST["id"];

    $text = addslashes($text_row);
    
    $sql_update_text = "UPDATE tb SET `text` ='{$text}' WHERE `tbid` = '{$tbid}'";

    $update = mysqli_query($conn,$sql_update_text);

    if(!$update)
    {
    	echo $lang["save_failed"];
    }
    else{
    	echo stripslashes($text); 
    }
?>