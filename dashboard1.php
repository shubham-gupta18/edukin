<?php
$conn=mysqli_connect("localhost","root","","self");
$query="show tables";
$result=mysqli_query($conn,$query);
if($result)
{
	while($row=mysqli_fetch_assoc($result))
	{
		$table[]=$row;
	}
	if(!empty($table))
	{
		foreach ($table as $key => $value)
		{
			 if(strtolower($value['Tables_in_self'])==strtolower($_REQUEST['class']))
			 	die("class already exist");
		}
	}
}
?>
<?php include("template.php"); ?>
<script>
prefilldata = [];
prefilldata["Registered_valuerBodyRowCount"] =3;

</script>
<?php

$batchid = uniqid ("FORM",true);

?>


<!DOCTYPE html>
<html>
	<head>
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
		        <li><a href="#">About</a></li>
		        <li><a href="#">Help</a></li>

		      </ul>
		    </div>
		  </div>
		</nav>
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>
		/* Base for label styling */
		[type="checkbox"]:not(:checked),
		[type="checkbox"]:checked {
		  position: absolute;
		  left: -9999px;
		}
		[type="checkbox"]:not(:checked) + label,
		[type="checkbox"]:checked + label {
		  position: relative;
		  padding-left: 2.5em;
		  cursor: pointer;
		}

		/* checkbox aspect */
		[type="checkbox"]:not(:checked) + label:before,
		[type="checkbox"]:checked + label:before {
		  content: '';
		  position: absolute;
		  left: 0; top: 0;
		  width: 1.25em; height: 1.25em;
		  border: 2px solid #ccc;
		  background: #fff;
		  border-radius: 4px;
		  box-shadow: inset 0 1px 3px rgba(0,0,0,.1);
		}

		/* disabled checkbox */
		[type="checkbox"]:disabled:not(:checked) + label:before,
		[type="checkbox"]:disabled:checked + label:before {
		  box-shadow: none;
		  border-color: #bbb;
		  background-color: #ddd;
		}
		[type="checkbox"]:disabled:checked + label:after {
		  color: #999;
		}
		[type="checkbox"]:disabled + label {
		  color: #aaa;
		}

		/* hover style just for information */
		label:hover:before {
		  border: 2px solid #4778d9!important;
		}

		/* Useless styles, just for demo design */

		body {
		  font-family: "Open sans", "Segoe UI", "Segoe WP", Helvetica, Arial, sans-serif;
		  color: #777;
		}
		h1, h2 {
		  margin-bottom: .25em;
		  font-weight: normal;

		}
		h2 {
		  margin: 1em 0 1em;
		  color: #aaa;
		}
		form {
		  width: 25em;
		  margin: 0 auto;
		}
		.txtcenter {
		  margin-top: 4em;
		  font-size: .9em;
		  text-align: center;
		  color: #aaa;
		}
		.copy {
		 margin-top: 2em;
		}
		.copy a {
		 text-decoration: none;
		 color: #4778d9;
		}
		</style>



		<title>
		PhpExcel
		</title>
	</head>


<body>
	<h1 align="center	">Choose subjects:</h1><hr>
<div style="background-color:#f1f2ea">
	<form action="phpToexcel.php" method="post">
	<table align="center">
		<tr>
			<td>
			<input type="hidden" name="class" id="class" value="<?php echo $_REQUEST['class'];?>">
		</td>
		</tr>
		<tr>
		<td colspan="3"><b>Add Subjects</b></td>
		<td>
							<tbody class="Registered_valuerBody">
							</tbody>

							<tr>
							<td colspan="3" align="right">
							<input type="hidden" name="Registered_valuerBodyRowCount" id="Registered_valuerBodyRowCount" value="">

																<button type="button" class="addRow btnsubmit" datafld="Registered_valuerBody">Add</button>&nbsp;&nbsp;
																<button type="button" class="removeRow btnsubmit" datafld="Registered_valuerBody">Remove</button>
																</td>
													</tr>

		</td>
		</tr>
		<tr>
		<td><input type="submit" value="submit" name="submit" /></td>
		</tr>
		</table>
		</form>


</body>
</html>
