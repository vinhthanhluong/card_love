<?php

$taxonomy_slug_day = "";
$terms_day = wp_get_post_terms($post->ID, 'couple_counterdays', '');
if (!empty($terms_day) && !is_wp_error($terms_day)) {
  $taxonomy_slug_day = $terms_day[0]->slug;
}

if ($taxonomy_slug_day):
  ?>
  <?php
  if ($taxonomy_slug_day === 'type3'): ?>
    <div class="counter-screen" id="counterScreen" data-love="<?php echo get_field("date-love") ?>">
      <div class="postcard">
        <div class="stamp">💌</div>

        <!-- Photo section -->
        <div class="photo-section">
          <div class="photo-frame">
            <div class="photo-placeholder">👫</div>
          </div>
          <div class="save-date-text">Save the Date</div>
        </div>

        <!-- Info section -->
        <div class="info-section">
          <div class="names">
            <span><?php echo get_field("male")['name'] ?></span>
            <span class="and">and</span>
            <span><?php echo get_field("female")['name'] ?></span>
          </div>

          <div class="month-title" id="monthTitle">September</div>

          <div class="calendar">
            <div class="calendar-grid" id="calendar"></div>
          </div>

          <div class="counter-info">
            <div class="counter-title">CHÚNG TA ĐÃ YÊU NHAU</div>
            <div class="time-display">
              <div class="time-unit">
                <div class="time-number iday" id="days"><span>000</span></div>
                <div class="time-label">NGÀY</div>
              </div>
              <div class="time-unit">
                <div class="time-number ihours" id="hours">00</div>
                <div class="time-label">GIỜ</div>
              </div>
              <div class="time-unit">
                <div class="time-number iminute" id="minutes">00</div>
                <div class="time-label">PHÚT</div>
              </div>
            </div>
            <div class="location">EVERY MOMENT WITH YOU</div>
            <div class="tagline">is a beautiful memory in the making</div>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
<?php endif; ?>