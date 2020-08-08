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
        <title><?echo $row1['meta_tag_title']?> || METAS ADVENTIST SCHOOL</title>
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
                                    <a href="Home/"><img style="width:215px;" src="logo/big_img/<?php echo $row['image_name']; ?>" alt="logo"></a>
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
                                        <ul class="nav-menu">
                                            <!-- <li class="current-menu-item" ><a href="javascript:void(0)">Home</a> </li> -->
									<li class="menu-item-has-children">
										<a href="javascript:void(0)">About</a>
										<ul class="sub-menu">
											<li><a href="about.php"> Who we are  </a></li>
											<li><a href="#"> About School </a></li>
											<li><a href="administrative-body.php"> Administrative Body  </a></li>
											<!-- <li><a href="javascript:void(0)"> Our Mission, Vision & Core Values  </a></li>	-->
										</ul>
									</li>
	
									<li class="menu-item-has-children">
										<a href="javascript:void(0)">Academics</a>
										<ul class="sub-menu">
											<li><a href="course.php"> Courses of Study  </a></li>
											<li><a href="exam-rule.php">  Examination Rules </a></li>													
											<li><a href="#"> Promotion Guidelines  </a></li>													
											<li><a href="#">  Counselling Day </a></li>													
											<li><a href="#"> Facilities </a></li>													
										</ul>
									</li>
	
									<li class="menu-item-has-children">
										<a href="javascript:void(0)">Admission</a>
										<ul class="sub-menu">
                                            <li><a href="fee.php">Fee Structure</a> </li>
											<li><a href="add-criteria.php"> Admission Criteria  </a></li>
											<li><a href="admission-process.php">  Procedure </a></li>
											<li><a href="#"> Rules & Regulations  </a></li>
                                            <li><a href="javascript:void(0)">  Transport & Travel </a></li>
                                            <li><a href="javascript:void(0)">  Uniform & Books </a></li>
										</ul>
									</li>
									


                                    <li class="menu-item-has-children">
										<a href="javascript:void(0)">School Life</a>
										<ul class="sub-menu">
											<li><a href="#"> Overview  </a></li>
											<li><a href="timing-school.php">  Timings of School Day </a></li>
                                            <li><a href="#">  Curriculum </a></li>	
                                            <!-- <li><a href="javascript:void(0)"> Assessment & Monitoring </a></li> -->
                                            <li class="menu-item-has-children">
                                                <a href="javascript:void(0)">Co-curricular Activities</a>
                                                <ul class="sub-menu">
                                                    <li><a href="house.php"> Houses  </a></li>
                                                    <li class="menu-item-has-children">
                                                        <a href="javascript:void(0)">Sports</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="sport.php"> Cricket  </a></li>
                                                            <li><a href="sport.php">  Basketball </a></li>																															
                                                            <li><a href="sport.php"> Football  </a></li>
                                                            <li><a href="sport.php"> Volleyball  </a></li>
                                                            <li><a href="sport.php"> Badminton  </a></li>
                                                            <li><a href="sport.php"> Roller Skating  </a></li>
                                                            <li><a href="sport.php"> Inline Skating</a></li>
                                                            <li><a href="sport.php"> Kabbadi  </a></li>
                                                        </ul>
                                                    </li>	
                                                    <li><a href="school-band.php"> School Band  </a></li>																													
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="javascript:void(0)">Outdoor Learning</a>
                                                <ul class="sub-menu">
                                                    <li><a href="outdoor-learning.php"> Field Trips  </a></li>                                                    																														
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="javascript:void(0)">Leisure & recreation</a>
                                                <ul class="sub-menu">
                                                    <li><a href="picnic.php"> Picnics </a></li>                                                    																														
                                                    <li><a href="tour.php"> Excursions & Tours  </a></li>                                                    																														
                                                </ul>
                                            </li>
                                            <!-- <li><a href="javascript:void(0)"> Student Well-being  </a></li> -->
										</ul>
									</li>


									<li class="menu-item-has-children">
										<a href="javascript:void(0)">Media</a>
										<ul class="sub-menu">
											<li><a href="gallery.php"> Gallery  </a></li>
											<li><a href="video.php">  Videos </a></li>	
                                            <li><a href="javascript:void(0)">  Crescent Magazine </a></li>																															
										</ul>
									</li>
									<li class="menu-item-has-children">
										<a href="javascript:void(0)">Online-Learning</a>
										<ul class="sub-menu">
											<li><a href="extra-marks.php"> Extramarks Online Learning  </a></li>
											<li><a href="council-circulars.php">  Council Circulars (CISCE) </a></li>
											
                                                
                                            <li class="menu-item-has-children">
                                                <a href="javascript:void(0)">School Content 2020-21</a>
                                                <ul class="sub-menu subtosub">
                                                    <li><a href="school-content.php"> Jr.Kg.  </a></li>
                                                    <li><a href="school-content.php"> Sr.Kg. </a></li>
                                                    <li><a href="school-content.php"> l std </a></li>	
                                                    <li><a href="school-content.php"> ll std </a></li>	
                                                    <li><a href="school-content.php"> lll std </a></li>	
                                                    <li><a href="school-content.php"> lV std </a></li>	
                                                    <li><a href="school-content.php"> V std </a></li>	
                                                    <li><a href="school-content.php"> Vl std </a></li>	
                                                    <li><a href="school-content.php"> Vll std </a></li>	
                                                    <li><a href="school-content.php"> Vlll std </a></li>	
                                                    <li><a href="school-content.php"> IX std </a></li>	
                                                    <li><a href="school-content.php"> X std </a></li>
                                                    <li><a href="school-content.php"> Xl std </a></li>
                                                    <li><a href="school-content.php"> Xll std </a></li>																																
                                                </ul>
                                            </li>

										</ul>
									</li>
									<li class="menu-item-has-children">
										<a href="javascript:void(0)">Career</a>
										<ul class="sub-menu">
											<li><a href="hr.php"> HR Dept  </a></li>
											<li><a href="current-opening.php">  Current Openings</a></li>																															
										</ul>
									</li>
                                    <li><a href="javascript:void(0)">Alumni</a> </li>
									<li><a href="contact.php">Contact</a> </li>
                                            <!-- Home -->


                                           
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
       