<!-- 用户自己看的页面，需要实现项目的恢复以及彻底删除 -->


<?php

include 'share/project.php';

?>


    <!-- Sidebar navigation  -->
    <ul>
      </ul>
    <!-- Sidebar navigation  -->

  <!-- Main layout  -->
  <main>
    <!-- <style type="text/css">
      .round_icon{
        margin-top: 100px; 
        width:100px; 
        height:100px; 
        border-radius:100px; 
        align-items: center;
        justify-content: center;
        overflow: hidden;
        clear: both;
        display: block;
        margin:auto;
      }
  </style> -->
    <div class="container-fluid mb-5">

  <!-- 用户创建的项目 -->
      <!-- Section: Basic examples -->
      <section>

        <!-- Gird column -->

        <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
   
        
        <!-- 可以加个标题 -->
        <!-- <div>
          <img src="img\profile.jpg" class="round_icon">
        </div> -->
    




        <br>
        <div class="card">

        <div class='card-body'>
        <div class="text-center">
        <br>

        <h2 class="card-title"><i class="fas fa-quote-left"></i><?php echo $lang["personal_homepage"];?></h2> </div>
        <?php echo $lang["user_names"];?><?php echo "<span class='username-edit' id=".$row["uid"].">".stripslashes($row["username"])."</span>";?>
        
        <p><?php echo $lang["emails"];?><?php echo $row["email"];?></p>
   <hr>
       
        
        <?php
        $sqlf = "SELECT  project.pid, project.projectname, project.text, project.date, user.uid
        FROM project
        INNER JOIN user
        ON project.uid = user.uid WHERE project.status = 2 AND project.uid = $row[uid]" ;
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




    $sqlc = "SELECT  project.pid, project.projectname, project.text, project.date, user.uid
      FROM project
      INNER JOIN user
      ON project.uid = user.uid WHERE project.status = 1 AND project.uid = $row[uid]" ;
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
        echo "</div><br>";
      }
      
    }


    $sqlj = "SELECT  project.pid, project.projectname, project.text, project.date, projectshare.uid, projectshare.pid, user.uid
    FROM projectshare
    INNER JOIN user
    ON projectshare.uid = user.uid 
    INNER JOIN project
    ON projectshare.pid = project.pid WHERE projectshare.uid = $row[uid] AND projectshare.status = 1" ;
    mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况

    $resultj = mysqli_query($conn,$sqlj);    
    $countj = mysqli_num_rows($resultj);
    

    if($countj==0)
    {
      echo"<h4>".$lang["joined_projects"]."</h4><hr>";
      echo $lang["nothing"]."<br><br>";
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
  </div>
  </section>
  <section>
  <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
        <br>
  
          <div class="card">
          
            <div class="card-body">
            <span class="badge badge-pill badge badge-danger hvr-rotate"><?php echo $login_session;?><?php echo $lang["binned_project"];?></span>	
              <table id="dtMaterialDesignExample" class="table table-striped table-hover" cellspacing="0" width="100%">
                <thead>
                  <tr>
                  <th width=5%><?php echo $lang["hash"];?>
                    </th>
                    <th width=15%><?php echo $lang["project_name"];?>
                    </th>
                    <th width=20%><?php echo $lang["project_description"];?>
                    </th>
                    <th width=10%><?php echo $lang["language"];?>
                    </th>
                    <th width=15%><?php echo $lang["created_date"];?>
                    </th>
                    
                    <th width=15%><?php echo $lang["former_participant"];?>
                    </th>
                    <th width=20%><?php echo $lang["operation"];?>
                    </th>
                  </tr>
                </thead>
                <?php 
                $sql = "SELECT project.pid, project.projectname, project.text, langpair.sid, langpair.tid, user.username, project.date
                FROM project
                INNER JOIN langpair
                ON project.langpairid = langpair.id
                INNER JOIN user
                ON project.uid = user.uid WHERE project.uid = '$user_id' AND project.status = 0";
                mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况
				$result = mysqli_query($conn,$sql);
        
        if(!$result)
        {
          echo $lang["no_binned_projec"]."<br>";
        }
        else
        {
          $i=1;
          while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			    {

            

            $sqls = "SELECT lname FROM lang WHERE lid = $row[sid]";
            $results = mysqli_query($conn,$sqls);
            $rows = mysqli_fetch_array($results, MYSQLI_ASSOC);
            
            $sqlt = "SELECT lname FROM lang WHERE lid = $row[tid]";
            $resultt = mysqli_query($conn,$sqlt);
            $rowt = mysqli_fetch_array($resultt, MYSQLI_ASSOC);

            $id = $row["pid"];
            
            echo "<tr>
            <td>$i</td>
            <td><div class='project-name-edit' id='".$row["pid"]."'>".$row["projectname"]."</div></td>
            <td><div class='project-text-edit' id='".$row["pid"]."'>".$row["text"]."</div></td>
            <td>{$rows['lname']} → {$rowt['lname']}</td>
            <td id='date_{$id}'>{$row["date"]}</td><td>";

            $sqluser = "SELECT projectshare.uid, user.username FROM user INNER JOIN projectshare ON projectshare.uid = user.uid WHERE projectshare.pid = '$id' ";
            $resultuser = mysqli_query($conn,$sqluser);
            while($row = mysqli_fetch_array($resultuser, MYSQLI_ASSOC)){
              echo"<a class='hvr-wobble-horizontal' href = 'user_show.php?id={$row["uid"]}'><span class='badge badge-pill teal lighten-2'><i class='fas fa-user' aria-hidden='true'>&nbsp".$row["username"]."</i></span>&nbsp</a>";
            }
            echo"
            </td>
            <td>	
            <a type='submit' class='btn-floating btn-info hvr-float-shadow btn-sm'  href ='function_account/project_recover.php?id={$id}'><i class='fas fa-arrow-left'></i></a>	
                  <a type='submit' class='btn-floating btn-danger btn-sm hvr-float-shadow'  href ='function_account/project_delete.php?id={$id}' onclick='return del();'><i class='far fa-trash-alt'></i></a>							
						</td>
            </tr>";
            $i++;
            
          } 
        }
        
                ?>
                </div>
                <br>


                <tfoot>
                <tr>
                <th width=5%><?php echo $lang["hash"];?>
                    </th>
                    <th width=15%><?php echo $lang["project_name"];?>
                    </th>
                    <th><?php echo $lang["project_description"];?>
                    </th>
                    <th><?php echo $lang["language"];?>
                    </th>

                    <th><?php echo $lang["created_date"];?>
                    </th>
                   
                    <th><?php echo $lang["former_participant"];?>
                    </th>
                    <th><?php echo $lang["operation"];?>
                    </th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
      </div>

        
        <!-- Gird column -->

      </section>
      <!-- Section: Basic examples -->

  <!-- 用户加入的项目 -->
  <br>
 <!-- Section: Basic examples -->
 <section>















<script type="text/javascript">
     function del(){
        if(confirm("<?php echo $lang["deleteproject_or_not"];?>")){
         return true;
        }else{
         return false;
        }
     }
</script>


<!-- <script>
$(".username-edit").editable("function_account/save_name.php",{
      // width: 120, 
      // height: 30, 
			type      : "text",
			submit    : '<?php echo $lang["save"];?>',
			cancel    : '<?php echo $lang["cancel"];?>',
			tooltip   : "<?php echo $lang["edit"];?>",
      width     : "<?php echo $lang["ten_percent"];?>",
    });
</script> -->

<!-- 单独的foot -->

  <!-- SCRIPTS  -->
  <!-- JQuery  -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips  -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript  -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- MDB core JavaScript  -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- DataTables  -->
  <script type="text/javascript" src="js/addons/datatables.min.js"></script>
  <!-- DataTables Select  -->
  <script type="text/javascript" src="js/addons/datatables-select.min.js"></script>
  <!-- Custom scripts -->
  <script>
$(document).ready(function () {
  $('#dtMaterialDesignExample').DataTable();
  $('#dtMaterialDesignExample_wrapper').find('label').each(function () {
    $(this).parent().append($(this).children());
  });
  $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('input').each(function () {
    const $this = $(this);
    $this.attr("placeholder", "Search");
    $this.removeClass('form-control-sm');
  });
  $('#dtMaterialDesignExample_wrapper .dataTables_length').addClass('d-flex flex-row');
  $('#dtMaterialDesignExample_wrapper .dataTables_filter').addClass('md-form');
  $('#dtMaterialDesignExample_wrapper select').removeClass(
  'custom-select custom-select-sm form-control form-control-sm');
  $('#dtMaterialDesignExample_wrapper select').addClass('mdb-select');
  $('#dtMaterialDesignExample_wrapper .mdb-select').materialSelect();
  $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('label').remove();
});

  </script>
<script>
$(document).ready(function () {
$('#dtBasicExample').DataTable();
$('#dtBasicExample_wrapper .dataTables_length').addClass('bs-select');
});
</script>

</body>
