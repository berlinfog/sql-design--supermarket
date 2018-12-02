<html>
<head>
<meta charset="utf-8">
<title>商品购买</title>
</head>

<body  style="background-image:url(images/888.jpg);background-size:100%;">

<?php session_start(); echo "<div id='youshangjiao' style='padding:5px;color:#0FFFFF'>尊敬的用户".$_SESSION['name'].",您好！</div>";  ?>
<?php session_start();echo "<div id='youshangjiao' style='padding:5px;color:#0FFFFF'>余额：".$_SESSION['money']."元</div><br>";  ?>
<a href="login.html">[注销]</a><br>

<img src="images/xuebi.jpg" width="180" height="180" alt=""/>
<br>
<?php getproduct(1);  ?> 
<label for="textfield">购买数量:</label>
<form method="post" >
<input type="number" name="text1">
<input type="submit" name="submit1" value="确定">
</form>
<br>
<br>

<img src="images/app.jpg" width="180" height="180" alt=""/>
<br>
<?php getproduct(2);  ?> 
<label for="textfield">购买数量:</label>
<form method="post" >
<input type="number" name="text2">
<input type="submit" name="submit2" value="确定">
</form>
<br>
<br>


<img src="images/shui.jpg" width="180" height="180" alt=""/>
<br>
<?php getproduct(3);  ?> 
<label for="textfield">购买数量:</label>
<form method="post" >
<input type="number" name="text3">
<input type="submit" name="submit3" value="确定">
</form>
<br>
<br>

<img src="images/zhijin.jpg" width="180" height="180" alt=""/>
<br>
<?php getproduct(4);  ?> 
<label for="textfield">购买数量:</label>
<form method="post" >
<input type="number" name="text4">
<input type="submit" name="submit4" value="确定">
</form>
<br>
<br>


<img src="images/huotui.jpg" width="180" height="180" alt=""/>
<br>
<?php getproduct(5);  ?> 
<label for="textfield">购买数量:</label>
<form method="post" >
<input type="number" name="text5">
<input type="submit" name="submit5" value="确定">
</form>
<br>
<br>

<img src="images/sugar.jpg" width="180" height="180" alt=""/>
<br>
<?php getproduct(6);  ?> 
<label for="textfield">购买数量:</label>
<form method="post" >
<input type="number" name="text6">
<input type="submit" name="submit6" value="确定">
</form>
<br>
<br>

