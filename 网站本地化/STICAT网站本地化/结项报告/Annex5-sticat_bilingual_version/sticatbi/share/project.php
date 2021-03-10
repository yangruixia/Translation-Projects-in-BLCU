<?php

include 'share/head.php';

?>



      <!--Navbar -->
      <nav class="mb-1 navbar navbar-expand-lg navbar-dark primary-color">
        <a class="navbar-brand font-weight-bold hvr-grow" href="http://sti.blcu.edu.cn/"><h2>&nbspSTI</h2></a>
        <a class="navbar-brand hvr-wobble-bottom" href="#">&nbsp&nbsp&nbspComputer Aided Translation</a>
        <!-- 计划链接公众号文章介绍 -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
          aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!--bilingual switch-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="project.php"><?php echo $lang["My Projects"]?>
                  <!-- 不同的网页修改不同的current值 -->
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tb.php"><?php echo $lang["termbase"]?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tm.php"><?php echo $lang["tm"]?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="community.php"><?php echo $lang["community"]?></a>
            </li>
            
          </ul>
          
          <ul class="navbar-nav ml-auto nav-flex-icons">
                     
          <li class="nav-item">
              
              <a id="en" class="nav-link" name="lang"value="english" href="">English</a>
              </li>
              <li class="nav-item">
                  <a id="cn" class="nav-link" name="lang" value="chinese" href="">中文</a>

              </li>
              <script>
                $(document).ready(function(){
                $("#cn").click(function(){
                  $.post("connection/lock.php",{
                    lang:"chinese"
                  });
                });
                });
                $(document).ready(function(){
                $("#en").click(function(){
                  $.post("connection/lock.php",{
                    lang:"english"
                  });
                });
                });
              </script>
          
  <!--bilingual switch-->
                <li class="nav-item">
                        <a class="nav-link waves-effect waves-light">0
                          <i class="fas fa-envelope"></i>
                        </a>
                      </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-primary"
                aria-labelledby="navbarDropdownMenuLink-333">
                <a class="dropdown-item" href="my_account.php"><?php echo $lang["account"]?></a>
                <a class="dropdown-item" href="function_log/logout.php"><?php echo $lang["quit"]?></a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <!--/.Navbar -->
    