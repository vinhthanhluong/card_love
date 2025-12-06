// ANCHOR LINK
var offset_PC = 0; /* offset header in PC (px) */
var offset_SP = 0; /* offset header in SP (px) */
function anchorLink(el) {
  /* trigger to open tab contain the Anchor, related to the function CHANGE TAB below. */
  var _parent = jQuery(el).parents("[data-tab-content]");
  if (_parent) {
    var _tab_ID = _parent.data("tab-content");
    var _group = _parent.data("tab-group");
    jQuery('[data-tab="' + _tab_ID + '"').each(function () {
      if (jQuery(el).data("tab-group") === _group) {
        jQuery(el).trigger("click");
      }
    });
  }

  /* position of element */
  var offset = jQuery(el).offset();
  if (jQuery(window).width() > 750) {
    jQuery("html,body").animate({ scrollTop: offset.top - offset_PC }, 400);
  } else {
    jQuery("html,body").animate({ scrollTop: offset.top - offset_SP }, 400);
  }
}
// WINDOW LOAD
jQuery(window).bind("load", function () {
  "use strict";

  // ANCHOR FROM OTHER PAGE
  var hash = location.hash;
  if (hash && jQuery(hash).length > 0) {
    anchorLink(hash);
  }

  // ANCHOR IN PAGE
  jQuery('a[href^="#"]').click(function () {
    var get_ID = jQuery(this).attr("href");
    if (get_ID != "#" && jQuery(get_ID).length) {
      anchorLink(get_ID);
      // close Menu (is opening) in SP
      if (jQuery("body").hasClass("open-nav")) {
        jQuery("#menu-toggle").trigger("click");
      }
      return false;
    }
  });
  // =========== END - ANCHOR LINK ============

  // =========== END - LAZY LOAD RESOURCE ============
  $(window).on("load scroll", function () {
    // To-Top && Btnfix
    var st = jQuery("html,body").scrollTop();
    if (st >= 10) {
      jQuery(".to-top").addClass("show");
    } else {
      jQuery(".to-top").removeClass("show");
    }
  });

  // =========== END - TO-TOP && Btnfix ============

  // SLIDER
  if (jQuery(".love-slider").length > 0) {
    $(".love-slider .love-slr").slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      autoplay: true,
      autoplaySpeed: 3000,
      speed: 2000,
      fade: true,
      arrows: false,
      appendDots: $(".ilove-dots"),
    });
  }
  /*============== END - SLIDER ================*/
});

// window.addEventListener("scroll", () => {
//   const el = document.querySelector(".abm5 img");
//   const rect = el.getBoundingClientRect();
//   if (rect.top < window.innerHeight && rect.bottom > 0) {
//     el.classList.add("aos-animate");
//   }
// });

