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

			$sport_name=$_POST['sport_name'];
			$description=$_POST['description'];
			$meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
		    $slug=$_POST['slug'];
			
			//single image 
			//----------------------
			$single_image = createImage('frontimg', "../sport/");			
				
			// end of single image
			//-------------------------
		
			
		$con->insertdb("INSERT INTO `tbl_sport` (
							`sport_name` ,
							`description` ,
							`sport_image`,
							`meta_tag_title`,
							`meta_tag_description`,
							`meta_tag_keywords`,
							
							`slug`
							
							)
							VALUES (
							'".$sport_name."','".$description."',  '".$single_image."', '".$meta_tag_title."', '".$meta_tag_description."', '".$meta_tag_keywords."', '".$slug."');");
					
			
			header("location:sportView.php");
			}
	   
	   
	   
	    if(isset($_POST['updateProduct']))
	    {
	   
			
			$sport_id=$_POST['sport_id'];
   			$sport_name=$_POST['sport_name'];
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
            
                $con->insertdb("UPDATE `tbl_sport` SET sport_name='".$sport_name."',description='".$description."',sport_image='".$frontimg2."',meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."'  where sport_id='".$sport_id."'");
            }
            else
            {
            
                @unlink("../sport/big_img/". $frontimg2);
                @unlink("../sport/". $frontimg2);
                $single_image = createImage('frontimg',"../sport/");

                $con->insertdb("UPDATE `tbl_sport` SET sport_name='".$sport_name."',description='".$description."',sport_image='".$single_image."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where sport_id='".$sport_id."'");
            }

			
			
			header("location:sportView.php?page=$page");
			
			
	   }
	
	

if(isset($_GET["ProImage"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_sport where sport_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../sport/'.$row[4]);
	  unlink('../sport/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_sport set sport_image='' where sport_id = '".$id."'");
	header("location: sport_up.php?sport_id=".$id."&page=".$page);


}	
if(isset($_GET["PDF"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_sport where sport_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  @unlink('../sport_pdf/'.$row[6]);

	}
	$con->selectdb("update tbl_sport set pdf_file='' where sport_id = '".$id."'");
	header("location: sport_up.php?sport_id=".$id."&page=".$page);


}	


?>