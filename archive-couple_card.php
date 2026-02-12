<?php get_header(); ?>

<div id="card-cp" class="page-cp">
    <div class="container">
        <div class="wrapper">

            <div class="card-archive">
                <div class="archive-info">
                    <div class="total-posts">
                        <span class="stats-number"><?php 
                            $args_total = array(
                                'post_type' => 'couple_card',
                                'posts_per_page' => -1
                            );
                            $total_query = new WP_Query($args_total);
                            echo $total_query->found_posts;
                        ?></span>
                        <span class="stats-label">Tổng số bài viết</span>
                    </div>
                    <h2 class="archive-title">Lưu trữ theo thời gian</h2>
                    <ul class="archive-list">
                        <?php echo wp_post_type_archive(array('post_type' => 'couple_card', 'have_count' => true, 'add_zero_in_count' => true, 'is_year_archive' => false)); ?>
                    </ul>

                </div>
                <div class="wrap-archive-list">
                    <div class="card-archive-list">
                        <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        global $post;
                        // Query post argument
                        $args = array(
                            'post_type' => 'couple_card',
                            'orderby' => 'date',
                            'order' => 'desc',
                            'posts_per_page' => 2,
                            'paged' => $paged,
                        );
                        // /URL/2025/11/
                        $year = get_query_var('year');
                        if ($year) {
                            $args['year'] = $year;
                        }
                        // filter by month
                        $month = get_query_var('monthnum');
                        if ($month) {
                            $args['monthnum'] = $month;
                        }

                        $the_query = new WP_Query($args);
                        if ($the_query->have_posts()) :
                            foreach ($the_query->posts as $post):
                                setup_postdata($post);

                                // Get post category/taxonomy
                                // Background
                                $cate_name_bg = '';
                                $terms_background = wp_get_post_terms($post->ID, 'couple_background', array());
                                if (!empty($terms_background) && !is_wp_error($terms_background)) {
                                    $cate_name_bg = $terms_background[0]->name;
                                }

                                // Counterday
                                $cate_name_counterday = '';
                                $terms_counterday = wp_get_post_terms($post->ID, 'couple_counterdays', array());
                                if (!empty($terms_counterday) && !is_wp_error($terms_counterday)) {
                                    $cate_name_counterday = $terms_counterday[0]->name;
                                }

                                // Albums
                                $cate_name_albums_theme1 = '';
                                $terms_albums = wp_get_post_terms($post->ID, 'couple_albums_theme1', array());
                                if (!empty($terms_albums) && !is_wp_error($terms_albums)) {
                                    $cate_name_albums_theme1 = $terms_albums[0]->name;
                                }
                                $cate_name_albums_theme2 = '';
                                $terms_albums = wp_get_post_terms($post->ID, 'couple_albums_theme2', array());
                                if (!empty($terms_albums) && !is_wp_error($terms_albums)) {
                                    $cate_name_albums_theme2 = $terms_albums[0]->name;
                                }
                                // Albums Background
                                $cate_name_albums_bg = '';
                                $terms_albums_bg = wp_get_post_terms($post->ID, 'couple_background_album', array());
                                if (!empty($terms_albums_bg) && !is_wp_error($terms_albums_bg)) {
                                    $cate_name_albums_bg = $terms_albums_bg[0]->name;
                                }

                                // Message
                                $cate_name_message = '';
                                $terms_message = wp_get_post_terms($post->ID, 'couple_message', array());
                                if (!empty($terms_message) && !is_wp_error($terms_message)) {
                                    $cate_name_message = $terms_message[0]->name;
                                }

                                // Mp3
                                $cate_name_mp3 = get_field('id_music');
                        ?>
                                <div class="item">
                                    <div class="item-header">
                                        <div class="title"><?php the_title(); ?></div>
                                        <div class="date"><?php echo get_the_date('Y.m.d'); ?></div>
                                    </div>
                                    <?php if (get_field('otp_number')) : ?>
                                        <div class="itm-otp-code">
                                            Password: <?php echo get_field('otp_number') ?>
                                        </div>
                                    <?php endif; ?>
                                    <ul class="details">
                                        <?php if ($cate_name_bg): ?>
                                            <li><?php echo esc_html($cate_name_bg); ?></li>
                                        <?php endif; ?>
                                        <?php if ($cate_name_counterday): ?>
                                            <li><?php echo esc_html($cate_name_counterday); ?></li>
                                        <?php endif; ?>
                                        <?php if ($cate_name_albums_theme1): ?>
                                            <li><?php echo esc_html($cate_name_albums_theme1); ?></li>
                                        <?php endif; ?>
                                        <?php if ($cate_name_albums_theme2): ?>
                                            <li><?php echo esc_html($cate_name_albums_theme2); ?></li>
                                        <?php endif; ?>
                                        <?php if ($cate_name_albums_bg): ?>
                                            <li><?php echo esc_html($cate_name_albums_bg); ?></li>
                                        <?php endif; ?>
                                        <?php if ($cate_name_message): ?>
                                            <li><?php echo esc_html($cate_name_message); ?></li>
                                        <?php endif; ?>
                                        <?php if ($cate_name_mp3): ?>
                                            <li>Mp3</li>
                                        <?php endif; ?>
                                    </ul>
                                    <div class="url">
                                        <a href="<?php the_permalink() ?>">→ Xem chi tiết</a>
                                    </div>
                                </div>
                        <?php
                            endforeach;
                        else:
                            echo '<p>Không tìm thấy</p>';
                        endif;
                        wp_reset_postdata();
                        wp_reset_query();
                        ?>
                    </div>
                    <?php if ($the_query->max_num_pages > 1) : ?>
                        <div class="pagination-wp">
                            <?php
                            wp_pagenavi(array('query' => $the_query));
                            ?>
                        </div>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>