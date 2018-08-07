<?php
session_start();
$_SESSION['sub']="";
$_SESSION['sub1']="";
$_SESSION['sub2']="";
?>
<html>
<head>
	<!-- Theme source is www.w3schools.com - No Copyright -->
	<title>EduKin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

	<!-- Navbar -->
	<nav class="navbar navbar-default">
	  <div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="eduKin.html">Edukin</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="logout.php">logout</a></li>

	      </ul>
	    </div>
	  </div>
	</nav>

	<table align="center">
		<form action="dashboard1.php" method="post">
			<style>
			element.style {
			}
			body {
			    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
			    font-size: 14px;
			    line-height: 1.42857143;
			    color: #333;
			    background-color: #1abc9c;
			}
			</style>
				<tr>
				<td colspan="3"><p style="font-family:courier; font-size:160%;"><b>Enter new class name:</b></p></td>


				<td><input type="text" name="class" id="class" placeholder="name of the class"></td>
				</tr>
				<tr>
					<td><button type="submit" value="submit" name="submit"  class="btn btn-default">submit</button></td>
				</tr>

		</form>
		<form action="phpToexcel.php" method="post">
				<tr>
				<td colspan="3"><p style="font-family:courier; font-size:160%;"><b>Select from existing class:</b></p></td>
<?php
require_once("connection.php");
$query="show tables";
$result=mysqli_query($conn,$query);
if($result)
{
	echo "<td><select name='eclass'>
			<option value=''>--select class--</option>";
	while($row=mysqli_fetch_assoc($result))
	{
		echo "<option value=".$row["Tables_in_self"].">".$row['Tables_in_self']."</option>";
	}
	echo "</select></td>";
}
?>

				<tr>
					<td>	<td><button type="submit" value="submit" name="existclass"  class="btn btn-default">submit</button></td>
				</tr>
				<hr>
			</table>
		</body>
	</html>
