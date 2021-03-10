<?php
    #include "../connection/conn.php";
    include "../connection/lock.php";
    $pid = $_GET["id"];

    //获得项目设置的语言对
    $sql_language = "SELECT langpairid FROM project WHERE pid = '$pid' ";
    $language_result = mysqli_query( $conn, $sql_language);
    $row = mysqli_fetch_array($language_result, MYSQLI_ASSOC);
    $langpair = $row["langpairid"];
    mysqli_query($conn,"set names utf8"); 
    
    
    #筛选默认记忆库的tmid
    #tmshare表中对应项目的tmid
    $sql_tms = mysqli_query($conn,"SELECT * FROM tmshare WHERE `pid` = '{$pid}'");
    while($row = mysqli_fetch_array($sql_tms, MYSQLI_ASSOC))
	{
        $tmid=$row["tmid"];
        #echo $tmid;

        #tm表中对应项目的默认记忆库id
        $sql_tm = mysqli_query($conn,"SELECT * FROM tm WHERE `tmid` = '{$tmid}' AND 'status'= 0 ");
        
        while($row = mysqli_fetch_array($sql_tm, MYSQLI_ASSOC))
	    {
            $tmid_default=$row["tmid"];

            #删除该项目默认翻译记忆库及内容
            
            #删除默认记忆库内容
            $sql_tmdetail = mysqli_query($conn,"SELECT * FROM tmdetail WHERE `tmid` = '{$tmid_default}'");
            if(mysqli_num_rows($sql_tmdetail)>=1){ 
                $delete_tmdetail_default = "DELETE FROM tmdetail WHERE `tmid` = '{$tmid_default}'";
                $d_tmdetail = mysqli_query($conn,$delete_tmdetail_default);
                if((!$d_tmdetail))
                {
                    echo  "<script>alert('".$lang["delete_failed"]."');history.go(-1);</script>";
                }
            }

            #删除默认翻译记忆库
            $delete_tm_default = "DELETE FROM tm WHERE `tmid` = '{$tmid_default}'";
            $d_tm = mysqli_query($conn,$delete_tm_default);
            if((!$d_tm))
            {
            echo "<script>alert('".$lang["delete_failed"]."');history.go(-1);</script>";
            }
        
        }


        
    }

    #删除该项目与所属翻译记忆库的关系（有默认记忆库，所以结果肯定不为空）
    $sql_delete_tmshare = "DELETE FROM tmshare WHERE `pid` = '{$pid}'";
    $delete_tmshare = mysqli_query($conn,$sql_delete_tmshare);
    if((!$delete_tmshare))
    {
        echo  "<script>alert('".$lang["delete_failed"]."');history.go(-1);</script>";
    }
        
    #删除该项目与所属术语库的关系
    $sql_tbs = mysqli_query($conn,"SELECT * FROM tbshare WHERE `pid` = '{$pid}'");
        //判断是否为空
        if(mysqli_num_rows($sql_tbs)>=1){ 
            $sql_delete_tbshare = "DELETE FROM tbshare WHERE `pid` = '{$pid}'";
            $delete_tbshare = mysqli_query($conn,$sql_delete_tbshare);
            if((!$delete_tbshare))
            {
                echo  "<script>alert('".$lang["delete_failed"]."');history.go(-1);</script>";
            }
        }
    
    #删除该项目与所属成员的关系
    $sql_user = mysqli_query($conn,"SELECT * FROM projectshare WHERE `pid` = '{$pid}'");
    //判断是否为空
    if(mysqli_num_rows($sql_user)>=1){ 
        $sql_delete_user = "DELETE FROM projectshare WHERE `pid` = '{$pid}'";
        $delete_user = mysqli_query($conn,$sql_delete_user);
        if((!$delete_user))
        {
            echo  "<script>alert('".$lang["delete_failed"]."');history.go(-1);</script>";
        }
    }
    

    $sql = "SELECT * FROM file WHERE pid='$pid'";
    $result = mysqli_query($conn,$sql); 
    //判断file是否为空，如果空直接删project
    if(mysqli_num_rows($result)<1){ 
        $sql_delete_project = "DELETE FROM project WHERE `pid` = '{$pid}'";
        $delete_project = mysqli_query($conn,$sql_delete_project);
        if((!$delete_project))
        {
    	    echo  "<script>alert('".$lang["delete_failed"]."');history.go(-1);</script>";
        }
        else{
    	    echo  "<script>alert('".$lang["delete_successfully"]."');history.go(-1);</script>";
        }
    } 

    //file不为空
    else{ 

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	    {
            $fid = $row["fid"];
            
            $sql_sid = "SELECT * FROM source WHERE fid='$fid'";
    
            $result_sid = mysqli_query($conn,$sql_sid); 
            
            //判断source是否为空，如果空直接删file - source为空target就为空
            if(mysqli_num_rows($result_sid)<1){ 
                $sql_delete_file = "DELETE FROM file WHERE `fid` = '{$fid}'";
                $delete_file = mysqli_query($conn,$sql_delete_file);
                if((!$delete_file))
                {
                    echo  "<script>alert('".$lang["delete_failed"]."');history.go(-1);</script>";
                }
            } 

            //source不为空
            else{

                while($row = mysqli_fetch_array($result_sid, MYSQLI_ASSOC))
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
                    if(mysqli_num_rows($sql_target)==1){
                        $delete_target = mysqli_query($conn,"DELETE FROM target WHERE `sid` = '{$sid}'");
                        if(!$delete_target){
                            echo  "<script>alert('".$lang["delete_failed"]."');history.go(-1);</script>";
                        }
                    }
                }
        
                //删除source file project
                $sql_delete_source = "DELETE FROM source WHERE `fid` = '{$fid}'";
                $delete_source = mysqli_query($conn,$sql_delete_source);
                if((!$delete_source))
                {
                    echo  "<script>alert('".$lang["delete_failed"]."');history.go(-1);</script>";
                }
            }
            
        }

        //删除file和project
        $sql_delete_file = "DELETE FROM file WHERE `pid` = '{$pid}'";
        $delete_file = mysqli_query($conn,$sql_delete_file);

        $sql_delete_project = "DELETE FROM project WHERE `pid` = '{$pid}'";
        $delete_project = mysqli_query($conn,$sql_delete_project);

        if((!$delete_project) or (!$delete_file))
        {
    	    echo  "<script>alert('".$lang["delete_failed"]."');history.go(-1);</script>";
        }
        else{
    	    echo  "<script>alert('".$lang["delete_successfully"]."');history.go(-1);</script>";
        }

    }
      

?>