<?
session_start();
include_once("connect.php");
$cn=new connect(); 
$cn->connectdb();
				
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 1;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;


$sql1 = $cn->selectdb("SELECT course_name, pdf_file, slug, description FROM tbl_course  order by recordListingID ASC LIMIT $limit OFFSET $offset");

if ($cn->numRows($sql1) > 0) 
{
    while($row = $cn->fetchAssoc($sql1))
    {
        extract($row);
        $href = "courses/".urlencode($slug);
        

?>
<div class="col-md-4 pt-20">

    <div class="testimonial-style3">
        <div class="image">
            <i class="flaticon-tool-1" style="font-size: 50px;line-height: 80px;"></i>
        </div>
        <h5 class="title list-title list-title--course"><?echo $course_name ?></h5>
        <p class="description list-desc list-desc--course">
            <?
            echo strip_tags($description)
            ?>
        </p>
        <div class="testimonial-content">
            <div class="testimonial-profile">
            <a href="<?echo $href?>" >
                <h3 class="name">Read More</h3>
            </a>
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