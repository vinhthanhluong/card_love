<?php
$otp_number = get_field('otp_number');
if ($otp_number): ?>
  <div id="otp-overlay" class="show">
    <div class="otp-card">
      <!-- <div class="heart-lock-wrapper">
        <div class="heart" id="heart"></div>
        <div class="lock" id="lock">
          <div class="lock-shackle"></div>
          <div class="lock-body">
            <div class="keyhole"></div>
          </div>
        </div>
        <div class="particles" id="particles"></div>
      </div> -->
      <div class="heart-container">
        <div class="glass-box" id="glassBox">
          <div class="glass-face glass-front"></div>
          <div class="glass-face glass-back"></div>
          <div class="glass-face glass-left"></div>
          <div class="glass-face glass-right"></div>
          <div class="glass-face glass-bottom"></div>
          <div class="glass-face glass-top" id="glassTop"></div>
          <div class="box-lock" id="boxLock"></div>
        </div>
        <div class="heart" id="heart"></div>
      </div>
      <p id="myText" class="tit">Mở khóa trái tim</p>

      <div class="otp-inputs">
        <div class="otp-input-wrapper">
          <input type="password" maxlength="1" disabled id="otp-1">
        </div>
        <div class="otp-input-wrapper">
          <input type="password" maxlength="1" disabled id="otp-2">
        </div>
        <div class="otp-input-wrapper">
          <input type="password" maxlength="1" disabled id="otp-3">
        </div>
        <div class="otp-input-wrapper">
          <input type="password" maxlength="1" disabled id="otp-4">
        </div>
      </div>

      <div class="otp-keypad">
        <div class="row">
          <button class="num"><span>1</span></button>
          <button class="num"><span>2</span></button>
          <button class="num"><span>3</span></button>
        </div>
        <div class="row">
          <button class="num"><span>4</span></button>
          <button class="num"><span>5</span></button>
          <button class="num"><span>6</span></button>
        </div>
        <div class="row">
          <button class="num"><span>7</span></button>
          <button class="num"><span>8</span></button>
          <button class="num"><span>9</span></button>
        </div>
        <div class="row">
          <div style="width:70px"></div>
          <button class="num">0</button>
          <div class="del"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="otp-blur"></div>

  <style>
    /* Định nghĩa các biến CSS Gold dựa trên rgba(255, 215, 0) */
    #otp-overlay {
      --gold-base: 118, 75, 162;
      /* Lưu trữ các kênh RGB */
      --gold-0-05: rgba(var(--gold-base), 0.05);
      --gold-0-08: rgba(var(--gold-base), 0.08);
      --gold-0-1: rgba(var(--gold-base), 0.1);
      --gold-0-12: rgba(var(--gold-base), 0.12);
      --gold-0-15: rgba(var(--gold-base), 0.15);
      --gold-0-2: rgba(var(--gold-base), 0.2);
      --gold-0-25: rgba(var(--gold-base), 0.25);
      --gold-0-3: rgba(var(--gold-base), 0.3);
      --gold-0-35: rgba(var(--gold-base), 0.35);
      --gold-0-4: rgba(var(--gold-base), 0.4);
      --gold-0-5: rgba(var(--gold-base), 0.5);
      --gold-0-6: rgba(var(--gold-base), 0.6);
      --gold-0-7: rgba(var(--gold-base), 0.7);
      --gold-0-8: rgba(var(--gold-base), 0.8);
      --gold-0-9: rgba(var(--gold-base), 0.9);
      --gold-solid: rgb(var(--gold-base));
      /* Màu vàng đặc, tương đương #ffd700 */

      position: fixed;
      inset: 0;
      /* height: 100dvh; */
      z-index: 9998;
      background: linear-gradient(135deg, #1a1a2e 0%, #16213e 30%, #0f3460 60%, #533483 100%);
      display: flex;
      justify-content: center;
      align-items: center;
      opacity: 0;
      visibility: hidden;
      transition: opacity .4s ease, visibility .4s ease;
      padding: 0 30px;
    }

    /* --- CÁC QUY TẮC KHÔNG THAY ĐỔI --- */
    .otp-blur {
      position: fixed;
      inset: 0;
      backdrop-filter: blur(1.5rem);
      background: rgba(255 255 255 0.45);
      transition: none;
      z-index: 100;
      /* nằm dưới overlay */
    }

    #otp-overlay.show {
      opacity: 1;
      visibility: visible;
    }

    #otp-overlay::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background:
        radial-gradient(circle at 15% 20%, rgba(138, 43, 226, 0.15) 0%, transparent 40%),
        radial-gradient(circle at 85% 80%, rgba(30, 144, 255, 0.15) 0%, transparent 40%),
        radial-gradient(circle at 50% 50%, rgba(255, 215, 0, 0.08) 0%, transparent 50%);
      /* GIỮ NGUYÊN */
      animation: breathe 10s ease-in-out infinite;
      z-index: -2;
    }

    @keyframes breathe {

      0%,
      100% {
        opacity: 0.6;
        transform: scale(1);
      }

      50% {
        opacity: 1;
        transform: scale(1.15);
      }
    }

    #otp-overlay::after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image:
        radial-gradient(circle, rgba(255, 255, 255, 0.8) 1px, transparent 1px),
        radial-gradient(circle, rgba(255, 255, 255, 0.6) 1px, transparent 1px),
        radial-gradient(circle, rgba(255, 255, 255, 0.4) 1px, transparent 1px);
      background-size: 200px 200px, 150px 150px, 100px 100px;
      background-position: 0 0, 40px 60px, 80px 30px;
      animation: twinkle 20s linear infinite;
      opacity: 0.5;
      z-index: -1;
    }

    @keyframes twinkle {
      0% {
        transform: translateY(0);
        opacity: 0.5;
      }

      50% {
        opacity: 0.8;
      }

      100% {
        transform: translateY(-100px);
        opacity: 0.5;
      }
    }

    .otp-card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-radius: 30px;
      padding: 50px 40px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
      text-align: center;
      max-width: 360px;
      width: 90%;
      position: relative;
      z-index: 1;
      transition: transform .3s ease;
    }

    .heart-container {
      position: relative;
      margin-bottom: 30px;
      width: 140px;
      height: 140px;
      margin-left: auto;
      margin-right: auto;
    }

    @keyframes float {

      0%,
      100% {
        transform: translateY(0px);
      }

      50% {
        transform: translateY(-10px);
      }
    }

    /* --- CÁC QUY TẮC GLASS ĐÃ CHỈNH SỬA --- */

    /* Hộp kính */
    .glass-box {
      position: absolute;
      top: 0;
      left: 0;
      width: 140px;
      height: 140px;
      transform-style: preserve-3d;
      transform: rotateX(-15deg) rotateY(20deg);
      transition: all 1s ease;
    }

    .glass-box.opening {
      animation: boxShake 0.5s ease;
    }

    .glass-box.disappear {
      animation: boxExplode 1.2s ease forwards;
    }

    @keyframes boxExplode {
      0% {
        opacity: 1;
        transform: rotateX(-15deg) rotateY(20deg) scale(1);
        filter: brightness(1);
      }

      30% {
        opacity: 1;
        transform: rotateX(-15deg) rotateY(20deg) scale(1.1);
        filter: brightness(1.3);
      }

      60% {
        opacity: 0.8;
        transform: rotateX(0deg) rotateY(360deg) scale(1.3);
        filter: brightness(1.5) blur(5px);
      }

      100% {
        opacity: 0;
        transform: rotateX(0deg) rotateY(720deg) scale(0.3);
        filter: brightness(2) blur(20px);
      }
    }

    @keyframes boxShake {

      0%,
      100% {
        transform: rotateX(-15deg) rotateY(20deg);
      }

      25% {
        transform: rotateX(-15deg) rotateY(20deg) translateX(-3px);
      }

      75% {
        transform: rotateX(-15deg) rotateY(20deg) translateX(3px);
      }
    }

    /* Các mặt hộp kính */
    .glass-face {
      position: absolute;
      background: rgba(255, 255, 255, 0.03);
      border: 2px solid var(--gold-0-6);
      /* ĐÃ DÙNG BIẾN */
      box-shadow:
        inset 0 0 50px rgba(255, 255, 255, 0.15),
        inset 20px 20px 30px var(--gold-0-1),
        /* ĐÃ DÙNG BIẾN */
        0 10px 40px var(--gold-0-25);
      /* ĐÃ DÙNG BIẾN */
    }

    /* Mặt trước */
    .glass-front {
      width: 140px;
      height: 140px;
      transform: translateZ(70px);
      background: linear-gradient(135deg,
          rgba(255, 255, 255, 0.15) 0%,
          rgba(255, 255, 255, 0.02) 40%,
          rgba(255, 255, 255, 0.08) 100%);
      border-width: 3px;
      box-shadow:
        inset -10px -10px 30px rgba(255, 255, 255, 0.2),
        inset 10px 10px 30px var(--gold-0-15),
        /* ĐÃ DÙNG BIẾN */
        0 10px 50px var(--gold-0-3);
      /* ĐÃ DÙNG BIẾN */
      transform-origin: left;
      transition: all 1.2s ease;
    }

    .glass-front.open {
      animation: doorOpen 1.2s ease forwards;
    }

    @keyframes doorOpen {
      0% {
        transform: translateZ(70px) rotateY(0deg);
      }

      100% {
        transform: translateZ(70px) rotateY(-120deg);
        opacity: 0;
      }
    }

    /* Mặt sau */
    .glass-back {
      width: 140px;
      height: 140px;
      transform: translateZ(-70px) rotateY(180deg);
      background: linear-gradient(135deg,
          rgba(255, 255, 255, 0.05),
          var(--gold-0-05));
      /* ĐÃ DÙNG BIẾN */
    }

    /* Mặt trái */
    .glass-left {
      width: 140px;
      height: 140px;
      transform: rotateY(-90deg) translateZ(70px);
      background: linear-gradient(to right,
          rgba(255, 255, 255, 0.12) 0%,
          rgba(255, 255, 255, 0.02) 50%,
          var(--gold-0-08) 100%);
      /* ĐÃ DÙNG BIẾN */
      box-shadow:
        inset 20px 0 40px rgba(255, 255, 255, 0.15),
        0 5px 30px var(--gold-0-2);
      /* ĐÃ DÙNG BIẾN */
    }

    /* Mặt phải */
    .glass-right {
      width: 140px;
      height: 140px;
      transform: rotateY(90deg) translateZ(70px);
      background: linear-gradient(to left,
          var(--gold-0-12) 0%,
          /* ĐÃ DÙNG BIẾN */
          rgba(255, 255, 255, 0.02) 50%,
          rgba(255, 255, 255, 0.08) 100%);
      box-shadow:
        inset -20px 0 40px var(--gold-0-15),
        /* ĐÃ DÙNG BIẾN */
        0 5px 30px var(--gold-0-2);
      /* ĐÃ DÙNG BIẾN */
    }

    /* Đáy */
    .glass-bottom {
      width: 140px;
      height: 140px;
      transform: rotateX(-90deg) translateZ(70px);
      background: linear-gradient(135deg,
          var(--gold-0-25) 0%,
          /* ĐÃ DÙNG BIẾN */
          var(--gold-0-15) 50%,
          /* ĐÃ DÙNG BIẾN */
          var(--gold-0-3) 100%);
      /* ĐÃ DÙNG BIẾN */
      border: 3px solid var(--gold-0-8);
      /* ĐÃ DÙNG BIẾN */
      box-shadow:
        inset 0 0 40px var(--gold-0-4),
        /* ĐÃ DÙNG BIẾN */
        inset -20px -20px 40px rgba(255, 255, 255, 0.2),
        0 -8px 30px var(--gold-0-3);
      /* ĐÃ DÙNG BIẾN */
    }

    /* Nắp hộp */
    .glass-top {
      width: 140px;
      height: 140px;
      transform: rotateX(90deg) translateZ(70px);
      background: linear-gradient(135deg,
          var(--gold-0-3) 0%,
          /* ĐÃ DÙNG BIẾN */
          rgba(255, 255, 255, 0.15) 30%,
          var(--gold-0-2) 70%,
          /* ĐÃ DÙNG BIẾN */
          var(--gold-0-35) 100%);
      /* ĐÃ DÙNG BIẾN */
      border: 3px solid var(--gold-0-9);
      /* ĐÃ DÙNG BIẾN */
      box-shadow:
        inset 0 0 40px var(--gold-0-4),
        /* ĐÃ DÙNG BIẾN */
        inset 20px 20px 40px rgba(255, 255, 255, 0.25),
        0 8px 35px var(--gold-0-4);
      /* ĐÃ DÙNG BIẾN */
    }

    /* Khóa vàng */
    .box-lock {
      position: absolute;
      bottom: 15px;
      left: 50%;
      transform: translateX(-50%) translateZ(71px);
      width: 22px;
      height: 26px;
      background: linear-gradient(135deg, var(--gold-solid) 0%, var(--gold-0-7) 100%, var(--gold-solid) 100%);
      /* ĐÃ DÙNG BIẾN cho #ffd700 */
      border-radius: 12px;
      box-shadow:
        0 4px 15px var(--gold-0-7),
        /* ĐÃ DÙNG BIẾN */
        inset 0 2px 5px rgba(255, 255, 255, 0.5),
        inset 0 -2px 5px rgba(0, 0, 0, 0.2);
      transition: all 0.8s ease;
      z-index: 10;
    }

    .box-lock::before {
      content: '';
      position: absolute;
      top: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 12px;
      height: 14px;
      border: 3px solid var(--gold-solid);
      /* ĐÃ DÙNG BIẾN cho #ffd700 */
      border-radius: 8px 8px 0 0;
      border-bottom: none;
      background: transparent;
      box-shadow:
        inset 0 2px 3px rgba(255, 255, 255, 0.3),
        0 2px 8px var(--gold-0-5);
      /* ĐÃ DÙNG BIẾN */
    }

    .box-lock::after {
      content: '';
      position: absolute;
      top: 11px;
      left: 50%;
      transform: translateX(-50%);
      width: 5px;
      height: 8px;
      background: #333;
      border-radius: 2.5px 2.5px 0 0;
    }

    .box-lock.unlocked {
      animation: lockFall 1s ease forwards;
    }

    @keyframes lockFall {
      0% {
        transform: translateX(-50%) translateZ(71px) rotate(0deg);
        opacity: 1;
      }

      50% {
        transform: translateX(-50%) translateY(80px) translateZ(71px) rotate(90deg);
        opacity: 0.7;
      }

      100% {
        transform: translateX(-50%) translateY(150px) translateZ(71px) rotate(180deg);
        opacity: 0;
      }
    }

    /* --- CÁC QUY TẮC KHÔNG THAY ĐỔI --- */

    /* Trái tim */
    .heart {
      width: 80px;
      height: 80px;
      position: absolute;
      top: 58%;
      left: 50%;
      transform: translate(-50%, -50%) rotateX(-15deg) rotateY(20deg);
      animation: pulse 1.5s ease-in-out infinite;
      transition: all 1s ease;
      z-index: 200;
      transform-style: preserve-3d;
    }

    .heart.freed {
      animation: heartFree 2s ease forwards;
    }

    @keyframes heartFree {
      0% {
        transform: translate(-50%, -50%) rotateX(-15deg) rotateY(20deg) scale(1);
        filter: brightness(1);
      }

      40% {
        transform: translate(-50%, -50%) rotateX(0deg) rotateY(0deg) scale(1.3);
        filter: brightness(1.1);
      }

      70% {
        transform: translate(-50%, -50%) rotateX(0deg) rotateY(0deg) scale(1.6);
        filter: brightness(1.3);
      }

      100% {
        transform: translate(-50%, -50%) rotateX(0deg) rotateY(0deg) scale(1.8);
        filter: brightness(1.4) drop-shadow(0 0 30px rgba(255, 23, 68, 0.8));
      }
    }

    @keyframes pulse {

      0%,
      100% {
        transform: translate(-50%, -50%) rotateX(-15deg) rotateY(20deg) scale(1);
      }

      50% {
        transform: translate(-50%, -50%) rotateX(-15deg) rotateY(20deg) scale(1.05);
      }
    }

    .heart::before,
    .heart::after {
      content: '';
      position: absolute;
      width: 40px;
      height: 66px;
      background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
      border-radius: 40px 40px 0 0;
    }

    .heart.freed::before,
    .heart.freed::after {
      background: linear-gradient(135deg, #ff6b9d 0%, #ff1744 100%);
    }

    .heart::before {
      left: 40px;
      transform: rotate(-45deg);
      transform-origin: 0 100%;
    }

    .heart::after {
      left: 0;
      transform: rotate(45deg);
      transform-origin: 100% 100%;
    }

    .tit {}

    .otp-inputs {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin: 20px 0;
    }

    .otp-input-wrapper {
      width: 18px;
      height: 18px;
      border-radius: 50%;
      background: #e0e0e0;
      transition: all 0.3s ease;
    }

    .otp-input-wrapper.show-label {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      transform: scale(1.2);
      box-shadow: 0 0 15px rgba(102, 126, 234, 0.5);
    }

    .otp-input-wrapper input {
      opacity: 0;
    }

    .otp-keypad .row {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-bottom: 10px;
    }

    .otp-keypad .num,
    .otp-keypad .del {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 70px;
      height: 70px;
      border: none;
      border-radius: 50%;
      background: linear-gradient(145deg, #f0f0f0, #cacaca);
      color: #333;
      font-size: 24px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.2s ease;
      box-shadow: 5px 5px 10px #bebebe, -5px -5px 10px #ffffff;
    }

    .otp-keypad .num:hover {
      background: linear-gradient(145deg, #cacaca, #f0f0f0);
    }

    .otp-keypad .del:hover {
      background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
    }

    .otp-keypad .num:active {
      transform: scale(0.95);
      box-shadow: inset 3px 3px 7px #bebebe, inset -3px -3px 7px #ffffff;
    }

    .otp-keypad .num span {
      pointer-events: none;
      -webkit-touch-callout: none;
      /* iOS Safari */
      -webkit-user-select: none;
      /* Safari */
      -khtml-user-select: none;
      /* Konqueror HTML */
      -moz-user-select: none;
      /* Old versions of Firefox */
      -ms-user-select: none;
      /* Internet Explorer/Edge */
      user-select: none;
    }

    .otp-keypad .del {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .otp-keypad .del:before {
      content: '';
      width: 24px;
      height: 24px;
      background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 24 24'%3E%3Cpath d='M22 3.41L20.59 2 12 10.59 3.41 2 2 3.41 10.59 12 2 20.59 3.41 22 12 13.41 20.59 22 22 20.59 13.41 12z'/%3E%3C/svg%3E") center/contain no-repeat;
    }

    .shake {
      animation: shake 0.3s ease;
    }

    @keyframes shake {

      0%,
      100% {
        transform: translateX(0);
      }

      25% {
        transform: translateX(-6px);
      }

      50% {
        transform: translateX(6px);
      }

      75% {
        transform: translateX(-4px);
      }
    }
  </style>

  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/gsap.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const inputs = document.querySelectorAll(".otp-inputs input");
      const buttons = document.querySelectorAll(".otp-keypad .num");
      const delBtn = document.querySelector(".otp-keypad .del");
      const overlay = document.getElementById("otp-overlay");
      const otpBlur = document.querySelector(".otp-blur");
      const otpCard = document.querySelector(".otp-card");
      const heart = document.getElementById('heart');
      const boxLock = document.getElementById('boxLock');
      const glassTop = document.getElementById('glassTop');
      const glassBox = document.getElementById('glassBox');
      const particlesContainer = document.getElementById('particles');
      const otpCorrect = "<?php echo $otp_number; ?>";
      let currentIndex = 0;
      let scrollPos = 0; // lưu vị trí scroll hiện tại

      // --- KHÓA BODY KHI SHOW OTP ---
      function lockBody() {
        scrollPos = window.scrollY;          // lưu scroll hiện tại
        document.body.style.position = 'fixed';
        document.body.style.top = `-${scrollPos}px`;
        document.body.style.left = '0';
        document.body.style.right = '0';
        document.body.style.overflow = 'hidden';
        document.body.style.width = '100%';
      }

      // --- MỞ KHÓA BODY KHI CLOSE OTP ---
      function unlockBody() {
        document.body.style.removeProperty('position');
        document.body.style.removeProperty('top');
        document.body.style.removeProperty('left');
        document.body.style.removeProperty('right');
        document.body.style.removeProperty('overflow');
        document.body.style.removeProperty('width');
        window.scrollTo(0, scrollPos);       // scroll trở về vị trí cũ
      }

      // show overlay + blur
      lockBody();
      overlay.classList.add("show");
      gsap.set(otpBlur, { backdropFilter: "blur(0px)", opacity: 0 });
      gsap.to(otpBlur, { backdropFilter: "blur(50px)", opacity: 1, duration: 1.2, ease: "power2.out" });

      function updateLabels() {
        inputs.forEach(i => {
          const w = i.parentElement;
          if (i.value) w.classList.add('show-label'); else w.classList.remove('show-label');
        });
      }

      function resetInputs() { inputs.forEach(i => i.value = ""); currentIndex = 0; updateLabels(); }

      function handleInput(v) {
        if (currentIndex < 4) {
          inputs[currentIndex].value = v;
          currentIndex++;
          updateLabels();
        }
        if (currentIndex === 4) {
          setTimeout(() => {
            let entered = ""; inputs.forEach(i => entered += i.value);
            if (entered === otpCorrect) {
              unlockHeart(() => {
                unlockOverlay();
              });
            }
            else { otpCard.classList.add("shake"); document.getElementById("myText").textContent = "Sai mật mã, hãy thử lại!"; resetInputs(); setTimeout(() => otpCard.classList.remove("shake"), 300); }
          }, 300);
        }
      }

      function unlockOverlay() {
        const tl = gsap.timeline({ onComplete: unlockBody });
        tl.to(overlay, {
          opacity: 0, duration: .8, ease: "power2.inOut", onComplete: () => {
            overlay.style.visibility = "hidden"; overlay.classList.remove("show");
          }
        });
        tl.to(otpBlur, { delay: 1, backdropFilter: "blur(0px)", opacity: 0, duration: 1.5, ease: "power2.out", onComplete: () => { otpBlur.style.display = "none"; } }, ">");
      }

      function unlockHeart(callback) {
        isUnlocked = true;

        // Lắc hộp
        glassBox.classList.add('opening');

        // Rơi khóa
        setTimeout(() => {
          boxLock.classList.add('unlocked');
        }, 300);

        // Mở cửa hộp (mặt trước)
        setTimeout(() => {
          const glassFront = document.querySelector('.glass-front');
          glassFront.classList.add('open');
        }, 700);

        // Hộp lùi ra sau và biến mất
        setTimeout(() => {
          glassBox.classList.add('disappear');
        }, 1700);

        // Trái tim phóng to tại chỗ
        setTimeout(() => {
          heart.classList.add('freed');

          // ⭐ Chờ animation của trái tim kết thúc ⭐
          const onDone = () => {
            heart.removeEventListener("animationend", onDone);
            heart.removeEventListener("transitionend", onDone);
            if (typeof callback === "function") callback();
          };

          heart.addEventListener("animationend", onDone);
          heart.addEventListener("transitionend", onDone);
        }, 1600);
      }

      buttons.forEach(b => b.addEventListener("click", () => handleInput(b.textContent)));
      delBtn.addEventListener("click", () => {
        if (currentIndex > 0) { currentIndex--; inputs[currentIndex].value = ""; updateLabels(); }
      });
      document.addEventListener("keydown", (e) => {
        if (!overlay.classList.contains("show")) return;
        if (e.key >= '0' && e.key <= '9') { handleInput(e.key); }
        else if (e.key === 'Backspace' || e.key === 'Delete') { if (currentIndex > 0) { currentIndex--; inputs[currentIndex].value = ""; updateLabels(); } }
      });
    });
  </script>
<?php endif; ?>