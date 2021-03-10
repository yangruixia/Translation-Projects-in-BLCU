<?php

include "baidu_transapi.php";
include "../connection/lock.php";
// require_once 'AipNlp.php';




//获得待处理的原文
$source = $_POST["yaochulideyuanwen"];

$sid = $_POST["yuanid"];
$pid = $_SESSION['project']; 
$uid  = $_SESSION['uid'];


//获取语言对
$sql_language = "SELECT langpairid FROM project WHERE pid = '$pid' ";
$language_result = mysqli_query( $conn, $sql_language);
$row = mysqli_fetch_array($language_result, MYSQLI_ASSOC);
$langpair = $row["langpairid"];

// echo $langpair;

//获取机器翻译结果
if($langpair==1)
{
	$from = "zh";
	$to = "en";
}
else
{
	$from = "en";
	$to = "zh";
}


$result = translate($source, $from, $to);
$mt = $result["trans_result"][0]["dst"]; 

$mt_result = "
<table class='table table-hover''>
	<thead>
		<tr>
			<th width='90%'>".$lang["machine_translation"]."</th>
			<th width='10%'>".$lang["origin"]."</th>
		</tr>
	</thead>
	
	<tbody>
		<tr class='table-warning'>
			
			<td>".$mt."</td>
			<td>".$lang["Baidu"]."</td>
		</tr>
	</tbody>
</table>
";



// // 你的 APPID AK SK
// const APP_ID = '11352570';
// const API_KEY = 'qIHlg4OA3vif3EkySH0hek3O';
// const SECRET_KEY = 'D7ecpWXkBttKcpa8BFy84nZ7lnqxtOEg';
// // const APP_ID = '18002276';
// // const API_KEY = 'hhxMVH6nvEdD3XzQsp0DlOfk';
// // const SECRET_KEY = 'hDovG51IY9yRf1OQyxy1tN9cYNaVgSMn';

//遍历翻译记忆库中的所有数据
//原sql语句 $sql = "SELECT * FROM tm WHERE uid = '$uid' ";
$sql = "SELECT tmdetail.en, tmdetail.zh, tmdetail.zh_split, tmdetail.tmid FROM tmdetail
INNER JOIN tmshare
ON tmdetail.tmid = tmshare.tmid
WHERE tmshare.pid = '$pid'";

mysqli_query($conn, "set names 'utf8'");

$huoqu = mysqli_query($conn,$sql);

$result="";

// // 该函数主要作用，过滤掉中文的标点符号，方便进行分词
// function filter_mark($text){
// 	if(trim($text)=='')return '';
// 	$text=preg_replace("/[[:punct:]\s]/",' ',$text);
// 	$text=urlencode($text);
// 	$text=preg_replace("/(%7E|%60|%21|%40|%23|%24|%25|%5E|%26|%27|%2A|%28|%29|%2B|%7C|%5C|%3D|\-|_|%5B|%5D|%7D|%7B|%3B|%22|%3A|%3F|%3E|%3C|%2C|\.|%2F|%A3%BF|%A1%B7|%A1%B6|%A1%A2|%A1%A3|%A3%AC|%7D|%A1%B0|%A3%BA|%A3%BB|%A1%AE|%A1%AF|%A1%B1|%A3%FC|%A3%BD|%A1%AA|%A3%A9|%A3%A8|%A1%AD|%A3%A4|%A1%A4|%A3%A1|%E3%80%82|%EF%BC%81|%EF%BC%8C|%EF%BC%9B|%EF%BC%9F|%EF%BC%9A|%E3%80%81|%E2%80%A6%E2%80%A6|%E2%80%9D|%E2%80%9C|%E2%80%98|%E2%80%99|%EF%BD%9E|%EF%BC%8E|%EF%BC%88)+/",' ',$text);
// 	$text=urldecode($text);
// 	return trim($text);
// }

function str1arr_utf8($str)#英文分词法
{
	$arr = explode(" ", $str);
	return $arr;
}

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

// 获取原语句对应的id
$sql_get = "SELECT source.context, sourcesplit.zh_split FROM source
LEFT JOIN sourcesplit
ON source.sid = sourcesplit.sid
WHERE source.sid = '$sid'";
mysqli_query($conn, "set names 'utf8'");

$source_get = mysqli_query($conn,$sql_get);
$source_row = mysqli_fetch_array($source_get, MYSQLI_ASSOC);
$source_row["context"];

// echo $source_row["zh_split"];


while ($row_target = mysqli_fetch_array($huoqu, MYSQLI_ASSOC)) 
{  
	// print_r($row_target);
	if ($langpair==1)
	{
		// echo $row_target["zh_split"];
		// echo json_decode($source_row["zh_split"]);
		// echo json_decode($source_row["zh_split"]);
		// $source_new = explode(' ' , json_decode($source_row["zh_split"]));
		// $target_new = explode(' ' , json_decode($row['zh_split']));
		$source_new = json_decode($source_row["zh_split"]);
		$target_new = json_decode($row_target["zh_split"]);
		$source_length = count((array)json_decode($source_row["zh_split"]));
		$target_length = count((array)json_decode($row_target["zh_split"]));
		
	}
	else 
	{
		$source_old = $source;
		$target_old = $row_target['en'];
		$source_length = str_word_count($source_old);
		$target_length = str_word_count($target_old);
		$source_new = str1arr_utf8($source_old);
		$target_new = str1arr_utf8($target_old);
	}

	$matrix = array();

	for ($i = 0; $i < $source_length; $i++)
	{
	$matrix[0][$i+2] = $source_new[$i];
	}

	for ($j = 0; $j < $target_length; $j++)
	{
	$matrix[$j+2][0] = $target_new[$j];
	}

	for ($k = 1;$k < $source_length+2;$k++)
	{  
	$matrix[1][$k] = $k-1;
	}

	for ($m = 2; $m < $target_length+2;$m++)
	{
	$matrix[$m][1] = $m-1;
	}

	for ($n = 2; $n < $target_length+2;$n++)
	{
		for ($w = 2; $w < $source_length+2;$w++)
		{
			
			if($matrix[$n][0] ==$matrix[0][$w])
			{
			$matrix[$n][$w] = $matrix[$n-1][$w-1]; 
			}
			else
			{
			$case_one = $matrix[$n-1][$w]+1;
				
			$case_two = $matrix[$n][$w-1]+1;
				
			$case_three = $matrix[$n-1][$w-1]+1;
			
			$matrix[$n][$w] = min($case_one,$case_two,$case_three );
			}
		}	
	}

	$matrix[0][0] = "START";
	$matrix[0][1] = "#";
	$matrix[1][0] = "#";
	$similarity = 1-$matrix[$target_length+1][$source_length+1]/max($source_length,$target_length);
	$similarity = $similarity * 100;
	if ($similarity>60)
	{
		if($langpair==1)
		{
			$result = $result."<tr class='table-danger'><td>".$row_target['zh']."</td><td>".$row_target['en']."</td><td>".$similarity."%</td></tr>";	
		}
		else
		{
			$result = $result."<tr class='table-danger'><td>".$row_target['en']."</td><td>".$row_target['zh']."</td><td>".$similarity."%</td></tr>";			
		}
	}
}
	

echo $mt_result."
<table class='table  table-hover'>
	<thead>
		<tr>
			<th width='45%'>".$lang["source"]."</th>
			<th width='45%'>".$lang["target"]."</th>
			<th width='10%'>".$lang["similarity"]."</th>
		</tr>
	</thead>
	
	<tbody>
			".$result."
	</tbody>
</table>


";

?>