<?php
	
	include("../public.php");
	$conn=getConn("baidu");
	
	//接收来自登录的数据
	$name=$_GET["name"];
	$pwd=$_GET["pwd"];
	
	//设置sql语句
	$selectsql="SELECT * FROM `register`";
	
	//执行数据库
	$result=mysqli_query($conn,$selectsql);
	
	
	$flag=false;//用户名不等
	while($arr=mysqli_fetch_array($result)){
		//echo $arr["name"];
		if($name==$arr["name"]){
			//echo $arr["pwd"];
			$flag=true;
			break;
		}
	}
	
		if($flag){//用户名已存在
			if($pwd==$arr["pwd"]){//密码存在
				echo "<script>alert('欢迎".$name.",登录成功');location.href='https://pan.baidu.com/';</script>"; 
			}else{
				echo "<script>alert('密码不正确');location.href='login.html';</script>";	
			}
		}
	
		if($flag==false){
			echo "<script>alert('用户名不存在,请重新输入');location.href='login.html';</script>";
		}
	
?>