<!-- 填写邀请码正确即可加入该项目 -->

<?php

include 'share/project.php';
$pid=$_GET['id'];
?>

<br>
<div class="container-fluid">
<div class="row">
<div class="col-md-3"></div>

<div class="col-md-6 mb-4">
<form action="function_community/invite.php" method="post" role="form">
<!-- Section: Inputs -->
<section class="section card mb-5 ">

  <div class="card-body text-left">

    <!-- Section heading -->
<br>
    <h5 class="pb-5"><?php echo $lang["type_invitationcode"];?></h5>

    <!-- Grid row -->
    <div class="row">
      <!-- Grid column -->
      <div class="col-md-12">

        <div class="md-form">
          <input type="text" name = 'invitecode' class="form-control">
          <label for="form1" class=""><?php echo $lang["invitationcode"];?></label>
        </div>

      </div>
    </div>

    <div class="row">
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="md-form">
             <input type="hidden" name="pid" value="<?php echo $pid; ?>">  
             <input type="hidden" name="uid" value="<?php echo $user_id; ?>" >
		    <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-rounded" ><?php echo $lang["join"];?></button>	
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