$('.radio_a').click(() => {
    $('.rradio_a').click();
});
$('.radio_na').click(() => {
    $('.rradio_na').click();
});


$('.radio_m').click(() => {
    $('.rradio_m').click();
});
$('.radio_f').click(() => {
    $('.rradio_f').click();
});
$('.radio_o').click(() => {
    $('.rradio_o').click();
});

$('.btn_select_file').click(() => {
    $('.select_file').click();
});

$(".select_file").change(function () {
    filepath = this.value.split('\\');
    $('.btn_select_file').html(filepath[2]);
    console.log(filepath);
});

$('.btnCircle').click(() => {
    $('.applyFormContainer').show(500);
})


$('#inquiry_form').submit(function (e) {

    e.preventDefault();

    let result;
    $('.loader_inquiry_form').show(500);
    $('.btn_submit_inquiry_form').hide(500);


    const formData = $(this);
    setTimeout(() => {
        $.ajax({
            type: "POST",
            url: "submit_inquiry.php",
            data: formData.serialize(),
            cache: false,
            processData: false,
            success: (result) => {
                // alert(result)
                return result;
            }
        }).then((result) => {
            if ($.trim(result) == '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Message Sent Successfully! </div>') {
                $('#inquiry_form')[0].reset();

            }
            else {
                $('.btn_submit_inquiry_form').show(500);
            }
            $('#result_inquiry_form').html(result);
            $('.loader_inquiry_form').hide(500);

        });
    }, 500);

});


$('#applyForm').submit(function (e) {

    e.preventDefault();

    let result;
    $('.loader_apply_form').show(500);
    $('.btn_submit_apply_form').hide(500);
    $('#result_applyForm').html("");


    // const formData = $(this);
    const formData = new FormData($(this)[0]);
    console.log(formData);
    setTimeout(() => {
        $.ajax({
            url: "apply_mail.php",
            method: "POST",
            data: formData,
            enctype: 'multipart/form-data',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: (result) => {
                // alert(result)
                return result;
            }
        }).then((result) => {
            if ($.trim(result) == '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Message Sent! </div>') {
                $('#applyForm')[0].reset();

            }
            else {
                $('.btn_submit_apply_form').show(500);
            }
            $('#result_applyForm').html(result);
            $('.loader_apply_form').hide(500);

        });
    }, 500);

});

$('#alumniForm').submit(function (e) {

    e.preventDefault();

    let result;
    $('.loader_contact_form').show(500);
    $('.btn_submit_alumni_form').hide(500);
    $('#result_alumniForm').html("");


    // const formData = $(this);
    const formData = new FormData($(this)[0]);
    console.log(formData);
    setTimeout(() => {
        $.ajax({
            url: "alumni_mail.php",
            method: "POST",
            data: formData,
            enctype: 'multipart/form-data',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: (result) => {
                // alert(result)
                return result;
            }
        }).then((result) => {
            if ($.trim(result) == '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Message Sent! </div>') {
                $('#alumniForm')[0].reset();

            }
            else {
                $('.btn_submit_alumni_form').show(500);
            }
            $('#result_alumniForm').html(result);
            $('.loader_contact_form').hide(500);

        });
    }, 500);

});


$('#openingsForm').submit(function (e) {

    e.preventDefault();

    let result;
    $('.loader_openings_form').show(500);
    $('.btn_submit_openings_form').hide(500);
    $('#result_openingsForm').html("");


    // const formData = $(this);
    const formData = new FormData($(this)[0]);
    // console.log(formData);
    setTimeout(() => {
        $.ajax({
            url: "openings_mail.php",
            method: "POST",
            data: formData,
            enctype: 'multipart/form-data',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: (result) => {
                // alert(result)
                return result;
            }
        }).then((result) => {
            if ($.trim(result) == '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Message Sent! </div>') {
                $('#openingsForm')[0].reset();

            }
            else {
                $('.btn_submit_openings_form').show(500);
            }
            $('#result_openingsForm').html(result);
            $('.loader_openings_form').hide(500);

        });
    }, 500);

});


$('#contactForm').submit(function (e) {

    e.preventDefault();
    // alert('call');
    let result;
    $('.loader_img').show(500);
    $('.btn_submit_contact').hide(500);
    $('#result_contactForm').html('');


    const formData = $(this);
    setTimeout(() => {
        $.ajax({
            type: "POST",
            url: "contact_mail.php",
            data: formData.serialize(),
            cache: false,
            processData: false,
            success: (result) => {
                // alert(result)
                return result;
            }
        }).then((result) => {



            $('#result_contactForm').html(result);
            $('.btn_submit_contact').show();

            $('.loader_img').hide(500);

            if ($.trim(result) == '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Message Sent! </div>') {
                $('#contactForm')[0].reset();
                $('.btn_submit_contact').hide();

            }


        });
    }, 500);

});


$('#faq_form').submit(function (e) {

    e.preventDefault();

    let result;
    $('.loader_faq_form').show(500);
    $('.btn_submit_faq_form').hide(500);


    const formData = $(this);
    setTimeout(() => {
        $.ajax({
            type: "POST",
            url: "submit_faq.php",
            data: formData.serialize(),
            cache: false,
            processData: false,
            success: (result) => {
                // alert(result)
                return result;
            }
        }).then((result) => {
            if ($.trim(result) == '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Message Sent Successfully! </div>') {
                $('#faq_form')[0].reset();

            }
            else {
                $('.btn_submit_faq_form').show(500);
            }
            $('#result_faq_form').html(result);
            $('.loader_faq_form').hide(500);

        });
    }, 500);

});

$(document).ready(function () {
    $(document).on("click", ".btn_sc", function () {
        // console.log("called");
        const id = $(this).attr('cid');
        const name = $(this).attr('cname');
        // alert(id);
        $(".content_body").html('');
        $(".content_title").html(name);
        $('.content_loader').show(500);
        $.ajax({
            type: "GET",
            async: true,
            url: "fetchcontent.php",
            data: "id=" + id,
            cache: false,
            beforeSend: function () {
                //$("#loader_message").html("").hide(500);
                //$('#loader_image').show(500);
            },
            success: function (html) {

                $(".content_body").html(html);
                $('.content_loader').hide(500);

            }
        });
    });
});
