<?
session_start();
include_once("connect.php");
$cn=new connect(); 
$cn->connectdb();
				
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 1;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;


$sql1 = $cn->selectdb("SELECT slug, team_title, image_name FROM tbl_team   order by recordListingID ASC LIMIT $limit OFFSET $offset");

if ($cn->numRows($sql1) > 0) 
{
    while($row = $cn->fetchAssoc($sql1))
    {
        extract($row);
        $href = "team-list/".urlencode($slug);

?>
<div class="col-lg-3 col-md-6 col-xs-6 grid-item filter1">
    <div class="team-item">
        <div class="team-img">
            <img class="alumni_img" src="team/big_img/<?echo $image_name?>"
                    alt="<?echo $team_title ?>" />
            
        </div>
        <div class="team-body">
            <a href="javascript:void(0)">
                <h3 class="name"><?echo $team_title ?></h3>
            </a>
            <!-- <span class="designation">Science</span> -->
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