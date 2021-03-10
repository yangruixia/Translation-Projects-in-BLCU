<?php

include 'share/login_head.php';
include 'connection/conn.php';
include 'connection/bilogin.php';

?>

<body>
<section class="view intro-2">
<div class="mask rgba-stylish-strong h-100 d-flex justify-content-center align-items-center">
    <div class="container">
    <div class="row">
        <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">
                <script type="text/javascript">
                $(function(){
                    $("#sub_btn").click(function(){
                        var email = $("#email").val();
                        var preg = /[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)/; //匹配Email
                        if(email=='' || !preg.test(email)){
                            $("#chkmsg").html("<?php echo $lang["type_email"];?>");
                        }else{
                            $("#sub_btn").attr("disabled","disabled").val('<?php echo $lang["submitting"];?>').css("cursor","default");
                            $.post("sendmail.php",{email:email},function(msg){
                                if(msg=="noreg"){
                                    $("#chkmsg").html("<?php echo $lang["email_not_signed"];?>");
                                    $("#sub_btn").removeAttr("disabled").val('<?php echo $lang["send_email"];?>').css("cursor","pointer");
                                }else{
                                    $(".demo").html("<h3>"+msg+"</h3>");
                                }
                            });
                        }
                    });
                })
                </script>
            <!--Form with header-->
            <div class="card wow fadeIn" data-wow-delay="0.3s">
            
                <div class="card-body">
                <div class="form-header blue-gradient">
                <h3><i class="mt-2 mb-2"></i><?php echo $lang["find_password"];?></h3>
                </div>
                <div class="text-center">
                <?php echo $lang["type_signed_email"];?>
                </div>
                <div class="md-form">
                    <i class="prefix white-text"></i>
                    <!-- input here -->
                    <div class="text-center">
                    <div class=demo>
                    <form action="sendmail.php" role="form" method="post">
                    <input type="text" class="input" id="email" name="email" class="form-control" ><span id="chkmsg"></span>
                    <button id="sub_btn" class="btn aqua-gradient btn-lg btn-rounded" value="<?php echo $lang["send_email"];?>"><?php echo $lang["send_email"];?></button>
                    </form>
                    <div>
                    <div><?php echo $lang["remind_email_no_signed"];?><a href="register.php"><?php echo $lang["create_account"];?></a><?php echo $lang["period"];?></div>
                    </div>
                </div>
                </div>
    


    
            </div>



                <!-- 单独代码块进行中英文切换 -->
                <div  class="text-center">
                    <a class="btn btn-sm btn-grey" href = "?lang=english">English</a>
                    <a class="btn btn-sm btn-grey" href = "?lang=chinese">中文</a>
                </div>
              
        </div>
    </div>
    </div>
</div>

</body>