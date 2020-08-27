<?php
include_once("../connect.php");
$cn=new connect();
$cn->connectdb();
$tablename=$_GET['tablename'];
$primarykey=$_GET['primarykey'];
$id=$_GET['id'];

//$parseurl=parse_url($_SERVER['HTTP_REFERER']);
//echo $parseurl['path'];die;
$page = $_GET['page'];
	//first delete product features table
	//mysql_query("delete from tbl_house_features where house_id=$id");
	
	// second product table 
	$sql=  $cn->selectdb("select * from tbl_house where house_id=$id");
	while($row = mysqli_fetch_row($sql))
	{
		//image
		@unlink('../house/big_img/'.$row[4]);
		@unlink('../house/'.$row[4]);
		//end of image
		
		
		
		
		
		
	}

	$cn->selectdb("delete from tbl_house where house_id=$id");

	//$cn->Deletedata($tablename,$primarykey,$id);
	header("location: houseView.php?page=$page");


?>
