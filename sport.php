<?
$page_id = 39;
$sport_id = urldecode($_GET['sport_id']);
include_once("header.php");
$sqlHouse = $cn->selectdb("select * from tbl_sport where slug = '".$sport_id."' ");
if( $cn->numRows($sqlHouse) > 0 )
{
    $rowHouse = $cn->fetchAssoc($sqlHouse);
    extract($rowHouse);
}
else
{
    echo "<script>window.open('./404','_SELF')</script>";
    exit();
}

$sql = $cn->selectdb("select * from tbl_page where page_id =$page_id");
$row = $cn->fetchAssoc($sql);
extract($row);
?>

<div class="rs-breadcrumbs bg7 breadcrumbs-overlay" style="background: url(page/big_img/<?echo $image?>)">
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">
                        <?echo $sport_name ?>
                    </h1>
                    <ul>
                        <li>
                            <a class="active" href="./">Home</a>
                        </li>
                        <li>
                            <a class="active" href="javascript:void(0)">School Life</a>
                        </li>
                        <li>
                            <a class="active" href="javascript:void(0)">Sports</a>
                        </li>
                        <li>
                            <?echo $sport_name ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->

<div class="rs-courses-details pt-100 pb-70">
    <div class="container">
        <div class="row mb-30">
            <div class="col-lg-8 col-md-12">
                <div class="detail-img">
                    <img class="col-md-12" src="sport/big_img/<?echo $sport_image?>" alt="<?echo $sport_name?>" />

                </div>
                <div class="course-content">
                    <!--<h3 class="course-title">Computer Science And Engineering</h3>-->
                    <div class="course-instructor">
                        <div class="row">
                            <div class="col-md-12 mobile-mb-20">
                                <h3 class="instructor-title"><span class="primary-color"><?echo $sport_name?></span></h3>
                                <div class="short-desc">
                                    <?echo $description ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-area">
					<?
                    $sqlOtherSports = $cn->selectdb("SELECT sport_name, slug, description, sport_image FROM tbl_sport WHERE sport_id!=".$sport_id." ORDER BY recordListingID");
                    if( $cn->numRows($sqlOtherSports) > 0 )
                    {
                    ?>
                    <div class="latest-courses">
                        <h3 class="title">Other Sports</h3>
                        <?
                        while($rowOtherSports = $cn->fetchAssoc($sqlOtherSports))
                        {
                            extract($rowOtherSports);
						    $href = "sports/".$slug;
                        ?>
                        <div class="post-item">
                            <div class="post-img">
                                <a href="<? echo $href ?>">
                                    <img class="list-img list-img--sport2" src="sport/<?echo $sport_image?>" alt="<?echo $sport_name?>" title="<?echo $sport_name?>"></a>
                            </div>
                            <div class="post-desc">
                                <h4><a href="<? echo $href ?>"><?echo $sport_name?></a></h4>


                            </div>
                        </div>
                        <?
                        }
                        
                        ?>
                    </div>
                    <?
                    }
                    ?>

                    

                </div>
            </div>
        </div>
    </div>
</div>




<?php include 'footer.php' ?>