<html>
<head>
<meta charset="utf-8">
<title>�����¼</title>
</head>

<body>
	<table cellpadding="0" cellspacing="0">
                <tr class="firstTr">
                    <th width="10%">ʱ��</th>
                    <th width="10%">��Ʒ</th>
                    <th width="10%">����</th>
                    <th width="10%">����</th>
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
	$qua="SELECT ��Ʒ���,����ʱ��,��������,���׽�� FROM deal WHERE �û����=$nn";
	$rea=mysqli_query($con,$qua);
	if(!$rea)
	{
		echo "error";
	}
	while($row=mysqli_fetch_array($rea))
	{
		$qub="SELECT ��Ʒ���� FROM product WHERE ��Ʒ���=$row[0]";
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


<a href="store.php">[���ع���]</a>

</body>

</html>

