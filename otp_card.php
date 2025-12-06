<?php
$otp_number = get_field('otp_number');
if ($otp_number): ?>
  <div id="otp-overlay" class="show">
    <div class="otp-card">
      <div class="heart-lock-wrapper">
        <div class="heart" id="heart"></div>
        <div class="lock" id="lock">
          <div class="lock-shackle"></div>
          <div class="lock-body">
            <div class="keyhole"></div>
          </div>
        </div>
        <div class="particles" id="particles"></div>
      </div>
      <p id="myText" class="tit">✨ Mở khóa trái tim 💖</p>

      <div class="otp-inputs">
        <div class="otp-input-wrapper">
          <input type="password" maxlength="1" disabled id="otp-1">
          <label for="otp-1"><img
              src="<?php echo get_stylesheet_directory_uri(); ?>/card-cp/images/ic-heart.svg"
              alt="num"></label>
        </div>
        <div class="otp-input-wrapper">
          <input type="password" maxlength="1" disabled id="otp-2">
          <label for="otp-2"><img
              src="<?php echo get_stylesheet_directory_uri(); ?>/card-cp/images/ic-heart.svg"
              alt="num"></label>
        </div>
        <div class="otp-input-wrapper">
          <input type="password" maxlength="1" disabled id="otp-3">
          <label for="otp-3"><img
              src="<?php echo get_stylesheet_directory_uri(); ?>/card-cp/images/ic-heart.svg"
              alt="num"></label>
        </div>
        <div class="otp-input-wrapper">
          <input type="password" maxlength="1" disabled id="otp-4">
          <label for="otp-4"><img
              src="<?php echo get_stylesheet_directory_uri(); ?>/card-cp/images/ic-heart.svg"
              alt="num"></label>
        </div>
      </div>

      <div class="otp-keypad">
        <div class="row">
          <button class="num">1</button>
          <button class="num">2</button>
          <button class="num">3</button>
        </div>
        <div class="row">
          <button class="num">4</button>
          <button class="num">5</button>
          <button class="num">6</button>
        </div>
        <div class="row">
          <button class="num">7</button>
          <button class="num">8</button>
          <button class="num">9</button>
        </div>
        <div class="row">
          <div style="width:60px"></div>
          <button class="num">0</button>
          <div class="del"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="otp-blur"></div>

  <style>
    .otp-blur {
      position: fixed;
      inset: 0;
      backdrop-filter: blur(1.5rem);
      background: rgba(255 255 255 0.45);
      transition: none;
      z-index: 100;
      /* nằm dưới overlay */
    }

    #otp-overlay {
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
      padding: 30px 20px;
      border-radius: 15px;
      text-align: center;
      width: 300px;
      transition: transform .3s ease;
    }

    .heart-lock-wrapper {
      position: relative;
      margin: 0 auto 20px;
    }

    .heart {
      position: relative;
      width: 100px;
      height: 90px;
      margin: 0 auto;
      transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .heart.unlocked {
      transform: scale(1.2);
      filter: drop-shadow(0 0 30px rgba(255, 107, 107, 0.8));
    }

    .heart::before,
    .heart::after {
      content: "";
      position: absolute;
      top: 0;
      width: 52px;
      height: 80px;
      background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);
      border-radius: 50px 50px 0 0;
      transition: all 0.6s ease;
    }

    .heart::before {
      left: 50px;
      transform: rotate(-45deg);
      transform-origin: 0 100%;
    }

    .heart::after {
      left: 0;
      transform: rotate(45deg);
      transform-origin: 100% 100%;
    }

    .heart.unlocked::before {
      transform: rotate(-45deg) scale(1.1);
    }

    .heart.unlocked::after {
      transform: rotate(45deg) scale(1.1);
    }

    .lock {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 50px;
      height: 32px;
      transition: all 0.6s ease;
      z-index: 10;
    }

    .lock.unlocking {
      animation: unlock 0.8s ease forwards;
    }

    @keyframes unlock {
      0% {
        transform: translate(-50%, -50%) rotate(0deg);
        opacity: 1;
      }

      50% {
        transform: translate(-50%, -80%) rotate(20deg);
        opacity: 0.5;
      }

      100% {
        transform: translate(-50%, -120%) rotate(40deg);
        opacity: 0;
      }
    }

    .lock-body {
      width: 100%;
      height: 35px;
      background: linear-gradient(135deg, #ffd93d 0%, #f6c23e 100%);
      border-radius: 8px;
      position: absolute;
      bottom: -4px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    .lock-shackle {
      width: 30px;
      height: 25px;
      border: 5px solid #ffd93d;
      border-bottom: none;
      border-radius: 15px 15px 0 0;
      position: absolute;
      top: -23px;
      left: 10px;
      transition: all 0.6s ease;
    }

    .lock.unlocking .lock-shackle {
      transform: translateX(15px) rotate(45deg);
    }

    .keyhole {
      width: 8px;
      height: 12px;
      background: #333;
      position: absolute;
      top: 8px;
      left: 50%;
      transform: translateX(-50%);
      border-radius: 50% 50% 0 0;
    }

    .keyhole::after {
      content: "";
      width: 3px;
      height: 8px;
      background: #333;
      position: absolute;
      bottom: -8px;
      left: 50%;
      transform: translateX(-50%);
    }

    .particles {
      position: absolute;
      top: 50%;
      left: 50%;
      width: 200px;
      height: 200px;
      transform: translate(-50%, -50%);
      pointer-events: none;
    }

    .particle {
      position: absolute;
      width: 8px;
      height: 8px;
      background: #ff6b6b;
      border-radius: 50%;
      opacity: 0;
    }

    .particle.active {
      animation: burst 1s ease-out forwards;
    }

    @keyframes burst {
      0% {
        opacity: 1;
        transform: translate(0, 0) scale(1);
      }

      100% {
        opacity: 0;
        transform: translate(var(--tx), var(--ty)) scale(0);
      }
    }

    .tit {
      color: #fff;
    }

    .otp-inputs {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin: 20px 0;
    }

    .otp-input-wrapper {
      width: 50px;
      height: 50px;
      font-size: 24px;
      text-align: center;
      border: none;
      border-radius: 100%;
      box-shadow: 0 10px 18px rgba(0, 0, 0, 0.06), inset 0 1px 0 rgba(255, 255, 255, 0.6);
      color: #fff;
      position: relative;
      background-color: rgba(239, 239, 239, 0.3);
      background-color: light-dark(rgba(239, 239, 239, 0.3), rgba(59, 59, 59, 0.3));
    }

    .otp-input-wrapper input {
      opacity: 0;
      width: 100%;
      height: 100%;
    }

    .otp-input-wrapper label {
      position: absolute;
      inset: 0;
      margin: auto;
      width: fit-content;
      height: fit-content;
      color: #fff;
      font-size: 20px;
      line-height: 1em;
      pointer-events: none;
      opacity: 0;
      transition: opacity 0.2s ease;
    }

    .otp-input-wrapper label img {
      width: 20px;
      height: 20px;
      opacity: 0.8;
    }

    .otp-input-wrapper.show-label label {
      opacity: 1;
    }

    .otp-keypad .row {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-bottom: 10px;
    }

    .otp-keypad .num,
    .otp-keypad .del {
      /* color: #fff;
            width: 64px;
            height: 64px;
            border-radius: 999px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 600;
            cursor: pointer;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.35), rgba(255, 255, 255, 0.10));
            box-shadow: 0 10px 18px rgba(0, 0, 0, 0.06), inset 0 1px 0 rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(8px) saturate(120%);
            -webkit-backdrop-filter: blur(8px) saturate(120%);
            transition: transform 160ms cubic-bezier(.2, .9, .3, 1); */

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
      const lock = document.getElementById('lock');
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
            if (entered === otpCorrect) { unlockHeart(); unlockOverlay(); }
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

      function unlockHeart() {
        lock.classList.add('unlocking');
        setTimeout(() => {
          heart.classList.add('unlocked');
          createParticles();
        }, 300);
      }

      function createParticles() {
        const particleCount = 20;
        for (let i = 0; i < particleCount; i++) {
          const p = document.createElement('div'); p.className = 'particle';
          const angle = (Math.PI * 2 * i) / particleCount; const distance = 100;
          const tx = Math.cos(angle) * distance, ty = Math.sin(angle) * distance;
          p.style.setProperty('--tx', `${tx}px`);
          p.style.setProperty('--ty', `${ty}px`);
          particlesContainer.appendChild(p);
          setTimeout(() => p.classList.add('active'), 50);
          setTimeout(() => p.remove(), 1050);
        }
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