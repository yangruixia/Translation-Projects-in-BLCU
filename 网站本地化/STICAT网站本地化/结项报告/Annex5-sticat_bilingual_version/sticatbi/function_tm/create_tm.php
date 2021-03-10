<?php


include('../connection/lock.php');
?>


<?php
date_default_timezone_set("Asia/Shanghai"); //设置时间用
$datetime = date("Y/m/d - H:i:s");
$tmname_row = $_POST["tmname"];
$text_row = $_POST["text"]; 
$user = $_POST["user"]; 

$tmname = addslashes($tmname_row);
$text = addslashes($text_row);


mysqli_select_db( $conn,DB_DATABASE );
mysqli_query($conn,"set names 'utf8'");	

if(!$tmname_row){
    echo "<script>alert('".$lang["tmname_blank"]."');location.href=' ../tm_creation.php'</script>";
}
else{
$sql = "INSERT INTO `tm`(`name`,`text`,`date`,`uid`) VALUES('$tmname','$text','$datetime','$user')";			
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

header("Location: ../tm.php");
mysqli_close($conn);
    
}
?>