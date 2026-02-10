<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="format-detection" content="telephone=no" />
  <title><?php the_title() ?></title>
  <meta name="keywords"
    content="thẻ tình yêu, thẻ cặp đổi, thẻ thông minh tình yêu, thẻ nfc tình yêu" />
  <meta name="description"
    content="thẻ tình yêu, thẻ cặp đổi, thẻ thông minh tình yêu, thẻ nfc tình yêu" />
  <meta http-equiv="Content-Style-Type" content="text/css" />
  <meta http-equiv="Content-Script-Type" content="text/javascript" />
  <!-- <meta name="theme-color" content="#fe4080" /> -->
  <!-- Favicon -->
  <?php
  $site_icon_id = get_option('site_icon');
  if ($site_icon_id) {
    $favicon_url = wp_get_attachment_image_url($site_icon_id, 'full');
    echo '<link rel="icon" href="' . $favicon_url . '" sizes="32x32" />';
  }
  ?>
  <!-- STYLESHEET -->
  <link rel="stylesheet" media="all"
    href="<?php echo get_theme_file_uri() ?>/card-cp/css/styles.css" />
  <!-- Google Analytics start -->
  <!-- Google Analytics end -->

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
    rel="stylesheet">
  <!-- Album -->
  <link href="https://fonts.googleapis.com/css2?family=Luxurious+Script&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">

  <!-- <link rel="stylesheet" href="<?php echo get_theme_file_uri() ?>/card-cpcss/aos.css"> -->
</head>


