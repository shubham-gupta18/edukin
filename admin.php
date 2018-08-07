<?php
session_start();
$admin = $pwd ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $admin = test_input($_POST["admin"]);
  $pwd = test_input($_POST["pwd"]);
  	if($admin=="admin" and $pwd=="admin")
	{
	$_SESSION['msg']=$admin;
	header("location:classcheck.php");
	}
	else
	{
	echo "<script>location.assign('error.php');</script>";
	}

}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .container{
  margin-top:40px;
  }
  #bor
  {
  border:ridge;
  background-color: cadetblue;
  color: powderblue;
  padding-bottom: 40px;
  }
  .form-control
  {
  background-color:#e4e3e3;
  }
  .btn
  {
  font-size: 12px;
  }
  .navbar {
      padding-top: -50px;
      padding-bottom: -50px;
      border: 0;
      border-radius: 0;
      margin-bottom: 0;
      font-size: 12px;
      letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
      color: #1abc9c !important;
  }
  </style>

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
          <li><a href="#">About</a></li>
          <li><a href="help.html">Help</a></li>
          <li><a href="admin.php">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

<div class="container">
<div class="row">
    <div class="col-sm-2" >
    </div>
    <div class="col-md-8" id="bor" >
  <h2>Admin</h2>
  <hr/>
  <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Username:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" id="admin" placeholder="Enter username" name="admin">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-3">
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
      </div>

    </div>
    <div class="col-sm-5">
    <?php
    if(@$_SESSION['err']==true)
    {
    echo "<font color='#f2f2f2'><sup>*</sup>Invalid username or password";
    $_SESSION['err']="";
    }
    ?>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-6">
        <button type="submit" class="btn btn-default" onclick="showHint()">Submit</button>
      </div>
    </div>
    <hr/>
  </form>
  </div>
  <div class="col-sm-2">
    </div>
  </div>
</div>
<hr>
</body>
</html>
