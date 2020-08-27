<?
$page_id = 30;
$admission_id = $_GET['admission_id'];
include_once("header.php");
//$admission_id = $_GET['admission_id'];

$sqlAcademic = $cn->selectdb("select * from tbl_admission where slug = '".$admission_id."' ");
if( $cn->numRows($sqlAcademic) > 0 )
{
    $rowAcademic = $cn->fetchAssoc($sqlAcademic);
    extract($rowAcademic);
    
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



<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs bg7 breadcrumbs-overlay" style="background: url(page/big_img/<?echo $image?>)">
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">
                        <?echo $blog_name ?>
                    </h1>
                    <ul>
                        <li>
                            <a class="active" href="./">Home</a>
                        </li>
                        <li>
                            <a class="active" href="javascript:void(0)">Admissions</a>
                        </li>
                        <li>
                            <?echo $blog_name ?>
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
            <?
            if($blog_image != "")
            {
            ?>
            <div class="col-md-12 text-center">
                   
                <img src="admission/big_img/<?echo $blog_image?>" style="width:100%">
                    
                
            </div>
            <?
            }
            ?>
            <?
            if($description!="")
            {
            ?>
            <div class="col-lg-12">
                <div class="course-item">
                    <div class="course-footer footcolor">
                        <div class="course-seats">
                            <?echo $blog_name ?>
                        </div>
                    </div>
                    <div class="course-body">
                        <div class="course-desc">

                            <div class="my_desc">
                                <?echo $description ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <?
            }
            ?>
        </div>

    </div>
</div>

<?php include 'footer.php' ?>

