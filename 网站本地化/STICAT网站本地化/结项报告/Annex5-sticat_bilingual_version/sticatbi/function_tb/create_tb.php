<?php


include '../connection/lock.php';
?>


<?php
date_default_timezone_set("Asia/Shanghai"); //设置时间用
$datetime = date("Y/m/d - H:i:s");
$tbname_row = $_POST["tbname"];
$text_row = $_POST["text"]; 
$user = $_POST["user"]; 

$tbname = addslashes($tbname_row);
$text = addslashes($text_row);


mysqli_select_db( $conn,DB_DATABASE );
mysqli_query($conn,"set names 'utf8'");	

if(!$tbname_row){
    echo "<script>alert('".$lang["tbname_blank"]."');location.href=' ../tb_creation.php'</script>";
}
else{

$sql = "INSERT INTO `tb`(`name`,`text`,`date`,`uid`) VALUES('$tbname','$text','$datetime','$user')";			
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

header("Location: ../tb.php");
mysqli_close($conn);

}
?>