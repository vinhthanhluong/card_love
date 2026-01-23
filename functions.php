<?php
// Add custom Theme Functions here

function theme_sources()
{
    // JS REGISTER
    wp_register_script('common-js', get_theme_file_uri('/js/common.js'), array(), '', 1);
    wp_register_script('top-js', get_theme_file_uri('/js/top.js'), array(), '', 1);
    wp_register_script('three-js', 'https://cdn.jsdelivr.net/npm/three@0.159.0/build/three.min.js', array(), null, true);
    wp_register_script('gsap-js', get_theme_file_uri('/js/gsap.min.js'), array(), '', 1);
    wp_register_script('gsap-scroll-js', get_theme_file_uri('/js/ScrollTrigger.min.js'), array(), '', 1);
    wp_register_script('infiniteslidev2-js', get_theme_file_uri('/js/infiniteslidev2.min.js'), array(), '', 1);
    wp_register_script('lenis-js', get_theme_file_uri('/js/lenis.min.js'), array(), '', 1);
    wp_register_script('simpleparallax-js', get_theme_file_uri('/js/simpleParallax.min.js'), array(), '', 1);

    // ENQUEUE JS
    if (is_front_page() || is_home()):
        wp_enqueue_script('infiniteslidev2-js');
        wp_enqueue_script('lenis-js');
        wp_enqueue_script('simpleparallax-js');
        wp_enqueue_script('top-js');
        wp_enqueue_script('three-js');
        wp_enqueue_script('gsap-js');
        wp_enqueue_script('gsap-scroll-js');
    endif;

    wp_enqueue_script('common-js');
    // ENQUEUE JS -- END
}
add_action('wp_enqueue_scripts', 'theme_sources');




require_once get_stylesheet_directory() . '/includes/create_posttype.php';

add_shortcode('footer-menu', 'footer_menu_shortcode');
function footer_menu_shortcode($atts, $content = null)
{
    extract(
        shortcode_atts(
            array(
                'name' => null,
                'class' => null
            ),
            $atts
        )
    );
    return wp_nav_menu(
        array(
            'menu' => $name,
            'menu_class' => 'footer-menu',
            'echo' => false
        )
    );
}


/* Template directory */
add_shortcode('tmpurl', 'shortcode_tmpurl');
function shortcode_tmpurl()
{
    return get_stylesheet_directory_uri();
}

/* Site directory */
add_shortcode('siteurl', 'shortcode_siteurl');
function shortcode_siteurl()
{
    return home_url();
}


// Create Options ACF
// Sticky Button
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Contact Button',
        'menu_title' => 'Contact Button',
        'menu_slug' => 'contact-button-settings',
        'capability' => 'edit_posts',
        'icon_url' => 'dashicons-phone',
        'redirect' => false
    ));
}
// END Create Options ACF



// Create Shortcode
// Sticky Button
add_shortcode('contact_btn', 'contact_btn');
function contact_btn()
{
    $phone = preg_replace('/[^0-9+]/', '', get_field('phone_stk', 'option'));
    $zalo = get_field('zalo_stk', 'option');
<<<<<<< Updated upstream
?>
=======
    ?>
>>>>>>> Stashed changes
    <div id="button-contact-vr">
        <div id="zalo-vr" class="button-contact">
            <div class="phone-vr">
                <a target="_blank" href="https://zalo.me/<?php echo $zalo ?>"></a>
                <div class="phone-vr-circle-fill"></div>
                <div class="phone-vr-img-circle">
<<<<<<< Updated upstream
                    <img alt="Zalo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/uic-zalo.svg">
=======
                    <img alt="Zalo"
                        src="<?php echo get_stylesheet_directory_uri(); ?>/images/uic-zalo.svg">
>>>>>>> Stashed changes
                </div>
            </div>
        </div>
        <div id="phone-vr" class="button-contact">
            <div class="phone-vr">
                <a href="tel:<?php echo $phone ?>"></a>
                <div class="phone-vr-circle-fill"></div>
                <div class="phone-vr-img-circle">
<<<<<<< Updated upstream
                    <img alt="Phone" src="<?php echo get_stylesheet_directory_uri(); ?>/images/phone.png">
=======
                    <img alt="Phone"
                        src="<?php echo get_stylesheet_directory_uri(); ?>/images/phone.png">
>>>>>>> Stashed changes
                </div>
            </div>
        </div>
    </div>


<<<<<<< Updated upstream
<?php
=======
    <?php
>>>>>>> Stashed changes
}
// END Create Shortcode

// BEGIN QR FUNCTION

