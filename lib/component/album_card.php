<?php

// $taxonomy_slug_album = '';
// $terms_album = wp_get_post_terms($post->ID, 'couple_albums', '');
// if (!empty($terms_album) && !is_wp_error($terms_album)) {
//     $taxonomy_slug_album = $terms_album[0]->slug;
// }

$taxonomy_slug_album_theme1 = '';
$terms_album_theme1 = wp_get_post_terms($post->ID, 'couple_albums_theme1', '');
if (!empty($terms_album_theme1) && !is_wp_error($terms_album_theme1)) {
    $taxonomy_slug_album_theme1 = $terms_album_theme1[0]->slug;
}

$taxonomy_slug_album_theme2 = '';
$terms_album_theme2 = wp_get_post_terms($post->ID, 'couple_albums_theme2', '');
if (!empty($terms_album_theme2) && !is_wp_error($terms_album_theme2)) {
    $taxonomy_slug_album_theme2 = $terms_album_theme2[0]->slug;
}

$colorsvg = "#fea7af";

if ($taxonomy_slug_album_theme1 === "album3") {
    $colorsvg = "#eee";
}
if ($taxonomy_slug_album_theme2 === "album4") {
    $colorsvg = "#fff";
}


$svg = '<div class="svg-container">
              <svg id="trackSVG" width="326" height="2985" viewBox="0 0 326 2985" fill="none" preserveAspectRatio="xMidYMin meet">
                <path id="progressPath" stroke="' . $colorsvg . '" stroke-width="2" class="progress" d="M102.987 0.429438C102.987 0.429438 277.433 103.351 315.987 214.929C386.59 419.267 11.8486 459.752 9.48657 675.929C7.13381 891.257 365.797 936.301 303.487 1142.43C269.374 1255.28 225.486 1379.43 104.487 1369.43C43.7415 1364.41 5.35494 1283.47 34.4866 1229.93C52.9863 1195.93 100.486 1134.93 185.486 1197.93C191.412 1202.32 230.32 1240.76 254.986 1282.43C273.289 1313.35 253.195 1396.38 247.987 1431.93C229.159 1560.44 49.8416 1557.96 34.4866 1686.93C15.1827 1849.06 242.38 1864.54 283.987 2022.43C346.92 2261.25 82.4863 2858.93 72.4866 2618.43C70.9399 2581.23 -6.31505 2616.94 0.986576 2580.43C10.4866 2532.93 126.038 2505.67 168.487 2526.43C209.796 2546.63 222.303 2576.87 241.987 2618.43C313.977 2770.43 14.9866 2984.43 14.9866 2984.43" />
              </svg>
            </div>';
?>

