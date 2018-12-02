<!DOCTYPE html>
<html lang="en" >

<head>
 	<meta charset="gb2312">
  	<title>register</title>
  	<link rel="stylesheet" href="css/login_css.css">
</head>



<body style="background-image:url(images/3.jpg);background-size:100%;">
<br>
<br>
<br>
<h1>用户注册界面</h1>
<h2>regist</h2>



<br>

    <div id="login">
      <form  method="POST">
        <span class="fontawesome-user"></span>
        <input type="text" placeholder="用户编号" size="20" name="Usernumber">

       
        <span class="fontawesome-lock"></span>
          <input type="password" placeholder="用户密码" size="20" name="Password">

	<span class="fontawesome-user"></span>
	<input type="text" placeholder="用户名" size="20" name="Username">


	<span class="fontawesome-user"></span>
	<input type="text" placeholder="用户电话" size="20" name="Phnumber">


       <input type="submit" name="submit" value="立即注册">

	</form>
	<br>
        <a style="text-decoration:none;color:#ffffff;text-align: center;" href="login.html">O(∩_∩)O返回登录&nbsp&nbsp&nbsp</a>
	<a style="text-decoration:none;color:#ffffff;text-align: center;" href="about.html">&nbsp&nbsp&nbsp返回主界面</a>  
<?php 
$link = mysqli_connect('localhost', 'vans', '123456', 'shop');
mysqli_query($link,"SET NAMES UTF8");
$time=date('Ymd');
if (!$link)
{
    die('Could not connect: ' . mysql_error());
}
else {
    
    if (isset($_POST['submit']))
{
    echo "提交成功！<br>";
    $query = "insert into users (name,用户名,password,用户电话,注册日期,余额) values('{$_POST['Usernumber']}','{$_POST['Username']}','{$_POST['Password']}','{$_POST['Phnumber']}',$time,1000)";
    $result=mysqli_query($link,$query);
     if($result)
     {
	echo '<script>alert("注册成功！");</script>';
     }

}
}
?>
  

</body>

</html>
