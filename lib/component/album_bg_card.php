<?php
$taxonomy_slug_bg_album = '';
$terms_album = wp_get_post_terms($post->ID, 'couple_background_album', '');
if (!empty($terms_album) && !is_wp_error($terms_album)) {
    $taxonomy_slug_bg_album = $terms_album[0]->slug;
}

?>
<?php if ($taxonomy_slug_bg_album): ?>
    <?php
    $imagesAlb = get_field('alb_bg_loop');
    ?>
    <div class="album-bg efftype1">
        <?php if ($taxonomy_slug_bg_album === "bg_alb1"): ?>
            <div class="alb efftype1-wrap alb1">
                <p class="alb1-tt">Kỉ niệm</p>
                <p class="alb1-img">
                    <img src="<?php echo esc_url($imagesAlb[0]['url']); ?>" class="alb1-ig" alt="Kỉ niệm">
                </p>
                <p class="alb1-year"><?php echo get_field('alb_bg_year') ?></p>
            </div>
        <?php endif ?>

        <?php if ($taxonomy_slug_bg_album === "bg_alb2"): ?>
            <div class="alb efftype1-wrap alb2">
                <div class="alb2-text">
                    <p class="alb2-tt">Kỉ niệm</p>
                    <p class="alb2-year">
                        <?php
                        $year = get_field('alb_bg_year');
                        echo substr($year, 0, 2) . '<br>' . substr($year, 2);
                        ?>
                    </p>
                    <div class="alb2-eff">
                        <span class="alb2-eff-img1">
                            <img src="<?php echo esc_url($imagesAlb[6]['url']); ?>" alt="Kỉ niệm">
                        </span>
                        <span class="alb2-eff-img2">
                            <img src="<?php echo esc_url($imagesAlb[7]['url']); ?>" alt="Kỉ niệm">
                        </span>
                    </div>
                </div>
                <div class="alb2-img">
                    <img src="<?php echo esc_url($imagesAlb[0]['url']); ?>" alt="Kỉ niệm">
                    <img src="<?php echo esc_url($imagesAlb[1]['url']); ?>" alt="Kỉ niệm">
                    <img src="<?php echo esc_url($imagesAlb[2]['url']); ?>" alt="Kỉ niệm">
                    <img src="<?php echo esc_url($imagesAlb[3]['url']); ?>" alt="Kỉ niệm">
                    <img src="<?php echo esc_url($imagesAlb[4]['url']); ?>" alt="Kỉ niệm">
                    <img src="<?php echo esc_url($imagesAlb[5]['url']); ?>" alt="Kỉ niệm">
                </div>
            </div>
        <?php endif ?>

        <?php if ($taxonomy_slug_bg_album === "bg_alb3"): ?>
            <div class="alb efftype1-wrap alb3">
                <p class="alb3-tt">Kỉ niệm</p>
                <p class="alb3-year"><?php echo substr(get_field('date-love'), -4); ?></p>
                <div class="alb3-bg">
                    <img src="<?php echo esc_url($imagesAlb[0]['url']); ?>" alt="Kỉ niệm">
                </div>
                <div class="alb3-img">
                    <img src="<?php echo esc_url($imagesAlb[1]['url']); ?>" alt="Kỉ niệm">
                    <img src="<?php echo esc_url($imagesAlb[2]['url']); ?>" alt="Kỉ niệm">
                    <img src="<?php echo esc_url($imagesAlb[3]['url']); ?>" alt="Kỉ niệm">
                </div>
            </div>
        <?php endif ?>
        <div class="album-bg-ctn"><span>Kéo để tiếp tục</span></div>
    </div>
<?php endif ?>