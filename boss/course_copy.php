
<?
	include("../connect.php");
	$cn=new connect();
    $cn->connectdb();
    $id=$_GET['id'];
    
	$query = "SELECT 
    `course_id`, 
    `course_name`, 
    `description`, 
    `meta_tag_title`, 
    `meta_tag_description`, 
    `meta_tag_keywords`, 
    `slug` 
    FROM `tbl_course` WHERE course_id =$id";

	$result = $cn->selectdb($query);
    $data = mysqli_fetch_assoc($result);
    extract($data);
    
	$query = "INSERT INTO `tbl_course`(
        `course_name`, 
        `description`, 
        `meta_tag_title`, 
        `meta_tag_description`, 
        `meta_tag_keywords`, 
        `slug`) 
        VALUES (
            '$course_name',
            '$description',
            '$meta_tag_title',
            '$meta_tag_description',
            '$meta_tag_keywords',
            '$slug')
            ";
	$cn->selectdb($query);

	$last_id = mysqli_insert_id($cn->getConnection());
	$sql=$cn->selectdb("select * from `tbl_course` where course_id=".$last_id);
	$row = mysqli_fetch_assoc($sql);
	// echo "<script>alert('".$last_id."');</script>";
	$cn->selectdb("update tbl_course set `course_name`='".$row['course_name']." (copy)' where course_id=".$last_id);
	
	header('Location:courseView.php');
?>