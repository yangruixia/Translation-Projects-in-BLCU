<?php

include '../connection/lock.php';
#include '../connection/bi.php';
?>


<?php
#session_start();
date_default_timezone_set("Asia/Shanghai"); //设置时间用
$datetime = date("Y/m/d - H:i:s");
$name_row = $_POST["projectname"];
if(!$name_row){
    echo "<script>alert('".$lang["projectname_blank"]."');location.href=' ../project_creation.php'</script>";
}
else{






$introduction_row = $_POST["text"]; 
$user = $_POST["user"]; 
$category = $_POST["category"];
$name = addslashes($name_row);
$introduction = addslashes($introduction_row);


function get_invite_code( $length = 10 ) 
{
    $str = substr(md5(time()), 0, $length);//md5加密，time()当前时间戳
    return $str;
}

$invite_code = get_invite_code();

if ($category=="enzh")
{
    $langpairid = "2";
}
else {
    $langpairid = "1";
}

mysqli_select_db( $conn,DB_DATABASE );
mysqli_query($conn,"set names 'utf8'");	


$sql = "INSERT INTO `project`(`projectname`,`uid`,`text`,`date`,`langpairid`,`invite_code`) VALUES('$name','$user','$introduction','$datetime','$langpairid','$invite_code')";			
$insert = mysqli_query( $conn, $sql );

//同时创建一个新的翻译记忆库，status为0
$sql_tm = "INSERT INTO `tm`(`name`,`text`,`date`,`status`,`uid`) VALUES('$name','默认翻译记忆库/Default TM','$datetime','0','$user')";			
$insert_tm = mysqli_query( $conn, $sql_tm );

//将新的翻译记忆库添加进tmshare中
//查询tmid
$sql_tmid = "SELECT tmid FROM tm WHERE name = '$name' and uid = '$user' ORDER BY tmid DESC";
$query = mysqli_query( $conn, $sql_tmid);
$row_tmid = mysqli_fetch_array($query, MYSQLI_ASSOC);
$tmid = $row_tmid["tmid"];

//查询prid
$sql_pid = "SELECT pid FROM project WHERE projectname = '$name' and uid = '$user' ORDER BY pid DESC";
$query = mysqli_query( $conn, $sql_pid);
$row_pid = mysqli_fetch_array($query, MYSQLI_ASSOC);
$pid = $row_pid["pid"];

// echo $tmid;
// echo $pid;
$sql_tmshare = "INSERT INTO `tmshare`(`pid`,`tmid`) VALUES('$pid','$tmid')";			
$insert_tmshare = mysqli_query( $conn, $sql_tmshare );

//$insert_id = mysqli_insert_id($conn);

    if(! $insert)
        {
            die('$lang["dataadd_failed"]. mysqli_error($conn)');
        }
    else
        {
        
            echo $lang["success"];

        }

header("Location: ../project.php");
}
mysqli_close($conn);

?>