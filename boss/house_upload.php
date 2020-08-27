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

			$house_name=$_POST['house_name'];
			$description=$_POST['description'];
			$meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
		    $slug=$_POST['slug'];
			
			//single image 
			//----------------------
			$single_image = createImage('frontimg', "../house/");			
				
			// end of single image
			//-------------------------
		
			
		$con->insertdb("INSERT INTO `tbl_house` (
							`house_name` ,
							`description` ,
							`house_image`,
							`meta_tag_title`,
							`meta_tag_description`,
							`meta_tag_keywords`,
							
							`slug`
							
							)
							VALUES (
							'".$house_name."','".$description."',  '".$single_image."', '".$meta_tag_title."', '".$meta_tag_description."', '".$meta_tag_keywords."', '".$slug."');");
					
			
			header("location:houseView.php");
			}
	   
	   
	   
	    if(isset($_POST['updateProduct']))
	    {
	   
			
			$house_id=$_POST['house_id'];
   			$house_name=$_POST['house_name'];
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
            
                $con->insertdb("UPDATE `tbl_house` SET house_name='".$house_name."',description='".$description."',house_image='".$frontimg2."',meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."'  where house_id='".$house_id."'");
            }
            else
            {
            
                @unlink("../house/big_img/". $frontimg2);
                @unlink("../house/". $frontimg2);
                $single_image = createImage('frontimg',"../house/");

                $con->insertdb("UPDATE `tbl_house` SET house_name='".$house_name."',description='".$description."',house_image='".$single_image."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where house_id='".$house_id."'");
            }

			
			
			header("location:houseView.php?page=$page");
			
			
	   }
	
	

if(isset($_GET["ProImage"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_house where house_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../house/'.$row[4]);
	  unlink('../house/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_house set house_image='' where house_id = '".$id."'");
	header("location: house_up.php?house_id=".$id."&page=".$page);


}	
if(isset($_GET["PDF"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_house where house_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  @unlink('../house_pdf/'.$row[6]);

	}
	$con->selectdb("update tbl_house set pdf_file='' where house_id = '".$id."'");
	header("location: house_up.php?house_id=".$id."&page=".$page);


}	


?>