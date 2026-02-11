(() => {
    var btnRecord = document.getElementById("toggle-record");
    var wrapRecord = document.getElementById("record-wrapper");
    var btnBack2 = document.getElementById("btn-back2");

    if (!btnRecord || !wrapRecord) return;

    /* =========================
       Popup open / close
    ========================= */
    btnRecord.addEventListener("click", function () {
        wrapRecord.classList.toggle("show");
    });

    if (btnBack2) {
        btnBack2.addEventListener("click", function () {
            wrapRecord.classList.remove("show");
        });
    }

    /* =========================
       Export global functions
       (KHÔNG còn changeVolume)
    ========================= */
    window.togglePlay = togglePlay;
    window.seekAudio = seekAudio;
    window.toggleMute = toggleMute;

    /* =========================
       Audio Functions
    ========================= */

    function togglePlay(audioId, btn) {
        const audio = document.getElementById(audioId);
        if (!audio) return;

        const playIcon = btn.querySelector('.play-icon');
        const pauseIcon = btn.querySelector('.pause-icon');

        if (audio.paused) {
            audio.play();
            playIcon.style.display = 'none';
            pauseIcon.style.display = 'block';
        } else {
            audio.pause();
            playIcon.style.display = 'block';
            pauseIcon.style.display = 'none';
        }
    }

    function formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${mins}:${secs < 10 ? '0' : ''}${secs}`;
    }

    function seekAudio(event, audioId) {
        const audio = document.getElementById(audioId);
        if (!audio || !audio.duration) return;

        const progressBar = event.currentTarget;
        const clickX = event.offsetX;
        const width = progressBar.offsetWidth;

        audio.currentTime = (clickX / width) * audio.duration;
    }

    function toggleMute(audioId) {
        const audio = document.getElementById(audioId);
        if (!audio) return;

        const volumeBtn = event.currentTarget;
        const volumeIcon = volumeBtn.querySelector('.volume-icon');
        const muteIcon = volumeBtn.querySelector('.mute-icon');

        audio.muted = !audio.muted;

        volumeIcon.style.display = audio.muted ? 'none' : 'block';
        muteIcon.style.display = audio.muted ? 'block' : 'none';
    }

    /* =========================
       Init players
    ========================= */

    ['audio1', 'audio2'].forEach(audioId => {
        const audio = document.getElementById(audioId);
        if (!audio) return;

        const num = audioId.slice(-1);

        const progressFill = document.getElementById('progress' + num);
        const currentTimeEl = document.getElementById('current-time' + num);
        const durationEl = document.getElementById('duration' + num);

        // update progress
        audio.addEventListener('timeupdate', function () {
            if (!audio.duration) return;

            const progress = (audio.currentTime / audio.duration) * 100;
            if (progressFill) progressFill.style.width = progress + '%';
            if (currentTimeEl) currentTimeEl.textContent = formatTime(audio.currentTime);
        });

        // set duration
        audio.addEventListener('loadedmetadata', function () {
            if (durationEl) durationEl.textContent = formatTime(audio.duration);
        });

        // reset when ended
        audio.addEventListener('ended', function () {
            const btn = document.querySelector(`[onclick*="${audioId}"]`);
            if (!btn) return;

            btn.querySelector('.play-icon').style.display = 'block';
            btn.querySelector('.pause-icon').style.display = 'none';

            if (progressFill) progressFill.style.width = '0%';
            audio.currentTime = 0;
        });
    });

})();
