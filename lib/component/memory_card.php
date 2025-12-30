<?php 
$terms_memory = wp_get_post_terms($post->ID, 'couple_memory', '');
if (!empty($terms_memory) && !is_wp_error($terms_memory)) :
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
      <div class="mhead">
        <div class="mdate-display">
          <span id="currentDateMemory">04/04/2022</span>
          <!-- <span id="currentDateMemory">10/12/2025</span> -->
          <span class="ic">💕</span>
          <span>Hôm nay</span>
        </div>
        <div class="mquote">Mỗi ngày là một kỷ niệm</div>
      </div>

      <!-- Counter -->
      <div class="mcounter">
        <div class="num" id="daysCounterMemory">0</div>
        <div class="lb">ngày bên nhau</div>
      </div>

      <!-- Stats Section - Elegant Horizontal -->
      <div class="mstats">
        <div class="mstats-row">
          <div class="item">
            <span class="ic">📅</span>
            <span class="vale" id="weeksCounterMemory">0</span>
            <span class="lb">Tuần</span>
          </div>
          <div class="item">
            <span class="ic">🌙</span>
            <span class="vale" id="monthsCounterMemory">0</span>
            <span class="lb">Tháng</span>
          </div>
          <div class="item">
            <span class="ic">✨</span>
            <span class="vale" id="yearsCounterMemory">0</span>
            <span class="lb">Năm</span>
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
          <div class="subttl">Những mốc đáng nhớ của chúng
            ta</div>
        </div>

        <div class="item-wrap">
          <div class="item left">
            <div class="dot"></div>
            <div class="cnt">
              <div class="date">
                <span>🌸</span>
                <span>Ngày đầu tiên</span>
              </div>
              <div class="txt">Ngày chúng ta bắt đầu</div>
            </div>
          </div>

          <div class="item right">
            <div class="dot"></div>
            <div class="cnt">
              <div class="date">
                <span>💝</span>
                <span>Kỷ niệm <span id="daysTimelineMemory1">100</span>
                  ngày</span>
              </div>
              <div class="txt">Tình yêu ngày càng sâu đậm</div>
            </div>
          </div>

          <div class="item left">
            <div class="dot"></div>
            <div class="cnt">
              <div class="date">
                <span>🎂</span>
                <span><span id="daysTimelineMemory2">200</span>
                  ngày</span>
              </div>
              <div class="txt">Những phút giây ngọt ngào</div>
            </div>
          </div>

          <div class="item right">
            <div class="dot"></div>
            <div class="cnt">
              <div class="date">
                <span>💕</span>
                <span>Hôm nay - <span id="daysTimelineMemory3">0</span>
                  ngày</span>
              </div>
              <div class="txt">Và sẽ còn mãi mãi...</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <div class="mft">
        <div class="mft-names">
          <div class="name-tag">Dragon Boy</div>
          <div class="name-heart">💖</div>
          <div class="name-tag">Thảo Girl</div>
        </div>
        <div class="mft-text">Forever & Always ∞</div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>