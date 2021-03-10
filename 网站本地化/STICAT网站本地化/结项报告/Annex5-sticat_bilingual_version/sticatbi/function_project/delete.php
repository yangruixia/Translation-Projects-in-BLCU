<?php
    #include "../connection/conn.php";
    include "../connection/lock.php";
    $pid = $_GET["id"];
    
    $sql_update_project = "UPDATE project SET `status` = 0 WHERE `pid` = '{$pid}'";
    $update_project = mysqli_query($conn,$sql_update_project);

    $sql_update_tmshare = "UPDATE tmshare SET `status` = 0 WHERE `pid` = '{$pid}'";
    $update_tmshare = mysqli_query($conn,$sql_update_tmshare);

    $sql_update_tbshare = "UPDATE tbshare SET `status` = 0 WHERE `pid` = '{$pid}'";
    $update_tbshare = mysqli_query($conn,$sql_update_tbshare);

    if((!$update_project) OR (!$update_tbshare) OR (!$update_tmshare))
    {
    	echo  "<script>alert('".$lang["bin_failed"]."');location.href=' ../project.php'</script>";
    }
    else{
    	echo  "<script>alert('".$lang["bin_successfully"]."');location.href=' ../project.php'</script>";
    }
?>