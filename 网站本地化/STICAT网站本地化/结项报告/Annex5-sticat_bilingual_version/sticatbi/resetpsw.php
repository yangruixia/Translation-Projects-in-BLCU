<?php
include 'connection/conn.php';
// 语言包功能引入
include 'connection/bilogin.php';
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
            <form action="pswconfirm.php" role="form" method="post">
              <!--Header-->
              <div class="form-header blue-gradient">
                <h3><i class="mt-2 mb-2"></i><?php echo $lang["password_reset"];?></h3>
              </div>

              <!--Body-->
              <!-- <div class="md-form">
                <i class="prefix white-text"></i>
                 input here -->
                <!-- <input type="text" id="orangeForm-name" name="username" class="form-control">
                <label for="orangeForm-name">用户名</label>
              </div> --> 
              <div class="md-form">
                <i class="prefix white-text"></i>
                <?php 
                $test = $_SERVER['REQUEST_URI'];
                // echo $test;
                // echo "<br>";
                // var_dump($test);
                // $test = "http://localhost/1212minicat/resetpsw.php?email=934481939@qq.com&token=f8f7c126ab6d318f7a0bcaf30af5a8ed";
                
                preg_match_all("/[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)/",$test, $pat);
                // $imail = $pat[0][0];
                ?>

                <input type="hidden" name="mail" value="<?php echo $pat[0][0];?>" >
              </div>
              

              <div class="md-form">
                <i class="prefix white-text"></i>
                <!-- input here -->
                <input type="password" id="orangeForm-pass" name="password" class="form-control">
                <label for="orangeForm-pass"><?php echo $lang["new_password"];?></label>
              </div>

              <div class="md-form">
                <i class="prefix white-text"></i>
                <!-- input here -->
                <input type="password" id="orangeForm-pass" name="pswconfirm" class="form-control">
                <label for="orangeForm-pass"><?php echo $lang["confirm_password"];?></label>
              </div>

              <div class="text-center">
                <button type="submit" class="btn blue-gradient btn-lg btn-rounded" name="reset" value="<?php echo $lang["confirm_reset"];?>"><?php echo $lang["confirm_reset"];?></button>
              </div>
            	</form>


                <!-- 单独代码块进行中英文切换 -->
                <div  class="text-center">
                    <a class="btn btn-sm btn-grey" href = "?lang=english">English</a>
                    <a class="btn btn-sm btn-grey" href = "?lang=chinese">中文</a>
                </div>







            </div>





          </div>

        </div>
      </div>
    </div>
  </div>
</section>


<?php

include 'share/login_foot.php'

?>