<!-- 项目展示界面 -->
<!-- YRX -->
<?php

include 'share/project.php';

?>




    <!-- Sidebar navigation  -->
      <ul>
      </ul>
    <!-- Sidebar navigation  -->


  <!-- Main layout  -->
  <main>
    <div class="container-fluid mb-5">

  <!-- 用户创建的项目 -->
      <!-- Section: Basic examples -->
      <section>

        <!-- Gird column -->
        <div class="col-md-12">
        <!-- 可以加个标题 -->
 
          
          <div class="card">
            <div class="card-body">
            <span class="badge badge-pill badge badge-primary hvr-rotate"><?php echo $login_session;?><?php echo $lang["created_project"];?></span>	
            <div class="col-md-12 text-right">
              <div>
              <form action="project_creation.php" method="post">
						  
              <input type="text" class="form-control mb-4" name="pid" style="display: none">
              <input type="text" class="form-control mb-4" name="langpairid" style="display: none">
              <button class="btn btn-outline-success btn-rounded btn " type='submit'><?php echo $lang["create_project"];?></button>
		  	      </form>
              </div> 
            </div>
              <table id="dtMaterialDesignExample" class="table table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                  <th width=5%><?php echo $lang["hash"];?>
                    </th>
                    <th width=10%><?php echo $lang["project_name"];?>
                    </th>
                    <th width=15%><?php echo $lang["project_description"];?>
                    </th>
                    <th width=10%><?php echo $lang["language"];?>
                    </th>
                    <th width=15%><?php echo $lang["created_date"];?>
                    </th>
                    <th width=10%><?php echo $lang["invitationcode"];?>
                    </th>
                    <th width=15%><?php echo $lang["participant"];?>
                    </th>
                    <th width=20%><?php echo $lang["operation"];?>
                    </th>
                  </tr>
                </thead>
                <?php 
                $sql = "SELECT project.invite_code, project.pid, project.projectname, project.text, langpair.sid, langpair.tid, user.username, project.date
                FROM project
                INNER JOIN langpair
                ON project.langpairid = langpair.id
                INNER JOIN user
                ON project.uid = user.uid WHERE project.uid = '$user_id' AND project.status = 1";
                mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况
				$result = mysqli_query($conn,$sql);
        
        if(!$result)
        {
          echo $lang["create_first_project"]."<br>";
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
            <td><div class='project-name-edit' id='".$row["pid"]."'>".stripslashes($row["projectname"])."</div></td>
            <td><div class='project-text-edit' id='".$row["pid"]."'>".stripslashes($row["text"])."</div></td>
            <td>{$rows['lname']} → {$rowt['lname']}</td>
            <td id='date_{$id}'>{$row["date"]}</td>
            <td>{$row["invite_code"]}</td><td>";




            $sqluser = "SELECT projectshare.uid, user.username FROM user 
            INNER JOIN projectshare 
            ON projectshare.uid = user.uid 
            WHERE projectshare.pid = '$id' ";

            $resultuser = mysqli_query($conn,$sqluser);
            
            while($row = mysqli_fetch_array($resultuser, MYSQLI_ASSOC)){
              echo"<a class='hvr-wobble-horizontal' href = 'user_show.php?id={$row["uid"]}'><span class='badge badge-pill teal lighten-2'><i class='fas fa-user' aria-hidden='true'>&nbsp".$row["username"]."</i></span>&nbsp</a>";
            }



            echo"
            </td>
            <td>	
                  <a type='submit' class='btn-floating btn-info hvr-float-shadow' href ='file.php?id={$id}'><i class='far fa-folder-open'></i></a>	
                  <a type='submit' class='btn-floating btn-warning btn-sm hvr-float-shadow'  href ='function_project/delete.php?id={$id}'><i class='far fa-trash-alt'></i></a>
                  <a type='submit' class='btn-floating btn-success btn-sm hvr-float-shadow' href ='function_project/finish.php?id={$id}' onclick='return finish();'><i class='far fa-check-circle'></i></a>								
            
                  </td>
            </tr>";
            $i++;         
          } 
        }

        
                ?>
<!-- <a type='submit' class='btn-floating btn-danger waves-effect btn-sm'  href ='function_project/delete.php?id={$id}' onclick='return del();'><i class='far fa-trash-alt'></i></a>							 -->
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
                    <th><?php echo $lang["invitationcode"];?>
                    </th>
                    <th><?php echo $lang["participant"];?>
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

