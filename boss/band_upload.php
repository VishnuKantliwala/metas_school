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

			$band_name=$_POST['band_name'];
			$description=$_POST['description'];
			$meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
		    $slug=$_POST['slug'];
			
			//single image 
			//----------------------
			$single_image = createImage('frontimg', "../band/");			
				
			// end of single image
            //-------------------------
            
            //-------------------
			// Multiple images
			//-------------------
			$images_name = createMultiImage('image_title', "../bandF/");			
			
			//-------------------
			// end of Multiple images
			//-------------------
		
			
		$con->insertdb("INSERT INTO `tbl_band` (
							`band_name` ,
							`description` ,
							`band_image`,
							`meta_tag_title`,
							`meta_tag_description`,
							`meta_tag_keywords`,
							
							`slug`,
                            `multi_images`
							
							)
							VALUES (
							'".$band_name."','".$description."',  '".$single_image."', '".$meta_tag_title."', '".$meta_tag_description."', '".$meta_tag_keywords."', '".$slug."', '".$images_name."');");
					
			
			header("location:bandView.php");
			}
	   
	   
	   
	    if(isset($_POST['updateProduct']))
	    {
	   
			
			$band_id=$_POST['band_id'];
   			$band_name=$_POST['band_name'];
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
            
                $con->insertdb("UPDATE `tbl_band` SET band_name='".$band_name."',description='".$description."',band_image='".$frontimg2."',meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."'  where band_id='".$band_id."'");
            }
            else
            {
            
                @unlink("../band/big_img/". $frontimg2);
                @unlink("../band/". $frontimg2);
                $single_image = createImage('frontimg',"../band/");

                $con->insertdb("UPDATE `tbl_band` SET band_name='".$band_name."',description='".$description."',band_image='".$single_image."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where band_id='".$band_id."'");
            }

            $size_sum = array_sum($_FILES['image_title']['size']);
			if ($size_sum > 0) 
			{
			 // at least one file has been uploaded
				
				$images_name = createMultiImage('image_title', "../bandF/");	
				$records=$con->selectdb("select * from tbl_band where band_id='".$band_id."'");
				$row=mysqli_fetch_assoc($records);
                $final= $row['multi_images'].$images_name;
                
                $con->insertdb("UPDATE `tbl_band` SET multi_images = '".$final."' where band_id='".$band_id."'");


            }


			
			
			header("location:bandView.php?page=$page");
			
			
	   }
	
	

if(isset($_GET["ProImage"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_band where band_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../band/'.$row[4]);
	  unlink('../band/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_band set band_image='' where band_id = '".$id."'");
	header("location: band_up.php?band_id=".$id."&page=".$page);


}	
if(isset($_GET["PDF"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_band where band_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  @unlink('../band_pdf/'.$row[6]);

	}
	$con->selectdb("update tbl_band set pdf_file='' where band_id = '".$id."'");
	header("location: band_up.php?band_id=".$id."&page=".$page);


}	

//multiple images	
if(isset($_REQUEST["btnDeleteImages"]))
{
	$band_id = $_POST['band_id'];
	$page = $_POST['page'];

	$image = $_POST['frontimg1'];
	$image_list = explode(',',$image);
	$new_image_list = '';
	
	if(isset($_REQUEST["imageEdit"]))
	{
		foreach($_REQUEST['imageEdit'] as $row)
		{
			 $image = str_replace($row.',' , '' ,$image);
			 @unlink('../bandF/big_img/'.$row);
			 @unlink('../bandF/'.$row);
		}
		
		$con->selectdb("update tbl_band set multi_images='".$image."' where band_id = '".$band_id."'");
		header("location: band_up.php?band_id=".$band_id."&page=".$page);
	}
	else
	{
		echo 'No Image selected';
	}
		
} 
?>