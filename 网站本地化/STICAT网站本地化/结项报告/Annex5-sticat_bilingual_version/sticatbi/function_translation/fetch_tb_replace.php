<?php

include '../connection/conn.php';
session_start();
$pid  = $_SESSION['project'];

//获得待处理的原文
$source = $_POST["yaochulideyuanwen"];
$source_id = $_POST["yaochulideyuanwendeid"];
$source_change = $source;
// 原sql语句
// $sql = "SELECT * FROM tb WHERE uid = '$uid' ";
// 更改后的sql语句
$sql = "SELECT tbdetail.en, tbdetail.zh FROM tbdetail
INNER JOIN tbshare
ON tbdetail.tbid = tbshare.tbid
WHERE tbshare.pid = '$pid'
ORDER BY LENGTH(tbdetail.en) DESC";

mysqli_query($conn, "set names 'utf8'");

$huoqu = mysqli_query($conn,$sql);

$result="";

while ($row = mysqli_fetch_array($huoqu, MYSQLI_ASSOC)) {  
           
		if (strpos($source,$row['en']) !==false){			
			$source_change = str_replace($row['en'],"<font size=4 style=color:#0000FF><b>".$row['en']."</b></font>",$source_change);
		}
		if (strpos($source,$row['zh']) !==false){			
			$source_change = str_replace($row['zh'],"<font size=4 style=color:#0000FF><b>".$row['zh']."</b></font>",$source_change);
		}

}  
if(!($source == $source_change)){
	echo "<div id='".$source_id."'>".$source_change."</div>";
}
else{
	echo "<div id='".$source_id."'>".$source."</div>";
}


// echo "
// <table class='table table-hover'>
// 	<thead>
// 		<tr>
// 			<th>术语</th>
// 			<th>译文</th>
// 		</tr>
// 	</thead>
	
// 	<tbody>
// 			".$result."
// 	</tbody>
// </table>
// ";

?>