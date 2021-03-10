<?php

include 'share/community.php';

?>
<!--Grid row-->
<main>
<style type="text/css">
      .round_icon{
        margin-top: 150px; 
        width:150px; 
        height:150px; 
        border-radius:150px; 
        align-items: center;
        justify-content: center;
        overflow: hidden;
        clear: both;
        display: block;
        margin:auto;
      }
  </style>
  <div class="container-fluid mb-5">

  <div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-8">
 <br>
        

<!-- Card image -->

<!-- Card content -->

      
<?php     
      $uid=$_GET["id"];
      $sqlu="SELECT username FROM user WHERE uid = $uid";
      $resultu = mysqli_query($conn,$sqlu);    //执行SQL语句 
      while($row = mysqli_fetch_array($resultu, MYSQLI_ASSOC))
      {
        echo "<div class='card'>
        
        <div class='card-body'>
        <br>
        <h3 class ='text-center font-weight-bold cyan-lighter-hover mb-3'>".$lang["welcome"].stripslashes($row['username']).$lang["s_personal_homepage"]."</h3><br>";
      }
 
      $sqlf = "SELECT  project.pid, project.projectname, project.text, project.date, user.uid
      FROM project
      INNER JOIN user
      ON project.uid = user.uid WHERE project.status = 2 AND project.uid = $uid" ;
      mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况

    $result = mysqli_query($conn,$sqlf); 
    $count = mysqli_num_rows($result);

    
    
    if($count == 0)
    {
      echo"<h4>".$lang["completed_projects"]."</h4><hr>";
      echo $lang["nothing"]."<br><br>";
    }
    else
    {
      // echo "
      //       <div class='card-columns'>
            
      //       ";
      echo"<h4>".$lang["completed_projects"]."</h4><hr>";
      $i=0;    
      while($rowf=mysqli_fetch_array($result, MYSQLI_ASSOC))
      {
        if($i%2 == 0){
          echo '<div class="row">';
        } 
        
        echo"
            <div class='col-md-6'>
            <div class='card gradient-card'>
            <div class='card-image hvr-grow-shadow'>
            <div class='text-white d-flex h-100 mask blue-gradient-rgba'>
            <div class='first-content align-self-center p-2'>
            <h4 class='card-title'>".$rowf['projectname']."</h4>
            <p class='lead mb-0'><h6>".$rowf['text']."<h6></p>
            <p class='lead mb-0'><h6>".$rowf['date']."<h6></p>
            </div>               
            </div>
            </div>
            </div>
            </div>
            
            ";
        $i++;
        if($i%2 == 0){
          echo '</div><br>';
        }
      }
      if($count%2!=0){
        echo "</div><br>";
      }
    }




    $sqlc = "SELECT project.pid, project.projectname, project.text, project.date, user.uid
      FROM project
      INNER JOIN user
      ON project.uid = user.uid 
      WHERE project.status = 1 AND project.uid = $uid" ;
      mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况

    $resultc = mysqli_query($conn,$sqlc);    
    $countc = mysqli_num_rows($resultc);
   
    if($countc==0)
    {
      echo"<h4>".$lang["created_projects"]."</h4><hr>";
      echo $lang["nothing"]."<br><br>";
    }
    else
    {
      // echo "
      //       <div class='card-columns'>
      //       ";
      echo"<h4>".$lang["created_projects"]."</h4><hr>";
      $i=0;  
      while($rowc=mysqli_fetch_array($resultc, MYSQLI_ASSOC))
      {
        if($i%2 == 0){
          echo '<div class="row">';
        } 
        echo"
            <div class='col-md-6'>
            <div class='card gradient-card'>
            <div class='card-image hvr-grow-shadow'>
            <div class='text-white d-flex h-100 mask peach-gradient-rgba'>
            <div class='first-content align-self-center p-2'>
            <h4 class='card-title'>".$rowc['projectname']."</h4>
            <p class='lead mb-0'><h6>".$rowc['text']."<h6></p>
            <p class='lead mb-0'><h6>".$rowc['date']."<h6></p>             
            </div>
            </div>
            </div>
            </div>
            </div>
            ";
            $i++;
        if($i%2 == 0) 
            {
              echo '</div><br>';
            }
      }
      if($countc%2!=0){
        // echo $countc%2;
        echo "</div><br>";
      }
      
    }


    $sqlj = "SELECT  project.pid, project.projectname, project.text, project.date, projectshare.uid, projectshare.pid, user.uid
    FROM projectshare
    INNER JOIN user
    ON projectshare.uid = user.uid 
    INNER JOIN project
    ON projectshare.pid = project.pid WHERE projectshare.uid = $uid AND projectshare.status = 1" ;
    mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况

    $resultj = mysqli_query($conn,$sqlj);    
    $countj = mysqli_num_rows($resultj);
    

    if($countj==0)
    {
      echo"<h4>".$lang["joined_projects"]."</h4><hr>";
      echo $lang["nothing"];
    }
    else
    {
      echo"<h4>".$lang["joined_projects"]."</h4><hr>";
      $i=0;  
      while($rowj=mysqli_fetch_array($resultj, MYSQLI_ASSOC))
      {
        
        if($i%2 == 0){
          echo '<div class="row">';
        } 
        echo"
            <div class='col-md-6'>
            <div class='card gradient-card '>
            <div class='card-image hvr-grow-shadow'>
            <div class='text-white d-flex h-100 mask purple-gradient-rgba'>
            <div class='first-content align-self-center p-2'>
            <h4 class='card-title'>".$rowj['projectname']."</h4>
            <p class='lead mb-0'><h6>".$rowj['text']."<h6></p>
            <p class='lead mb-0'><h6>".$rowj['date']."<h6></p>
                           
            </div>
            </div>
            </div>
            </div>
            </div>
            ";
            $i++;
            if($i%2 == 0) 
                {
                  echo '</div><br>';
                }
      }

      echo "</div><br>";

    }
  ?>
</div>
</div>
</div>
</div></div>
<?php

include 'share/foot.php'

?>