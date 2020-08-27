   <!-- Footer Start -->
   <footer id="rs-footer" class="bg3 rs-footer">
       <?
    $sqlContact = $cn->selectdb("SELECT `con_id`, `maptag`, `contact_desc`, `email`, `contact_no`, `opening_hours`, `meta_tag_title`, `meta_tag_description`, `meta_tag_keywords` FROM  `tbl_contact` where con_id=1" );
    //	echo $cn->numRows($sql2);
    if ($cn->numRows($sqlContact) > 0) 
    {
        $rowContact = $cn->fetchAssoc($sqlContact);
        extract($rowContact);
        $contact_no_arr = explode(',',$contact_no);
        if(sizeof($contact_no_arr) > 1)
        {
            $contact_no1 = $contact_no_arr[0];
            $contact_no2 = $contact_no_arr[1];
        }
        else
        {
            $contact_no1 = $contact_no;
            $contact_no2 = "";
        }

        $email_arr = explode(',',$email);
        if(sizeof($email_arr) > 1)
        {
            $email1 = $email_arr[0];
            $email2 = $email_arr[1];
        }
        else
        {
            $email1 = $email;
            $email2 = "";
        }
    ?>
       <div class="container">
           <!-- Footer Address -->
           <div>
               <div class="row footer-contact-desc">
                   <div class="col-md-4">
                       <div class="contact-inner">
                           <i class="color2 fa fa-map-marker"></i>
                           <h4 class="contact-title">Address</h4>
                           <p class="contact-desc">
                               <?echo strip_tags($contact_desc) ?>
                           </p>
                       </div>
                   </div>
                   <div class="col-md-4">
                       <div class="contact-inner">
                           <i class="color2 fa fa-phone"></i>
                           <h4 class="contact-title">Phone Number</h4>
                           <p class="contact-desc">
                               <?echo $contact_no1 ?><br>
                               <?echo $contact_no2 ?>
                           </p>
                       </div>
                   </div>
                   <div class="col-md-4">
                       <div class="contact-inner">
                           <i class="color2 fa fa-envelope"></i>
                           <h4 class="contact-title">Email Address</h4>
                           <p class="contact-desc">
                               <?echo $email1 ?><br>
                               <?echo $email2 ?>
                           </p>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <?
    }
    ?>
       <!-- Footer Top -->
       <div class="footer-top">
           <div class="container">
               <div class="row">
                   <div class="col-lg-3 col-md-12">
                       <div class="about-widget">
                           <?	
                        $sqlLogo = $cn->selectdb("SELECT `logo_id`, `image_name` FROM  `tbl_logo` where logo_id=1" );
                        if ($cn->numRows($sqlLogo) > 0) 
                        {
                            $rowLogo = $cn->fetchAssoc($sqlLogo);
                            extract($rowLogo);
                        
                        ?>
                           <img src="logo/big_img/<?echo $image_name?>" alt="Metas school">
                           <?
                        }
                        ?>
                           <?
                        $sqlAbt = $cn->selectdb("SELECT page_desc from tbl_page where page_id = 46");
                        if( $cn->numRows($sqlAbt) > 0 )
                        {
                        while($rowAbt = $cn->fetchAssoc($sqlAbt))
                        {
                            extract($rowAbt);
                        ?>
                           <p align="justify">
                               <?echo substr(strip_tags($page_desc),0,205);?>...</p>
                           <div class="news-btn">
                               <a href="about-school" tabindex="0"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                   Read More</a>
                           </div>
                           <?
                        }
                        }
                        ?>
                       </div>
                   </div>

                   <div class="col-lg-3 col-md-12">
                       <h5 class="footer-title">QUICK ACCESS</h5>
                       <ul class="sitemap-widget">
                           <li><a href="rules-and-regulations"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                   Rrules And Regulations </a></li>
                           <li><a href="courses"><i class="fa fa-angle-right" aria-hidden="true"></i> Courses </a></li>
                           <li><a href="facilities"><i class="fa fa-angle-right" aria-hidden="true"></i> Facilities </a>
                           </li>

                           <li><a href="photo-gallery"><i class="fa fa-angle-right" aria-hidden="true"></i> Gallery </a>
                           </li>
                           <li><a href="current-openings"><i class="fa fa-angle-right" aria-hidden="true"></i> Career
                               </a></li>

                           <li><a href="alumni-list"><i class="fa fa-angle-right" aria-hidden="true"></i>Our Alumni </a>
                           </li>

                       </ul>
                   </div>

                   <div class="col-lg-3 col-md-12">
                       <h5 class="footer-title">School Life</h5>
                       <ul class="sitemap-widget">
                           <li><a href="school-timings"><i class="fa fa-angle-right" aria-hidden="true"></i> Timing of
                                   school day </a></li>
                           <li><a href="fee-structure"><i class="fa fa-angle-right" aria-hidden="true"></i> Fee
                                   Structure </a></li>

                           <li><a href="curriculum"><i class="fa fa-angle-right" aria-hidden="true"></i> Curriculum </a>
                           </li>
                           <li><a href="field-trips"><i class="fa fa-angle-right" aria-hidden="true"></i> Field Trips
                               </a></li>
                           <li><a href="picnics"><i class="fa fa-angle-right" aria-hidden="true"></i> Picnics </a></li>
                           <li><a href="tours"><i class="fa fa-angle-right" aria-hidden="true"></i> Tours </a></li>

                       </ul>
                   </div>

                   <div class="col-md-3 col-sm-12">
                       <h5 class="footer-title">RECENT POSTS</h5>
                       <div class="recent-post-widget">
                        <?    
                        $qry="SELECT blog_name,description,blog_image,bdate,slug FROM tbl_blog ORDER BY blog_id DESC LIMIT 3";
                        $result=$cn->selectdb($qry);        
                        if($cn->numRows($result)>0)
                        {
                            while ($row=$cn->fetchAssoc($result)) 
                            {
                                extract($row);
                                $href = "blog-detail".urlencode($slug);
                        ?>
                           <div class="post-item">
                               <div class="post-date">
                                   <span><?php echo date('d', strtotime($bdate));?></span>
                                   <span><?php echo date('F', strtotime($bdate));?></span>
                               </div>
                               <div class="post-desc">
                                   <h5 class="post-title"><a href="<?echo $href?>"><?echo substr($blog_name,0,33) ?>..</a></h5>
                               </div>
                           </div>
                        <?
                            }
                        }
                        ?>
                          
                       </div>
                   </div>
               </div>
               <div class="footer-share">
                   <ul>
                       <?
                        $sql = $cn->selectdb("select * from tbl_socialmedia Order by recordListingID");
                        while($row = $cn->fetchAssoc($sql))
                        {
                            extract($row);
                    ?>
                       <li><a href="<?echo $link_url?>" target="_blank"><i class="fa <?echo $icon_name?>"></i></a></li>
                       <?
                        }
                    ?>
                   </ul>
               </div>
           </div>
       </div>

       <!-- Footer Bottom -->
       <div class="footer-bottom">
           <div class="container">
               <div class="copyright">
                   <p style="color:#fff">Copyright 2020 <a style="color:#fff" href="javascript:void(0)">METAS ADVENTIST
                           SCHOOL</a> All rights reserved. Developed By <a href="https://www.icedinfotech.com/"
                           style="color:#fff;font-size:16px" target="_blank">ICED INFOTECH</a> </p>
               </div>
           </div>
       </div>
   </footer>
   <!-- Footer End -->

   <!-- start scrollUp  -->
   <div id="scrollUp">
       <i class="fa fa-angle-up"></i>
   </div>

   <!-- Canvas Menu start -->
   <nav class="right_menu_togle">
       <div class="close-btn"><span id="nav-close" class="text-center">x</span></div>
       <div class="canvas-logo">
           <a href="index.html"><img src="images/logo-white.png" alt="logo"></a>
       </div>
       <ul class="sidebarnav_menu list-unstyled main-menu">
           <!--Home Menu Start-->
           <?include_once("menu.php")?>
           
           
           <!-- 
           <li class="menu-item-has-children"><a href="#">About Us</a>
               <ul class="list-unstyled">
                   <li class="sub-nav active"><a href="index.html">About One<span class="icon"></span></a></li>
                   <li class="sub-nav"><a href="index2.html">About Two<span class="icon"></span></a></li>
                   <li class="sub-nav"><a href="index3.html">About Three<span class="icon"></span></a></li>
               </ul>
           </li>
           <li class="menu-item-has-children"><a href="#">Pages</a>
               <ul class="list-unstyled">
                   <li class="sub-nav active"><a href="teachers.html">Teachers<span class="icon"></span></a></li>
                   <li class="sub-nav"><a href="teachers-without-filter.html">Teachers Without Filter<span
                               class="icon"></span></a></li>
                   <li class="sub-nav"><a href="teachers-single.html">Teachers Single<span class="icon"></span></a></li>
                   <li class="sub-nav"><a href="gallery.html">Gallery One<span class="icon"></span></a></li>
                   <li class="sub-nav"><a href="gallery2.html">Gallery Two<span class="icon"></span></a></li>
                   <li class="sub-nav"><a href="gallery3.html">Gallery Three<span class="icon"></span></a></li>
                   <li class="sub-nav"><a href="shop.html">Shop<span class="icon"></span></a></li>
                   <li class="sub-nav"><a href="shop-details.html">Shop Details<span class="icon"></span></a></li>
                   <li class="sub-nav"><a href="cart.html">Cart<span class="icon"></span></a></li>
                   <li class="sub-nav"><a href="shop.html">Shop<span class="icon"></span></a></li>
                   <li class="sub-nav"><a href="error-404.html">Error 404<span class="icon"></span></a></li>
               </ul>
           </li>
           <li class="menu-item-has-children"><a href="#">Courses</a>
               <ul class="list-unstyled">
                   <li class="sub-nav"><a href="courses.html">Courses<span class="icon"></span></a></li>
                   <li class="sub-nav"><a href="courses2.html">Courses Two<span class="icon"></span></a></li>
                   <li class="sub-nav"><a href="courses-details.html">Courses Details<span class="icon"></span></a></li>
               </ul>
           </li>
           <li class="menu-item-has-children"><a href="#">Events</a>
               <ul class="list-unstyled">
                   <li class="sub-nav"><a href="events.html">Events<span class="icon"></span></a></li>
                   <li class="sub-nav"><a href="events-details.html">Events Details<span class="icon"></span></a></li>
               </ul>
           </li>
           <li class="menu-item-has-children"><a href="#">Blog</a>
               <ul class="list-unstyled">
                   <li class="sub-nav"><a href="blog.html">Blog<span class="icon"></span></a></li>
                   <li class="sub-nav"><a href="blog-details.html">Blog Details<span class="icon"></span></a></li>
               </ul>
           </li>
           <li><a href="contact.html">Contact<span class="icon"></span></a></li> -->
       </ul>
       <div class="search-wrap">
           <label class="screen-reader-text">Search for:</label>
           <input type="search" placeholder="Search..." name="s" class="search-input" value="">
           <button type="submit" value="Search"><i class="fa fa-search"></i></button>
       </div>
   </nav>
   <!-- Canvas Menu end -->

   <!-- Search Modal Start -->
   <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="fa fa-close"></span>
       </button>
       <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content">
               <div class="search-block clearfix">
                   <form>
                       <div class="form-group">
                           <input class="form-control" placeholder="eg: Computer Technology" type="text">
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
   <!-- Search Modal End -->

   <!-- modernizr js -->
   <script src="js/modernizr-2.8.3.min.js"></script>
   <!-- jquery latest version -->
   <script src="js/jquery.min.js"></script>
   <!-- bootstrap js -->
   <script src="js/bootstrap.min.js"></script>
   <!-- owl.carousel js -->
   <script src="js/owl.carousel.min.js"></script>
   <!-- slick.min js -->
   <script src="js/slick.min.js"></script>
   <!-- isotope.pkgd.min js -->
   <script src="js/isotope.pkgd.min.js"></script>
   <!-- imagesloaded.pkgd.min js -->
   <script src="js/imagesloaded.pkgd.min.js"></script>
   <!-- wow js -->
   <script src="js/wow.min.js"></script>
   <!-- counter top js -->
   <script src="js/waypoints.min.js"></script>
   <script src="js/jquery.counterup.min.js"></script>
   <!-- magnific popup -->
   <script src="js/jquery.magnific-popup.min.js"></script>
   <!-- rsmenu js -->
   <script src="js/rsmenu-main.js"></script>
   <!-- Time Circle js -->
   <script src="js/time-circle.js"></script>
   <!-- plugins js -->
   <script src="js/plugins.js"></script>
   <!-- main js -->
   <script src="js/main.js"></script>
   </body>

   </html>