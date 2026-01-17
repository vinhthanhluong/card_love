gsap.registerPlugin(ScrollTrigger);

const yearNumberElement = document.getElementById("yearNumber");
const yearSticky = document.querySelector(".year-sticky");
const timelineContainer = document.querySelector(".timeline-container");
const sections = document.querySelectorAll(".timeline-section");
const images = document.querySelectorAll(".section-images .image");

const firstSectionWithYear = Array.from(sections).find(section => section.dataset.year);
let currentYear = firstSectionWithYear ? parseInt(firstSectionWithYear.dataset.year) : 2026;

let initialTop = 0;
let fixedTop = 0;

function getInitialValues() {
    const computedStyle = getComputedStyle(yearSticky);
    initialTop = parseInt(computedStyle.top) || 0;
    fixedTop = window.innerHeight / 2 - 40;
}

getInitialValues();

function handleStickyYear() {
    const containerRect = timelineContainer.getBoundingClientRect();
    const yearHeight = 80;
    const yearAbsoluteTop = containerRect.top + initialTop;
    const shouldBeFixed = yearAbsoluteTop <= fixedTop;
    const containerBottom = containerRect.bottom;
    const yearBottomWhenFixed = fixedTop + yearHeight;
    const shouldLockBottom = containerBottom <= yearBottomWhenFixed;

    if (!shouldBeFixed) {
        yearSticky.classList.remove("fixed", "bottom");
        yearSticky.style.top = initialTop + "px";
        yearSticky.style.transform = "translateZ(0)";
    } else if (shouldLockBottom) {
        yearSticky.classList.remove("fixed");
        yearSticky.classList.add("bottom");
        const finalPosition = containerRect.height - yearHeight;
        yearSticky.style.top = finalPosition + "px";
        yearSticky.style.transform = "translateZ(0)";
    } else {
        yearSticky.classList.add("fixed");
        yearSticky.classList.remove("bottom");
        yearSticky.style.top = fixedTop + "px";
        yearSticky.style.transform = "translateZ(0)";
    }
}

function initializeYear(year) {
    const yearStr = year.toString();
    yearNumberElement.innerHTML = "";

    for (let i = 0; i < yearStr.length; i++) {
        const digitContainer = document.createElement("span");
        digitContainer.className = "year-digit";

        const digitColumn = document.createElement("span");
        digitColumn.className = "digit-column";
        digitColumn.dataset.digit = i;

        for (let num = 0; num <= 9; num++) {
            const span = document.createElement("span");
            span.textContent = num;
            digitColumn.appendChild(span);
        }

        digitContainer.appendChild(digitColumn);
        yearNumberElement.appendChild(digitContainer);
    }

    setTimeout(() => {
        const yheight = 80;
        const yearStr = year.toString();

        for (let i = 0; i < yearStr.length; i++) {
            const digitColumn = yearNumberElement.querySelector(`.digit-column[data-digit="${i}"]`);
            const currentDigit = parseInt(yearStr[i]);
            digitColumn.style.transform = `translateY(-${currentDigit * yheight}px)`;
        }
    }, 0);
}

function animateYearChange(targetYear) {
    if (currentYear === targetYear) return;

    const targetStr = targetYear.toString();
    const height = 80;

    for (let i = 0; i < targetStr.length; i++) {
        const digitColumn = yearNumberElement.querySelector(`.digit-column[data-digit="${i}"]`);
        if (digitColumn) {
            const targetDigit = parseInt(targetStr[i]);

            setTimeout(() => {
                digitColumn.style.transform = `translateY(-${targetDigit * height}px)`;
            }, i * 80);
        }
    }

    currentYear = targetYear;
}

initializeYear(currentYear);

window.addEventListener("scroll", handleStickyYear);
window.addEventListener("resize", () => {
    getInitialValues();
    handleStickyYear();
});
handleStickyYear();

sections.forEach((section) => {
    const year = parseInt(section.dataset.year);

    if (year && !isNaN(year)) {
        ScrollTrigger.create({
            trigger: section,
            start: "top 60%",
            end: "bottom 40%",
            onEnter: () => animateYearChange(year),
            onEnterBack: () => animateYearChange(year),
        });
    }
});

images.forEach((image) => {
    ScrollTrigger.create({
        trigger: image,
        start: "top 85%",
        onEnter: () => {
            image.classList.add("animated-img");
        },
        onLeaveBack: () => {
            image.classList.remove("animated-img");
        },
    });
});

ScrollTrigger.create({
    trigger: timelineContainer,
    start: "top top",
    end: "bottom bottom",
    scrub: 1,
    onUpdate: (self) => {
        const progress = self.progress;
        if (yearSticky.classList.contains('fixed')) {
            yearNumberElement.style.opacity = 1 - (progress * 0.3);
        }
    }
});