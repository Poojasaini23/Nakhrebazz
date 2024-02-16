jQuery(document).ready(function() {
    jQuery(document).ready(function() {

        jQuery("#memb-process").focusin(function() {
            jQuery(".message")
                .text("")
                .removeClass("success")
                .removeClass("fail");
        });

        jQuery("#memb-process").submit(function() {
            jQuery("#memb-process")
                .find("input[type='submit']")
                .attr("disabled", "disabled");

            var first_name = jQuery("#first_name").val();
            var last_name = jQuery("#last_name").val();
            var email = jQuery("#email").val();
            var contact = jQuery("#contact").val();
            var designation = jQuery("#designation").val();
            var institute = jQuery("#institute").val();
            var interest = jQuery("#interest option:selected").val();
            var plan = jQuery("#plan option:selected").val();
            var plan_name = jQuery("#plan option:selected").text();
            var message = jQuery("#message").val();

            var doc1 = jQuery("[name='doc_1']").val();
            var doc2 = jQuery("[name='doc_2']").val();
            var doc3 = jQuery("[name='doc_3']").val();

            if(doc1 == "" || doc2 == ""){
                jQuery(".message")
                    .text("Please upload necessary documents!")
                    .removeClass("success")
                    .addClass("fail");
                jQuery("#memb-process")
                    .find("input[type='submit']")
                    .removeAttr("disabled");
                return false;
            }

            if(plan == "3" && doc3 == ""){
                jQuery(".message")
                    .text("Upload your College ID to apply for Student Membership")
                    .removeClass("success")
                    .addClass("fail");
                jQuery("#memb-process")
                    .find("input[type='submit']")
                    .removeAttr("disabled");
                return false;
            }
            jQuery(".spinner-border")
                .css("display","inline-block");


            jQuery.ajax({
                url: ajax_object.ajaxurl,
                type: "post",
                data: {
                    action: "md_support_save",
                    security: ajax_object.ajax_nonce,
                    first_name: first_name,
                    last_name: last_name,
                    email: email,
                    contact: contact,
                    designation: designation,
                    institute: institute,
                    interest: interest,
                    plan: plan,
                    plan_name: plan_name,
                    message: message,
                    doc1: doc1,
                    doc2: doc2,
                    doc3: doc3
                },
                dataType: "json",
                success: function(response) {
                    //alert("SS");
                    if (response.status) {
                        jQuery(".message").text(response.message).addClass("success").removeClass("fail");
                        jQuery("#memb-process").trigger("reset");
                        jQuery("#memb-process [type='hidden']").val("");
                        jQuery(".img-box label").text("Select Photo");
                    } else {
                        jQuery(".message").text(response.message).addClass("fail").removeClass("success");
                    }


                },
                error: function(response) {
                    jQuery(".message")
                        .text("There was some issue in process. Please try again later!")
                        .addClass("fail").removeClass("success");
                },
                complete: function() {
                    jQuery("#memb-process")
                        .find("input[type='submit']")
                        .removeAttr("disabled");
                    jQuery(".spinner-border")
                        .fadeOut();
                }
            });

            return false;
        });
    });

    jQuery(".doc_upload").change(function(e) {

        jQuery(".progress-bar").css("width", "0%");
        jQuery(".percent").html("0%");


        var files_data = jQuery(this);

        var form_data = new FormData();
        form_data.append("action", "md_doc_save");
        form_data.append("type", jQuery(this).attr("name"));
        form_data.append("security", ajax_object.ajax_nonce);
        form_data.append( "files", files_data[0].files[0]);


        var bar = jQuery(".progress-bar");
        var percent = jQuery(".percent");
        var status = jQuery("#status");

        jQuery.ajax({
            url: ajax_object.ajaxurl,
            type: 'POST',
            dataType: "json",
            data: form_data,
            processData: false,
            contentType: false,
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                jQuery(".progress-sec").fadeIn();
                xhr.upload.addEventListener(
                    "progress",
                    function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);

                            var percentVal = percentComplete + "%";
                            bar.width(percentVal);
                            percent.html(percentVal);

                            console.log(percentComplete);

                            if (percentComplete === 100) {
                                jQuery(".progress-sec").fadeOut();

                            }
                        }
                    },
                    false
                );

                return xhr;
            },
            success: function(response) {
                if (response.status) {
                    files_data.siblings("input[type='hidden']").val(response.data.attach);
                    files_data.siblings("label").text(response.data.file_name + " Uploaded!");
                }
            },
            error: function(MLHttpRequest, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });

    if (jQuery("#back-to-top").length) {
        var scrollTrigger = 100, // px
            backToTop = function() {
                var scrollTop = jQuery(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    jQuery("#back-to-top").addClass("show");
                } else {
                    jQuery("#back-to-top").removeClass("show");
                }
            };
        backToTop();
        jQuery(window).on("scroll", function() {
            backToTop();
        });
        jQuery("#back-to-top").on("click", function(e) {
            e.preventDefault();
            jQuery("html,body").animate({
                    scrollTop: 0,
                },
                700
            );
        });
    }

    if (jQuery("header").length) {
        var scrollTrigger = 100, // px
            activeTop = function() {
                var scrollTop = jQuery(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    jQuery("header").addClass("active");
                } else {
                    jQuery("header").removeClass("active");
                }
            };
        activeTop();
        jQuery(window).on("scroll", function() {
            activeTop();
        });
    }

    jQuery(".autoplay").slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        dots: false,
        autoplay: true,
        infinite: true,
        arrows: true,
        autoplaySpeed: 2000,
        responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                },
            },

            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                },
            },
        ],
    });

    jQuery(".autoplay-advisor").slick({
        dots: false,
        autoplay: true,
        infinite: true,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 5,
        responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                },
            },

            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
        ],
    });
});