<!-- 文件名 -->

<?php

include 'share/project.php';

?>


<?php
$pr_id = $_GET['id']; 
$_SESSION['project']=$pr_id;

$ses_sql=mysqli_query($conn,"SELECT * FROM project WHERE pid='$pr_id' ");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$project_session=$row['projectname'];


?>



	<!-- <div class="loading-bar">
		<div class="amount green" style="width: 40%;">
			<div class="loaded">
				40%
			</div>
			<div class="lines"></div>
		</div>
  </div>
  


	<div class="loading-bar">
		<div class="amount blue" style="width: 60%">
			<div class="loaded">
				60%
			</div>
			<div class="lines"></div>
		</div>
	</div>
	<div class="loading-bar">
		<div class="amount red" style="width: 80%">
			<div class="loaded">
				80%
			</div>
			<div class="lines"></div>
		</div>
	</div>
</div> -->


















<!-- 切记不可删除，否则datatable不管用 -->
    <!-- Sidebar navigation  -->
      <ul>
      </ul>
    <!-- Sidebar navigation  -->






  <!-- Main layout  -->
  <main>
    <div class="container-fluid mb-5">
    <section>






        <!-- Gird column -->
        <div class="col-md-12">




        <div class="card">
            <div class="card-body">
  <div class="row text-right">
         
  <div class="col-md-8 text-left">
    <a class="btn peach-gradient btn-rounded btn-sm" href="project.php"><?php echo $lang["go_back"];?></a>
</div>

    <div class="col-md-4">
          <form action="function_tmx/tmxapi.php" method="post" enctype="multipart/form-data">

						<button class="btn purple-gradient btn-rounded btn-sm" type="button"><?php echo $lang["choose_file"];?></button>
						<input type="file" name="file" id="jobData" onchange="loadFile(this.files[0])" style="position:absolute;top:0;left:0;font-size:34px; opacity:0">
                        <input type="text" class="form-control mb-4" name="fname" style="display: none" >
                        <input type="text" class="form-control mb-4" name="pid" style="display: none"  >
                        <input type="text" class="form-control mb-4" name="address" style="display: none" >

					<span id="filename" style="vertical-align: middle"><?php echo $lang["no_upload_file"];?></span>
				
				<script>
				function loadFile(file){
          $("#filename").html(file.name);
          $filename= file.name;
				}
				</script>
				<button id="fun" class="btn btn-default btn-rounded btn-sm" type="submit"><?php echo $lang["upload_file"];?></button>	
							
			</form>
    </div> 
          

  </div>
  <!--/Card image-->
      <table id="dtMaterialDesignExample" class="table table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
                  <tr>
                    <th width=5%><?php echo $lang["hash"];?>
                    </th>
                    <th width=15%><?php echo $lang["file_name"];?>
                    </th>
                    <th width=40%><?php echo $lang["completeness"];?>
                    </th>
                    <th width=20%><?php echo $lang["created_date"];?>
                    </th>
                    <th width=20%><?php echo $lang["operation"];?>
                    </th>
                  </tr>
                </thead>
                <?php 
				
                $sql = "SELECT * FROM file WHERE pid='$pr_id'"; 
                mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况
			 	        $result = mysqli_query($conn,$sql);
                $i = 1;
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			          {
                $id = $row["fid"];
                $sql_count = "SELECT COUNT(context) AS SourceCount FROM source WHERE fid='$id'";//统计原文句子数量
                $query = mysqli_query($conn,$sql_count);
                if(mysqli_num_rows($query)){
                  $rs=mysqli_fetch_array($query); 
                  //统计结果
                  $count=$rs[0];
                }
                else{
                $count=0;
                }
  
                $sql_count_trans = "SELECT COUNT(target.context) AS TargetCount,source.sid AS id,target.date AS date
                FROM source
	              INNER JOIN 
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
                WHERE source.fid = '{$id}'"
                
                ;//统计已翻译的数量
                $query = mysqli_query($conn,$sql_count_trans);
                if(mysqli_num_rows($query)){
                  $rs=mysqli_fetch_array($query);
                  //统计结果
                  $count_trans=$rs[0];
                }else{
                $count_trans=0;
                }

                if($count == 0){
                  $result_per=0;
                }
                else{
                  $result_per=round($count_trans*100/$count);
                }
                
                
                //echo $count;
                echo "<tr>
                <td>".$i."</div></td>
                <td><div class='file-name-edit' id='".$row["fid"]."'>".stripslashes($row["fname"])."</div></td>
                
                <td id='count_{$id}'>
                  <div class='loading-bar'>
                ";
                $i++;
                if($result_per>=0 & $result_per<=30){
                echo"  <div class='amount red' style='width: ".$result_per."%;'>
			              <div class='loaded'>
				              ".$result_per."%
			              </div>
			              <div class='lines'></div>
		                </div> ";
                }
                else if($result_per>30 & $result_per<=70){
                echo"  <div class='amount blue' style='width: ".$result_per."%;'>
			              <div class='loaded'>
				              ".$result_per."%
			              </div>
			              <div class='lines'></div>
		                </div> ";
                }
                else if($result_per>70){
                  echo"  <div class='amount green' style='width: ".$result_per."%;'>
			              <div class='loaded'>
				              ".$result_per."%
			              </div>
			              <div class='lines'></div>
		                </div> ";
                }
                echo" </div>
                </td>
                
                <td id='time_{$id}'>{$row["time"]}</td>

                <td>	

                <a type='submit' class='btn-floating btn-success hvr-float-shadow' href ='translation.php?id={$id}'><i class='fas fa-pen'></i></a>	
                <a type='submit' class='btn-floating btn-info hvr-float-shadow btn-sm' href ='file_edition.php?id={$id}'><i class='far fa-eye'></i></a>
                <a type='submit' class='btn-floating btn-danger btn-sm hvr-float-shadow' href ='function_file/delete_file.php?id={$id}' onclick='return del();'><i class='far fa-trash-alt'></button>													
            
                </td>
                
                </tr>";
              }
                ?>
                



                <tfoot>
                   <tr>
                    <th><?php echo $lang["hash"];?>
                    </th>
                    <th><?php echo $lang["file_name"];?>
                    </th>
                    <th><?php echo $lang["completeness"];?>
                    </th>
                    <th><?php echo $lang["created_date"];?>
                    </th>
                    <th><?php echo $lang["operation"];?>
                    </th>
                  </tr>
                </tfoot>
              </table>
      <!--Table-->
    </div>

  <!-- </div> -->

  </div>
