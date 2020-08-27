<?
$page_id = 18;
$scid = urldecode($_GET['scid']);

include_once("header.php");
$sqlContent = $cn->selectdb("select * from tbl_downloadcategory where slug = '".$scid."' ");
if( $cn->numRows($sqlContent) > 0 )
{
    $rowContent = $cn->fetchAssoc($sqlContent);
    extract($rowContent);
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
                            <a class="active" href="current-openings">School Content</a>
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



<div id="rs-learning-objectives" class="rs-learning-objectives pt-100 pb-70">
    <div class="container">

        <div class="row justify-content-center" id="results">




        </div>
        <div>
            <div style="width:100%; text-align: center;height:30px">
                <img style="display:none;width:30px;" id="loader_image" src="./images/loader.gif" />
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog" style="background: #5bc6d0;">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title content_title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body ">
                    <div class="content_body row text-center"></div>
                    <div>
                        <div style="width:100%; text-align: center;height:30px">
                            <img style="display:none;width:30px;" class="content_loader" src="./images/loader.gif" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>


<?php include 'footer.php' ?>
<script src="js/forms.js"></script>
<script src="js/scroll.js" id="helper" cat_id="<?echo $cat_id?>" file-name="getschoolcontent.php" limit="20" pid="0">
</script>