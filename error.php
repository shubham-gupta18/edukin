<?php
session_start();
$_SESSION['err']=true;
header("location:admin.php");
?>