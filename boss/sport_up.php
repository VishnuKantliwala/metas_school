<?php
session_start();
if(!isset($_SESSION['user']))
{
	header("location:Login.php");
}

include_once("../connect.php");
include_once("../navigationfun.php");
include_once("../sitemap.php");
$con=new connect();
$con->connectdb();
$pageID= 'page26';

$sport_id=$_GET['sport_id'];

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
                    <h4 class="page-title-main">Sport</h4>
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
                                <h4 class="mt-0 header-title">Sport Form</h4>
                                <form class="form-horizontal" method="post" action="sport_upload.php" id="myform" name="myform" enctype="multipart/form-data">
                                    <input type="hidden" name="page" id="page" value="<? echo isset($_GET['page']);?>">
                                    
                                    <?php
                                    $records=$con->selectdb("SELECT * FROM tbl_sport where sport_id=".$sport_id."");
                                    while($row=mysqli_fetch_array($records))
                                    {
                                    ?>
                                    <input type="hidden" name="sport_id" id="sport_id" value="<?php echo $row[0]; ?>" />	
                                    

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">Slug</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="<?php echo $row[10]; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">Sport Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="sport_name" name="sport_name" value="<?php echo $row[1]; ?>" placeholder="Sport Name">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">Overview</label>
                                        <div class="col-sm-12">
                                            <textarea cols="80" class="ckeditor" id="description" name="description" rows="10"><? echo $row[2];?></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">Image</label>
                                        <div class="col-sm-4">
                                            <input type="file" id="frontimg" name="frontimg" class="dropify" data-default-file="<? if($row[4]!=''){echo "../sport/".$row[4];}?>"/>
                                            <? if($row[4]!=''){?>
                                                <a href="sport_upload.php?id=<?php echo $row[0]; ?>&ProImage=Del" class="btn btn-lighten-danger" onClick="return confirm('Are you sure want to delete?');">Delete</a>
                                            <? } ?>
                                            <input type="hidden" id="frontimg2" name="frontimg2" value="<?php echo $row[4]?>"  />
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label"><span style="color:#F00; font-weight:bold;">*</span> Meta Tag Title</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="meta_tag_title" name="meta_tag_title" placeholder="Meta Tag Title"  value="<?php echo $row[7]?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">Meta Tag Description</label>
                                        <div class="col-sm-12">
                                            <textarea cols="5" rows="5" class="form-control" id="meta_tag_description" name="meta_tag_description" placeholder="Meta Tag Description" ><?php echo $row[8]?></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">Meta Tag Keywords</label>
                                        <div class="col-sm-12">
                                            <textarea cols="5" rows="5" class="form-control" id="meta_tag_keywords" name="meta_tag_keywords" placeholder="Meta Tag Keywords"><?php echo $row[9]?></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-12">
                                            <button type="submit" name="updateProduct" id="updateProduct" class="btn btn-success">Update</button>
                                            <button type="submit" name="myButton" id="myButton" class="btn btn-lighten-danger" onClick="window.location.href='sportView.php'; return false;" >Cancel</button>
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


    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- dropify js -->
    <script src="assets/libs/dropify/dropify.min.js"></script>

    <!-- form-upload init -->
    <script src="assets/js/pages/form-fileupload.init.js"></script>
    
    <!-- ckeditor -->
    <script src="assets/libs/ckeditor/ckeditor.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>
    
    <!-- Init js-->
    <script src="assets/js/pages/form-advanced.init.js"></script>
    
    <!-- Tree view js -->
    <script src="assets/libs/treeview/jstree.min.js?v=<?echo time();?>"></script>
    <script src="assets/js/pages/treeview.init.js?v=<?echo time();?>"></script>
    

</body>

</html>