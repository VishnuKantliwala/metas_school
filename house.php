<?
$page_id = 38;
include_once("header.php");
$sql = $cn->selectdb("select * from tbl_page where page_id =$page_id");
$row = $cn->fetchAssoc($sql);
extract($row);
?>



<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs bg7 breadcrumbs-overlay" style="background: url(page/big_img/<?echo $image?>)">
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">
                        <?echo $page_name ?>
                    </h1>
                    <ul>
                        <li>
                            <a class="active" href="./">Home</a>
                        </li>
                        <li>
                            <?echo $page_name ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->


<div id="rs-courses-3" class="rs-courses-3 sec-spacer sec-color">
    <div class="container">

        <div class="row ">
            <div class="col-lg-12">
                <div class="course-item">
                    <div class="course-footer footcolor">
                        <div class="course-seats">
                            <?echo $page_name ?>
                        </div>
                    </div>
                    <div class="course-body">
                        <div class="course-desc my_desc">
                            <?echo $page_desc ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<?
$sqlHouses = $cn->selectdb("SELECT house_name, slug, house_image, description from tbl_house ORDER BY recordListingID");
if( $cn->numRows($sqlHouses) > 0 )
{
?>
<div id="rs-testimonial-2" class="rs-testimonial-2 pt-50 pb-70">
    <div class="container">
        <div class="sec-title mb-50">
            <h2>OUR HOUSES</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="rs-carousel owl-carousel" data-loop="true" data-items="2" data-margin="30"
                    data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="false"
                    data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true"
                    data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="true"
                    data-ipad-device-dots="false" data-md-device="2" data-md-device-nav="true"
                    data-md-device-dots="false">
                    <?
					while($rowHouses = $cn->fetchAssoc($sqlHouses))
					{
						extract($rowHouses);
						$href = "houses/".$slug;
					?>
                    <div class="testimonial-item">
                        <div class="testi-img">
                            <img class="list-img list-img--house" src="house/big_img/<?echo $house_image?>" alt="<?echo $house_name ?>">
                        </div>
                        <div class="testi-desc testi-descss">
                            <h4 class="testi-name">
                                <a href="<?echo $href?>"><?echo $house_name ?></a>
                            </h4>
                            <p class="list-desc list-desc--house">
                                <?echo substr( strip_tags($description),0,400) ?>
                            </p>
                        </div>
                    </div>
                    <?
					}
					?>



                </div>
            </div>
        </div>
    </div>
</div>
<?
}
?>

<?php include 'footer.php' ?>