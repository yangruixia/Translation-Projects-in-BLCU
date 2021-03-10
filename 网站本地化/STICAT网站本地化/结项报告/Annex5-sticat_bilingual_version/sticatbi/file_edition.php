<!-- YXC -->
<!-- 
    1.原文的展示界面
    2.可以进行原文的修改
 -->
 
 <?php

include 'share/project.php';

?>

<?php
$file_id = $_GET['id'];
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

        



          <div class="card">
            <div class="card-body">
              <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
                 <!-- Table -->
                 <div class="row text-right">
         
                 <div class="col-md-8 text-left">
                 <a class="btn peach-gradient btn-rounded btn-sm" href='file.php?id=<?php echo $_SESSION['project'];?>'><?php echo $lang["go_back"];?></a>
                 </div>
                 </div>

            <table class="table table-hover">

              <!-- Table head -->
              <thead>
                <tr>
                  
                  <th width=70%><?php echo $lang["source"];?></th>
                  <th width=30%><?php echo $lang["operation"];?></th>

                </tr>
              </thead>
              <!-- Table head -->
              <!-- Table body -->
              <tbody>
            

                <?php 
				
                $sql = "SELECT * FROM source WHERE fid='$file_id'"; //待修改
                mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况
				        $result = mysqli_query($conn,$sql);
				
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			          {
				        $id = $row["sid"];

                echo "<tr>
                    <td><div class='source-edit' id='".$row["sid"]."'>".stripslashes($row["context"])."</div></td>

                    <td>	
                      <a type='submit' class='btn-floating btn-danger btn-sm hvr-float-shadow'  href ='function_file/delete_s_t.php?id={$id}'><i class='far fa-trash-alt'></button>							
            
                    </td>
					          </tr>";
			          } 
                ?>

              </tbody>
              <!-- Table body -->
                <tfoot>
                   <tr>
                    <th><?php echo $lang["source"];?>
                    </th>
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
    $(".source-edit").editable("function_file/save_source.php",{
      // width: 120, 
      // height: 30, 
			type      : "textarea",
			submit    : '<?php echo $lang["save"];?>',
			cancel    : '<?php echo $lang["cancel"];?>',
			tooltip   : "<?php echo $lang["edit"];?>",
      width     : "<?php echo $lang["one_hundred_percent"];?>",
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
    // SideNav Initialization
    $(".button-collapse").sideNav();

    let container = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(container, {
      wheelSpeed: 2,
      wheelPropagation: true,
      minScrollbarLength: 20
    });

    $('#dtMaterialDesignExample').DataTable();

    $('#dt-material-checkbox').dataTable({

      columnDefs: [{
        orderable: false,
        className: 'select-checkbox',
        targets: 0
      }],
      select: {
        style: 'os',
        selector: 'td:first-child'
      }
    });

    $('#dtMaterialDesignExample_wrapper, #dt-material-checkbox_wrapper').find('label').each(function () {
      $(this).parent().append($(this).children());
    });
    $('#dtMaterialDesignExample_wrapper .dataTables_filter, #dt-material-checkbox_wrapper .dataTables_filter').find(
      'input').each(function () {
      $('input').attr("placeholder", "Search");
      $('input').removeClass('form-control-sm');
    });
    $('#dtMaterialDesignExample_wrapper .dataTables_length, #dt-material-checkbox_wrapper .dataTables_length').addClass(
      'd-flex flex-row');
    $('#dtMaterialDesignExample_wrapper .dataTables_filter, #dt-material-checkbox_wrapper .dataTables_filter').addClass(
      'md-form');
    $('#dtMaterialDesignExample_wrapper select, #dt-material-checkbox_wrapper select').removeClass(
      'custom-select custom-select-sm form-control form-control-sm');
    $('#dtMaterialDesignExample_wrapper select, #dt-material-checkbox_wrapper select').addClass('mdb-select');
    $('#dtMaterialDesignExample_wrapper .mdb-select, #dt-material-checkbox_wrapper .mdb-select').materialSelect();
    $('#dtMaterialDesignExample_wrapper .dataTables_filte, #dt-material-checkbox_wrapper .dataTables_filterr').find(
      'label').remove();

  </script>
</body>

</html>
