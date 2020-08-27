<?php
include_once("../connect.php");
include_once("image_lib_rname.php"); 

$con=new connect();
$con->connectdb();
$link_url="../".$con->setdomain();
 date_default_timezone_set("Asia/Kolkata");
 
	  
  $parseurl=parse_url($_SERVER['HTTP_REFERER']);
  //echo "<br/>";
 // echo $parseurl['path'];die;

	  
	  if(isset($_POST['addProduct']))
	  {
	     // print_r($_POST);

			$course_name=$_POST['course_name'];
			$description=$_POST['description'];
			$meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
		    $slug=$_POST['slug'];
		    $course_video=$_POST['course_video'];
			// $tags=$_POST['tags'];
			
			//single image 
			//----------------------
			$single_image = createImage('frontimg', "../course/");			
				
			// end of single image
			//-------------------------
			
			
			//----------------------------
			//display on home page or not
			if (isset($_POST['home_page'])) {
				$home_page=1;
			}
			else
			{
				$home_page=0;
			}
	
		
		$con->insertdb("INSERT INTO `tbl_course` (
							`course_name` ,
							`description` ,
							`course_image`,
							`meta_tag_title`,
							`meta_tag_description`,
							`meta_tag_keywords`,
							`multi_images`,
							`slug`
							
							)
							VALUES (
							'".$course_name."',
							'".$description."', 
							'".$single_image."',
							'".$meta_tag_title."', 
							'".$meta_tag_description."', 
							'".$meta_tag_keywords."', 
							'".$images_name."',
							'".$slug."');");
							$to="";
							
							
							
							
			header("location:courseView.php");
			}
	   
	   
	   
	   
	    if(isset($_POST['updateProduct']))
	  {
	   
			$catID ='';
			$course_id=$_POST['course_id'];
   			$course_name=$_POST['course_name'];
			$slug=$_POST['slug'];
			$description=$_POST['description'];
			$page = $_POST['page'];
			$meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
			
			
			$frontimg2=$_POST['frontimg2'];
			$frontimg1=$_POST['frontimg1'];
	
			// single image
			if($_FILES["frontimg"]['error'] > 0)// it means no new image selected insert previous one......
				{
				
					$con->insertdb("UPDATE `tbl_course` SET course_name='".$course_name."',description='".$description."',course_image='".$frontimg2."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."'  where course_id='".$course_id."'");
				}
				else
				{
				
				@unlink("../course/big_img/". $frontimg2);
			    @unlink("../course/". $frontimg2);
				$single_image = createImage('frontimg',"../course/");

				$con->insertdb("UPDATE `tbl_course` SET course_name='".$course_name."',description='".$description."',course_image='".$single_image."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where course_id='".$course_id."'");
				}

			// end of image
			
			//------------------------
			//pdf
			//------------------------
			
			
			
			header("location:courseView.php?page=$page");
			
			
	   }
	
if(isset($_GET["Image"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_coursecategory where cat_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../coursecategory/'.$row[4]);
	  unlink('../coursecategory/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_coursecategory set cat_image='' where cat_id = '".$id."'");
	header("location: coursecategory_up.php?category_id=".$id."&page=".$page);



}	

if(isset($_GET["ProImage"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_course where course_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../course/'.$row[4]);
	  unlink('../course/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_course set course_image='' where course_id = '".$id."'");
	header("location: course_up.php?course_id=".$id."&page=".$page);


}	

//multiple images	
 if(isset($_REQUEST["btnDeleteImages"]))
{
	$course_id = $_POST['course_id'];
	$page = $_POST['page'];

	$image = $_POST['frontimg1'];
	$image_list = explode(',',$image);
	$new_image_list = '';
	
	if(isset($_REQUEST["imageEdit"]))
	{
		foreach($_REQUEST['imageEdit'] as $row)
		{
			 $image = str_replace($row.',' , '' ,$image);
			 @unlink('../courseF/big_img/'.$row);
			 @unlink('../courseF/'.$row);
		}
		echo $image;
		$con->selectdb("update tbl_course set multi_images='".$image."' where course_id = '".$course_id."'");
		header("location: course_up.php?course_id=".$course_id."&page=".$page);
	}
	else
	{
		echo 'No Image selected';
	}
		
} 


if(isset($_GET["btnDeletepdf"]))
	{
		//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_course where course_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
		unlink('../download_pdf/'.$row[8]);
	}
	$con->selectdb("update tbl_course set pdf_file='' where course_id = '".$id."'");
	header("location: course_up.php?course_id=".$id."&page=".$page);
}	
?>