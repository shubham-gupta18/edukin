
<?php
//if(!isset($_REQUEST['submit']))
//{
//header("location:dashboard1.php");
//exit;
//}
$conn=mysqli_connect("localhost","root","","self");
$batchid = uniqid ("FORM",true);
session_start();
if(isset($_REQUEST['submit']))
{
$_SESSION['sub']=$_REQUEST['subject'];
//$_SESSION['sub1']=$_REQUEST['subject'];
$_SESSION['sub2']=$_REQUEST['subject'];
$_SESSION['class']=$_REQUEST['class'];
$sub=$_REQUEST['subject'];
}
if(isset($_REQUEST['existclass']))
{
	$query="select * from ".$_REQUEST['eclass'];
			$res=mysqli_query($conn,$query);
			while($colsname=mysqli_fetch_field($res))
			{
				if($colsname->name!='id' && $colsname->name!='class')
			 		$field[]=$colsname->name;
			}
				$_SESSION['sub']=$field;
				$_SESSION['sub1']=$field;
				$_SESSION['class']=$_REQUEST['eclass'];
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
		PhpExcel
		</title>
	</head>
		<body>
		<form method="post">
			<div style="position: relative;margin-left: 1000px;">
				<b>Select class:</b>
				<select name="cmbclass">
					<option value="">--select class--</option>
					<?php
						$conn=mysqli_connect("localhost","root","","self");
						$query="show tables";
						$result=mysqli_query($conn,$query);
						if($result)
						{
							while($row=mysqli_fetch_assoc($result))
							{
								echo "<option value=".$row["Tables_in_self"].">".$row['Tables_in_self']."</option>";
							}
							echo "</select>";
						}
					?>
					<input type="submit" value="list" name="list" />
			</div>
			</form>
			<table align="center">
			<form action="data.php" method="post">
					<input type="hidden" name="tBatchid" value="<?php echo $batchid; ?>">
				<tr>
					<td>Registration no:</td><td><input type="text" name="Reg" value="" /></td>
				</tr>
				<tr>
					<td>Name:</td><td><input type="text" name="Name" value="" /></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><b>Subject:</b></td>
					<?php
					error_reporting(0);
					if($_REQUEST['submit']=='submit' || $_SESSION['newclass']="newclass")
					{
					foreach($_SESSION['sub2'] as $k=>$v)
					{
					?>
					<tr>
					<td><?php echo ucwords($v);?></td><td><input type="number" name="<?php echo $v;?>" value=""></td>
					
					</tr>
					<?php }}?>

					<?php
					error_reporting(0);
					if(isset($_REQUEST['existclass']) || $_SESSION['existclass']=='existclass')
					{
					foreach($_SESSION['sub1'] as $k=>$v)
					{
					?>
					<tr>
					<td><?php echo ucwords($v);?></td><td><input type="number" name="<?php echo $v;?>" value=""></td>
					
					</tr>
					<?php }}?>
					
				</tr>
				
				<tr>
					<td>Status:</td><td><input type="radio" name="status" value="pass" />Pass
					<input type="radio" name="status" value="fail" />Fail
					</td>
				</tr>
				
				<tr>	
				<td><input type="submit" value="Submit" name="submit" /></td>
				</tr>
				</form>
				</table>
		
	</body>
</html>
<br><br><br><br><br>
<html>
<body>
<table align="center" border="1" cellpadding="10" cellspacing="10">
<?php
if(isset($_REQUEST['list']) and $_REQUEST['list']=="list")
{
$_SESSION['class']=$_REQUEST['cmbclass'];
}
$query="select * from ".$_SESSION['class'];
$result=mysqli_query($conn,$query);
if($result)
{
	echo "<caption><b>".strtoupper($_SESSION['class'])."</b></caption>";
	echo "<tr>";
	echo "<th>Sl no.</th>";
	while($colsnameshow=mysqli_fetch_field($result))
	{
		if($colsnameshow->name!='id' and $colsnameshow->name!='class' and $colsnameshow->name!='tBatchid')
		{
			echo "<th>".ucwords($colsnameshow->name)."</th>";
			$fieldshow[]=$colsnameshow->name;
		}
	}
	echo "<th>Edit</th>";
	echo "<th>Delete</th>";
	echo "</tr>";
	$datashow=array();
	while($row=mysqli_fetch_assoc($result))
	{
		$datashow[]=$row;
	}
	if($datashow!="")
	{
		$i=1;
		foreach($datashow as $k=>$v)
		{
			echo "<tr>";
			echo "<td>".$i++."</td>";
			foreach($fieldshow as $key=>$val)
			{
				echo "<td>".$v[$val]."</td>";
			}
			echo "<td><a href=edit.php?id={$v['id']}>Update</a></td>";
			echo "<form action='delete.php' method='post'>";
			$hidden[]=$_SESSION['class'];
			$hidden[]=$v['id'];
			$_SESSION['delete']=$hidden;
			echo "<td><button type='submit' value='remove' name='remove'>Remove</button></td>";
			echo "</form>";
			echo "</tr>";
		}
	}
		
		//echo "<td>".$row[]."</td>";
	
}
?>
</table>
</body>
</html>