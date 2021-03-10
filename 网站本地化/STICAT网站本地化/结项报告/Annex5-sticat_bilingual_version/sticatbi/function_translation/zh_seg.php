<?php


const APP_ID = '11352570';
const API_KEY = 'qIHlg4OA3vif3EkySH0hek3O';
const SECRET_KEY = 'D7ecpWXkBttKcpa8BFy84nZ7lnqxtOEg';

          // 该函数主要作用，过滤掉中文的标点符号，方便进行分词
          function filter_mark($text){
          	if(trim($text)=='')return '';
          	$text=preg_replace("/[[:punct:]\s]/",' ',$text);
          	$text=urlencode($text);
          	$text=preg_replace("/(%7E|%60|%21|%40|%23|%24|%25|%5E|%26|%27|%2A|%28|%29|%2B|%7C|%5C|%3D|\-|_|%5B|%5D|%7D|%7B|%3B|%22|%3A|%3F|%3E|%3C|%2C|\.|%2F|%A3%BF|%A1%B7|%A1%B6|%A1%A2|%A1%A3|%A3%AC|%7D|%A1%B0|%A3%BA|%A3%BB|%A1%AE|%A1%AF|%A1%B1|%A3%FC|%A3%BD|%A1%AA|%A3%A9|%A3%A8|%A1%AD|%A3%A4|%A1%A4|%A3%A1|%E3%80%82|%EF%BC%81|%EF%BC%8C|%EF%BC%9B|%EF%BC%9F|%EF%BC%9A|%E3%80%81|%E2%80%A6%E2%80%A6|%E2%80%9D|%E2%80%9C|%E2%80%98|%E2%80%99|%EF%BD%9E|%EF%BC%8E|%EF%BC%88)+/",' ',$text);
          	$text=urldecode($text);
          	return trim($text);
          }

          function arr2zh($text)#中文分词法
          {
            $client = new AipNlp(APP_ID, API_KEY, SECRET_KEY);
            $output = $client->lexerCustom($text);
            // print_r($output);
            // echo '<br>';
            // 因为php机制更加完善，所以必须明确类型

            // $test = count($output["items"]);
            // isset($output["items"])
            // echo $test;
            $text_new = '';
            // 检查是否存在该键值对，如果否，则返回一个空字符串
            if(isset($output["items"])){
              $total = count($output["items"]);
              // $text_new = '';
              for($i=0;$i<$total;$i++)
              {
                $mot = $output["items"][$i]["item"];
                if ($i == $total-1)   # 避免最后一个词出现空格
                {
                  $text_new .= $mot;
                }
                else
                {
                  $mot .= ' ';
                  $text_new .= $mot;    
                } 
              }
            }
            return $text_new;
            }
            // $total = count(array($output["items"]));
          
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


?>