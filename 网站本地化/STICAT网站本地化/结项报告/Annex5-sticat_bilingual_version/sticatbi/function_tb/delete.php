<?php

    include "../connection/lock.php";
    $tbid = $_GET["id"];
    
    $sql_delete="DELETE FROM tb WHERE `tbid` = '{$tbid}'";

    $update = mysqli_query($conn,$sql_delete);

    if(!$update)
    {
    	echo  "<script>alert('".$lang["delete_failed"]."');location.href=' ../tb.php'</script>";
    }
    else{
    	echo  "<script>alert('".$lang["delete_successfully"]."');location.href=' ../tb.php'</script>";
    }

?>