// DOCUMENT READY
jQuery(document).ready(function () {
    "use strict";

    // const lenis = new Lenis({
    //     lerp: 0.04,
    // });

    // function raf(time) {
    //     lenis.raf(time);
    //     requestAnimationFrame(raf);
    // }
    // requestAnimationFrame(raf);

    //Simple Paralax
    var images = document.querySelectorAll(".scroll-parallax img");
    new simpleParallax(images, {
        delay: 0.6,
        transition: "cubic-bezier(0,0,0,1)",
        scale: 1.2
    });

    //Infinity text
    jQuery(".concept__flow--text").infiniteslide({
        speed: 100,
        pauseonhover: false,
        clone: 6,
    });


    const headerHeight = document.querySelector('.stuck .header-main')?.offsetHeight || 0;

    // function scroll_flow() {
    //     const timeline = gsap
    //         .timeline({
    //             scrollTrigger: {
    //                 trigger: ".concept__flow--trigger",
    //                 start: `top 0px `,
    //                 end: "bottom -90% top",
    //                 // end: '+=1000px',
    //                 scrub: 0.3,
    //                 invalidateOnRefresh: true,
    //                 pin: true,
    //                 markers: false,
    //                 onLeave: () => {

    //                 },
    //                 onEnterBack: () => {

    //                 }
    //             },
    //         })
    //         .to(
    //             ".concept__flow--text",
    //             {
    //                 duration: 1,
    //                 autoAlpha: 1,
    //                 ease: "power2.out",
    //             },
    //             "vis0"
    //         )
    //         .to(
    //             ".concept__flow--text",
    //             {
    //                 duration: 1,
    //                 color: "#fff",
    //                 ease: "power2.out",
    //             },
    //             "vis1"
    //         )
    //         .to(
    //             ".concept__flow--img-cover",
    //             {
    //                 duration: 2,
    //                 clipPath: "polygon(0 0, 100% 0, 100% 100%, 0% 100%)",
    //                 ease: "power2.out",
    //             },
    //             "vis2"
    //         )
    // }
    // scroll_flow();

    if (jQuery(window).width() >= 768) {

        //Features
        function scrollText() {
            const items = document.querySelectorAll(".ul-cus li");

            const scrollLength = items.length * 300;
            const itemDelay = 4;
            const itemDuration = 8;

            const tl = gsap.timeline({
                scrollTrigger: {
                    trigger: ".sec-features .row",
                    start: `top 70px `,
                    // start: "top top",
                    end: `+=${scrollLength}vh`,
                    scrub: true,
                    pin: true,
                    markers: false,
                }
            });

            items.forEach((item, index) => {
                tl.to(item, {
                    y: "0vh",
                    autoAlpha: 1,
                    ease: "power2.out",
                    duration: itemDuration
                }, `+=${itemDelay}`);
            });
        }
        scrollText();
    }

    //Template
    gsap.registerPlugin(ScrollTrigger);

    function scrollHoriziontal() {
        const panels = gsap.utils.toArray(document.querySelectorAll(".sec-template .pin-wrap"));
        let elements = gsap.utils.toArray(document.querySelectorAll(".sec-template .set2 .item"));
        let maxWidth = 0;

        panels.forEach((panel) => {
            maxWidth += panel.offsetWidth * 1;
        });

        let scroller = gsap.to(".sec-template .pin-wrap", {
            x: () => `-${maxWidth - window.innerWidth}`,
            ease: "none",
            scrollTrigger: {
                trigger: ".sec-template",
                pin: true,
                scrub: 1,
                start: "top top",
                end: () => `+=${maxWidth}`,
                normalizeScroll: true,
                onEnter: () => {
                    document.querySelector(".sec-template")?.classList.add("active-scroll");
                },
                onLeaveBack: () => {
                    document.querySelector(".sec-template")?.classList.remove("active-scroll");
                },
            },
        });
        elements.forEach((element) => {
            let tl = gsap.timeline({
                scrollTrigger: {
                    trigger: element,
                    start: "center 80%",
                    end: "center 100%",
                    scrub: 1,
                    containerAnimation: scroller,
                    toggleActions: "play none none reset",
                },
            });
            gsap.set(element, { x: 20, y: 200, opacity: 0.1 });
            tl.to(element, {
                y: 0,
                x: 0,
                opacity: 1,
                duration: 0.4,
            });
        });
    }
    scrollHoriziontal();

    // window.addEventListener('resize', function (event) {
    //     timeline.kill();
    //     timeline.clear();

    //     scroller.kill();
    //     scroller.clear();
    // })
    // ScrollTrigger.refresh()
});


// WINDOW LOAD
jQuery(window).bind('load', function () {
    "use strict";

});

// jQuery(document).ready(function () {
//     if (jQuery('.header-nav').length) {
//         jQuery(document).on('scroll', onScroll)
//         jQuery('.nav a[href*="#"]').on('click', function () {
//             var e = jQuery(this).attr('href')
//             var h = jQuery('.nav').outerHeight()
//             var b = jQuery(e).length ? jQuery(e).offset().top : 0
//             console.log(b)
//             console.log(b + 1 - h)
//             jQuery('html, body').animate({
//                 scrollTop: (b + 1 - h)
//             }, 500)
//         })
//     }
// });

// function onScroll() {
//     var scroll = jQuery(window).scrollTop()
//     var header = jQuery('.nav').outerHeight()
//     if (jQuery(window).width() > 999) {
//         var header = jQuery('.nav').outerHeight()
//     } else {
//         var header = 60
//     }

//     jQuery('.nav a[href^="#"]').each(function () {
//         var el = jQuery(this).attr('href')
//         var offset = jQuery(el).length ? jQuery(el).offset().top : 0

//         if (scroll === 0) {
//             jQuery('.nav a').removeClass('active');
//             jQuery('.nav a').eq(0).addClass('active');
//             return false;
//         }

//         if ((scroll + header) >= offset && (jQuery(el).outerHeight() + offset) > (scroll + header)) {
//             jQuery('.nav a').eq(0).removeClass('active');
//             jQuery('.nav a[href^="#"]').removeClass('active')
//             jQuery(this).addClass('active')
//         }
//     })
// }