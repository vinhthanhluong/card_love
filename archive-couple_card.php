<?php get_header(); ?>

<main id="card-cp" class="page-cp">
    <div class="container">
        <div class="wrapper">

            <div class="card-archive">
                <div class="archive-info">
                    <div class="total-posts">
                        <span class="stats-number">25</span>
                        <span class="stats-label">Tổng số bài viết</span>
                    </div>
                    <h2 class="archive-title">Lưu trữ theo thời gian</h2>
                    <ul class="archive-list">
                        <?php
                        wp_get_archives(array(
                            'type' => 'yearly',
                            'post_type' => 'couple_card',
                            'show_post_count' => true,
                        ));
                        ?>
                    </ul>

                    <ul class="archive-list">
                        <?php
                        global $wpdb;

                        // Lấy danh sách tháng, năm và số bài viết theo post_type
                        $results = $wpdb->get_results("
                            SELECT 
                                YEAR(post_date) AS year,
                                MONTH(post_date) AS month,
                                COUNT(ID) as post_count
                            FROM $wpdb->posts
                            WHERE post_type = 'couple_card'
                                AND post_status = 'publish'
                            GROUP BY year, month
                            ORDER BY year DESC, month DESC
                        ");

                        if ($results) {
                            foreach ($results as $row) {
                                $month = $row->month;
                                $year = $row->year;
                                $count = $row->post_count;

                                // Link đến archive tháng đó
                                // $url = get_month_link($year, $month);
                                $url = add_query_arg(array(
                                    'post_type' => 'couple_card',
                                    'year' => $year,
                                    'monthnum' => $month,
                                ), get_post_type_archive_link('couple_card'));

                                // Dịch tên tháng ra tiếng Việt
                                $thang = 'Tháng ' . $month;
                                ?>
                                <a href="<?php echo esc_url($url); ?>" class="item">
                                    <span class="month"><?php echo esc_html($thang); ?></span>
                                    <span class="year"><?php echo esc_html($year); ?></span>
                                    <span class="count"><?php echo esc_html($count); ?></span>
                                </a>
                                <?php
                            }
                        } else {
                            echo '<p>Chưa có bài viết nào.</p>';
                        }
                        ?>
                    </ul>
                </div>

                <div class="card-archive-list">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    global $post;
                    // Query post argument
                    $args = array(
                        'post_type' => 'couple_card',
                        'orderby' => 'date',
                        'order' => 'desc',
                        'paged' => $paged,
                        'posts_per_page' => 8,
                    );
                    if (is_year()) {
                        $year = get_the_time('Y');
                        $args += array(
                            'year' => $year,
                        );
                    }
                    $the_query = new WP_Query($args);
                    $news_posts = get_posts($args);
                    if ($news_posts):
                        foreach ($news_posts as $post):
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
                            $cate_name_albums = '';
                            $terms_albums = wp_get_post_terms($post->ID, 'couple_albums', array());
                            if (!empty($terms_albums) && !is_wp_error($terms_albums)) {
                                $cate_name_albums = $terms_albums[0]->name;
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
                                <?php if(get_field('otp_number')) : ?>
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
                                    <?php if ($cate_name_albums): ?>
                                        <li><?php echo esc_html($cate_name_albums); ?></li>
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

                <div class="pagination-wp">
                    <?php
                    wp_pagenavi(array('query' => $the_query));
                    wp_reset_postdata();
                    wp_reset_query();
                    ?>
                </div>
            </div>

        </div>
    </div>
</main>

<?php get_footer(); ?>