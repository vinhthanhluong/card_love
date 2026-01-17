<div class="counter-screen" id="counterScreen" data-love="<?php echo get_field("date-love") ?>">
  <div class="postcard">
    <div class="stamp">💌</div>

    <!-- Photo section -->
    <div class="photo-section">
      <div class="photo-frame">
        <div class="photo-placeholder">
          <?php
          $images = get_field('gallery_images');
          $sizes = 'full';
          if ($images): ?>
            <div class="slider">
              <?php foreach ($images as $image): ?>
                <div class="slider-img">
                  <img src="<?php echo esc_url($image['url']); ?>"
                    alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
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
            <div class="time-number" id="days"><span>000</span></div>
            <div class="time-label">NGÀY</div>
          </div>
          <div class="time-unit">
            <div class="time-number" id="hours">00</div>
            <div class="time-label">GIỜ</div>
          </div>
          <div class="time-unit">
            <div class="time-number" id="minutes">00</div>
            <div class="time-label">PHÚT</div>
          </div>
        </div>
        <div class="location">EVERY MOMENT WITH YOU</div>
        <div class="tagline">is a beautiful memory in the making</div>
      </div>
    </div>
  </div>
  <button class="back-button" id="counter2_close_btn">QUAY LẠI</button>
</div>