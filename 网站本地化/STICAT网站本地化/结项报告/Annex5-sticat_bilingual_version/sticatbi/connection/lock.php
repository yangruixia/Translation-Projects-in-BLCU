<?php
include 'conn.php';
include 'bi.php';
// if (session_status() !==PHP_SESSION_ACTIVE) {
// 	session_start();}
$user_check=$_SESSION['login_user'];

$ses_sql=mysqli_query($conn,"SELECT * FROM user WHERE username='$user_check' ");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session=$row['username'];
$user_id = $row['uid']; //获取用户的uid
$_SESSION['uid']=$user_id;

// if(!isset($login_session))
// {
// header("Location: login.php");
// }

?>