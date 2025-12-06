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
   if (is_front_page() || is_home()) :
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
      'page_title'    => 'Contact Button',
      'menu_title'   => 'Contact Button',
      'menu_slug'    => 'contact-button-settings',
      'capability'   => 'edit_posts',
      'icon_url'      => 'dashicons-phone',
      'redirect'   => false
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
?>
   <div id="button-contact-vr">
      <div id="zalo-vr" class="button-contact">
         <div class="phone-vr">
            <a target="_blank" href="https://zalo.me/<?php echo $zalo ?>"></a>
            <div class="phone-vr-circle-fill"></div>
            <div class="phone-vr-img-circle">
               <img alt="Zalo"
                  src="<?php echo get_stylesheet_directory_uri(); ?>/images/uic-zalo.svg">
            </div>
         </div>
      </div>
      <div id="phone-vr" class="button-contact">
         <div class="phone-vr">
            <a href="tel:<?php echo $phone ?>"></a>
            <div class="phone-vr-circle-fill"></div>
            <div class="phone-vr-img-circle">
               <img alt="Phone"
                  src="<?php echo get_stylesheet_directory_uri(); ?>/images/phone.png">
            </div>
         </div>
      </div>
   </div>


<?php
}
// END Create Shortcode

function show_qr_code_in_editor($post) {
   // Kiểm tra xem bài viết có phải là loại 'Card' không
   if ('couple_card' !== $post->post_type) {
       return;
   }

   // Lấy đường dẫn tuyệt đối đến thư mục 'lib/qr-codes' trong theme con
   $qr_code_path = get_stylesheet_directory() . '/lib/qr-codes/';

   // Kiểm tra nếu thư mục chưa tồn tại thì tạo nó
   if (!file_exists($qr_code_path)) {
       wp_mkdir_p($qr_code_path); // Tạo thư mục nếu chưa có
   }

   // Kiểm tra nếu file qrlib.php tồn tại trong thư mục
   if (file_exists(get_stylesheet_directory() . '/lib/phpqrcode/qrlib.php')) {
       include(get_stylesheet_directory() . '/lib/phpqrcode/qrlib.php'); // Include thư viện QR Code
   } else {
       echo 'QR Code library not found. Please check the library path.';
       return;
   }

   // Lấy ID của bài viết hiện tại
   $post_id = $post->ID;
   
   // Lấy URL của bài viết
   $post_url = get_permalink($post_id);
   
   // Tạo tên file QR code dựa trên ID bài viết
   $qr_image = $qr_code_path . 'qr_code_' . $post_id . '.png';

   // Kích thước của mã QR, có thể điều chỉnh giá trị này (ví dụ: 5 cho kích thước lớn hơn)
   $qr_size = 6; // Thay đổi giá trị này để thay đổi kích thước mã QR

   // Kiểm tra nếu ảnh QR code đã tồn tại, nếu có thì xóa ảnh cũ
   if (file_exists($qr_image)) {
       unlink($qr_image); // Xóa ảnh QR cũ nếu tồn tại
   }

   // Tạo QR code từ đường dẫn bài viết (post_url) với kích thước được chỉ định
   QRcode::png($post_url, $qr_image, QR_ECLEVEL_L, $qr_size, 2); 

   // In ra mã HTML để hiển thị QR code trong giao diện chỉnh sửa bài viết
   echo '<div style="margin: 20px 0; padding: 10px; border: 1px solid #ddd;">';
   echo '<h3>QR Code for this Card:</h3>';
   echo '<img src="' . get_stylesheet_directory_uri() . '/lib/qr-codes/qr_code_' . $post_id . '.png" alt="QR Code" width="' . ($qr_size * 50) . 'px">';
   echo '</div>';
}
add_action('edit_form_after_title', 'show_qr_code_in_editor');



function show_post_id_meta_box() {
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

function render_post_id_meta_box($post) {
    echo '<p><strong>ID:</strong> ' . $post->ID . '</p>';
}



/* ========================================================================= */
/* =========================== ADMIN SLUG COLUMN =========================== */

// Only run plugin in the admin
if (is_admin()) :
    class WPAdminSlugColumn {

        /**
        * Constructor for WPAdminSlugColumn Class
        */
        function __construct() {
            add_action( 'current_screen',             array( $this, 'WPASC_post_type' ) );
            add_filter( 'manage_posts_columns',       array( $this, 'WPASC_posts' ) );
            add_action( 'manage_posts_custom_column', array( $this, 'WPASC_posts_data' ), 10, 2 );
            add_filter( 'manage_pages_columns',       array( $this, 'WPASC_posts' ) );
            add_action( 'manage_pages_custom_column', array( $this, 'WPASC_posts_data' ), 10, 2 );
        }

        /**
         * Returns an object that includes the current screen's post type
         *
         * @see https://developer.wordpress.org/reference/functions/get_current_screen/
         */
        function WPASC_post_type() {
            return get_current_screen()->post_type;
        }

        /**
         * Adds Slug column to Posts list column
         *
         * @param array $defaults An array of column names
         */
        function WPASC_posts( $defaults ) {
            $defaults['wpasc-slug'] = __( 'URL Path', 'admin-slug-column' );
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
        function WPASC_posts_data( $column_name, $id ) {
            if ( $column_name == 'wpasc-slug' ) {
                $post_info        = get_post( $id, 'string', 'display' );
                $post_status      = $post_info->post_status;
                $draft_slug_names = array( '%pagename%', '%postname%' );

                if ( 'draft' === $post_status || 'pending' === $post_status || 'future' === $post_status ) {
                    // unpublished status don't technically a slug yet so we have to use another function
                    $post_draft_url_array = get_sample_permalink( $id );
                    // grab the sample url path from the array and remove host and scheme
                    $post_draft_url_pre = str_replace( get_home_url(), '', $post_draft_url_array[0] );
                    // swap the draft %pagename% or %postname% holder with the sample permalink
                    $post_slug = str_replace( $draft_slug_names, $post_draft_url_array[1], $post_draft_url_pre );
                    // fyi: mb decoding is already done for us by the get_sample_permalink() array [1]
                    // now that we have the actual url path, because it's a draft lets make it gray
                    $post_slug = '<span style="color: #999;">' . $post_slug . '</span>';
                } else {
                    // for published and everything else just use the post name and remove host and scheme
                    $post_slug = str_replace( get_home_url(), '', get_permalink( $id ) );
                    // decode for multibyte character support
                    $post_slug = esc_html( urldecode( $post_slug ) );
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
function set_query_parameters($query) {
if( !is_admin() && is_post_type_archive('couple_card')) {
$query->set('posts_per_page', 8);
}
return $query;
}
add_action( 'pre_get_posts', 'set_query_parameters' );

?>
