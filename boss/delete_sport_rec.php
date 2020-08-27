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
	//mysql_query("delete from tbl_sport_features where sport_id=$id");
	
	// second product table 
	$sql=  $cn->selectdb("select * from tbl_sport where sport_id=$id");
	while($row = mysqli_fetch_row($sql))
	{
		//image
		@unlink('../sport/big_img/'.$row[4]);
		@unlink('../sport/'.$row[4]);
		//end of image
		
		
		
	}

	$cn->selectdb("delete from tbl_sport where sport_id=$id");

	//$cn->Deletedata($tablename,$primarykey,$id);
	header("location: sportView.php?page=$page");


?>
