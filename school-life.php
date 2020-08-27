<?
$page_id = 34;
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
                            <a class="active" href="javascript:void(0)">School Life</a>
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


<div id="rs-courses-3" class="rs-courses-3 sec-spacer">
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
                        <div class="course-desc">
                            <div class="my_desc">
                                <?echo $page_desc ?>




                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container row rs-gallery">
            <?
            if($multi_images != "")
            {
                $imgs=explode(",",$multi_images);
                for($i=0;$i<count($imgs)-1;$i++)
                {
                    $src="pageF/big_img/".$imgs[$i];
            ?>
            <div class="col-lg-4 col-md-6">
                <div class="gallery-item">
                    <img class="gallery_cat_img" alt="<?echo $page_name ?>" src="<?echo $src?>" />
                    <div class="gallery-desc">
                        <a class="image-popup example-image-link" data-lightbox="example-set" class="" href="<?echo $src?>">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?
                }
            }
            ?>
            </div>
        </div>

    </div>
</div>

<?php include 'footer.php' ?>
<script src="dist/js/lightbox-plus-jquery.min.js"></script>

