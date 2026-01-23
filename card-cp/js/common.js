// ANCHOR LINK
var offset_PC = 0; /* offset header in PC (px) */
var offset_SP = 0; /* offset header in SP (px) */
function anchorLink(el) {
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

  // // =========== END - LAZY LOAD RESOURCE ============
  // $(window).on("load scroll", function () {
  //   // To-Top && Btnfix
  //   var st = jQuery("html,body").scrollTop();
  //   if (st >= 10) {
  //     jQuery(".to-top").addClass("show");
  //   } else {
  //     jQuery(".to-top").removeClass("show");
  //   }
  // });

  // =========== END - TO-TOP && Btnfix ============
});

// window.addEventListener("scroll", () => {
//   const el = document.querySelector(".abm5 img");
//   const rect = el.getBoundingClientRect();
//   if (rect.top < window.innerHeight && rect.bottom > 0) {
//     el.classList.add("aos-animate");
//   }
// });

// ========== SCROLL LOCK/UNLOCK ==========
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
// ========== END - SCROLL LOCK/UNLOCK ==========

// DOCUMENT READY
jQuery(document).ready(function () {
  "use strict";

  jQuery("#header .hd-album").on("click", function () {
    const hAblum = jQuery(".album .abm-wrap").innerHeight();
    jQuery("#main").css({ "z-index": "100", height: `${hAblum}px` });
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

  jQuery("#counter2_btn").on("click", function () {
    jQuery("#main").css({ "z-index": "100" });
  });
  jQuery("#counter2_close_btn").on("click", function () {
    jQuery("#main").css({ "z-index": "1", height: "auto" });
  });


  jQuery("#header .hd-mail").on("click", function () {
    jQuery("#main").css({ "z-index": "100" });
    jQuery(".imessage").addClass("active");
  });

  jQuery(".imessage .imess-close").on("click", function () {
    jQuery("#main").css({ "z-index": "1", height: "auto" });
    jQuery(".imessage").removeClass("active");
  });

  // jQuery(".album-bg .album-bg-ctn").on("click", function () {
  //   jQuery(".album-bg").removeClass("active");
  //   jQuery(".album-bg").addClass("hidden");
  //   unlockElements('#index, .tpl-main, .album');
  // });

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


// drag background album
const sheet = document.querySelector(".album-bg");
sheet.style.transition = "none"; // Bỏ transition khi dragging

let isDraggingAlbum = false; // Flag để track drag state

interact('.album-bg').draggable({
  inertia: false, // Tắt inertia để có control tốt hơn

  listeners: {
    start(event) {
      isDraggingAlbum = true;
      const target = event.target;
      // Bỏ transition khi bắt đầu drag
      target.style.transition = "none";
    },

    move(event) {
      const target = event.target;

      let y = parseFloat(target.getAttribute('data-y')) || 0;

      // Cập nhật trực tiếp dy (không nhân 0.9)
      y += event.dy;

      // không cho kéo xuống thêm
      if (y > 0) y = 0;

      target.style.transform = `translateY(${y}px)`;
      target.setAttribute('data-y', y);
    },

    end(event) {
      const target = event.target;
      let y = parseFloat(target.getAttribute('data-y')) || 0;
      isDraggingAlbum = false;

      // Thêm transition mượt khi kết thúc drag
      target.style.transition = "transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94)";

      // ⭐ Điều kiện: Kéo lên từ 40px trở lên (y <= -40)
      // Nếu kéo đủ 40px → tự động kéo tiếp và ẩn
      if (y <= -40) {
        // Auto slide lên mượt mà (kéo tổng cộng 500px để ẩn hoàn toàn)
        target.style.transform = "translateY(-100%)";
        target.setAttribute("data-y", -500);

        // Chờ animation hoàn tất (500ms) rồi mới ẩn
        setTimeout(() => {
          // Unlock elements TRƯỚC để restore scroll position
          unlockElements("#index, .tpl-main, .album");

          // Sau đó mới ẩn album-bg
          jQuery(".album-bg").removeClass("active").addClass("hidden");
          // jQuery(".album").removeClass("active");
          // jQuery("[data-aos]").removeClass("aos-animate");

          // Reset về trạng thái ban đầu (nhưng vẫn ẩn)
          target.style.transition = "none";
          target.style.transform = "translateY(0px)";
          target.setAttribute("data-y", 0);
        }, 400);

        return;
      }

      // Nếu không đủ 40px → trả sheet về như cũ với animation mượt
      target.style.transform = "translateY(0px)";
      target.setAttribute("data-y", 0);

      // Bỏ transition sau khi animation hoàn tất
      setTimeout(() => {
        target.style.transition = "none";
      }, 500);
    }
  }
});

