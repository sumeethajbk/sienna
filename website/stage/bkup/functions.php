<?php
header('X-Content-Type-Options: nosniff');
header('X-XSS-Protection: 1; mode=block');
header('X-Frame-Options: SAMEORIGIN');
header('Referrer-Policy: strict-origin-when-cross-origin');
header("Permissions-Policy: 'camera=(), microphone=(), geolocation=()' always;");
add_filter('xmlrpc_enabled', '__return_false');
/** Disable REST API **/
// Filters for WP-API version 1.x
add_filter('json_enabled', '__return_false');
add_filter('json_jsonp_enabled', '__return_false');
add_filter('rest_enabled', '__return_false');
add_filter('rest_jsonp_enabled', '__return_false');
function zerowp_disable_rest_api($access)
{
    if (is_user_logged_in()) {
        return $access;
    }
    $errorMessage = 'REST API is disabled!';
    if (!is_wp_error($access)) {
        return new WP_Error(
            'rest_api_disabled',
            $errorMessage,
            [
                'status' => rest_authorization_required_code(),
            ]
        );
    }
    $access->add(
        'rest_api_disabled',
        $errorMessage,
        [
            'status' => rest_authorization_required_code(),
        ]
    );
    return $access;
}
add_filter('rest_authentication_errors', 'zerowp_disable_rest_api', 99);

if (!function_exists('sienna_senior_living_setup')) {

    function sienna_senior_living_setup()
    {

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');


        add_theme_support('title-tag');


        add_theme_support(
            'post-formats',
            array(
                'link',
                'aside',
                'gallery',
                'image',
                'quote',
                'status',
                'video',
                'audio',
                'chat',
            )
        );


        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1568, 9999);

        register_nav_menus(
            array(
                'primary' => esc_html__('Primary menu', 'sienna-senior-living'),
                'footer-one'  => __('Footer menu One', 'sienna-senior-living'),
                'footer-two'  => __('Footer menu Two', 'sienna-senior-living'),
                'footer-three'  => __('Footer menu Three', 'sienna-senior-living'),
                'footer-four'  => __('Footer menu Four', 'sienna-senior-living'),
            )
        );

        add_theme_support(
            'html5',
            array(
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
                'navigation-widgets',
            )
        );
    }
}



add_action('after_setup_theme', 'sienna_senior_living_setup');

function add_space_top_body_class($classes)
{
    if ( is_page_template('templates/investor-centre.php') || is_search() || is_page_template('templates/ic-management.php') || is_page_template('templates/faq.php') || is_page_template('templates/about.php') ||  is_singular('ic_management') || is_page_template('templates/family-resources.php') || is_page_template('templates/contact.php') || is_page_template('templates/volunteer.php')) {
        $classes[] = 'space-top';
    }
    return $classes;
}
add_filter('body_class', 'add_space_top_body_class');


function sienna_senior_living_scripts()
{
    $p_cache = rand(1020, 54669);


    wp_enqueue_style('main-style', get_stylesheet_directory_uri() . '/style.css', array(), $p_cache, 'all');
    wp_enqueue_script('fontawesome-kit', 'https://kit.fontawesome.com/01565105f3.js', array(), null, true);
   // wp_enqueue_script('jquery-min', get_stylesheet_directory_uri() . '/js/jquery-3.7.1.min.js', array(), false, true);
    /* ---------------- CSS ---------------- */
    wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/css/slick.css', array(), false, 'all');
    wp_enqueue_style('magnific-popup', get_stylesheet_directory_uri() . '/css/magnific-popup.css', array(), false, 'all');
    wp_enqueue_style('selectbox', get_stylesheet_directory_uri() . '/css/jquery.selectBox.css', array(), false, 'all');

    /* ---------------- JS ---------------- */
    wp_enqueue_script('sticksy', 'https://cdn.jsdelivr.net/npm/sticksy@0.2.0/dist/sticksy.min.js', array(), null, true);

    wp_enqueue_script('magnific-popup', get_stylesheet_directory_uri() . '/js/magnific-popup.min.js', array(), false, true);
    wp_enqueue_script('custom-popup', get_stylesheet_directory_uri() . '/js/custom-popup.js', array(), false, true);

    wp_enqueue_script('slick', get_stylesheet_directory_uri() . '/js/slick.min.js', array(), false, true);
    wp_enqueue_script('custom-slick', get_stylesheet_directory_uri() . '/js/custom-slick.js', array(), false, true);

    //if(!is_category()){
    wp_enqueue_script('selectbox', get_stylesheet_directory_uri() . '/js/jquery.selectBox.js', array(), false, true);
    wp_enqueue_script('custom-selectbox', get_stylesheet_directory_uri() . '/js/custom-selectBox.js', array(), false, true);
    //}

    wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/js/custom-script.js', array(), false, true);
    wp_enqueue_script('sticky', get_stylesheet_directory_uri() . '/js/sticky.js', array(), false, true);

    if (is_page_template('templates/faq.php')) {
        wp_enqueue_style('faq-page-style',  get_template_directory_uri() . '/css/faq-page.css', array(), '' . $p_cache . '', 'all');
    }

    if (is_page_template('templates/family-resources.php')) {
        wp_enqueue_style('family-resources-page-style',  get_template_directory_uri() . '/css/family-resources-page.css', array(), '' . $p_cache . '', 'all');
        wp_enqueue_script('load-more-resources', get_stylesheet_directory_uri() . '/js/load-more-family-resources.js', array(), false, true);
    }
    if (is_page_template('templates/about.php')) {
        wp_enqueue_style('about-page-style',  get_template_directory_uri() . '/css/about.css', array(), '' . $p_cache . '', 'all');
    }
    if ( is_singular( array( 'post', 'family_resources' ) ) ) {
        wp_enqueue_style('shared-post-style',  get_template_directory_uri() . '/css/shared-post-page.css', array(), '' . $p_cache . '', 'all');
    }
    if ( is_singular('ic_management') ) {
        wp_enqueue_style('ic-profiles-page-style',  get_template_directory_uri() . '/css/ic-profiles-page.css', array(), '' . $p_cache . '', 'all');
    }
    if (is_page_template('templates/retirement-living.php')) {
        wp_enqueue_style('retirement-living-style',  get_template_directory_uri() . '/css/retirement-living-page.css', array(), '' . $p_cache . '', 'all');
    }

    if (is_page_template('templates/where-to-begin.php')) {
        wp_enqueue_style('faq-page-style',  get_template_directory_uri() . '/css/where-to-begin-page.css', array(), '' . $p_cache . '', 'all');
        wp_enqueue_script('scrolly', get_stylesheet_directory_uri() . '/js/scrolly.js', array(), false, true);
    }

    if (basename(get_page_template()) === 'page.php') {
        wp_enqueue_style('default-page-style',  get_template_directory_uri() . '/css/default-page.css', array(), '' . $p_cache . '', 'all');
        wp_enqueue_script('Counter', get_stylesheet_directory_uri() . '/js/Counter.js', array(), false, true);
    }

    if (is_page_template('templates/contact.php')) {
        wp_enqueue_style('contact-page-style',  get_template_directory_uri() . '/css/contact-page.css', array(), '' . $p_cache . '', 'all');
        wp_enqueue_script('tabs', get_stylesheet_directory_uri() . '/js/tabs.js', array(), false, true);
    }

    if (is_page_template('templates/volunteer.php')) {
        wp_enqueue_style('volunteer-page-style',  get_template_directory_uri() . '/css/volunteer-page.css', array(), '' . $p_cache . '', 'all');
    }

    if (is_page_template('templates/home.php')) {
        wp_enqueue_style('home-page-style',  get_template_directory_uri() . '/css/home.css', array(), '' . $p_cache . '', 'all');
        wp_enqueue_script('iframe', get_stylesheet_directory_uri() . '/js/iframe.js', array(), false, true);
    }

    if (is_page_template('templates/locator.php')) {
        wp_enqueue_style('locator-page-style',  get_template_directory_uri() . '/css/locator-page.css', array(), '' . $p_cache . '', 'all');
    }

    if (is_page_template('templates/ltc-landing.php')) {
        wp_enqueue_style('ltc-landing-style',  get_template_directory_uri() . '/css/ltc-landing.css', array(), '' . $p_cache . '', 'all');
    }

    if (is_page_template('templates/ltc-province.php')) {
        wp_enqueue_style('ltc-province-page-style',  get_template_directory_uri() . '/css/ltc-province-page.css', array(), '' . $p_cache . '', 'all');
    }

    if (is_page_template('templates/ic-events.php')) {
        wp_enqueue_style('ic-events-page-style',  get_template_directory_uri() . '/css/ic-events-page.css', array(), '' . $p_cache . '', 'all');
        wp_enqueue_script('load-more-events', get_stylesheet_directory_uri() . '/js/load-more-events.js', array(), false, true);
    }

    if ( is_search() ) {
        wp_enqueue_style('search-results-page-style',  get_template_directory_uri() . '/css/search-results-page.css', array(), '' . $p_cache . '', 'all'); 
    }

    if (is_page_template('templates/ic-management.php')) {
        wp_enqueue_style('ic-management-page-style',  get_template_directory_uri() . '/css/ic-management-page.css', array(), '' . $p_cache . '', 'all');
        wp_enqueue_script('tabSection', get_stylesheet_directory_uri() . '/js/tabSection.js', array(), false, true);
    }

    if (is_page_template('templates/investor-centre.php')) {
        wp_enqueue_style('investor-centre-page-style',  get_template_directory_uri() . '/css/investor-centre-page.css', array(), '' . $p_cache . '', 'all');     
    }
    if (is_page_template('templates/ic-financial-reports.php')) {
        wp_enqueue_style('ic-financial-reports-page-style',  get_template_directory_uri() . '/css/ic-fr-page.css', array(), '' . $p_cache . '', 'all');     
    }
    if (is_category()) {
        wp_enqueue_style('stories-landing-style',  get_template_directory_uri() . '/css/stories-landing.css', array(), '' . $p_cache . '', 'all'); 
        wp_enqueue_script('load-more-stories', get_stylesheet_directory_uri() . '/js/load-more-stories.js', array(), false, true);
    }
    if ( is_singular('wpsl_stores') ) {
        wp_enqueue_style('wpsl-stores-style',  get_template_directory_uri() . '/css/ltc-location.css', array(), '' . $p_cache . '', 'all');
    }


}

