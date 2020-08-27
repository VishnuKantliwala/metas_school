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

			$trip_name=$_POST['trip_name'];
			$description=$_POST['description'];
			$meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
		    $slug=$_POST['slug'];
			
			//single image 
			//----------------------
			$single_image = createImage('frontimg', "../trip/");			
				
			// end of single image
            //-------------------------
            
            //-------------------
			// Multiple images
			//-------------------
			$images_name = createMultiImage('image_title', "../tripF/");			
			
			//-------------------
			// end of Multiple images
			//-------------------
		
			
		$con->insertdb("INSERT INTO `tbl_trip` (
							`trip_name` ,
							`description` ,
							`trip_image`,
							`meta_tag_title`,
							`meta_tag_description`,
							`meta_tag_keywords`,
							
							`slug`,
                            `multi_images`
							
							)
							VALUES (
							'".$trip_name."','".$description."',  '".$single_image."', '".$meta_tag_title."', '".$meta_tag_description."', '".$meta_tag_keywords."', '".$slug."', '".$images_name."');");
					
			
			header("location:tripView.php");
			}
	   
	   
	   
	    if(isset($_POST['updateProduct']))
	    {
	   
			
			$trip_id=$_POST['trip_id'];
   			$trip_name=$_POST['trip_name'];
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
            
                $con->insertdb("UPDATE `tbl_trip` SET trip_name='".$trip_name."',description='".$description."',trip_image='".$frontimg2."',meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."'  where trip_id='".$trip_id."'");
            }
            else
            {
            
                @unlink("../trip/big_img/". $frontimg2);
                @unlink("../trip/". $frontimg2);
                $single_image = createImage('frontimg',"../trip/");

                $con->insertdb("UPDATE `tbl_trip` SET trip_name='".$trip_name."',description='".$description."',trip_image='".$single_image."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where trip_id='".$trip_id."'");
            }

            $size_sum = array_sum($_FILES['image_title']['size']);
			if ($size_sum > 0) 
			{
			 // at least one file has been uploaded
				
				$images_name = createMultiImage('image_title', "../tripF/");	
				$records=$con->selectdb("select * from tbl_trip where trip_id='".$trip_id."'");
				$row=mysqli_fetch_assoc($records);
                $final= $row['multi_images'].$images_name;
                
                $con->insertdb("UPDATE `tbl_trip` SET multi_images = '".$final."' where trip_id='".$trip_id."'");


            }


			
			
			header("location:tripView.php?page=$page");
			
			
	   }
	
	

if(isset($_GET["ProImage"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_trip where trip_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../trip/'.$row[4]);
	  unlink('../trip/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_trip set trip_image='' where trip_id = '".$id."'");
	header("location: trip_up.php?trip_id=".$id."&page=".$page);


}	
if(isset($_GET["PDF"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_trip where trip_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  @unlink('../trip_pdf/'.$row[6]);

	}
	$con->selectdb("update tbl_trip set pdf_file='' where trip_id = '".$id."'");
	header("location: trip_up.php?trip_id=".$id."&page=".$page);


}	

//multiple images	
if(isset($_REQUEST["btnDeleteImages"]))
{
	$trip_id = $_POST['trip_id'];
	$page = $_POST['page'];

	$image = $_POST['frontimg1'];
	$image_list = explode(',',$image);
	$new_image_list = '';
	
	if(isset($_REQUEST["imageEdit"]))
	{
		foreach($_REQUEST['imageEdit'] as $row)
		{
			 $image = str_replace($row.',' , '' ,$image);
			 @unlink('../tripF/big_img/'.$row);
			 @unlink('../tripF/'.$row);
		}
		
		$con->selectdb("update tbl_trip set multi_images='".$image."' where trip_id = '".$trip_id."'");
		header("location: trip_up.php?trip_id=".$trip_id."&page=".$page);
	}
	else
	{
		echo 'No Image selected';
	}
		
} 
?>