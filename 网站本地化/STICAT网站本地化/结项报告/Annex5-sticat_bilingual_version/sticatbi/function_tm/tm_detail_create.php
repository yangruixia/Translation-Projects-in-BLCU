<!-- 添加记忆对 -->
<!-- 需要增加分词之后的语句 -->
<?php

include('../connection/lock.php');
include "../function_translation/baidu_transapi.php";
require_once '../function_translation/AipNlp.php';

include "../function_translation/zh_seg.php";
?>


<?php

$en_row = $_POST["en"];
$zh_row = $_POST["zh"]; 
$tmid = $_POST["tmid"]; 

$en = addslashes($en_row);
$zh = addslashes($zh_row);


// 对中文句子进行分词
$zh_split = explode(' ' , arr2zh(filter_mark($zh)));
// 使用json编码将数组转化成为字符串
$zh_split_json = json_encode($zh_split);  


mysqli_select_db( $conn,DB_DATABASE );
mysqli_query($conn,"set names 'utf8'");	


if(!($en_row and $zh_row)){
    echo "<script>alert('".$lang["langpair_uncomplete"]."');location.href='../tm_detail.php?id={$tmid}.php'</script>";
}
else{
$sql = "INSERT INTO `tmdetail`(`en`,`zh`,`tmid`,`zh_split`) VALUES('$en','$zh','$tmid','$zh_split_json')";			
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

header("Location: ../tm_detail.php?id={$tmid}.php");
// print_r(json_decode($zh_split_json));
mysqli_close($conn);
    }
?>