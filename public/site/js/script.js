// Variables
const windowHeight = window.innerHeight;
const windowWidth = window.innerWidth;
let backgroundNavigation = document.querySelector(".background-navigation");
let backgroundblogImage = document.querySelector(".blog-detail-header-image");
let DropDownItem = document.querySelectorAll(".dropdown .menu-item a");
let MenuMobileSection = document.querySelector(".menu-moble-sidebar");
let closingBoxSidebaeMenu = document.querySelector(".closing_box_sidebaeMenu");
let SideBaMAnu = document.querySelector(".sidebar_menu");
let MenuIconButton = document.querySelector(".menu-mobile-buttons");
let CloseIconButton = document.querySelector(".close_menu");
let DropDownMenuMobile = document.querySelectorAll(".items");
let ActionButtonsNavigation = document.querySelectorAll(".action_buttons .category_box");
let ActionButtons = document.querySelectorAll(".action_buttons");
let HolderBoxIntroduction = document.querySelectorAll(".holderBox");
let AmenitiesBox = document.querySelectorAll(".amenities_item");
let MoreItem = document.querySelector(".more_item");
let HiddenItem = document.querySelectorAll(".header_topbar_inner .hidden");
let DetailItem = document.querySelectorAll(".header_topbar_inner .header_topbar_item");
let PanelHeadingItems = document.querySelectorAll(".panel_heading");
let blog_item = document.querySelectorAll(".blog-item");

// Functions
if (backgroundNavigation != null) {
    backgroundNavigation.style.height = `${windowHeight}px`;
}
if (backgroundblogImage != null) {
    backgroundblogImage.style.height = `${windowHeight}px`;
}
if (MoreItem != null) {
    MoreItem.addEventListener('click', function (event) {
        event.preventDefault();
        this.querySelector(".icon_show").classList.toggle("minus_icon");
        this.querySelector(".icon_show").classList.toggle("plus_icon");
        if (windowWidth <= 768) {
            DetailItem.forEach(element => {
                element.classList.remove("hidden")
                element.classList.toggle("show")
                // element.style.display = "inline-block"
            })
        } else {
            HiddenItem.forEach(element => {
                element.classList.toggle("hidden")
            })
        }
    })
}

