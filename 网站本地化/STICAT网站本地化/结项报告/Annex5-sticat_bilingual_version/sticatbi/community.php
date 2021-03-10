<!-- 
    1.每三个打印一个：https://zhidao.baidu.com/question/398722335.html
 -->
<!-- 
    1.展示其他人创建的项目！而且自己没有加入的项目！
 -->
 <?php

include 'share/community.php';

?>

<main>
    <div class="container-fluid mb-5">
<br>
      <!-- Section: Basic examples -->
      <section>


     
<?php  
  if(isset($_GET["search"])==true){
        //判断是否有get操作 
        $search = $_GET["search"];
        //接收输入框数据
        $sql = "SELECT  project.pid, project.projectname, project.text, langpair.sid, langpair.tid, langpair.id, user.username, project.date
        FROM project
        INNER JOIN langpair
        ON project.langpairid = langpair.id
        INNER JOIN user
        ON project.uid = user.uid WHERE project.status = 1 AND project.uid !=$user_id AND (project.projectname LIKE '%{$search}%' OR user.username LIKE '%{$search}%')ORDER BY pid DESC";
        mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况
				$result = mysqli_query($conn,$sql);
  }

  else{    
        $search = "";
        $sql = "SELECT  project.pid, project.projectname, project.text, langpair.sid, langpair.tid, langpair.id, user.username, project.date
        FROM project
        INNER JOIN langpair
        ON project.langpairid = langpair.id
        INNER JOIN user
        ON project.uid = user.uid WHERE project.status = 1 AND project.uid !=$user_id ORDER BY pid DESC";
        mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况
				$result = mysqli_query($conn,$sql);
  }  
 ?>

<div class="row">
    <div class="col-3"></div>
    <div class="col-6">
        
    <form  method="GET" action="">
        <div class="card-body row no-gutters align-items-center">
            
            <!--end of col-->
            <div class="col">
                <input class="form-control form-control-lg form-control-borderless" type="search" name="search" placeholder="<?php echo $lang["search_default"];?>" value ="<?php echo $search?>">
            </div>
            <!--end of col-->
            <div class="col-auto">
                <button class="btn btn-lg btn-rounded btn-info" type="submit" ><?php echo $lang["search"];?></button>
            </div>
            <!--end of col-->
        </div>
    </form>            
    </div>
    <div class="col-3"></div>
