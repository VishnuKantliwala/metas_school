<?
$page_id = 40;
$band_id = urldecode($_GET['band_id']);
include_once("header.php");
$sqlBand = $cn->selectdb("select * from tbl_band where slug = '".$band_id."' ");
if( $cn->numRows($sqlBand) > 0 )
{
    $rowBand = $cn->fetchAssoc($sqlBand);
    extract($rowBand);
}
else
{
    echo "<script>window.open('./404','_SELF')</script>";
    exit();
}

$sql = $cn->selectdb("select image from tbl_page where page_id =$page_id");
$row = $cn->fetchAssoc($sql);
extract($row);
?>

<div class="rs-breadcrumbs bg7 breadcrumbs-overlay" style="background: url(page/big_img/<?echo $image?>)">
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">
                        <?echo $band_name ?>
                        
                    </h1>
                    <ul>
                        <li>
                            <a class="active" href="./">Home</a>
                        </li>
                        <li>
                            <a class="active" href="javascript:void(0)">School Life</a>
                        </li>
                        <li>
                            <a class="active" href="school-bands">Our Bands</a>
                        </li>
                        <li>
                            <?echo $band_name ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->



<div class="rs-team-single sec-spacer gray-color">
    <div class="container">
        <div class="row team">

            <div class="col-lg-8 col-md-12">

                <div class="my_desc" style="padding-top:20px">
                    <?echo $description ?>
                </div>

            </div>
            <div class="col-lg-4 col-md-12">
                <div class="team-photo mobile-mb-40">
                    <img src="band/big_img/<?echo $band_image?>" alt="<?echo $band_name?>" style="width:100%">
                </div>
            </div>
        </div>
    </div>
</div>

<?
// echo $multi_images;
if($multi_images != "")
{
?>
<div class="rs-gallery sec-spacer">
    <div class="container">
        <div class="sec-title mb-50 text-center">
            <h2>Gallery</h2>
        </div>
        <div class="row">
            <?
            
                $imgs=explode(",",$multi_images);
                for($i=0;$i<count($imgs)-1;$i++)
                {
                    $src="bandF/big_img/".$imgs[$i];
            ?>
                <div class="col-lg-4 col-md-6" style="padding:10px">
                    <div class="gallery-item">
                        <img src="<? echo $src;?>" alt="<?echo $band_name?>" class="gallery_cat_img"/>
                        <div class="gallery-desc">
                            <a class="image-popup" href="<? echo $src;?>">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
            <?
                }
            
            ?>
            
            
        </div>
    </div>
</div>
<?
}
?>

<?php include 'footer.php' ?>



<script>
$(".DescSec ul li").prepend("<i class='fa fa-arrow-circle-o-right color'></i>");
</script>

<style>
.DescSec ul li i {
    padding-right: 20px;
    font-size: 20px;
}

.DescSec ul li {
    text-align: justify;
}
</style>