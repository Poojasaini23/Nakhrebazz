jQuery(document).ready(function () {
    jQuery(".header-slider").slick({
        dots: false,
        autoplay: true,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        adaptiveHeight: true,
    });


    window.addEventListener("load", function () {
        // isotope-filter:-
        jQuery(window).load(function () {
            jQuery(".grid").isotope({
                itemSelector: ".grid-item",
                fitRows: {
                    gutter: ".gutter-sizer",
                },
            });
        });

        // filter items on button click
        jQuery(".filters.filter-button-group").on("click", "li", function () {
            var filterValue = jQuery(this).attr("data-filter");
            jQuery(".grid").isotope({ filter: filterValue });
            jQuery(".filters.filter-button-group li").removeClass("active");
            jQuery(this).addClass("active");
        });

        // filter select option:
        jQuery(function () {
            var $container = jQuery("#isocontent");

            $container.isotope({});

            jQuery("#filter-select,#filter-select2").change(function () {
                $container.isotope({
                    filter: this.value,
                });
            });
        });

    });


    jQuery('.search-toggle').addClass('closed');

    jQuery('.search-toggle .search-icon').click(function (e) {
        if (jQuery('.search-toggle').hasClass('closed')) {
            jQuery('.search-toggle').removeClass('closed').addClass('opened');
            jQuery('.search-toggle, .search-container').addClass('opened');
            jQuery('#search-terms').focus();
        } else {
            jQuery('.search-toggle').removeClass('opened').addClass('closed');
            jQuery('.search-toggle, .search-container').removeClass('opened');
        }
    });

});