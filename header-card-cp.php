<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <title><?php the_title() ?></title>
    <meta name="keywords" content="thẻ tình yêu, thẻ cặp đổi, thẻ thông minh tình yêu, thẻ nfc tình yêu" />
    <meta name="description" content="thẻ tình yêu, thẻ cặp đổi, thẻ thông minh tình yêu, thẻ nfc tình yêu" />
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
    <link rel="stylesheet" media="all" href="<?php echo get_theme_file_uri()?>/card-cp/css/styles.css" />
    <link rel="stylesheet" media="all" href="<?php echo get_theme_file_uri()?>/card-cp/css/responsive.css" />
    <!-- Google Analytics start -->
    <!-- Google Analytics end -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">

    <!-- Album -->
    <link href="https://fonts.googleapis.com/css2?family=Luxurious+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">

    <!-- <link rel="stylesheet" href="<?php echo get_theme_file_uri()?>/card-cpcss/aos.css"> -->
</head>


<body id="index">
    <div id="wrapper">
        <header id="header">
            <div class="container">
                <h1><?php the_title() ?></h1>
                <div class="hd-wrapper">
                    <div class="hicon hd-ablum">
                        <img src="<?php echo get_theme_file_uri()?>/card-cp/images/ic-album.svg" alt="album">
                    </div>
                    <?php
                     $terms_message = wp_get_post_terms($post->ID, 'couple_message', '');
                    if (!empty($terms_message) && !is_wp_error($terms_message)) : ?>
                    <div class="hicon hd-mail">
                        <img src="<?php echo get_theme_file_uri()?>/card-cp/images/ic-mail.svg" alt="mail">
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php
        $music_link = get_field('id_music');
        if ($music_link) :
            $embed_url = 'https://w.soundcloud.com/player/?url=' . urlencode($music_link);
        ?>
            <?php
            $music_link = get_field('id_music');
            if ($music_link):
                $embed_url = 'https://w.soundcloud.com/player/?url=' . urlencode($music_link);
            ?>
                <div class="music-wrapper">
                    <!-- Ẩn player thật -->
                    <iframe
                        id="sc-player"
                        width="100%"
                        height="166"
                        scrolling="no"
                        frameborder="no"
                        allow="autoplay"
                        style="display:none"
                        src="<?php echo $embed_url; ?>">
                    </iframe>

                    <?php
                    $imagesAlb2 = get_field('gallery_images');
                    ?>
                    <!-- Player tùy chỉnh -->
                    <div class="custom-player">
                        <div class="music-avatar">
                            <img id="music-artwork" src="<?php echo esc_url($imagesAlb2[0]['url']); ?>" alt="thumb">
                        </div>
                        <div class="music-info">
                            <p id="music-title" class="music-title">Đang tải, đợi tí nhé...</p>
                            <div class="music-controls">
                                <div class="progress-bar" id="progress-bar">
                                    <div id="progress" class="progress"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button
                    id="toggle-sound"
                    class="btn-sound"
                    data-sound-on="<?php echo get_theme_file_uri(); ?>/card-cp/images/ic-volume.svg"
                    data-sound-off="<?php echo get_theme_file_uri(); ?>/card-cp/images/ic-volume-mute.svg">
                    <img id="sound-icon" src="<?php echo get_theme_file_uri(); ?>/card-cp/images/ic-volume-mute.svg" alt="volume">
                </button>
            <?php endif; ?>
        <?php endif; ?>
        </header>
              
        