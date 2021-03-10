<?php

// include '../connection/conn.php';
include "../connection/function_lock.php";

session_start();
$pid  = $_SESSION['project'];

//获得待处理的原文
$source = $_POST["yaochulideyuanwen"];

// 原sql语句
// $sql = "SELECT * FROM tb WHERE uid = '$uid' ";
// 更改后的sql语句
$sql = "SELECT tbdetail.en, tbdetail.zh FROM tbdetail
INNER JOIN tbshare
ON tbdetail.tbid = tbshare.tbid
WHERE tbshare.pid = '$pid'";

mysqli_query($conn, "set names 'utf8'");

$huoqu = mysqli_query($conn,$sql);

$result="";

while ($row = mysqli_fetch_array($huoqu, MYSQLI_ASSOC)) {  
           
		if (strpos($source,$row['en']) !==false){
			
			$result = $result."<tr class='table-success'><td>".$row['en']."</td><td>".$row['zh']."</td></tr>";	
			
		}

		if (strpos($source,$row['zh']) !==false){
			
			$result = $result."<tr class='table-success'><td>".$row['zh']."</td><td>".$row['en']."</td></tr>";		
		
		}
}  

echo "
<table class='table table-hover'>
	<thead>
		<tr>
			<th>".$lang["term"]."</th>
			<th>".$lang["target"]."</th>
		</tr>
	</thead>
	
	<tbody>
			".$result."
	</tbody>
</table>


";

?>