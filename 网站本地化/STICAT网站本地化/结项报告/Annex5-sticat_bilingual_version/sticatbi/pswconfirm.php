<?php
	include "resetpsw.php";
	include "connection/lock.php";
	// isset($_POST["submit"]) && 
	//echo $_POST["确认重置"];
	if($_POST["reset"] == $lang["confirm_reset"]) 
	{ 
		$mail=$_POST['mail'];

		$psw = md5($_POST["password"]);  
			
		$pswconfirm=md5($_POST["pswconfirm"]);

		if($psw == "d41d8cd98f00b204e9800998ecf8427e" || $pswconfirm == "d41d8cd98f00b204e9800998ecf8427e") 

		{  

			echo "<script>alert("."\"".$lang["type_again"]."\""."); history.go(-1);</script>";  

		}

		else
		{
			if($psw!=$pswconfirm)
			{
				echo "<script>alert("."\"".$lang["twicepsw_different"]."\""."); history.go(-1);</script>"; 
			}

			else 
			{  

				$sql = "select email from user where email = '{$mail}'"; //SQL语句  

				$result = mysqli_query($conn,$sql);    //执行SQL语句  

				$num = mysqli_num_rows($result); //统计执行结果影响的行数  

				if($num)    //如果已经存在该用户  

				{  

					$sql_insert = "update user set password='$psw' where email='$mail'";  

					$res_insert = mysqli_query($conn,$sql_insert); 
					if($res_insert)  

                        {  

                             echo "<script>alert("."\"".$lang["resetpsw_successfully"]."\""."); location='login.php';</script>";  

                        }  
                        else 

                        {  

                            echo "<script>alert("."\"".$lang["please_wait"]."\""."); history.go(-1);</script>";  

                        }   

				}  

				else
				{
					echo "<script>alert("."\"".$lang["user_no_exited"]."\""."); history.go(-1);</script>"; 
				} 

			} 


		}  

	}  

    else 

    {  
		 
        echo "<script>alert('".$lang["submit_failed"]."'); history.go(-1);</script>";  

    }  


?>
