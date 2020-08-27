
<?
	include("../connect.php");
	$cn=new connect();
$cn->connectdb();
	$id=$_GET['id'];

	$query = "SELECT * FROM `tbl_house` WHERE house_id =$id";

	$result = $cn->selectdb($query);
    $data = mysqli_fetch_assoc($result);
    extract($data);
	
	$query = "INSERT INTO `tbl_house`(
		`house_name`, 
		`description`, 
		`house_image`, 
		`recordListingID`, 
		`meta_tag_title`, 
		`meta_tag_description`, 
		`meta_tag_keywords`, 
		`slug`) 
        VALUES (
            '$house_name',
            '$description',
            '',
            0,
            '$meta_tag_title',
            '$meta_tag_description',
            '$meta_tag_keywords',
            '$slug')";
	$cn->selectdb($query);

	$last_id = mysqli_insert_id($cn->getConnection());
	$sql=$cn->selectdb("SELECT * FROM `tbl_house` where house_id=".$last_id);
	$row = mysqli_fetch_assoc($sql);
	//echo "<script>alert('".$last_id."');</script>";
	$cn->selectdb("update tbl_house set `house_name`='".$row['house_name']." (copy)' where house_id=".$last_id);
	
	header('Location:houseView.php');
?>