<?php


include('../connection/lock.php');
include "../function_translation/baidu_transapi.php";
require_once '../function_translation/AipNlp.php';

include "../function_translation/zh_seg.php";


session_start();
$tmid = $_SESSION['tm'];    //获取tmid

#if ($_FILES["file"]["error"] > 0)
#{
#echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
#}
#else{
if (file_exists("upload/" . $_FILES["file"]["name"]))
{
    echo "<script>alert('".$lang["file_existed"]."');location.href='../tm_detail.php?id={$tmid}';</script>";
}
else
{
    move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
    #echo "Stored in: " . "./" . $_FILES["file"]["name"];



 
      $xml = simplexml_load_file("upload/".$_FILES["file"]["name"]); //从TMX文件中读取数据，存入$xml变量

      $json = json_encode($xml); //将$xml中的数据转换为JSON格式
  
      $array = json_decode($json,true); //将JSON格式转换为PHP数组
  

      foreach($array["body"]["tu"] as $tu)
      {

        if((count($tu))==2){
            $zh_raw = $tu[0]["seg"];

            $zh = addslashes($zh_raw);

            // 进行分词 使用百度分词api进行分词

            // 你的 APPID AK SK
            

            // // 该函数主要作用，过滤掉中文的标点符号，方便进行分词
            // function filter_mark($text){
            // 	if(trim($text)=='')return '';
            // 	$text=preg_replace("/[[:punct:]\s]/",' ',$text);
            // 	$text=urlencode($text);
            // 	$text=preg_replace("/(%7E|%60|%21|%40|%23|%24|%25|%5E|%26|%27|%2A|%28|%29|%2B|%7C|%5C|%3D|\-|_|%5B|%5D|%7D|%7B|%3B|%22|%3A|%3F|%3E|%3C|%2C|\.|%2F|%A3%BF|%A1%B7|%A1%B6|%A1%A2|%A1%A3|%A3%AC|%7D|%A1%B0|%A3%BA|%A3%BB|%A1%AE|%A1%AF|%A1%B1|%A3%FC|%A3%BD|%A1%AA|%A3%A9|%A3%A8|%A1%AD|%A3%A4|%A1%A4|%A3%A1|%E3%80%82|%EF%BC%81|%EF%BC%8C|%EF%BC%9B|%EF%BC%9F|%EF%BC%9A|%E3%80%81|%E2%80%A6%E2%80%A6|%E2%80%9D|%E2%80%9C|%E2%80%98|%E2%80%99|%EF%BD%9E|%EF%BC%8E|%EF%BC%88)+/",' ',$text);
            // 	$text=urldecode($text);
            // 	return trim($text);
            // }

            // function arr2zh($text)#中文分词法
            // {
            //   $client = new AipNlp(APP_ID, API_KEY, SECRET_KEY);
            //   $output = $client->lexerCustom($text);
            //   $total = count($output["items"]);
            
            //   $text_new = '';
            //   for($i=0;$i<$total;$i++)
            //   {
            //     $mot = $output["items"][$i]["item"];
            //     if ($i == $total-1)   # 避免最后一个词出现空格
            //     {
            //       $text_new .= $mot;
            //     }
            //     else
            //     {
            //       $mot .= ' ';
            //       $text_new .= $mot;    
            //     } 
            //   }
            //   return $text_new;
            // }

            // 对中文句子进行分词
            $zh_split = explode(' ' , arr2zh(filter_mark($zh)));
            // 使用json编码将数组转化成为字符串
            $zh_split_json = json_encode($zh_split);  
    
            #echo $zh;
            
            $en_raw = $tu[1]["seg"];

            $en = addslashes($en_raw);
    
            #echo $en;
            
            $insert_sql = "INSERT INTO `tmdetail` (`zh`, `en`,`tmid`,`zh_split`) VALUES ('{$zh}', '{$en}','{$tmid}', '{$zh_split_json}')";
            
            $status = mysqli_query($conn,$insert_sql);
            
            if(!$status)
            {
                echo "<script>alert('".$lang["upload_failed"]."');location.href='../tm_detail.php?id={$tmid}';</script>";
            }
            else
            {
                unlink("upload/".$_FILES["file"]["name"]);
                echo "<script>alert('".$lang["upload_successfully"]."');location.href='../tm_detail.php?id={$tmid}';</script>";
            }
           }
        
        else{
          $zh_raw = $tu["tuv"][0]["seg"];

          $zh = addslashes($zh_raw);

          // 进行分词 使用百度分词api进行分词

          
          // 该函数主要作用，过滤掉中文的标点符号，方便进行分词
          // function filter_mark1($text){
          // 	if(trim($text)=='')return '';
          // 	$text=preg_replace("/[[:punct:]\s]/",' ',$text);
          // 	$text=urlencode($text);
          // 	$text=preg_replace("/(%7E|%60|%21|%40|%23|%24|%25|%5E|%26|%27|%2A|%28|%29|%2B|%7C|%5C|%3D|\-|_|%5B|%5D|%7D|%7B|%3B|%22|%3A|%3F|%3E|%3C|%2C|\.|%2F|%A3%BF|%A1%B7|%A1%B6|%A1%A2|%A1%A3|%A3%AC|%7D|%A1%B0|%A3%BA|%A3%BB|%A1%AE|%A1%AF|%A1%B1|%A3%FC|%A3%BD|%A1%AA|%A3%A9|%A3%A8|%A1%AD|%A3%A4|%A1%A4|%A3%A1|%E3%80%82|%EF%BC%81|%EF%BC%8C|%EF%BC%9B|%EF%BC%9F|%EF%BC%9A|%E3%80%81|%E2%80%A6%E2%80%A6|%E2%80%9D|%E2%80%9C|%E2%80%98|%E2%80%99|%EF%BD%9E|%EF%BC%8E|%EF%BC%88)+/",' ',$text);
          // 	$text=urldecode($text);
          // 	return trim($text);
          // }

          // function arr2zh1($text)#中文分词法
          // {
          //   $client = new AipNlp(APP_ID, API_KEY, SECRET_KEY);
          //   $output = $client->lexerCustom($text);
          //   $total = count($output["items"]);
          
          //   $text_new = '';
          //   for($i=0;$i<$total;$i++)
          //   {
          //     $mot = $output["items"][$i]["item"];
          //     if ($i == $total-1)   # 避免最后一个词出现空格
          //     {
          //       $text_new .= $mot;
          //     }
          //     else
          //     {
          //       $mot .= ' ';
          //       $text_new .= $mot;    
          //     } 
          //   }
          //   return $text_new;
          // }

          // 对中文句子进行分词
          $zh_split = explode(' ' , arr2zh(filter_mark($zh)));
          // 使用json编码将数组转化成为字符串
          $zh_split_json = json_encode($zh_split);  

          // echo $zh;
          
          $en_raw = $tu["tuv"][1]["seg"];

          $en = addslashes($en_raw);

          // echo $en;
          
          $insert_sql = "INSERT INTO `tmdetail` (`zh`, `en`,`tmid`,`zh_split`) VALUES ('{$zh}', '{$en}','{$tmid}', '{$zh_split_json}')";
            
          $status = mysqli_query($conn,$insert_sql);
          
          if(!$status)
          {
              echo "<script>alert('".$lang["upload_failed"]."');location.href='../tm_detail.php?id={$tmid}';</script>";
          }
          else
          {
            
            echo "<script>alert('".$lang["upload_successfully"]."');</script>";
        }
        unlink("upload/".$_FILES["file"]["name"]);
        echo "<script>location.href='../tm_detail.php?id={$tmid}';</script>";
      }
      }
    }


?>