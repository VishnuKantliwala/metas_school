<?
$page_id = 14;
include_once("header.php");
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

<!-- Team Start -->
<div id="rs-team-2" class="rs-team-2 team-page">
    <div class="container">
        
		<?
        $sqlAB1 = $cn->selectdb("SELECT alumni_id FROM tbl_alumni WHERE `status`=1 ORDER BY recordListingID LIMIT 1");
        if( $cn->numRows($sqlAB1) > 0 )
        {
            
        ?>
		<div class="row grid" id="results">

            
        </div>
		<?
		}
		else
		{
		?>
			<div class="row text-center">
                <h2>No alumni found.</h2>
            </div>
		<?
		}
		?>
        <div>
			<div  style="width:100%; text-align: center;height:30px">
				<img style="display:none;width:30px;" id="loader_image"
					src="./images/loader.gif" />
			</div>
		</div>
    </div>
</div>
<!-- Team End -->

<?
include_once("footer.php");
?>
<script src="js/scroll.js" id="helper" cat_id="0" file-name="getalumni.php" limit="20"
    pid="0"  ></script>