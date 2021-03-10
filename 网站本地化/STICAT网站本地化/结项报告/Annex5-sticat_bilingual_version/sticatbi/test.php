<html>
<head>
<script language=javascript> 
  function text(str)  
  {  
      execScript("n = (msgbox('"+str+"',vbYesNo, '提示')=vbYes)", "vbscript"); 
      return(n);  
  }  
  //alert(confirm("重载的confirm弹出框"));   
  //alert(confirm("是否保存并关闭正文？")); 
</script>
</head>
<body>
<input type="button" name="hhhhhh" value="测试" οnclick=text("是否保存并关闭正文？")>
</body>
</html>
