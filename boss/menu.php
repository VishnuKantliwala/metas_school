<? global $pageID; ?>
<div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!-- User box -->
                    <div class="user-box text-center">
                        <!-- <img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-lg"> -->
                        <div class="">
                            <a href="#" class="text-dark h5 mt-2 mb-1 d-block" data-toggle="dropdown">
                            <?
                                echo $_SESSION['user'];
                            ?>
                            </a>
                        </div>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="logout.php" class="text-custom">
                                    <i class="mdi mdi-power text-danger"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="index.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="logoView.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Logo </span>
                                </a>
                            </li>

                            <li>
                                <a href="homeVideo.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Home Video </span>
                                </a>
                            </li>

                            <li>
                                <a href="pageView.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Information </span>
                                </a>
                            </li>

                            <li>
                                <a href="teamView.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span>  Administrative Body   </span>
                                </a>
                            </li>

                            <li>
                                <a href="projectView.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <!-- <span> Project </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="projectCatView.php"> Category </a></li>
                                    <li><a href="projectView.php"> -->
                                     Fee Structure </a></li>
                                <!-- </ul> -->
                            </li>

                            <li>
                                <a href="serviceView.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <!-- <span> Academics </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="serviceCatView.php"> Category </a></li>
                                    <li><a href="serviceView.php"> -->
                                     Academics </a></li>
                                <!-- </ul> -->
                            </li>

                            <li>
                                <a href="admissionView.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Admission </span>
                                </a>
                            </li>

                            <li>
                                <a href="categoryview.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> School Life </span>
                                </a>
                            </li>                           

                            

                            <!-- <li>
                                <a href="careerView.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Dynamic Menu </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="dmenuView.php">Category</a></li>
                                    <li><a href="submenuView.php">Menu</a></li>
                                </ul>
                            </li> -->

                           

                            <li>
                                <a href="#">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Extramarks Online Learning </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="productView.php">Extramarks Online Learning</a></li>
                                    <li><a href="councilView.php">Council Circulars (CISCE) </a></li>                                   
                                </ul>
                            </li>

                            <li>
                                <a href="downloadCatView.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> School Content </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="downloadCatView.php"> Category </a></li>
                                    <li><a href="downloadView.php"> School Content </a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="blogCatView.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Blog </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="blogCatView.php">Category</a></li>
                                    <li><a href="blogView.php">Blogs</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="videoCatView.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Videos </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="videoCatView.php"> Category </a></li>
                                    <li><a href="videoView.php"> Videos </a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="galleryCatView.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Gallery </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="galleryCatView.php"> Category </a></li>
                                    <li><a href="galleryView.php"> Gallery </a></li>
                                </ul>
                            </li>


                            <li>
                                <a href="eventView.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Event </span>
                                </a>
                            </li>

                            <li>
                                <a href="openingsView.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Current Opening </span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="sliderView.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Slider </span>
                                </a>
                            </li>

                           

                            <li>
                                <a href="contactView.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Contact </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="contactView.php">Contact</a></li>
                                    <li><a href="contact_infoView.php">Contact Information</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="faviconView.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Favicon </span>
                                </a>
                            </li>

                            <li>
                                <a href="clientView.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Client </span>
                                </a>
                            </li>

                            <li>
                                <a href="testimonialView.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Testimonial </span>
                                </a>
                            </li>

                            

                            <li>
                                <a href="careerView.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Career </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="careerView.php">Career's</a></li>
                                    <li><a href="careerInfoView.php">Applicants</a></li>
                                </ul>
                            </li>

                            <!-- <li>
                                <a href="faqView.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> FAQ's </span>
                                </a>
                            </li> -->

                            <li>
                                <a href="socialView.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Socialmedia </span>
                                </a>
                            </li>

                            <!-- <li>
                                <a href="newsletterView.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Newsletter </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="newsletterView.php">NewsLetters</a></li>
                                    <li><a href="newslettersubscriberView.php">Email</a></li>
                                </ul>
                            </li> -->

                            <li>
                                <a href="changepass.php">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Change Password </span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="logout.php">
                                    <i class="fas fa-door-open"></i>
                                    <span> Log-out </span>
                                </a>
                            </li>
                            
                        </ul>


                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>