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
  <link rel="stylesheet" media="all"
    href="<?php echo get_theme_file_uri() ?>/card-cp/css/responsive.css" />
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

  <!-- Album -->
  <link href="https://fonts.googleapis.com/css2?family=Luxurious+Script&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap"
    rel="stylesheet">

  <!-- <link rel="stylesheet" href="<?php echo get_theme_file_uri() ?>/card-cpcss/aos.css"> -->
</head>


<body id="index">
  <div id="wrapper">
    <header id="header">
      <div class="container">
        <h1><?php the_title() ?></h1>
        <?php
        $record_link = get_field('id_record');

        if (!$record_link) {
          $wrapper_class .= 'col3';
        }
        ?>

        <div class="hd-wrapper <?php echo $wrapper_class; ?>">
          <button class="hicon hd-toggle" id="toggleBtn">
            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23000' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cline x1='12' y1='5' x2='12' y2='19'%3E%3C/line%3E%3Cline x1='5' y1='12' x2='19' y2='12'%3E%3C/line%3E%3C/svg%3E"
              alt="menu">
          </button>
          <div class="hicon hd-album">
            <img src="<?php echo get_theme_file_uri() ?>/card-cp/images/ic-album.svg"
              alt="album">
          </div>
          <?php
          $terms_message = wp_get_post_terms($post->ID, 'couple_message', '');
          if (!empty($terms_message) && !is_wp_error($terms_message)): ?>
            <div class="hicon hd-mail">
              <img src="<?php echo get_theme_file_uri() ?>/card-cp/images/ic-mail.svg"
                alt="mail">
            </div>
          <?php endif; ?>
          <?php
          $music_link = get_field('id_music');
          if ($music_link): ?>
            <button id="toggle-sound" class="hicon hd-sound">
              <img id="sound-icon"
                src="<?php echo get_theme_file_uri(); ?>/card-cp/images/ic-volume.svg"
                alt="volume">
            </button>
          <?php endif; ?>
          <?php
          $record_link = get_field('id_record');
          if ($record_link): ?>
            <div class="hicon hd-record" id="toggle-record">
              <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23000' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z'%3E%3C/path%3E%3Cpath d='M19 10v2a7 7 0 0 1-14 0v-2'%3E%3C/path%3E%3Cline x1='12' y1='19' x2='12' y2='23'%3E%3C/line%3E%3Cline x1='8' y1='23' x2='16' y2='23'%3E%3C/line%3E%3C/svg%3E"
                alt="record">
            </div>
          <?php endif; ?>
        </div>
      </div>

      <?php
      $record_link = get_field('id_record');
      $audio1 = get_field('audio_upload_1');
      $audio2 = get_field('audio_upload_2');
      if ($record_link): ?>
        <div id="record-wrapper" class="record-wrapper">
          <div class="popup-record">

            <?php if ($audio1): ?>
              <audio controls src="<?php echo $audio1; ?>"></audio>
            <?php endif; ?>

            <?php if ($audio2): ?>
              <audio controls src="<?php echo $audio2; ?>"></audio>
            <?php endif; ?>

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

          <button class="btn-back" id="btn-back">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
              <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z" />
            </svg>
          </button>

          <?php $imagesAlb2 = get_field('gallery_images'); ?>
          <div class="box-music">
            <div class="custom-player">
              <div class="music-avatar">
                <img id="music-artwork"
                  src="<?php echo esc_url($imagesAlb2[0]['url']); ?>" alt="thumb">
              </div>
              <div class="music-info">
                <p id="music-title" class="music-title">Đang tải, đợi tí nhé...</p>
                <p id="music-artist" class="music-artist">...</p>
                <div class="music-controls">
                  <button class="play-pause-btn" id="play-pause-btn"
                    style="display:none;">
                    <svg id="playIcon" width="24" height="24" viewBox="0 0 24 24"
                      fill="currentColor">
                      <path d="M8 5v14l11-7z" />
                    </svg>
                    <svg id="pauseIcon" width="24" height="24" viewBox="0 0 24 24"
                      fill="currentColor" style="display:none;">
                      <path d="M6 4h4v16H6V4zm8 0h4v16h-4V4z" />
                    </svg>
                  </button>
                  <div class="progress-bar-wrapper">
                    <canvas id="waveform-canvas"></canvas>
                    <div id="progress" class="progress"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </header>