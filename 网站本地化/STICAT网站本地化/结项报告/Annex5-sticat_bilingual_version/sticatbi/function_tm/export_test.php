<?php

include '../connection/conn.php';
$tmid = $_GET["id"];


?>
   <table id="table1" border="1" cellspacing="0" cellpadding="0" style="display: none">
        <thead>
            <tr>
                <td>en</td>
                <td>zh</td>
                
            </tr>
        </thead>
        <tbody>
<?php

$stmt = mysqli_query($conn,"SELECT zh, en FROM tmdetail WHERE tmid='$tmid'");
mysqli_query($conn,"set names utf8"); //防止出现中文乱码的情况
while($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC)){
echo "
<tr>
        <td>".stripslashes($row["en"])."</td>
        <td>".stripslashes($row["zh"])."</td>
            </tr>";

}

?>

</tbody>
</table>
    <!-- (document).ready(）
    <button id="btn" onclick="btn_export()">导出</button> -->
</body>
<script src="xlsx.full.min.js"></script>
<script src="export.js"></script>
<script>
    
    // function btn_export() {
    //     var table1 = document.querySelector("#table1");
    //     var sheet = XLSX.utils.table_to_sheet(table1);//将一个table对象转换成一个sheet对象
    //     openDownloadDialog(sheet2blob(sheet),'term.xlsx');
    // }

    window.onload=function (){
        var table1 = document.querySelector("#table1");
        var sheet = XLSX.utils.table_to_sheet(table1);//将一个table对象转换成一个sheet对象
        openDownloadDialog(sheet2blob(sheet),'翻译记忆库(TM).xlsx');
        history.go(-1);
}
</script>
</html>
<!-- ————————————————
版权声明：本文为CSDN博主「tianfugui」的原创文章，遵循 CC 4.0 BY-SA 版权协议，转载请附上原文出处链接及本声明。
原文链接：https://blog.csdn.net/tian_i/article/details/84327329 -->