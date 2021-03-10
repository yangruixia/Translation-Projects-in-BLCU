<!-- 添加记忆对或上传文件 -->

<?php

include 'share/tb.php';
$tbid = $_GET["tbid"];

$_SESSION['tb'] = $tbid;
//echo $tmid;
?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/xlsx.core.min.js"></script>
<br>
<div class="container-fluid">
<div class="row">
<div class="col-md-3"></div>

<div class="col-md-6 mb-4">

<!-- Section: Inputs -->
<section class="section card mb-5 ">

  <div class="card-body text-left">

    <!-- Section heading -->
<br>
<div class="row">
    <!-- Section heading -->
    <div class="col-4 text-left">
    <h5 class="pb-5"><?php echo $lang["add_termpair"];?></h5></div>
    <div class="col-8 text-right">
             
              <!-- <form action="function_tm/import.php" method="post">
              <input type="text" class="form-control mb-4" name="pid" style="display: none">
              <input type="text" class="form-control mb-4" name="langpairid" style="display: none">
              <button class="btn btn-outline-info btn-rounded btn " type='submit'>导入excel文件</button>
		  	      </form> -->
              
          <form action="function_tb/import_excel.php" method="post" enctype="multipart/form-data">
						<button class="btn purple-gradient btn-rounded btn-sm" type="button"><?php echo $lang["choose_excel"];?></button>
						<input type="file" name="file" id="jobData" onchange="loadFile(this.files[0])" style="position:absolute;top:0;left:0;font-size:34px; opacity:0">
                        <!-- <input type="text" class="form-control mb-4" name="fname" style="display: none" >
                        <input type="text" class="form-control mb-4" name="pid" style="display: none"  >
                        <input type="text" class="form-control mb-4" name="address" style="display: none" > -->

					<span id="filename" style="vertical-align: middle"><?php echo $lang["not_upload_excel"];?></span>
				
				<script>
				function loadFile(file){
          $("#filename").html(file.name);
          $filename= file.name;
				}
        </script>
        
				<button class="btn btn-default btn-rounded btn-sm" type="submit"><?php echo $lang["import_excel"];?></button>										
      </form>



            </div>
    </div>

    <!-- Grid row -->
    <div class="row">
      <!-- Grid column -->
      <div class="col-md-12">
      <form action="function_tb/tb_detail_create.php" method="post" role="form">
        <div class="md-form">
          <textarea type="text" name = 'en' class="md-textarea form-control" rows="2"></textarea>
          <label for="form10" class=""><?php echo $lang["en"];?></label>
        </div>

      </div>
    </div>

    <div class="row">
      <!-- Grid column -->
      <div class="col-md-12">

        <div class="md-form">
        <textarea type="text" name = 'zh' class="md-textarea form-control" rows="2"></textarea>
          <label for="form10" class=""><?php echo $lang["zh"];?></label>
        </div>

      </div>
    </div>

    <div class="row">
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="md-form">
             <input type="hidden" name="tbid" value="<?php echo $tbid;?>" >
		    <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-rounded" ><?php echo $lang["add"];?></button>	
		  </div>
    </div>


</div>
</div>
</section>
<!-- Section: Inputs -->
</form>
<script language="javascript">


</script>


<?php

include 'share/foot.php'

?>