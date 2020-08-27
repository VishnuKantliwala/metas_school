<?
$page_id = 36;
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
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?
$sqlPdfs = $cn->selectdb("SELECT pdf_file, curriculum_name FROM tbl_curriculum ORDER BY recordListingID");
if( $cn->numRows($sqlPdfs) > 0 )
{
?>
<div id="rs-learning-objectives" class="rs-learning-objectives pb-50">
    <div class="container">
        <div class="row justify-content-center">
			<?
			while($rowPdfs = $cn->fetchAssoc($sqlPdfs))
			{
				extract($rowPdfs);
				$href="./download_pdf/".$pdf_file;
			?>
			<div class="col-lg-3">
                <div class="courses-item">
					<a href="<?echo $href?>" download class="btnCircle list-desc list-desc--cucurriculum"><i style="color:#fff;font-size:20px" class="fa fa-file-pdf-o"
                            aria-hidden="true"></i> <?echo $curriculum_name ?></a>
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