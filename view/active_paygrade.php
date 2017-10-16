<?php
include_once('src/config.php');
include ("src/Database.php");
$db=new Database();
$id=$_GET['id'];

if(isset($_GET['id'])){
	$id=$_GET['id'];
	//echo $id;
	//$query="UPDATE FROM paygrades WHERE id='$id'";
	$query = "UPDATE paygrades SET status= '0' WHERE id='$id'";
	$active_paygrades =$db->active($query);
	
	//header('location:current_paygrade.php');
	
}