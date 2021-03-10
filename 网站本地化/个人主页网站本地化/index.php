<?php
require "init.php";
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo $lang["mainpage"];?></title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://ianlunn.github.io/Hover/css/hover.css">

</head>

<body class="black-skin">



  <!-- Navigation -->
  <header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">

      <div class="container">

        <a class="navbar-brand" href="index.php">Yang Ruixia</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
          aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">

          <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

          <ul class="navbar-nav mr-auto smooth-scroll">

            <li class="nav-item">

              <a class="nav-link" href="#portfolio" data-offset="80"><?php echo $lang["mainpage"];?><span
                  class="sr-only">(current)</span></a>

            </li>

            <li class="nav-item">

              <a class="nav-link" href="#skill" data-offset="110"><?php echo $lang["skill"];?></a>

            </li>

            <li class="nav-item">

              <a class="nav-link" href="#project" data-offset="110"><?php echo $lang["project"];?></a>

            </li>

            <li class="nav-item">

              <a class="nav-link" href="#contact" data-offset="110"><?php echo $lang["link"];?></a>

            </li>

          </ul>

          <ul class="navbar-nav nav-flex-icons">

            <li class="nav-item">

              <a href = "?lang=english" class="nav-link">English</a>

            </li>

            <li class="nav-item">

              <a href = "?lang=chinese" class="nav-link">中文</a>

            </li>

          </ul>

        </div>

      </div>

    </nav>

  </header>
  <!-- Navigation -->

  <!-- Main content -->
  <main id="home">

    <!-- First container -->
    <div class="container-fluid mt-5 pt-5">

      <!-- Section: Main portfolio -->
      <section id="portfolio" class="section">

        <!-- First row -->
        <div class="row wow fadeIn" data-wow-delay="0.4s">

        <div class="container-fluid" style="background-color: #f3f3f5;">

        <div class="container py-5">

        <h1 class= "text-center my-4 mt-2 ml-3 mr-3 wow fadeIn" style="text-center text-uppercase font-weight-bold my-4 mt-2 ml-3 mr-3 wow fadeIn">
          <?php echo $lang["welcome"];?>
        </h1>
<p class = "grey-text text-center ml-5 mr-5 mb-5">
<?php echo $lang["mainpage_head"];?><br>
</p>





        </div>
 


        </div>
        <!-- First row -->

      </section>
      <!-- Section: Main portfolio -->
 <br>
 <br>
      <!-- Section: Beauty portfolio -->
      <section class="section">

        <h1 id="skill" class="section-heading text-center mb-5 mt-4 wow fadeIn" data-wow-delay="0.2s">
        <?php echo $lang["skill"];?>
        </h1>
        <hr>
        <br>
        <!-- First row -->
        <div class="row wow fadeIn" data-wow-delay="0.2s">


    <!-- Second container -->
    <div class="container mb-5">

      <!-- First row -->
      <div class="row  wow fadeIn" data-wow-delay="0.2s">

        <div class="col-lg-3 col-md-6 text-center mt-1">

          <div class="icon-area">

            <a
              class="btn-floating btn-lg grey darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">

              <i class="fas fa-book-open d-flex justify-content-center"></i>

            </a>

            <h6><strong class="font-weight-bold mb-3 pb-3"><?php echo $lang["skill_1"];?></strong></h6>

            <p class="mt-4"><?php echo $lang["skill_1_ex"];?></p>

          </div>

        </div>

        <div class="col-lg-3 col-md-6 text-center mt-1">

          <div class="icon-area">

            <a
              class="btn-floating btn-lg grey darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">

              <i class="fas fa-book d-flex justify-content-center"></i>

            </a>
            
            <h6><strong class="font-weight-bold mb-3 pb-3"><?php echo $lang["skill_2"];?></strong></h6>

            <p class="mt-4"><?php echo $lang["skill_2_ex"];?></p>

          </div>

        </div>

        <div class="col-lg-3 col-md-6 text-center mt-1">

          <div class="icon-area">

            <a
              class="btn-floating btn-lg grey darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">

              <i class="fas fa-comments d-flex justify-content-center"></i>

            </a>

            <h6><strong class="font-weight-bold mb-3 pb-3"><?php echo $lang["skill_3"];?></strong></h6>

            <p class="mt-4"><?php echo $lang["skill_3_ex"];?></p>

          </div>

        </div>

        <div class="col-lg-3 col-md-6 text-center mt-1">

          <div class="icon-area">

            <a
              class="btn-floating btn-lg grey darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">

              <i class="fas fa-laptop d-flex justify-content-center"></i>

            </a>

            <h6><strong class="font-weight-bold mb-3 pb-3"><?php echo $lang["skill_4"];?></strong></h6>

            <p class="mt-4"><?php echo $lang["skill_4_ex"];?></p>

          </div>

        </div>

      </div>
      <!-- First row -->
