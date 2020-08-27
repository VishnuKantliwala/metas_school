<?
$page_id = 25;
if(!isset($_GET['gcid']))
{
    $gcid = "000";
}
else
{
    // echo "in";
    $gcid = urldecode($_GET['gcid']);
}
include_once("header.php");
$sql = $cn->selectdb("select * from tbl_page where page_id =$page_id");
$row = $cn->fetchAssoc($sql);
extract($row);
?>


<?
$sqlGalleryCat = $cn->selectdb("select cat_name, cat_id from tbl_gallery_category where slug like '%".$gcid."%'" );
if( $cn->numRows($sqlGalleryCat) > 0 )
{
    $rowGalleryCat = $cn->fetchAssoc($sqlGalleryCat);
    extract($rowGalleryCat);
    // echo $cat_id;
}
else
{
    $cat_id = 0;
    $cat_name = "Gallery";
}
?>



<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs bg7 breadcrumbs-overlay" style="background: url(page/big_img/<?echo $image?>)">
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">
                        <?echo $cat_name ?>
                    </h1>
                    <ul>
                        <li>
                            <a class="active" href="./">Home</a>
                        </li>
                        <li>
                            <a class="active" href="javascript:void(0)">Media</a>
                        </li>
                        <li>
                            <?echo $cat_name ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->

<div class="rs-gallery sec-spacer">
    <div class="container">
        <div class="row" id="results">
            

            
        </div>
        <div>
			<div  style="width:100%; text-align: center;height:30px">
				<img style="display:none;width:30px;" id="loader_image"
					src="./images/loader.gif" />
			</div>
		</div>

    </div>
</div>

<?php include 'footer.php' ?>
<script src="js/scroll.js" id="helper" cat_id="<?echo $cat_id?>" file-name="getgallerycategory.php" limit="1" pid="0"></script>