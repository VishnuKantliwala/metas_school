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
	//mysql_query("delete from tbl_tour_features where tour_id=$id");
	
	// second product table 
	$sql=  $cn->selectdb("select * from tbl_tour where tour_id=$id");
	while($row = mysqli_fetch_array($sql))
	{
		//image
		@unlink('../tour/big_img/'.$row[4]);
		@unlink('../tour/'.$row[4]);
        //end of image
        
        //multiple images
		$image_list = explode(',',$row['multi_images']);

		foreach($image_list as $rowF)
		{
			//print_r($image_list);die;
			$new_image_list = '';
			@unlink('../tourF/big_img/'.$rowF);
			@unlink('../tourF/'.$rowF);
		}
		
		
		
		
		
		
	}

	$cn->selectdb("delete from tbl_tour where tour_id=$id");

	header("location: tourView.php?page=$page");


?>
