<?php
require_once "../Classes/PHPExcel.php";
require_once "../Classes/PHPExcel/IOFactory.php";

include('../connection/lock.php');

$tbid = $_SESSION['tb'];
echo $tbid;

// $filename = $_FILES["file"]["tmp_name"];

if (file_exists("upload/" . $_FILES["file"]["tmp_name"]))
{
    echo "<script>alert('".$lang["file_existed"]."');location.href='../tb_detail.php?id={$tbid}';</script>";
}
else
{
    move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $_FILES["file"]["name"]);
    // move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $_FILES["file"]["name"]);

    $excel= PHPExcel_IOFactory::load("upload/".$_FILES["file"]["name"]);

    $sheetCount =$excel->getSheetCount();

    for($i=0;$i<$sheetCount;$i++){
        $data = $excel->getSheet($i)->toArray();
// 借助循环进行导入
        $status = 0;
        for($j=1;$j<count($data);$j++)
        {
            
            $en_raw = $data[$j][0];

            $zh_raw = $data[$j][1];

            $en = addslashes($en_raw);

            $zh = addslashes($zh_raw);

            $insert_sql = "INSERT INTO `tbdetail` (`zh`, `en`,`tbid`) VALUES ('{$zh}', '{$en}','{$tbid}')";

            $status_row = mysqli_query($conn,$insert_sql);

            $status =  $status_row;

        }
        
        if($status!=1)
        {
            echo "<script>alert('".$lang["upload_failed"]."');location.href='../tb_detail.php?id={$tbid}';</script>";
        }
        else
        {
            $filename = 'upload/'.$_FILES["file"]["name"];
            echo $filename;
            // 删除文件代码
            unlink('upload/'.$_FILES["file"]["name"]);
            echo "<script>alert('".$lang["upload_successfully"]."');location.href='../tb_detail.php?id={$tbid}';</script>";
        }

    }
    
}


?>