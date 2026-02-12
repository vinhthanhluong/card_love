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
});


// WINDOW LOAD
jQuery(window).bind('load', function () {
    "use strict";

});

//js 404 PAGE
// Tạo ngôi sao
const starsContainer = document.getElementById('stars');
const numberOfStars = 50;

for (let i = 0; i < numberOfStars; i++) {
    const star = document.createElement('div');
    star.className = 'star';

    const size = Math.random() * 3 + 1;
    star.style.width = size + 'px';
    star.style.height = size + 'px';

    star.style.left = Math.random() * 100 + '%';
    star.style.top = Math.random() * 100 + '%';

    star.style.animationDelay = Math.random() * 2 + 's';
    star.style.animationDuration = (Math.random() * 3 + 2) + 's';

    starsContainer.appendChild(star);
}

// Hiệu ứng chuột di chuyển cho ghost

const ghost = document.querySelector('.ghost');
if (ghost) {
    document.addEventListener('mousemove', (e) => {
        const x = (e.clientX / window.innerWidth - 0.5) * 20;
        const y = (e.clientY / window.innerHeight - 0.5) * 20;

        ghost.style.transform = `translate(${x}px, ${y}px)`;
    });
}
//js 404 PAGE