DropDownItem.forEach(el => {
    el.addEventListener("mouseenter", function (event) {
        if($("meta[name=lang]").attr("content") == "fa" || $("meta[name=lang]").attr("content") == "ar"){
            this.style.paddingRight = "58px"
        }else{
            this.style.paddingLeft = "58px"
        }

    });
    el.addEventListener("mouseout", function (event) {
        if($("meta[name=lang]").attr("content") == "fa" || $("meta[name=lang]").attr("content") == "ar"){
            this.style.paddingRight = "30px"
        }else{
            this.style.paddingLeft = "30px"
        }
    })
});
closingBoxSidebaeMenu.addEventListener('click', function () {
    SideBaMAnu.classList.toggle("active_menu_sidebar");
    setTimeout(() => {
        MenuMobileSection.style.display = "none"
    }, 500);
})
MenuIconButton.addEventListener('click', function () {
    MenuMobileSection.style.display = "block"
    setTimeout(() => {
        SideBaMAnu.classList.toggle("active_menu_sidebar");
    }, 100);

})
CloseIconButton.addEventListener('click', function () {
    SideBaMAnu.classList.toggle("active_menu_sidebar");
    setTimeout(() => {
        MenuMobileSection.style.display = "none"
    }, 500);
})
DropDownMenuMobile.forEach(el => {
    el.addEventListener("click", function () {
        let element = this.querySelector(".dropdown-menu-sidebar");
        if (element != null) {
            if (element.classList.contains("active-dropdown-mobile")) {
                this.querySelector("span").classList.remove("activeItems")
                this.querySelector("svg").classList.remove("activeItems")
                this.querySelector(".arrow_down").classList.remove("activeItems")
                this.querySelector(".arrow_down").style.transform = `rotate(0deg)`
            } else {
                this.querySelector("span").classList.add("activeItems")
                this.querySelector("svg").classList.add("activeItems")
                this.querySelector(".arrow_down").classList.add("activeItems")
                this.querySelector(".arrow_down").style.transform = `rotate(180deg)`
            }
            element.classList.toggle("active-dropdown-mobile")
        }
    })
})
ActionButtonsNavigation.forEach(el => {
    el.addEventListener("mouseenter", function () {
        ActionButtonsNavigation.forEach(element => {
            element.querySelector(".category_icon .icon_holder").classList.add("active_action_buttons")
        })
        el.querySelector(".category_icon .icon_holder").classList.remove("active_action_buttons")
    })
    el.addEventListener("mouseleave", function () {
        ActionButtonsNavigation.forEach(element => {
            element.querySelector(".category_icon .icon_holder").classList.remove("active_action_buttons")
        })
    })
})
if (windowWidth <= 768) {
    $(".action_buttons").slick({
        autoplay: true,
        autoplaySpeed: 2000,
        mobileFirst: true,
        arrows: true,
        draggable: true,
        infinite: true,
        touchMove: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        rtl: true,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    autoplay: true,
                    arrows: true,
                    // centerMode: true,
                    // centerPadding: '20px',
                    slidesToShow: 4,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 992,
                settings: {
                    autoplay: true,
                    arrows: true,
                    // centerMode: true,
                    // centerPadding: '20px',
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    autoplay: true,
                    arrows: true,
                    // centerMode: true,
                    // centerPadding: '10px',
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 576,
                settings: {
                    autoplay: true,
                    arrows: true,
                    // centerMode: true,
                    // centerPadding: '10px',
                    slidesToShow: 4,
                    slidesToScroll: 1
                }
            }
        ]
    });
}
HolderBoxIntroduction.forEach(el => {
    el.addEventListener("mouseenter", function () {
        el.querySelector(".counter").style.right = "-45px";
        el.querySelector(".counter").style.opacity = 0;
        el.querySelector(".text-descrition").style.left = "-45px";
        el.querySelector(".text-descrition").style.opacity = 0;
        el.querySelector(".region-overlay").style.opacity = 1;
    })
    el.addEventListener("mouseleave", function () {
        el.querySelector(".counter").style.right = "22px";
        el.querySelector(".counter").style.opacity = 1;
        el.querySelector(".text-descrition").style.left = "50%";
        el.querySelector(".text-descrition").style.opacity = 1;
        el.querySelector(".region-overlay").style.opacity = 0;
    })
})
AmenitiesBox.forEach(el => {
    el.addEventListener("mouseenter", function () {
        let Color = el.querySelector(".header_icon").dataset.color;
        el.querySelector(".header_icon").style.left = "-45px";
        el.querySelector(".header_icon").style.opacity = 0;
        el.querySelector(".image_wrapper .image").style.transform = `rotate(360deg)`;
        el.querySelector(".image_wrapper .text_holder .text").style.backgroundColor = Color;
        el.querySelector(".image_wrapper .text_holder .text").style.color = `#fff`;
    })
    el.addEventListener("mouseleave", function () {
        el.querySelector(".header_icon").style.left = "20px";
        el.querySelector(".header_icon").style.opacity = 1;
        el.querySelector(".image_wrapper .image").style.transform = `rotate(0deg)`;
        el.querySelector(".image_wrapper .text_holder .text").style.transform = `rotate(0deg)`;
        el.querySelector(".image_wrapper .text_holder .text").style.backgroundColor = `#fff`;
        el.querySelector(".image_wrapper .text_holder .text").style.color = `rgb(68, 68, 68)`;

        //     el.querySelector(".text-descrition").style.left = "50%";
        //     el.querySelector(".text-descrition").style.opacity = 1;
        //     el.querySelector(".region-overlay").style.opacity = 0;
    })
})
window.addEventListener("scroll", function (e) {
    let scroll = Math.round(window.scrollY);
    if (scroll > 312) {
        if (document.querySelector(".is_transparent") != null) {
            document.querySelector(".is_transparent").style.background = `linear-gradient(to top, rgba(0, 0, 0, 0.2) -3%, rgb(54 54 54 / 75%) 100%)`
        } else {
            document.querySelector(".not_transparent").style.background = `linear-gradient(to top, rgba(0, 0, 0, 0.2) -3%, rgb(54 54 54 / 75%) 100%)`
        }
    } else {
        if (document.querySelector(".is_transparent") != null) {
            document.querySelector(".is_transparent").style.background = "unset"
        } else {
            document.querySelector(".not_transparent").style.background = "#2d3237"
        }


    }
})
$(".box_place").slick({
    autoplay: true,
    autoplaySpeed: 2000,
    mobileFirst: true,
    arrows: true,
    draggable: true,
    infinite: true,
    touchMove: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    centerMode: true,
    centerPadding: '20px',
    rtl: true,
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                autoplay: true,
                arrows: true,
                centerMode: true,
                centerPadding: '180px',
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 992,
            settings: {
                autoplay: true,
                arrows: true,
                // centerMode: true,
                // centerPadding: '20px',
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 768,
            settings: {
                autoplay: true,
                arrows: true,
                // centerMode: true,
                // centerPadding: '10px',
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 767.98,
            settings: {
                autoplay: true,
                arrows: true,
                // centerMode: true,
                // centerPadding: '10px',
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 576,
            settings: {
                autoplay: true,
                arrows: true,
                // centerMode: true,
                // centerPadding: '10px',
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});
$(".box_place .slick-list .slick-track .place_item").on("mouseenter", function () {
    $(this).find(".place_counter").css({"right": "-45px", "opacity": "0"});
    $(this).find(".text_description").css({"left": "-45px", "opacity": "0"});
    $(this).find(".place_cat_icon").css({"left": "-45px", "opacity": "0"});
    $(this).find(".place_inner_backgroundOverlay").css({"z-index": "2", "display": "block"});
})
$(".box_place .slick-list .slick-track .place_item").on("mouseleave", function () {
    $(this).find(".place_counter").css({"right": "22px", "opacity": "1"});
    $(this).find(".text_description").css({"left": "50%", "opacity": "1"});
    $(this).find(".place_cat_icon").css({"left": "20px", "opacity": "1"});
    $(this).find(".place_inner_backgroundOverlay").css({"z-index": "-1", "display": "none"});
})
$(".offer_list").slick({
    autoplay: true,
    autoplaySpeed: 2000,
    mobileFirst: true,
    arrows: false,
    draggable: true,
    infinite: true,
    touchMove: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    centerMode: true,
    centerPadding: '20px',
    rtl: true,
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                autoplay: true,
                arrows: false,
                centerMode: true,
                centerPadding: '10px',
                slidesToShow: 4,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 992,
            settings: {
                autoplay: true,
                arrows: false,
                // centerMode: true,
                // centerPadding: '20px',
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 768,
            settings: {
                autoplay: true,
                arrows: false,
                // centerMode: true,
                // centerPadding: '10px',
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 767.98,
            settings: {
                autoplay: true,
                arrows: false,
                // centerMode: true,
                // centerPadding: '10px',
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 576,
            settings: {
                autoplay: true,
                arrows: false,
                // centerMode: true,
                // centerPadding: '10px',
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});
$(".container_slide").slick({
    autoplay: true,
    autoplaySpeed: 2000,
    mobileFirst: true,
    arrows: true,
    dots: true,
    draggable: true,
    infinite: true,
    touchMove: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    rtl: true,
    centerMode: false,
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                autoplay: true,
                arrows: true,
                dots: true,
                centerMode: true,
                centerPadding: '193.5px',
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 992,
            settings: {
                autoplay: true,
                arrows: true,
                centerMode: true,
                centerPadding: '193.5px',
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 768,
            settings: {
                autoplay: true,
                arrows: true,
                centerMode: false,
                centerPadding: '10px',
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 576,
            settings: {
                autoplay: true,
                arrows: true,
                centerMode: true,
                centerPadding: '80px',
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});
$(".container_slide .slick-dots li").mouseenter(function () {
    $(this).click()
    document.querySelector(".text_shop .type_shop").style.opacity = 0;
    document.querySelector(".text_shop .description_shop").style.opacity = 0;
    document.querySelector(".text_shop .title_shop h1").style.opacity = 0.16;
})
$(".container_slide .slick-dots li").mouseleave(function () {
    document.querySelector(".text_shop .type_shop").style.opacity = 1;
    document.querySelector(".text_shop .description_shop").style.opacity = 1;
    document.querySelector(".text_shop .title_shop h1").style.opacity = 1;
})
PanelHeadingItems.forEach(el => {
    el.addEventListener("click", function () {
        this.parentElement.querySelector(".collapseThree").classList.toggle("hide_collapse")
        this.querySelector("a").classList.toggle("collapse_acc")
        this.querySelector("a").classList.toggle("extend_acc")
    })
})
blog_item.forEach(el => {
    el.addEventListener('mouseenter', function () {
        this.querySelector('.blog-content-date').style.opacity = 1;
        this.querySelector('.blog-content-date').style.height = '50px';
    })
    el.addEventListener('mouseleave', function () {
        this.querySelector('.blog-content-date').style.opacity = 0;
        this.querySelector('.blog-content-date').style.height = '0px';
    })
})
$(".slider-blog").slick({
    autoplay: true,
    autoplaySpeed: 2000,
    mobileFirst: true,
    arrows: false,
    draggable: true,
    infinite: true,
    touchMove: true,
    slidesToShow: 1,
    slidesToScroll: 1,

    rtl: true,
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                autoplay: true,
                arrows: true,

                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 992,
            settings: {
                autoplay: true,
                arrows: true,
                // centerMode: true,
                // centerPadding: '20px',
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 768,
            settings: {
                autoplay: true,
                arrows: true,
                // centerMode: true,
                // centerPadding: '10px',
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 767.98,
            settings: {
                autoplay: true,
                arrows: true,
                // centerMode: true,
                // centerPadding: '10px',
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 576,
            settings: {
                autoplay: true,
                arrows: true,
                // centerMode: true,
                // centerPadding: '10px',
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});
if (document.querySelector(".GEO_location_text") != null) {

    document.querySelector(".GEO_location_text").addEventListener("click", function () {
        this.style.display = "none";
        document.querySelector(".GEO_location").style.display = "inline-block";
    })
}
$(window).load(function () {
    $(".loading").css("display", "none");
    $("body").css("overflow", "auto");
})

$(".input_checkbox").click(function () {
    if ($(".input_checkbox").prop("checked")) {
        $(".custom_email_controll").fadeIn(300)
    } else {
        $(".custom_email_controll").fadeOut(300)
    }
})

$("input[name=location]").change(function () {
    $value = $(this).val();
    if ($value == 1) {
        $(".custom_content_location").fadeIn(300);
        $(".custom_content_address").fadeOut(300);
    } else if ($value == 2) {
        $(".custom_content_location").fadeOut(300);
        $(".custom_content_address").fadeIn(300);
    } else {
        $(".custom_content_location").fadeIn(300);
        $(".custom_content_address").fadeIn(300);
    }

})
$(".input_checkbox_operation").click(function () {
    if ($(".input_checkbox_operation").prop("checked")) {
        $(".operation_hours").fadeIn(300)
    } else {
        $(".operation_hours").fadeOut(300)
    }
})
$(".input_checkbox_catalog").click(function () {
    if ($(".input_checkbox_catalog").prop("checked")) {
        $(".label_for_menu").fadeIn(300)
    } else {
        $(".label_for_menu").fadeOut(300)
    }
})
$(".input_checkbox_document_upload").click(function () {
    if ($(".input_checkbox_document_upload").prop("checked")) {
        $(".file_document_upload").fadeIn(300)
    } else {
        $(".file_document_upload").fadeOut(300)
    }
})
$(".input_checkbox_social_network").click(function () {
    if ($(this).prop("checked")) {
        $(this).parent().parent().parent().parent().find(".custom_social_network").fadeIn(300)
    } else {
        $(this).parent().parent().parent().parent().find(".custom_social_network").fadeOut(300)
    }
})
$(".food_slider").slick({
    autoplay: true,
    autoplaySpeed: 2000,
    mobileFirst: true,
    arrows: false,
    draggable: true,
    infinite: true,
    touchMove: true,
    slidesToShow: 1,
    slidesToScroll: 1,

    rtl: true,
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                autoplay: true,
                arrows: true,

                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 992,
            settings: {
                autoplay: true,
                arrows: true,
                // centerMode: true,
                // centerPadding: '20px',
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 768,
            settings: {
                autoplay: true,
                arrows: false,
                // centerMode: true,
                // centerPadding: '10px',
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 767.98,
            settings: {
                autoplay: true,
                arrows: false,
                // centerMode: true,
                // centerPadding: '10px',
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 576,
            settings: {
                autoplay: true,
                arrows: false,
                // centerMode: true,
                // centerPadding: '10px',
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }
    ]
});
$(".slider_menu").slick({
    autoplay: true,
    autoplaySpeed: 2000,
    mobileFirst: true,
    arrows: false,
    draggable: true,
    infinite: true,
    touchMove: true,
    slidesToShow: 1,
    slidesToScroll: 1,

    rtl: true,
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                autoplay: true,
                arrows: true,

                slidesToShow: 4,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 992,
            settings: {
                autoplay: true,
                arrows: true,
                // centerMode: true,
                // centerPadding: '20px',
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 768,
            settings: {
                autoplay: true,
                arrows: false,
                // centerMode: true,
                // centerPadding: '10px',
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 767.98,
            settings: {
                autoplay: true,
                arrows: false,
                // centerMode: true,
                // centerPadding: '10px',
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 576,
            settings: {
                autoplay: true,
                arrows: false,
                // centerMode: true,
                // centerPadding: '10px',
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }
    ]
});

let filter_menu = document.querySelector('.select_filter');
if (filter_menu != null) {
    filter_menu.addEventListener('click', function () {
        if (this.dataset.open == "false") {
            this.querySelector('svg').style.transform = 'rotate(180deg)';
            this.classList.add('custom_filter_active')
            this.parentNode.querySelector('ul').style.display = 'inline-block'
            this.dataset.open = "true"
        } else {
            this.querySelector('svg').style.transform = 'rotate(0deg)';
            this.classList.remove('custom_filter_active')
            this.parentNode.querySelector('ul').style.display = 'none'
            this.dataset.open = "false"

        }
    })
    let filter_items = document.querySelectorAll(".filter_items li");
    filter_items.forEach(el => {
        el.addEventListener('click', function () {
            filter_items.forEach(element => element.classList.remove("custom_li_filter"))
            this.classList.add("custom_li_filter");
            filter_menu.dataset.open = "false";
            filter_menu.parentNode.querySelector('ul').style.display = 'none'
            document.querySelector(".filter_selected_item_value").textContent = this.querySelector('span').textContent;
            filter_menu.querySelector('svg').style.transform = 'rotate(0deg)';
            filter_menu.classList.remove('custom_filter_active')
        })
    })
}
$(".suggestion_slider").slick({
    autoplay: true,
    autoplaySpeed: 2000,
    mobileFirst: true,
    arrows: false,
    draggable: true,
    infinite: true,
    touchMove: true,
    slidesToShow: 1,
    slidesToScroll: 1,

    rtl: true,
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                autoplay: true,
                arrows: true,

                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 992,
            settings: {
                autoplay: true,
                arrows: true,
                // centerMode: true,
                // centerPadding: '20px',
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 768,
            settings: {
                autoplay: true,
                arrows: false,
                // centerMode: true,
                // centerPadding: '10px',
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 767.98,
            settings: {
                autoplay: true,
                arrows: false,
                // centerMode: true,
                // centerPadding: '10px',
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 576,
            settings: {
                autoplay: true,
                arrows: false,
                // centerMode: true,
                // centerPadding: '10px',
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});

let tabs = document.querySelectorAll(".tabs_users");
if (tabs != null) {
    tabs.forEach(el => {
        el.addEventListener("click", function (event) {
            let target = el.dataset.name;
            if (target == "login") {
                document.querySelector("#register-tab").classList.remove("active");
                document.querySelector("#register-tab").setAttribute("aria-selected", false);
            } else {
                document.querySelector("#login-tab").classList.remove("active");
                document.querySelector("#login-tab").setAttribute("aria-selected", false);
            }
        })
    })
}
$(".grouping_title").click(function () {
    $cat = $(this).attr("data-cat")
    if ($cat == "0") {
        $(".menu_mobile").slideDown(300)
        $(this).attr("data-cat", "1")
        $(this).find('.fa-chevron-up').css("transform", "rotate(180deg)");
    } else {
        $(".menu_mobile").slideUp(300)
        $(this).attr("data-cat", "0")
        $(this).find('.fa-chevron-up').css("transform", "rotate(0deg)");
    }

})

$(".list_shop_mobile .title").click(function () {
    $(this).parent().find(".list_item_shop").slideToggle(500)
})
$(".box_dashboard").click(function () {
    $target = $(this).attr("data-target");
    $(".box_dashboard").find("a").removeClass("active");
    $(".item_dashboard").fadeOut(300);
    $(this).find("a").addClass("active");
    $("." + $target).fadeIn(300);
})
const lang = document.querySelector('.lang_site').textContent;
if (document.querySelector(".grid") != null) {
    var $grid = $('.grid').isotope({ filter: '*' });
    // filter items on button click
    $('.list_filter_food').on('click', 'li', function () {
        var filterValue = $(this).find(".menu_items").attr('data-filter');
        $grid.isotope({
            filter: filterValue,
            originLeft: lang == "fa" || lang == "ar" ? false : true,
        });
        $('.list_filter_food li div').removeClass("menu_active")
        $(this).find(".menu_items").addClass("menu_active");
    });
    setTimeout(() => {
        $(".menu_active").click();
    }, 100)
}

$(".up_button").click(function () {
    $("html,body").animate({
        scrollTop: 0
    }, 300)
})
$("select[name=type_introduced]").change(function () {
    $value = $(this).val();
    if($value == 2){
        $(".name-introduced").fadeIn(300)
    }else{
        $(".name-introduced").fadeOut(300)
    }
});

// menu
$(".menu_page_item .item_img").click(function () {
    $(this).find(".cover-food").fadeIn(300)
    setTimeout(()=>{
        $(".modal-detail-menu").fadeIn(300)
        $(".menu_page").css("filter","blur(5px)")
        $(this).find(".cover-food").fadeOut(300)
    },1000)
})
$(".menu_page_item .item_body_title p").click(function () {
    $(this).parent().parent().parent().find(".cover-food").fadeIn(300)
    setTimeout(()=>{
        $(".modal-detail-menu").fadeIn(300)
        $(".menu_page").css("filter","blur(5px)")
        $(this).parent().parent().parent().find(".cover-food").fadeOut(300)
    },1000)
})
$(".menu_page_item .information_button button").click(function () {
    $(this).parent().parent().parent().parent().find(".cover-food").fadeIn(300)
    setTimeout(()=>{
        $(".modal-detail-menu").fadeIn(300)
        $(".menu_page").css("filter","blur(5px)")
        $(this).parent().parent().parent().parent().find(".cover-food").fadeOut(300)
    },1000)
})
$(".close_modal_menu").click(function () {
    $(".modal-detail-menu").fadeOut(300)
    $(".menu_page").css("filter","unset")
    $(".form_comments").fadeOut(300)
    $(".comments-message").fadeOut(300)
})

$(".send_comments_button").click(function () {

    $open_comment = $(this).attr("data-open");
    if($open_comment == "0"){
        $(".form_comments").fadeIn(300)
        $(".comments-message").fadeOut(300)
        $(this).attr("data-open","1")
    }else{
        $(".form_comments").fadeOut(300)
        $(".comments-message").fadeOut(300)
        $(this).attr("data-open","0")
    }
})

$(".user_comments").click(function () {
    $open_comment = $(this).attr("data-open");
    if($open_comment == "0"){
        $(".form_comments").fadeOut(300)
        $(".comments-message").fadeIn(300)
        $(this).attr("data-open","1")
        $(this).find("svg").css("transform","rotate(180deg)")
    }else{
        $(".form_comments").fadeOut(300)
        $(".comments-message").fadeOut(300)
        $(this).attr("data-open","0")
        $(this).find("svg").css("transform","rotate(0deg)")
    }

})
$(".submit_rate span").click(function (){
    $rate = $(this).attr("data_rate");
    Number($rate)
    $(this).parent().find('input[type=number]').val($rate);
    $(this).parent().find('span svg').attr("data-prefix",'fal');
    for (i=1;i<=$rate;i++){
        $(this).parent().find('span[data_rate='+i+'] svg').attr("data-prefix",'fas');
    }
})
