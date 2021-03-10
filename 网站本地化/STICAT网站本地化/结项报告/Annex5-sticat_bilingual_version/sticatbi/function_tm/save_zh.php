<?php
// 更新时也需要考虑到中文字段的修改
    include "../connection/lock.php";
    include "../function_translation/baidu_transapi.php";
    require_once '../function_translation/AipNlp.php';
    include "../function_translation/zh_seg.php";

    $zh_row =  $_POST["value"];
    $tmdid = $_POST["id"];

    $zh = addslashes($zh_row);



// 对中文句子进行分词
$zh_split = explode(' ' , arr2zh(filter_mark($zh)));
// 使用json编码将数组转化成为字符串
$zh_split_json = json_encode($zh_split);  


    
    $sql_update_name = "UPDATE tmdetail SET `zh` ='{$zh}', `zh_split` ='{$zh_split_json}'  WHERE `tmdid` = '{$tmdid}'";

    $update = mysqli_query($conn,$sql_update_name);

    if(!$update)
    {
    	echo $lang["save_failed"];
    }
    else{
    	echo stripslashes($zh); 
    }
?>