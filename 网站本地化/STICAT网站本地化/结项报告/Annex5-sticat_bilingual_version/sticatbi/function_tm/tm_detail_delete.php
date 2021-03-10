<!-- 删除翻译记忆对 -->

<?php
    include "../connection/lock.php";
    $tmdid = $_GET["id"];
    
    $sql_delete="DELETE FROM tmdetail WHERE `tmdid` = '{$tmdid}'";

    $update = mysqli_query($conn,$sql_delete);

    if(!$update)
    {
    	echo  "<script>alert('".$lang["delete_failed"]."');history.go(-1);</script>";
    }
    else{
    	echo  "<script>alert('".$lang["delete_successfully"]."');history.go(-1);</script>";
    }

?>