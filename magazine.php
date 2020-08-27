<?
$page_id = 26;
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
                            <a class="active" href="javascript:void(0)">Media</a>
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
$sqlMagazine = $cn->selectdb("SELECT pdf_file from tbl_magazine where magazine_id=1");
if( $cn->numRows($sqlMagazine) > 0 )
{
	$rowMagazine = $cn->fetchAssoc($sqlMagazine);
	extract($rowMagazine);

?>
<div id="rs-learning-objectives" class="rs-learning-objectives pt-100 pb-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="courses-item">
                    <p>Please refer to attached PDF.</p>


                    <a download href="./download_pdf/<?echo $pdf_file?>" target="_BLANK" class="btnCircle"><i style="color:#fff;font-size:20px" class="fa fa-file-pdf-o"
                            aria-hidden="true"></i> Download PDF</a>


                </div>
            </div>
        </div>
    </div>
</div>
<?
}
?>

<?php include 'footer.php' ?>