gsap.registerPlugin(ScrollTrigger);

let svg = document.querySelector("#trackSVG");
let path = svg.querySelector("path");

const pathLength = path.getTotalLength();

console.log(pathLength);

gsap.set(path, { strokeDasharray: pathLength });


gsap.fromTo(
    path,
    {
        strokeDashoffset: pathLength,
    },
    {
        strokeDashoffset: 0,
        duration: 10,
        ease: "none",
        scrollTrigger: {
            trigger: ".svg-container",
            start: "top top",
            end: "bottom bottom",
            scrub: 1,
        }
    }
)
