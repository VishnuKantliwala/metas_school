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
	//mysql_query("delete from tbl_band_features where band_id=$id");
	
	// second product table 
	$sql=  $cn->selectdb("select * from tbl_band where band_id=$id");
	while($row = mysqli_fetch_array($sql))
	{
		//image
		@unlink('../band/big_img/'.$row[4]);
		@unlink('../band/'.$row[4]);
        //end of image
        
        //multiple images
		$image_list = explode(',',$row['multi_images']);

		foreach($image_list as $rowF)
		{
			//print_r($image_list);die;
			$new_image_list = '';
			@unlink('../bandF/big_img/'.$rowF);
			@unlink('../bandF/'.$rowF);
		}
		
		
		
		
		
		
	}

	$cn->selectdb("delete from tbl_band where band_id=$id");

	header("location: bandView.php?page=$page");


?>
