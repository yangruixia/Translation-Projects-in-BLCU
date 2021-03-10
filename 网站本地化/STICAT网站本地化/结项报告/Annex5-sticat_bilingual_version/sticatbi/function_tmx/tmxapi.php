<?php

include('../connection/lock.php');

require_once '../function_translation/AipNlp.php';

include "../function_translation/zh_seg.php";

// include('../file_cache.php');

?>

<!-- <style>
.cache{
    text-align:center;
    position:absolute;
        top:0;
        left:0;
        bottom:0;
        right:0;
        height: max-content; 
        width: max-content;
        margin:auto;
}

</style>

<div class = "cache">
<img src="../img/cache.gif">
<p>文件上传中，请勿离开~</p>
</div> -->
<!-- <script>
alert('文件上传中，请勿离开！');
</script> -->

<?php

#session_start();
$pid = $_SESSION['project'];    //获取pid
$fname = $_FILES["file"]["name"] ;

date_default_timezone_set("Asia/Shanghai"); //设置时间用
$datetime = date("Y/m/d-h:i:sa");

//判断文件是否已经存在
$check_sql = "SELECT * FROM file WHERE pid = '$pid' and fname = '$fname' ";
$check_result = mysqli_query($conn,$check_sql);

if($num = mysqli_num_rows($check_result))
{ 
    echo "<script>alert('".$lang["file_existed"]."');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";    
}
else
{
    //将文件添加进file表
    $sql = "INSERT INTO `file`(`fname`,`pid`,`time`) VALUES('$fname','$pid','$datetime')";			
    $insert = mysqli_query( $conn, $sql );

    $url = "http://api.tmxmall.com/v1/http/parseFile";

    //获得项目设置的语言对
    $sql_language = "SELECT langpairid FROM project WHERE pid = '$pid' ";
    $language_result = mysqli_query( $conn, $sql_language);
    $row = mysqli_fetch_array($language_result, MYSQLI_ASSOC);
    $langpair = $row["langpairid"];

    //得到langpair后，写一个if语句判断中英或英中
    if($langpair==1)
    // 中到英
    {
        $data = array(
            "file" => curl_file_create($_FILES["file"]["tmp_name"],$_FILES["file"]["type"],$_FILES["file"]["name"]),
            "user_name" =>"1435574480@qq.com",
            "client_id" =>"f08b463cf3ba4dce5924e69164fb8458",
            "to" => "en-US",
            "from" => "zh-CN",
            "de" =>""
        );
    }
    else
    {
    $data = array(
            "file" => curl_file_create($_FILES["file"]["tmp_name"],$_FILES["file"]["type"],$_FILES["file"]["name"]),
            "user_name" =>"1435574480@qq.com",
            "client_id" =>"f08b463cf3ba4dce5924e69164fb8458",
            "to" => "zh-CN",
            "from" => "en-US",
            "de" =>""
    );
    }

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);

    curl_setopt($curl, CURLOPT_POST, 1);

    curl_setopt($curl, CURLOPT_HEADER, 0); 

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    $output = curl_exec($curl);

    curl_close($curl);

    $array = json_decode($output,true);

    foreach($array["segments"] as $segment)
    {
        foreach($segment["srcSegmentAtoms"] as $Atom)
        {
            if($Atom["textStyle"]!="tag")
            {
                $sql2 = "SELECT fid FROM file WHERE fname = '$fname' and pid = '$pid' " ;
                $result2 = mysqli_query($conn,$sql2);
                $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
                $fid = $row2["fid"];
                $query_raw = $Atom["data"];
                $query = addslashes($query_raw);
                $sql3="INSERT INTO source(`context`,`fid`) values ('$query','$fid')";
                mysqli_query($conn,$sql3);
            }
        }
    }
    // 如果是中文，则需要添加到另外一个表里面~
    if($langpair==1){
        $sql2 = "SELECT fid FROM file WHERE fname = '$fname' and pid = '$pid' " ;
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
        $fid = $row2["fid"];
        $sql_seg = "SELECT * FROM source WHERE fid = '$fid' " ;
        $result_seg = mysqli_query($conn,$sql_seg);
        while($row = mysqli_fetch_array($result_seg, MYSQLI_ASSOC)){
            set_time_limit(0);
            $zh = $row["context"];
            // echo $zh;
            $zh_split = explode(' ' , arr2zh(filter_mark($zh)));
            // 使用json编码将数组转化成为字符串
            $zh_split_json = json_encode($zh_split);  
            // echo $zh_split_json;
            $id = $row["sid"];
            $sql_insert="INSERT INTO sourcesplit(`zh_split`,`sid`) values ('$zh_split_json','$id')";
            mysqli_query($conn,$sql_insert);
        }
    }


    echo "<script>alert('".$lang["upload_successfully"]."');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";

    }
    ?>
<!-- header("Location: ../file.php?id={$id}");
header('Location:'. $_SERVER['HTTP_REFERER']);
location.href='".$_SERVER["HTTP_REFERER"]."'; -->