<?php if ($taxonomy_slug_album_theme1 === "album1"): ?>
    <?php
    $imagesAlb1 = get_field('alb1_loop');
    ?>
    <div class="album album1">
        <div class="abm-wrap">
            <?php echo $svg ?>
            <div class="abm-close">quay lại</div>
            <div class="abm-wimg">
                <?php if ($imagesAlb1[0] || $imagesAlb1[1] || $imagesAlb1[2] || $imagesAlb1[3]): ?>
                    <div class="abm-box1">
                        <?php if ($imagesAlb1[0]): ?>
                            <div class="abm-img abm1" data-aos="fade-up">
                                <div class="abm1-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb1[0]['url']); ?>" alt="ablum"></div>
                                <div class="abm1-eff2"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb1[1]): ?>
                            <div class="abm-img abm2" data-aos="fade-up">
                                <div class="abm2-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb1[1]['url']); ?>" alt="ablum"></div>
                                <div class="abm2-eff2"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb1[2]): ?>
                            <div class="abm-img abm3" data-aos="fade-up">
                                <div class="abm3-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb1[2]['url']); ?>" alt="ablum"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb1[3]): ?>
                            <div class="abm-img abm4" data-aos="fade-up">
                                <div class="abm4-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb1[3]['url']); ?>" alt="ablum"></div>
                                <div class="abm4-eff2"></div>
                            </div>
                        <?php endif ?>
                    </div>
                <?php endif ?>
                <?php if ($imagesAlb1[4] || $imagesAlb1[5] || $imagesAlb1[6] || $imagesAlb1[7]): ?>
                    <div class="abm-box2">
                        <?php if ($imagesAlb1[4]): ?>
                            <div class="abm-img abm5" data-aos="fade-up-left">
                                <div class="abm5-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb1[4]['url']); ?>" alt="ablum"></div>
                                <div class="abm5-eff2"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb1[5]): ?>
                            <div class="abm-img abm6" data-aos="fade-up-right">
                                <div class="abm6-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb1[5]['url']); ?>" alt="ablum"></div>
                                <div class="abm6-eff2"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb1[6]): ?>
                            <div class="abm-img abm7" data-aos="fade-up-left">
                                <div class="abm7-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb1[6]['url']); ?>" alt="ablum"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb1[7]): ?>
                            <div class="abm-img abm8" data-aos="fade-up-right">
                                <div class="abm8-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb1[7]['url']); ?>" alt="ablum"></div>
                            </div>
                        <?php endif ?>
                    </div>
                <?php endif ?>
                <?php if ($imagesAlb1[8] || $imagesAlb1[9] || $imagesAlb1[10] || $imagesAlb1[11] || $imagesAlb1[12] || $imagesAlb1[13] || $imagesAlb1[14] || $imagesAlb1[15]): ?>
                    <div class="abm-box3">
                        <?php if ($imagesAlb1[8]): ?>
                            <div class="abm-img abm9" data-aos="fade-up-right">
                                <div class="abm9-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb1[8]['url']); ?>" alt="ablum"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb1[9]): ?>
                            <div class="abm-img abm10" data-aos="fade-up-left">
                                <div class="abm10-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb1[9]['url']); ?>" alt="ablum"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb1[10]): ?>
                            <div class="abm-img abm11" data-aos="fade-up-right">
                                <div class="abm11-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb1[10]['url']); ?>" alt="ablum"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb1[11]): ?>
                            <div class="abm-img abm12" data-aos="fade-up-left">
                                <div class="abm12-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb1[11]['url']); ?>" alt="ablum"></div>
                                <div class="abm12-eff2"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb1[12]): ?>
                            <div class="abm-img abm13" data-aos="fade-up">
                                <div class="abm13-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb1[12]['url']); ?>" alt="ablum"></div>
                                <div class="abm13-eff2"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb1[13]): ?>
                            <div class="abm-img abm14" data-aos="fade-up">
                                <div class="abm14-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb1[13]['url']); ?>" alt="ablum"></div>
                                <div class="abm14-eff2"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb1[14]): ?>
                            <div class="abm-img abm15" data-aos="fade-right">
                                <div class="abm15-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb1[14]['url']); ?>" alt="ablum"></div>
                                <div class="abm15-eff2"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb1[15]): ?>
                            <div class="abm-img abm16" data-aos="fade-left">
                                <div class="abm16-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb1[15]['url']); ?>" alt="ablum"></div>
                                <div class="abm16-eff2"></div>
                            </div>
                        <?php endif ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
<?php endif ?>

