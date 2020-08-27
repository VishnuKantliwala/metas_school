<?
session_start();
include_once("connect.php");
$cn=new connect(); 
$cn->connectdb();
				
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 1;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;

$cat_id = $_GET['cat_id'];

$sql1 = $cn->selectdb("select * from tbl_download where  CONCAT(',',cat_id) like '%".$cat_id."%'   order by recordListingID DESC LIMIT $limit OFFSET $offset");

if ($cn->numRows($sql1) > 0) 
{
    while($row = $cn->fetchAssoc($sql1))
    {
        extract($row);
        

?>
<div class="col-lg-3">
    <div class="courses-item">
        <h4><?echo $download_name ?></h4>
        <button data-toggle="modal" data-target="#myModal" class="primary-btn btn_sc" cid="<?echo $download_id?>" cname ="<?echo $download_name?>"><i style="font-size:16px"
                class="fa fa-file-pdf-o" aria-hidden="true"></i> View documents</button>
    </div>
</div>


<?
        }
    }
    else{
        //echo "<script>window.open('Products/".$cid."/1/','_SELF');</script>";
    }
					
?>