
if (jQuery(".music-wrapper").length > 0) {
  document.addEventListener("DOMContentLoaded", function () {
    var iframeMp3 = document.getElementById("sc-player");
    var widgetMp3 = SC.Widget(iframeMp3);
    var btnMp3 = document.getElementById("toggle-sound");
    var btnBackMp3 = document.getElementById("btn-back");
    var playPauseBtn = document.getElementById("play-pause-btn");
    var playIcon = document.getElementById("playIcon");
    var pauseIcon = document.getElementById("pauseIcon");
    var titleMp3 = document.getElementById("music-title");
    var artist = document.getElementById("music-artist");
    var canvas = document.getElementById("waveform-canvas");
    var ctx = canvas ? canvas.getContext("2d") : null;
    var wrapperMp3 = document.querySelector(".music-wrapper");
    var isPlaying = false;
    var durationMp3 = 0;
    var isReadyMp3 = false;
    var hasStartedPlaying = false;
    var waveformData = null;
    var allowIconChange = false; // Flag để kiểm soát việc đổi icon

    // Hàm vẽ waveform
    function drawWaveform(waveData, progressPercent) {
      if (!canvas || !ctx) return;

      var dpr = window.devicePixelRatio || 1;
      var rect = canvas.getBoundingClientRect();
      canvas.width = rect.width * dpr;
      canvas.height = rect.height * dpr;
      ctx.scale(dpr, dpr);

      var width = rect.width;
      var height = rect.height;
      var gap = 1;
      var barWidth = (width / waveData.length) - gap;

      ctx.clearRect(0, 0, width, height);

      waveData.forEach(function (value, index) {
        var normalizedHeight = Math.max(0.05, value) * height * 0.9;
        var x = index * (barWidth + gap);
        var y = (height - normalizedHeight) / 2;

        var barProgress = (index / waveData.length) * 100;
        var isPlayed = barProgress <= (progressPercent || 0);

        if (isPlayed) {
          // Gradient hồng-tím cho phần đã phát
          var gradient = ctx.createLinearGradient(x, y, x, y + normalizedHeight);
          gradient.addColorStop(0, '#EB7A7D');
          gradient.addColorStop(1, '#FF1442');
          ctx.fillStyle = gradient;
        } else {
          // Màu mờ cho phần chưa phát
          ctx.fillStyle = 'rgba(212, 165, 216, 0.25)';
        }

        var radius = Math.min(barWidth / 2, 2);
        ctx.beginPath();
        ctx.moveTo(x + radius, y);
        ctx.lineTo(x + barWidth - radius, y);
        ctx.quadraticCurveTo(x + barWidth, y, x + barWidth, y + radius);
        ctx.lineTo(x + barWidth, y + normalizedHeight - radius);
        ctx.quadraticCurveTo(x + barWidth, y + normalizedHeight, x + barWidth - radius, y + normalizedHeight);
        ctx.lineTo(x + radius, y + normalizedHeight);
        ctx.quadraticCurveTo(x, y + normalizedHeight, x, y + normalizedHeight - radius);
        ctx.lineTo(x, y + radius);
        ctx.quadraticCurveTo(x, y, x + radius, y);
        ctx.closePath();
        ctx.fill();
      });
    }

    // Hàm lấy waveform từ SoundCloud
    function loadWaveform(sound) {
      if (!sound) {
        createFallbackWaveform();
        return;
      }

      var waveformUrl = sound.waveform_url;

      if (!waveformUrl) {
        createFallbackWaveform();
        return;
      }

      fetch(waveformUrl)
        .then(function (response) {
          if (!response.ok) throw new Error('Network response was not ok');
          return response.json();
        })
        .then(function (data) {
          var samples = data.samples || data.height || [];

          if (!samples || samples.length === 0) {
            throw new Error('No samples in waveform data');
          }

          var targetBars = 90;
          var step = Math.max(1, Math.floor(samples.length / targetBars));

          waveformData = [];
          var maxValue = Math.max.apply(Math, samples);

          for (var i = 0; i < samples.length; i += step) {
            if (waveformData.length >= targetBars) break;
            var normalizedValue = samples[i] / maxValue;
            waveformData.push(normalizedValue);
          }

          drawWaveform(waveformData, 0);
        })
        .catch(function (error) {
          console.error("Error loading waveform:", error);
          createFallbackWaveform();
        });
    }

    // Tạo waveform giả
    function createFallbackWaveform() {
      waveformData = [];

      for (var i = 0; i < 90; i++) {
        var wave1 = Math.sin(i * 0.15) * 0.3;
        var wave2 = Math.sin(i * 0.4) * 0.2;
        var wave3 = Math.sin(i * 0.8) * 0.15;
        var noise = (Math.random() - 0.5) * 0.3;
        var trend = Math.sin(i * 0.05) * 0.2;
        var value = 0.4 + wave1 + wave2 + wave3 + noise + trend;
        value = Math.max(0.1, Math.min(1, value));
        waveformData.push(value);
      }

      drawWaveform(waveformData, 0);
    }

    // Hàm cập nhật waveform
    function updateWaveformProgress(progressPercent) {
      if (!waveformData) return;
      drawWaveform(waveformData, progressPercent);
    }

    // Hàm đóng popup
    function closePlayer() {
      if (isPlaying && isReadyMp3) {
        widgetMp3.pause();
      }
      wrapperMp3.classList.remove("show");
    }

    // widgetMp3 ready
    widgetMp3.bind(SC.Widget.Events.READY, function () {
      isReadyMp3 = true;

      // QUAN TRỌNG: Dừng widgetMp3 ngay lập tức
      widgetMp3.pause();
      widgetMp3.seekTo(0);

      widgetMp3.getCurrentSound(function (sound) {
        if (sound) {
          titleMp3.textContent = sound.titleMp3;
          artist.textContent = sound.user ? sound.user.username : 'Unknown Artist';

          loadWaveform(sound);
        }
      });

      widgetMp3.getDuration(function (d) {
        durationMp3 = d;
      });

      if (playPauseBtn) {
        playPauseBtn.style.display = 'flex';
      }

      // Đảm bảo icon ban đầu là PLAY
      if (playIcon && pauseIcon) {
        playIcon.style.display = "block";
        pauseIcon.style.display = "none";
      }

      // Kiểm tra và force pause
      setTimeout(function () {
        widgetMp3.isPaused(function (paused) {
          if (!paused) {
            widgetMp3.pause();
          }
          // Sau khi đã đảm bảo pause, mới cho phép đổi icon
          allowIconChange = true;
        });
      }, 100);
    });

    // Toggle player - CHỈ MỞ/ĐÓNG
    btnMp3.addEventListener("click", function () {
      wrapperMp3.classList.toggle("show");
    });

    // Back button
    btnBackMp3.addEventListener("click", function () {
      closePlayer();
    });

    // Play/Pause button
    playPauseBtn.addEventListener("click", function () {

      if (!isReadyMp3) {
        return;
      }

      if (isPlaying) {
        widgetMp3.pause();
      } else {
        if (!hasStartedPlaying) {
          widgetMp3.seekTo(0);
          hasStartedPlaying = true;
        }
        widgetMp3.play();
      }
    });

    // PLAY event - CHỈ THAY ĐỔI ICON KHI allowIconChange = true
    widgetMp3.bind(SC.Widget.Events.PLAY, function () {

      // Chỉ cho phép đổi icon nếu đã sẵn sàng
      if (!allowIconChange) {
        // Force pause ngay lập tức
        widgetMp3.pause();
        return;
      }

      isPlaying = true;

      if (playIcon && pauseIcon) {
        playIcon.style.display = "none";
        pauseIcon.style.display = "block";
      }
    });

    // PAUSE event
    widgetMp3.bind(SC.Widget.Events.PAUSE, function () {

      // Chỉ cho phép đổi icon nếu đã sẵn sàng
      if (!allowIconChange) {
        return;
      }

      isPlaying = false;

      if (playIcon && pauseIcon) {
        playIcon.style.display = "block";
        pauseIcon.style.display = "none";
      }
    });

    // FINISH event
    widgetMp3.bind(SC.Widget.Events.FINISH, function () {
      isPlaying = false;
      hasStartedPlaying = false;

      if (playIcon && pauseIcon) {
        playIcon.style.display = "block";
        pauseIcon.style.display = "none";
      }

      updateWaveformProgress(0);
      widgetMp3.seekTo(0);
    });

    // Play progress
    widgetMp3.bind(SC.Widget.Events.PLAY_PROGRESS, function (e) {
      if (durationMp3 > 0 && isPlaying) {
        var progressPercent = e.relativePosition * 100;
        updateWaveformProgress(progressPercent);
      }
    });

    // Click waveform to seek
    if (canvas) {
      canvas.addEventListener("click", function (e) {
        if (!isReadyMp3 || durationMp3 === 0) return;

        var rect = canvas.getBoundingClientRect();
        var percent = (e.clientX - rect.left) / rect.width;
        widgetMp3.seekTo(percent * durationMp3);
        updateWaveformProgress(percent * 100);
      });
    }

    // Error handler
    widgetMp3.bind(SC.Widget.Events.ERROR, function (error) {
      console.error("SoundCloud error:", error);
      titleMp3.textContent = "Không thể tải bài hát";
      artist.textContent = "Vui lòng thử lại sau";
    });

    // Click outside
    wrapperMp3.addEventListener("click", function (e) {
      if (e.target === wrapperMp3) {
        closePlayer();
      }
    });

    // Keyboard shortcuts
    document.addEventListener("keydown", function (e) {
      if (e.code === "Space" && wrapperMp3.classList.contains("show")) {
        e.preventDefault();
        playPauseBtn.click();
      }
      if (e.code === "Escape" && wrapperMp3.classList.contains("show")) {
        closePlayer();
      }
    });

    // Resize handler
    window.addEventListener("resize", function () {
      if (waveformData) {
        var currentProgress = 0;
        if (isPlaying) {
          widgetMp3.getPosition(function (position) {
            if (durationMp3 > 0) {
              currentProgress = (position / durationMp3) * 100;
              updateWaveformProgress(currentProgress);
            }
          });
        } else {
          updateWaveformProgress(0);
        }
      }
    });
  });
}