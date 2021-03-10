<!-- 新建tb -->

<?php

include 'share/tb.php';

?>

<br>
<div class="container-fluid">
<div class="row">
<div class="col-md-3"></div>

<div class="col-md-6 mb-4">
<form action="function_tb/create_tb.php" method="post" role="form">
<!-- Section: Inputs -->
<section class="section card mb-5 ">

  <div class="card-body text-left">

    <!-- Section heading -->
<br>
    <h5 class="pb-5"><?php echo $lang["create_new_tb"];?></h5>

    <!-- Grid row -->
    <div class="row">
      <!-- Grid column -->
      <div class="col-md-12">

        <div class="md-form">
          <input type="text" name = 'tbname' class="form-control">
          <label for="form1" class=""><?php echo $lang["tb_name"];?></label>
        </div>

      </div>

    </div>

    <div class="row">

      <!-- Grid column -->
      <div class="col-lg-12">

        <!-- Basic textarea -->
        <div class="md-form">
          <textarea type="text" name = 'text' class="md-textarea form-control" rows="2"></textarea>
          <label for="form10"><?php echo $lang["tb_description"];?></label>
        </div>

      </div>
    </div>
    <!-- Grid row -->
    <div class="row">

      <div class="col-lg-4 col-md-12 mb-4">
      <div class="col-lg-4 col-md-6 mb-4">
      </div>

      </div>
      </div>
    <div class="row">
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="md-form">
             <input type="hidden" name="user" value="<?php echo $user_id; ?>" >
		    <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-rounded" ><?php echo $lang["create"];?></button>	
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