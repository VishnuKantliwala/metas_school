<?
session_start();
include_once("connect.php");
$cn=new connect(); 
$cn->connectdb();
				
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 1;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;


$sql1 = $cn->selectdb("SELECT slug, tour_name, tour_image,description, tour_date, tour_venue  FROM tbl_tour  order by recordListingID ASC LIMIT $limit OFFSET $offset");

if ($cn->numRows($sql1) > 0) 
{
    while($row = $cn->fetchAssoc($sql1))
    {
        extract($row);
        $href = "tours/".urlencode($slug);

?>
<div class="col-lg-6 col-md-12" style="margin-bottom:20px">
    <div class="event-item">

        <div class="row rs-vertical-middle">
            <div class="col-md-6">
                <div class="event-img">
                    <img class="list-img list-img--tour" src="tour/big_img/<?echo $tour_image?>" alt="<?echo $tour_name ?>" />
                    <a class="image-link" href="<?echo $href?>" title="University Tour 2018">
                        <i class="fa fa-link"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="event-content">
                    <div class="event-meta">
                        <div class="event-date">
                            <i class="fa fa-calendar"></i>
                            <span><?php echo date('F, d Y ', strtotime($tour_date));?></span>
                        </div>
                        
                    </div>
                    <h3 class="event-title list-title list-title--tour"><a href="<?echo $href?>"><?echo $tour_name ?></a></h3>
                    <div class="event-location list-title list-title--tour-venue">
                        <i class="fa fa-map-marker"></i>
                        <span ><?echo $tour_venue ?></span>
                    </div>
                    <div class="event-desc">
                        <p class="list-desc list-desc--tour">
                            <?echo substr(strip_tags($description),0,400);?>
                        </p>
                    </div>
                    <div class="event-btn">
                        <a href="<?echo $href?>">Read More</a>
                    </div>
                </div>
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