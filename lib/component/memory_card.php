<?php
$is_memory = get_field('is_memory');
if ($is_memory) :
?>
  <div class="memory-overlay" id="modalMemory">
    <div class="memory-wrap">
      <!-- Close Button -->
      <div class="memory-close" id="closeMemory">✕</div>
      <div class="container">
        <!-- Floating hearts -->
        <ul class="heart-float">
          <li>💕</li>
          <li>💖</li>
          <li>💗</li>
          <li>💕</li>
          <li>💖</li>
        </ul>

        <!-- Header -->
        <div class="mheader">
          <h1>Our Love Story</h1>
          <p>"Mỗi khoảnh khắc bên nhau đều là kỷ niệm đáng trân trọng"</p>
        </div>

        <!-- Memory Wall -->
        <div class="memory-wall section-loading">
          <div class="polaroid-grid">
            <?php
            $imagesWall = get_field('gallery_images');
            ?>
            <?php if ($imagesWall[0]): ?>
              <div class="polaroid" style="--rotate: -3deg;">
                <img
                  src="<?php echo esc_url($imagesWall[0]['url']); ?>"
                  alt="Memory 1">
                <div class="polaroid-caption">Ngày đầu tiên</div>
              </div>
            <?php endif; ?>
            <?php if ($imagesWall[1]): ?>
              <div class="polaroid" style="--rotate: 2deg;">
                <img
                  src="<?php echo esc_url($imagesWall[1]['url']); ?>"
                  alt="Memory 2">
                <div class="polaroid-caption">Chuyến đi đáng nhớ</div>
              </div>
            <?php endif; ?>
            <?php if ($imagesWall[1]): ?>
              <div class="polaroid" style="--rotate: -2deg;">
                <img
                  src="<?php echo esc_url($imagesWall[1]['url']); ?>"
                  alt="Memory 3">
                <div class="polaroid-caption">Khoảnh khắc hạnh phúc</div>
              </div>
            <?php endif; ?>
            <?php if ($imagesWall[2]): ?>
              <div class="polaroid" style="--rotate: 3deg;">
                <img
                  src="<?php echo esc_url($imagesWall[2]['url']); ?>"
                  alt="Memory 1">
                <div class="polaroid-caption">Ngày kỉ niệm</div>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <div class="mhead">
          <div class="mdate-display">
            <span id="currentDateMemory"><?php echo get_field("date-love") ?></span>
            <span class="ic">💕</span>
            <span>Hôm nay</span>
          </div>
          <div class="mquote">Chúng Ta Đã Bên Nhau</div>
        </div>

        <!-- Counter -->
        <div class="mcounter">
          <div class="num" id="daysCounterMemory">0</div>
          <div class="lb">Ngày</div>
        </div>

        <!-- Stats Section - Elegant Horizontal -->
        <div class="mstats">
          <div class="mstats-row">
            <div class="item">
              <span class="ic">🌸</span>
              <span class="vale" id="seasonsCounterMemory">0</span>
              <span class="lb">Mùa</span>
            </div>
            <div class="item">
              <span class="ic">🎄</span>
              <span class="vale" id="christmasCounterMemory">0</span>
              <span class="lb">Giáng Sinh</span>
            </div>
            <div class="item">
              <span class="ic">🎆</span>
              <span class="vale" id="tetCounterMemory">0</span>
              <span class="lb">Tết</span>
            </div>
          </div>
        </div>

        <!-- Timeline -->
        <div class="mtimeline">
          <div class="head">
            <div class="ttl">
              <span>💕</span>
              <span>Hành Trình Yêu Thương</span>
              <span>💕</span>
            </div>
            <div class="subttl">Những mốc đáng nhớ của chúng ta</div>
          </div>

          <div class="item-wrap">
            <?php
            $memory_item = get_field('memory_rt');
            $filtered_memory = array_filter($memory_item, function ($itm) {
              return !empty($itm['title']) || !empty($itm['desc']);
            });
            if (!empty($filtered_memory)) :
              foreach ($filtered_memory as $itm) :
                $title = $itm['title'];
                $desc = $itm['desc'];
            ?>
                <div class="item">
                  <div class="dot"></div>
                  <div class="cnt">
                    <div class="date">
                      <span><?php echo $title ?></span>
                    </div>
                    <div class="txt"><?php echo $desc ?></div>
                  </div>
                </div>
            <?php
              endforeach;
            endif;
            ?>
          </div>
        </div>

        <!-- Love Statistics -->
        <div class="love-stats section-loading">
          <h2>Thống Kê Tình Yêu</h2>
          <div class="stats-grid">
            <div class="stat-card">
              <div class="stat-icon">💌</div>
              <span class="stat-number" id="messagesCount"><?php echo get_field('memory_r')['number1'] ?></span>
              <span class="stat-label">Tin Nhắn</span>
            </div>
            <div class="stat-card">
              <div class="stat-icon">📸</div>
              <span class="stat-number" id="photosCount"><?php echo get_field('memory_r')['number2'] ?></span>
              <span class="stat-label">Ảnh Chung</span>
            </div>
            <div class="stat-card">
              <div class="stat-icon">🎬</div>
              <span class="stat-number" id="datesCount"><?php echo get_field('memory_r')['number3'] ?></span>
              <span class="stat-label">Buổi Hẹn</span>
            </div>
            <div class="stat-card">
              <div class="stat-icon">😊</div>
              <span class="stat-number"><?php echo get_field('memory_r')['number4'] ?></span>
              <span class="stat-label">Nụ Cười</span>
            </div>
          </div>
        </div>

        <!-- Footer -->
        <!-- <div class="mft">
          <div class="mft-names">
            <div class="name-tag">Dragon Boy</div>
            <div class="name-heart">💖</div>
            <div class="name-tag">Thảo Girl</div>
          </div>
          <div class="mft-text">Forever & Always ∞</div>
        </div> -->
      </div>
    </div>
    <!-- End Memory -->
  </div>
<?php endif; ?>