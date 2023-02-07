<?php
	$id=$_GET['ID'];
	include('connA111.php');
	mysqli_query($conn,"delete from `CDPR` where userid='$id'");
	header('location:officeA111.php');
?>