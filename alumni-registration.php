<?
$page_id = 15;
include_once("header.php");
$sql = $cn->selectdb("select * from tbl_page where page_id =$page_id");
$row = $cn->fetchAssoc($sql);
extract($row);
?>

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




<div id="rs-courses-3" class="rs-courses-3 sec-spacer">
    <div class="container">

        <div class="row ">
            <div class="col-lg-12">
                <div class="course-item">
                    <div class="course-footer footcolor">
                        <div class="course-seats">
                            Register Now
                        </div>
                    </div>
                    <div class="course-body">
                        <div class="course-desc">



                            <form id="alumniForm" method="post">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>First Name*</label>
                                                <input name="alumni_fname" id="alumni_fname" class="form-control" type="text" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Last Name*</label>
                                                <input name="alumni_lname" id="alumni_lname" class="form-control" type="text" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Email*</label>
                                                <input name="email" id="email" class="form-control" type="email" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Birth date*</label>
                                                <input name="bdate" id="bdate" class="form-control" type="date" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="sel1">Select Country:</label>
                                                <select class="form-control" id="sel1" name="country">
                                                    <?
                                                    $sqlCountries = $cn->selectdb("SELECT countryname from country order by countryname");
                                                    if( $cn->numRows($sqlCountries) > 0 )
                                                    {
                                                        while($rowCountries = $cn->fetchAssoc($sqlCountries))
                                                        {
                                                    ?>
                                                    <option value="<?echo $rowCountries['countryname'] ?>">
                                                        <?echo $rowCountries['countryname'] ?>
                                                    </option>
                                                    <?
                                                        }
                                                    }
                                                    ?>
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
                                                <label for="sel1">Select Gender:</label>
                                                <select class="form-control" id="sel1" name="gender">
                                                    
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                    <option>Other</option>
                                                    
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Nationality *</label>
                                                <input name="nationality" id="nationality" class="form-control" type="text" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Marital status *</label>
                                                <input name="marital_status" id="marital_status" class="form-control" type="text" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Year of completion *</label>
                                                <input name="year_of_completion" id="year_of_completion" class="form-control" type="text" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Course *</label>
                                                <input name="course" id="course" class="form-control" type="text" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Current Profession *</label>
                                                <input name="current_position" id="current_position" class="form-control" type="text" required>
                                            </div>
                                        </div>

                                       
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Profile picture</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="file">
                                                    <label class="custom-file-label" for="customFile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Code *</label>
                                                <input name="verif_box" id="verif_box" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>&nbsp;</label>
                                                <img
                                                    class="form-control"
                                                    style="width:100px;height:43px"
                                                    src="verificationimage.php?<?php echo rand(0,9999);?>"
                                                    alt="verification image, type it in the box" width="50px" height="43px"
                                                    align="absbottom" />  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-10">
                                        <div id="result_alumniForm"></div>
                                    </div>
                                    <div class="form-group ">
                                        <div id="loader_contact_form" style="width:100%; text-align: center;">
                                            <img style="display:none;width:30px;" class="loader_contact_form"
                                                src="./images/loader.gif" />
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <input name="btn_submit_alumni_form" style="background: #5bc6d0;color: #fff;" class="btn" type="submit"
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
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>