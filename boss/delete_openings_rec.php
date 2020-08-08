<?php
include_once("../connect.php");
$cn=new connect();
$cn->connectdb();
$tablename=$_GET['tablename'];
$primarykey=$_GET['primarykey'];
$id=$_GET['id'];

$page = $_GET['page'];
	// second openings table 
	$sql=  $cn->selectdb("select * from tbl_openings where openings_id=$id");
	
	// while($row = $cn->fetchAssoc($sql))
	// {
	// 	//image
	// 	@unlink('../openings/big_img/'.$row['image_name']);
	// 	@unlink('../openings/'.$row['image_name']);
	// 	//end of image
		
	// 	//multiple images
	// 	$image_list = explode(',',$row['multi_images']);

	// 	foreach($image_list as $rowF)
	// 	{
	// 		//print_r($image_list);die;
	// 		$new_image_list = '';
	// 		@unlink('../openingsF/big_img/'.$rowF);
	// 		@unlink('../openingsF/'.$rowF);
	// 	}
		
		
		
	// }

	$cn->selectdb("delete from tbl_openings where openings_id=$id");

	//$cn->Deletedata($tablename,$primarykey,$id);
	header("location: openingsView.php?page=$page");

?>
