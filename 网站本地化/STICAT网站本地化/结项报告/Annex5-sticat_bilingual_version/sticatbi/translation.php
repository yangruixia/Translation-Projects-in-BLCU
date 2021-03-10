<!-- 翻译界面 -->
<!-- YRX -->
<?php

include 'share/project.php';

?>

<?php

$file_id = $_GET['id']; 
$_SESSION['fileid']=$file_id;

?>

	
  <style>
	div#mt{
		height:300px;
		overflow:auto;
	}
	div#tb{
		height:300px;
		overflow:auto;
	}
	div#history{
		height:300px;
		overflow:auto;
	}
.my-custom-scrollbar {
position: relative;
height: 400px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
  </style>
 

  </head>
  <body>
<div class="container-fluid">

<div class="row">
		<div class="col-md-12">
		<div class="row">
				<div class="col-md-4">
				<span class="badge badge-primary hvr-rotate"><?php echo $lang["tm_machinetrans"];?></span>	
				</div>
				<div class="col-md-4">
				<span class="badge badge-primary hvr-rotate"><?php echo $lang["term"];?></span>	
				</div>
				<div class="col-md-4">
				<span class="badge badge-primary hvr-rotate"><?php echo $lang["history"];?></span>	
				</div>
			</div>
		</div>
		</div>
			<div class="row">
				<div id = "mt" class="col-md-4">
					
				</div>
				<div id = "tb" class="col-md-4">
					
				</div>
				
				<div id = "history" class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</div>
    <div class="container-fluid">
	
	<div class="row">
		<div class="col-md-12">

		<div class="card">
            <div class="card-body">
              
<div class="table-wrapper-scroll-y my-custom-scrollbar">
		<table id="translation" class="table table-hover">
		

<!-- Table head -->
<thead>
  <tr>
	
	<th width=50% class="font-weight-bold"><?php echo $lang["source"];?><span class="font-italic font-weight-lighter"><?php echo $lang["click_source"];?></span></th>
	<th width=50% class="font-weight-bold"><?php echo $lang["target"];?></th>

  </tr>
</thead>
<!-- Table head -->
<!-- Table body -->
<tbody>
</div>
          </div>

		  </div> 


  <?php 
  
 	
$sql ="
SELECT source.context AS source,source.sid AS id,target.context AS target,target.uid, target.date AS DATE
FROM source
LEFT JOIN 

(
	SELECT *
	FROM target AS a
	WHERE NOT EXISTS (
	SELECT 1
	FROM target AS b
	WHERE b.sid = a.sid
	AND b.date > a.date)
) target

ON source.sid = target.sid
WHERE source.fid = '{$file_id}'
ORDER BY id
";
$huoqu = mysqli_query($conn,$sql);
	
	mysqli_query($conn, "set names 'utf8'");	
	
	while ($row = mysqli_fetch_array($huoqu, MYSQLI_ASSOC)) 
	{  
		echo "<tr>
		<td class='target'><div id='".$row["id"]."'>".$row["source"]."</div></td>
		<td><div class='target-edit' id='".$row["id"]."'>".$row["target"]."</div></td>
		</tr>";
	} 

  ?>

</tbody>
<!-- Table body -->
</table>


		</div>
	</div>
	</div>
  </body>
  
  <script>
    $(".target-edit").editable("function_translation/save_target.php",{
      // width: 120, 
      // height: 30, 
			type      : "text",
			submit    : '<?php echo $lang["save"];?>',
			cancel    : '<?php echo $lang["cancel"];?>',
			tooltip   : "<?php echo $lang["edit"];?>",
      width     : "80%",
    });
</script>
<script language="javascript">
$("td.target").on("click",function(e){
	// alert($(e.target).text());
	// alert(e.target.id);
	// 原文
	var yuanwen = $(e.target).text();
	// 原文的id
	var yuanwenid = e.target.id;

		$.post("function_translation/fetch_tm.php",{
			yaochulideyuanwen:yuanwen,
			yuanid:yuanwenid
		},
		function(huodedejieguo){
			$("#mt").html(huodedejieguo)
		});
		
		$.post("function_translation/fetch_tb.php",{
			yaochulideyuanwen:yuanwen,
			yaochulideyuanwendeid:yuanwenid
		},
		function(huodedejieguo){
			$("#tb").html(huodedejieguo)

		});

		$.post("function_translation/fetch_tb_replace.php",{
			yaochulideyuanwen:yuanwen,
			yaochulideyuanwendeid:yuanwenid
		},
		function(huodedejieguo){
			//$(e.target).replaceWith(huodedejieguo)
			//console.log(yuanwenid);
			$("#"+yuanwenid).replaceWith(huodedejieguo)
			
		});

		$.post("function_translation/fetch_history.php",{
			yaochulideyuanwendeid:yuanwenid,
		},
		function(huodedejieguo){
			$("#history").html(huodedejieguo)
		});		
});
</script>
<!-- 摘自  爱jQuery：http://www.aijquery.cn/Html/ShiLi/67.html -->

<?php

include 'share/foot.php'

?>