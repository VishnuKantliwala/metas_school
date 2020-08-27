<?
session_start();
include_once("connect.php");
$cn=new connect(); 
$cn->connectdb();
				
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 1;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;


$sql1 = $cn->selectdb("SELECT project_name, pdf_file FROM tbl_project  order by recordListingID ASC LIMIT $limit OFFSET $offset");

if ($cn->numRows($sql1) > 0) 
{
    while($row = $cn->fetchAssoc($sql1))
    {
        extract($row);
        if($pdf_file!="")
        {
            $pdf_file = explode(',',$pdf_file)[0];
            $href = "download_pdf/".$pdf_file;
        }
        else
            $href = "javascript:void(0)";

?>
<div class="col-md-4 pt-20">
    <div class="testimonial-style3">
        <div class="image">
            <i class="fa fa-rupee" style="font-size: 50px;line-height: 80px;"></i>
        </div>
        <h5 class="title"><?echo $project_name ?></h5>

        <div class="testimonial-content">
            <div class="testimonial-profile">
                <a href="<?echo $href?>" target="_BLANK" download><h3 class="name">View</h3></a>
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