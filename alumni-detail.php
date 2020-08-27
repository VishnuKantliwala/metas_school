<?
$page_id = 14;
$aid = urldecode($_GET['aid']);
include_once("header.php");
$sqlAlumni = $cn->selectdb("select * from tbl_alumni where slug = '".$aid."' ");
if( $cn->numRows($sqlAlumni) > 0 )
{
    $rowAlumni = $cn->fetchAssoc($sqlAlumni);
    extract($rowAlumni);
    $alumni_name = $alumni_fname . " ". $alumni_lname;
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
                        <?echo $alumni_name ?>
                    </h1>
                    <ul>
                        <li>
                            <a class="active" href="./">Home</a>
                        </li>
                        <li>
                            <?echo $alumni_name ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- Team Single Start -->


<div class="rs-about-style8 pt-100 pb-100">
    <div class="container">
        <div class="row team">
            <div class="col-lg-4 col-md-12">
                <div class="team-photo mobile-mb-40 mobile-mt-10 mt-60">
                    <img class="alumni_img alumni_img--detail" src="alumni/big_img/<?echo $alumni_image?>"
                        alt="<?echo $alumni_name ?>">

                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <h3 class="team-name">
                    <?echo $alumni_name ?>
                </h3>
                
                
                <hr/>
                    <ul class="pb-40" >
                        <li><b>Email ID</b>
                            <ul>
                                <li><?echo $email?></li>
                            </ul>
                        </li>

                        <li><b>Gender</b>
                            <ul>
                                <li><?echo $gender?></li>
                            </ul>
                        </li>

                        <li><b>Nationality</b>
                            <ul>
                                <li><?echo $nationality?></li>
                            </ul>
                        </li>

                        <li><b>Country</b>
                            <ul>
                                <li><?echo $country?></li>
                            </ul>
                        </li>

                        <li><b>Birth date</b>
                            <ul>
                                <li><?echo date("M d, Y",strtotime($bdate));?></li>
                            </ul>
                        </li>

                        <li><b>Merital Status</b>
                            <ul>
                                <li><?echo $marital_status?></li>
                            </ul>
                        </li>

                        <li><b>Year of Completion</b>
                            <ul>
                                <li><?echo $year_of_completion?></li>
                            </ul>
                        </li>

                        <li><b>Current Profession</b>
                            <ul>
                                <li><?echo $current_position?></li>
                            </ul>
                        </li>

                        <li><b>Course</b>
                            <ul>
                                <li><?echo $course?></li>
                            </ul>
                        </li>
                    </ul>

                
            </div>
        </div>
    </div>
</div>
<!-- Team Single End -->

<!-- Team Start -->
<?
include_once("footer.php");
?>