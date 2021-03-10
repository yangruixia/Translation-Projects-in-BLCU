<?php



include 'connection/conn.php';

// 语言包功能
include 'connection/bilogin.php';


if($_SERVER["REQUEST_METHOD"] == "POST")

{

// email and password sent from form 



$myemail=mysqli_real_escape_string($conn,$_POST['email']); 

$mypassword=mysqli_real_escape_string($conn,md5($_POST['password'])); 



$sql="SELECT uid,username FROM user WHERE email='$myemail' and password='$mypassword'";

$result=mysqli_query($conn,$sql);


$row=mysqli_fetch_array($result,MYSQLI_ASSOC);


//$active=$row['active'];

$count=mysqli_num_rows($result);



// If result matched $myemail and $mypassword, table row must be 1 row

if($count==1)

{



$_SESSION['login_user']=$row["username"];



header("location: project.php");

}

else 

{

	

$error=$lang["emailorpassword_affirm"];

echo "<div class='alert alert-success alert-dismissable'>";						

echo "		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>";

echo "			× ";

echo "		</button>";

echo "		<h4> ";

echo $error;

echo "		</h4>";

echo "	</div>";

}

}

?>

