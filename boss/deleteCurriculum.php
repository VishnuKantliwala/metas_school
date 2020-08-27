<?php
include_once("../connect.php");
$cn=new connect();
$cn->connectdb();


if($_GET['Del']== 'del')
{
$id=  $_GET['id'];
$page= $_GET['page'];

	$sql=mysqli_query($cn->getConnection(),"select * from tbl_curriculum where curriculum_id=$id");
	while($row = mysqli_fetch_array($sql))
	{
		unlink("../download_pdf/". $row['pdf_file']);	
		
			
	}
	mysqli_query($cn->getConnection(),"delete from tbl_curriculum where curriculum_id=$id");
	//$cn->Deletedata($tablename,$primarykey,$id);
	header("location:curriculumView.php?page=$page");	
}

?>