</div>

 <?php 
        if(!$result)
        {
          echo $lang["nothing"]."<br>";
        }
        else
        {       
            echo '
            <div class="card-columns">
            ';
            // card-deck
        
          while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			    {
                    


            $sqls = "SELECT lname FROM lang WHERE lid = $row[sid]";
            $results = mysqli_query($conn,$sqls);
            $rows = mysqli_fetch_array($results, MYSQLI_ASSOC);
            
            $sqlt = "SELECT lname FROM lang WHERE lid = $row[tid]";
            $resultt = mysqli_query($conn,$sqlt);
            $rowt = mysqli_fetch_array($resultt, MYSQLI_ASSOC);

                  $id = $row["pid"];

                  // 9af292a706
                  

                  // class="mask flex-center"
                    
                        echo "
                    <div class='col-md-12'>
                    <div class='card card-cascade narrower mb-4 hvr-grow-shadow'>";
                    // 中文到英文用蓝色，英文到中文用橙色
                    if($row["id"]==1){
                        echo "<div class='view view-cascade gradient-card-header  blue lighten-2 '>";
                    }
                    else{
                        echo "<div class='view view-cascade gradient-card-header  orange lighten-2'>";
                    }
                    echo "
                    
                    <h3 class='card-header-title mb-3'>".stripslashes($row["projectname"])."</h3>
                    <p class='mb-0'><i class='fas fa-calendar mr-2'></i>".$row["date"]."</p>
                    <p class='mb-0'>".$lang["language_pairs"].$rows['lname']." → ".$rowt['lname']."</p>
                    <p class='mb-0'>".$lang["creators"].stripslashes($row["username"])."</p>
                    </div>
                    <div class='card-body card-body-cascade text-center'>
                    <p class='card-text'>".stripslashes($row["text"])."</p>";

                    echo" <table  class='table table-hoverable'>
                    <thead>
                    <tr>
                      <th width=40%>".$lang["file_name"].
                      "</th>
                      <th width=30%>".$lang["completeness"].
                      "</th>
                      <th width=30%>".$lang["operation"].
                      "</th>
                    </tr>
                  </thead>";
               

                    $sqlfile = "SELECT * FROM file WHERE pid='$id'"; //待修改
                    mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况
                             $resultfile = mysqli_query($conn,$sqlfile);
                    while($row = mysqli_fetch_array($resultfile, MYSQLI_ASSOC))
                  {
                                $fid = $row["fid"];
                                $sql_count = "SELECT COUNT(context) AS SourceCount FROM source WHERE fid='$fid'";//统计原文句子数量
                              $query = mysqli_query($conn,$sql_count);
                              if(mysqli_num_rows($query)){
                                  $rs=mysqli_fetch_array($query); 
                                    //统计结果
                                        $count=$rs[0];
                                            }
                                        else{
                                  $count=0;
                                      }
    
                          $sql_count_trans = "SELECT COUNT(target.context) AS TargetCount,source.sid AS id,target.date AS date
                                FROM source
                                  INNER JOIN 
                        (
                    SELECT *
                    FROM target AS a
                    WHERE NOT EXISTS (
                    SELECT 1
                    FROM target AS b
                    WHERE b.sid = a.sid
                    AND b.date > a.date)
                    ) target
                  
                  ON source.sid = target.sid
                  WHERE source.fid = '{$fid}'";//统计已翻译的数量




                  $query = mysqli_query($conn,$sql_count_trans);

                  if(mysqli_num_rows($query)){
                    $rs=mysqli_fetch_array($query);
                    //统计结果
                    $count_trans=$rs[0];
                  }else{
                  $count_trans=0;
                  }
  


                  if($count == 0){
                    $result_per=0;
                  }
                  else{
                    $result_per=round($count_trans*100/$count);
                  }
                //echo $count;



                echo "<tr>
                
                <td><div id='".$row["fid"]."'>".$row["fname"]."</div></td>
                
                <td id='count_{$fid}'> ".$result_per."% </td>

                <td>	
                    <a type='submit' class='btn btn-outline-info waves-effect btn-rounded btn-sm ' href ='file_detail.php?id={$fid}'>".$lang["preview"]."</a>	
                </td>
                
                </tr>";




              }

                echo "</table>";


                echo"
                    <a href='invite.php?id={$id}' class='blue-text d-flex flex-row-reverse p-2'>
                    <h5 class='waves-effect waves-light'>".$lang["join"]."<i class='fas fa-angle-double-right ml-2'></i></h5>
                    </a></div>
                    </div>
                    </div>
                    
                    
                     ";

                    
                    // else{

                    //     echo "
                    // <div class='col-md-12'>
                    // <div class='card card-cascade narrower mb-4'>
                    // <div class='view view-cascade gradient-card-header peach-gradient'>
                    // <h3 class='card-header-title mb-3'>".$row["projectname"]."</h3>
                    // <p class='mb-0'><i class='fas fa-calendar mr-2'></i>".$row["date"]."</p>
                    // <p class='mb-0'>语言对：".$rows['lname']." → ".$rowt['lname']."</p>
                    // <p class='mb-0'>创建者：".$row["username"]."</p>
                    // </div>
                    // <div class='card-body card-body-cascade text-center'>
                    // <p class='card-text'>".$row["text"]."</p>





                    // <a href='#' class='orange-text d-flex flex-row-reverse p-2'>
                    // <h5 class='waves-effect waves-light'>详情<i class='fas fa-angle-double-right ml-2'></i></h5>
                    // </a></div>
                    // </div>
                    // </div>
                    
                    
                    //  ";
                    // }
                  
                    
                 
                    // 用于计数，每三个插入一条隔开的代码
                    $i=1;

                    if($i%3 == 0) 
                        {
                            echo '
                            <div class="card-deck">
                            </div>
                            ';
                        }
                    $i++;



			// 	echo "<tr>
			// 			<td>{$row["pid"]}</div></td>
            // <td><div class='project-name-edit' id='".$row["pid"]."'>".$row["projectname"]."</div></td>
            // <td><div class='project-text-edit' id='".$row["pid"]."'>".$row["text"]."</div></td>
            // <td>{$rows['lname']} → {$rowt['lname']}</td>
            // <td id='date_{$id}'>{$row["date"]}</td>
            // <td>	
            //       <a type='submit' class='btn btn-outline-info waves-effect btn-rounded btn-sm' href ='file.php?id={$id}'>打开</a>	
            //       <a type='submit' class='btn btn-outline-danger waves-effect btn-rounded btn-sm'  href ='function_project/delete.php?id={$id}'>删除</button>							
           
			// 			</td>
			// 		  </tr>";
          } 
        }
    

                ?>













<?php

include 'share/foot.php'

?>