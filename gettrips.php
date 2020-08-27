<?
session_start();
include_once("connect.php");
$cn=new connect(); 
$cn->connectdb();
				
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 1;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;


$sql1 = $cn->selectdb("SELECT slug, trip_name, trip_image,description  FROM tbl_trip  order by recordListingID ASC LIMIT $limit OFFSET $offset");

if ($cn->numRows($sql1) > 0) 
{
    while($row = $cn->fetchAssoc($sql1))
    {
        extract($row);
        $href = "field-trips/".urlencode($slug);

?>
<div class="col-lg-4 col-md-6 grid-item filter1">
    <div class="course-item">
        <div class="course-img">
            <img class="list-img list-img--trip" src="trip/big_img/<?echo $trip_image?>"
                    alt="<?echo $trip_name ?>" />

            
        </div>
        <div class="course-body">
            <div class="course-desc">
                <h4 class="course-title list-title list-title--trip"><a href="<?echo $href?>"><?echo $trip_name ?></a></h4>
                <p class="list-desc list-desc--trip">
                    <?echo substr(strip_tags($description),0,400);?>
                </p>
            </div>
        </div>
        <div class="course-footer">

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