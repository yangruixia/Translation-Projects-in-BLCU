<?php

include('../connection/function_lock.php');

?>

<?php

$tmid = $_GET["id"];

$pr_id = $_SESSION['project'];

// echo $tmid,$pr_id;

// 检查是否添加

$sql = mysqli_query($conn,"SELECT * FROM tmshare WHERE tmid='$tmid' AND pid='$pr_id';");

if(mysqli_num_rows($sql)<1){
    $sql = "INSERT INTO `tmshare`(`tmid`,`pid`) VALUES('$tmid','$pr_id')";	
    $insert = mysqli_query($conn, $sql);
            if(!$insert)
            {
                die('$lang["addfailed_tryagain"].mysqli_error($conn)');
            }
            else
            {
                echo "<script>alert('".$lang["add_successfully"]."');location.href='../file.php?id=".$pr_id."'</script>";
            }
}
else{
    echo "<script>alert('".$lang["addtm_already"]."');location.href='../file.php?id=".$pr_id."'</script>";
}







mysqli_close($conn);
?>