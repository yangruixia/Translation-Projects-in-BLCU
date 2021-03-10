<!-- 添加术语对 -->
<?php


include "../connection/lock.php";
?>


<?php

$en_row = $_POST["en"];
$zh_row = $_POST["zh"]; 
$tbid = $_POST["tbid"]; 

$en = addslashes($en_row);
$zh = addslashes($zh_row);


mysqli_select_db( $conn,DB_DATABASE );
mysqli_query($conn,"set names 'utf8'");	

if(!($en_row and $zh_row)){
    echo "<script>alert('".$lang["langpair_uncomplete"]."');location.href='../tb_detail.php?id={$tbid}'</script>";
}
else{
$sql = "INSERT INTO `tbdetail`(`en`,`zh`,`tbid`) VALUES('$en','$zh','$tbid')";			
$insert = mysqli_query( $conn, $sql );

//$insert_id = mysqli_insert_id($conn);

    if(! $insert)
        {
            die('$lang["dataadd_failed"].mysqli_error($conn)');
        }
    else
        {
        
            echo $lang["success"];

        }

header("Location: ../tb_detail.php?id={$tbid}");
mysqli_close($conn);
    }
?>