<?
session_start();
include_once("connect.php");
$cn=new connect(); 
$cn->connectdb();
				
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 1;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;


$sql1 = $cn->selectdb("SELECT product_name, pdf_file FROM tbl_council order by recordListingID ASC LIMIT $limit OFFSET $offset");

if ($cn->numRows($sql1) > 0) 
{
    while($row = $cn->fetchAssoc($sql1))
    {
        extract($row);
        $href = "download_pdf/".$pdf_file;

?>

<div class="col-lg-6">
    <div class="courses-item">
        <p class="list-title list-title--circular"> <?echo $product_name ?></p>
        <a href="<?echo $href?>" download target="_BLANK" class="btnCircle"><i style="color:#fff;font-size:20px"
                class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>
    </div>
</div>

<?
        }
    }
    else{
        //echo "<script>window.open('Products/".$cid."/1/','_SELF');</script>";
    }
					
?>