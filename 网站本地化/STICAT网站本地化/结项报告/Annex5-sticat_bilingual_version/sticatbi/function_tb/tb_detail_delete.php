<!-- 删除翻译术语对 -->

<?php
    #include "../connection/conn.php";
    include "../connection/lock.php";
    $tbdid = $_GET["id"];
    
    $sql_delete="DELETE FROM tbdetail WHERE `tbdid` = '{$tbdid}'";

    $update = mysqli_query($conn,$sql_delete);

    if(!$update)
    {
    	echo  "<script>alert('".$lang["delete_failed"]."');history.go(-1);</script>";
    }
    else{
    	echo  "<script>alert('".$lang["delete_successfully"]."');history.go(-1);</script>";
    }

?>