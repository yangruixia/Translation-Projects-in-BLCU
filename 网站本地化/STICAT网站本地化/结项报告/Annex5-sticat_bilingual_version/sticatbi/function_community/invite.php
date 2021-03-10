<?php

#include('../connection/conn.php');
include('../connection/lock.php');
?>

<?php

$invitecode = $_POST["invitecode"];
$pid = $_POST["pid"];
$uid = $_POST["uid"];

mysqli_query($conn,"set names utf8");

$sql = mysqli_query($conn,"SELECT * FROM projectshare WHERE pid='$pid' AND uid='$uid';");
// $result = mysqli_query($conn,$sql);
//var_dump($sql);
//$rs=mysqli_fetch_array($result, MYSQLI_ASSOC);
//echo $rs["pid"];

if(mysqli_num_rows($sql)<1){
    $sql_code = "SELECT * FROM project WHERE pid='$pid'";			
    $code = mysqli_query($conn,$sql_code);
    while($row = mysqli_fetch_array($code, MYSQLI_ASSOC)){
    $correct_code = $row["invite_code"];
    if($invitecode == $correct_code){
        $sql = "INSERT INTO `projectshare`(`pid`,`uid`) VALUES('$pid','$uid')";			
        $insert = mysqli_query($conn, $sql);
        if(!$insert)
        {
            die('$lang["invite_failed"].mysqli_error($conn)');
        }
        else
        {
            echo "<script>alert('".$lang["invite_successfully"]."');location.href='../project.php'</script>";
        }
    }
    else{
        echo "<script>alert('".$lang["invitationcode_error"]."');location.href='../community.php'</script>";
        }
    }
}

else{
    
   
    while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
        if($row["status"]==0){
            echo "<script>alert('".$lang["quit_joinfailed"]."');location.href='../project.php'</script>";
        }
        else{
            echo "<script>alert('".$lang["joined_already"]."');location.href='../project.php'</script>";
        }
    }
    
}
//header("Location: ../project.php");
mysqli_close($conn);
?>