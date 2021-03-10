<!-- 选择界面 -->

<?php

include 'share/project.php';

?>

<main>
    <div class="container-fluid mb-5">
<br>


<?php 
if($_GET){
  //判断是否有get操作 
  $search = $_GET["search"];
  //接收输入框数据
  $sql = "SELECT * FROM tm WHERE uid='$user_id' AND status = 1 AND name LIKE '%{$search}%'";
  mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况
  $result = mysqli_query($conn,$sql);
}
else
{
  $search ="";
  $sql = "SELECT * FROM tm WHERE uid='$user_id' AND status = 1";
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
                <input class="form-control form-control-lg form-control-borderless" type="search" name="search" placeholder="<?php echo $lang["tm_search_default"];?>" value ="<?php echo $search?>">
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

$i=0;
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
$tbid = $row["tmid"];
        // 用于计数，每三个插入一条隔开的代码

        // echo $i;
        if($i%3 == 0) 
                  {
                    // echo 'here';
                      echo '<div class="col-md-12">
                      <div class="row">';
                  
                  }
                   

// 卡片位于中间的格式<div class="card testimonial-card">
echo '<div class="col-md-4 ">
<div class="card">
  <!-- Content -->
  <div class="card-body" >
    <!-- Name -->
    <h4 class="card-title">'.stripslashes($row["name"]).'</h4>
    <hr>
    <!-- Quotation -->
    <p class="mb-0">'.$lang["descriptions"].stripslashes($row["text"]).'</p>
    <p class="mb-0">'.$lang["dates"].$row["date"].'</p>
    <br>
    <a type="button" class="btn btn-light-blue" href ="tm_show_card.php?id='.$tbid.'">'.$lang["view"].'</a>
    <a type="button" class="btn btn-cyan" href ="function_project_tm/add.php?id='.$tbid.'">'.$lang["add"].'</a>
  
  </div>

  </div>

  </div> 
';

if(($i+1)%3 == 0) 
            {
              echo '</div></div><br>';
        }
        $i++;      
                 



// $sqlproject = 
// "SELECT tbshare.pid, project.projectname 
// FROM project INNER JOIN tbshare 
// ON project.pid = tbshare.pid 
// WHERE tbshare.tbid = '$tbid' ";

// $resultproject = mysqli_query($conn,$sqlproject);
// while($row = mysqli_fetch_array($resultproject, MYSQLI_ASSOC)){
//   echo"<a class='hvr-wobble-horizontal' href = 'file.php?id={$row["pid"]}'><span class='badge badge-pill teal lighten-2'><i class='fas fa-user' aria-hidden='true'>&nbsp".$row["projectname"]."</i></span>&nbsp</a>";
// } 


// echo "</td>
// <td>	
//       <a type='submit' class='btn btn-outline-info waves-effect btn-rounded btn-sm' href ='tb_detail.php?id={$tbid}'>打开术语库</a>	
//       <a type='submit' class='btn btn-outline-danger waves-effect btn-rounded btn-sm' href ='function_tb/delete_tb.php?id={$tbid}' onclick='return del();'>删除</button>							

// </td>

// </tr>";
// $i++;
}
?>










<?php

include 'share/foot.php';

?>