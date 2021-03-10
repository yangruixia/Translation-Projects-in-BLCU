<!-- 添加记忆对或上传文件 -->

<?php

include 'share/tm.php';
$tmid = $_GET["id"];
$_SESSION['tm']=$tmid;
//echo $tmid;
?>

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
    <h5 class="pb-5"><?php echo $lang["add_tmpair"];?></h5></div>
    <div class="col-8 text-right">
             
              <!-- <form action="function_tm/import.php" method="post">
              <input type="text" class="form-control mb-4" name="pid" style="display: none">
              <input type="text" class="form-control mb-4" name="langpairid" style="display: none">
              <button class="btn btn-outline-info btn-rounded btn " type='submit'>导入excel文件</button>
		  	      </form> -->
              <!-- 
              <form action="function_tm/import_xml.php" method="post" enctype="multipart/form-data">

              <input type="file" name="upFile" class="btn purple-gradient btn-rounded btn-sm" value="选择TMX"><br> 
              
              <input type="submit" value="上传">
              </form>
              input type="file" 上传文件 -->
            
            <form action="function_tm/import_xml.php" method="post" enctype="multipart/form-data">
            <!-- <button class="btn purple-gradient btn-rounded btn-sm" type="file" name="file">选择文件</button> -->
            <button class="btn purple-gradient btn-rounded btn-sm" type="button"><?php echo $lang["choose_file"];?></button>
						<input type="file" name="file" id="jobData" onchange="loadFile(this.files[0])" style="position:absolute;top:0;left:0;font-size:34px; opacity:0">
                        <input type="text" class="form-control mb-4" name="fname" style="display: none" >
                        <input type="text" class="form-control mb-4" name="pid" style="display: none"  >
                        <input type="text" class="form-control mb-4" name="address" style="display: none" >

					<span id="filename" style="vertical-align: middle"><?php echo $lang["no_upload_file"];?></span>
            <!-- <input class="btn purple-gradient btn-rounded btn-sm" type="file" name="file">  -->
            <script>
				function loadFile(file){
          $("#filename").html(file.name);
          $filename= file.name;
				}
				</script>
              
            <input class="btn btn-default btn-rounded btn-sm" type="submit" value="<?php echo $lang["import_tmx"];?>">
            <!--<input type="file" name="upFile" class="btn purple-gradient btn-rounded btn-sm" value="选择TMX">
						<button class="btn purple-gradient btn-rounded btn-sm" type="button">选择TMX</button>
						<input type="file" name="file" id="jobData" onchange="loadFile(this.files[0])" style="position:absolute;top:0;left:0;font-size:34px; opacity:0">
               

					<span id="filename" style="vertical-align: middle">未上传TMX文件</span>
				
				<script>
				function loadFile(file){
          $("#filename").html(file.name);
          $filename= file.name;
				}
				</script>
				<button class="btn btn-default btn-rounded btn-sm" type="submit">导入TMX文件</button>	-->									
			</form>
    



            </div>
    </div>

    <!-- Grid row -->
    <div class="row">
      <!-- Grid column -->
      <div class="col-md-12">
      <form action="function_tm/tm_detail_create.php" method="post" role="form">
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
             <input type="hidden" name="tmid" value="<?php echo $tmid; ?>" >
		    <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-rounded" ><?php echo $lang["add"];?></button>	
		  </div>
    </div>


</div>
</div>
</section>
<!-- Section: Inputs -->
</form>



<?php

include 'share/foot.php'

?>