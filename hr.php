<?php $page_id=''; include 'header.php' ?> 
<style>
@media only screen and (max-width: 600px) {
.radio-inline{
    margin-top:0px !important;
    padding-right:10px !important;
}
}
.radio-inline{
    margin-top:40px;
    padding-right:30px; 
}
</style>
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
		    <div class="breadcrumbs-inner">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12 text-center">
		                    <h1 class="page-title">HR Department</h1>
		                    <ul>
		                        <li>
		                            <a class="active" href="index.php">Home</a>
		                        </li>
		                        <li>HR Department</li>
		                    </ul>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- Breadcrumbs End -->
  
        <div class="rs-courses-details pt-100 pb-70">
            <div class="container">
                <div class="row mb-30">
                    <div class="col-lg-12 col-md-12">
                	    

                                <div class="course-des-tabs">
                                    <div class="tab-btm">
                                        <!-- Nav tabs -->
                                        <div class="tabs-wrapper">
                                            <ul class="nav classic-tabs tabs-cyan" role="tablist">
                                                <li class="nav-item"> 
                                                    <a class="nav-link waves-light active" data-toggle="tab" href="#panel51" role="tab">HR DEPARTMENT</a> 
                                                </li>
                                                <li class="nav-item"> 
                                                    <a class="nav-link waves-light" data-toggle="tab" href="#curriculum" role="tab">Apply Now</a> 
                                                </li>
                                               
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Tab panels -->
                                    <div class="tab-content card"> 
                                        <!--Panel 1-->
                                        <div class="tab-pane fade in active show" id="panel51" role="tabpanel">
                                          <h4 class="desc-title">Course Details</h4>
                                            <p>Donec lorem leo, gravida ut cursus et, ultrices non tortor. Duis vel venenatis ligula. Etiam hendrerit at urna ac tempus. Integer sagittis luctus tellus, eu molestie magna volutpat quis. Praesent ullamcorper faucibus quam. Nam sed facilisis neque. Etiam dictum dolor et volutpat malesuada. Aliquam molestie felis in justo feugiat semper. In magna arcu, luctus a nisl et, mollis ultricies sem. Etiam cursus mi eget tellus ultrices fermentum. Vestibulum tempor erat ac eros egestas rutrum.</p>
                                            
                                            <p>Aliquam pulvinar blandit eros, vel tempor tellus eleifend eget. Vestibulum ultricies egestas ante, eu consectetur leo pretium vel. Aliquam mollis dolor libero, ac sagittis velit dignissim at. Nulla a tellus eu enim porta posuere. Sed posuere at lectus ac fringilla.</p>
                                          <h4 class="desc-title">Requirements</h4>
                                          <ul class="requirements-list">
                                            <li>Lorem ipsum dolor sit elit</li>
                                            <li>Sed posuere at lectus ac fringilla</li>
                                            <li>Aliquam mollis dolor libero</li>
                                            <li>Sagittis velit dignissim</li>
                                            <li>Aliquam mollis dolor libero</li>
                                            <li>Lorem ipsum dolor sit elit</li>
                                            <li>consectetur adipisicing elit</li>
                                            <li>Lorem consectetur adipisicing elit</li>
                                            <li>pariatur. Tempora, placeat ratione</li>
                                            <li>Lorem consectetur adipisicing elit</li>
                                            <li>Nihil odit magnam minima</li>
                                            <li>Lorem ipsum dolor sit elit</li>
                                          </ul>
                                      </div>
                                      <!--/.Panel 1--> 
                                      <!--Panel 2-->
                                      <div class="tab-pane fade" id="curriculum" role="tabpanel">
                                            <div class="course-syllabus">
                                                <!-- <h4 class="desc-title">SECTION 1 : INTRODUCTION</h4> -->
                                                

                                                <form id="contact-form" method="post" action="mailer.php">
						<fieldset>
							<div class="row">                                      
								<div class="col-md-4 col-sm-12">
									<div class="form-group">
										<label>First Name*</label>
										<input name="fname" id="fname" class="form-control" type="text">
									</div>
                                </div>
                                <div class="col-md-4 col-sm-12">
									<div class="form-group">
										<label>Middle Name*</label>
										<input name="fname" id="fname" class="form-control" type="text">
									</div>
								</div>
								<div class="col-md-4 col-sm-12">
									<div class="form-group">
										<label>Last Name*</label>
										<input name="lname" id="lname" class="form-control" type="text">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 col-sm-12">
									<div class="form-group">
										<label>Email*</label>
										<input name="email" id="email" class="form-control" type="email">
									</div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="sel1">Select list:</label>
                                        <select class="form-control" id="sel1">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
								</div>
								<div class="col-md-4 col-sm-12">                        
                                    <label class="radio-inline"><input type="radio" name="optradio" checked> Adventist </label>
                                    <label class="radio-inline"><input type="radio" name="optradio"> Non Adventist</label>
								</div>
							</div>
							<div class="row">                                      
								<div class="col-md-4 col-sm-12">
									<div class="form-group">
										<label>Total Experience *</label>
										<input name="fname" id="fname" class="form-control" type="text">
									</div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                 <div class="form-group">
                                 <label>Resume *</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    </div>
								</div>
								<div class="col-md-4 col-sm-12">
									<div class="form-group">
										<label>Code *</label>
										<input name="lname" id="lname" class="form-control" type="text">
									</div>
								</div>
							</div>					        
							<div class="form-group mb-0">
								<input style="background: #5bc6d0;color: #fff;" class="btn" type="submit" value="Submit Now">
							</div>
							   
						</fieldset>
					</form>		


                                                
                                                
                                               
                                            </div>
                                      </div>
                                      <!--/.Panel 2--> 
                                    
                                    
                                    
                                     
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    
                      
                </div>
        
        <?php include 'footer.php' ?>

        <script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>