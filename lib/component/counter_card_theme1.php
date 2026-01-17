<?php

$taxonomy_slug_day = "";
$terms_day = wp_get_post_terms($post->ID, 'couple_counterdays', '');
if (!empty($terms_day) && !is_wp_error($terms_day)) {
  $taxonomy_slug_day = $terms_day[0]->slug;
}

if ($taxonomy_slug_day) :
?>
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