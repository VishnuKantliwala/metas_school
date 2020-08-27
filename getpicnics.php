<?
session_start();
include_once("connect.php");
$cn=new connect(); 
$cn->connectdb();
				
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 1;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;


$sql1 = $cn->selectdb("SELECT slug, picnic_name, picnic_image FROM tbl_picnic  order by recordListingID ASC LIMIT $limit OFFSET $offset");

if ($cn->numRows($sql1) > 0) 
{
    while($row = $cn->fetchAssoc($sql1))
    {
        extract($row);
        $href = "picnics/".urlencode($slug);

?>
<div class="col-lg-3">
    <div class="product-item">
        <div class="product-img" style="padding:0 10px">
            <a href="<?echo $href?>">
                <img class="list-img list-img--band" src="picnic/big_img/<?echo $picnic_image?>"
                    alt="<?echo $picnic_name ?>" />
            </a>
        </div>
        <h4 class="product-title"><a href="<?echo $href?>" class="list-desc list-desc--band"><?echo $picnic_name ?></a></h4>
        <div class="product-btn">
            <a href="<?echo $href?>">Read More</a>
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