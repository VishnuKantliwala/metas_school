<?
$page_id = 38;
$house_id = urldecode($_GET['house_id']);
include_once("header.php");
$sqlHouse = $cn->selectdb("select * from tbl_house where slug = '".$house_id."' ");
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
                        <?echo $house_name ?>
                    </h1>
                    <ul>
                        <li>
                            <a class="active" href="./">Home</a>
                        </li>
                        <li>
                            <a class="active" href="javascript:void(0)">School Life</a>
                        </li>
                        <li>
                            <a class="active" href="houses">Our Houses</a>
                        </li>
                        <li>
                            <?echo $house_name ?>
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
                
                <div class="course-content">
                    <!--<h3 class="course-title">Computer Science And Engineering</h3>-->
                    <div class="course-instructor">
                        <div class="row">
                            <div class="col-md-12 mobile-mb-20">
                                <h3 class="instructor-title"><span class="primary-color"><?echo $house_name ?></span></h3>
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
                    <img src="house/big_img/<?echo $house_image?>" alt="<?echo $house_name?>" style="width:100%"/>
                    <?
                    $sqlOtherHouses = $cn->selectdb("SELECT house_name, slug, description, house_image FROM tbl_house WHERE house_id!=".$house_id." ORDER BY recordListingID");
                    if( $cn->numRows($sqlOtherHouses) > 0 )
                    {
                    ?>
                    <div class="latest-courses">
                        <h3 class="title">Other Houses</h3>
                        <?
                        while($rowOtherHouses = $cn->fetchAssoc($sqlOtherHouses))
                        {
                            extract($rowOtherHouses);
						    $href = "houses/".$slug;
                        ?>
                        <div class="post-item">
                            <div class="post-img">
                                <a href="<? echo $href ?>">
                                    <img class="list-img list-img--house2" src="house/<?echo $house_image?>" alt="<?echo $house_name?>" title="<?echo $house_name?>"></a>
                            </div>
                            <div class="post-desc">
                                <h4><a href="<? echo $href ?>"><?echo $house_name?></a></h4>


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