<!-- Table with panel -->
<br>


<div class="row">

<div class="col-md-12">
<div class="row">
    <div class="col-md-6">
    
    <div class="card">
    <div class="card-body">
    <span class="badge badge badge-pill badge-info hvr-rotate	"><?php echo $project_session;?><?php echo $lang["corresponding_tb"];?></span>	
    <div class="col-md-12 text-right">
              <!-- 跳转到只能查看术语库的界面，并加入添加按钮（显示自己的术语库） -->
              <form action="tb_select.php" method="post">   
					  
              <input type="text" class="form-control mb-4" name="pid" style="display: none">
              <input type="text" class="form-control mb-4" name="langpairid" style="display: none">
              <button class="btn-sm btn-info btn-rounded btn " type='submit'><?php echo $lang["add_tb"];?></button>
		  	      </form>
            </div>
      <table id="dtBasicExample1" class="table table-striped table-hover" cellspacing="0" width="100%">
        <thead>
          <tr>
          <th width=5%><?php echo $lang["hash"];?>
            </th>
            <th width=20%><?php echo $lang["name"];?>
            </th>
            <th width=30%><?php echo $lang["description"];?>
            </th>
            <th width=20%><?php echo $lang["creator"];?>
            </th>
            <th width=25%><?php echo $lang["operation"];?>
            </th>
          </tr>
        </thead>
        <?php 
        $sql = "SELECT tb.tbid, tb.name, tb.text, tb.date, tb.uid, tbshare.pid, user.username,user.uid 
        FROM tb
        INNER JOIN tbshare
        ON tb.tbid = tbshare.tbid
        INNER JOIN user
        ON tb.uid = user.uid
        WHERE tbshare.pid = '$pr_id' ";
        mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);

if($count == 0)
{
  echo $lang["no_tb_added"]."<br>";
}
else
{
  $i=1;
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
  {

    

    $id = $row["tbid"];
    echo "<tr>
    <td>$i</td>
    <td><div id='".$row["tbid"]."'>".stripslashes($row["name"])."</div></td>
    <td><div id='".$row["tbid"]."'>".stripslashes($row["text"])."</div></td>
    <td><a class='hvr-wobble-horizontal' href = 'user_show.php?id={$row["uid"]}'><span class='badge badge-pill deep-orange lighten-2'><i class='fas fa-user' aria-hidden='true'>&nbsp".$row["username"]."</i></span>&nbsp</a>
    </td>
    <td>	
    <a type='submit' class='btn-floating btn-info hvr-float-shadow btn-sm' href ='tb_show.php?id={$id}'><i class='far fa-eye'></i></a>
    <a type='submit' class='btn-floating btn-danger btn-sm hvr-float-shadow' href ='function_project_tb/delete.php?id={$id}' onclick='return quit();'><i class='far fa-trash-alt'></button>																		
    </td>
    </tr>";
    $i++;
    
  } 
}
        ?>

        
      </table>
    </div>
  </div>

    
    
    
    </div>
    <div class="col-md-6">
    
    
    <div class="card">
    <div class="card-body">
    <span class="badge badge badge-pill badge-info hvr-rotate"><?php echo $project_session;?><?php echo $lang["corresponding_tm"];?></span>	
    <div class="col-md-12 text-right">
              <div>
               <!-- 跳转到只能查看翻译记忆库的界面，并加入添加按钮（显示自己的翻译库） -->
              <form action="tm_select.php" method="post">
						  
              <input type="text" class="form-control mb-4" name="pid" style="display: none">
              <input type="text" class="form-control mb-4" name="langpairid" style="display: none">
              <button class="btn-sm btn-info btn-rounded btn " type='submit'><?php echo $lang["add_tm"];?></button>
		  	      </form>
              </div> 
            </div>
      <table id="dtBasicExample2" class="table table-striped table-hover" cellspacing="0" width="100%">
        <thead>
        <tr>
          <th width=5%><?php echo $lang["hash"];?>
            </th>
            <th width=20%><?php echo $lang["name"];?>
            </th>
            <th width=30%><?php echo $lang["description"];?>
            </th>
            <th width=20%><?php echo $lang["creator"];?>
            </th>
            <th width=25%><?php echo $lang["operation"];?>
            </th>
          </tr>
        </thead>
        <?php 
        $sql = "SELECT tm.status, tm.tmid, tm.name, tm.text, tm.date, tm.uid, tmshare.pid, user.username,user.uid 
        FROM tm
        INNER JOIN tmshare
        ON tm.tmid = tmshare.tmid
        INNER JOIN user
        ON tm.uid = user.uid
        WHERE tmshare.pid = '$pr_id' ";
        mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);

