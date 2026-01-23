<!-- end <main>-->
<footer id="footer">
    <address>Copyright &copy; LOVE CARD since 2025</address>
    <!-- <div class="to-top"><a href="#wrapper"></a></div> -->
</footer>
<!-- end <footer> -->
</div>
<!-- end #wrapper -->
<script src="<?php echo get_theme_file_uri() ?>/card-cp/js/lib/jquery.js"></script>
<script src="<?php echo get_theme_file_uri() ?>/card-cp/js/lib/lightbox.js"></script>
<script src="<?php echo get_theme_file_uri() ?>/card-cp/js/lib/slick.min.js"></script>
<script src="<?php echo get_theme_file_uri() ?>/card-cp/js/lib/gsap.min.js"></script>
<script src="<?php echo get_theme_file_uri() ?>/card-cp/js/lib/ScrollTrigger.min.js"></script>
<script src="<?php echo get_theme_file_uri() ?>/card-cp/js/lib/infiniteslidev2.min.js"></script>
<script src="<?php echo get_theme_file_uri() ?>/card-cp/js/lib/aos.js"></script>
<script src="<?php echo get_theme_file_uri() ?>/card-cp/js/lib/interact.min.js"></script>
<?php
$music_link = get_field('id_music');
if ($music_link): ?>
    <script src="https://w.soundcloud.com/player/api.js"></script>
<?php endif; ?>
<script src="<?php echo get_theme_file_uri() ?>/card-cp/js/common.js"></script>
<script src="<?php echo get_theme_file_uri() ?>/card-cp/js/header.js"></script>

<script src="<?php echo get_theme_file_uri() ?>/card-cp/js/page/top.js"></script>
<script src="<?php echo get_theme_file_uri() ?>/card-cp/js/page/timeline.js"></script>
<script src="<?php echo get_theme_file_uri() ?>/card-cp/js/page/mp3.js"></script>
<script src="<?php echo get_theme_file_uri() ?>/card-cp/js/page/record.js"></script>
<script src="<?php echo get_theme_file_uri() ?>/card-cp/js/page/svg.js"></script>
</body>

</html>