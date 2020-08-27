<?php $page_id=''; include 'header.php' ?>
<style>
@media only screen and (max-width: 600px) {
    .radio-inline {
        margin-top: 0px !important;
        padding-right: 10px !important;
    }
}

.radio-inline {
    margin-top: 40px;
    padding-right: 30px;
}
</style>
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">Apply Now</h1>
                    <ul>
                        <li>
                            <a class="active" href="index.php">Home</a>
                        </li>
                        <li>Apply Now</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->




<div id="rs-courses-3" class="rs-courses-3 sec-spacer">
    <div class="container">

        <div class="row ">
            <div class="col-lg-12">
                <div class="course-item">
                    <div class="course-footer footcolor">
                        <div class="course-seats">
                            Apply Now
                        </div>
                    </div>
                    <div class="course-body">
                        <div class="course-desc">



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
                                            <label class="radio-inline"><input type="radio" name="optradio" checked>
                                                Adventist </label>
                                            <label class="radio-inline"><input type="radio" name="optradio"> Non
                                                Adventist</label>
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
                                                    <label class="custom-file-label" for="customFile">Choose
                                                        file</label>
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
                                        <input style="background: #5bc6d0;color: #fff;" class="btn" type="submit"
                                            value="Submit Now">
                                    </div>

                                </fieldset>
                            </form>


                        </div>
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