/**
 * Template Name: Medicio
 * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
 * Updated: Mar 17 2024 with Bootstrap v5.3.3
 * Author: BootstrapMade.com
 * License: https://bootstrapmade.com/license/
 */

(function () {
    "use strict";

    var fullHeight = function () {
        $(".js-fullheight").css("height", $(window).height());
        $(window).resize(function () {
            $(".js-fullheight").css("height", $(window).height());
        });
    };
    fullHeight();

    var carousel = function () {
        $(".featured-carousel").owlCarousel({
            loop: false,
            autoplay: true,
            margin: 30,
            animateOut: "fadeOut",
            animateIn: "fadeIn",
            nav: true,
            dots: true,
            autoplayHoverPause: false,
            items: 6,
            navText: [
                "<span class='ion-ios-arrow-back'></span>",
                "<span class='ion-ios-arrow-forward'></span>",
            ],
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
            },
        });
    };
    carousel();
    //   $('.news-carousel').owlCarousel({
    //     loop:true,
    //     margin:40,
    //     responsiveClass:true,
    //     responsive:{
    //         0:{
    //             items:1,
    //             nav:true
    //         },
    //         600:{
    //             items:2,
    //             nav:true
    //         },
    //         1000:{
    //             items:3,
    //             nav:true,
    //             loop:true
    //         }
    //     }
    // });

    $(".custom-carousel").owlCarousel({
        autoWidth: true,
        loop: false,
        // nav: true,
        // navText: [
        //   "<i class='fa fa-caret-left'></i>",
        //   "<i class='fa fa-caret-right'></i>"
        // ],
    });
    $(document).ready(function () {
        $(".custom-carousel .item").click(function () {
            $(".custom-carousel .item").not($(this)).removeClass("active");
            $(this).toggleClass("active");
        });
    });

    $(".owl-carousel__next").click(() => owl.trigger("next.owl.carousel"));

    $(".owl-carousel__prev").click(() => owl.trigger("prev.owl.carousel"));
    ("use strict");

    /**
     * Easy selector helper function
     */
    const select = (el, all = false) => {
        el = el.trim();
        if (all) {
            return [...document.querySelectorAll(el)];
        } else {
            return document.querySelector(el);
        }
    };

    /**
     * Easy event listener function
     */
    const on = (type, el, listener, all = false) => {
        let selectEl = select(el, all);
        if (selectEl) {
            if (all) {
                selectEl.forEach((e) => e.addEventListener(type, listener));
            } else {
                selectEl.addEventListener(type, listener);
            }
        }
    };

    /**
     * Easy on scroll event listener
     */
    const onscroll = (el, listener) => {
        el.addEventListener("scroll", listener);
    };

    /**
     * Navbar links active state on scroll
     */
    let navbarlinks = select("#navbar .scrollto", true);
    const navbarlinksActive = () => {
        let position = window.scrollY + 200;
        navbarlinks.forEach((navbarlink) => {
            if (!navbarlink.hash) return;
            let section = select(navbarlink.hash);
            if (!section) return;
            if (
                position >= section.offsetTop &&
                position <= section.offsetTop + section.offsetHeight
            ) {
                navbarlink.classList.add("active");
            } else {
                navbarlink.classList.remove("active");
            }
        });
    };
    window.addEventListener("load", navbarlinksActive);
    onscroll(document, navbarlinksActive);

    /**
     * Scrolls to an element with header offset
     */
    const scrollto = (el) => {
        let header = select("#header");
        let offset = header.offsetHeight;

        let elementPos = select(el).offsetTop;
        window.scrollTo({
            top: elementPos - offset,
            behavior: "smooth",
        });
    };

    /**
     * Toggle .header-scrolled class to #header when page is scrolled
     */
    let selectHeader = select("#header");
    let selectTopbar = select("#topbar");
    if (selectHeader) {
        const headerScrolled = () => {
            if (window.scrollY > 100) {
                selectHeader.classList.add("header-scrolled");
                if (selectTopbar) {
                    selectTopbar.classList.add("topbar-scrolled");
                }
            } else {
                selectHeader.classList.remove("header-scrolled");
                if (selectTopbar) {
                    selectTopbar.classList.remove("topbar-scrolled");
                }
            }
        };
        window.addEventListener("load", headerScrolled);
        onscroll(document, headerScrolled);
    }

    /**
     * Back to top button
     */
    let backtotop = select(".back-to-top");
    if (backtotop) {
        const toggleBacktotop = () => {
            if (window.scrollY > 100) {
                backtotop.classList.add("active");
            } else {
                backtotop.classList.remove("active");
            }
        };
        window.addEventListener("load", toggleBacktotop);
        onscroll(document, toggleBacktotop);
    }

    /**
     * Mobile nav toggle
     */
    on("click", ".mobile-nav-toggle", function (e) {
        select("#navbar").classList.toggle("navbar-mobile");
        this.classList.toggle("bi-list");
        this.classList.toggle("bi-x");
    });

    /**
     * Mobile nav dropdowns activate
     */
    on(
        "click",
        ".navbar .dropdown > a",
        function (e) {
            if (select("#navbar").classList.contains("navbar-mobile")) {
                e.preventDefault();
                this.nextElementSibling.classList.toggle("dropdown-active");
            }
        },
        true
    );

    /**
     * Scrool with ofset on links with a class name .scrollto
     */
    on(
        "click",
        ".scrollto",
        function (e) {
            if (select(this.hash)) {
                e.preventDefault();

                let navbar = select("#navbar");
                if (navbar.classList.contains("navbar-mobile")) {
                    navbar.classList.remove("navbar-mobile");
                    let navbarToggle = select(".mobile-nav-toggle");
                    navbarToggle.classList.toggle("bi-list");
                    navbarToggle.classList.toggle("bi-x");
                }
                scrollto(this.hash);
            }
        },
        true
    );

    /**
     * Scroll with ofset on page load with hash links in the url
     */
    window.addEventListener("load", () => {
        if (window.location.hash) {
            if (select(window.location.hash)) {
                scrollto(window.location.hash);
            }
        }
    });

    /**
     * Preloader
     */
    let preloader = select("#preloader");
    if (preloader) {
        window.addEventListener("load", () => {
            preloader.remove();
        });
    }

    /**
     * Hero carousel indicators
     */
    let heroCarouselIndicators = select("#hero-carousel-indicators");
    let heroCarouselItems = select("#heroCarousel .carousel-item", true);

    heroCarouselItems.forEach((item, index) => {
        index === 0
            ? (heroCarouselIndicators.innerHTML +=
                  "<li data-bs-target='#heroCarousel' data-bs-slide-to='" +
                  index +
                  "' class='active'></li>")
            : (heroCarouselIndicators.innerHTML +=
                  "<li data-bs-target='#heroCarousel' data-bs-slide-to='" +
                  index +
                  "'></li>");
    });

    /**
     * Testimonials slider
     */
    const swiper = new Swiper(".testimonials-slider", {
        speed: 600,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        slidesPerView: "auto",
        pagination: {
            el: ".swiper-pagination",
            type: "bullets",
            clickable: true,
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 20,
            },

            1200: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    let items = document.querySelectorAll(
        ".tata-kelola .carousel .carousel-item"
    );

    items.forEach((el) => {
        const minPerSlide = 4;
        let next = el.nextElementSibling;
        for (var i = 1; i < minPerSlide; i++) {
            if (!next) {
                // wrap carousel by using first child
                next = items[0];
            }
            let cloneChild = next.cloneNode(true);
            el.appendChild(cloneChild.children[0]);
            next = next.nextElementSibling;
        }
    });

    // Accordion
    // document.addEventListener('DOMContentLoaded', function () {
    //   var accHeaders = document.querySelectorAll('.accordion-header');

    //   accHeaders.forEach(function (header) {
    //     header.addEventListener('click', function () {
    //       // Tutup semua konten accordion dalam scope yang sama
    //       var parentAccordion = this.closest('.accordion');
    //       var allContents = parentAccordion.querySelectorAll('.accordion-content');

    //       allContents.forEach(function (content) {
    //         content.classList.remove('show');
    //       });

    //       // Tutup semua header aktif dalam scope yang sama
    //       var allHeaders = parentAccordion.querySelectorAll('.accordion-header');
    //       allHeaders.forEach(function (item) {
    //         item.classList.remove('active');
    //       });

    //       // Buka konten accordion yang diklik
    //       var content = this.nextElementSibling;
    //       if (content.classList.contains('show')) {
    //         content.classList.remove('show');
    //       } else {
    //         content.classList.add('show');
    //         this.classList.add('active');
    //       }
    //     });
    //   });
    // });

    /**
     * Clients Slider
     */
    new Swiper(".gallery-slider", {
        speed: 400,
        loop: true,
        centeredSlides: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        slidesPerView: "auto",
        pagination: {
            el: ".swiper-pagination",
            type: "bullets",
            clickable: true,
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            640: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            992: {
                slidesPerView: 5,
                spaceBetween: 20,
            },
        },
    });

    /**
     * Initiate gallery lightbox
     */
    const galleryLightbox = GLightbox({
        selector: ".gallery-lightbox",
    });

    /**
     * Animation on scroll
     */
    window.addEventListener("load", () => {
        AOS.init({
            duration: 1000,
            easing: "ease-in-out",
            once: true,
            mirror: false,
        });
    });

    /**
     * Initiate Pure Counter
     */
    new PureCounter();
})();
