<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>便利之家管理员管理系统</title>
    <link rel="stylesheet" href="css/public.css"/>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<!--头部-->
<header class="publicHeader">
    <h1>便利之家管理员管理系统</h1>

    <div class="publicHeaderR">
        <p><span>下午好！</span><span style="color: #ffffff"> Admin</span> , 欢迎你！</p>
        <a href="login.html">退出</a>
    </div>
</header>
<!--时间-->
<section class="publicTime">
    <span id="time">2015年1月1日 11:11  星期一</span>
    
</section>
<!--主体内容-->
<section class="publicMian ">
    <div class="left">
        <h2 class="leftH2">功能列表</h2>
        <nav>
            <ul class="list">
                <li><a href="billshow.php">账单管理</a></li>
                <li id="active"><a href="providerList.php">供应商管理</a></li>
                <li><a href="userList.php">用户管理</a></li>
                <li><a href="kucun.php">库存情况</a></li>
                <li><a href="../login_admin.html">退出系统</a></li>
            </ul>
        </nav>
    </div>
    <div class="right">
        <div class="location">
            <strong>你现在所在的位置是:</strong>
            <span>供应商管理页面</span>
        </div>
        
        <!--供应商操作表格-->
        <table class="providerTable" cellpadding="0" cellspacing="0">
            <tr class="firstTr">
                <th width="10%">供应商名字</th>
                <th width="20%">供应商地址</th>
                <th width="10%">电话</th>
                <th width="10%">邮箱</th>
                <th width="10%">供应商号</th>
            </tr>
            <?php
$hostname='localhost';
$user='vans';
$password='123456';

$link=mysqli_connect($hostname,$user,$password,'shop');
mysqli_query($link,"set names utf8");
$sql="select * from supplier where 供应商名字='$_GET[gysmz]'";
$result=mysqli_query($link,$sql);
while($row=mysqli_fetch_row($result)){
echo<<<TR
<tr>
                <td>{$row[0]}</td>
                <td>{$row[1]}</td>
                <td>{$row[2]}</td>
                <td>{$row[3]}</td>
                <td>{$row[4]}</td>
                
                </tr>
TR;
	}
			?>
			
        </table>

    </div>
</section>

<!--点击删除按钮后弹出的页面-->
<div class="zhezhao"></div>



<footer class="footer">
</footer>

<script src="js/jquery.js"></script>
<script src="js/js.js"></script>
<script src="js/time.js"></script>

</body>
</html>