<!-- FF -->
<!-- 
  1.登录界面
  2.可以跳转到注册界面
 -->

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
            <form action="" role="form" method="post">
              <!--Header-->
              <div class="form-header blue-gradient">
                <h3><i class="mt-2 mb-2"></i><?php echo $lang["login"];?></h3>
              </div>
              
              <!--Body-->
        
	          
              <div class="md-form">
           
                <i class="prefix white-text"></i>
                
                
                <!-- input here -->
                <input type="text" id="orangeForm-name" name="email" class="form-control">
                <label for="orangeForm-name"><?php echo $lang["email"];?></label>
              </div>

              <div class="md-form">
                <i class="prefix white-text"></i>
                <!-- input here -->
                <input type="password" id="orangeForm-pass" name="password" class="form-control">
                <label for="orangeForm-pass"><?php echo $lang["password"];?></label>
              </div>

              <div class="text-center">
                
                <a class="btn aqua-gradient btn-lg btn-rounded" href="register.php"><?php echo $lang["sign_in"];?></a>
                <button type="submit" class="btn blue-gradient btn-lg btn-rounded"><?php echo $lang["login"];?></button>
                <div>
                <a href="findpassword.php"><?php echo $lang["forget_password"];?></a>
                </div>
                <div>
                <!-- <a href="findpassword.php">忘记密码</a> -->
              </div>
              </div>
            	</form>

              <!-- 添加单独的div现实中英文切换按钮 -->
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