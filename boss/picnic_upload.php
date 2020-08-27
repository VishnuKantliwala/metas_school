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

			$picnic_name=$_POST['picnic_name'];
			$picnic_date=$_POST['picnic_date'];
			$description=$_POST['description'];
			$meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
		    $slug=$_POST['slug'];
			
			//single image 
			//----------------------
			$single_image = createImage('frontimg', "../picnic/");			
				
			// end of single image
            //-------------------------
            
            //-------------------
			// Multiple images
			//-------------------
			$images_name = createMultiImage('image_title', "../picnicF/");			
			
			//-------------------
			// end of Multiple images
			//-------------------
		
			
		$con->insertdb("INSERT INTO `tbl_picnic` (
							`picnic_name` ,
                            `picnic_date` ,
							`description` ,
							`picnic_image`,
							`meta_tag_title`,
							`meta_tag_description`,
							`meta_tag_keywords`,
							
							`slug`,
                            `multi_images`
							
							)
							VALUES (
							'".$picnic_name."','".$picnic_date."','".$description."',  '".$single_image."', '".$meta_tag_title."', '".$meta_tag_description."', '".$meta_tag_keywords."', '".$slug."', '".$images_name."');");
					
			
			header("location:picnicView.php");
			}
	   
	   
	   
	    if(isset($_POST['updateProduct']))
	    {
	   
			
			$picnic_id=$_POST['picnic_id'];
            $picnic_name=$_POST['picnic_name'];
            $picnic_date=$_POST['picnic_date'];
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
            
                $con->insertdb("UPDATE `tbl_picnic` SET picnic_name='".$picnic_name."',description='".$description."',picnic_image='".$frontimg2."',meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."', picnic_date='".$picnic_date."'  where picnic_id='".$picnic_id."'");
            }
            else
            {
            
                @unlink("../picnic/big_img/". $frontimg2);
                @unlink("../picnic/". $frontimg2);
                $single_image = createImage('frontimg',"../picnic/");

                $con->insertdb("UPDATE `tbl_picnic` SET picnic_name='".$picnic_name."',description='".$description."',picnic_image='".$single_image."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."', picnic_date='".$picnic_date."' where picnic_id='".$picnic_id."'");
            }

            $size_sum = array_sum($_FILES['image_title']['size']);
			if ($size_sum > 0) 
			{
			 // at least one file has been uploaded
				
				$images_name = createMultiImage('image_title', "../picnicF/");	
				$records=$con->selectdb("select * from tbl_picnic where picnic_id='".$picnic_id."'");
				$row=mysqli_fetch_assoc($records);
                $final= $row['multi_images'].$images_name;
                
                $con->insertdb("UPDATE `tbl_picnic` SET multi_images = '".$final."' where picnic_id='".$picnic_id."'");


            }


			
			
			header("location:picnicView.php?page=$page");
			
			
	   }
	
	

if(isset($_GET["ProImage"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_picnic where picnic_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../picnic/'.$row[4]);
	  unlink('../picnic/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_picnic set picnic_image='' where picnic_id = '".$id."'");
	header("location: picnic_up.php?picnic_id=".$id."&page=".$page);


}	
if(isset($_GET["PDF"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_picnic where picnic_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  @unlink('../picnic_pdf/'.$row[6]);

	}
	$con->selectdb("update tbl_picnic set pdf_file='' where picnic_id = '".$id."'");
	header("location: picnic_up.php?picnic_id=".$id."&page=".$page);


}	

//multiple images	
if(isset($_REQUEST["btnDeleteImages"]))
{
	$picnic_id = $_POST['picnic_id'];
	$page = $_POST['page'];

	$image = $_POST['frontimg1'];
	$image_list = explode(',',$image);
	$new_image_list = '';
	
	if(isset($_REQUEST["imageEdit"]))
	{
		foreach($_REQUEST['imageEdit'] as $row)
		{
			 $image = str_replace($row.',' , '' ,$image);
			 @unlink('../picnicF/big_img/'.$row);
			 @unlink('../picnicF/'.$row);
		}
		
		$con->selectdb("update tbl_picnic set multi_images='".$image."' where picnic_id = '".$picnic_id."'");
		header("location: picnic_up.php?picnic_id=".$picnic_id."&page=".$page);
	}
	else
	{
		echo 'No Image selected';
	}
		
} 
?>