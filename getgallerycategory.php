<?
session_start();
include_once("connect.php");
$cn=new connect(); 
$cn->connectdb();
				
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 1;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;

$cat_id = $_GET['cat_id'];

$sql1 = $cn->selectdb("select * from tbl_gallery_category where cat_parent_id = ".$cat_id."   order by recordListingID DESC LIMIT $limit OFFSET $offset");

if ($cn->numRows($sql1) > 0) 
{
    while($row = $cn->fetchAssoc($sql1))
    {
        extract($row);

        $sqlHaveSubCat = $cn->selectdb('select cat_id from tbl_gallery_category where cat_parent_id ='.$cat_id);
        if( $cn->numRows($sqlHaveSubCat) > 0 )
        {
            $href = "photo-gallery/".urlencode($slug);    
        }
        else
        {
            $href = "gallery-detail/".urlencode($slug);
        }
        
        
        if($cat_image != "")
            $src = "gallerycategory/big_img/".$cat_image;
        else 
            $src = "./images/sample.jpg";

?>
<div class="col-lg-4 col-md-6">
    <div class="gallery-item">
        <img alt="<?echo $cat_name ?>" src="<?echo $src?>" class="gallery_cat_img"/>
        <div class="gallery-desc">
            <h3><a href="<?echo $href?>"><?echo $cat_name ?></a></h3>
            <a class="image-popup example-image-link" href="<?echo $href?>">
                <i class="fa fa-link"></i>
            </a>

        </div>
    </div>
</div>


<?
        }
    }
    else{
        //echo "<script>window.open('Products/".$cid."/1/','_SELF');</script>";
    }
					
?>