<div class="imessage efftype1">
    <div class="imess-wrap efftype1-wrap">
        <div class="imess-close">quay lại</div>
        <div class="imess-fimg">
            <img src="<?php echo get_field('mess_thumb')['url'] ?>" alt="album">
        </div>
        <div class="imess-slider">
            <p class="imess-ftxt">Những khoảnh khắc</p>
            <div class="imess-slider-loop">
                <?php
                $images = get_field('mess_loop');
                $sizes = 'full';
                if ($images): ?>
                    <?php foreach ($images as $image): ?>
                        <div class="imess-slr-img">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="imess-box">
            <div class="imess-bx1 clearfix">
                <div class="imess-img">
                    <img src="<?php echo get_field('mess_img1')['url'] ?>" alt="album">
                    <span><?php echo get_field('mess_date1') ?></span>
                </div>
                <div class="imess-desc">
                    <p class="tt"><?php echo get_field('mess_ttl1') ?></p>
                    <div class="dsc">
                        <?php echo get_field('mess_desc1') ?>
                    </div>
                </div>
            </div>
            <div class="imess-bx2 clearfix">
                <div class="imess-ig">
                    <div class="imess-img1">
                        <img src="<?php echo get_field('mess_img2')['url'] ?>" alt="album">
                        <span><?php echo get_field('mess_date2') ?></span>
                    </div>
                    <div class="imess-img2">
                        <img src="<?php echo get_field('mess_img3')['url'] ?>" alt="album">
                    </div>
                </div>
                <div class="imess-desc">
                    <?php echo get_field('mess_desc2') ?>
                </div>
            </div>
        </div>
        <div class="imess-end">
            <div class="imess-parallax">
                <div class="imess-plx">
                    <img src="<?php echo get_field('mess_img_end')['url'] ?>" alt="album">
                </div>
            </div>
            <p class="imess-end-tt">
                Kỷ niệm
            </p>
            <div class="imess-info">
                <p class="imess-name"><?php echo get_field("male")['name'] ?></p>
                <div class="imess-heart">
                    <img src="<?php echo get_theme_file_uri() ?>/card-cp/images/line-heart-rate.gif" alt="album">
                </div>
                <p class="imess-name"><?php echo get_field("female")['name'] ?></p>
                <p class="imess-date"><?php echo get_field('date-love') ?></p>
            </div>
        </div>
    </div>
</div>