<?php

include('../connection/function_lock.php');


?>

<?php

$tbid = $_GET["id"];

$pr_id = $_SESSION['project'];

// echo $tbid,$pr_id;

// 检查是否添加

$sql = mysqli_query($conn,"SELECT * FROM tbshare WHERE tbid='$tbid' AND pid='$pr_id';");

if(mysqli_num_rows($sql)<1){
    $sql = "INSERT INTO `tbshare`(`tbid`,`pid`) VALUES('$tbid','$pr_id')";	
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
    echo "<script>alert('".$lang["addtb_already"]."');location.href='../file.php?id=".$pr_id."'</script>";
}







mysqli_close($conn);
?>