<?php

	$link = @mysqli_connect('localhost', 'vans', '123456', 'shop');



		$query = "select * from admin where number = '{$_POST['name']}' and password = '{$_POST['passwd']}'";

	$result = mysqli_query($link, $query);
	if (mysqli_num_rows($result) == 1)
	{
		header('Location:1/adminhome.html');
        }
        else
       {
            echo '<script>alert("账号或密码错误！");</script>';
       }
?>
	