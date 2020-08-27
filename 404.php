<?
$page_id = 47;
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

<!-- 404 Page Area Start Here -->
<div class="error-page-area sec-spacer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 error-page-message">
                <div class="error-page">
                    <h1>404</h1>
                    <p>Page was not Found</p>
                    <div class="home-page">
                        <a href="./">Go to Home Page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 404 Page Area End Here -->

<!-- Partner Start -->
<?
include_once("footer.php");
?>