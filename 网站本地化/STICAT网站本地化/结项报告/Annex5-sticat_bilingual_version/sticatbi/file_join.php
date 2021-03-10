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
      <ul class="custom-scrollbar">
      </ul>
    <!-- Sidebar navigation  -->


  <!-- Main layout  -->
  <main>
    <div class="container-fluid mb-5">

      <!-- Section: Basic examples -->
      <section>

        <!-- Gird column -->
        <div class="col-md-12">






        <div class="card">
            <div class="card-body">

         
  <div class="col-md-12 text-left">
    <a class="btn peach-gradient btn-rounded btn-sm" href="project.php"><?php echo $lang["go_back"];?></a>


  <!--/Card image-->
      <table id="dtMaterialDesignExample" class="table table-striped table-hover" cellspacing="0" width="100%">
      <thead>
                  <tr>
                    <th width=5%><?php echo $lang["hash"];?>
                    </th>
                    <th width=15%><?php echo $lang["file_name"];?>
                    </th>
                    <th width=30%><?php echo $lang["completeness"];?>
                    </th>
                    <th width=20%><?php echo $lang["created_date"];?>
                    </th>
                    <th width=25%><?php echo $lang["operation"];?>
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
                <td><div id='".$row["fid"]."'>".$row["fname"]."</div></td>
                
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
                      <a type='submit' class='btn-floating btn-info hvr-float-shadow btn-sm' href ='file_join_detail.php?id={$id}'><i class='far fa-eye'></i></a>	
                      
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

  </div>

  </div>
<!-- Table with panel -->
<br>


<div class="row">

<div class="col-md-12">
<div class="row">
    <div class="col-md-6">
    
    <div class="card">
    <div class="card-body">
    <span class="badge badge badge-pill badge-info hvr-wobble-vertical"><?php echo $project_session;?><?php echo $lang["corresponding_tb"];?></span>	
      <table id="dtBasicExample1" class="table table-striped table-hover" cellspacing="0" width="100%">
        <thead>
          <tr>
          <th width=5%><?php echo $lang["hash"];?>
            </th>
            <th width=20%><?php echo $lang["name"];?>
            </th>
            <th width=35%><?php echo $lang["description"];?>
            </th>
            <th width=20%><?php echo $lang["creator"];?>
            </th>
            <th width=20%><?php echo $lang["operation"];?>
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
  echo $lang["no_tb_created"]."<br>";
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
    <a type='submit' class='btn-floating btn-info hvr-float-shadow btn-sm' href ='tb_join_show.php?id={$id}'><i class='far fa-eye'></i></a>															
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
    <span class="badge badge badge-pill badge-info hvr-wobble-vertical"><?php echo $project_session;?><?php echo $lang["corresponding_tm"];?></span>	
    <div class="col-md-12 text-left">
      <table id="dtBasicExample2" class="table table-striped table-hover" cellspacing="0" width="100%">
        <thead>
        <tr>
          <th width=5%><?php echo $lang["hash"];?>
            </th>
            <th width=20%><?php echo $lang["name"];?>
            </th>
            <th width=35%><?php echo $lang["description"];?>
            </th>
            <th width=20%><?php echo $lang["creator"];?>
            </th>
            <th width=20%><?php echo $lang["operation"];?>
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
  echo $lang["no_tm_created"]."<br>";
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
      echo"<a type='submit' class='btn-floating btn-info hvr-float-shadow btn-sm' href ='tm_join_show.php?id={$id}'><i class='far fa-eye'></i></a>																
               ";
    }
    else{
      echo"
      <a type='submit' class='btn-floating btn-info hvr-float-shadow btn-sm' href ='tm_join_show.php?id={$id}'><i class='far fa-eye'></i></a>																			
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
<!-- Panel -->









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
</body>

</html>