// DOCUMENT READY
jQuery(document).ready(function () {
  "use strict";


  let scrollPos = 0;

  // Khóa scroll cho nhiều phần tử
  function lockElements(selectors) {
    const els = document.querySelectorAll(selectors);
    if (!els.length) return;

    scrollPos = window.scrollY; // lưu vị trí scroll hiện tại

    els.forEach(el => {
      el.style.position = 'fixed';
      el.style.top = `-${scrollPos}px`;
      el.style.left = '0';
      el.style.right = '0';
      el.style.overflow = 'hidden';
      el.style.width = 'min(100%, 768px)';
      el.style.margin = 'auto';
    });
  }

  // Mở lại scroll cho nhiều phần tử
  function unlockElements(selectors) {
    const els = document.querySelectorAll(selectors);
    if (!els.length) return;

    els.forEach(el => {
      el.style.removeProperty('position');
      el.style.removeProperty('top');
      el.style.removeProperty('left');
      el.style.removeProperty('right');
      el.style.removeProperty('overflow');
      el.style.removeProperty('width');
      el.style.removeProperty('margin');
    });

    window.scrollTo(0, scrollPos); // scroll trở về vị trí trước đó
  }


  // CHANGE TAB
  jQuery("[data-tab]").click(function () {
    var group = jQuery(this).data("tab-group");
    var index = jQuery(this).data("tab");
    jQuery('[data-tab][data-tab-group="' + group + '"].active').removeClass(
      "active"
    );
    jQuery(this).addClass("active");

    jQuery(
      '[data-tab-content][data-tab-group="' + group + '"].active'
    ).removeClass("active");
    jQuery(
      '[data-tab-content="' + index + '"][data-tab-group="' + group + '"]'
    ).addClass("active");
  });
  // =========== END - CHANGE TAB ============

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

  jQuery("#header .hd-ablum").on("click", function () {
    const hAblum = jQuery(".album .abm-wrap").innerHeight();
    jQuery("#main").css({ "z-index": "100", height: `${hAblum}px` });
    // jQuery("body").css({ "overflow": "hidden" });
    lockElements('#index, .tpl-main, .album');
    jQuery(".album").addClass("active");

    jQuery(".album-bg").addClass("active");

    if (jQuery(".album-bg.hidden")) {
      AOS.init({
        startEvent: "DOMContentLoaded",
        offset: 100,
        duration: 600,
        delay: "200",
        easing: "ease-in-sine",
        once: false,
        mirror: true,
      });
    }
  });


  jQuery("#header .hd-mail").on("click", function () {
    const hAblum = jQuery(".album .abm-wrap").innerHeight();
    jQuery("#main").css({ "z-index": "100" });
    jQuery(".imessage").addClass("active");
  });

  jQuery(".imessage .imess-close").on("click", function () {
    jQuery("#main").css({ "z-index": "1", height: "auto" });
    jQuery(".imessage").removeClass("active");
  });

  jQuery(".album-bg .album-bg-ctn").on("click", function () {
    jQuery(".album-bg").removeClass("active");
    jQuery(".album-bg").addClass("hidden");
    unlockElements('#index, .tpl-main, .album');
  });

  jQuery(".album .abm-close").on("click", function () {
    jQuery(".album-bg").removeClass("hidden");
  });

  jQuery(".abm-close").on("click", function () {
    jQuery("#main").css({ "z-index": "1", height: "auto" });
    jQuery(".album").removeClass("active");
    jQuery(".album-bg").removeClass("active");
    jQuery("[data-aos]").removeClass("aos-animate");
  });

  $(".abm-box2 .abm-box2-loop").infiniteslide({
    speed: 25,
    pauseonhover: false,
    clone: 3,
  });

  $(".imessage .imess-slider .imess-slider-loop").infiniteslide({
    speed: 25,
    pauseonhover: false,
    clone: 3,
  });

});

// function parallax() {
//   document.querySelectorAll(".abm-parallax2 img").forEach((layer) => {
//     const speed = 7;
//     let y = -30;
//     const stScreen = window.innerHeight + window.scrollY;

//     if (stScreen > layer.getBoundingClientRect().bottom) {
//       y = (window.scrollY * speed) / 100 - 30;
//       layer.style.transform = `translateY(${y}px)`;
//     }

//     layer.style.transform = `translateY(${y}px)`;
//   });
// }

function parallax() {
  document.querySelectorAll(".abm-parallax img").forEach((layer) => {
    const speed = 2;
    const startY = -20;

    // Lấy vị trí thực tế của phần tử trên trang
    const offsetTop = layer.getBoundingClientRect().top + window.scrollY;
    // const offsetTop = layer.offsetTop;
    const scrollPos = window.scrollY;
    const windowHeight = window.innerHeight;

    // Khi phần tử bắt đầu xuất hiện trên màn hình
    if (scrollPos + windowHeight > offsetTop) {
      const distance = scrollPos + windowHeight - offsetTop;
      const y = startY + (distance * speed) / 100;
      layer.style.transform = `translateY(${y}px)`;
    } else {
      // Trước khi scroll đến => giữ nguyên -30px
      layer.style.transform = `translateY(${startY}px)`;
    }
  });
}
window.addEventListener("scroll", parallax);
window.addEventListener("load", parallax);
