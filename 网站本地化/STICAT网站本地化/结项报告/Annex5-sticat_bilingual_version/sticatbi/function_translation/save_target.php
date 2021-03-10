<?php
    include "../connection/function_lock.php";
    require_once 'AipNlp.php';
    include "zh_seg.php";

    $text_raw =  $_POST["value"];
    $text = addslashes($text_raw);
    $id = $_POST["id"];
    $pid = $_SESSION['project']; 
    // 一定要设置上海时区
    date_default_timezone_set("Asia/Shanghai");
    $date = date("YmdHis");
    $uid = $user_id;
    
    $sql_update_text = "INSERT INTO target (sid,context,date,uid) VALUES ('$id','$text','$date','$uid')";

    $update = mysqli_query($conn,$sql_update_text);

    if(!$update)
    {
    	echo $lang["save_failed"];
    }
    else{
    	echo stripslashes($text); 
    }


    //获取原文
    $sql_source = "SELECT context FROM source WHERE sid = '$id'";
    $source_result = mysqli_query($conn,$sql_source);
    $row = mysqli_fetch_array($source_result, MYSQLI_ASSOC);
    $source = addslashes($row["context"]);

    //获取语言对
    $sql_language = "SELECT langpairid FROM project WHERE pid = '$pid' ";
    $language_result = mysqli_query( $conn, $sql_language);
    $row = mysqli_fetch_array($language_result, MYSQLI_ASSOC);
    $langpair = $row["langpairid"];



    //获取默认翻译记忆库id
    $sql = "SELECT tm.tmid, tm.status FROM tm
    INNER JOIN tmshare
    ON tm.tmid = tmshare.tmid
    WHERE tmshare.pid = '$pid' AND tm.status = 0";
    mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况
    $tmid_result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($tmid_result, MYSQLI_ASSOC);
    $tmid = $row["tmid"];


    if($langpair==1)
    // 中到英
    {
        $query = "SELECT zh FROM tmdetail WHERE tmid= '$tmid' AND zh= '$source'";
        $query_result = mysqli_query($conn,$query);
        $num = mysqli_num_rows($query_result);
        $zh_split = explode(' ' , arr2zh(filter_mark($source)));
        $zh_split_json = json_encode($zh_split);  
        if($num)
        {
            $sql_update = "UPDATE tmdetail SET en='$text' WHERE tmid='$tmid' AND zh= '$zh_split_json'";
            $res_insert = mysqli_query($conn,$sql_update); 
        }
        else
        {
            $sql_update_text = "INSERT INTO tmdetail (en,zh,tmid,zh_split) VALUES ('$text','$source','$tmid','$zh_split_json')";
            $update = mysqli_query($conn,$sql_update_text);
        }
    }
    else
    // 英到中
    {
        $query = "SELECT en FROM tmdetail WHERE tmid= '$tmid' AND en= '$source'";
        $query_result = mysqli_query($conn,$query);
        $num = mysqli_num_rows($query_result);
        $zh_split = explode(' ' , arr2zh(filter_mark($text)));
        $zh_split_json = json_encode($zh_split);  
        if($num)
        {
            $sql_update = "UPDATE tmdetail SET `zh` ='{$text}', `zh_split` ='{$zh_split_json}' WHERE tmid='$tmid' AND en= '$source'";
            $res_insert = mysqli_query($conn,$sql_update); 
        }
        else
        {
            $sql_update_text = "INSERT INTO tmdetail (zh,en,tmid,zh_split) VALUES ('$text','$source','$tmid','$zh_split_json')";
            $update = mysqli_query($conn,$sql_update_text);
        } 
    }

   

    // if(!$update)
    // {
    // 	echo "翻译记忆保存失败";
    // }
    // else{
    // 	echo ""; 
    // }

?>