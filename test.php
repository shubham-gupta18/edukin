<?php
$conn=mysqli_connect("localhost","root","","self");
		//session_start();
		//$sub=$_SESSION['sub'];
		$sub=array("physics","chemistry","maths","sanskrit","hindi","english");
		//print_r($sub);
		//$str=implode(" ",$sub);
		//echo $str;
		//exit;
		$table="commerce";
		//$query="create table ".$table."( id int not null auto_increment, ";
		foreach($sub as $k=>$v)
		{
		$a[]= $v;
		}
		$str="'".implode("','",$a)."'";
		echo $query="INSERT INTO ".$table."(".$str.",'class')"."values(".$str.$table.")";
		exit;
		$tmp=$query.$str."class int, primary key(id))";	
		$result=mysqli_query($conn,$tmp);
		//mysqli_error($conn);
		if($result)
		echo "created";
?>	