<?php if ($taxonomy_slug_album_theme1 === "album2"): ?>
    <?php
    $imagesAlb2 = get_field('alb2_loop');
    ?>
    <div class="album album2">
        <div class="abm-wrap">
            <?php echo $svg ?>
            <div class="abm-close">quay lại</div>
            <div class="abm-wimg">
                <?php if ($imagesAlb2[0] || $imagesAlb2[1] || $imagesAlb2[2] || $imagesAlb2[3]): ?>
                    <div class="abm-box1">
                        <?php if ($imagesAlb2[0]): ?>
                            <div class="abm-img abm1" data-aos="fade-up">
                                <div class="abm1-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb2[0]['url']); ?>" alt="ablum"></div>
                                <div class="abm1-eff2"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb2[1]): ?>
                            <div class="abm-img abm2" data-aos="fade-up" data-aos-delay="500">
                                <div class="abm2-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb2[1]['url']); ?>" alt="ablum"></div>
                                <div class="abm2-eff2"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb2[2]): ?>
                            <div class="abm-img abm3" data-aos="fade-up" data-aos-delay="800">
                                <div class="abm3-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb2[2]['url']); ?>" alt="ablum"></div>
                                <div class="abm3-eff2"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb2[3]): ?>
                            <div class="abm-img abm4" data-aos="fade-up" data-aos-delay="1100">
                                <div class="abm4-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb2[3]['url']); ?>" alt="ablum"></div>
                            </div>
                        <?php endif ?>
                    </div>
                <?php endif ?>
                <?php
                $images = get_field('gallery_img_alb2');
                $sizes = 'full';
                if ($images): ?>
                    <div class="abm-box2" data-aos="fade-up">
                        <div class="abm-box2-loop">
                            <?php foreach ($images as $image): ?>
                                <div class="abm-img">
                                    <img src="<?php echo esc_url($image['url']); ?>"
                                        alt="<?php echo esc_attr($image['alt']); ?>" />
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($imagesAlb2[4] || $imagesAlb2[5] || $imagesAlb2[6] || $imagesAlb2[7]): ?>
                    <div class="abm-box3">
                        <?php if ($imagesAlb2[4]): ?>
                            <div class="abm-img abm8" data-aos="fade-up">
                                <div class="abm8-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb2[4]['url']); ?>" alt="ablum"></div>
                                <div class="abm8-eff2"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb2[5]): ?>
                            <div class="abm-img abm9" data-aos="fade-up">
                                <div class="abm9-eff"></div>
                                <div class="abm9-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb2[5]['url']); ?>" alt="ablum"></div>
                                <div class="abm9-eff2"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb2[6]): ?>
                            <div class="abm-img abm10" data-aos="fade-left">
                                <div class="abm10-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb2[6]['url']); ?>" alt="ablum"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb2[7]): ?>
                            <div class="abm-img abm11" data-aos="fade-up">
                                <div class="abm11-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb2[7]['url']); ?>" alt="ablum"></div>
                            </div>
                        <?php endif ?>
                    </div>
                <?php endif; ?>

                <?php if ($imagesAlb2[8] || $imagesAlb2[9] || $imagesAlb2[10] || $imagesAlb2[11] || $imagesAlb2[12]): ?>
                    <div class="abm-box4">
                        <?php if ($imagesAlb2[8]): ?>
                            <div class="abm-img abm12" data-aos="fade-up">
                                <div class="abm12-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb2[8]['url']); ?>" alt="ablum"></div>
                                <div class="abm12-eff2"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb2[9]): ?>
                            <div class="abm-img abm13" data-aos="fade-up">
                                <div class="abm13-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb2[9]['url']); ?>" alt="ablum"></div>
                                <div class="abm13-eff2"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb2[10]): ?>
                            <div class="abm-img abm14" data-aos="fade-up">
                                <div class="abm14-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb2[10]['url']); ?>" alt="ablum"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb2[11]): ?>
                            <div class="abm-img abm15" data-aos="fade-right">
                                <div class="abm15-eff1"></div>
                                <div class="abm-parallax"><img
                                        src="<?php echo esc_url($imagesAlb2[11]['url']); ?>" alt="ablum"></div>
                                <div class="abm15-eff2"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb2[12]): ?>
                            <div class="abm-img abm16" data-aos="fade-up">
                                <div class="abm16-eff1"></div>
                                <img src="<?php echo esc_url($imagesAlb2[12]['url']); ?>" alt="ablum">
                                <div class="abm16-eff2"></div>
                            </div>
                        <?php endif ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif ?>

