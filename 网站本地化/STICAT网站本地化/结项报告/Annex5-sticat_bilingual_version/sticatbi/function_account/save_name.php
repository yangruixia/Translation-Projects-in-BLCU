<!-- 修改用户名涉及到一个很严重的问题，session也会改变，所以现在的阶段还不能修改用户名 -->
<!-- 本文件功能暂时无法使用 -->

<?php
    include "../connection/function_lock.php";
    $name_row =  $_POST["value"];
    $uid = $_POST["id"];

    $name = addslashes($name_row);
    
    $sql_update_name = "UPDATE user SET `username` ='{$name}' WHERE `uid` = '{$uid}'";

    $update = mysqli_query($conn,$sql_update_name);

    if(!$update)
    {
    	echo $lang["save_failed"];
    }
    else{
    	echo stripslashes($name);
    }
    
?>