<?php
include_once("../connect.php");
include_once("image_lib_rname.php"); 

$con=new connect();
$con->connectdb();

 
 
	  
  $parseurl=parse_url($_SERVER['HTTP_REFERER']);
  //echo "<br/>";
 // echo $parseurl['path'];die;

	  if(isset($_POST['updateCategory']))
	  {
	  			$cat_id=$_POST['cat_id'];
				$cat_name=$_POST['cat_name'];
				$page = $_POST['page'];
				$meta_tag_title=$_POST['meta_tag_title'];
				$meta_tag_description=$_POST['meta_tag_description'];
				$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
				$description = $_POST['description'];

                
				$slug=$_POST['slug'];
				
				  
				$frontimg1=$_POST['frontimg1'];
				$frontimg2=$_POST['frontimg2'];
				//if($frontimg2
				
				// single image
			if($_FILES["frontimg"]['error'] > 0)// it means no new image selected insert previous one......
				{
				
				$con->insertdb("UPDATE `tbl_category` SET cat_description='".$description."', cat_name='".$cat_name."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where cat_id=".$cat_id."");
				}
				else
				{
				
				@unlink("../category/big_img/". $frontimg2);
			    @unlink("../category/". $frontimg2);
				$catImage = createImage('frontimg',"../category/");

				$con->insertdb("UPDATE `tbl_category` SET cat_description='".$description."', cat_name='".$cat_name."',cat_image='".$catImage."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where cat_id=".$cat_id."");
				}

			// end of image
			
			
			
			//------------------------
			//multiple images
			//------------------------
			
			$size_sum = array_sum($_FILES['image_title']['size']);
			if ($size_sum > 0) 
			{
			 // at least one file has been uploaded
				
				$images_name = createMultiImage('image_title', "../categoryF/");	
				$records=$con->selectdb("select * from tbl_category where cat_id='".$cat_id."'");
				 $row=mysqli_fetch_row($records);
				//echo $row[2]."<br>";
				//echo $images; die;
			 	$final= $row[5].$images_name;
					

				$con->insertdb(
				"UPDATE `tbl_category` SET cat_description='".$description."', cat_name='".$cat_name."',multi_images='".$final."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where cat_id=".$cat_id.""
				);
					
				}
				else
				{
				$con->insertdb(
				"UPDATE `tbl_category` SET cat_description='".$description."', cat_name='".$cat_name."',multi_images='".$frontimg1."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where cat_id=".$cat_id.""
				);
			    }

			//-----------------				
			//end of multiple images
			//--------------------
				
				
	         header("location: categoryview.php?page=$page");

	  }
	  
	  if(isset($_POST['addMagazine']))
	  {
	     // print_r($_POST);

			$magazine_name=$_POST['magazine_name'];
			$description=$_POST['description'];
			$meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
		    $slug=$_POST['slug'];
			
			$date=$_POST['date'];
			$month=$_POST['month'];
			$year=$_POST['year'];  
			$magazine_video=$_POST['magazine_video'];  
			$magazine_map=$_POST['magazine_map'];  
			//single image 
			//----------------------
			$single_image = createImage('frontimg', "../magazine/");			
				
			// end of single image
			//-------------------------
			
			//-----------------------------
			//pdf
			//-----------------------------
			
			$pdf_file = createPDF('download_file', "../download_pdf/");			
			//--------------------		
			//end of pdf
			//--------------------

			//-------------------
			// Multiple images
			//-------------------
			$images_name = createMultiImage('image_title', "../magazineF/");			
			
			//-------------------
			// end of Multiple images
			//-------------------
			
	
		$catID = '';
		//get multiple value of radio (multiple categories)
		foreach ($_POST['mulradio'] as $attributeKey => $attributes){
	   	// echo $attributeKey.' '.$_POST['mulradio'][$attributeKey].'<br>';
			$catID.= $_POST['mulradio'][$attributeKey].",";
		} //foreach
		$RES = $con->insertdb("INSERT INTO `tbl_magazine` (
							`magazine_name` ,
							`description` ,
							`cat_id`,
							`magazine_image`,
							`pdf_file`,
							`meta_tag_title`,
							`meta_tag_description`,
							`meta_tag_keywords`,
							`multi_images`,
							`slug`,
							`date`,
							`month`,
							`year`,
							`magazine_video`,
							`magazine_map`
							)
							VALUES (
							'".$magazine_name."',
							'".$description."',  
							'".$catID."', 
							'".$single_image."', 
							'".$pdf_file."', 
							'".$meta_tag_title."', 
							'".$meta_tag_description."', 
							'".$meta_tag_keywords."', 
							'".$images_name."', 
							'".$slug."', 
							'".$date."', 
							'".$month."', 
							'".$year."', 
							'".$magazine_video."', 
							'".$magazine_map."'
							);");
					
			header("location:magazineView.php");
			}
	   
	   
	   if(isset($_POST['addCategory']))
	  	{
	  
	   
	   		$cat_parent_id=$_POST['cat_parent_id'];
			$page = $_POST['page'];
			$description = $_POST['description'];
			$cat_name=$_POST['cat_name'];
			$meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
			
			$slug=$_POST['slug'];
			
			//single image 
			//----------------------
			$catImage = createImage('frontimg', "../category/");			
				
			// end of single image
			//-------------------------
			
			//-------------------
			// Multiple images
			//-------------------
			$images_name = createMultiImage('image_title', "../categoryF/");			
			
			//-------------------
			// end of Multiple images
			//-------------------
			
			
			$con->insertdb("insert into tbl_category(cat_parent_id,cat_description,cat_name,cat_image,multi_images,meta_tag_title, meta_tag_description, meta_tag_keywords,slug) 
			values(".$cat_parent_id.",'".$description."','".$cat_name."','".$catImage."','".$images_name."', '".$meta_tag_title."', '".$meta_tag_description."', '".$meta_tag_keywords."', '".$slug."')");
			header("location: categoryview.php?page=$page");
		}
	   
	   
	    if(isset($_POST['updateMagazine']))
	  	{
	   
			$catID ='';
			$magazine_id=$_POST['magazine_id'];
   			$magazine_name=$_POST['magazine_name'];
			$slug=$_POST['slug'];
			
			$date=$_POST['date'];
			$month=$_POST['month'];
			$year=$_POST['year'];
			$description=$_POST['description'];
			$page = $_POST['page'];
			$meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];		
			$magazine_video=$_POST['magazine_video'];  
			$magazine_map=$_POST['magazine_map'];  			  		
			//$cat_id=$_POST['cat_id'];
			
			//get multiple value of radio (multiple categories)
			foreach ($_POST['mulradio'] as $attributeKey => $attributes){
		   //echo $attributeKey.' '.$_POST['mulradio'][$attributeKey].'<br>';
			
				$catID.= $_POST['mulradio'][$attributeKey].",";
			} //foreach
			
			$frontimg2=$_POST['frontimg2'];
		    $frontimg1=$_POST['frontimg1'];
		    $frontimgpdf2=$_POST['frontimgpdf2'];
	
			// single image
			if($_FILES["frontimg"]['error'] > 0)// it means no new image selected insert previous one......
				{
				
					$con->insertdb("UPDATE `tbl_magazine` SET magazine_name='".$magazine_name."',description='".$description."',cat_id='".$catID."',magazine_image='".$frontimg2."',multi_images='".$frontimg1."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."',date='".$date."',month='".$month."',year='".$year."'  where magazine_id='".$magazine_id."'");
				}
				else
				{
				
				@unlink("../magazine/big_img/". $frontimg2);
			    @unlink("../magazine/". $frontimg2);
				$single_image = createImage('frontimg',"../magazine/");

				$con->insertdb("UPDATE `tbl_magazine` SET magazine_name='".$magazine_name."',description='".$description."',cat_id='".$catID."',magazine_image='".$single_image."',multi_images='".$frontimg1."' ,meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."',date='".$date."',month='".$month."',year='".$year."'  where magazine_id='".$magazine_id."'");
				}

			// end of image
			
			// ------------------------
			// pdf
			// ------------------------
			
			if($_FILES["download_file"]["name"]!="")
			{
			
			
				@unlink("../download_pdf/". $frontimgpdf2);

				$pdf_file = createPDF('download_file',"../download_pdf/");

				$con->insertdb("UPDATE `tbl_magazine` SET pdf_file='".$pdf_file."' where magazine_id='".$magazine_id."'");
			}

			 		
			// -----------------				
			// end of pdf
			// --------------------
			
			 		
			//-----------------				
			//multi pdf
			//--------------------
						
			// $size_sum_pdf = array_sum($_FILES['download_file']['size']);
			// echo "size sum pdf => ".$size_sum_pdf;
			// echo "hey im here";
			// if ($size_sum_pdf > 0) 
			// // if($_FILES["download_file"]["name"]=="")
			// {
			// 	echo "hey im here";
			// 	$pdf_file = createMultiPDF('download_file', "../download_pdf/");
			// 	$records=$con->selectdb("select * from tbl_magazine where magazine_id='".$magazine_id."'");
			// 	$row=mysqli_fetch_row($records);
			// 	//echo $row[2]."<br>";
			// 	//echo $images; die;
			// 	$final= $row[7].$pdf_file;
				
				
			// 	$con->insertdb("UPDATE `tbl_magazine` SET magazine_name='".$magazine_name."',description='".$description."',cat_id='".$catID."', pdf_file='".$final."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."'  where magazine_id='".$magazine_id."'");
			// }
			// else
			// {
			// 	$con->insertdb("UPDATE `tbl_magazine` SET magazine_name='".$magazine_name."',description='".$description."',cat_id='".$catID."',pdf_file='".$frontimgpdf2."' ,meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where magazine_id='".$magazine_id."'");
			// }

			 		
			 		
			//-----------------				
			//end of multi pdf
			//--------------------
			
			
			//------------------------
			//multiple images
			//------------------------
			
			$size_sum = array_sum($_FILES['image_title']['size']);
			if ($size_sum > 0) 
			{
			 // at least one file has been uploaded
				
				$images_name = createMultiImage('image_title', "../magazineF/");	
				$records=$con->selectdb("select * from tbl_magazine where magazine_id='".$magazine_id."'");
				 $row=mysqli_fetch_row($records);
				//echo $row[2]."<br>";
				//echo $images; die;
			 	$final= $row[11].$images_name;
					

				$con->insertdb("UPDATE `tbl_magazine` SET magazine_name='".$magazine_name."',description='".$description."',cat_id='".$catID."',multi_images='".$final."' ,meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' ,date='".$date."',month='".$month."',year='".$year."' where magazine_id='".$magazine_id."'");
					
				}
				else
				{
				$con->insertdb("UPDATE `tbl_magazine` SET magazine_name='".$magazine_name."',description='".$description."',cat_id='".$catID."',multi_images='".$frontimg1."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."'  ,date='".$date."',month='".$month."',year='".$year."' where magazine_id='".$magazine_id."'");	
			    }

			//-----------------				
			//end of multiple images
			//--------------------
			
			header("location:magazineView.php?page=$page");
			
			
	   	}
	
if(isset($_GET["Image"]))
{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_category where cat_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../category/'.$row[4]);
	  unlink('../category/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_category set cat_image='' where cat_id = '".$id."'");
	header("location: category_up.php?category_id=".$id."&page=".$page);



}	

if(isset($_GET["ProImage"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_magazine where magazine_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../magazine/'.$row[4]);
	  unlink('../magazine/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_magazine set magazine_image='' where magazine_id = '".$id."'");
	header("location: magazine_up.php?magazine_id=".$id."&page=".$page);


}	

//multiple images Delete Category	
 if(isset($_REQUEST["btnDeleteImages2"]))
{
	$cat_id = $_POST['cat_id'];
	$page = $_POST['page'];

	$image = $_POST['frontimg1'];
	$image_list = explode(',',$image);
	$new_image_list = '';
	
	if(isset($_REQUEST["imageEdit"]))
	{
		foreach($_REQUEST['imageEdit'] as $row)
		{
			 $image = str_replace($row.',' , '' ,$image);
			 @unlink('../categoryF/big_img/'.$row);
			 @unlink('../categoryF/'.$row);
		}
		
		$con->selectdb("update tbl_category set multi_images='".$image."' where cat_id = '".$cat_id."'");
		header("location: category_up.php?category_id=".$cat_id."&page=".$page);
	}
	else
	{
		echo 'No Image selected';
	}
		
} 


//multiple image delete Magazine..
 if(isset($_REQUEST["btnDeleteImages"]))
{
	$magazine_id = $_POST['magazine_id'];
	$page = $_POST['page'];

	$image = $_POST['frontimg1'];
	$image_list = explode(',',$image);
	$new_image_list = '';
	
	if(isset($_REQUEST["imageEdit"]))
	{
		foreach($_REQUEST['imageEdit'] as $row)
		{
			 $image = str_replace($row.',' , '' ,$image);
			 @unlink('../magazineF/big_img/'.$row);
			 @unlink('../magazineF/'.$row);
		}
		
		$con->selectdb("update tbl_magazine set multi_images='".$image."' where magazine_id = '".$magazine_id."'");
		header("location: magazine_up.php?magazine_id=".$magazine_id."&page=".$page);
	}
	else
	{
		echo 'No Image selected';
	}
		
}

//multiple pdf delete Magazine..
 if(isset($_REQUEST["btnDeletepdfs"]))
{
	$magazine_id = $_POST['magazine_id'];
	$page = $_POST['page'];

	$pdf = $_POST['frontpdf'];
	$pdf_list = explode(',',$pdf);
	$new_pdf_list = '';
	
	if(isset($_REQUEST["pdfEdit"]))
	{
		foreach($_REQUEST['pdfEdit'] as $row)
		{
			 $pdf = str_replace($row.',' , '' ,$pdf);
			 @unlink('../download_pdf/'.$row);
		}
		
		$con->selectdb("update tbl_magazine set pdf_file='".$pdf."' where magazine_id = '".$magazine_id."'");
		header("location: magazine_up.php?magazine_id=".$magazine_id."&page=".$page);
	}
	else
	{
		echo 'No pdf selected';
	}
		
}
if(isset($_GET["PDF"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_magazine where magazine_id=".$id."");
	while($row=mysqli_fetch_array($records))
	{
	  @unlink('../download_pdf/'.$row['pdf_file']);

	}
	$con->selectdb("update tbl_magazine set pdf_file='' where magazine_id = '".$id."'");
	header("location: magazine_up.php?magazine_id=".$id."&page=".$page);


}	


?>