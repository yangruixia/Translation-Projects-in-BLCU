<!-- FF -->
<!-- 
    1.用户注册功能
    2.检查用户名是否重复（用户名不重复是为了以后方便检索）
 -->

<?php  

    include "connection/conn.php";
    include "connection/bilogin.php";
    
    if(isset($_POST["submit"]) && $_POST["submit"] == $lang["confirm_signin"])  

    {  
        $user = $_POST["username"];  

        $psw = md5($_POST["password"]);  
		
		$email = $_POST["email"];

        if($user == "" || $psw == "d41d8cd98f00b204e9800998ecf8427e" || $email == "") 

        {  

            echo "<script>alert(".$lang["check_information_completed"]."); history.go(-1);</script>";  

        }
        else
        {
            if(!preg_match('/[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)/',$email))
            {
                echo "<script>alert(".$lang["email_format_error"]."); history.go(-1);</script>"; 
            }

            else 
            {  

                $sql = "select username from user where username = '{$user}'"; //SQL语句  

                $result = mysqli_query($conn,$sql);    //执行SQL语句  

                $num = mysqli_num_rows($result); //统计执行结果影响的行数  

                if($num)    //如果已经存在该用户  

                {  

                    echo "<script>alert(".$lang["username_existed"]."); history.go(-1);</script>";  

                }  

                else
                {
                    $sql1="select email from user where email = '{$email}'";

                    $result1 = mysqli_query($conn,$sql1);

                    $num1 = mysqli_num_rows($result1);

                    if($num1)
                    {
                        echo "<script>alert(".$lang["email_existed"]."); history.go(-1);</script>";
                    }
                
                    else    //不存在当前注册用户邮箱

                    {  

                        $sql_insert = "insert into user (username,password,email) values('{$user}','{$psw}','{$email}')";  

                        $res_insert = mysqli_query($conn,$sql_insert);  

                        //$num_insert = mysql_num_rows($res_insert);  

                        if($res_insert)  

                        {  

                            echo "<script>alert(".$lang["signin_successfully"]."); location='login.php';</script>";  

                        }  
                        else 

                        {  

                            echo "<script>alert(".$lang["please_wait"]."); history.go(-1);</script>";  

                        }  
                    }

                } 

            } 


        }  

    }  

    else 

    {  

        echo "<script>alert(".$lang["submit_failed"]."); history.go(-1);</script>";  

    }  

?>