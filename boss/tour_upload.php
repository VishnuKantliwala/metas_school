<?php
include_once("../connect.php");
include_once("image_lib_rname.php"); 

$con=new connect();
$con->connectdb();

 
 
	  
  $parseurl=parse_url($_SERVER['HTTP_REFERER']);
  //echo "<br/>";
 // echo $parseurl['path'];die;

	  
	  
	  if(isset($_POST['addProduct']))
	  {
	     // print_r($_POST);

			$tour_name=$_POST['tour_name'];
			$tour_venue=$_POST['tour_venue'];
			$tour_date=$_POST['tour_date'];
			$description=$_POST['description'];
			$meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
		    $slug=$_POST['slug'];
			
			//single image 
			//----------------------
			$single_image = createImage('frontimg', "../tour/");			
				
			// end of single image
            //-------------------------
            
            //-------------------
			// Multiple images
			//-------------------
			$images_name = createMultiImage('image_title', "../tourF/");			
			
			//-------------------
			// end of Multiple images
			//-------------------
		
			
		$con->insertdb("INSERT INTO `tbl_tour` (
							`tour_name` ,
                            `tour_date` ,
							`tour_venue` ,
							`description` ,
							`tour_image`,
							`meta_tag_title`,
							`meta_tag_description`,
							`meta_tag_keywords`,
							
							`slug`,
                            `multi_images`
							
							)
							VALUES (
							'".$tour_name."', '".$tour_date."', '".$tour_venue."', '".$description."',  '".$single_image."', '".$meta_tag_title."', '".$meta_tag_description."', '".$meta_tag_keywords."', '".$slug."', '".$images_name."');");
					
			
			header("location:tourView.php");
			}
	   
	   
	   
	    if(isset($_POST['updateProduct']))
	    {
	   
			
			$tour_id=$_POST['tour_id'];
            $tour_name=$_POST['tour_name'];
			$tour_venue=$_POST['tour_venue'];
            $tour_date=$_POST['tour_date'];
			$slug=$_POST['slug'];
			$description=$_POST['description'];
			$page = $_POST['page'];
			$meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
            
            
			$frontimg2=$_POST['frontimg2'];

		    
			// single image
			if($_FILES["frontimg"]['error'] > 0)// it means no new image selected insert previous one......
            {
            
                $con->insertdb("UPDATE `tbl_tour` SET tour_name='".$tour_name."', tour_venue='".$tour_venue."',description='".$description."',tour_image='".$frontimg2."',meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."', tour_date='".$tour_date."'  where tour_id='".$tour_id."'");
            }
            else
            {
            
                @unlink("../tour/big_img/". $frontimg2);
                @unlink("../tour/". $frontimg2);
                $single_image = createImage('frontimg',"../tour/");

                $con->insertdb("UPDATE `tbl_tour` SET tour_name='".$tour_name."', tour_venue='".$tour_venue."',description='".$description."',tour_image='".$single_image."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."', tour_date='".$tour_date."' where tour_id='".$tour_id."'");
            }

            $size_sum = array_sum($_FILES['image_title']['size']);
			if ($size_sum > 0) 
			{
			 // at least one file has been uploaded
				
				$images_name = createMultiImage('image_title', "../tourF/");	
				$records=$con->selectdb("select * from tbl_tour where tour_id='".$tour_id."'");
				$row=mysqli_fetch_assoc($records);
                $final= $row['multi_images'].$images_name;
                
                $con->insertdb("UPDATE `tbl_tour` SET multi_images = '".$final."' where tour_id='".$tour_id."'");


            }


			
			
			header("location:tourView.php?page=$page");
			
			
	   }
	
	

if(isset($_GET["ProImage"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_tour where tour_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../tour/'.$row[4]);
	  unlink('../tour/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_tour set tour_image='' where tour_id = '".$id."'");
	header("location: tour_up.php?tour_id=".$id."&page=".$page);


}	
if(isset($_GET["PDF"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_tour where tour_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  @unlink('../tour_pdf/'.$row[6]);

	}
	$con->selectdb("update tbl_tour set pdf_file='' where tour_id = '".$id."'");
	header("location: tour_up.php?tour_id=".$id."&page=".$page);


}	

//multiple images	
if(isset($_REQUEST["btnDeleteImages"]))
{
	$tour_id = $_POST['tour_id'];
	$page = $_POST['page'];

	$image = $_POST['frontimg1'];
	$image_list = explode(',',$image);
	$new_image_list = '';
	
	if(isset($_REQUEST["imageEdit"]))
	{
		foreach($_REQUEST['imageEdit'] as $row)
		{
			 $image = str_replace($row.',' , '' ,$image);
			 @unlink('../tourF/big_img/'.$row);
			 @unlink('../tourF/'.$row);
		}
		
		$con->selectdb("update tbl_tour set multi_images='".$image."' where tour_id = '".$tour_id."'");
		header("location: tour_up.php?tour_id=".$tour_id."&page=".$page);
	}
	else
	{
		echo 'No Image selected';
	}
		
} 
?>