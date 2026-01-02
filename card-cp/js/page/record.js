var btnRecord = document.getElementById("toggle-record");
var wrapRecord = document.getElementById("record-wrapper");
var btnBack2 = document.getElementById("btn-back2");

btnRecord.addEventListener("click", function () {
    wrapRecord.classList.toggle("show");
});

// Back button
btnBack2.addEventListener("click", function () {
    wrapRecord.classList.remove("show");
});


// Custom Audio Player Functions
function togglePlay(audioId, btn) {
    const audio = document.getElementById(audioId);
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
    const progressBar = event.currentTarget;
    const clickX = event.offsetX;
    const width = progressBar.offsetWidth;
    const duration = audio.duration;

    audio.currentTime = (clickX / width) * duration;
}

function changeVolume(event, audioId) {
    const audio = document.getElementById(audioId);
    const volumeSlider = event.currentTarget;
    const clickX = event.offsetX;
    const width = volumeSlider.offsetWidth;

    audio.volume = clickX / width;
    updateVolumeDisplay(audioId);
}

function toggleMute(audioId) {
    const audio = document.getElementById(audioId);
    const volumeBtn = event.currentTarget;
    const volumeIcon = volumeBtn.querySelector('.volume-icon');
    const muteIcon = volumeBtn.querySelector('.mute-icon');

    audio.muted = !audio.muted;

    if (audio.muted) {
        volumeIcon.style.display = 'none';
        muteIcon.style.display = 'block';
    } else {
        volumeIcon.style.display = 'block';
        muteIcon.style.display = 'none';
    }

    updateVolumeDisplay(audioId);
}

function updateVolumeDisplay(audioId) {
    const audio = document.getElementById(audioId);
    const volumeFill = document.getElementById('volume' + audioId.slice(-1));
    const volume = audio.muted ? 0 : audio.volume;
    volumeFill.style.width = (volume * 100) + '%';
}

// Initialize audio players
['audio1', 'audio2'].forEach(audioId => {
    const audio = document.getElementById(audioId);
    const num = audioId.slice(-1);
    const progressFill = document.getElementById('progress' + num);
    const currentTimeEl = document.getElementById('current-time' + num);
    const durationEl = document.getElementById('duration' + num);

    // Update progress and time
    audio.addEventListener('timeupdate', function () {
        const progress = (audio.currentTime / audio.duration) * 100;
        progressFill.style.width = progress + '%';
        currentTimeEl.textContent = formatTime(audio.currentTime);
    });

    // Set duration when loaded
    audio.addEventListener('loadedmetadata', function () {
        durationEl.textContent = formatTime(audio.duration);
    });

    // Reset when ended
    audio.addEventListener('ended', function () {
        const btn = document.querySelector(`[onclick*="${audioId}"]`);
        btn.querySelector('.play-icon').style.display = 'block';
        btn.querySelector('.pause-icon').style.display = 'none';
        progressFill.style.width = '0%';
        audio.currentTime = 0;
    });

    // Initialize volume display
    updateVolumeDisplay(audioId);
});