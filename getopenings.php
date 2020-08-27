<?
session_start();
include_once("connect.php");
$cn=new connect(); 
$cn->connectdb();
				
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 1;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;


$sql1 = $cn->selectdb("select openings_title, slug, description, image_name, openings_date from tbl_openings  order by openings_date DESC LIMIT $limit OFFSET $offset");

if ($cn->numRows($sql1) > 0) 
{
    while($row = $cn->fetchAssoc($sql1))
    {
        extract($row);
        $href = "current-openings/".urlencode($slug);
        $date = date("M d, Y",strtotime($openings_date));

?>

<div class="col-lg-4 col-md-6 grid-item filter1">
    <div class="course-item">
        <div class="course-body">
            <div class="course-desc">
                <h3 class="course-title"><a href="<?echo $href?>" class="list-title list-title--opening"> <?echo $openings_title ?></a></h3>
                <p class="list-desc list-desc--opening">
                    <?echo strip_tags($description);?>
                </p>
            </div>
        </div>
        <div class="course-footer">
            <div class="course-seats">
                <i class="fa fa-calendar"></i> <?echo $date ?>
            </div>
            <div class="course-button">
                <a href="<?echo $href?>">Read More</a>
            </div>
        </div>
    </div>
</div>


<?
        }
    }
    else{
        //echo "<script>window.open('Products/".$cid."/1/','_SELF');</script>";
    }
					
?>