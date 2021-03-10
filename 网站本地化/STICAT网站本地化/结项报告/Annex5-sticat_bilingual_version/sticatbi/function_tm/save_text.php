<?php
    include "../connection/lock.php";
    $text_row =  $_POST["value"];
    $tmid = $_POST["id"];
    // echo $tmid;

    $text = addslashes($text_row);
    
    $sql_update_text = "UPDATE tm SET `text` ='{$text}' WHERE `tmid` = '{$tmid}'";

    $update = mysqli_query($conn,$sql_update_text);

    if(!$update)
    {
    	echo $lang["save_failed"];
    }
    else{
    	echo stripslashes($text); 
    }
?>