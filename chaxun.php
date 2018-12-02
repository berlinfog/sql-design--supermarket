<html>
<head>
<meta charset="utf-8">
<title>购买记录</title>
</head>

<body>
	<table cellpadding="0" cellspacing="0">
                <tr class="firstTr">
                    <th width="10%">时间</th>
                    <th width="10%">商品</th>
                    <th width="10%">数量</th>
                    <th width="10%">花费</th>
                </tr>
<?php 
	session_start();
	include"connect.php";
	$result=mysqli_query($con,"SET NAMES UTF8");
	$nn=$_SESSION['number'];
	if(isset($nn))
	{
		echo "success";
	}
	$qua="SELECT 商品编号,交易时间,交易数量,交易金额 FROM deal WHERE 用户编号=$nn";
	$rea=mysqli_query($con,$qua);
	if(!$rea)
	{
		echo "error";
	}
	while($row=mysqli_fetch_array($rea))
	{
		$qub="SELECT 商品名称 FROM product WHERE 商品编号=$row[0]";
		$reb=mysqli_query($con,$qub);
		$roww=mysqli_fetch_array($reb);
		echo<<<TR
		<tr>
                <td>{$row[1]}</td>
                <td>{$roww[0]}</td>
                <td>{$row[2]}</td>
                <td>{$row[3]}</td>
                
                </tr>
		TR;
	}
	
?>

	</table>	


<a href="store.php">[返回购买]</a>

</body>

</html>

