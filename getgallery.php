<?
session_start();
include_once("connect.php");
$cn=new connect(); 
$cn->connectdb();
				
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 1;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;

$cat_id = $_GET['cat_id'];

$sql1 = $cn->selectdb("select * from tbl_gallery where cat_id like  '%".$cat_id.",%'   order by recordListingID ASC LIMIT $limit OFFSET $offset");

if ($cn->numRows($sql1) > 0) 
{
    while($row = $cn->fetchAssoc($sql1))
    {
        extract($row);
        if($multi_images != "")
        {
            $imgs=explode(",",$multi_images);
            for($i=0;$i<count($imgs)-1;$i++)
            {
                $src="galleryF/big_img/". $imgs[$i];
?>
<div class="col-lg-4 col-md-6">
    <div class="gallery-item">
        <img class="gallery_cat_img" alt="<?echo $gallery_name ?>" src="<?echo $src?>" />
        <div class="gallery-desc">
            <a class="image-popup example-image-link" data-lightbox="example-set" class="" href="<?echo $src?>">
                <i class="fa fa-search"></i>
            </a>
        </div>
    </div>
</div>

<!-- Portfolio Item End -->

<?
            }
        }
?>



<?
    }
}
else{
    //echo "<script>window.open('Products/".$cid."/1/','_SELF');</script>";
}
					
?>