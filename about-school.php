<?
$page_id = 6;
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

<?
$sql = $cn->selectdb("select slug, page_name, page_desc, image, page_id from tbl_page where page_id =27");
if( $cn->numRows($sql) > 0 )
{
    $row = $cn->fetchAssoc($sql);
    extract($row);

?>
<div class="rs-services rs-services-style7 pt-50 pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 rs-vertical-bottom mobile-mb-50">
                <a href="javascript:void(0)">
                    <img src="page/big_img/<?echo $image?>" alt="<?echo $page_name?>" />
                </a>
            </div>
            <div class="col-lg-6 pl-15 pt-30">
                <div class="content-part">
                    <span class="sub-text">
                        <?echo $slug ?></span>
                    <h2 class="uppercase title pb-20 md-pb-10">
                        <?echo $page_name ?>
                    </h2>
                    <?echo $page_desc; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?
$sqlExtraAbout = $cn->selectdb("select title, small_desc from tbl_addmore where page_id = ".$page_id);
if( $cn->numRows($sqlExtraAbout) > 0 )
{
    $icons = array('fa-eye', 'fa-bullseye', 'fa-key');

?>



<!-- Courses Categories Start -->
<div id="rs-learning-objectives" class="rs-learning-objectives pb-50">
    <div class="container">

        <div class="row">
            <?
            $i=0;
            while($rowExtraAbout = $cn->fetchAssoc($sqlExtraAbout))
            {
                extract($rowExtraAbout);
            ?>
            <div class="col-lg-4 col-md-6">
                <div class="courses-item" style="height:250px">
                    <i class="fa <?echo $icons[$i]?>"></i>
                    <h4 class="courses-title"><a href="javascript:void(0)"><?echo $title ?></a></h4>
                    <p align="justify">
                        <?echo strip_tags($small_desc) ?>
                    </p>
                </div>
            </div>
            <?
            $i++;
            }
            ?>
            
        </div>
    </div>
</div>
<?
}
?>
</div>
<!-- Courses Categories End -->
<?
}
?>
<?
$sqlPresident = $cn->selectdb("SELECT page_name, slug, page_desc, image from tbl_page where page_id = 28");
if( $cn->numRows($sqlPresident) > 0 )
{
    $rowPresident = $cn->fetchAssoc($sqlPresident);
    extract($rowPresident);

?>
<!-- Mission Start -->
<div class="rs-mission sec-color pt-70 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 mobile-mb-50">
                <div class="abt-title">
                    <h2><?echo $page_name ?></h2>
                </div>
                <div class="about-desc">
                    <?echo $page_desc ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <img src="page/big_img/<?echo $image?>" alt="<?echo $page_name?>"  />
            </div>
        </div>
    </div>
</div>
<!-- Mission End -->
<?
}
?>


<?php include 'footer.php' ?>