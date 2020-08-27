<?
$page_id = 45;
$tour_id = urldecode($_GET['tour_id']);
include_once("header.php");
$sqlTrip = $cn->selectdb("select * from tbl_tour where slug = '".$tour_id."' ");
if( $cn->numRows($sqlTrip) > 0 )
{
    $rowTrip = $cn->fetchAssoc($sqlTrip);
    extract($rowTrip);
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
                        <?echo $tour_name ?>

                    </h1>
                    <ul>
                        <li>
                            <a class="active" href="./">Home</a>
                        </li>
                        <li>
                            <a class="active" href="javascript:void(0)">School Life</a>
                        </li>
                        <li>
                            <a class="active" href="field-tours">Field Trips</a>
                        </li>
                        <li>
                            <?echo $tour_name ?>
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
                    <img src="tour/big_img/<?echo $tour_image?>" alt="<? echo $tour_name ?>" style="width:100%">
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
                                <?php echo date('F, d Y ', strtotime($tour_date));?>
                            </span>

                        </div>

                    </div>
                </div><!-- .share-section End -->



            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-area">

                    

                    <div class="latest-courses">
                        <h3 class="title">Other tours</h3>
						<?
						$sqlOtherTours = $cn->selectdb("SELECT tour_date,tour_name, slug, description, tour_image FROM tbl_tour WHERE tour_id!=".$tour_id." ORDER BY recordListingID LIMIT 5");
						if( $cn->numRows($sqlOtherTours) > 0 )
						{
							while($rowOtherTours = $cn->fetchAssoc($sqlOtherTours))
							{
								extract($rowOtherTours);
								$href = "tours/".urlencode($slug);
						?>
						<div class="post-item">
                            <div class="post-img">
                                <a href="<?echo $href?>"><img class="list-img list-img--house2" src="tour/<?echo $tour_image?>" alt="<?echo $tour_name?>" title="<?echo $tour_name?>"></a>
                            </div>
                            <div class="post-desc">
                                <h4><a href="<?echo $href?>"><?echo $tour_name ?></a></h4>
                                <span class="duration">
                                    <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date('F, d Y ', strtotime($tour_date));?>
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
<!-- Blog Single End  -->
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
                    $src="tourF/big_img/".$imgs[$i];
            ?>
                <div class="col-lg-4 col-md-6" style="padding:10px">
                    <div class="gallery-item">
                        <img src="<? echo $src;?>" alt="<?echo $tour_name?>" class="gallery_cat_img"/>
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
