<?php $page_id='3'; include 'header.php' ?> 
        <div class="rs-banner-section2">
           <video width="100%" height="100%" preload="auto" loop autoplay muted webkit-playsinline playsinline>
           <?
            $sqlVideoSlider = $cn->selectdb("select video_file from tbl_video2 where video_id = 1");
            if( $cn->numRows($sqlVideoSlider) > 0 )
            {
                $rowVideoSlider = $cn->fetchAssoc($sqlVideoSlider);
                extract($rowVideoSlider);
                ?>
                <!-- <source src="video.mp4" type="video/mp4"/> -->
                <source src="<?echo $video_file?>" type="video/mp4"/>    
                <?
            }
            else
            {
            ?>
            <source src="video.mp4" type="video/mp4"/>
            <?
            }
            ?>
									  </video>
        </div> 
        <!--Banner Section End-->
		
		<!-- Services Start -->
        <div class="rs-services rs-services-style7 pt-100 pb-100">
            <div class="container">
                <div class="row align-items-center">
                  <div class="col-lg-7">
                     <div class="row pr-30 md-pr-0">
                     <?php
                    $qry2="SELECT title,extra_desc,small_desc,extra_icon FROM tbl_addmore where page_id=5";
                    $result2=$cn->selectdb($qry2);
                        if($cn->numRows($result2)>0){
                            while($row2=$cn->fetchAssoc($result2)){
                ?>

                        <div class="col-lg-6 col-md-6">
                            <div class="Services-wrap mb-30">
                                <div class="Services-item">
                                    <div class="Services-icon">
                                        <img src="icon/big_img/<?php echo $row2['extra_icon'] ?>" alt="">
                                    </div>
                                    <div class="Services-desc">
                                        <i class="<?php echo strip_tags($row2['small_desc']); ?> mb-15"></i>
                                        <h4 class="services-title">
                                            <a href="#"><?php echo $row2['title'] ?></a>
                                        </h4> 
                                    </div>
                                </div>
                            </div>                               
                        </div>   
                    <?php }} ?>                   
                     </div>
                  </div>
                  <div class="col-lg-5 pl-15 pt-30">
                        <div class="content-part">

                        <?php
                            $qry="SELECT page_desc,image FROM tbl_page WHERE page_id=5";
                            $result=$cn->selectdb($qry);
                            if($cn->numRows($result)>0){
                                $row=$cn->fetchAssoc($result);
                        ?>

                            <span class="sub-text">About Us</span>
                            <h2 class="uppercase title pb-20 md-pb-10">Welcome to Metas Adventist School</h2>      
                          <p class="pb-20" align="justify">
                          <?php echo substr(strip_tags($row['page_desc']),0,450);?>...
                          </p>

                         
                          <div class="btn-part">
                              <a class="readon2" href="About-Us/"> Read More</a>
                          </div>
                            <?php } ?>
                      </div>
                  </div>
                </div>
            </div>
        </div>
		<!-- Services End -->
        
        <!-- Counter Up Section Start-->
        <div class="rs-counter-style7 pt-100 pb-100 bg10">
            <div class="container">
                <div class="row">

                <?php
                    $qry2="SELECT title,extra_desc,small_desc,extra_icon FROM tbl_addmore where page_id=10";
                    $result2=$cn->selectdb($qry2);
                        if($cn->numRows($result2)>0){
                            while($row2=$cn->fetchAssoc($result2)){
                ?>

                    <div class="col-lg-3 col-md-6">
                        <div class="rs-counter-list">
                              <div class="icon-part">
                                    <i class="<?php echo strip_tags($row2['small_desc']); ?>"></i>
                             </div>
                            <div class="text-part">
                                <h2 class="counter-number plus"><?php echo strip_tags($row2['extra_desc']); ?></h2>                  
                                <h4 class="counter-desc">+ <?php echo $row2['title'] ?></h4>
                            </div>
                        </div>
                    </div> 
                    <?php } } ?>   
                   
                </div>
            </div>
        </div>
        <!-- Counter Down Section End -->

	<!-- Testimonial Start -->
    <div id="rs-testimonial-3" class="rs-testimonial-3 pt-100 pb-40 sec-color">
        <div class="container">
            <div class="sec-title-2">
                <h2>Courses of Study</h2>      
                <!-- <p>Fusce sem dolor, interdum in efficitur at, faucibus nec lorem. Sed nec molestie justo.</p> -->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div  class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="false" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="false" data-md-device="3" data-md-device-nav="true" data-md-device-dots="false">
                        
                        <!-- Testimonial style3 Start -->
                        <div class="testimonial-style3">
                            <div class="image"> 
                                <i class="flaticon-tool-1" style="font-size: 50px;line-height: 80px;"></i>
                            </div>
                            <h5 class="title">ELEMENTARY (Std. I to V)</h5>
                            <p class="description">
                                <strong>Schedule of Studies : </strong>
								English, Hindi, Mathematics, General Science, Social Studies, Computers...
                            </p>
                            <div class="testimonial-content">
                                <div class="testimonial-profile">
                                    <h3 class="name">Read More</h3>                                   
                                </div>
                              
                            </div>
                        </div>
                     
                        
                        <div class="testimonial-style3">
                            <div class="image"> 
                                <i class="flaticon-tool-1" style="font-size: 50px;line-height: 80px;"></i>
                            </div>
                            <h5 class="title">PRIMARY (Std. VI to VIII)</h5>
                            <p class="description">
                                <strong>Schedule of Studies : </strong>
                                English, Hindi ,Mathematics, Physics, Chemistry , Biology, History & Civics...
                            </p>
                            <div class="testimonial-content">
                                <div class="testimonial-profile">
                                    <h3 class="name">Read More</h3>                                   
                                </div>
                              
                            </div>
                        </div>


                        <div class="testimonial-style3">
                            <div class="image"> 
                                <i class="flaticon-tool-1" style="font-size: 50px;line-height: 80px;"></i>
                            </div>
                            <h5 class="title">SECONDARY (Std. IX and X - ICSE)</h5>
                            <p class="description">
                                <strong>Schedule of Studies : </strong>
								For ICSE Examination, each and every student must take the following...
                            </p>
                            <div class="testimonial-content">
                                <div class="testimonial-profile">
                                    <h3 class="name">Read More</h3>                                   
                                </div>
                              
                            </div>
                        </div>

                        <div class="testimonial-style3">
                            <div class="image"> 
                                <i class="flaticon-tool-1" style="font-size: 50px;line-height: 80px;"></i>
                            </div>
                            <h5 class="title">HIGHER SECONDARY (Std. XI and XII - ISC)</h5>
                            <p class="description">
                                <strong>Schedule of Studies : </strong>
								For the ISC examination, every student is required to take ENGLISH ...
                            </p>
                            <div class="testimonial-content">
                                <div class="testimonial-profile">
                                    <h3 class="name">Read More</h3>                                   
                                </div>
                              
                            </div>
                        </div>
                     
                       
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


      
     
       

        <!-- Team Start -->
        <div id="rs-team-style7" class="rs-team-style7 sec-spacer">
            <div class="blue-overlay"></div>
            <div class="container">
                <div class="sec-title2 mb-50 text-center">
                	   <span class="title">Our Expert Advisor</span>
                       <h2 class="title"> Meet Our Expert Teacher</h2> 
                </div>
				<div class="rs-carousel owl-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="false" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="4" data-md-device-nav="true" data-md-device-dots="true">

                <?php
                    $qry2="SELECT image_name,team_title,description FROM tbl_team";
                    $result2=$cn->selectdb($qry2);
                        if($cn->numRows($result2)>0){
                            while($row=$cn->fetchAssoc($result2)){
                ?>
                    <div class="item">
                        <div class="item-team">
                            <div class="team-img">
                                <img src="team/big_img/<?php echo $row['image_name'] ?>" alt="">                            
                            </div>
                            <div class="team-content">
                                <h3 class="team-name"><a href="#"><?php echo $row['team_title'] ?></a></h3>
                                <span class="sub-title"><?php echo $row['description'] ?></span>
                            </div>
                        </div>
                    </div>  
                    <?php }} ?>
                    
                   
				</div>
			</div>
		</div>
        <!-- Team End -->

      	<!-- Events Start -->
          <div id="rs-events" class="rs-events sec-spacer gray-color">
			<div class="container">
				<div class="row rs-vertical-middle">
				    <div class="col-lg-4 col-md-12">
				    	<div class="sec-title mb-30">

                        <?php
                            $qry="SELECT page_desc,image,page_name FROM tbl_page WHERE page_id=11";
                            $result=$cn->selectdb($qry);
                            if($cn->numRows($result)>0){
                                $row=$cn->fetchAssoc($result);
                        ?>

						    <h2><?php echo $row['page_name'] ?></h2>      
							<!-- <p>Fusce sem dolor inter in efficitur faucibus.</p> -->
				    	</div>
				    	<p class="mobile-mb-50">
                        <?php echo $row['page_desc'] ?>
				    	</p>
                    </div>
                    <?php } ?>
			        <div class="col-lg-8 col-md-12">
						<div class="rs-carousel owl-carousel rs-navigation-2" data-loop="true" data-items="2" data-margin="30" data-autoplay="false" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="2" data-md-device-nav="true" data-md-device-dots="true">

                        <?php
                            $qry2="SELECT image_name,event_title,event_date,description,slug,meta_tag_keywords,meta_tag_description FROM tbl_event ORDER BY event_id DESC LIMIT 5";
                            $result2=$cn->selectdb($qry2);
                                if($cn->numRows($result2)>0){
                                while($row=$cn->fetchAssoc($result2)){
                        ?>

			                <div class="event-item">
			                    <div class="event-img">
			                        <img src="event/big_img/<?php echo  $row['image_name'] ?>" alt="" />
                                    <a class="image-link" href="Event-Detail/<?php echo $row['slug'] ?>/" title="<?php echo  $row['event_title'] ?>">
                                        <i class="fa fa-link"></i>
                                    </a>
			                    </div>
                                <div class="events-details sec-color">
                                    <div class="event-date">
                                        <i class="fa fa-calendar"></i>
                                        <span><?php echo date('d F Y', strtotime($row['event_date']));?></span>
                                    </div>
                                    <h4 class="event-title"><a href="Event-Detail/<?php echo $row['slug'] ?>/"><?php echo  $row['event_title'] ?></a></h4>
                                    <div class="event-meta">
                                        <div class="event-time">
                                            <i class="fa fa-clock-o"></i>
                                            <span><?php echo $row['meta_tag_description'] ?></span>
                                        </div>
                                        <div class="event-location">
                                            <i class="fa fa-map-marker"></i>
                                            <span><?php echo $row['meta_tag_keywords'] ?></span>
                                        </div>
                                    </div>
                                    <div class="event-btn">
                                        <a href="Event-Detail/<?php echo $row['slug'] ?>/">Read More <i class="fa fa-angle-double-right"></i></a>
                                    </div>
		                    	</div>
                            </div>
                        <?php }} ?>
			                
			            </div>
			        </div>
			    </div>
			</div>
        </div>
        <!-- Events End -->  

  <!-- Testimonial Start -->
  <div id="rs-testimonial" class="rs-testimonial bg5 sec-spacer">
    <div class="container">
        <div class="sec-title mb-50">
            <h2 class="white-color">what our students say</h2>      
            <p class="white-color">Couple of words from our students</p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div  class="rs-carousel owl-carousel" data-loop="true" data-items="2" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="2" data-md-device-nav="true" data-md-device-dots="true">

                <?php
                    $qry="SELECT image_title,image_name,description FROM tbl_testimonial";
                    $result=$cn->selectdb($qry);
                    if($cn->numRows($result)>0){     
                        while ($row=$cn->fetchAssoc($result)) {
                ?> 
                                            
                    <div class="testimonial-item">
                        <div class="testi-img">
                            <img src="testimonial/big_img/<?php echo $row['image_name']; ?>" alt="img">
                        </div>
                        <div class="testi-desc">
                            <h4 class="testi-name"><?php echo $row['image_title']; ?></h4>
                            <p>
                            <?php echo $row['description']; ?>
                            </p>
                        </div>
                    </div>
                <?php } } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->
        
        <!-- Latest News Start -->
        <div id="rs-latest-news" class="rs-latest-news sec-spacer">
			<div class="container">
				<div class="row rs-vertical-middle">
				    <div class="col-lg-4 col-md-12">
                    <?php
                            $qry="SELECT page_desc,image,page_name FROM tbl_page WHERE page_id=12";
                            $result=$cn->selectdb($qry);
                            if($cn->numRows($result)>0){
                                $row=$cn->fetchAssoc($result);
                        ?>
				    	<div class="sec-title mb-30">
						    <h2><?php echo $row['page_name'] ?></h2>      
							<p>Latest Blogs and Updates</p>
				    	</div>
				    	<p class="mobile-mb-50">
                        <?php echo $row['page_desc'] ?>
                        </p>
                            <?php } ?>
				    </div>
			        <div class="col-lg-8 col-md-12">
			        	<div class="row">
			        		<div class="col-md-9">
					        	<div class="latest-news-slider">

                                <?php
                        $qry="SELECT blog_name,description,blog_image,bdate,slug FROM tbl_blog ORDER BY blog_id DESC LIMIT 3";
                        $result=$cn->selectdb($qry);        
                        if($cn->numRows($result)>0){
                            while ($row=$cn->fetchAssoc($result)) {
                    ?>

					        		<div>
										<div class="news-normal-block">
						                    <div class="news-img">
						                    	<a href="Blog-Detail/<?php echo $row['slug'];?>/">
						                        	<img src="blog/big_img/<?php echo $row['blog_image']; ?>" alt="" />
						                    	</a>
						                    </div>
					                    	<div class="news-date">
					                    		<i class="fa fa-calendar-check-o"></i>
					                    		<span><?php echo date('d F Y', strtotime($row['bdate']));?></span>
					                    	</div>
					                    	<h4 class="news-title"><a href="Blog-Detail/<?php echo $row['slug'];?>/"><?php echo $row['blog_name']; ?></a></h4>
					                    	<div class="news-desc">
					                    		<p>
                                                <p><?php echo substr($row['description'],0,120) ; ?>...</p>
					                    		</p>
					                    	</div>
					                    	<div class="news-btn">
					                    		<a href="Blog-Detail/<?php echo $row['slug'];?>/">Read More</a>
					                    	</div>
						                </div>			        			
                                    </div>
                                    
                        <?php }} ?>
					        		
					        	</div>			        			
			        		</div>
			        		<div class="col-md-3">			        			
					        	<div class="latest-news-nav">
                                <?php
                        $qry="SELECT blog_image FROM tbl_blog ORDER BY blog_id DESC LIMIT 3";
                        $result=$cn->selectdb($qry);        
                        if($cn->numRows($result)>0){
                            while ($row=$cn->fetchAssoc($result)) {
                    ?>
									<div><img src="blog/<?php echo $row['blog_image']; ?>" alt="" /></div>
                            <?php }}	?>
								</div>
			        		</div>
			        	</div>
			        </div>
			    </div>
			</div>
        </div>
        <!-- Latest News End -->  
<?php include 'footer.php' ?>