add_action('wp_enqueue_scripts', 'sienna_senior_living_scripts');


add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php'); // Removes the 'Comments' menu
});

function my_mce_buttons_2($buttons)
{
    /**
     * Add in a core button that's disabled by default
     */
    $buttons[] = 'superscript';
    $buttons[] = 'subscript';
    return $buttons;
}
add_filter('mce_buttons_2', 'my_mce_buttons_2');

if (function_exists('acf_add_options_sub_page')) {
    acf_add_options_sub_page(array(
        'title' => 'Header Options',
        'parent' => 'themes.php',
    ));
}

if (function_exists('acf_add_options_sub_page')) {
    acf_add_options_sub_page(array(
        'title' => 'Footer Options',
        'parent' => 'themes.php',
    ));
}


function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    $mimes['vcf'] = 'text/vcard';
    $mimes['vcard'] = 'text/vcard';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function allow_vcf_filetype( $data, $file, $filename, $mimes ) {
    $filetype = wp_check_filetype( $filename, $mimes );

    if ( in_array( $filetype['ext'], array( 'vcf', 'vcard' ), true ) ) {
        $data['ext']  = $filetype['ext'];
        $data['type'] = $filetype['type'];
        $data['proper_filename'] = $filename;
    }

    return $data;
}
add_filter( 'wp_check_filetype_and_ext', 'allow_vcf_filetype', 10, 4 );

add_filter('acf/fields/relationship/query/name=locations_select_location', 'acf_ltc_province', 10, 3);
function acf_ltc_province($args, $field, $post)
{
    $args['post_parent'] = 693;
    $args['post_status'] = 'publish';
    return $args;
}

function featured_image_dimensions($content, $post_id, $thumbnail_id)
{
    if (in_array(get_post_type($post_id), array('post'))) {
        $help_text = '<p>' . __('Width: 373px | Height: 373px') . '</p>';
        return $help_text . $content;
    }
    return $content;
}
add_filter('admin_post_thumbnail_html', 'featured_image_dimensions', 10, 3);

