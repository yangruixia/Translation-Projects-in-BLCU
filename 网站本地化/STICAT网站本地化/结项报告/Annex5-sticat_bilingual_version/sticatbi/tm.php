<!-- 翻译记忆库显示  -->

<?php

include 'share/tm.php';

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
            <span class="badge badge-pill badge badge-primary hvr-wobble-vertical	"><?php echo $login_session;?><?php echo $lang["created_tm"];?></span>	
            <div class="col-md-12 text-right">
              <div>
              <form action="tm_creation.php" method="post">
						  
              <input type="text" class="form-control mb-4" name="pid" style="display: none">
              <input type="text" class="form-control mb-4" name="langpairid" style="display: none">
              <button class="btn btn-outline-success btn-rounded btn " type='submit'><?php echo $lang["create_tm"];?></button>
		  	      </form>
              </div> 
            </div>
  <!--/Card image-->
            <table id="dtMaterialDesignExample" class="table table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                  <tr>
                    <th width=5%><?php echo $lang["hash"];?>
                    </th>
                    <th width=15%><?php echo $lang["tm_name"];?>
                    </th>
                    <th width=25%><?php echo $lang["tm_description"];?>
                    </th>
                    <th width=15%><?php echo $lang["created_date"];?>
                    </th>
                    <th width=20%><?php echo $lang["belonged_project"];?>
                    </th>
                    <th width=20%><?php echo $lang["operation"];?>
                    </th>
                  </tr>
                </thead>
                <?php 

                $sql = "SELECT * FROM tm WHERE uid='$user_id' AND tm.status = 1";
                mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况
                $result = mysqli_query($conn,$sql);
                $i=1;
				
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			          {
                $tmid = $row["tmid"];
                // echo $tmid;
                echo "<tr>
                <td>".$i."</div></td>
                <td><div class='tm-name-edit' id='".$tmid."'>".stripslashes($row["name"])."</div></td>
                <td><div class='tm-text-edit' id='".$tmid."'>".stripslashes($row["text"])."</div></td>
                <td id='date_{$tmid}'>{$row["date"]}</td>
                <td>";
                
                
                $sqlproject = 
                "SELECT tmshare.pid, project.projectname 
                FROM project INNER JOIN tmshare 
                ON project.pid = tmshare.pid 
                WHERE tmshare.tmid = '$tmid' AND tmshare.status = 1 ";

                $resultproject = mysqli_query($conn,$sqlproject);
                while($row = mysqli_fetch_array($resultproject, MYSQLI_ASSOC)){
                  // echo"<a class='hvr-wobble-horizontal' href = 'file.php?id={$row["pid"]}'><span class='badge badge-pill light-green lighten-1'><i class='fas fa-splotch' aria-hidden='true'>&nbsp".$row["projectname"]."</i></span>&nbsp</a>";
                  echo"<span class='badge badge-pill light-green lighten-1 hvr-buzz-out'><i class='fas fa-splotch' aria-hidden='true'>&nbsp".$row["projectname"]."</i></span>&nbsp";
                } 
                

                echo "</td>
                <td>	
                      <a type='submit' class='btn-floating btn-info hvr-float-shadow ' href ='tm_detail.php?id={$tmid}'><i class='far fa-eye'></i></a>	  
                      <a type='submit' class='btn-floating btn-danger btn-sm hvr-float-shadow' href ='function_tm/delete_tm.php?id={$tmid}' onclick='return del();'><i class='far fa-trash-alt'></button>							
            
                </td>
                
                </tr>";
                $i++;
              }
                ?>
                



                <tfoot>
                   <tr>
                   <th ><?php echo $lang["hash"];?>
                    </th>
                    <th><?php echo $lang["tm_name"];?>
                    </th>
                    <th ><?php echo $lang["tm_description"];?>
                    </th>
                    <th><?php echo $lang["created_date"];?>
                    </th>
                    <th><?php echo $lang["belonged_project"];?>
                    </th>
                    <th ><?php echo $lang["operation"];?>
                    </th>
                  </tr>
                </tfoot>
              </table>
      <!--Table-->
    </div>

  </div>

  </div>
<!-- Table with panel -->

<!-- Panel -->

<script>
    $(".tm-name-edit").editable("function_tm/save_name.php",{
      // width: 120, 
      // height: 30, 
			type      : "text",
			submit    : '<?php echo $lang["save"];?>',
			cancel    : '<?php echo $lang["cancel"];?>',
			tooltip   : "<?php echo $lang["edit"];?>",
      width     : "<?php echo $lang["forty_five_percent"];?>",
    });
    $(".tm-text-edit").editable("function_tm/save_text.php",{
      // width: 120, 
      // height: 30, 
			type      : "text",
			submit    : "<?php echo $lang["save"];?>",
			cancel    : "<?php echo $lang["cancel"];?>",
			tooltip   : "<?php echo $lang["edit"];?>",
      width     : "<?php echo $lang["fifty_percent"];?>"
		});
</script>

<script type="text/javascript">
     function del(){
        if(confirm("<?php echo $lang["deletetm_or_not"];?>")){
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
    $this.attr("placeholder", "<?php echo $lang["search"];?>");
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