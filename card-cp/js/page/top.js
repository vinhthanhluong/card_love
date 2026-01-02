jQuery(window).bind("load", function () {
  // SLIDER
  if (jQuery(".love-slider").length > 0) {
    const theme = $(".tpl-main").data("theme");

    const baseOption = {
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      autoplay: true,
      autoplaySpeed: 3000,
      speed: 300,
      appendDots: $(".ilove-dots"),
    };

    const themeOption = {
      theme1: {
        fade: false,
        arrows: false,
      },
      // theme2: {
      //   fade: false,
      //   arrows: false,
      // },
      // theme3: {
      //   fade: false,
      //   arrows: false,
      // },
      theme2: {
        fade: false,
        arrows: true,
        // speed: 1200, // override base
      },
    };

    $(".love-slider .love-slr").slick({
      ...baseOption,
      ...(themeOption[theme] || {}),
    });
  }
  /*============== END - SLIDER ================*/
});

jQuery(document).ready(function () {
  "use strict";

  // Counter
  if (jQuery(".icounter .icounter-type1").length > 0) {
    const getData = jQuery(".icounter").attr("data-love");
    const [dataDay, dataMonth, dataYear] = getData.split("/");
    const past = new Date(`${dataYear}/${dataMonth}/${dataDay}`);
    const now = new Date();

    function padStart(value) {
      return String(value).padStart(2, "0");
    }

    // Years
    let years = now.getFullYear() - past.getFullYear();

    //Months
    let months = now.getMonth() - past.getMonth();
    if (months < 0) {
      years--;
      months += 12;
    }

    // Days
    let days = now.getDate() - past.getDate();
    if (days < 0) {
      months--;
      const lastMonth = new Date(
        now.getFullYear(),
        now.getMonth(),
        0
      ).getDate();
      days += lastMonth;
    }

    // Weeks
    const weeks = Math.floor(days / 7);
    days = days % 7;

    // Set Data
    jQuery(".icounter .icounter-first").text(getData);
    // Set Year Month Week Day
    jQuery(".iyear span").text(padStart(years));
    jQuery(".imonth span").text(padStart(months));
    jQuery(".iweek span").text(padStart(weeks));
    jQuery(".iday span").text(padStart(days));

    // Set Hours Minute Second
    setInterval(() => {
      const now = new Date();
      const hours = now.getHours();
      const minutes = now.getMinutes();
      const seconds = now.getSeconds();
      jQuery(".ihours").text(padStart(hours));
      jQuery(".iminute").text(padStart(minutes));
      jQuery(".isecond").text(padStart(seconds));
    }, 1000);
  }

  if (jQuery(".icounter .icounter-type2").length > 0) {
    const daySumItem = jQuery(".iday-sum");
    const getData = jQuery(".icounter").attr("data-love");
    const [dataDay, dataMonth, dataYear] = getData.split("/");
    const past = new Date(`${dataYear}/${dataMonth}/${dataDay}`);
    const now = new Date();

    const diffMs = now - past;

    const oneDay = 1000 * 60 * 60 * 24;
    const daysTotal = Math.floor(diffMs / oneDay);

    daySumItem.text(daysTotal);
    daySumItem.attr("data-dayTotal", daysTotal);
  }
});

// Memory
const openBtnMemory = document.getElementById("openMemory");
const closeBtnMemory = document.getElementById("closeMemory");
const modalMemory = document.getElementById("modalMemory");
let hasAnimated = false;

// Open modal
if (openBtnMemory || modalMemory) {
  openBtnMemory.addEventListener("click", () => {
    modalMemory.classList.add("active");
    document.querySelector("#header").classList.add("hidden");
    document.body.style.overflow = "hidden";

    // Start animations only once when first opened
    if (!hasAnimated) {
      setTimeout(() => {
        animateAllCounters();
        hasAnimated = true;
      }, 400); // Wait for modal animation to complete
    }
  });

  function closeMemory() {
    modalMemory.classList.remove("active");
    document.body.style.overflow = "auto";
    document.querySelector("#header").classList.remove("hidden");
  }

  // Close modal
  closeBtnMemory.addEventListener("click", closeMemory);

  // Close when clicking outside
  modalMemory.addEventListener("click", (e) => {
    if (e.target === modalMemory) {
      closeMemory();
    }
  });

  // Close with ESC key
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && modalMemory.classList.contains("active")) {
      closeMemory();
    }
  });

  // Animate counter with easing
  function animateValue(element, start, end, duration, suffix = "") {
    const range = end - start;
    const steps = 60;
    const increment = range / steps;
    let current = start;

    const timer = setInterval(() => {
      current += increment;
      if (current >= end) {
        element.textContent = Math.floor(end) + suffix;
        clearInterval(timer);
      } else {
        element.textContent = Math.floor(current) + suffix;
      }
    }, duration / steps);
  }

  // Animate all counters
  function animateAllCounters() {
    const dateEl = document.getElementById("currentDateMemory");
    const [day, month, year] = dateEl.innerText.split("/").map(Number);
    const startDate = new Date(year, month - 1, day);
    const today = new Date();
    const diffTime = today - startDate;
    const days = Math.floor(diffTime / (1000 * 60 * 60 * 24));
    const weeks = Math.floor(days / 7);
    const months =
      (today.getFullYear() - startDate.getFullYear()) * 12 +
      (today.getMonth() - startDate.getMonth());
    const years = today.getFullYear() - startDate.getFullYear();

    // Main days counter
    animateValue(document.getElementById("daysCounterMemory"), 0, days, 2000);

    // Stats counters with different durations for variety
    setTimeout(() => {
      animateValue(
        document.getElementById("weeksCounterMemory"),
        0,
        weeks,
        2200
      );
    }, 400);

    setTimeout(() => {
      animateValue(
        document.getElementById("monthsCounterMemory"),
        0,
        months,
        1800
      );
    }, 600);

    setTimeout(() => {
      animateValue(
        document.getElementById("yearsCounterMemory"),
        0,
        years,
        1500
      );
    }, 800);

    // Timeline
    document.getElementById("daysTimelineMemory1").textContent = Math.floor(
      days / 4
    );
    document.getElementById("daysTimelineMemory2").textContent = Math.floor(
      (days / 4) * 2
    );
    document.getElementById("daysTimelineMemory3").textContent = days;
    // animateValue(document.getElementById("daysTimelineMemory1"), 0, days, 0);
    // animateValue(document.getElementById("daysTimelineMemory2"), 0, days, 0);
    // animateValue(document.getElementById("daysTimelineMemory3"), 0, days, 0);
  }
}
