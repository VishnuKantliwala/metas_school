<?php $page_id=''; include 'header.php' ?> 



<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
		    <div class="breadcrumbs-inner">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12 text-center">
		                    <h1 class="page-title">Contact Us</h1>
		                    <ul>
		                        <li>
		                            <a class="active" href="index.php">Home</a>
		                        </li>
		                        <li>Contact Us</li>
		                    </ul>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- Breadcrumbs End -->



        <div class="contact-page-section sec-spacer">
        	<div class="container">
        		
        		<div class="row contact-address-section">
    				<div class="col-md-4 pl-0">
    					<div class="contact-info contact-address">
    						<i class="fa fa-map-marker"></i>
    						<h4>Address</h4>
    						<p>24, R K Desai Marg, Near Mission Hospital, Ram Nagar, Athwa Gate, Surat, Gujarat 395001</p>
    						
    					</div>
    				</div>
    				<div class="col-md-4">
    					<div class="contact-info contact-phone">
    						<i class="fa fa-phone"></i>
    						<h4>Phone Number</h4>
    						<a href="tel:+912612667591">+91 261 2667591</a>
    						<a href="tel:+912612667595">+91 261 2667595</a>
    					</div>
    				</div>
    				<div class="col-md-4 pr-0">
    					<div class="contact-info contact-email">
    						<i class="fa fa-envelope"></i>
    						<h4>Email Address</h4>
    						<a href="mailto:president@metasofsda.in"><p>president@metasofsda.in</p></a>
    						<a href="mailto:info@metasofsda.in"><p>info@metasofsda.in</p></a>
        				</div>
        			</div>
        		</div>
                <div class="row contact-address-section">
                    <div class="col-md-6">
                        <div id="googleMap">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3720.237295173405!2d72.807256564248!3d21.182730387881556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e714b6210a7%3A0xaaaca403f2b8f6a7!2sMETAS%20of%20Seventh%20Day%20Adventists%20School!5e0!3m2!1sen!2sin!4v1595648797269!5m2!1sen!2sin" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
    				<div class="col-md-6 pl-0">
                        <div class="contact-comment-section">
                            <h3>Contact Form</h3>
                            <div id="form-messages"></div>
                            <form id="contact-form" method="post" action="mailer.php">
                                <fieldset>
                                    <div class="row">                                      
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>First Name*</label>
                                                <input name="fname" id="fname" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Last Name*</label>
                                                <input name="lname" id="lname" class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Email*</label>
                                                <input name="email" id="email" class="form-control" type="email">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Subject *</label>
                                                <input name="subject" id="subject" class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-md-12 col-sm-12">    
                                            <div class="form-group">
                                                <label>Message *</label>
                                                <textarea cols="40" rows="5" id="message" name="message" class="textarea form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>							        
                                    <div class="form-group mb-0">
                                        <input class="btn-send" type="submit" value="Submit Now">
                                    </div>
                                    
                                </fieldset>
                            </form>						
                        </div>
                    </div>
                    
                </div>
        	</div>
        </div>

     
<?php include 'footer.php' ?>