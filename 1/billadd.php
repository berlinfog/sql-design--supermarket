<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>便利之家管理系统</title>
    <link rel="stylesheet" href="css/public.css"/>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<!--头部-->
<header class="publicHeader">
    <h1>便利之家管理系统</h1>

    <div class="publicHeaderR">
        <p><span>下午好！</span><span style="color: #fff21b"> Admin</span> , 欢迎你！</p>
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
        <h2 class="leftH2"><span class="span1"></span>功能列表 <span></span></h2>
        <nav>
            <ul class="list">
                <li id="active"><a href="billshow.php">账单管理</a></li>
                    <li><a href="providerList.php">供应商管理</a></li>
                    <li><a href="userList.php">用户管理</a></li>
                    <li><a href="kucun.html">库存情况</a></li>
                    <li><a href="../login_admin.html">退出系统</a></li>
            </ul>
        </nav>
    </div>
    <div class="right">
        <div class="location">
            <strong>你现在所在的位置是:</strong>
            <span>账单管理页面 >> 订单添加页面</span>
        </div>
        <div class="providerAdd">
            <form method="post">
                <!--div的class 为error是验证错误，ok是验证成功-->
                <div class="">
                    <label for="billId">交易编号：</label>
                    <input type="text" name="jybh" id="jybh" required/>
                    <span>*请输入交易编号</span>
                </div>
                <div>
                    <label for="billName">商品编号：</label>
                    <input type="text" name="spbh" id="billName" required/>
                    <span >*请输入商品编号</span>
                </div>
                <div>
                    <label for="billCom">用户编号：</label>
                    <input type="text" name="yhbh" id="billCom" required/>
                    <span>*请输入用户编号</span>

                </div>
                <div>
                    <label for="billNum">交易时间：</label>
                    <input type="text" name="jysj" id="billNum" required/>
                    <span>*请输入形如"2018-05-21 07:26:35"的数据</span>
                </div>
                <div>
                    <label for="money">交易数量：</label>
                    <input type="text" name="jysl" id="money" required/>
                    <span>*请输入大于0的自然数</span>
                </div>
                <div class="">
                    <label for="billId">交易金额：</label>
                    <input type="text" name="jyje" id="billId" required/>
                    <span>*请输入交易金额</span>
                </div>
				
                <div class="providerAddBtn">
                    <!--<a href="#">保存</a>-->
                    <!--<a href="billList.html">返回</a>-->
                    <input type="submit" name="submit" value="保存" />   
                </div>
				</form> 
            
        </div>

    </div>
	
</section>
<?php
$hostname='localhost';
$user='vans';
$password='123456';

$link=mysqli_connect($hostname,$user,$password,'shop');
mysqli_query($link,"set names utf8");
if (isset($_POST['submit']))
{
    
    $query = "INSERT INTO deal values('{$_POST['jybh']}','{$_POST['spbh']}','{$_POST['yhbh']}','{$_POST['jysj']}',
	'{$_POST['jysl']}','{$_POST['jyje']}')";
    $result=mysqli_query($link,$query);
}
	
?>	
<footer class="footer">
</footer>
<script src="js/time.js"></script>

</body>
</html>