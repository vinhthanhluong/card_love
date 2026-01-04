jQuery(document).ready(function () {
  "use strict";

  //header
  const toggleBtn = document.getElementById("toggleBtn");
  const albumBtn = document.querySelector(".hd-album");
  const mailBtn = document.querySelector(".hd-mail");
  const soundBtn = document.querySelector(".hd-sound");
  const recordBtn = document.querySelector(".hd-record");
  const soundIcon = document.getElementById("soundIcon");

  let isOpen = false;

  // Hàm tính toán vị trí đều cho các nút
  // Phần tư thứ 3 trên màn hình: Trái-Dưới (xoay thêm để xuống dưới nhiều hơn)
  function calculatePositions(buttonCount) {
    const radius = 85; // Bán kính
    // Xoay thêm để các nút xổ xuống dưới nhiều hơn
    const startAngle = 180; // Góc bắt đầu - Gần trái
    const endAngle = 270; // Góc kết thúc - Xuống dưới
    const angleRange = endAngle - startAngle; // 90° range
    const angleStep = angleRange / (buttonCount - 1);

    const positions = [];
    for (let i = 0; i < buttonCount; i++) {
      const angle = ((startAngle + angleStep * i) * Math.PI) / 180;
      const x = Math.cos(angle) * radius;
      const y = -Math.sin(angle) * radius; // Đảo dấu vì CSS Y+ xuống
      positions.push({ x, y });
    }

    return positions;
  }

  // Toggle menu
  toggleBtn.addEventListener("click", () => {
    isOpen = !isOpen;
    toggleBtn.classList.toggle("active");

    // Lấy tất cả các nút con đang hiển thị
    const buttons = [albumBtn, mailBtn, soundBtn, recordBtn].filter(
      (btn) => btn !== null
    );

    if (isOpen) {
      // Tính toán vị trí tự động dựa trên số lượng nút
      const positions = calculatePositions(buttons.length);

      buttons.forEach((btn, index) => {
        setTimeout(() => {
          btn.classList.add("show");
          btn.style.transform = `translate(${positions[index].x}px, ${positions[index].y}px)`;
        }, index * 50);
      });
    } else {
      buttons.forEach((btn, index) => {
        setTimeout(() => {
          btn.classList.remove("show");
          btn.style.transform = "translate(0, 0)";
        }, index * 30);
      });
    }
  });

  // Đóng menu khi click ra ngoài
  document.addEventListener("click", (e) => {
    if (!e.target.closest(".hd-wrapper") && isOpen) {
      toggleBtn.click();
    }
  });
});