<?
session_start();
include_once("connect.php");
$cn=new connect(); 
$cn->connectdb();
				
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 1;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;


$sql1 = $cn->selectdb("SELECT slug, alumni_fname, alumni_lname, alumni_image FROM tbl_alumni WHERE `status`=1  order by recordListingID ASC LIMIT $limit OFFSET $offset");

if ($cn->numRows($sql1) > 0) 
{
    while($row = $cn->fetchAssoc($sql1))
    {
        extract($row);
        $href = "alumni-list/".urlencode($slug);

?>
<div class="col-lg-3 col-md-6 col-xs-6 grid-item filter1">
    <div class="team-item">
        <div class="team-img">
            <a href="<?echo $href?>"><img class="alumni_img" src="alumni/big_img/<?echo $alumni_image?>"
                    alt="<?echo $alumni_fname ?>" /></a>

        </div>
        <div class="team-body">
            <a href="<?echo $href?>">
                <h3 class="name">
                    <?echo $alumni_fname . " ". $alumni_lname ?>
                </h3>
            </a>
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