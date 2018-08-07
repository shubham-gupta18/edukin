<?php
if(isset($_REQUEST['remove']) && $_REQUEST['remove']=="remove")
{
	require_once("connection.php");
	session_start();
	$hidden=$_SESSION['delete'];
	$query="delete from {$hidden[0]} where id={$hidden[1]}";
	$result=mysqli_query($conn,$query);
	if($result)
	{
	  echo "Deleted";
	  $_SESSION['delete']="";
	}
	else
	{
		$_SESSION['delete']="";
	}
	
}
?>