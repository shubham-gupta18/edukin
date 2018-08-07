<?php
$conn=mysqli_connect("localhost","root","","self") or die("Error in connection");
		
		session_start();
		$sub=$_SESSION['sub'];
		$table=$_SESSION['class'];
		$query="create table ".$table."( id int not null auto_increment, reg varchar(255), name varchar(255), ";
		foreach($sub as $k=>$v)
		{
		$a[]= $v.' varchar(255), ';
		}
	    $str=implode(" ",$a);
		foreach($sub as $k=>$v)
		{
		   $a[]= $v;
		}
		//$str1="'".implode("','",$a)."'";
		$tmp=$query.$str."class varchar(255), status varchar(255), tBatchid varchar(255) unique, createddate datetime, primary key(id))";	
		$result=mysqli_query($conn,$tmp);
		if($result)
		{
			foreach($_POST as $k=>$v)
			{
			if($k!="submit")
			{
			$val[]=$v;
			$vals[]=$k;
			}
		
			}
			print_r($vals);
			$formkey=implode(",",$vals);
			$formvalue= "'".implode("','",$val)."',";
			echo $query="INSERT INTO ".$table."(".$formkey.",class,createddate)"."values(".$formvalue."'".$table."'".",now()".")";
			if(mysqli_query($conn,$query))
			{
				$_SESSION['newclass']="newclass";
				header("location:phpToexcel.php");
				exit;
			}
			 
		}
		else
		{
		 //    $query="select * from $table";
			// $res=mysqli_query($conn,$query);
			// while($colsname=mysqli_fetch_field($res))
			// {
			// 	if($colsname->name!='id' && $colsname->name!='class')
			//  		$field[]=$colsname->name;
			// }
			// print_r($field);


			foreach($_POST as $k=>$v)
			{
			if($k!="submit")
			{
			$val[]=$v;
			$vals[]=$k;
			}
		
			}
			$formkey=implode(",",$vals);
			$formvalue= "'".implode("','",$val)."',";
			echo $query="INSERT INTO ".$table."(".$formkey.",class,createddate)"."values(".$formvalue."'".$table."'".",now()".")";
			if(mysqli_query($conn,$query))
			{
				$_SESSION['existclass']="existclass";
				header("location:phpToexcel.php");
				exit;
			}
		}
		

//header("location:tmpphpexcelfile.php");
//	session_start();
//	$_SESSION['msg1']=true;
//        header("location:dashboard.php");

?>