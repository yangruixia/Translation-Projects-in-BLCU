<!-- 
	将数字转化为时间：https://www.jb51.net/article/113964.htm
 -->


 <?php
include "../connection/function_lock.php";

//获得待处理的原文的ID
$source_id = $_POST["yaochulideyuanwendeid"];

$sql = "SELECT * FROM target LEFT JOIN user ON target.uid = user.uid WHERE sid = {$source_id} ORDER BY date DESC ";

mysqli_query($conn, "set names 'utf8'");

$huoqu = mysqli_query($conn,$sql);

$result="";

$count = 0;
while ($count<10 and $row = mysqli_fetch_array($huoqu, MYSQLI_ASSOC)) {  
		$count = $count + 1;
		$dotime = $row['date'];
		$time = strtotime($dotime);
		// $time_final = date('Y-m-d h:i:s',$time);
		$nowtime=date('Y-m-d H:i:s',$time);          
		$result = $result."<tr class='table-info'><td>".stripslashes($row['context'])."</td><td>".$row['username']."</td><td>".$nowtime."</td></tr>";	
		
        }  

echo "
<table class='table table-hover'>
	<thead>
		<tr>
			<th>".$lang["target"]."</th>
			<th>".$lang["user"]."</th>
			<th>".$lang["time"]."</th>
		</tr>
	</thead>
	
	<tbody>
			".$result."
	</tbody>
</table>


";

?>