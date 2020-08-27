<?
$page_id = 21;
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
                            <a class="active" href="javascript:void(0)">Online learning</a>
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


<div id="rs-learning-objectives" class="rs-learning-objectives pt-100 pb-70">
    <div class="container">
		<?
		$sqlCircular = $cn->selectdb("SELECT product_name, pdf_file FROM tbl_council");
		if( $cn->numRows($sqlCircular) > 0 )
		{

		
		?>
        <div class="row justify-content-center" id="results">
            
		</div>
		<div class="row" >
			<div class="col-md-12 text-center">
				<div  style="width:100%; text-align: center;height:30px">
					<img style="display:none;width:30px;" id="loader_image"
						src="./images/loader.gif" />
				</div>
			</div>
		</div>

		<?
		}
		else
		{
		?>
		<div class="row" >
			<div class="col-md-12 text-center">

				<h2 class="text-center">No records found.</h2>
			</div>
		</div>
		<?
		}
		?>
    </div>
</div>


<?php include 'footer.php' ?>
<script src="js/scroll.js" id="helper" cat_id="0" file-name="getcirculars.php" limit="20"
    pid="0"  ></script>