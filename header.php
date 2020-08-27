<?php
    include 'connect.php';
    include 'navigationfun.php';
    $cn=new connect();
    $cn->connectdb();
    $sql = $cn->selectdb("SELECT * FROM  `tbl_page` where page_id=$page_id" );
    // echo mysqli_num_rows($sql2);
       if (mysqli_num_rows($sql) > 0) 
       {
          $row1 = mysqli_fetch_assoc($sql);
       }
    
       if(isset($_GET['id']))
       {
          $sql = $cn->selectdb("SELECT meta_tag_title,meta_tag_description,meta_tag_keywords FROM  `tbl_gallery` where slug='".$_GET['id']."'" );
          if (mysqli_num_rows($sql) > 0) 
          {
             $row1 = mysqli_fetch_assoc($sql);
             
             
          }
       }
       if(isset($_GET['pid']))
       {
          $sql = $cn->selectdb("SELECT meta_tag_title,meta_tag_description,meta_tag_keywords FROM  `tbl_product` where slug='".$_GET['pid']."'" );
          if (mysqli_num_rows($sql) > 0) 
          {
             $row1 = mysqli_fetch_assoc($sql);
             
             
          }
       }
       if(isset($_GET['bid']))
       {
          $sql = $cn->selectdb("SELECT meta_tag_title,meta_tag_description,meta_tag_keywords FROM  `tbl_blog` where slug='".$_GET['bid']."'" );
          if (mysqli_num_rows($sql) > 0) 
          {
             $row1 = mysqli_fetch_assoc($sql);
             
             
          }
       }
       if(isset($_GET['cid']))
       {
          $sql = $cn->selectdb("SELECT meta_tag_title,meta_tag_description,meta_tag_keywords FROM  `tbl_category` where slug='".$_GET['cid']."'" );
          if (mysqli_num_rows($sql) > 0) 
          {
             $row1 = mysqli_fetch_assoc($sql);
             
             
          }
       }
       if(isset($_GET['aid']))
       {
          $sql = $cn->selectdb("SELECT meta_tag_title,meta_tag_description,meta_tag_keywords FROM  `tbl_alumni` where slug='".$_GET['aid']."'" );
          if (mysqli_num_rows($sql) > 0) 
          {
             $row1 = mysqli_fetch_assoc($sql);
             
             
          }
       }
       if(isset($_GET['coid']))
       {
          $sql = $cn->selectdb("SELECT meta_tag_title,meta_tag_description,meta_tag_keywords FROM  `tbl_openings` where slug='".$_GET['coid']."'" );
          if (mysqli_num_rows($sql) > 0) 
          {
             $row1 = mysqli_fetch_assoc($sql);
             
             
          }
       }

       if(isset($_GET['scid']))
       {
          $sql = $cn->selectdb("SELECT meta_tag_title,meta_tag_description,meta_tag_keywords FROM  `tbl_downloadcategory` where slug='".$_GET['scid']."'" );
          if (mysqli_num_rows($sql) > 0) 
          {
             $row1 = mysqli_fetch_assoc($sql);
             
             
          }
       }
    //    Academics
       if(isset($_GET['academics_id']))
       {
          $sql = $cn->selectdb("SELECT meta_tag_title,meta_tag_description,meta_tag_keywords FROM  `tbl_service` where slug='".$_GET['academics_id']."'" );
          if (mysqli_num_rows($sql) > 0) 
          {
             $row1 = mysqli_fetch_assoc($sql);
             
             
          }
       }
       
       //    Admissions
       if(isset($_GET['admission_id']))
       {
          $sql = $cn->selectdb("SELECT meta_tag_title,meta_tag_description,meta_tag_keywords FROM  `tbl_admission` where slug='".$_GET['admission_id']."'" );
          if (mysqli_num_rows($sql) > 0) 
          {
             $row1 = mysqli_fetch_assoc($sql);
             
             
          }
       }

       //    Course
       if(isset($_GET['course_id']))
       {
          $sql = $cn->selectdb("SELECT meta_tag_title,meta_tag_description,meta_tag_keywords FROM  `tbl_course` where slug='".$_GET['course_id']."'" );
          if (mysqli_num_rows($sql) > 0) 
          {
             $row1 = mysqli_fetch_assoc($sql);
             
             
          }
       }

       //    House
       if(isset($_GET['house_id']))
       {
            $sql = $cn->selectdb("SELECT meta_tag_title,meta_tag_description,meta_tag_keywords FROM  `tbl_house` where slug='".$_GET['house_id']."'" );
            if (mysqli_num_rows($sql) > 0) 
            {
                $row1 = mysqli_fetch_assoc($sql);
            }
       }
       //    Sports
       if(isset($_GET['sport_id']))
       {
            $sql = $cn->selectdb("SELECT meta_tag_title,meta_tag_description,meta_tag_keywords FROM  `tbl_sport` where slug='".$_GET['sport_id']."'" );
            if (mysqli_num_rows($sql) > 0) 
            {
                $row1 = mysqli_fetch_assoc($sql);
            }
       }

       //    School Band
       if(isset($_GET['band_id']))
       {
            $sql = $cn->selectdb("SELECT meta_tag_title,meta_tag_description,meta_tag_keywords FROM  `tbl_band` where slug='".$_GET['band_id']."'" );
            if (mysqli_num_rows($sql) > 0) 
            {
                $row1 = mysqli_fetch_assoc($sql);
            }
       }
       //    Field Trips
       if(isset($_GET['trip_id']))
       {
            $sql = $cn->selectdb("SELECT meta_tag_title,meta_tag_description,meta_tag_keywords FROM  `tbl_trip` where slug='".$_GET['trip_id']."'" );
            if (mysqli_num_rows($sql) > 0) 
            {
                $row1 = mysqli_fetch_assoc($sql);
            }
       }
       //    Picnics
       if(isset($_GET['picnic_id']))
       {
            $sql = $cn->selectdb("SELECT meta_tag_title,meta_tag_description,meta_tag_keywords FROM  `tbl_picnic` where slug='".$_GET['picnic_id']."'" );
            if (mysqli_num_rows($sql) > 0) 
            {
                $row1 = mysqli_fetch_assoc($sql);
            }
       }
       //    Tours
       if(isset($_GET['tour_id']))
       {
            $sql = $cn->selectdb("SELECT meta_tag_title,meta_tag_description,meta_tag_keywords FROM  `tbl_tour` where slug='".$_GET['tour_id']."'" );
            if (mysqli_num_rows($sql) > 0) 
            {
                $row1 = mysqli_fetch_assoc($sql);
            }
       }

       


       $qry="SELECT * FROM tbl_contact";
       $result=$cn->selectdb($qry);
       $a="";$p="";$e="";$oh="";
       if(dbNumRows($result) > 0) {
          $row = dbFetchAssoc($result);
          extract($row);
          $a=strip_tags($contact_desc);
          $p=$contact_no;
          $e=$email;
          $oh=$opening_hours;
       }
    ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- meta tag -->
    <meta charset="utf-8">
    <title>
        <?echo $row1['meta_tag_title']?> || METAS ADVENTIST SCHOOL</title>
    <meta name="description" content="<?echo $row1['meta_tag_description']?>">
    <meta name="keywords" content="<?echo $row1['meta_tag_keywords']?>">
    <meta name="title" content="<?echo $row1['meta_tag_title']?>">
    <!-- responsive tag -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    	$cn->setdomain();
		?>
    <!-- favicon -->

    <?php
    $qry="SELECT image_name FROM tbl_favicon";
    $result=$cn->selectdb($qry);
    if($cn->numRows($result)>0){     
        $row=$cn->fetchAssoc($result)
?>

    <link rel="apple-touch-icon" href="favicon/big_img/<?php echo $row['image_name'];  ?>">
    <link rel="shortcut icon" href="favicon/big_img/<?php echo $row['image_name'];  ?>" />

    <?php } ?>
    <!-- bootstrap v4 css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <!-- animate css -->
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <!-- owl.carousel css -->
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <!-- magnific popup css -->
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
    <!-- Offcanvas CSS -->
    <link rel="stylesheet" type="text/css" href="css/off-canvas.css">
    <!-- flaticon css  -->
    <link rel="stylesheet" type="text/css" href="fonts/flaticon.css">
    <!-- flaticon2 css  -->
    <link rel="stylesheet" type="text/css" href="fonts/fonts2/flaticon.css">
    <!-- rsmenu CSS -->
    <link rel="stylesheet" type="text/css" href="css/rsmenu-main.css">
    <!-- rsmenu transitions CSS -->
    <link rel="stylesheet" type="text/css" href="css/rsmenu-transitions.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Spacing css -->
    <link rel="stylesheet" type="text/css" href="css/spacing.css">
    <!-- responsive css -->
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <!-- Custom -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body class="university-home">
    <!--Preloader area start here-->
    <div class="book_preload">
        <div class="book">
            <div class="book__page"></div>
            <div class="book__page"></div>
            <div class="book__page"></div>
        </div>
    </div>
    <!--Preloader area end here-->

    <!--Full width header Start-->
    <div class="full-width-header">

        <!--Header Start-->
        <header id="rs-header" class="rs-header rs-transfarent-header-style">
            <!-- Menu Start -->
            <div class="menu-area menu-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-12">
                            <?php
                                    $qry="SELECT image_name FROM tbl_logo where logo_id=1";
                                    $result=$cn->selectdb($qry);
                                    if($cn->numRows($result)>0){     
                                    $row=$cn->fetchAssoc($result);
                                ?>
                            <div class="logo-area">
                                <a href="Home/"><img style="width:215px;"
                                        src="logo/big_img/<?php echo $row['image_name']; ?>" alt="logo"></a>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-lg-9 col-md-12">
                            <div class="main-menu">
                                <!-- <div id="logo-sticky" class="text-center">
                                        <a href="index.html"><img src="images/logo.png" alt="logo"></a>
                                    </div> -->
                                    
                                <a class="rs-menu-toggle"><i class="fa fa-bars"></i>Menu</a>
                                <nav class="rs-menu">
                                    <ul class="nav-menu desktop-menu-hide" >
                                        <!-- <li class="current-menu-item" ><a href="javascript:void(0)">Home</a> </li> -->
                                        <?include_once("menu.php")?>
                                        



                                    </ul>

                                    <ul class="nav-menu desktop-menu-show" >
                                        <!-- <li class="current-menu-item" ><a href="javascript:void(0)">Home</a> </li> -->
                                        
                                        <li><a id="nav-expander" class="nav-expander fixed"><i class="fa fa-bars fa-lg white"></i></a></li>



                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Menu End -->
        </header>
        <!--Header End-->

    </div>
    <!--Full width header End-->