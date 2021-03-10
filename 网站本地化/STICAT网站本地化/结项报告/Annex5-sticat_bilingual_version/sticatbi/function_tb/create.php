<?php


include "../connection/lock.php"

?>


<?php

$en_row = $_POST["en"];
$zh_row = $_POST["zh"]; 
$user = $_POST["user"]; 

$en = addslashes($en_row);
$zh = addslashes($zh_row);


mysqli_select_db( $conn,DB_DATABASE );
mysqli_query($conn,"set names 'utf8'");	


$sql = "INSERT INTO `tb`(`en`,`zh`,`uid`) VALUES('$en','$zh','$user')";			
$insert = mysqli_query( $conn, $sql );

//$insert_id = mysqli_insert_id($conn);

if(! $insert)
{
    die('echo $lang["dataadd_failed"].mysqli_error($conn)');
}
else
{

    echo $lang["success"];

}

header("Location: ../tb.php");
mysqli_close($conn);
?>