<body id="index">
  <div id="wrapper">
    <header id="header">
      <div class="container">
        <h1><?php the_title() ?></h1>
        <?php
        $record_link = get_field('id_record');
        $music_link = get_field('id_music');

        $wrapper_class = '';

        if ($record_link && $music_link) {
          $wrapper_class = 'col4';
        } elseif ($record_link || $music_link) {
          $wrapper_class = 'col3';
        }
        ?>

        <div class="hd-wrapper <?php echo $wrapper_class; ?>">
          <button class="hicon hd-toggle" id="toggleBtn">
            <img
              src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23000' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cline x1='12' y1='5' x2='12' y2='19'%3E%3C/line%3E%3Cline x1='5' y1='12' x2='19' y2='12'%3E%3C/line%3E%3C/svg%3E"
              alt="menu">
          </button>
          <div class="hicon hd-album">
            <img src="<?php echo get_theme_file_uri() ?>/card-cp/images/ic-album.svg" alt="album">
          </div>

          <div class="hicon hd-mail">
            <img src="<?php echo get_theme_file_uri() ?>/card-cp/images/ic-mail.svg" alt="mail">
          </div>
          <?php
          if ($music_link): ?>
            <button id="toggle-sound" class="hicon hd-sound">
              <img id="sound-icon"
                src="<?php echo get_theme_file_uri(); ?>/card-cp/images/ic-volume.svg" alt="volume">
            </button>
          <?php endif; ?>
          <?php
          if ($record_link): ?>
            <div class="hicon hd-record" id="toggle-record">
              <img
                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23000' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z'%3E%3C/path%3E%3Cpath d='M19 10v2a7 7 0 0 1-14 0v-2'%3E%3C/path%3E%3Cline x1='12' y1='19' x2='12' y2='23'%3E%3C/line%3E%3Cline x1='8' y1='23' x2='16' y2='23'%3E%3C/line%3E%3C/svg%3E"
                alt="record">
            </div>
          <?php endif; ?>
        </div>
      </div>

      <?php
      $record_link = get_field('id_record');
      $group_audio1 = get_field('group_audio1');
      $group_audio2 = get_field('group_audio2');

      $audio1 = $group_audio1['audio_upload_1'] ?? null;
      $titaudio1 = $group_audio1['title_audio1'] ?? '';
      $subaudio1 = $group_audio1['sub_audio1'] ?? '';

      $audio2 = $group_audio2['audio_upload_2'] ?? null;
      $titaudio2 = $group_audio2['title_audio2'] ?? '';
      $subaudio2 = $group_audio2['sub_audio2'] ?? '';

      if ($record_link): ?>
        <div id="record-wrapper" class="record-wrapper">
          <div class="record-scroll">
            <p class="btn-back" id="btn-back2">quay lại</p>

            <div class="popup-record">
              <div class="decorative-hearts">
                <svg class="heart-deco heart-1" viewBox="0 0 24 24" fill="currentColor">
                  <path
                    d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                </svg>
                <svg class="heart-deco heart-2" viewBox="0 0 24 24" fill="currentColor">
                  <path
                    d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                </svg>
                <svg class="heart-deco heart-3" viewBox="0 0 24 24" fill="currentColor">
                  <path
                    d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                </svg>
                <svg class="heart-deco heart-4" viewBox="0 0 24 24" fill="currentColor">
                  <path
                    d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                </svg>
              </div>
              <?php if ($audio1): ?>
                <div class="record-card">
                  <div class="record-header">
                    <div class="record-avatar">
                      <img src="<?php echo get_field("male")['avatar']['url'] ?>" alt="avatar">
                    </div>
                    <div class="record-title"><?php echo $titaudio1; ?></div>
                    <div class="record-subtitle"><?php echo $subaudio1; ?></div>
                  </div>
                  <div class="custom-audio-player">
                    <audio id="audio1" src="<?php echo $audio1; ?>"></audio>
                    <div class="audio-controls">
                      <button class="play-pause-btn" onclick="togglePlay('audio1', this)">
                        <svg class="play-icon" viewBox="0 0 24 24">
                          <path d="M8 5v14l11-7z" />
                        </svg>
                        <svg class="pause-icon" style="display: none;" viewBox="0 0 24 24">
                          <path d="M6 4h4v16H6V4zm8 0h4v16h-4V4z" />
                        </svg>
                      </button>
                      <div class="audio-progress-container">
                        <div class="progress-bar" onclick="seekAudio(event, 'audio1')">
                          <div class="progress-fill" id="progress1"></div>
                        </div>
                        <div class="audio-times">
                          <span id="current-time1">0:00</span>
                          <span id="duration1">0:00</span>
                        </div>
                      </div>
                      <div class="volume-control">
                        <button class="volume-btn" onclick="toggleMute('audio1')">
                          <svg class="volume-icon" viewBox="0 0 24 24">
                            <path
                              d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02z" />
                          </svg>
                          <svg class="mute-icon" style="display: none;" viewBox="0 0 24 24">
                            <path
                              d="M16.5 12c0-1.77-1.02-3.29-2.5-4.03v2.21l2.45 2.45c.03-.2.05-.41.05-.63zm2.5 0c0 .94-.2 1.82-.54 2.64l1.51 1.51C20.63 14.91 21 13.5 21 12c0-4.28-2.99-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71zM4.27 3L3 4.27 7.73 9H3v6h4l5 5v-6.73l4.25 4.25c-.67.52-1.42.93-2.25 1.18v2.06c1.38-.31 2.63-.95 3.69-1.81L19.73 21 21 19.73l-9-9L4.27 3zM12 4L9.91 6.09 12 8.18V4z" />
                          </svg>
                        </button>
                        <div class="volume-slider" onclick="changeVolume(event, 'audio1')">
                          <div class="volume-fill" id="volume1"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
              <!-- Love Transfer Divider -->
              <div class="love-transfer">
                <div class="face face-left">
                  <div class="smile"></div>
                </div>
                <div class="transfer-line">
                  <div class="flying-heart"></div>
                  <div class="sparkle sparkle-1"></div>
                  <div class="sparkle sparkle-2"></div>
                  <div class="sparkle sparkle-3"></div>
                </div>
                <div class="face face-right">
                  <div class="smile"></div>
                </div>
              </div>
              <?php if ($audio2): ?>
                <div class="record-card">
                  <div class="record-header">
                    <div class="record-avatar">
                      <img src="<?php echo get_field("female")['avatar']['url'] ?>" alt="avatar">
                    </div>
                    <div class="record-title"><?php echo $titaudio2; ?></div>
                    <div class="record-subtitle"><?php echo $subaudio2; ?></div>
                  </div>
                  <div class="custom-audio-player">
                    <audio id="audio2" src="<?php echo $audio2; ?>"></audio>
                    <div class="audio-controls">
                      <button class="play-pause-btn" onclick="togglePlay('audio2', this)">
                        <svg class="play-icon" viewBox="0 0 24 24">
                          <path d="M8 5v14l11-7z" />
                        </svg>
                        <svg class="pause-icon" style="display: none;" viewBox="0 0 24 24">
                          <path d="M6 4h4v16H6V4zm8 0h4v16h-4V4z" />
                        </svg>
                      </button>
                      <div class="audio-progress-container">
                        <div class="progress-bar" onclick="seekAudio(event, 'audio2')">
                          <div class="progress-fill" id="progress2"></div>
                        </div>
                        <div class="audio-times">
                          <span id="current-time2">0:00</span>
                          <span id="duration2">0:00</span>
                        </div>
                      </div>
                      <div class="volume-control">
                        <button class="volume-btn" onclick="toggleMute('audio2')">
                          <svg class="volume-icon" viewBox="0 0 24 24">
                            <path
                              d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02z" />
                          </svg>
                          <svg class="mute-icon" style="display: none;" viewBox="0 0 24 24">
                            <path
                              d="M16.5 12c0-1.77-1.02-3.29-2.5-4.03v2.21l2.45 2.45c.03-.2.05-.41.05-.63zm2.5 0c0 .94-.2 1.82-.54 2.64l1.51 1.51C20.63 14.91 21 13.5 21 12c0-4.28-2.99-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71zM4.27 3L3 4.27 7.73 9H3v6h4l5 5v-6.73l4.25 4.25c-.67.52-1.42.93-2.25 1.18v2.06c1.38-.31 2.63-.95 3.69-1.81L19.73 21 21 19.73l-9-9L4.27 3zM12 4L9.91 6.09 12 8.18V4z" />
                          </svg>
                        </button>
                        <div class="volume-slider" onclick="changeVolume(event, 'audio2')">
                          <div class="volume-fill" id="volume2"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <?php
      $music_link = get_field('id_music');
      if ($music_link):
        $embed_url = 'https://w.soundcloud.com/player/?url=' . urlencode($music_link) . '&auto_play=false';
        ?>
        <div class="music-wrapper">
          <iframe id="sc-player" width="100%" height="166" scrolling="no" frameborder="no"
            allow="autoplay" style="display:none" src="<?php echo $embed_url; ?>">
          </iframe>

          <p class="btn-back" id="btn-back">quay lại</p>

          <?php $imagesAlb2 = get_field('gallery_images'); ?>
          <div class="box-music">
            <div class="decorative-hearts">
              <svg class="heart-deco heart-1" viewBox="0 0 24 24" fill="currentColor">
                <path
                  d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
              </svg>
              <svg class="heart-deco heart-2" viewBox="0 0 24 24" fill="currentColor">
                <path
                  d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
              </svg>
              <svg class="heart-deco heart-3" viewBox="0 0 24 24" fill="currentColor">
                <path
                  d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
              </svg>
              <svg class="heart-deco heart-4" viewBox="0 0 24 24" fill="currentColor">
                <path
                  d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
              </svg>
            </div>
            <div class="custom-player">
              <div class="music-avatar">
                <img id="music-artwork" src="<?php echo esc_url($imagesAlb2[0]['url']); ?>"
                  alt="thumb">
              </div>
              <div class="music-info">
                <p id="music-title" class="music-title">Đang tải, đợi tí nhé...</p>
                <p id="music-artist" class="music-artist">...</p>
                <div class="music-controls">
                  <div class="progress-bar-wrapper">
                    <canvas id="waveform-canvas"></canvas>
                    <div id="progress" class="progress"></div>
                  </div>
                  <div class="controls-row">
                    <div class="music-note">
                      <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                        <path
                          d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z" />
                      </svg>
                    </div>
                    <button class="play-pause-btn" id="play-pause-btn">
                      <svg id="playIcon" width="24" height="24" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path d="M8 5v14l11-7z" />
                      </svg>
                      <svg id="pauseIcon" width="24" height="24" viewBox="0 0 24 24"
                        fill="currentColor" style="display: none">
                        <path d="M6 4h4v16H6V4zm8 0h4v16h-4V4z" />
                      </svg>
                    </button>
                    <div class="music-note">
                      <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                        <path
                          d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z" />
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </header>