function show_qr_code_in_editor($post)
{
    if ('couple_card' !== $post->post_type) {
        return;
    }

    $post_id = $post->ID;
    $short_url = home_url('/c/' . $post_id);
    $saved_color = get_post_meta($post_id, '_qr_code_color', true);
    $qr_color = $saved_color ? $saved_color : '#8B2E2E';
<<<<<<< Updated upstream
?>
    <div id="qr-code-section" style="margin: 20px 0; padding: 20px; border: 1px solid #ddd; background: #f9f9f9; border-radius: 8px;">
=======
    ?>
    <div id="qr-code-section"
        style="margin: 20px 0; padding: 20px; border: 1px solid #ddd; background: #f9f9f9; border-radius: 8px;">
>>>>>>> Stashed changes
        <h3 style="margin-top: 0;">QR Code</h3>

        <!-- Color Picker -->
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: 600;">
                Chọn màu QR Code:
            </label>
            <div style="display: flex; align-items: center; gap: 15px;">
<<<<<<< Updated upstream
                <input
                    type="color"
                    id="qr_code_color"
                    name="qr_code_color"
                    value="<?php echo esc_attr($qr_color); ?>"
                    style="width: 60px; height: 40px; border: 2px solid #ddd; border-radius: 4px; cursor: pointer;" />
                <input
                    type="text"
                    id="qr_color_hex"
=======
                <input type="color" id="qr_code_color" name="qr_code_color"
>>>>>>> Stashed changes
                    value="<?php echo esc_attr($qr_color); ?>"
                    style="width: 60px; height: 40px; border: 2px solid #ddd; border-radius: 4px; cursor: pointer;" />
                <input type="text" id="qr_color_hex" value="<?php echo esc_attr($qr_color); ?>"
                    placeholder="#8B2E2E"
                    style="padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px; font-family: monospace; width: 120px;" />
<<<<<<< Updated upstream
                <button
                    type="button"
                    id="save_qr_color"
                    class="button button-primary">
                    Lưu màu QR
                </button>
                <button
                    type="button"
                    id="download_qr"
                    class="button">
=======
                <button type="button" id="save_qr_color" class="button button-primary">
                    Lưu màu QR
                </button>
                <button type="button" id="download_qr" class="button">
>>>>>>> Stashed changes
                    📥 Tải xuống PNG
                </button>
                <span id="save-status" style="color: #46b450; display: none;">✓ Đã lưu</span>
            </div>
            <p style="margin: 8px 0 0 0; color: #666; font-size: 12px;">
                <strong>Preset:</strong>
                <button type="button" class="color-preset" data-color="#8B2E2E"
                    style="background: #8B2E2E; width: 30px; height: 30px; border: 2px solid #ddd; border-radius: 4px; cursor: pointer; margin: 0 5px;"></button>
                <button type="button" class="color-preset" data-color="#C04040"
                    style="background: #C04040; width: 30px; height: 30px; border: 2px solid #ddd; border-radius: 4px; cursor: pointer; margin: 0 5px;"></button>
                <button type="button" class="color-preset" data-color="#000000"
                    style="background: #000000; width: 30px; height: 30px; border: 2px solid #ddd; border-radius: 4px; cursor: pointer; margin: 0 5px;"></button>
            </p>
        </div>

        <!-- QR Preview Canvas -->
        <div style="background: #f0f0f0;
            background-image: 
                linear-gradient(45deg, #ccc 25%, transparent 25%), 
                linear-gradient(-45deg, #ccc 25%, transparent 25%), 
                linear-gradient(45deg, transparent 75%, #ccc 75%), 
                linear-gradient(-45deg, transparent 75%, #ccc 75%);
            background-size: 20px 20px;
            background-position: 0 0, 0 10px, 10px -10px, -10px 0px;
            padding: 30px; 
            display: inline-block; 
            border-radius: 8px;">
            <div id="qr-canvas"></div>
        </div>

        <p style="margin-top: 15px; color: #666;">
            <small>Short URL: <code><?php echo $short_url; ?></code></small><br>
            <small style="color: #999;">💡 QR code tự động cập nhật khi bạn thay đổi màu</small>
        </p>
    </div>

    <!-- Load QR Code Styling Library -->
    <script src="https://unpkg.com/qr-code-styling@1.5.0/lib/qr-code-styling.js"></script>

    <script>
<<<<<<< Updated upstream
        jQuery(document).ready(function($) {
=======
        jQuery(document).ready(function ($) {
>>>>>>> Stashed changes
            let qrCode;

            function generateQR(color) {
                $('#qr-canvas').html('');

                qrCode = new QRCodeStyling({
                    width: 256,
                    height: 256,
                    type: "canvas",
                    data: "<?php echo $short_url; ?>",
                    dotsOptions: {
                        color: color,
                        type: "rounded"
                    },
                    backgroundOptions: {
                        color: "transparent",
                    },
                    cornersSquareOptions: {
                        color: color,
                        type: "extra-rounded"
                    },
                    cornersDotOptions: {
                        color: color,
                        type: "dot"
                    },
                    imageOptions: {
                        crossOrigin: "anonymous",
                        margin: 8
                    },
                    qrOptions: {
                        errorCorrectionLevel: "L"
                    }
                });

                qrCode.append(document.getElementById("qr-canvas"));
            }

            // Generate initial QR
            generateQR("<?php echo $qr_color; ?>");

            // Color picker events - Auto regenerate khi đổi màu
<<<<<<< Updated upstream
            $('#qr_code_color').on('input', function() {
=======
            $('#qr_code_color').on('input', function () {
>>>>>>> Stashed changes
                let color = $(this).val();
                $('#qr_color_hex').val(color);
                generateQR(color);
            });

<<<<<<< Updated upstream
            $('#qr_color_hex').on('input', function() {
=======
            $('#qr_color_hex').on('input', function () {
>>>>>>> Stashed changes
                let color = $(this).val();
                if (/^#[0-9A-F]{6}$/i.test(color)) {
                    $('#qr_code_color').val(color);
                    generateQR(color);
                }
            });

<<<<<<< Updated upstream
            $('.color-preset').on('click', function() {
=======
            $('.color-preset').on('click', function () {
>>>>>>> Stashed changes
                let color = $(this).data('color');
                $('#qr_code_color').val(color);
                $('#qr_color_hex').val(color);
                generateQR(color);
            });

            // Lưu màu vào database
<<<<<<< Updated upstream
            $('#save_qr_color').on('click', function() {
=======
            $('#save_qr_color').on('click', function () {
>>>>>>> Stashed changes
                let button = $(this);
                let status = $('#save-status');
                let color = $('#qr_code_color').val();

                button.prop('disabled', true).text('Đang lưu...');
                status.hide();

                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'save_qr_color',
                        post_id: <?php echo $post_id; ?>,
                        color: color,
                        nonce: '<?php echo wp_create_nonce('qr_color_nonce'); ?>'
                    },
<<<<<<< Updated upstream
                    success: function(response) {
=======
                    success: function (response) {
>>>>>>> Stashed changes
                        if (response.success) {
                            status.text('✓ Đã lưu màu').show();
                            setTimeout(() => status.fadeOut(), 2000);
                        } else {
                            status.text('✗ Lỗi').css('color', '#dc3232').show();
                        }
                        button.prop('disabled', false).text('Lưu màu QR');
                    },
<<<<<<< Updated upstream
                    error: function() {
=======
                    error: function () {
>>>>>>> Stashed changes
                        status.text('✗ Lỗi').css('color', '#dc3232').show();
                        button.prop('disabled', false).text('Lưu màu QR');
                    }
                });
            });

            // Download QR as PNG
<<<<<<< Updated upstream
            $('#download_qr').on('click', function() {
=======
            $('#download_qr').on('click', function () {
>>>>>>> Stashed changes
                if (qrCode) {
                    qrCode.download({
                        name: 'qr_code_<?php echo $post_id; ?>',
                        extension: 'png'
                    });
                }
            });
        });
    </script>
<?php
}
add_action('edit_form_after_title', 'show_qr_code_in_editor');

/**
 * AJAX handler để lưu màu QR code
 */
function ajax_save_qr_color()
{
    check_ajax_referer('qr_color_nonce', 'nonce');

    $post_id = intval($_POST['post_id']);
    $color = sanitize_hex_color($_POST['color']);

    if (!$post_id || !$color) {
        wp_send_json_error('Invalid parameters');
    }

    // Chỉ lưu màu vào post meta
    update_post_meta($post_id, '_qr_code_color', $color);

    wp_send_json_success(array(
        'message' => 'Color saved successfully',
        'color' => $color
    ));
}
add_action('wp_ajax_save_qr_color', 'ajax_save_qr_color');

/**
 * Rewrite rules
 */
function custom_qr_rewrite_rules()
{
    add_rewrite_rule('^c/([0-9]+)/?$', 'index.php?post_id=$matches[1]&qr_redirect=1', 'top');
}
add_action('init', 'custom_qr_rewrite_rules');

function custom_qr_query_vars($vars)
{
    $vars[] = 'qr_redirect';
    $vars[] = 'post_id';
    return $vars;
}
add_filter('query_vars', 'custom_qr_query_vars');

function custom_qr_redirect()
{
    if (get_query_var('qr_redirect')) {
        $post_id = get_query_var('post_id');
        if ($post_id) {
            wp_redirect(get_permalink($post_id), 301);
            exit;
        }
    }
}
add_action('template_redirect', 'custom_qr_redirect');
// END QR FUNCTION


function show_post_id_meta_box()
{
    add_meta_box(
        'post_id_meta_box',           // ID của meta box
        'ID Card',                    // Tiêu đề hiển thị
        'render_post_id_meta_box',   // Hàm hiển thị nội dung
        'couple_card',                       // Post type muốn hiển thị
        'normal',                       // Vị trí: 'normal', 'side', 'advanced'
        'default'                     // Ưu tiên
    );
}

add_action('add_meta_boxes', 'show_post_id_meta_box');

function render_post_id_meta_box($post)
{
    echo '<p><strong>ID:</strong> ' . $post->ID . '</p>';
}



/* ========================================================================= */
/* =========================== ADMIN SLUG COLUMN =========================== */

// Only run plugin in the admin
if (is_admin()):
    class WPAdminSlugColumn
    {

        /**
         * Constructor for WPAdminSlugColumn Class
         */
        function __construct()
        {
            add_action('current_screen', array($this, 'WPASC_post_type'));
            add_filter('manage_posts_columns', array($this, 'WPASC_posts'));
            add_action('manage_posts_custom_column', array($this, 'WPASC_posts_data'), 10, 2);
            add_filter('manage_pages_columns', array($this, 'WPASC_posts'));
            add_action('manage_pages_custom_column', array($this, 'WPASC_posts_data'), 10, 2);
        }

        /**
         * Returns an object that includes the current screen's post type
         *
         * @see https://developer.wordpress.org/reference/functions/get_current_screen/
         */
        function WPASC_post_type()
        {
            return get_current_screen()->post_type;
        }

        /**
         * Adds Slug column to Posts list column
         *
         * @param array $defaults An array of column names
         */
        function WPASC_posts($defaults)
        {
            $defaults['wpasc-slug'] = __('URL Path', 'admin-slug-column');
            return $defaults;
        }

        /**
         * Gets the post info from get_post function and displays the slug and/or path
         *
         * @param string $column_name Name of the column
         * @param int    $id          post id
         *
         * @see https://developer.wordpress.org/reference/functions/get_post/
         */
        function WPASC_posts_data($column_name, $id)
        {
            if ($column_name == 'wpasc-slug') {
                $post_info = get_post($id, 'string', 'display');
                $post_status = $post_info->post_status;
                $draft_slug_names = array('%pagename%', '%postname%');

                if ('draft' === $post_status || 'pending' === $post_status || 'future' === $post_status) {
                    // unpublished status don't technically a slug yet so we have to use another function
                    $post_draft_url_array = get_sample_permalink($id);
                    // grab the sample url path from the array and remove host and scheme
                    $post_draft_url_pre = str_replace(get_home_url(), '', $post_draft_url_array[0]);
                    // swap the draft %pagename% or %postname% holder with the sample permalink
                    $post_slug = str_replace($draft_slug_names, $post_draft_url_array[1], $post_draft_url_pre);
                    // fyi: mb decoding is already done for us by the get_sample_permalink() array [1]
                    // now that we have the actual url path, because it's a draft lets make it gray
                    $post_slug = '<span style="color: #999;">' . $post_slug . '</span>';
                } else {
                    // for published and everything else just use the post name and remove host and scheme
                    $post_slug = str_replace(get_home_url(), '', get_permalink($id));
                    // decode for multibyte character support
                    $post_slug = esc_html(urldecode($post_slug));
                }

                // output the slug
                echo $post_slug;
            }
        }
    }


    $WPAdminSlugColumn = new WPAdminSlugColumn();
endif;
/* ============== /////////////////////////////////////////// ============== */
/* ========================================================================= */

//register post_per_page
function set_query_parameters($query)
{
    if (!is_admin() && is_post_type_archive('couple_card')) {
        $query->set('posts_per_page', 8);
    }
    return $query;
}
add_action('pre_get_posts', 'set_query_parameters');

// CSS ADMIN
add_action('admin_enqueue_scripts', function () {
    wp_enqueue_style(
        'acf-admin-style',
        get_stylesheet_directory_uri() . '/adminwp.css',
        [],
        '1.0'
    );
});

<<<<<<< Updated upstream
=======

add_action('admin_footer', function () {
    $screen = get_current_screen();
    if (!$screen || $screen->post_type !== 'couple_card')
        return;
    ?>
    <script>
        (function ($) {
            const taxonomy = 'couple_albums';

            $(document).on(
                'change',
                '#taxonomy-' + taxonomy + ' input[type="checkbox"]',
                function () {
                    $('#taxonomy-' + taxonomy + ' input[type="checkbox"]')
                        .not(this)
                        .prop('checked', false);
                }
            );
        })(jQuery);
    </script>
    <?php
});


>>>>>>> Stashed changes
?>