<!-- Gird column -->
<div class="col-md-12">
<!-- 可以加个标题 -->

  
  <div class="card">
    <div class="card-body">
    <span class="badge badge badge-pill badge-warning hvr-rotate"><?php echo $login_session;?><?php echo $lang["joined_project"];?></span>	

      <table id="dtBasicExample" class="table table-striped table-hover" cellspacing="0" width="100%">
        <thead>
          <tr>
          <th width=5%><?php echo $lang["hash"];?>
            </th>
            <th width=15%><?php echo $lang["project_name"];?>
            </th>
            <th width=15%><?php echo $lang["project_description"];?>
            </th>
            <th width=10%><?php echo $lang["language"];?>
            </th>
            <th width=15%><?php echo $lang["created_date"];?>
            </th>
            <th width=10%><?php echo $lang["creator"];?>
            </th>
            <th width=15%><?php echo $lang["participant"];?>
            </th>
            <th width=20%><?php echo $lang["operation"];?>
            </th>
          </tr>
        </thead>
        <?php 
        $sql = "SELECT projectshare.pid, project.projectname, project.text, langpair.sid, langpair.tid, user.username,user.uid, project.date
        FROM project
        INNER JOIN langpair
        ON project.langpairid = langpair.id
        INNER JOIN projectshare
        ON projectshare.pid = project.pid
        INNER JOIN user
        ON project.uid = user.uid WHERE projectshare.uid = '$user_id' AND project.status = 1 AND projectshare.status = 1";
        mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况
$result = mysqli_query($conn,$sql);

if(!$result)
{
  echo $lang["create_first_project"]."<br>";
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
    <td><div id='".$row["pid"]."'>".stripslashes($row["projectname"])."</div></td>
    <td><div id='".$row["pid"]."'>".stripslashes($row["text"])."</div></td>
    <td>{$rows['lname']} → {$rowt['lname']}</td>
    <td id='date_{$id}'>{$row["date"]}</td>
    <td><a class='hvr-wobble-horizontal' href = 'user_show.php?id={$row["uid"]}'><span class='badge badge-pill deep-orange lighten-2'><i class='fas fa-user' aria-hidden='true'>&nbsp".$row["username"]."</i></span>&nbsp</a>
    </td>
    <td>";


    $sqluser = "SELECT projectshare.uid, user.username FROM user INNER JOIN projectshare ON projectshare.uid = user.uid WHERE projectshare.pid = '$id' ";
    $resultuser = mysqli_query($conn,$sqluser);

    while($row = mysqli_fetch_array($resultuser, MYSQLI_ASSOC)){
      echo"<a class='hvr-wobble-horizontal' href = 'user_show.php?id={$row["uid"]}'><span class='badge badge-pill teal lighten-2'><i class='fas fa-user' aria-hidden='true'>&nbsp".$row["username"]."</i></span>&nbsp</a>";
    }
   
    
    
    echo "</td>
    <td>	
      <a type='submit' class='btn-floating btn-info hvr-float-shadow' href ='file_join.php?id={$id}'><i class='far fa-folder-open'></i></a>	
      <a type='submit' class='btn-floating btn-danger hvr-float-shadow btn-sm' href ='function_community/quit.php?id={$id}' onclick='return quit();'><i class='far fa-window-close'></i></a>							
    </td>
    </tr>";
    $i++;
    
  } 
}

        ?>

        
      </table>
    </div>
  </div>

</div>
<!-- Gird column -->

</section>
<!-- Section: Basic examples -->


    </div>

<script>
    $(".project-name-edit").editable("function_project/save_name.php",{
      // width: 120, 
      // height: 30, 
			type      : "text",
			submit    : '<?php echo $lang["save"];?>',
			cancel    : '<?php echo $lang["cancel"];?>',
			tooltip   : "<?php echo $lang["edit"];?>",
      width     : "<?php echo $lang["fifty_percent"];?>",
    });
    
    $(".project-text-edit").editable("function_project/save_text.php",{
      // width: 120, 
      // height: 30, 
			type      : "text",
			submit    : '<?php echo $lang["save"];?>',
			cancel    : '<?php echo $lang["cancel"];?>',
			tooltip   : "<?php echo $lang["edit"];?>",
      width     : "<?php echo $lang["fifty_percent"];?>",
		});
</script>


<script type="text/javascript">
     function del(){
        if(confirm("<?php echo $lang["bin_project_or_not"];?>")){
         return true;
        }else{
         return false;
        }
     }
</script>

<script type="text/javascript">
     function quit(){
        if(confirm("<?php echo $lang["exit_project_or_not"];?>")){
         return true;
        }else{
         return false;
        }
     }
</script>

<script type="text/javascript">
     function finish(){
        if(confirm("<?php echo $lang["complete_project_or_not"];?>")){
         return true;
        }else{
         return false;
        }
     }
</script>


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
    $this.attr("placeholder", "<?php echo $lang["search"];?>");
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

</html>
