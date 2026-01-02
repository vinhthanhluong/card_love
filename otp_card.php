<?php
$otp_number = get_field('otp_number');
if ($otp_number): ?>
  <div id="otp-overlay" class="show">
    <div class="otp-card">
      <div class="heart-container">
        <div class="heart" id="heart">
        </div>
        <div class="heart-lock" id="heartLock">
          <div class="lock-shackle"></div>
          <div class="lock-body">
            <div class="keyhole"></div>
          </div>
        </div>
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
  <div class="fireworks-container" id="fireworks"></div>

  <style>
    #otp-overlay {
      --gold-base: 255, 215, 0;
      --gold-0-5: rgba(var(--gold-base), 0.5);
      --gold-0-7: rgba(var(--gold-base), 0.7);
      --gold-solid: rgb(var(--gold-base));

      position: fixed;
      inset: 0;
      z-index: 9998;
      background: #f5e6e8;
      display: flex;
      justify-content: center;
      align-items: center;
      opacity: 0;
      visibility: hidden;
      transition: opacity .4s ease, visibility .4s ease;
      padding: 0 30px;
      overflow: hidden;
    }

    .otp-blur {
      position: fixed;
      inset: 0;
      backdrop-filter: blur(1.5rem);
      background: rgba(255 255 255 0.45);
      transition: none;
      z-index: 100;
    }

    #otp-overlay.show {
      opacity: 1;
      visibility: visible;
    }

    #otp-overlay::before {
      content: "";
      position: absolute;
      top: -5%;
      left: -5%;
      width: 110%;
      height: 110%;
      background-image:
        radial-gradient(ellipse 600px 550px at 10% 20%, rgba(255, 192, 203, 0.4) 0%, transparent 70%),
        radial-gradient(ellipse 500px 480px at 90% 80%, rgba(255, 182, 193, 0.35) 0%, transparent 70%),
        radial-gradient(ellipse 400px 380px at 85% 15%, rgba(255, 218, 224, 0.3) 0%, transparent 65%),
        radial-gradient(ellipse 450px 420px at 15% 85%, rgba(255, 228, 225, 0.25) 0%, transparent 65%);
      z-index: -2;
    }

    #otp-overlay::after {
      content: "";
      position: absolute;
      width: 100%;
      height: 100%;
      opacity: 1;
      z-index: -1;
      pointer-events: none;
    }

    /* Tạo các đám mây hồng */
    #otp-overlay::after {
      background-image:
        radial-gradient(ellipse 300px 200px at 5% 10%, rgba(255, 192, 203, 0.3), transparent 60%),
        radial-gradient(ellipse 250px 180px at 2% 8%, rgba(255, 218, 224, 0.35), transparent 55%),
        radial-gradient(ellipse 350px 220px at 95% 85%, rgba(255, 182, 193, 0.35), transparent 65%),
        radial-gradient(ellipse 280px 190px at 97% 88%, rgba(255, 228, 225, 0.3), transparent 60%),
        radial-gradient(ellipse 320px 210px at 92% 12%, rgba(255, 192, 203, 0.28), transparent 58%),
        radial-gradient(ellipse 290px 195px at 8% 90%, rgba(255, 218, 224, 0.32), transparent 62%);
      background-repeat: no-repeat;
    }

    /* Thêm pattern trái tim rõ hơn */
    .otp-card::before {
      content: "";
      position: absolute;
      top: -50px;
      left: calc(50% - 50vw);
      right: calc(50% - 50vw);
      bottom: -50px;
      background-image:
        url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='200' height='200' viewBox='0 0 100 100'%3E%3Cpath d='M50,85 C30,65 15,50 15,35 C15,25 22,18 30,18 C37,18 43,23 50,30 C57,23 63,18 70,18 C78,18 85,25 85,35 C85,50 70,65 50,85 Z' fill='%23ffc0cb' opacity='0.25'/%3E%3C/svg%3E"),
        url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='120' height='120' viewBox='0 0 100 100'%3E%3Cpath d='M50,85 C30,65 15,50 15,35 C15,25 22,18 30,18 C37,18 43,23 50,30 C57,23 63,18 70,18 C78,18 85,25 85,35 C85,50 70,65 50,85 Z' fill='%23ffb6c1' opacity='0.2'/%3E%3C/svg%3E"),
        url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='150' height='150' viewBox='0 0 100 100'%3E%3Cpath d='M50,85 C30,65 15,50 15,35 C15,25 22,18 30,18 C37,18 43,23 50,30 C57,23 63,18 70,18 C78,18 85,25 85,35 C85,50 70,65 50,85 Z' fill='%23fadadd' opacity='0.18'/%3E%3C/svg%3E"),
        url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='90' height='90' viewBox='0 0 100 100'%3E%3Cpath d='M50,85 C30,65 15,50 15,35 C15,25 22,18 30,18 C37,18 43,23 50,30 C57,23 63,18 70,18 C78,18 85,25 85,35 C85,50 70,65 50,85 Z' fill='%23ffc0cb' opacity='0.15'/%3E%3C/svg%3E");
      background-size: 200px 200px, 260px 260px, 150px 150px, 90px 90px;
      background-position: calc(50% - 85px) 25%, calc(50% - 130px) 100%, 40% 80%, calc(50% + 130px) 42%;
      background-repeat: no-repeat;
      pointer-events: none;
      z-index: -1;
    }

    .otp-card {
      padding: 50px 15px;
      text-align: center;
      max-width: 360px;
      width: 90%;
      position: relative;
      z-index: 1;
      transition: transform .3s ease;
      height: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .heart-container {
      position: relative;
      margin-bottom: 30px;
      width: 140px;
      height: 140px;
      margin-left: auto;
      margin-right: auto;
      filter: drop-shadow(0 0 15px rgba(255, 23, 68, 0.5));
    }

    /* Trái tim */
    .heart {
      width: 120px;
      height: 120px;
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      animation: pulseCenter 2s ease-in-out infinite;
      z-index: 1;
    }

    @keyframes pulseCenter {

      0%,
      100% {
        transform: translate(-50%, -50%) scale(1);
      }

      50% {
        transform: translate(-50%, -50%) scale(1.05);
      }
    }

    .heart.freed {
      animation: heartFreeCenter 2s ease forwards;
    }

    @keyframes heartFreeCenter {
      0% {
        transform: translate(-50%, -50%) scale(1);
      }

      40% {
        transform: translate(-50%, -50%) scale(1.3);
      }

      70% {
        transform: translate(-50%, -50%) scale(1.5);
      }

      100% {
        transform: translate(-50%, -50%) scale(1.7);
      }
    }

    .heart::before,
    .heart::after {
      content: '';
      position: absolute;
      width: 60px;
      height: 99px;
      background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
      border-radius: 60px 60px 0 0;
    }

    .heart.freed::before,
    .heart.freed::after {
      background: linear-gradient(135deg, #ff6b9d 0%, #ff1744 100%);
    }

    .heart::before {
      left: 60px;
      transform: rotate(-45deg);
      transform-origin: 0 100%;
    }

    .heart::after {
      left: 0;
      transform: rotate(45deg);
      transform-origin: 100% 100%;
    }

    /* Ổ khóa */
    .heart-lock {
      position: absolute;
      right: 0;
      top: 50%;
      transform: translateY(-50%);
      width: 40px;
      height: 50px;
      z-index: 10;
      transition: all 0.8s ease;
    }

    .lock-shackle {
      position: absolute;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 24px;
      height: 26px;
      border: 5px solid var(--gold-solid);
      border-radius: 12px 12px 0 0;
      border-bottom: none;
      background: transparent;
      box-shadow:
        inset 0 2px 3px rgba(255, 255, 255, 0.3),
        0 2px 8px var(--gold-0-5);
      transition: all 0.5s ease;
    }

    .lock-body {
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 40px;
      height: 32px;
      background: linear-gradient(135deg, var(--gold-solid) 0%, var(--gold-0-7) 100%, var(--gold-solid) 100%);
      border-radius: 8px;
      box-shadow:
        0 4px 15px var(--gold-0-7),
        inset 0 2px 5px rgba(255, 255, 255, 0.5),
        inset 0 -2px 5px rgba(0, 0, 0, 0.2);
    }

    .keyhole {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 8px;
      height: 14px;
      background: #333;
      border-radius: 4px 4px 0 0;
    }

    .heart-lock.unlocked {
      animation: lockFall 1s ease forwards;
    }

    .heart-lock.unlocked .lock-shackle {
      animation: shackleOpen 0.5s ease forwards;
    }

    @keyframes shackleOpen {
      0% {
        transform: translateX(-50%) rotate(0deg);
      }

      100% {
        transform: translateX(-50%) translateX(-10px) rotate(-45deg);
      }
    }

    @keyframes lockFall {
      0% {
        transform: rotate(0deg);
        opacity: 1;
      }

      50% {
        transform: translateY(80px) rotate(90deg);
        opacity: 0.7;
      }

      100% {
        transform: translateY(150px) rotate(180deg);
        opacity: 0;
      }
    }

    /* Fireworks */
    .fireworks-container {
      position: fixed;
      inset: 0;
      pointer-events: none;
      z-index: 9999;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .fireworks-container.active {
      opacity: 1;
    }

    .firework {
      position: absolute;
      width: 6px;
      height: 6px;
      border-radius: 50%;
      animation: explode 1s ease-out forwards;
      box-shadow: 0 0 8px currentColor;
    }

    @keyframes explode {
      0% {
        transform: translate(0, 0) scale(1);
        opacity: 1;
      }

      100% {
        transform: translate(var(--tx), var(--ty)) scale(0);
        opacity: 0;
      }
    }

    .tit {
      font-size: 20px;
      font-weight: 600;
      color: #d8577e;
      margin-bottom: 10px;
      text-shadow: 0 2px 4px rgba(255, 133, 162, 0.15);
    }

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
      background: rgba(255, 255, 255, 0.6);
      border: 2px solid rgba(255, 107, 157, 0.3);
      transition: all 0.3s ease;
    }

    .otp-input-wrapper.show-label {
      background: linear-gradient(135deg, #ff85a2 0%, #e76f8f 100%);
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
      background: rgba(255, 255, 255, 0.9);
      color: #d8577e;
      font-size: 24px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.2s ease;
      box-shadow:
        0 4px 15px rgba(255, 107, 157, 0.2),
        0 2px 8px rgba(255, 23, 68, 0.1),
        inset 0 1px 0 rgba(255, 255, 255, 1);
    }

    .otp-keypad .num:hover {
      background: rgba(255, 255, 255, 1);
      box-shadow:
        0 6px 20px rgba(255, 107, 157, 0.3),
        0 3px 10px rgba(255, 23, 68, 0.15),
        inset 0 1px 0 rgba(255, 255, 255, 1);
      transform: translateY(-2px);
    }

    .otp-keypad .del:hover {
      background: linear-gradient(135deg, #ff6b9d 0%, #e76f8f 100%);
      box-shadow:
        0 6px 20px rgba(255, 107, 157, 0.45),
        0 3px 10px rgba(231, 111, 143, 0.35),
        0 0 25px rgba(255, 133, 162, 0.25),
        inset 0 1px 0 rgba(255, 255, 255, 0.4);
      transform: translateY(-2px);
    }

    .otp-keypad .num:active {
      transform: translateY(0) scale(0.95);
      box-shadow:
        0 2px 8px rgba(255, 107, 157, 0.25),
        inset 0 2px 4px rgba(255, 23, 68, 0.08);
    }

    .otp-keypad .num span {
      pointer-events: none;
      user-select: none;
    }

    .otp-keypad .del {
      background: linear-gradient(135deg, #ff85a2 0%, #e76f8f 100%);
      color: #fff;
      box-shadow:
        0 4px 15px rgba(255, 107, 157, 0.35),
        0 2px 8px rgba(231, 111, 143, 0.25),
        0 0 20px rgba(255, 133, 162, 0.15),
        inset 0 1px 0 rgba(255, 255, 255, 0.3);
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
      const heartLock = document.getElementById('heartLock');
      const fireworksContainer = document.getElementById('fireworks');
      const otpCorrect = "<?php echo $otp_number; ?>";
      let currentIndex = 0;
      let scrollPos = 0;

      function lockBody() {
        scrollPos = window.scrollY;
        document.body.style.position = 'fixed';
        document.body.style.top = `-${scrollPos}px`;
        document.body.style.left = '0';
        document.body.style.right = '0';
        document.body.style.overflow = 'hidden';
        document.body.style.width = '100%';
      }

      function unlockBody() {
        document.body.style.removeProperty('position');
        document.body.style.removeProperty('top');
        document.body.style.removeProperty('left');
        document.body.style.removeProperty('right');
        document.body.style.removeProperty('overflow');
        document.body.style.removeProperty('width');
        window.scrollTo(0, scrollPos);
      }

      lockBody();
      overlay.classList.add("show");
      gsap.set(otpBlur, { backdropFilter: "blur(0px)", opacity: 0 });
      gsap.to(otpBlur, { backdropFilter: "blur(50px)", opacity: 1, duration: 1.2, ease: "power2.out" });

      function updateLabels() {
        inputs.forEach(i => {
          const w = i.parentElement;
          if (i.value) w.classList.add('show-label');
          else w.classList.remove('show-label');
        });
      }

      function resetInputs() {
        inputs.forEach(i => i.value = "");
        currentIndex = 0;
        updateLabels();
      }

      function createFirework(x, y) {
        const colors = ['#ff004cff', '#ff004cff', '#ff004cff', '#ff004cff'];
        const particles = 40;

        for (let i = 0; i < particles; i++) {
          const firework = document.createElement('div');
          firework.className = 'firework';
          firework.style.left = x + 'px';
          firework.style.top = y + 'px';
          firework.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];

          const angle = (Math.PI * 2 * i) / particles;
          const velocity = 80 + Math.random() * 60;
          const tx = Math.cos(angle) * velocity;
          const ty = Math.sin(angle) * velocity;

          firework.style.setProperty('--tx', tx + 'px');
          firework.style.setProperty('--ty', ty + 'px');

          fireworksContainer.appendChild(firework);

          setTimeout(() => firework.remove(), 1000);
        }
      }

      function launchFireworks() {
        fireworksContainer.classList.add('active');

        // Lấy vị trí của trái tim
        const heartRect = heart.getBoundingClientRect();
        const heartCenterX = heartRect.left + heartRect.width / 2;
        const heartCenterY = heartRect.top + heartRect.height / 2;

        // Bắn pháo hoa xung quanh trái tim (trái, phải, dưới)
        const positions = [
          { x: heartCenterX - 120, y: heartCenterY }, // Trái
          { x: heartCenterX + 120, y: heartCenterY }, // Phải
          { x: heartCenterX - 80, y: heartCenterY + 100 }, // Dưới trái
          { x: heartCenterX + 80, y: heartCenterY + 100 }, // Dưới phải
          { x: heartCenterX, y: heartCenterY + 120 }, // Dưới giữa
          { x: heartCenterX - 150, y: heartCenterY + 60 }, // Trái dưới
          { x: heartCenterX + 150, y: heartCenterY + 60 }, // Phải dưới
        ];

        // Bắn pháo hoa tại các vị trí xung quanh
        positions.forEach((pos, i) => {
          setTimeout(() => {
            const offsetX = (Math.random() - 0.5) * 30;
            const offsetY = (Math.random() - 0.5) * 30;
            createFirework(pos.x + offsetX, pos.y + offsetY);
          }, i * 150);
        });

        setTimeout(() => {
          fireworksContainer.classList.remove('active');
        }, 2500);
      }

      function handleInput(v) {
        if (currentIndex < 4) {
          inputs[currentIndex].value = v;
          currentIndex++;
          updateLabels();
        }
        if (currentIndex === 4) {
          setTimeout(() => {
            let entered = "";
            inputs.forEach(i => entered += i.value);
            if (entered === otpCorrect) {
              unlockHeart(() => {
                unlockOverlay();
              });
            } else {
              otpCard.classList.add("shake");
              document.getElementById("myText").textContent = "Sai mật mã, hãy thử lại!";
              resetInputs();
              setTimeout(() => otpCard.classList.remove("shake"), 300);
            }
          }, 300);
        }
      }

      function unlockOverlay() {
        const tl = gsap.timeline({ onComplete: unlockBody });
        tl.to(overlay, {
          opacity: 0,
          duration: .8,
          ease: "power2.inOut",
          onComplete: () => {
            overlay.style.visibility = "hidden";
            overlay.classList.remove("show");
          }
        });
        tl.to(otpBlur, {
          delay: 1,
          backdropFilter: "blur(0px)",
          opacity: 0,
          duration: 1,
          ease: "power2.out",
          onComplete: () => {
            otpBlur.style.display = "none";
          }
        }, ">");
      }

      function unlockHeart(callback) {
        // Bắn pháo hoa
        launchFireworks();

        // Mở khóa và rơi
        heartLock.classList.add('unlocked');

        // Trái tim phóng to
        setTimeout(() => {
          heart.classList.add('freed');

          // Đợi animation thực sự kết thúc
          const onDone = () => {
            heart.removeEventListener("animationend", onDone);
            heart.removeEventListener("transitionend", onDone);
            if (typeof callback === "function") callback();
          };

          heart.addEventListener("animationend", onDone);
          heart.addEventListener("transitionend", onDone);
        }, 500);
      }

      buttons.forEach(b => b.addEventListener("click", () => handleInput(b.textContent)));
      delBtn.addEventListener("click", () => {
        if (currentIndex > 0) {
          currentIndex--;
          inputs[currentIndex].value = "";
          updateLabels();
        }
      });

      document.addEventListener("keydown", (e) => {
        if (!overlay.classList.contains("show")) return;
        if (e.key >= '0' && e.key <= '9') {
          handleInput(e.key);
        } else if (e.key === 'Backspace' || e.key === 'Delete') {
          if (currentIndex > 0) {
            currentIndex--;
            inputs[currentIndex].value = "";
            updateLabels();
          }
        }
      });
    });
  </script>
<?php endif; ?>