<?php if ($taxonomy_slug_album_theme1 === "album3"): ?>
    <?php
    $imagesAlb3 = get_field('alb3_loop');
    ?>
    <div class="album album3">
        <div class="abm-wrap">
            <?php echo $svg ?>
            <div class="abm-close">quay lại</div>
            <div class="abm-wimg">
                <?php if ($imagesAlb3[0] || $imagesAlb3[1] || $imagesAlb3[2] || $imagesAlb3[3] || $imagesAlb3[4]): ?>
                    <div class="abm-box1">
                        <?php if ($imagesAlb3[0]): ?>
                            <div class="abm-img abm1" data-aos="fade-up">
                                <div class="abm1-eff1"></div>
                                <img src="<?php echo esc_url($imagesAlb3[0]['url']); ?>" alt="ablum">
                                <div class="abm1-eff2"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb3[1]): ?>
                            <div class="abm-img abm2" data-aos="fade-up-right" data-aos-delay="600">
                                <div class="abm2-eff1"></div>
                                <img src="<?php echo esc_url($imagesAlb3[1]['url']); ?>" alt="ablum">
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb3[2]): ?>
                            <div class="abm-img abm3" data-aos="fade-left" data-aos-delay="900">
                                <div class="abm3-eff1"></div>
                                <img src="<?php echo esc_url($imagesAlb3[2]['url']); ?>" alt="ablum">
                                <div class="abm3-eff2"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb3[3]): ?>
                            <div class="abm-img abm4" data-aos="fade-up" data-aos-delay="1400">
                                <div class="abm4-eff1"></div>
                                <img src="<?php echo esc_url($imagesAlb3[3]['url']); ?>" alt="ablum">
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb3[4]): ?>
                            <div class="abm-img abm5" data-aos="fade-up" data-aos-delay="1000">
                                <img src="<?php echo esc_url($imagesAlb3[4]['url']); ?>" alt="ablum">
                                <div class="abm5-eff2">11/08/2025</div>
                            </div>
                        <?php endif ?>
                    </div>
                <?php endif ?>

                <?php if ($imagesAlb3[5]): ?>
                    <div class="abm-px">
                        <div class="abm-px-bg">
                            <img src="<?php echo esc_url($imagesAlb3[5]['url']); ?>" alt="ablum">
                        </div>
                    </div>
                <?php endif ?>

                <?php if ($imagesAlb3[6] || $imagesAlb3[7] || $imagesAlb3[8] || $imagesAlb3[9] || $imagesAlb3[10]): ?>
                    <div class="abm-box3">
                        <?php if ($imagesAlb3[6]): ?>
                            <div class="abm-img abm8" data-aos="fade-right">
                                <div class="abm8-eff1"></div>
                                <img src="<?php echo esc_url($imagesAlb3[6]['url']); ?>" alt="ablum">
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb3[7]): ?>
                            <div class="abm-img abm9" data-aos="fade-down-left" data-aos-delay="600">
                                <div class="abm9-eff1"></div>
                                <img src="<?php echo esc_url($imagesAlb3[7]['url']); ?>" alt="ablum">
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb3[8]): ?>
                            <div class="abm-img abm10" data-aos="zoom-in" data-aos-delay="1700">
                                <div class="abm10-eff1"></div>
                                <div class="abm10-eff2"></div>
                                <img src="<?php echo esc_url($imagesAlb3[8]['url']); ?>" alt="ablum">
                                <div class="abm10-eff3"></div>
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb3[9]): ?>
                            <div class="abm-img abm11" data-aos="fade-down-right" data-aos-delay="600">
                                <div class="abm11-eff1"></div>
                                <img src="<?php echo esc_url($imagesAlb3[9]['url']); ?>" alt="ablum">
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb3[10]): ?>
                            <div class="abm-img abm12" data-aos="fade-up-left" data-aos-delay="900">
                                <div class="abm12-eff1"></div>
                                <img src="<?php echo esc_url($imagesAlb3[10]['url']); ?>" alt="ablum">
                                <div class="abm12-eff2"></div>
                            </div>
                        <?php endif ?>
                    </div>
                <?php endif ?>

                <?php if ($imagesAlb3[11] || $imagesAlb3[12]): ?>
                    <div class="abm-box2">
                        <?php if ($imagesAlb3[11]): ?>
                            <div class="abm-img abm6" data-aos="zoom-out-down">
                                <img src="<?php echo esc_url($imagesAlb3[11]['url']); ?>" alt="ablum">
                            </div>
                        <?php endif ?>
                        <p><span>Kỉ niệm</span></p>
                        <?php if ($imagesAlb3[12]): ?>
                            <div class="abm-img abm7" data-aos="zoom-out-up">
                                <img src="<?php echo esc_url($imagesAlb3[12]['url']); ?>" alt="ablum">
                            </div>
                        <?php endif ?>
                    </div>
                <?php endif ?>

                <?php if ($imagesAlb3[13] || $imagesAlb3[14] || $imagesAlb3[15] || $imagesAlb3[16]): ?>
                    <div class="abm-box4">
                        <?php if ($imagesAlb3[13]): ?>
                            <div class="abm-img abm13" data-aos="fade-left">
                                <img src="<?php echo esc_url($imagesAlb3[13]['url']); ?>" alt="ablum">
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb3[14]): ?>
                            <div class="abm-img abm14" data-aos="fade-up" data-aos-delay="300">
                                <img src="<?php echo esc_url($imagesAlb3[14]['url']); ?>" alt="ablum">
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb3[15]): ?>
                            <div class="abm-img abm15" data-aos="fade-right" data-aos-delay="600">
                                <img src="<?php echo esc_url($imagesAlb3[15]['url']); ?>" alt="ablum">
                            </div>
                        <?php endif ?>
                        <?php if ($imagesAlb3[16]): ?>
                            <div class="abm-img abm16" data-aos="fade-up" data-aos-delay="900">
                                <img src="<?php echo esc_url($imagesAlb3[16]['url']); ?>" alt="ablum">
                            </div>
                        <?php endif ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
