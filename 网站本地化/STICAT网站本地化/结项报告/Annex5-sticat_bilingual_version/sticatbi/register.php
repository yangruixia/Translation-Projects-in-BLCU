<!-- 
    1.注册界面
    2.前端
 -->
<!-- FF -->
<?php

include 'function_log/login.php';
include 'share/login_head.php';

?>




<body>

<!--Intro Section-->
<section class="view intro-2">
  <div class="mask rgba-stylish-strong h-100 d-flex justify-content-center align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">

          <!--Form with header-->
          <div class="card wow fadeIn" data-wow-delay="0.3s">
            
            <div class="card-body">
            <form action="regcheck.php" role="form" method="post">
              <!--Header-->
              <div class="form-header aqua-gradient">
                <h3><i class="mt-2 mb-2"></i><?php echo $lang["sign_in"];?></h3>
              </div>

              <!--Body-->
              <div class="md-form">
                <i class="prefix white-text"></i>
                <!-- input here -->
                <input type="text" id="orangeForm-name" name="username" class="form-control">
                <label for="orangeForm-name"><?php echo $lang["user_name"];?></label>
              </div>

              <div class="md-form">
                <i class="prefix white-text"></i>
                <!-- input here -->
                <input type="password" id="orangeForm-pass" name="password" class="form-control">
                <label for="orangeForm-pass"><?php echo $lang["password"];?></label>
              </div>

              <div class="md-form">
                <i class="prefix white-text"></i>
                <!-- input here -->
                <input type="email" id="orangeForm-email" name="email" class="form-control">
                <label for="orangeForm-email"><?php echo $lang["email"];?></label>
              </div>

              <div class="text-center">
                <button type="submit" name="submit" class="btn aqua-gradient btn-lg btn-rounded" value="<?php echo $lang["confirm_signin"];?>"><?php echo $lang["confirm_signin"];?></button>
              </div>
            	</form>

                <!-- 单独代码块进行中英文切换 -->
                <div  class="text-center">
                    <a class="btn btn-sm btn-grey" href = "?lang=english">English</a>
                    <a class="btn btn-sm btn-grey" href = "?lang=chinese">中文</a>
                </div>







            </div>
            
          </div>
          <!--/Form with header-->

          

        </div>
      </div>
    </div>
  </div>
</section>


<?php

include 'share/login_foot.php'

?>