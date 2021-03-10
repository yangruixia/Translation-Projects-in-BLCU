<?php



include 'findpassword.php';



$email = stripslashes(trim($_POST['email']));



$sql = "SELECT uid,username,password FROM user WHERE email = '$email'";

$query = mysqli_query($conn,$sql);

$num = mysqli_num_rows($query);

if($num==0){//该邮箱尚未注册！

	echo "<script>alert(".$lang["email_not_signed"]."); history.go(-1);</script>";

	exit;	

}else{

	$row = mysqli_fetch_array($query);

	$getpasstime = time();

	$uid = $row['uid'];



	$token = md5($uid.$row['username'].$row['password']);//组合验证码

	$url = "http://yangruixia.xyz/sticatbi/resetpsw.php?email=".$email."&token=".$token;//构造URL

	$time = date('Y-m-d H:i');

	$result = sendmail($time,$url,$email);

	if($result==1){//邮件发送成功

		$msg=$lang["email_sent"];

		//更新数据发送时间

		mysqli_query($conn,"UPDATE user SET getpasstime='$getpasstime' WHERE id='$uid '");

		echo "<script>alert(".$lang["email_sent"]."); history.go(-1);</script>";

	}else{

		$msg = $result;

	}

	

}







function sendmail($time,$url,$email){

	    include_once("smtp.class.php");

	    $smtpserver = "smtp.163.com"; //SMTP服务器

    $smtpserverport = 25; //SMTP服务器端口

    $smtpusermail = "blcusticat@163.com"; //SMTP服务器的用户邮箱

    $smtpuser = "blcusticat@163.com"; //SMTP服务器的用户帐号

    $smtppass = "blcusticat2017"; //SMTP服务器的用户密码

    $smtp = new Smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass); //这里面的一个true是表示使用身份验证,否则不使用身份验证.

    $emailtype = "HTML"; //信件类型，文本:text；网页：HTML

    $smtpemailto = $email;

	$smtpemailfrom = $smtpusermail;
	
	$emailsubject = "STICAT - 找回密码/Find password";

	$emailbody = "亲爱的用户"."：<br/>您在".$time."提交了找回密码请求。请点击下面的链接重置密码（链接24小时内有效）。<br/>
	<a href='".$url."' target='_blank'>".$url."</a><br/>
	如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问。<br/>
	如果您没有提交找回密码请求，请忽略此邮件。<br/>
	Dear user"."：<br/>You\'ve submitted a request of retrieving your password at".$time.
	"Please click the link(valid for 24 hours) below to reset your password.<br/>
	<a href='".$url."' target='_blank'>".$url."</a><br/>
	If the link is not accessible, please copy it to a browser address bar to visit.<br/>
	If you didn\'t submit any request of retrieving password, please ignore this e-mail.";

    //$emailsubject = $lang["minicat_findpsw"];

    //$emailbody = $lang["dear_user"]."：<br/>".$lang["you_in"].$time.$lang["click_link"]."<br/><a href='".$url."' target='_blank'>".$url."</a><br/>".$lang["visit_link"]."<br/>".$lang["neglect_email"];

    $rs = $smtp->sendmail($smtpemailto, $smtpemailfrom, $emailsubject, $emailbody, $emailtype);

	return $rs;

}



function injectChk($sql_str) 

{ //防止注入

	$check = eregi('select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $sql_str);

    if ($check) 

    {
		echo('非法字符串');
		//echo $lang["illegal_str"];

		exit ();

        

    } 

    else 

    {

    	return $sql_str;

	}

}



?>