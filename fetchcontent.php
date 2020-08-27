<?
session_start();
include_once("connect.php");
$cn=new connect(); 
$cn->connectdb();
				
$id = $_GET['id'];

$sql1 = $cn->selectdb("SELECT pdf_file FROM tbl_download WHERE download_id=$id ");

if ($cn->numRows($sql1) > 0) 
{
    $row = $cn->fetchAssoc($sql1);
    extract($row);

    // echo "in";
?>

<?
if($pdf_file != "")
{
    $downloads=explode(",",$pdf_file);
    for($i=0;$i<count($downloads)-1;$i++)
    {
        $download_name = substr($downloads[$i], 0, strlen($downloads[$i]) - 9)
?>
<div class="col-lg-6 col-md-6 col-xs-12 text-center">
    <a href="download_pdf/<? echo $downloads[$i];?>" target="_BLANK" class="btnCircle list-title list-title--content"><i style="color:#fff;font-size:20px" class="fa fa-file-pdf-o" aria-hidden="true"></i> <?echo $download_name ?></a>
</div>
<?
    }
}
else
{
    ?>
    <div class="col-lg-12 col-md-12 col-xs-12 text-center">
        <h4>No documents found.</h4>
    </div>
    <?
}
?>







<?
        
}
else{
    //echo "<script>window.open('Products/".$cid."/1/','_SELF');</script>";
}
                
?>