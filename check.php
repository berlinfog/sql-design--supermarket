<?php
	session_start();//初始化session变量  
	$link = @mysqli_connect('localhost', 'vans', '123456', 'shop');
        mysqli_query($link,"SET NAMES UTF8");
	$query = "select * from users where name = '{$_POST['name']}' and password = '{$_POST['passwd']}'";
	$result = mysqli_query($link, $query);
	if (mysqli_num_rows($result) == 1)
	{
		header('Location:store.php');
		$row=mysqli_fetch_row($result);
		$_SESSION['number']=$row[0];
		$_SESSION['name']=$row[1];
		$_SESSION['money']=$row[5];
	}
	else
       {
            echo '<script>alert("账号或密码错误！");history.back();</script>';
       }
?>


	
	