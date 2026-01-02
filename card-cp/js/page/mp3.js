document.addEventListener("DOMContentLoaded", function () {
  var iframe = document.getElementById("sc-player");
  var widget = SC.Widget(iframe);
  var btn = document.getElementById("toggle-sound");
  var btnBack = document.getElementById("btn-back");
  var playPauseBtn = document.getElementById("play-pause-btn");
  var playIcon = document.getElementById("playIcon");
  var pauseIcon = document.getElementById("pauseIcon");
  var soundIcon = document.getElementById("sound-icon");
  var title = document.getElementById("music-title");
  var artist = document.getElementById("music-artist");
  var progress = document.getElementById("progress");
  var canvas = document.getElementById("waveform-canvas");
  var ctx = canvas ? canvas.getContext("2d") : null;
  var wrapper = document.querySelector(".music-wrapper");
  var isPlaying = false;
  var duration = 0;
  var isReady = false;
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
        gradient.addColorStop(0, '#ff6b9d');
        gradient.addColorStop(1, '#c56cf0');
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
    if (isPlaying && isReady) {
      widget.pause();
    }
    wrapper.classList.remove("show");
  }

  // Widget ready
  widget.bind(SC.Widget.Events.READY, function () {
    console.log("Widget READY event");
    isReady = true;

    // QUAN TRỌNG: Dừng widget ngay lập tức
    widget.pause();
    widget.seekTo(0);

    widget.getCurrentSound(function (sound) {
      if (sound) {
        title.textContent = sound.title;
        artist.textContent = sound.user ? sound.user.username : 'Unknown Artist';

        loadWaveform(sound);
      }
    });

    widget.getDuration(function (d) {
      duration = d;
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
      widget.isPaused(function (paused) {
        console.log("Is paused:", paused);
        if (!paused) {
          console.log("Force pausing widget");
          widget.pause();
        }
        // Sau khi đã đảm bảo pause, mới cho phép đổi icon
        allowIconChange = true;
      });
    }, 100);
  });

  // Toggle player - CHỈ MỞ/ĐÓNG
  btn.addEventListener("click", function () {
    wrapper.classList.toggle("show");
  });

  // Back button
  btnBack.addEventListener("click", function () {
    closePlayer();
  });

  // Play/Pause button
  playPauseBtn.addEventListener("click", function () {
    console.log("Play/Pause clicked, isReady:", isReady, "isPlaying:", isPlaying);

    if (!isReady) {
      console.log("Widget not ready yet");
      return;
    }

    if (isPlaying) {
      console.log("Pausing...");
      widget.pause();
    } else {
      console.log("Playing...");
      if (!hasStartedPlaying) {
        widget.seekTo(0);
        hasStartedPlaying = true;
      }
      widget.play();
    }
  });

  // PLAY event - CHỈ THAY ĐỔI ICON KHI allowIconChange = true
  widget.bind(SC.Widget.Events.PLAY, function () {
    console.log("PLAY event triggered, allowIconChange:", allowIconChange);

    // Chỉ cho phép đổi icon nếu đã sẵn sàng
    if (!allowIconChange) {
      console.log("Ignoring PLAY event (not allowed to change icon yet)");
      // Force pause ngay lập tức
      widget.pause();
      return;
    }

    isPlaying = true;

    if (playIcon && pauseIcon) {
      console.log("Changing to PAUSE icon");
      playIcon.style.display = "none";
      pauseIcon.style.display = "block";
    }
  });

  // PAUSE event
  widget.bind(SC.Widget.Events.PAUSE, function () {
    console.log("PAUSE event triggered, allowIconChange:", allowIconChange);

    // Chỉ cho phép đổi icon nếu đã sẵn sàng
    if (!allowIconChange) {
      console.log("Ignoring PAUSE event (not allowed to change icon yet)");
      return;
    }

    isPlaying = false;

    if (playIcon && pauseIcon) {
      console.log("Changing to PLAY icon");
      playIcon.style.display = "block";
      pauseIcon.style.display = "none";
    }
  });

  // FINISH event
  widget.bind(SC.Widget.Events.FINISH, function () {
    console.log("FINISH event triggered");
    isPlaying = false;
    hasStartedPlaying = false;

    if (playIcon && pauseIcon) {
      playIcon.style.display = "block";
      pauseIcon.style.display = "none";
    }

    updateWaveformProgress(0);
    widget.seekTo(0);
  });

  // Play progress
  widget.bind(SC.Widget.Events.PLAY_PROGRESS, function (e) {
    if (duration > 0 && isPlaying) {
      var progressPercent = e.relativePosition * 100;
      updateWaveformProgress(progressPercent);
    }
  });

  // Click waveform to seek
  if (canvas) {
    canvas.addEventListener("click", function (e) {
      if (!isReady || duration === 0) return;

      var rect = canvas.getBoundingClientRect();
      var percent = (e.clientX - rect.left) / rect.width;
      widget.seekTo(percent * duration);
      updateWaveformProgress(percent * 100);
    });
  }

  // Error handler
  widget.bind(SC.Widget.Events.ERROR, function (error) {
    console.error("SoundCloud error:", error);
    title.textContent = "Không thể tải bài hát";
    artist.textContent = "Vui lòng thử lại sau";
  });

  // Click outside
  wrapper.addEventListener("click", function (e) {
    if (e.target === wrapper) {
      closePlayer();
    }
  });

  // Keyboard shortcuts
  document.addEventListener("keydown", function (e) {
    if (e.code === "Space" && wrapper.classList.contains("show")) {
      e.preventDefault();
      playPauseBtn.click();
    }
    if (e.code === "Escape" && wrapper.classList.contains("show")) {
      closePlayer();
    }
  });

  // Resize handler
  window.addEventListener("resize", function () {
    if (waveformData) {
      var currentProgress = 0;
      if (isPlaying) {
        widget.getPosition(function (position) {
          if (duration > 0) {
            currentProgress = (position / duration) * 100;
            updateWaveformProgress(currentProgress);
          }
        });
      } else {
        updateWaveformProgress(0);
      }
    }
  });
});