<?php endif ?>

<?php if ($taxonomy_slug_album_theme2 === "album4"): ?>
    <?php
    $imagesAlb3 = get_field('alb4_loop');
    ?>
    <div class="album album4">
        <div class="abm-wrap">
            <?php echo $svg ?>
            <div class="abm-close">quay lại</div>
            <div class="abm-wimg">
                <div class="timeline-container">
                    <div class="timeline-line"></div>

                    <div class="year-sticky">
                        <div class="year-number" id="yearNumber"></div>
                    </div>
                    <?php
                    // Get the repeater field
                    if (have_rows('alb4_loop')):

                        // Loop through rows
                        while (have_rows('alb4_loop')):
                            the_row();

                            // Get sub field values
                            $year = get_sub_field('year');
                            $title = get_sub_field('tit'); // Changed from 'title' to 'tit'
                            $text = get_sub_field('text');
                            $layout_style = get_sub_field('layout_style'); // Radio button value: 1, 2, 3, or 4
                            $images = get_sub_field('image'); // Gallery field with URL return format
                
                            ?>

                            <div class="timeline-section" data-year="<?php echo esc_attr($year); ?>">
                                <div class="section-content">
                                    <p class="section-year"><?php echo esc_html($year); ?></p>

                                    <?php if ($images): ?>
                                        <div class="section-images layout-<?php echo esc_attr($layout_style); ?>">
                                            <?php
                                            // Limit images based on layout
                                            $max_images = intval($layout_style);
                                            $image_count = 0;

                                            // Images is array of image URLs since return format is URL
                                            foreach ($images as $image_url):
                                                if ($image_count >= $max_images)
                                                    break;
                                                $image_count++;
                                                ?>
                                                <div class="image">
                                                    <img src="<?php echo esc_url($image_url); ?>"
                                                        alt="<?php echo esc_attr($title); ?>" />
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="desc">
                                        <?php if ($title): ?>
                                            <p class="section-title"><?php echo esc_html($title); ?></p>
                                        <?php endif; ?>

                                        <?php if ($text): ?>
                                            <div class="section-text">
                                                <p class="txt"><?php echo nl2br(esc_html($text)); ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <?php
                        endwhile;

                    else:
                        echo '<p>Chưa có nội dung timeline.</p>';
                    endif;
                    ?>

                </div>
            </div>
        </div>
    </div>
<?php endif ?>