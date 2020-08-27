<?
$page_id = 13;
include_once("header.php");
$sql = $cn->selectdb("select * from tbl_page where page_id =$page_id");
$row = $cn->fetchAssoc($sql);
extract($row);
?>



<!-- Breadcrumbs Start -->
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


<?
        $sqlContact = $cn->selectdb("SELECT `con_id`, `maptag`, `contact_desc`, `email`, `contact_no`, `opening_hours`, `meta_tag_title`, `meta_tag_description`, `meta_tag_keywords` FROM  `tbl_contact` where con_id=1" );
        //	echo $cn->numRows($sql2);
        if ($cn->numRows($sqlContact) > 0) 
        {
            $rowContact = $cn->fetchAssoc($sqlContact);
            extract($rowContact);
        
        ?>
<div class="contact-page-section sec-spacer">
    <div class="container">

        <div class="row contact-address-section">
            <div class="col-md-4 pl-0">
                <div class="contact-info contact-address">
                    <i class="fa fa-map-marker"></i>
                    <h4>Address</h4>
                    <p>
                        <?echo strip_tags($contact_desc) ?>
                    </p>

                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-info contact-phone">
                    <i class="fa fa-phone"></i>
                    <h4>Phone Number</h4>
                    <?
                            foreach(explode(',',$contact_no) as $contact)
                            {
                            ?>
                    <a href="tel:<?echo $contact?>">
                        <?echo $contact?></a>
                    <?
                            }
                            ?>
                </div>
            </div>
            <div class="col-md-4 pr-0">
                <div class="contact-info contact-email">
                    <i class="fa fa-envelope"></i>
                    <h4>Email Address</h4>
                    <?
                            foreach(explode(',',$email) as $email_id)
                            {
                            ?>
                    <a href="mailto:<?echo $email_id?>">
                        <p>
                            <?echo $email_id?>
                        </p>
                    </a>
                    <?
                            }
                            ?>
                </div>
            </div>
        </div>
        <div class="row contact-address-section">
            <div class="col-md-6">
                <div id="googleMap">
                    <?echo $maptag ?>
                </div>
            </div>
            <div class="col-md-6 pl-0">
                <div class="contact-comment-section">
                    <h3>Contact Form</h3>
                    <div id="form-messages"></div>
                    <form id="contactForm" method="post">
                        <fieldset>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Name*</label>
                                        <input required name="name" id="name" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Contact number*</label>
                                        <input name="contact" id="contact" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input required name="email" id="email" class="form-control" type="email">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Subject *</label>
                                        <input required name="subject" id="subject" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Verification code*</label>
                                        <input class="form-control" type="text" placeholder="Code" name="verif_box"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Code</label>
                                        <img class="form-control" style="width:100px;height:43px"
                                            src="verificationimage.php?<?php echo rand(0,9999);?>"
                                            alt="verification image, type it in the box" width="50px" height="43px"
                                            align="absbottom" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Message *</label>
                                        <textarea required cols="40" rows="5" id="message" name="message"
                                            class="textarea form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <img src="./images/loader.gif" class="loader_img"
                                        style="width:30px; display:none" />
                                    <div id="result_contactForm"></div>

                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <input class="btn-send btn_submit_contact" type="submit" value="Submit Now">
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<?
        }
        ?>


<?php include 'footer.php' ?>
<script src="js/forms.js"></script>