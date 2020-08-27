<?php
session_start();
if(!isset($_SESSION['user']))
{
	header("location:Login.php");
}

include_once("../connect.php");
//include_once("fckeditor/fckeditor.php");
include_once("../navigationfun.php");
include_once("../sitemap.php");
$con=new connect();
$con->connectdb();
$pageID= 'page3';

$curriculum_id=$_GET['curriculum_id'];


?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>Master Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <!--Morris Chart-->
        <link rel="stylesheet" href="assets/libs/morris-js/morris.css" />
        
        <!-- App favicon -->
                <?$sqlF = $cn->selectdb("select * from tbl_favicon where fav_id= 1 ");
            $rowF = mysqli_fetch_assoc($sqlF);
        ?>
        <link rel="<?echo $rowF['relation'];?>" href="../favicon/big_img/<?echo $rowF['image_name'];?>" />

        
        <!-- dropify -->
        <link href="assets/libs/dropify/dropify.min.css" rel="stylesheet" type="text/css" />
        
        <!-- Treeview css -->
        <link href="assets/libs/treeview/style.css" rel="stylesheet" type="text/css" />
        
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css?v=<?echo time();?>" rel="stylesheet" type="text/css" />
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <div class="navbar-custom">

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="index.php" class="logo text-center">
                        <span class="logo-lg">
                        <?$sqlL = $cn->selectdb("select * from tbl_logo where logo_id= 1 ");
                            $rowL = mysqli_fetch_assoc($sqlL);
                        ?>
                            <img src="<?if($rowL['image_name']!=''){echo "../logo/big_img/".$rowL['image_name'];}?>" alt="" height="16">
                        </span>
                    </a>
                </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile disable-btn waves-effect">
                        <i class="fe-menu"></i>
                    </button>
                </li>

                <li>
                    <h4 class="page-title-main">Curriculum </h4>
                </li>
    
            </ul>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?include_once("menu.php");?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <h4 class="mt-0 header-title">Curriculum  Form</h4>
                                
                                <form class="form-horizontal" method="post" action="curriculum_upload.php" id="myform" name="myform" enctype="multipart/form-data">
                                    <input type="hidden" name="page" id="page" value="<? echo isset($_GET['page']);?>">

                                    <?php
                                    $records=$cn->selectdb("SELECT * FROM tbl_curriculum where curriculum_id=".$curriculum_id."");
                                    while($row=mysqli_fetch_array($records))
                                    {
                                    ?>
                                    <input type="hidden" name="curriculum_id" id="curriculum_id" value="<?php echo $row[0]; ?>" />
                                    <input type="hidden" name="cat_id" id="cat_id" value="<?php echo $row[3]; ?>" />

                                    

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">Slug</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="<?php echo $row[12]; ?>">
                                        </div>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">Date</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="date" name="date" placeholder="Date" value="<?php echo $row[13]; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">Month</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="month" name="month" placeholder="Month" value="<?php echo $row[14]; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">Year</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="year" name="year" placeholder="Year" value="<?php echo $row[15]; ?>">
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">Curriculum  Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="curriculum_name" name="curriculum_name" value="<?php echo $row[1]; ?>" placeholder="curriculum Name">
                                        </div>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">Description</label>
                                        <div class="col-sm-12">
                                            <textarea class="ckeditor" cols="80" id="description" name="description" rows="10"><? echo $row[2];?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">Image</label>
                                        <div class="col-sm-4">
                                            <input type="file" id="frontimg" name="frontimg" data-default-file="<?if($row[4]!=''){echo '../curriculum/'.$row[4];}?>" class="dropify"/>
                                            <? if($row[4]!=''){?>
                                            <a href="curriculum_upload.php?id=<?php echo $row[0]; ?>&ProImage=Del" class="btn btn-lighten-danger" onClick="return confirm('Are you sure want to delete?');">Delete</a>
                                            <? } ?>
                                            <input type="hidden" id="frontimg2" name="frontimg2" value="<?php echo $row[4]?>" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">Multiple Images</label>
                                        <input type="hidden" class="form-control" id="frontimg1" name="frontimg1" placeholder="Multiple Images" value="<? echo $row['multi_images']; ?>">
                                        <div class="col-sm-4">
                                            <input type="file" class="dropify" name="image_title[]" multiple />
                                            <div class="attached-files mt-4">
                                                <ul class="list-inline files-list">
                                                    
                                                    <?
                                                    if(isset($_GET["curriculum_id"]))
                                                    {
                                                        $image = $row['multi_images'];
                                                        
                                                        if($image!="" || $image!=NULL)
                                                        {
                                                            $image_list = explode(',',$image);
                                                            // echo '<table>';
                                                                $cnt = 1;
                                                                
                                                            for($i=0;$i<count($image_list)-1;$i++)
                                                            {
                                                    ?>
                                                                <?php //echo "image name=".$image_list[$i]; ?>
                                                                <li class="list-inline-item file-box">
                                                                    <div class=" custom-control custom-switch">
                                                                        <input class="custom-control-input" type="checkbox" name="imageEdit[]" id="<?php echo $image_list[$i]; ?>" value="<?php echo $image_list[$i]; ?>">
                                                                        <label class="custom-control-label" for="<?php echo $image_list[$i]; ?>">
                                                                            <img src="../curriculumF/<?php echo $image_list[$i]; ?>" class="img-fluid img-thumbnail" alt="attached-img" width="80">
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                    <?php
                                                            }
                                                        // echo '<tr><td><input type="submit" class="btn btn-lighten-danger" name="btnDeleteImages" value="Delete Selected Images"</td></tr></table>';
                                                        echo '<div class="row mt-2 mb-2"><div class="col-12"><input type="submit" class="btn btn-lighten-danger" name="btnDeleteImages" value="Delete Selected Images"></div></div>';
                                                        
                                                    }
                                                }
                                                ?>
                                                </ul>
                                            </div>    
                                        </div>
                                    </div> -->
                                    <!-- multi images -->

                                    <!-- pdf -->
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">PDF File</label>
                                        <div class="col-sm-12">
                                            <input type="file" id="download_file" name="download_file" class="dropify" data-default-file="<? if($row['pdf_file']!=''){echo "../download_pdf/".$row['pdf_file'];}?>" />
                                            <? if($row['pdf_file']!=''){?>
                                                <a href="curriculum_upload.php?id=<?php echo $row['curriculum_id']; ?>&PDF=Del" class="btn btn-lighten-danger" onClick="return confirm('Are you sure want to delete?');">Delete</a>
                                            <? } ?>
                                            <input type="hidden" id="frontimgpdf2" name="frontimgpdf2" value="<?php echo $row['pdf_file']?>"  />
                                        </div>
                                    </div>


                                    <!-- <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label"><span style="color:#F00; font-weight:bold;">*</span> Meta Tag Title</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="meta_tag_title" name="meta_tag_title" placeholder="Meta Tag Title" value="<?php echo $row[8]?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">Meta Tag Description</label>
                                        <div class="col-sm-12">
                                            <textarea cols="5" rows="5" class="form-control" id="meta_tag_description" name="meta_tag_description" placeholder="Meta Tag Description"><?php echo $row[9]?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">Meta Tag Keywords</label>
                                        <div class="col-sm-12">
                                            <textarea cols="5" rows="5" class="form-control" id="meta_tag_keywords" name="meta_tag_keywords" placeholder="Meta Tag Keywords"><?php echo $row[10]?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">curriculum Video</label>
                                        <div class="col-sm-12">
                                            <textarea cols="5" rows="5" class="form-control" id="curriculum_video" name="curriculum_video" placeholder="Embeded code of the video"><?php echo $row[16]?></textarea>
                                        </div>
                                    </div> -->

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" name="updateCurriculum" id="updateCurriculum" class="btn btn-success">Update</button>
                                            <button type="submit" name="myButton" id="myButton" class="btn btn-lighten-danger" onClick="window.location.href='curriculumView.php'; return false;">Cancel</button>
                                        </div>
                                    </div>

                                    <? } ?>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- End page -->

    
    <!-- form-upload init -->
    <script src="assets/js/pages/form-fileupload.init.js"></script>
    
    <!-- ckeditor -->
    <script src="assets/libs/ckeditor/ckeditor.js"></script>
    
    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>
    
    <!-- Tree view js -->
    <script src="assets/libs/treeview/jstree.min.js?v=<?echo time();?>"></script>
    <script src="assets/js/pages/treeview.init.js"></script>
    
    <!-- App js -->
    <script src="assets/js/app.min.js?v=<?echo time();?>"></script>

    <!-- dropify js -->
    <script src="assets/libs/dropify/dropify.min.js"></script>
    
    <!-- form-upload init -->
    <script src="assets/js/pages/form-fileupload.init.js"></script>

</body>


</html>