function cta_module()
{
    $cta_image = get_field('cta_image');
    $cta_heading  = get_field('cta_heading');
    $cta_description    = get_field('cta_description');
    $cta_button_text    = get_field('cta_button_text');
    $cta_button_link    = get_field('cta_button_link');
    $cta_link_text      = get_field('cta_link_text');
    $cta_link           = get_field('cta_link');
    if(empty($cta_image)){
        $full_text = "full_width";
    }else{
        $full_text = "";
    }
    if (!empty($cta_image || $cta_heading || $cta_description)) {
?>
        <section class="cta-module pos-relative">
            <div class="container">
                <div class="cta-main flex">
                    <?php if (!empty($cta_heading || $cta_description)) { ?>
                        <div class="cta-text <?php echo $full_text; ?>">
                            <?php if (!empty($cta_heading)) { ?>
                                <div class="h2"><?php echo $cta_heading; ?></div>
                            <?php }
                            echo $cta_description; ?>
                            <?php if (!empty($cta_button_text || $cta_link_text)) { ?>
                                <div class="btn-wrap hide-in-mobile">
                                    <?php if (!empty($cta_button_text && $cta_button_link)) { ?>
                                        <a href="<?php echo $cta_button_link; ?>" class="button"><?php echo $cta_button_text; ?></a>
                                    <?php }
                                    if (!empty($cta_link && $cta_link_text)) {  ?>
                                        <a href="<?php echo $cta_link; ?>" class="readmore"><?php echo $cta_link_text; ?></a>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <?php if (!empty($cta_image || $cta_button_text || $cta_link_text)) { ?>
                        <div class="cta-thumb">
                            <?php if (!empty($cta_image)) { ?>
                                <figure class="object-fit">
                                    <img src="<?php echo $cta_image['url']; ?>" alt="<?php echo $cta_image['alt']; ?>" title="<?php echo $cta_image['title']; ?>" />
                                </figure>
                            <?php }
                            if (!empty($cta_button_text || $cta_link_text)) { ?>
                                <div class="btn-wrap hide-in-desktop hide-in-tab">
                                    <?php if (!empty($cta_button_text && $cta_button_link)) { ?>
                                        <a href="<?php echo $cta_button_link; ?>" class="button"><?php echo $cta_button_text; ?></a>
                                    <?php }
                                    if (!empty($cta_link && $cta_link_text)) {  ?>
                                        <a href="<?php echo $cta_link; ?>" class="readmore"><?php echo $cta_link_text; ?></a>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php }
}


function news_letter_section()
{

    $newsletter_heading          = get_field('newsletter_heading', 'option');
    $newsletter_disclaimer_text  = get_field('newsletter_disclaimer_text', 'option');
    $newsletter_form_id          = get_field('newsletter_form_id', 'option');

    if ($newsletter_heading || $newsletter_disclaimer_text || $newsletter_form_id) {
    ?>
        <section class="signup-module">
            <div class="container">
                <div class="signup-main">
                    <div class="signup-wrap flex">

                        <?php if ($newsletter_heading || $newsletter_disclaimer_text) { ?>
                            <div class="signup-lt">

                                <?php if ($newsletter_heading) { ?>
                                    <div class="h5"><?php echo $newsletter_heading; ?></div>
                                <?php } ?>

                                <?php if ($newsletter_disclaimer_text) { ?>
                                    <span class="sub-text"><?php echo $newsletter_disclaimer_text; ?></span>
                                <?php } ?>

                            </div>
                        <?php } ?>

                        <?php if ($newsletter_form_id) { ?>
                            <div class="signup-rt">
                                <div class="signup-form">

                                    <?php
                                    if (is_numeric($newsletter_form_id)) {
                                        echo do_shortcode('[formidable id="' . $newsletter_form_id . '"]');
                                    }
                                    ?>

                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </section>
    <?php }
}

function short_intro_section()
{

    $intro_sub_heading = get_field('short_introduction_sub_heading');
    $intro_heading     = get_field('short_introduction_heading');
    $intro_features = get_field('short_introduction_features');

    if ($intro_sub_heading || $intro_heading || !empty($intro_features)) {
    ?>
        <section class="features-module-main">
            <div class="container">
                <section class="secwrapper flex">

                    <?php if ($intro_sub_heading || $intro_heading) { ?>
                        <section class="section-intro">
                            <?php if ($intro_sub_heading) { ?>
                                <span class="optional-text"><?php echo $intro_sub_heading; ?></span>
                            <?php } ?>

                            <?php if ($intro_heading) { ?>
                                <div class="h3"><?php echo $intro_heading; ?></div>
                            <?php } ?>
                        </section>
                    <?php } ?>

                    <?php if (!empty($intro_features)) { ?>
                        <section class="features-module-section">
                            <div class="features-module flex">

                                <?php foreach ($intro_features as $feature) {
                                    $f_icon_type   = $feature['icon_or_svg'];
                                    $f_icon_image  = $feature['icon'];
                                    $f_icon_svg    = $feature['svg'];
                                    $f_heading     = $feature['heading'];
                                    $f_desc        = $feature['description'];
                                    $f_link_text   = $feature['link_text'];
                                    $f_link        = $feature['link'];

                                    if (!$f_icon_image || !$f_icon_svg || !$f_heading || !$f_desc || !$f_link_text || !$f_link) {


                                ?>
                                        <div class="features-grid">

                                            <?php if ($f_icon_type == 'icon' && $f_icon_image) { ?>
                                                <div class="features-icon">
                                                    <figure>
                                                        <img src="<?php echo $f_icon_image['url']; ?>" alt="<?php echo $f_icon_image['alt']; ?>">
                                                    </figure>
                                                </div>
                                            <?php } ?>

                                            <?php if ($f_icon_type == 'svg' && $f_icon_svg) { ?>
                                                <div class="features-icon">
                                                    <figure>
                                                        <?php echo $f_icon_svg; ?>
                                                    </figure>
                                                </div>
                                            <?php } ?>

                                            <?php if ($f_heading || $f_desc || $f_link_text) { ?>
                                                <div class="features-cnt">

                                                    <?php if ($f_heading) { ?>
                                                        <div class="h6"><?php echo $f_heading; ?></div>
                                                    <?php } ?>

                                                    <?php if ($f_desc) { ?>
                                                        <?php echo $f_desc; ?>
                                                    <?php } ?>

                                                    <?php if ($f_link_text && $f_link) { ?>
                                                        <a href="<?php echo $f_link; ?>" class="readmore"><?php echo $f_link_text; ?></a>
                                                    <?php } ?>

                                                </div>
                                            <?php } ?>

                                        </div>
                                <?php }
                                } ?>

                            </div>
                        </section>
                    <?php } ?>

                </section>
            </div>
        </section>
    <?php }
}

function shortcode_image_or_video_module()
{

    $type           = get_field('image_or_video');
    $image          = get_field('image_or_video_image');
    $poster         = get_field('image_or_video_poster_image');
    $platform       = get_field('image_or_video_platform');
    $youtube_id     = get_field('image_or_video_youtube_id');
    $vimeo_id       = get_field('image_or_video_vimeo_id');

    if (
        empty($type) &&
        empty($image) &&
        empty($poster) &&
        empty($platform) &&
        empty($youtube_id) &&
        empty($vimeo_id)
    ) {
        return '';
    }
    $final_url = '';

    if ($platform == 'youtube' && !empty($youtube_id)) {
        $final_url = "https://www.youtube.com/embed/" . $youtube_id;
    }

    if ($platform == 'vimeo' && !empty($vimeo_id)) {
        $final_url = "https://player.vimeo.com/video/" . $vimeo_id;
    }

    ob_start();
    ?>

    <div class="video-wrap">
        <div class="video-thumbnail pos-relative">

            <?php
            if ($type == 'image' && !empty($image)) { ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>">

            <?php
            } elseif ($type == 'video' && !empty($poster)) { ?>
                <img src="<?php echo $poster['url']; ?>" alt="<?php echo $poster['alt']; ?>" title="<?php echo $poster['title']; ?>">
            <?php } ?>

            <?php if (!empty($final_url)) { ?>
                <div class="play-btn-main flex flex-center">
                    <a class="play-btn popup-youtube flex flex-center" data-type="<?php echo $platform; ?>" href="<?php echo $final_url; ?>">
                        <span class="play-btn-wrap">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/play.svg" alt="Play" title="Play">
                        </span>
                    </a>
                </div>
            <?php } ?>

        </div>
    </div>

<?php
    return ob_get_clean();
}
add_shortcode('video', 'shortcode_image_or_video_module');

function shortcode_micro_cta_module()
{

    $short_cta_image        = get_field('short_cta_image');
    $short_cta_sub_heading  = get_field('short_cta_sub_heading');
    $short_cta_heading      = get_field('short_cta_heading');
    $short_cta_button_text  = get_field('short_cta_button_text');
    $short_cta_file         = get_field('short_cta_file');
    $short_cta_link_text    = get_field('short_cta_link_text');
    $short_cta_link         = get_field('short_cta_link');

    if (
        empty($short_cta_image) &&
        empty($short_cta_sub_heading) &&
        empty($short_cta_heading) &&
        empty($short_cta_button_text) &&
        empty($short_cta_file) &&
        empty($short_cta_link_text) &&
        empty($short_cta_link)
    ) {
        return '';
    }

    ob_start();
?>
    <section class="micro-cta-module pos-relative">
        <div class="container">
            <div class="micro-cta-main flex row-reverse">

                <?php if (!empty($short_cta_image)) { ?>
                    <div class="micro-cta-thumb relative">
                        <figure class="object-fit">
                            <img src="<?php echo $short_cta_image['url']; ?>" alt="<?php echo $short_cta_image['alt']; ?>" title="<?php echo $short_cta_image['title']; ?>">
                        </figure>
                    </div>
                <?php } ?>

                <div class="micro-cta-text relative">
                    <div class="micro-cta-desc">

                        <?php if (!empty($short_cta_sub_heading)) { ?>
                            <span class="signal optional-text"><?php echo $short_cta_sub_heading; ?></span>
                        <?php } ?>

                        <?php if (!empty($short_cta_heading)) { ?>
                            <div class="h5"><?php echo $short_cta_heading; ?></div>
                        <?php } ?>

                        <?php if (!empty($short_cta_button_text) || !empty($short_cta_link_text)) { ?>
                            <div class="btn-wrap">

                                <?php if (!empty($short_cta_button_text) && !empty($short_cta_file)) { ?>
                                    <a href="<?php echo $short_cta_file['url']; ?>" class="button" download>
                                        <?php echo $short_cta_button_text; ?>
                                    </a>
                                <?php } ?>


                                <?php if (!empty($short_cta_link_text) && !empty($short_cta_link)) { ?>
                                    <a href="<?php echo $short_cta_link; ?>" class="readmore">
                                        <?php echo $short_cta_link_text; ?>
                                    </a>
                                <?php } ?>

                            </div>
                        <?php } ?>

                    </div>
                </div>

            </div>
        </div>
    </section>
<?php
    return ob_get_clean();
}
add_shortcode('short_cta', 'shortcode_micro_cta_module');

function shortcode_faq_accordion_module()
{

    $faq_items = get_field('faqs');

    if (empty($faq_items)) {
        return '';
    }

    ob_start();
?>
    <section class="accordion-module">
        <div class="accordion-main">

            <?php foreach ($faq_items as $faq_item) {

                $faq_question = $faq_item['question'];
                $faq_answer   = $faq_item['answer'];

                if (empty($faq_question) && empty($faq_answer)) {
                    continue;
                }
            ?>
                <div class="accordion">
                    <div class="accordion-item">
                        <?php if (!empty($faq_question)) { ?>
                            <a href="#" class="accordion-heading">
                                <span class="title"><?php echo $faq_question; ?></span>
                            </a>
                        <?php } ?>

                        <?php if (!empty($faq_answer)) { ?>
                            <div class="content">
                                <?php echo $faq_answer; ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
<?php
    return ob_get_clean();
}
add_shortcode('faq', 'shortcode_faq_accordion_module');

function shortcode_single_testimonial_section()
{

    $selected_testimonial = get_field('select_testimonial');

    if (empty($selected_testimonial)) {
        return '';
    }
    $testimonial_post = $selected_testimonial[0];

    $testimonial_profile_image = get_field('profile_image', $testimonial_post->ID);
    $testimonial_name          = get_field('testimonial_name', $testimonial_post->ID);
    $testimonial_position      = get_field('testimonial_position', $testimonial_post->ID);
    $testimonial_text          = get_field('testimonial', $testimonial_post->ID);

    if (empty($testimonial_profile_image) && empty($testimonial_name) && empty($testimonial_position) && empty($testimonial_text)) {
        return '';
    }

    ob_start();
?>
    <section class="single-testimonial">
        <div class="single-testimonial-wrap">

            <?php if (!empty($testimonial_text)) { ?>
                <div class="single-testimonial-lt">
                    <?php echo $testimonial_text; ?>
                </div>
            <?php } ?>

            <div class="single-testimonial-rt">

                <?php if (!empty($testimonial_profile_image)) { ?>
                    <div class="single-testimonial-thumb">
                        <figure class="object-fit">
                            <img src="<?php echo $testimonial_profile_image['url']; ?>" alt="<?php echo $testimonial_profile_image['alt']; ?>">
                        </figure>
                    </div>
                <?php } ?>

                <?php if (!empty($testimonial_name) || !empty($testimonial_position)) { ?>
                    <div class="clients-info">
                        <?php if (!empty($testimonial_name)) { ?>
                            <span class="author-name"><?php echo $testimonial_name; ?></span>
                        <?php } ?>
                        <?php if (!empty($testimonial_position)) { ?>
                            <span class="author-pos"><?php echo $testimonial_position; ?></span>
                        <?php } ?>
                    </div>
                <?php } ?>

            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('testimonial', 'shortcode_single_testimonial_section');

function repeater_cta()
{
    $cta_repeater = get_field('cta_repeater');

    if ($cta_repeater) {
    ?>
        <section class="repeater-section pos-relative">

            <?php
            $row_index = 0; // manual counter because you are using foreach

            foreach ($cta_repeater as $cta_item) {

                $row_index++;
                $about_colors = [
                    'var(--Tint-Orange)',
                    'var(--Tint-Green)',
                    'var(--Tint-Pink)',
                    'var(--Tint-Purple)',
                ];

                $retire_colors = [
                    'var(--Tint-Green)',
                    'var(--Tint-Pink)',
                ];

                $default_colors = [
                    ' var(--Tint-Orange)',
                    'var(--Tint-Blue)',
                ];

                if (is_page_template('templates/about.php')) {
                    $color = $about_colors[($row_index - 1) % count($about_colors)];
                } elseif (is_page_template('templates/retirement-living.php')) {
                    $color = $retire_colors[($row_index - 1) % count($retire_colors)];
                } elseif (basename(get_page_template()) === 'page.php') {
                    $color = $default_colors[($row_index - 1) % count($default_colors)];
                } else {
                    $color = 'var(--Tint-Orange)';
                }

                $cta_image        = $cta_item['cta_image'];
                $cta_sub_heading  = $cta_item['cta_sub_heading'];
                $cta_heading      = $cta_item['cta_heading'];
                $cta_description  = $cta_item['cta_description'];
                $cta_button_text  = $cta_item['cta_button_text'];
                $cta_button_link  = $cta_item['cta_button_link'];
                $cta_link_text    = $cta_item['cta_link_text'];
                $cta_link         = $cta_item['cta_link'];
            ?>
                <div class="repeater-list">
                    <div class="container">
                        <div class="repeater-list-inner flex">

                            <?php if ($cta_image) { ?>
                                <div class="repeater-img">
                                    <figure class="object-fit" role="none">
                                        <img src="<?php echo $cta_image['url']; ?>" alt="">
                                    </figure>
                                    <div class="shadow pos-absolute" style="background: <?php echo $color; ?>"></div>
                                </div>
                            <?php } ?>
                            <?php if ($cta_heading || $cta_description) { ?>
                                <div class="repeater-text">

                                    <?php if ($cta_sub_heading) { ?>
                                        <span class="optional-text"><?php echo $cta_sub_heading; ?></span>
                                    <?php } ?>

                                    <?php if ($cta_heading) { ?>
                                        <div class="h3"><?php echo $cta_heading; ?></div>
                                    <?php  } 
                                    if(!empty($cta_sub_heading || $cta_heading)) { ?>
                                        <hr class="w80">
                                    <?php } if ($cta_description) { ?>
                                        
                                        <?php echo $cta_description; ?>
                                    <?php } ?>

                                    <?php if ($cta_button_text || $cta_link_text) { ?>
                                        <div class="btn-wrap">
                                            <?php if ($cta_button_text && $cta_button_link) { ?>
                                                <a href="<?php echo $cta_button_link; ?>" class="button">
                                                    <?php echo $cta_button_text; ?>
                                                </a>

                                            <?php }
                                            if ($cta_link_text && $cta_link) { ?>
                                                <a href="<?php echo $cta_link; ?>" class="readmore">
                                                    <?php echo $cta_link_text; ?>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>

                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>

            <?php } ?>

        </section>
    <?php }
}


function logo()
{
    $logos_heading = get_field('logos_heading');
    $logos = get_field('logos');
    if (!empty($logos)) {
    ?>
        <section class="affiliation-section">
            <div class="container">
                <?php if (!empty($logos_heading)) { ?>
                    <div class="affiliation-title">
                        <div class="h6"><?php echo $logos_heading; ?></div>
                    </div>
                <?php } ?>
                <div class="affiliation-logos">
                    <?php if (!empty($logos)) { ?>
                        <?php foreach ($logos as $item) {
                            $logo = $item['logo'];
                        ?>
                            <?php if (!empty($logo)) { ?>
                                <div class="logo-item">
                                    <figure>
                                        <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>">
                                    </figure>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php }
}

function family_resources()
{

    $rr_sub_heading    = get_field('related_resources_or_news_sub_heading');
    $rr_heading        = get_field('related_resources_or_news_heading');
    $rr_selected_posts = get_field('related_resources_or_news_posts');

    $rr_default_thumb = get_field('resource_post_default_thumbnail_image', 437);

    if (empty($rr_selected_posts)) {
        $rr_args = array(
            'post_type'      => 'family_resources',
            'posts_per_page' => 3,
            'post_status'    => 'publish'
        );
        $rr_query = new WP_Query($rr_args);
        $rr_posts = $rr_query->posts;
    } else {
        $rr_posts = $rr_selected_posts;
    }

    if (empty($rr_sub_heading) && empty($rr_heading) && empty($rr_posts)) {
        return;
    }

    $rr_colors = array(
        'var(--Tint-Blue)',
        'var(--Tint-Green)',
        'var(--Tint-Purple)'
    );

    ?>
    <section class="resources-slider-section">
        <div class="container">
            <div class="resources-slider-main">

                <?php if (!empty($rr_sub_heading) || !empty($rr_heading)) { ?>
                    <div class="resources-slider-header flex flex-vcenter">

                        <?php if (!empty($rr_sub_heading)) { ?>
                            <span class="optional-text"><?php echo $rr_sub_heading; ?></span>
                        <?php } ?>

                        <?php if (!empty($rr_heading)) { ?>
                            <h2 class="h3"><?php echo $rr_heading; ?></h2>
                        <?php } ?>

                    </div>
                <?php } ?>

                <?php if (!empty($rr_posts)) { ?>
                    <div class="resources-slider-row">

                        <?php
                        $i = 0;
                        foreach ($rr_posts as $rr_post) {

                            $rr_post_id = is_object($rr_post) ? $rr_post->ID : $rr_post;

                            $rr_img = get_the_post_thumbnail_url($rr_post_id, 'large');
                            if (empty($rr_img) && !empty($rr_default_thumb['url'])) {
                                $rr_img = $rr_default_thumb['url'];
                            }

                            $rr_title = get_the_title($rr_post_id);
                            $rr_link  = get_permalink($rr_post_id);

                            $rr_categories = get_the_terms($rr_post_id, 'resoure_category');

                            $bg_color = $rr_colors[$i % count($rr_colors)];
                        ?>

                            <div class="resources-slider-item" style="background: <?php echo $bg_color; ?>;">

                                <?php if (!empty($rr_img)) { ?>
                                    <div class="resources-slider-image">
                                        <a href="<?php echo $rr_link; ?>">
                                            <figure class="object-fit">
                                                <img src="<?php echo $rr_img; ?>" alt="<?php echo $rr_title; ?>">
                                            </figure>
                                        </a>
                                    </div>
                                <?php } ?>

                                <div class="resources-slider-text">

                                    <?php if (!empty($rr_categories) && !is_wp_error($rr_categories)) { ?>
                                        <ul class="resources-slider-category flex">
                                            <?php foreach ($rr_categories as $cat) { 
                                                $cat_slug = $cat->slug;
                                                $page_url = get_permalink(437); 
                                                ?>
                                                
                                                <li>
                                                    <a href="<?php echo $page_url . '?category=' . $cat_slug; ?>">
                                                        <?php echo $cat->name; ?>
                                                    </a>
                                                </li>

                                            <?php } ?>

                                        </ul>
                                    <?php } ?>

                                    <?php if (!empty($rr_title)) { ?>
                                        <h2 class="h5">
                                            <a href="<?php echo $rr_link; ?>"><?php echo $rr_title; ?></a>
                                        </h2>
                                    <?php } ?>

                                    <a href="<?php echo $rr_link; ?>" class="circle-arrow-btn flex flex-vcenter">
                                        <span class="fa-sharp fa-regular fa-arrow-right-long"></span>
                                        <span class="location-btn-text">Read More</span>
                                    </a>

                                </div>
                            </div>

                        <?php
                            $i++;
                        }
                        ?>
                    </div>
                <?php } ?>

            </div>
        </div>
    </section>

<?php
}

function short_sidebar(){

$sidebar_icon_type         = get_field('short_sidebar_cta_icon_or_svg');
$sidebar_icon_image        = get_field('short_sidebar_cta_icon');
$sidebar_icon_svg          = get_field('short_sidebar_cta_svg');

$sidebar_sub_heading       = get_field('short_sidebar_cta_sub_heading');
$sidebar_heading           = get_field('short_sidebar_cta_heading');
$sidebar_button_text       = get_field('short_sidebar_cta_button_text');
$sidebar_button_link       = get_field('short_sidebar_cta_button_link');
$sidebar_link_text         = get_field('short_sidebar_cta_link_text');
$sidebar_link              = get_field('short_sidebar_cta_link');

$sidebar_features          = get_field('short_sidebar_cta_features');

if (is_page_template('templates/ltc-province.php')) {
    $color = 'var(--Tint-Orange)';
} elseif (basename(get_page_template()) === 'page.php') {
    $color = 'var(--Tint-Pink)';
} 

if (
  $sidebar_icon_image ||
  $sidebar_icon_svg ||
  $sidebar_sub_heading ||
  $sidebar_heading ||
  $sidebar_button_text ||
  $sidebar_button_link ||
  $sidebar_link_text ||
  $sidebar_link ||
  $sidebar_features
) {
?>
  <section class="features-sidebar-section" style="background: <?php echo $color; ?>;">
    <div class="container">
      <div class="features-sidebar-main flex">

        <div class="features-sidebar">

          <?php if ($sidebar_icon_type == 'icon' && $sidebar_icon_image) { ?>
            <div class="features-sidebar-map">
              <figure class="object-fit">
                <img src="<?php echo $sidebar_icon_image['url']; ?>" alt="">
              </figure>
            </div>
          <?php } ?>

          <?php if ($sidebar_icon_type == 'svg' && $sidebar_icon_svg) { ?>
            <div class="features-sidebar-map">
              <figure class="object-fit">
                <?php echo $sidebar_icon_svg; ?>
              </figure>
            </div>
          <?php } ?>

          <?php if ($sidebar_sub_heading) { ?>
            <span class="optional-text"><?php echo $sidebar_sub_heading; ?></span>
          <?php } ?>

          <?php if ($sidebar_heading) { ?>
            <h2 class="h4"><?php echo $sidebar_heading; ?></h2>
          <?php } ?>

          <?php if ($sidebar_button_text && $sidebar_button_link) { ?>
            <div class="features-sidebar-btn-wrap flex flex-vcenter">
              <a href="<?php echo $sidebar_button_link; ?>" class="button btn-orange">
                <?php echo $sidebar_button_text; ?>
              </a>

              <?php if ($sidebar_link_text && $sidebar_link) { ?>
                <a href="<?php echo $sidebar_link; ?>" class="readmore">
                  <?php echo $sidebar_link_text; ?>
                </a>
              <?php } ?>
            </div>
          <?php } ?>

        </div>

        <?php if ($sidebar_features) { ?>
          <div class="features-sidebar-lists flex pos-relative">

            <?php foreach ($sidebar_features as $sidebar_feature) {
              $sidebar_feature_heading      = $sidebar_feature['short_sidebar_cta_features_heading'];
              $sidebar_feature_description  = $sidebar_feature['short_sidebar_cta_features_description'];

              if ($sidebar_feature_heading || $sidebar_feature_description) {
            ?>
                <div class="features-sidebar-item">

                  <?php if ($sidebar_feature_heading) { ?>
                    <h2 class="h6"><?php echo $sidebar_feature_heading; ?></h2>
                  <?php } ?>

                  <?php if ($sidebar_feature_description) { ?>
                    <?php echo $sidebar_feature_description; ?>
                  <?php } ?>

                </div>
            <?php }
            } ?>

          </div>
        <?php } ?>

      </div>
    </div>
  </section>
<?php }
}


function image_with_video_shortcode($atts) {

    ob_start();

    $video_desktop_image           = get_field('video_desktop_image');
    $image_with_video_type         = get_field('image_with_video_type');
    $image_or_video_youtube_id     = get_field('image_or_video_youtube_id');
    $image_or_video_vimeo_id       = get_field('image_or_video_vimeo_id');
    $image_or_video_upload_video   = get_field('image_or_video_upload_video');
   

    $video_url = '';
    $video_type = '';

    if ($image_with_video_type == 'youtube' && $image_or_video_youtube_id) {
        $video_url = 'https://www.youtube.com/watch?v=' . $image_or_video_youtube_id;
        $video_type = 'youtube';

    } elseif ($image_with_video_type == 'vimeo' && $image_or_video_vimeo_id) {
        $video_url = 'https://vimeo.com/' . $image_or_video_vimeo_id;
        $video_type = 'vimeo';

    } elseif ($image_with_video_type == 'upload-video' && !empty($image_or_video_upload_video)) {
        $video_url = $image_or_video_upload_video['url'];
        $video_type = 'Upload Video';
    }
    if (!empty($video_desktop_image)) { ?>
    
        <div class="fluid-width">
            <div class="fluid-width-wrapper">
                <div class="video-wrap">
                    <div class="video-thumbnail pos-relative">
                        <img src="<?php echo $video_desktop_image['url']; ?>" 
                             alt="<?php echo $video_desktop_image['alt']; ?>">

                        <?php if (!empty($video_url)) { ?>
                            <div class="play-btn-main flex flex-center">
                                <a class="play-btn popup-youtube flex flex-center" 
                                data-type="<?php echo $video_type; ?>" 
                                href="<?php echo $video_url; ?>">
                                    <span class="play-btn-wrap">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/play.svg" 
                                            alt="Play">
                                    </span>
                                </a>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>

    <?php }

    return ob_get_clean();
}
add_shortcode('image_with_video', 'image_with_video_shortcode');


function shortcode_short_cta($atts) {
    ob_start();

    $short_cta_image        = get_field('short_cta_image');
    $short_cta_sub_heading  = get_field('short_cta_sub_heading');
    $short_cta_heading      = get_field('short_cta_heading');
    $short_cta_button_text  = get_field('short_cta_button_text');
    $short_cta_file_link    = get_field('short_cta_file_link');
    $short_cta_link_file    = get_field('short_cta_link_file');
    $short_cta_file         = get_field('short_cta_file');
    $short_cta_link_text    = get_field('short_cta_link_text');
    $short_cta_link         = get_field('short_cta_link');

    if (!empty($short_cta_image) || !empty($short_cta_heading) || !empty($short_cta_sub_heading)) :?>
            <div class="fluid-width">
                <div class="fluid-width-wrapper">
                    <section class="micro-cta-module pos-relative">
                        <div class="container">
                            <div class="micro-cta-main flex  row-reverse">

                                <?php if(!empty($short_cta_image)): ?>
                                <div class="micro-cta-thumb relative">
                                    <figure class="object-fit"> 
                                        <img src="<?php echo $short_cta_image['url']; ?>" alt="<?php echo $short_cta_image['alt']; ?>" title="<?php echo $short_cta_image['title']; ?>">
                                    </figure>
                                </div>
                                <?php endif; ?>

                                <?php if(!empty($short_cta_sub_heading || $short_cta_heading || $short_cta_button_text)): ?>
                                    <div class="micro-cta-text relative">
                                        <div class="micro-cta-desc">

                                            <?php if(!empty($short_cta_sub_heading)): ?>
                                                <span class="signal optional-text"><?php echo $short_cta_sub_heading; ?></span>
                                            <?php endif; ?>

                                            <?php if(!empty($short_cta_heading)): ?>
                                                <div class="h5"><?php echo $short_cta_heading; ?></div>
                                            <?php endif; ?>
                                            <?php if(!empty($short_cta_button_text || $short_cta_link_text)): ?>
                                            <div class="btn-wrap flex flex-vcenter">
                                               <?php 
                                                    if (!empty($short_cta_button_text)) :

                                                        if ($short_cta_file_link === 'file' && !empty($short_cta_file)) : ?>
                                                            <a href="<?php echo esc_url($short_cta_file['url']); ?>" class="button" download>
                                                                <?php echo esc_html($short_cta_button_text); ?>
                                                            </a>

                                                        <?php elseif ($short_cta_file_link === 'link' && !empty($short_cta_link_file)) : ?>
                                                            <a href="<?php echo esc_url($short_cta_link_file); ?>" class="button">
                                                                <?php echo esc_html($short_cta_button_text); ?>
                                                            </a>

                                                        <?php endif;

                                                    endif;
                                                ?>
                                                <?php if(!empty($short_cta_link_text) && !empty($short_cta_link)): ?>
                                                    <a href="<?php echo $short_cta_link; ?>" class="readmore">
                                                        <?php echo $short_cta_link_text; ?>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        <?php 
    endif; 

    return ob_get_clean();
}
add_shortcode('short_cta', 'shortcode_short_cta');

function shortcode_cta_link() {
    $cta_link_heading      = get_field('cta_link_heading');
    $cta_link_button_text  = get_field('cta_link_button_text');
    $cta_link_button_link  = get_field('cta_link_button_link');

    ob_start();
    ?>

    <?php if (!empty($cta_link_heading) || !empty($cta_link_button_text)) { ?>
    <div class="sm-cta-main flex flex-vcenter cta-orange">
        
        <?php if (!empty($cta_link_heading)) { ?>
        <div class="sm-cta-text">
            <div class="h4"><?php echo $cta_link_heading; ?></div>
        </div>
        <?php } ?>

        <?php if (!empty($cta_link_button_text) && !empty($cta_link_button_link)) { ?>
        <div class="sm-cta-btn">
            <a href="<?php echo $cta_link_button_link; ?>" class="button">
                <?php echo $cta_link_button_text; ?>
            </a>
        </div>
        <?php } ?>

    </div>
    <?php } ?>

    <?php
    return ob_get_clean();
}
add_shortcode('cta_link', 'shortcode_cta_link');

function shortcode_cta_repeater() {

    ob_start();

    // Fixed colors repeating every 3 rows
    $colors = array(
        'var(--Tint-Purple)',
        'var(--Tint-Green)',
        'var(--Tint-Blue)'
    );

    $i = 0;

    if (have_rows('cta_repeater')) { ?>
    
    <div class="fluid-width">
        <div class="fluid-width-wrapper">
            <section class="multi-cta-section">
                <div class="container">
                    <div class="multi-cta-main flex">

                        <?php while (have_rows('cta_repeater')) { 
                            the_row();

                            $image       = get_sub_field('image');
                            $heading     = get_sub_field('heading');
                            $description = get_sub_field('description');
                            $link_text   = get_sub_field('link_text');
                            $link        = get_sub_field('link');

                            // Pick color from array & rotate
                            $color = $colors[$i % 3];
                            $i++;
                        ?>

                        <div class="multi-cta-item flex" style="background: <?php echo $color; ?>;">

                            <?php if (!empty($image)) { ?>
                            <div class="multi-cta-thumb">
                                <figure class="object-fit">
                                    <img src="<?php echo $image['url']; ?>" 
                                         alt="<?php echo $image['alt']; ?>">
                                </figure>
                            </div>
                            <?php } ?>

                            <div class="multi-cta-text">

                                <?php if (!empty($heading)) { ?>
                                <h2 class="h5"><?php echo $heading; ?></h2>
                                <?php } ?>

                                <?php if (!empty($description)) { ?>
                                <p><?php echo $description; ?></p>
                                <?php } ?>

                                <?php if (!empty($link_text) && !empty($link)) { ?>
                                <a href="<?php echo $link; ?>" class="readmore">
                                    <?php echo $link_text; ?>
                                </a>
                                <?php } ?>

                            </div>

                        </div>

                        <?php } ?>

                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php }

    return ob_get_clean();
}
add_shortcode('cta_repeater', 'shortcode_cta_repeater');

function shortcode_image_testimonial() {

    $selected_testimonial = get_field('post_select_testimonial');

    if (empty($selected_testimonial)) {
        return '';
    }

    $testimonial_post = $selected_testimonial[0]; // First selected post

    // Featured Image
    $featured_image_id = get_post_thumbnail_id($testimonial_post->ID);
    $testimonial_profile_image = $featured_image_id ? wp_get_attachment_image_src($featured_image_id, 'full')[0] : '';

    
    $testimonial_name     = get_field('testimonial_name', $testimonial_post->ID);
    $testimonial_position = get_field('testimonial_position', $testimonial_post->ID);
    $testimonial_text     = get_field('testimonial', $testimonial_post->ID);

   
    if (empty($testimonial_text)) {
        return '';
    }

    ob_start();
    ?>

    <div class="fluid-width">
        <div class="fluid-width-wrapper">
            <section class="image-testimonial-section">
                <div class="container">
                    <div class="image-testimonial-main flex">

                        <div class="image-testimonial-thumb">
                            <figure class="object-fit">
                                <?php if (!empty($testimonial_profile_image)) : ?>
                                    <img src="<?php echo $testimonial_profile_image; ?>"
                                         alt="<?php echo $testimonial_name; ?>"
                                         title="<?php echo $testimonial_name; ?>">
                                <?php endif; ?>
                            </figure>
                        </div>

                        <div class="image-testimonial-text">
                            <p><?php echo $testimonial_text; ?></p>

                            <div class="image-testimonial-info flex">
                                <?php if (!empty($testimonial_name)) : ?>
                                    <span class="testimonial-author-name">
                                        <?php echo $testimonial_name; ?>
                                    </span>
                                <?php endif; ?>

                                <?php if (!empty($testimonial_position)) : ?>
                                    <span class="testimonial-author-pos">
                                        <?php echo $testimonial_position; ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode('testimonial', 'shortcode_image_testimonial');


// vcard generation
function ic_management_vcard_generator() {

    if (!isset($_GET['vcard']) || !is_singular('ic_management')) {
        return;
    }

    $post_id = intval($_GET['vcard']);

    $name      = get_field('ic_profile_name', $post_id);
    $position  = get_field('ic_profile_position_or_job_title', $post_id);
    $email     = get_field('ic_profile_email', $post_id);
    $phone     = get_field('ic_profile_phone', $post_id);

    if (!$name) {
        $name = get_the_title($post_id);
    }

    $vcard  = "BEGIN:VCARD\r\n";
    $vcard .= "VERSION:3.0\r\n";
    $vcard .= "FN:$name\r\n";

    if ($position) {
        $vcard .= "TITLE:$position\r\n";
    }
    if ($phone) {
        $vcard .= "TEL;TYPE=WORK,VOICE:$phone\r\n";
    }
    if ($email) {
        $vcard .= "EMAIL;TYPE=PREF,INTERNET:$email\r\n";
    }

    $vcard .= "END:VCARD\r\n";

    header('Content-Type: text/x-vcard; charset=utf-8');
    header('Content-Disposition: attachment; filename="' . sanitize_title($name) . '.vcf"');

    echo $vcard;
    exit;
}
add_action('template_redirect', 'ic_management_vcard_generator');

class Custom_Header_Walker extends Walker_Nav_Menu {

    private $first_level_count  = 0;
    private $column_switched    = false;
    private $mega_parent_id     = null;

    function start_lvl( &$output, $depth = 0, $args = [] ) {
        if ( $this->mega_parent_id === 1557 && $depth === 0 ) {
            $this->first_level_count = 0;
            $this->column_switched   = false;

            $output .= '<ul class="sub-menu mega-wrapper">';
            $output .= '<li class="left-column"><ul class="sub-menu">';
        } else {
            $output .= '<ul class="sub-menu">';
        }
    }

    function end_lvl( &$output, $depth = 0, $args = [] ) {
        if ( $this->mega_parent_id === 1557 && $depth === 0 ) {
            $output .= '</ul></li>';

            if ( ! $this->column_switched ) {
                $output .= '<li class="flex-cta-menu"><ul class="sub-menu"></ul></li>';
            }

            $output .= '</ul>';
        } else {
            $output .= '</ul>';
        }
    }

    function start_el( &$output, $item, $depth = 0, $args = [], $id = 0 ) {

        if ( $depth === 0 ) {
            $this->mega_parent_id = (int) $item->ID;
        }

        if ( $this->mega_parent_id !== 1557 ) {

            $classes = ! empty( $item->classes ) ? implode( ' ', array_filter( (array) $item->classes ) ) : '';
            $output .= '<li' . ( $classes ? ' class="' . esc_attr( $classes ) . '"' : '' ) . '>';
            $output .= '<a href="' . esc_url( $item->url ? $item->url : '#' ) . '">'
                        . esc_html( $item->title ) .
                       '</a>';
            return;
        }

        if ( $depth === 1 ) {
            $this->first_level_count++;

            if ( $this->first_level_count === 3 && ! $this->column_switched ) {
                $output .= '</ul></li>';
                $output .= '<li class="flex-cta-menu"><ul class="sub-menu">';
                $this->column_switched = true;
            }
        }

        if ( ! empty( $item->description ) ) {
            $output .= '<li class="menu-cta">';
            $output .= '<div class="menu-cta-container">';
            $output .= '<span class="h6">' . esc_html( $item->description ) . '</span>';
            $output .= '<a href="' . esc_url( $item->url ) . '" class="button btn-white hide-in-tablet hide-in-mobile">'
                        . esc_html( $item->title ) .
                       '</a>';
            $output .= '</div></li>';
            return;
        }

        $classes = ! empty( $item->classes ) ? implode( ' ', array_filter( (array) $item->classes ) ) : '';
        $output .= '<li' . ( $classes ? ' class="' . esc_attr( $classes ) . '"' : '' ) . '>';

        $url   = ! empty( $item->url ) ? esc_url( $item->url ) : '#';
        $title = ! empty( $item->title ) ? esc_html( $item->title ) : '';

        /*---------------------------------
         * FEATURED IMAGE ONLY FOR 1578, 1579, 1580
        ----------------------------------*/
        $image_html = '';

        $allowed_items = [1578, 1579, 1580];

        if ( in_array( $item->ID, $allowed_items ) ) {

            $linked_id = url_to_postid( $item->url );

            if ( $linked_id ) {
                $thumb_id = get_post_thumbnail_id( $linked_id );

                if ( $thumb_id ) {
                    $image_html = wp_get_attachment_image(
                        $thumb_id,
                        'medium',
                        false,
                        [ 'class' => 'menu-featured-img' ]
                    );
                }
            }
        }

        /* OUTPUT MENU ITEM */
        $output .= '<a href="' . $url . '">';

        if ( ! empty( $image_html ) ) {
            $output .= '<span class="menu-icon">' . $image_html . '</span>';
        }

        $output .= '<span class="menu-text">' . $title . '</span>';
        $output .= '</a>';
    }

    function end_el( &$output, $item, $depth = 0, $args = [] ) {
        $output .= '</li>';

        if ( $depth === 0 ) {
            $this->mega_parent_id = null;
        }
    }
}







