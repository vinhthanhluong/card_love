<?php get_header('card-cp'); ?>

<main id="main">
  <?php
  if (have_posts()):
    while (have_posts()):
      the_post();
      // cate
      $taxonomy_slug_cate = "";
      $terms_bg = wp_get_post_terms($post->ID, 'couple_cate', '');
      if (!empty($terms_bg) && !is_wp_error($terms_bg)) {
        $taxonomy_slug_cate = $terms_bg[0]->slug;
      }

      // Memory
      $is_memory = get_field('is_memory');
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
                  <img src="<?php echo esc_url($image['url']); ?>"
                    alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
        <!-- Memory Button of Theme1 -->
        <?php if ($is_memory && $taxonomy_slug_cate == 'theme1'): ?>
          <p class="memory-button" id="openMemory">
            <span class="heart">♥</span>
            <span class="heart">♥</span>
            <span class="heart">♥</span>
            <span class="heart">♥</span>
            Xem kỉ niệm
          </p>
        <?php endif; ?>

        <?php if ($taxonomy_slug_cate == "theme2"): ?>
          <!-- Counter -->
          <?php include 'lib/component/counter_card_theme2.php'; ?>
        <?php endif; ?>

        <div class="ilove">
          <?php if ($taxonomy_slug_cate == "theme2"): ?>
            <p class="counter2-btn">
              <button class="love-button" id="counter2_btn">Đếm ngày yêu</button>
            </p>
          <?php endif; ?>

          <div class="ilove-dots"></div>
          <div class="ilove-wrapper">
            <div class="ilove-item ilove-male">
              <p class="ilove-img">
                <img src="<?php echo get_field("male")['avatar']['url'] ?>"
                  alt="<?php echo get_field("male")['name'] ?>">
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
                <p class="ilove-zodiac  <?php echo esc_attr($zodiacM_value) ?>">
                  <?php echo esc_html($zodiacM_label) ?>
                </p>
              </div>
            </div>
            <div class="ilove-item ilove-female">
              <p class="ilove-img">
                <img src="<?php echo get_field("female")['avatar']['url'] ?>"
                  alt="<?php echo get_field("female")['name'] ?>">
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
                <p class="ilove-zodiac  <?php echo esc_attr($zodiacF_value) ?>">
                  <?php echo esc_html($zodiacF_label) ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Memory -->
      <?php if ($taxonomy_slug_cate == "theme1"): ?>
        <?php include 'lib/component/memory_card.php'; ?>
      <?php endif; ?>

      <!-- Album Background -->
      <?php include 'lib/component/album_bg_card.php'; ?>
      <!-- Album -->
      <?php include 'lib/component/album_card.php'; ?>
      <!-- Message -->
      <?php include 'lib/component/message_card.php'; ?>
      <?php
    endwhile;
  endif;
  ?>
</main>
<!-- OTP -->
<?php include 'otp_card.php'; ?>

<?php get_footer('card-cp'); ?>