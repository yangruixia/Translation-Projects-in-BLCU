<?php

include 'share/tb.php';
$tbid = $_GET["id"];


?>

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
        <!-- 可以加个标题 -->
 

          <div class="card">
            <div class="card-body">
      
        <div class="row text-right">
         <div class="col-md-4 text-left">
           <a class="btn peach-gradient btn-rounded btn-sm" href="tb.php"><?php echo $lang["go_back"];?></a>
         </div>
            
            <div class="col-md-8 text-right">
              <div>
              <!-- <button id="btn" class="btn btn-outline-info btn-rounded " onclick="btn_export()">导出</button> -->
              <a type="button" class="btn btn-outline-info btn-rounded " href ="function_tb/export_test.php?id=<?php echo $tbid;?>"><?php echo $lang["export_excel"];?></a>
              <a type="button" class="btn btn-outline-success btn-rounded " href ="tb_detail_creation.php?tbid=<?php echo $tbid;?>"><?php echo $lang["add_termpair"];?></a>
  
              </div> 
            </div>
          </div>

              <table id="dtMaterialDesignExample" class="table table-sm" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th width=10%><?php echo $lang["termpair_id"];?>
                    </th>
                    <th width=35%><?php echo $lang["en"];?>
                    </th>
                    <th width=35%><?php echo $lang["zh"];?>
                    </th>
                    <!-- <th width=15%>语言
                    </th>
                    <th width=20%>创建时间
                    </th>
                    <th width=15%>参与者
                    </th> -->
                    <th width=20%><?php echo $lang["operation"];?>
                    </th>
                  </tr>
                </thead>


                <?php 
                $sql = "SELECT * FROM tbdetail WHERE tbid='$tbid'";
                mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况
                $result = mysqli_query($conn,$sql);
                $i=1;
				
                if(!$result)
                {
                  echo $lang["add_first_termpair"]."<br>";
                }
                else
                {
                $i=1;
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			          {
            /* $sqls = "SELECT lname FROM lang WHERE lid = $row[sid]";
            $results = mysqli_query($conn,$sqls);
            $rows = mysqli_fetch_array($results, MYSQLI_ASSOC);
            
            $sqlt = "SELECT lname FROM lang WHERE lid = $row[tid]";
            $resultt = mysqli_query($conn,$sqlt);
            $rowt = mysqli_fetch_array($resultt, MYSQLI_ASSOC); */

			  	      $tbdid = $row["tbdid"];
			          echo "<tr>
					      	<td>".$i."</div></td>
                  <td><div class='tb-en-edit' id='".$row["tbdid"]."'>".stripslashes($row["en"])."</div></td>
                  <td><div class='tb-zh-edit' id='".$row["tbdid"]."'>".stripslashes($row["zh"])."</div></td>
                  <td>	
                  <a type='submit' class='btn-floating btn-danger btn-sm hvr-float-shadow' href ='function_tb/tb_detail_delete.php?id={$tbdid}'><i class='far fa-trash-alt'></button>										
                 
					      	</td>
                  </tr>";
                  $i++;
                 } 
                }

                ?>





                <tfoot>
                <tr>
                    <th><?php echo $lang["termpair_id"];?>
                    </th>
                    <th><?php echo $lang["en"];?>
                    </th>
                    <th><?php echo $lang["zh"];?>
                    </th>
                    <!-- <th>语言
                    </th>
                    <th>创建时间
                    </th>
                    <th>参与者
                    </th> -->
                    <th><?php echo $lang["operation"];?>
                    </th>
                  </tr>
                </tfoot>
              </table>
              
            </div>
          </div>

        </div>
        <!-- Gird column -->

      </section>
      <!-- Section: Basic examples -->

    </div>

<script>
    $(".tb-en-edit").editable("function_tb/save_en.php",{
      // width: 120, 
      // height: 30, 
			type      : "textarea",
			submit    : '<?php echo $lang["save"];?>',
			cancel    : '<?php echo $lang["cancel"];?>',
			tooltip   : "<?php echo $lang["edit"];?>",
      width     : "<?php echo $lang["one_hundred_percent"];?>",
      rows      : "<?php echo $lang["two"];?>",
    });
    
    $(".tb-zh-edit").editable("function_tb/save_zh.php",{
      // width: 120, 
      // height: 30, 
			type      : "textarea",
			submit    : '<?php echo $lang["save"];?>',
			cancel    : '<?php echo $lang["cancel"];?>',
			tooltip   : "<?php echo $lang["edit"];?>",
      width     : "<?php echo $lang["one_hundred_percent"];?>",
      rows      : "<?php echo $lang["two"];?>",
		});

   


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
