document.addEventListener("DOMContentLoaded", function () {
  var iframe = document.getElementById("sc-player");
  var widget = SC.Widget(iframe);
  var btn = document.getElementById("toggle-sound");
  var icon = document.getElementById("sound-icon");
  var title = document.getElementById("music-title");
  var progress = document.getElementById("progress");
  var progressBar = document.getElementById("progress-bar");
  var wrapper = document.querySelector(".music-wrapper");
  var isPlaying = false;
  var duration = 0;

  // Lấy đường dẫn icon từ data
  var soundOn = btn.dataset.soundOn;
  var soundOff = btn.dataset.soundOff;

  widget.bind(SC.Widget.Events.READY, function () {
    widget.getCurrentSound(function (sound) {
      if (sound) title.textContent = sound.title;
    });
    widget.getDuration(function (d) { duration = d; });
  });

  btn.addEventListener("click", function () {
    if (isPlaying) {
      widget.pause();
      wrapper.classList.remove("show");
    } else {
      widget.play();
      wrapper.classList.add("show");
    }
  });

  widget.bind(SC.Widget.Events.PLAY, function () {
    isPlaying = true;
    icon.src = soundOn;
  });

  widget.bind(SC.Widget.Events.PAUSE, function () {
    isPlaying = false;
    icon.src = soundOff;
  });

  widget.bind(SC.Widget.Events.PLAY_PROGRESS, function (e) {
    if (duration > 0) progress.style.width = (e.relativePosition * 100) + "%";
  });

  progressBar.addEventListener("click", function (e) {
    var rect = this.getBoundingClientRect();
    var percent = (e.clientX - rect.left) / rect.width;
    widget.seekTo(percent * duration);
    progress.style.width = (percent * 100) + "%";
  });
});