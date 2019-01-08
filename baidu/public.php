<?php

	header("Content-Type:text/html; charset=utf-8");
	
	function getConn($dbsql){
		$conn=mysqli_connect("localhost","root","",$dbsql);//最后一个数据库名称
		mysqli_query($conn,"set names utf8");//设置字符编码
		return $conn;
	}
?>