<br>
      <!-- First row -->
      <div class="row  wow fadeIn" data-wow-delay="0.2s">

        <div class="col-lg-3 col-md-6 text-center mt-1">

          <div class="icon-area">

            <a
              class="btn-floating btn-lg grey darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">

              <i class="fas fa-desktop d-flex justify-content-center"></i>

            </a>

            <h6><strong class="font-weight-bold mb-3 pb-3"><?php echo $lang["skill_5"];?></strong></h6>

            <p class="mt-4"><?php echo $lang["skill_5_ex"];?></p>

          </div>

        </div>

        <div class="col-lg-3 col-md-6 text-center mt-1">

          <div class="icon-area">

            <a
              class="btn-floating btn-lg grey darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">

              <i class="fab fa-github d-flex justify-content-center"></i>

            </a>

            <h6><strong class="font-weight-bold mb-3 pb-3"><?php echo $lang["skill_6"];?></strong></h6>

            <p class="mt-4"><?php echo $lang["skill_6_ex"];?></p>

          </div>

        </div>

        <div class="col-lg-3 col-md-6 text-center mt-1">

          <div class="icon-area">

            <a
              class="btn-floating btn-lg grey darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">

              <i class="fas fa-paint-brush d-flex justify-content-center"></i>

            </a>

            <h6><strong class="font-weight-bold mb-3 pb-3"><?php echo $lang["skill_7"];?></strong></h6>

            <p class="mt-4"><?php echo $lang["skill_7_ex"];?></p>

          </div>

        </div>

        <div class="col-lg-3 col-md-6 text-center mt-1">

          <div class="icon-area">

            <a
              class="btn-floating btn-lg grey darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">
              <!-- <i class="fas fa-pen-nib"></i> -->
              <i class="fas fa-pen-nib d-flex justify-content-center"></i>

            </a>

            <h6><strong class="font-weight-bold mb-3 pb-3"><?php echo $lang["skill_8"];?></strong></h6>

            <p class="mt-4"><?php echo $lang["skill_8_ex"];?></p>

          </div>

        </div>

      </div>
      <!-- First row -->


    </div>
    <!-- Second container -->

        </div>
        <!-- First row -->

      </section>
      <!-- Section: Beauty portfolio -->


    <!-- First container -->

    <!-- Second container -->

      <!-- Section About -->
      <section id="project" class="section mb-5 pb-5">
    
        <!-- Section title -->
        <h1  class="section-heading text-center mb-5 mt-5 pt-4 black-text wow fadeIn" data-wow-delay="0.2s">
        <?php echo $lang["project"];?>
        </h1>
          <hr>
          <br>
        <!-- First row -->
        <div class="row wow fadeIn" data-wow-delay="0.4s">
      <!-- Tab panels -->

          <!-- Second row -->
          <div class="row ml-5 mr-5 mt-2 flex-center">

            <!-- First column -->
            <div class="col-lg-6 col-md-6">

              <!-- Featured image -->
              <div class="view overlay zoom z-depth-2" style="height:320px;">

                <img src="img/sticat.jpg" class="img-fluid">

              </div>
            <a  href="http://sti.blcu.edu.cn/sticat/">
              <p class="text-center blue-grey-text mt-4 mb-4"><br><span class = "hvr-grow">
                  <?php echo $lang["sticat"];?>
                  <br>
                  <?php echo $lang["sticat_ex"];?>
              </span>
                  
              </p>
              </a>
            </div>
            <!-- First column -->

            <!-- Second column -->
            <div class="col-lg-6 col-md-6">

              <!-- Featured image -->
              <div class="view overlay zoom z-depth-2" style="height:320px;">

                <img src="img/costudy.png" class="img-fluid" >

              </div>
              <a  href="http://costudy.club/show_all.php">
              <p class="text-center blue-grey-text mt-4 mb-4"><br>
              <span class = "hvr-grow">
                  <?php echo $lang["costudy"];?>
                  <br>
                  <?php echo $lang["costudy_ex"];?>
            </span>
              </p>
              </a>

            </div>
            <!-- Second column -->

          </div>
          <!-- Second row -->

        </div>
        <!-- Panel 1 -->



 
      </section>
      <!-- Section About -->
      <hr class="between-sections">

      <!-- Contact -->
      <section id="contact" class="section mb-5 pb-5">

        <!-- Section heading -->
        <h1 class="section-heading text-center mb-5 pt-5 black-text wow fadeIn" data-wow-delay="0.2s">
          <?php echo $lang["link"];?>
        </h1>

        <!-- Section sescription -->
        
        <div class="row wow fadeIn" data-wow-delay="0.4s">

          <!-- First column -->
          <div class="col-md-6 col-xl-2">

          </div>
          <div class="col-md-6 col-xl-3 text-center">
            <img style= "height:200px" src="img/official accounts.jpg" alt="二维码">
            <p><?php echo $lang["official_account"];?></p>
          </div>
          <div class=" col-md-6 col-xl-3 text-center">
            <img style= "height:200px" src="img/wechat account.png" alt="赞赏码">
            <p><?php echo $lang["thanks"];?></p>
            <br>
          </div>
          <!-- First column -->

          <!-- Second column -->
          <div class="col-md-6 col-xl-3">

            <ul class="contact-icons list-unstyled text-center">

              <li><i class="fas fa-map-marker-alt fa-2x"></i>

                <p>China, Beijing</p>

              </li>

              <li><i class="fas fa-phone fa-2x"></i>

                <p>+ 86 188 1080 0186</p>

              </li>

              <li><i class="fas fa-envelope fa-2x"></i>

                <p>ruixiayang@foxmail.com</p>

              </li>

            </ul>

          </div>
          <div class="col-md-6 col-xl-1">
            </div>
          <!-- Second column -->

        </div>

      </section>
      <!-- Section: Contact v.2 -->

    </div>
    <!-- Second container -->

  </main>
  <!-- Main content -->

  <!-- Streak -->
  <div class="container-fluid py-5" style="background: #b1bace;">

    <div class="flex-center">

      <ul class="list-unstyled">

        <li>
          <h3 class="h3-responsive mt-5 white-text wow fadeIn" data-wow-delay="0.2s"><i class="fas fa-quote-left"
              aria-hidden="true"></i><?php echo $lang["motto"];?>
            <i class="fas fa-quote-right" aria-hidden="true"></i></h3>
        </li>


      </ul>

    </div>

  </div>
  <!-- Streak -->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript " src="js/jquery-3.4.1.min.js "></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript " src="js/popper.min.js "></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript " src="js/bootstrap.min.js "></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript " src="js/mdb.min.js "></script>

  <script>
    // MDB Lightbox Init
    $(function () {

      $("#mdb-lightbox-ui").load("../mdb-addons/mdb-lightbox-ui.html");
    });

    //Animation Init
    new WOW().init();

    $('.navbar-collapse a').click(function () {

      $(".navbar-collapse").collapse('hide');
    });

  </script>

</body>

</html>