if($count == 0)
{
  echo $lang["no_tm_added"]."<br>";
}
else
{
  $i=1;
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
  {

    
   

    $id = $row["tmid"];
    $status = $row["status"];
    echo "<tr>
    <td>$i</td>
    <td><div id='".$row["tmid"]."'>".stripslashes($row["name"])."</div></td>
    <td><div id='".$row["tmid"]."'>".stripslashes($row["text"])."</div></td>
    <td><a class='hvr-wobble-horizontal' href = 'user_show.php?id={$row["uid"]}'><span class='badge badge-pill deep-orange lighten-2'><i class='fas fa-user' aria-hidden='true'>&nbsp".$row["username"]."</i></span>&nbsp</a>
    </td>
    <td>";

    if($status == 1){
      echo"<a type='submit' class='btn-floating btn-info hvr-float-shadow btn-sm' href ='tm_show.php?id={$id}'><i class='far fa-eye'></i></a>
      <a type='submit' class='btn-floating btn-danger btn-sm hvr-float-shadow' href ='function_project_tm/delete.php?id={$id}' onclick='return quit();'><i class='far fa-trash-alt'></button>																		
               ";
    }
    else{
      echo"
      <a type='submit' class='btn-floating btn-info hvr-float-shadow btn-sm' href ='tm_show.php?id={$id}'><i class='far fa-eye'></i></a>																			
";
    }


      echo"    
    </td>
    </tr>";
    $i++;
    
  } 
}

        ?>

        
      </table>
    </div>
  </div>
    

    
    
    </div>
    
  </div>

  </div>
  </div>
 
<!-- Panel -->

<script>
    $(".file-name-edit").editable("function_file/save_name.php",{
      // width: 120, 
      // height: 30, 
			type      : "text",
			submit    : '<?php echo $lang["save"];?>',
			cancel    : '<?php echo $lang["cancel"];?>',
			tooltip   : "<?php echo $lang["edit"];?>",
      width     : "<?php echo $lang["forty_five_percent"];?>",
    });
</script>

<script type="text/javascript">
     function del(){
        if(confirm("<?php echo $lang["deletefile_or_not"];?>")){
         return true;
        }else{
         return false;
        }
     }
</script>
<!-- 单独的foot -->

  <script>
$(document).ready(function () {
  $('#dtMaterialDesignExample').DataTable();
  $('#dtMaterialDesignExample_wrapper').find('label').each(function () {
    $(this).parent().append($(this).children());
  });
  $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('input').each(function () {
    const $this = $(this);
    $this.attr("placeholder", "Search");
    $this.removeClass('form-control-sm');
  });
  $('#dtMaterialDesignExample_wrapper .dataTables_length').addClass('d-flex flex-row');
  $('#dtMaterialDesignExample_wrapper .dataTables_filter').addClass('md-form');
  $('#dtMaterialDesignExample_wrapper select').removeClass(
  'custom-select custom-select-sm form-control form-control-sm');
  $('#dtMaterialDesignExample_wrapper select').addClass('mdb-select');
  $('#dtMaterialDesignExample_wrapper .mdb-select').materialSelect();
  $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('label').remove();
});

  </script>

<script>
$(document).ready(function () {
$('#dtBasicExample1').DataTable();
$('#dtBasicExample1_wrapper .dataTables_length').addClass('bs-select');
});
</script>

<script>
$(document).ready(function () {
$('#dtBasicExample2').DataTable();
$('#dtBasicExample2_wrapper .dataTables_length').addClass('bs-select');
});


</script>

  <!-- SCRIPTS  -->
  <!-- JQuery  -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips  -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript  -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- MDB core JavaScript  -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- DataTables  -->
  <script type="text/javascript" src="js/addons/datatables.min.js"></script>
  <!-- DataTables Select  -->
  <script type="text/javascript" src="js/addons/datatables-select.min.js"></script>
  <!-- Custom scripts -->

  </body>

</html>