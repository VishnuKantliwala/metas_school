<?
$page_id = 44;
$picnic_id = urldecode($_GET['picnic_id']);
include_once("header.php");
$sqlPicnic = $cn->selectdb("select * from tbl_picnic where slug = '".$picnic_id."' ");
if( $cn->numRows($sqlPicnic) > 0 )
{
    $rowPicnic = $cn->fetchAssoc($sqlPicnic);
    extract($rowPicnic);
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
                        <?echo $picnic_name ?>

                    </h1>
                    <ul>
                        <li>
                            <a class="active" href="./">Home</a>
                        </li>
                        <li>
                            <a class="active" href="javascript:void(0)">School Life</a>
                        </li>
                        <li>
                            <a class="active" href="picnics"> Picnics</a>
                        </li>
                        <li>
                            <?echo $picnic_name ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->


<!-- Blog Single Start Here -->
<div class="single-blog-details sec-spacer">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="single-image">
                    <img src="picnic/big_img/<?echo $picnic_image?>" alt="<? echo $picnic_name ?>" style="width:100%">
                </div><!-- .single-image End -->
                <div class="course-footer footcolor">
                    <div class="course-seats" style="padding:10px 20px">
                        Picnic Detail
                    </div>
                </div>
                <div class="my_desc" style="padding-top:20px">
                    <?echo $description ?>
                </div>


                <div class="share-section">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 life-style">
                            <span class="author">
                                <a href="javascript:void(0)"><i class="fa fa-user-o" aria-hidden="true"></i> Admin </a>
                            </span>

                            <span class="date">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <?php echo date('F, d Y ', strtotime($picnic_date));?>
                            </span>

                        </div>

                    </div>
                </div><!-- .share-section End -->



            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-area">

                    <div class="latest-courses">
                        <h3 class="title">Other picnics</h3>
						<?
						$sqlOtherPicnics = $cn->selectdb("SELECT picnic_date,picnic_name, slug, description, picnic_image FROM tbl_picnic WHERE picnic_id!=".$picnic_id." ORDER BY recordListingID LIMIT 5");
						if( $cn->numRows($sqlOtherPicnics) > 0 )
						{
							while($rowOtherPicnics = $cn->fetchAssoc($sqlOtherPicnics))
							{
								extract($rowOtherPicnics);
								$href = "picnics/".urlencode($slug);
						?>
						<div class="post-item">
                            <div class="post-img">
                                <a href="<?echo $href?>"><img class="list-img list-img--house2" src="picnic/<?echo $picnic_image?>" alt="<?echo $picnic_name?>" title="<?echo $picnic_name?>"></a>
                            </div>
                            <div class="post-desc">
                                <h4><a href="<?echo $href?>"><?echo $picnic_name ?></a></h4>
                                <span class="duration">
                                    <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date('F, d Y ', strtotime($picnic_date));?>
                                </span>
                                
                            </div>
						</div><!-- .post-item end -->
						<?
							}
						}
						?>
                        
                    </div>


                </div><!-- .sidebar-area end -->
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
                    $src="picnicF/big_img/".$imgs[$i];
            ?>
                <div class="col-lg-4 col-md-6" style="padding:10px">
                    <div class="gallery-item">
                        <img src="<? echo $src;?>" alt="<?echo $picnic_name?>" class="gallery_cat_img"/>
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

<!-- Blog Single End  -->

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