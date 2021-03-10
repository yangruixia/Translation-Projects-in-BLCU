<?php
include 'sendmail.php';

$email = stripslashes(trim($_GET['email']));
$sql = "SELECT * FROM user WHERE email='$email'";

$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
if($row)
{
	$mt = md5($row['uid'].$row['username'].$row['password']);
    if($mt==$token)
    {
        if(time()-$row['getpasstime']>24*60*60)
        {
			$msg = $lang["link_expired"];
        }
        else
        {
            $msg = $lang["reset_paasword"];
            header("Location: resetpsw.php")
		}
    }
    else
    {
		$msg =  $lang["invalid_link"];
	}
}
else
{
	$msg = $lang["wrong_link"];	
}
echo "<script>alert($msg); history.go(-1);</script>";
?>
