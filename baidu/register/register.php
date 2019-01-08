<?php
	
	include("../public.php");
	$conn=getConn("baidu");
	
	//接收来自注册时的数据
	$name=$_GET["name"];
	$phone=$_GET["phone"];
	$pwd=$_GET["pwd"];
	
	//检测数据库中是否存在0数据如果没有则可以注册，有则不可以
	$selectsql="SELECT * FROM `register`";
	
	//执行sql语句
	$reslut=mysqli_query($conn,$selectsql);	
	//3 设置字符编码
	mysqli_query($conn,"set names utf8");
	
	$flag=false;//表示用户不存在
	while($arr=mysqli_fetch_array($reslut)){
		//echo $arr["name"];
		if($name==$arr["name"]){
			$flag=true;
			break;
		}
	}
	if($flag){//存在用户名
		echo "<script>alert('用户名已存在，请重新输入');location.href='register.html';</script>";
	}else{
		//定义sql语句
		$instersql="INSERT INTO `register`( name, phone, pwd) VALUES ('$name','$phone','$pwd')";
		//执行sql语句
		$row=mysqli_query($conn,$instersql);
		
		if($row){//插入成功注册成功跳转登录页
			echo "<script>alert('注册成功');location.href='../login/login.html';</script>";
		}else{//注册失败
			echo "<script>alert('注册失败');location.href='register.html';</script>"	;
		}	
	
	}
	
	
?>