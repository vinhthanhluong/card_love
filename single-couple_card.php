<?php get_header('card-cp'); ?>

<main id="main">
  <?php
  if (have_posts()) :
    while (have_posts()) : the_post();
      // Background
      $taxonomy_slug_cate = "";
      $terms_bg = wp_get_post_terms($post->ID, 'couple_cate', '');
      if (!empty($terms_bg) && !is_wp_error($terms_bg)) {
        $taxonomy_slug_cate = $terms_bg[0]->slug;
      }

      // Day
      $taxonomy_slug_day = "";
      $terms_day = wp_get_post_terms($post->ID, 'couple_counterdays', '');
      if (!empty($terms_day) && !is_wp_error($terms_day)) {
        $taxonomy_slug_day = $terms_day[0]->slug;
      }

      $terms_message = wp_get_post_terms($post->ID, 'couple_message', '');
  ?>
      <div class="tpl-main <?php echo $taxonomy_slug_cate ?>">
        <div class="love-slider">
          <?php
          $images = get_field('gallery_images');
          $sizes = 'full';
          if ($images): ?>
            <div class="love-slr">
              <?php foreach ($images as $image): ?>
                <div class="lover-slider-img">
                  <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>

        <?php if ($taxonomy_slug_day) : ?>
          <div class="icounter" data-love="<?php echo get_field("date-love") ?>">
            <?php
            if ($taxonomy_slug_day === 'type1'):
            ?>
              <div class="icounter-type1">
                <div class="icounter-head">
                  <p class="iyear"><span>00</span>Năm</p>
                  <p class="imonth"><span>00</span>Tháng</p>
                  <p class="iweek"><span>00</span>Tuần</p>
                  <p class="iday"><span>00</span>Ngày</p>
                </div>
                <div class="icounter-footer">
                  <p class="icounter-first">00/00/0000</p>
                  <p class="icounter-time">
                    <span class="ihours">00</span> :
                    <span class="iminute">00</span> :
                    <span class="isecond">00</span>
                  </p>
                </div>
              </div>
            <?php else : ?>
              <div class="icounter-type2">
                <p class="icounter-tt">Đang yêu</p>
                <p class="iday-sum">0</p>
                <p class="icounter-day">Ngày</p>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <div class="ilove">
          <div class="ilove-dots"></div>
          <div class="ilove-wrapper">
            <div class="ilove-item ilove-male">
              <p class="ilove-img">
                <img src="<?php echo get_field("male")['avatar']['url'] ?>" alt="<?php echo get_field("male")['name'] ?>">
              </p>
              <p class="ilove-name"><?php echo get_field("male")['name'] ?></p>
              <div class="ilove-info">
                <p class="ilove-age"><?php echo get_field("male")['age'] ?></p>
                <?php
                $male = get_field('male');
                $field = get_field_object('male');

                $zodiacM_value = $male['zodiac'];
                $zodiacM_label = '';
                if (!empty($field['sub_fields'])) {
                  foreach ($field['sub_fields'] as $sub_field) {
                    if ($sub_field['name'] === 'zodiac') {
                      $zodiacM_label = $sub_field['choices'][$zodiacM_value] ?? '';
                      break;
                    }
                  }
                }
                ?>
                <p class="ilove-zodiac  <?php echo esc_attr($zodiacM_value) ?>"><?php echo esc_html($zodiacM_label) ?></p>
              </div>
            </div>
            <div class="ilove-item ilove-female">
              <p class="ilove-img">
                <img src="<?php echo get_field("female")['avatar']['url'] ?>" alt="<?php echo get_field("female")['name'] ?>">
              </p>
              <p class="ilove-name"><?php echo get_field("female")['name'] ?></p>
              <div class="ilove-info">
                <p class="ilove-age"><?php echo get_field("female")['age'] ?></p>
                <?php
                $female = get_field('female');
                $field = get_field_object('female');

                $zodiacF_value = $female['zodiac'];
                $zodiacF_label = '';
                if (!empty($field['sub_fields'])) {
                  foreach ($field['sub_fields'] as $sub_field) {
                    if ($sub_field['name'] === 'zodiac') {
                      $zodiacF_label = $sub_field['choices'][$zodiacF_value] ?? '';
                      break;
                    }
                  }
                }
                ?>
                <p class="ilove-zodiac  <?php echo esc_attr($zodiacF_value) ?>"><?php echo esc_html($zodiacF_label) ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Album Background -->
      <?php include 'single-album-bg_card.php'; ?>
      <!-- Album -->
      <?php include 'single-album_card.php'; ?>
      <!-- Message -->

      <?php
      if (!empty($terms_message) && !is_wp_error($terms_message)) {
        include 'single-message_card.php';
      }
      ?>
  <?php
    endwhile;
  endif;
  ?>
</main>
<!-- OTP -->
<?php include 'otp_card.php'; ?>

<?php get_footer('card-cp'); ?>