<?php
	date_default_timezone_set('PRC');
     


	if(isset($_POST['submit1']))
	{
		include"connect.php";
		mysqli_query($con,"SET NAMES UTF8");
		$sql="SELECT 商品编号,商品名称,售价,进价 FROM product";
		$result=mysqli_query($con,$sql);
		for($i=1;$i<=1;$i++)
		{
			$row=mysqli_fetch_array($result);
			$sqll="SELECT 库存数量 FROM storehouse WHERE 商品编号=$row[0]";
			$resultt=mysqli_query($con,$sqll);
			$roww=mysqli_fetch_array($resultt);
			$sqlll="SELECT 销售数量,利润 FROM sale WHERE 商品编号=$row[0]";
			$resulttt=mysqli_query($con,$sqlll);
			$rowww=mysqli_fetch_array($resulttt);
			$lr=$row[2]-$row[3];
		}
		if(empty($_POST['text1']))
		{
			echo '<script>alert("请输入购买数量");history.back();</script>';
		}
		else if($_POST['text1']>$roww[0])
		{		
			echo '<script>alert("库存不足！");history.back();</script>';
		}
		else
		{
			$n=$_POST['text1'];
			$money=$n*$row[2];
			if($money>$_SESSION['money'])
			{
				echo '<script>alert("余额不足！");history.back();</script>';
			}
			else
			{
				include"connect.php";
     				session_start();
     				mysqli_query($con,"SET NAMES UTF8");      
     				$time=date('YmdHis');

				$x[0]=$_SESSION['money'];
				$_SESSION['money']=$_SESSION['money']-$money;
				$x[1]=$_SESSION['number'];
				$querya="UPDATE users SET 余额=$x[0]-$money WHERE name=$x[1]";
				$rea=mysqli_query($con,$querya);
				$queryb="UPDATE storehouse SET 库存数量=$roww[0]-$n WHERE 商品编号=$row[0]";
				$reb=mysqli_query($con,$queryb);
				$queryc="UPDATE sale SET 销售数量=$rowww[0]+$n WHERE 商品编号=$row[0]";
				$rec=mysqli_query($con,$queryc);
				$queryd="UPDATE sale SET 利润=$rowww[1]+$n*$lr WHERE 商品编号=$row[0]";
				$red=mysqli_query($con,$queryd);
				$querye="SELECT 交易编号 FROM deal WHERE 交易编号>=ALL(SELECT 交易编号 FROM deal)";
				$ree=mysqli_query($con,$querye);
				$rew=mysqli_fetch_array($ree);
				echo $rew[0];
				$nn=$rew[0]+1;
				echo $nn;
				$queryf="INSERT into deal(交易编号,商品编号,用户编号,交易时间,交易数量,交易金额) values($nn,$row[0],$x[1],$time,$n,$money)";
				$ref=mysqli_query($con,$queryf);
				if($ref)
				{
					echo '<script>alert("购买成功！");history.back();</script>';
				}
			}
		}
			
							
	
	}


	if(isset($_POST['submit2']))
	{
		include"connect.php";
		mysqli_query($con,"SET NAMES UTF8");
		$sql="SELECT 商品编号,商品名称,售价,进价 FROM product";
		$result=mysqli_query($con,$sql);
		for($i=1;$i<=2;$i++)
		{
			$row=mysqli_fetch_array($result);
			$sqll="SELECT 库存数量 FROM storehouse WHERE 商品编号=$row[0]";
			$resultt=mysqli_query($con,$sqll);
			$roww=mysqli_fetch_array($resultt);
			$sqlll="SELECT 销售数量,利润 FROM sale WHERE 商品编号=$row[0]";
			$resulttt=mysqli_query($con,$sqlll);
			$rowww=mysqli_fetch_array($resulttt);
			$lr=$row[2]-$row[3];
		}
		if(empty($_POST['text2']))
		{
			echo '<script>alert("请输入购买数量");history.back();</script>';
		}
		else if($_POST['text2']>$roww[0])
		{		
			echo '<script>alert("库存不足！");history.back();</script>';
		}
		else
		{
			$n=$_POST['text2'];
			$money=$n*$row[2];
			if($money>$_SESSION['money'])
			{
				echo '<script>alert("余额不足！");history.back();</script>';
			}
			else
			{
				include"connect.php";
     				session_start();
     				mysqli_query($con,"SET NAMES UTF8");      
     				$time=date('YmdHis');

				$x[0]=$_SESSION['money'];
				$_SESSION['money']=$_SESSION['money']-$money;
				$x[1]=$_SESSION['number'];
				$querya="UPDATE users SET 余额=$x[0]-$money WHERE name=$x[1]";
				$rea=mysqli_query($con,$querya);
				$queryb="UPDATE storehouse SET 库存数量=$roww[0]-$n WHERE 商品编号=$row[0]";
				$reb=mysqli_query($con,$queryb);
				$queryc="UPDATE sale SET 销售数量=$rowww[0]+$n WHERE 商品编号=$row[0]";
				$rec=mysqli_query($con,$queryc);
				$queryd="UPDATE sale SET 利润=$rowww[1]+$n*$lr WHERE 商品编号=$row[0]";
				$red=mysqli_query($con,$queryd);
				$querye="SELECT 交易编号 FROM deal WHERE 交易编号>=ALL(SELECT 交易编号 FROM deal)";
				$ree=mysqli_query($con,$querye);
				$rew=mysqli_fetch_array($ree);
				echo $rew[0];
				$nn=$rew[0]+1;
				echo $nn;
				$queryf="INSERT into deal(交易编号,商品编号,用户编号,交易时间,交易数量,交易金额) values($nn,$row[0],$x[1],$time,$n,$money)";
				$ref=mysqli_query($con,$queryf);
				if($ref)
				{
					echo '<script>alert("购买成功！");history.back();</script>';
				}
			}
		}
			
							
	
	}




	if(isset($_POST['submit3']))
	{
		include"connect.php";
		mysqli_query($con,"SET NAMES UTF8");
		$sql="SELECT 商品编号,商品名称,售价,进价 FROM product";
		$result=mysqli_query($con,$sql);
		for($i=1;$i<=3;$i++)
		{
			$row=mysqli_fetch_array($result);
			$sqll="SELECT 库存数量 FROM storehouse WHERE 商品编号=$row[0]";
			$resultt=mysqli_query($con,$sqll);
			$roww=mysqli_fetch_array($resultt);
			$sqlll="SELECT 销售数量,利润 FROM sale WHERE 商品编号=$row[0]";
			$resulttt=mysqli_query($con,$sqlll);
			$rowww=mysqli_fetch_array($resulttt);
			$lr=$row[2]-$row[3];
		}
		if(empty($_POST['text3']))
		{
			echo '<script>alert("请输入购买数量");history.back();</script>';
		}
		else if($_POST['text3']>$roww[0])
		{		
			echo '<script>alert("库存不足！");history.back();</script>';
		}
		else
		{
			$n=$_POST['text3'];
			$money=$n*$row[2];
			if($money>$_SESSION['money'])
			{
				echo '<script>alert("余额不足！");history.back();</script>';
			}
			else
			{
				include"connect.php";
     				session_start();
     				mysqli_query($con,"SET NAMES UTF8");      
     				$time=date('YmdHis');

				$x[0]=$_SESSION['money'];
				$_SESSION['money']=$_SESSION['money']-$money;
				$x[1]=$_SESSION['number'];
				$querya="UPDATE users SET 余额=$x[0]-$money WHERE name=$x[1]";
				$rea=mysqli_query($con,$querya);
				$queryb="UPDATE storehouse SET 库存数量=$roww[0]-$n WHERE 商品编号=$row[0]";
				$reb=mysqli_query($con,$queryb);
				$queryc="UPDATE sale SET 销售数量=$rowww[0]+$n WHERE 商品编号=$row[0]";
				$rec=mysqli_query($con,$queryc);
				$queryd="UPDATE sale SET 利润=$rowww[1]+$n*$lr WHERE 商品编号=$row[0]";
				$red=mysqli_query($con,$queryd);
				$querye="SELECT 交易编号 FROM deal WHERE 交易编号>=ALL(SELECT 交易编号 FROM deal)";
				$ree=mysqli_query($con,$querye);
				$rew=mysqli_fetch_array($ree);
				echo $rew[0];
				$nn=$rew[0]+1;
				echo $nn;
				$queryf="INSERT into deal(交易编号,商品编号,用户编号,交易时间,交易数量,交易金额) values($nn,$row[0],$x[1],$time,$n,$money)";
				$ref=mysqli_query($con,$queryf);
				if($ref)
				{
					echo '<script>alert("购买成功！");history.back();</script>';
				}
			}
		}
			
							
	
	}


	if(isset($_POST['submit4']))
	{
		include"connect.php";
		mysqli_query($con,"SET NAMES UTF8");
		$sql="SELECT 商品编号,商品名称,售价,进价 FROM product";
		$result=mysqli_query($con,$sql);
		for($i=1;$i<=4;$i++)
		{
			$row=mysqli_fetch_array($result);
			$sqll="SELECT 库存数量 FROM storehouse WHERE 商品编号=$row[0]";
			$resultt=mysqli_query($con,$sqll);
			$roww=mysqli_fetch_array($resultt);
			$sqlll="SELECT 销售数量,利润 FROM sale WHERE 商品编号=$row[0]";
			$resulttt=mysqli_query($con,$sqlll);
			$rowww=mysqli_fetch_array($resulttt);
			$lr=$row[2]-$row[3];
		}
		if(empty($_POST['text4']))
		{
			echo '<script>alert("请输入购买数量");history.back();</script>';
		}
		else if($_POST['text4']>$roww[0])
		{		
			echo '<script>alert("库存不足！");history.back();</script>';
		}
		else
		{
			$n=$_POST['text4'];
			$money=$n*$row[2];
			if($money>$_SESSION['money'])
			{
				echo '<script>alert("余额不足！");history.back();</script>';
			}
			else
			{
				include"connect.php";
     				session_start();
     				mysqli_query($con,"SET NAMES UTF8");      
     				$time=date('YmdHis');

				$x[0]=$_SESSION['money'];
				$_SESSION['money']=$_SESSION['money']-$money;
				$x[1]=$_SESSION['number'];
				$querya="UPDATE users SET 余额=$x[0]-$money WHERE name=$x[1]";
				$rea=mysqli_query($con,$querya);
				$queryb="UPDATE storehouse SET 库存数量=$roww[0]-$n WHERE 商品编号=$row[0]";
				$reb=mysqli_query($con,$queryb);
				$queryc="UPDATE sale SET 销售数量=$rowww[0]+$n WHERE 商品编号=$row[0]";
				$rec=mysqli_query($con,$queryc);
				$queryd="UPDATE sale SET 利润=$rowww[1]+$n*$lr WHERE 商品编号=$row[0]";
				$red=mysqli_query($con,$queryd);
				$querye="SELECT 交易编号 FROM deal WHERE 交易编号>=ALL(SELECT 交易编号 FROM deal)";
				$ree=mysqli_query($con,$querye);
				$rew=mysqli_fetch_array($ree);
				echo $rew[0];
				$nn=$rew[0]+1;
				echo $nn;
				$queryf="INSERT into deal(交易编号,商品编号,用户编号,交易时间,交易数量,交易金额) values($nn,$row[0],$x[1],$time,$n,$money)";
				$ref=mysqli_query($con,$queryf);
				if($ref)
				{
					echo '<script>alert("购买成功！");history.back();</script>';
				}
			}
		}
			
							
	
	}



	if(isset($_POST['submit5']))
	{
		include"connect.php";
		mysqli_query($con,"SET NAMES UTF8");
		$sql="SELECT 商品编号,商品名称,售价,进价 FROM product";
		$result=mysqli_query($con,$sql);
		for($i=1;$i<=5;$i++)
		{
			$row=mysqli_fetch_array($result);
			$sqll="SELECT 库存数量 FROM storehouse WHERE 商品编号=$row[0]";
			$resultt=mysqli_query($con,$sqll);
			$roww=mysqli_fetch_array($resultt);
			$sqlll="SELECT 销售数量,利润 FROM sale WHERE 商品编号=$row[0]";
			$resulttt=mysqli_query($con,$sqlll);
			$rowww=mysqli_fetch_array($resulttt);
			$lr=$row[2]-$row[3];
		}
		if(empty($_POST['text5']))
		{
			echo '<script>alert("请输入购买数量");history.back();</script>';
		}
		else if($_POST['text5']>$roww[0])
		{		
			echo '<script>alert("库存不足！");history.back();</script>';
		}
		else
		{
			$n=$_POST['text5'];
			$money=$n*$row[2];
			if($money>$_SESSION['money'])
			{
				echo '<script>alert("余额不足！");history.back();</script>';
			}
			else
			{
				include"connect.php";
     				session_start();
     				mysqli_query($con,"SET NAMES UTF8");      
     				$time=date('YmdHis');

				$x[0]=$_SESSION['money'];
				$_SESSION['money']=$_SESSION['money']-$money;
				$x[1]=$_SESSION['number'];
				$querya="UPDATE users SET 余额=$x[0]-$money WHERE name=$x[1]";
				$rea=mysqli_query($con,$querya);
				$queryb="UPDATE storehouse SET 库存数量=$roww[0]-$n WHERE 商品编号=$row[0]";
				$reb=mysqli_query($con,$queryb);
				$queryc="UPDATE sale SET 销售数量=$rowww[0]+$n WHERE 商品编号=$row[0]";
				$rec=mysqli_query($con,$queryc);
				$queryd="UPDATE sale SET 利润=$rowww[1]+$n*$lr WHERE 商品编号=$row[0]";
				$red=mysqli_query($con,$queryd);
				$querye="SELECT 交易编号 FROM deal WHERE 交易编号>=ALL(SELECT 交易编号 FROM deal)";
				$ree=mysqli_query($con,$querye);
				$rew=mysqli_fetch_array($ree);
				echo $rew[0];
				$nn=$rew[0]+1;
				echo $nn;
				$queryf="INSERT into deal(交易编号,商品编号,用户编号,交易时间,交易数量,交易金额) values($nn,$row[0],$x[1],$time,$n,$money)";
				$ref=mysqli_query($con,$queryf);
				if($ref)
				{
					echo '<script>alert("购买成功！");history.back();</script>';
				}
			}
		}
			
							
	
	}



	if(isset($_POST['submit6']))
	{
		include"connect.php";
		mysqli_query($con,"SET NAMES UTF8");
		$sql="SELECT 商品编号,商品名称,售价,进价 FROM product";
		$result=mysqli_query($con,$sql);
		for($i=1;$i<=6;$i++)
		{
			$row=mysqli_fetch_array($result);
			$sqll="SELECT 库存数量 FROM storehouse WHERE 商品编号=$row[0]";
			$resultt=mysqli_query($con,$sqll);
			$roww=mysqli_fetch_array($resultt);
			$sqlll="SELECT 销售数量,利润 FROM sale WHERE 商品编号=$row[0]";
			$resulttt=mysqli_query($con,$sqlll);
			$rowww=mysqli_fetch_array($resulttt);
			$lr=$row[2]-$row[3];
		}
		if(empty($_POST['text6']))
		{
			echo '<script>alert("请输入购买数量");history.back();</script>';
		}
		else if($_POST['text6']>$roww[0])
		{		
			echo '<script>alert("库存不足！");history.back();</script>';
		}
		else
		{
			$n=$_POST['text6'];
			$money=$n*$row[2];
			if($money>$_SESSION['money'])
			{
				echo '<script>alert("余额不足！");history.back();</script>';
			}
			else
			{
				include"connect.php";
     				session_start();
     				mysqli_query($con,"SET NAMES UTF8");      
     				$time=date('YmdHis');

				$x[0]=$_SESSION['money'];
				$_SESSION['money']=$_SESSION['money']-$money;
				$x[1]=$_SESSION['number'];
				$querya="UPDATE users SET 余额=$x[0]-$money WHERE name=$x[1]";
				$rea=mysqli_query($con,$querya);
				$queryb="UPDATE storehouse SET 库存数量=$roww[0]-$n WHERE 商品编号=$row[0]";
				$reb=mysqli_query($con,$queryb);
				$queryc="UPDATE sale SET 销售数量=$rowww[0]+$n WHERE 商品编号=$row[0]";
				$rec=mysqli_query($con,$queryc);
				$queryd="UPDATE sale SET 利润=$rowww[1]+$n*$lr WHERE 商品编号=$row[0]";
				$red=mysqli_query($con,$queryd);
				$querye="SELECT 交易编号 FROM deal WHERE 交易编号>=ALL(SELECT 交易编号 FROM deal)";
				$ree=mysqli_query($con,$querye);
				$rew=mysqli_fetch_array($ree);
				echo $rew[0];
				$nn=$rew[0]+1;
				echo $nn;
				$queryf="INSERT into deal(交易编号,商品编号,用户编号,交易时间,交易数量,交易金额) values($nn,$row[0],$x[1],$time,$n,$money)";
				$ref=mysqli_query($con,$queryf);
				if($ref)
				{
					echo '<script>alert("购买成功！");history.back();</script>';
				}
			}
		}
			
							
	
	}



	
		
	



?>

</body>
</html>



<?php
	
			
	function getproduct($num)
{
	include"connect.php";
	mysqli_query($con,"SET NAMES UTF8");
	$sql="SELECT 商品编号,商品名称,售价 FROM product";
	$result=mysqli_query($con,$sql);
	for($i=1;$i<=$num;$i++)
	{
		$row=mysqli_fetch_array($result);
		$sqll="SELECT 库存数量 FROM storehouse WHERE 商品编号=$row[0]";
		$resultt=mysqli_query($con,$sqll);
		$roww=mysqli_fetch_array($resultt);
	}
	echo $row[1]."<br>价格:".$row[2]."元<br>库存:".$roww[0]."<br>";
}

?>

	

