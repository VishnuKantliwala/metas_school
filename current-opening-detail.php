<?
$page_id = 18;
$coid = urldecode($_GET['coid']);

include_once("header.php");
$sqlWorkshop = $cn->selectdb("select * from tbl_openings where slug = '".$coid."' ");
if( $cn->numRows($sqlWorkshop) > 0 )
{
    $rowWorkshop = $cn->fetchAssoc($sqlWorkshop);
    extract($rowWorkshop);
}
else
{
    echo "<script>window.open('./404','_SELF')</script>";
    exit();
}
$sql = $cn->selectdb("select image from tbl_page where page_id =$page_id");
$row = $cn->fetchAssoc($sql);
extract($row);
$date = date("M d, Y",strtotime($openings_date));
?>



<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs bg7 breadcrumbs-overlay" style="background: url(page/big_img/<?echo $image?>)">
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">
                        <?echo $openings_title ?>
                    </h1>
                    <ul>
                        <li>
                            <a class="active" href="./">Home</a>
                        </li>
                        <li>
                            <a class="active" href="current-openings">Current openings</a>
                        </li>
                        <li>
                            <?echo $openings_title ?>
                        </li>
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
                            Current Opening Detail
                        </div>
                    </div>
                    <div class="course-body">
                        <div class="course-desc">
                            <?echo $description ?>
                            <div class="pt-20">
                                <button class="btnCircle" style="    line-height: 20px;">Apply Now</button>
                            </div>
                        </div>
                        <div class="course-desc applyFormContainer">
                            <form id="openingsForm" >
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>First Name*</label>
                                                <input name="first_name" id="first_name" class="form-control"
													type="text" required>
												<input type="hidden"  name="openings_title" value="<?echo $openings_title?>" >
													
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
                                                <input name="last_name" id="last_name" class="form-control" type="text"
                                                    required>
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
                                                    <option value="  Human Resource / IR / Training &amp; Development">
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
                                                <label>Code *</label>
                                                <input name="verif_box" id="verif_box" class="form-group form-control" type="text"
                                                    required>
                                            </div>
										</div>
										<div class="col-md-2 col-sm-12">
                                            <div class="form-group">
                                                <label>&nbsp;</label>
                                                <img style="width:100px;height:50px" src="verificationimage.php?1092"
                                                    alt="verification image, type it in the box" width="50px"
													height="50px" align="absbottom"
													class="form-control"
													/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-10">
                                        <div id="result_openingsForm"></div>
                                    </div>
                                    <div class="form-group ">
                                        <div id="loader_openings_form" style="width:100%; text-align: center;">
                                            <img style="display:none;width:30px;" class="loader_openings_form "
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

                </div>
            </div>
        </div>

    </div>
</div>

<?php include 'footer.php' ?>
<script src="js/forms.js"></script>