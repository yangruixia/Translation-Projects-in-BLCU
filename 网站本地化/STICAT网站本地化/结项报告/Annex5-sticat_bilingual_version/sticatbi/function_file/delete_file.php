<?php
    #include "../connection/conn.php";
    include "../connection/lock.php";
    $pid = $_SESSION['project'];
    //获得项目设置的语言对
    $sql_language = "SELECT langpairid FROM project WHERE pid = '$pid' ";
    $language_result = mysqli_query( $conn, $sql_language);
    $row = mysqli_fetch_array($language_result, MYSQLI_ASSOC);
    $langpair = $row["langpairid"];

    $fid = $_GET["id"];

    mysqli_query($conn,"set names utf8"); 
    
    $sql = "SELECT * FROM source WHERE fid='$fid'";
    
    $result = mysqli_query($conn,$sql); 
    
    //判断source是否为空，如果空直接删file
    if(mysqli_num_rows($result)<1){ 
        $sql_delete_file = "DELETE FROM file WHERE `fid` = '{$fid}'";
        $delete_file = mysqli_query($conn,$sql_delete_file);
        if((!$delete_file))
        {
    	    echo  "<script>alert('".$lang["delete_failed"]."');history.go(-1);</script>";
        }
        else{
    	    echo  "<script>alert('".$lang["delete_successfully"]."');history.go(-1);</script>";
        }
    } 

    //source不为空
    else{ 
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	    {
            $sid = $row["sid"];
            
            $sql_target = mysqli_query($conn,"SELECT * FROM target WHERE `sid` = '{$sid}'");
            
            // 判断是英文还是中文，如果是中文，则需要删除sourcesplit表中对应数据：
            if($langpair==1){
                $delete_sourcesplit = mysqli_query($conn,"DELETE FROM sourcesplit WHERE `sid` = '{$sid}'");
                if(!$delete_sourcesplit){
                    echo  "<script>alert('".$lang["delete_failed"]."');history.go(-1);</script>";
                }
            }

            //判断target是否为空，不为空删除target
            if(mysqli_num_rows($sql_target)>=1){
                $delete_target = mysqli_query($conn,"DELETE FROM target WHERE `sid` = '{$sid}'");
                if(!$delete_target){
                    echo  "<script>alert('".$lang["delete_failed"]."');history.go(-1);</script>";
                }
            }
        }

        //删除source和file
        $sql_delete_source = "DELETE FROM source WHERE `fid` = '{$fid}'";
        $delete_source = mysqli_query($conn,$sql_delete_source);
            
        $sql_delete_file = "DELETE FROM file WHERE `fid` = '{$fid}'";
        $delete_file = mysqli_query($conn,$sql_delete_file);

        if((!$delete_source) or (!$delete_file))
        {
    	    echo  "<script>alert('".$lang["delete_failed"]."');history.go(-1);</script>";
        }
        else{
    	    echo  "<script>alert('".$lang["delete_successfully"]."');history.go(-1);</script>";
        }
    }
      

?>