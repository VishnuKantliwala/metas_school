<?
$page_id = 17;
include_once("header.php");
$sql = $cn->selectdb("select * from tbl_page where page_id =$page_id");
$row = $cn->fetchAssoc($sql);
extract($row);
?>

<div class="rs-breadcrumbs bg7 breadcrumbs-overlay" style="background: url(page/big_img/<?echo $image?>)">
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">
                        <?echo $page_name ?>
                    </h1>
                    <ul>
                        <li>
                            <a class="active" href="./">Home</a>
                        </li>
                        <li>
                            <?echo $page_name ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->
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
                                    <a class="nav-link waves-light active" data-toggle="tab" href="#panel51"
                                        role="tab">HR DEPARTMENT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link waves-light" data-toggle="tab" href="#curriculum"
                                        role="tab">Apply Now</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!-- Tab panels -->
                    <div class="tab-content card">
                        <!--Panel 1-->
                        <div class="tab-pane fade in active show my_desc" id="panel51" role="tabpanel">
                            <?echo $page_desc ?>
                        </div>
                        <!--/.Panel 1-->
                        <!--Panel 2-->
                        <div class="tab-pane fade" id="curriculum" role="tabpanel">
                            <div class="course-syllabus">
                                <!-- <h4 class="desc-title">SECTION 1 : INTRODUCTION</h4> -->


                                <form id="applyForm" method="post">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label>First Name*</label>
                                                    <input name="first_name" id="first_name" class="form-control"
                                                        type="text" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label>Middle Name*</label>
                                                    <input name="middle_name" id="middle_name" class="form-control"
                                                        type="text" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label>Last Name*</label>
                                                    <input name="last_name" id="last_name" class="form-control"
                                                        type="text" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label>Email*</label>
                                                    <input name="email" id="email" class="form-control" type="email"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="sel1">Current Job:</label>
                                                    <select class="form-control" id="c_job" name="c_job">
                                                        <option value="Accounting / Tax / Company Secretary / Audit">
                                                            Accounting / Tax / Company Secretary / Audit </option>
                                                        <option value="  Finance and Insurance"> Finance and Insurance
                                                        </option>
                                                        <option
                                                            value="  Online &amp; Offline Marketing / MR / Media Planning">
                                                            Online &amp;
                                                            Offline Marketing / MR / Media Planning </option>
                                                        <option value="  Business Development"> Business Development
                                                        </option>
                                                        <option value="  Advertising / Public Relation / Events">
                                                            Advertising / Public Relation / Events </option>
                                                        <option
                                                            value="  Front Office Staff / Secretarial / Computer Operator">
                                                            Front Office
                                                            Staff / Secretarial / Computer Operator </option>
                                                        <option value="  Administration / Operations"> Administration /
                                                            Operations </option>
                                                        <option
                                                            value="  Human Resource / IR / Training &amp; Development">
                                                            Human Resource / IR
                                                            / Training &amp; Development </option>
                                                        <option value="  IT Hardware - Control / Networking / Support">
                                                            IT Hardware - Control / Networking / Support </option>
                                                        <option value="  Content / Editors / Journalists"> Content /
                                                            Editors / Journalists </option>
                                                        <option value="  Corporate Planning / Consulting / Strategy">
                                                            Corporate Planning / Consulting / Strategy </option>
                                                        <option value="  Doctors / Nurses / Medical Professional">
                                                            Doctors / Nurses / Medical Professional </option>
                                                        <option value="  Legal / Law"> Legal / Law </option>
                                                        <option
                                                            value="  Education / Teachers / Professors / Lecturers / Academics">
                                                            Education /
                                                            Teachers / Professors / Lecturers / Academics </option>
                                                        <option value=" Other"> Other </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <label class="radio-inline"><input type="radio" name="cast" checked>
                                                    Adventist </label>
                                                <label class="radio-inline"><input type="radio" name="cast"> Non
                                                    Adventist</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label>Total Experience *</label>
                                                    <input name="experience" id="experience" class="form-control"
                                                        type="text" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label>Resume *</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="file" required>
                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-12">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <img style="width:100px;height:50px"
                                                        src="verificationimage.php?1092"
                                                        alt="verification image, type it in the box" width="50px"
                                                        height="50px" align="absbottom" />
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-12">
                                                <div class="form-group">
                                                    <label>Code *</label>
                                                    <input name="verif_box" id="verif_box" class="form-control"
                                                        type="text" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-10">
                                            <div id="result_applyForm"></div>
                                        </div>
                                        <div class="form-group ">
                                            <div id="loader_apply_form" style="width:100%; text-align: center;">
                                                <img style="display:none;width:30px;" class="loader_apply_form"
                                                    src="./images/loader.gif" />
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
                        <!--/.Panel 2-->




                    </div>
                </div>


            </div>
        </div>
    </div>


</div>

<?php include 'footer.php' ?>
<script src="js/forms.js"></script>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>