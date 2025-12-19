<?php
/*
Template Name: IC Financial Reports Page Template
*/
get_header();

$bnr_desktop_image   = get_field('banner_desktop_image');
$bnr_mobile_image    = get_field('banner_mobile_image');
$bnr_mobile_image    = $bnr_mobile_image ? $bnr_mobile_image : $bnr_desktop_image;
$bnr_sub_heading     = get_field('banner_sub_heading');
$bnr_field_heading   = get_field('banner_heading');
$bnr_heading         = $bnr_field_heading  ? $bnr_field_heading  : get_the_title();
$bnr_description     = get_field('banner_description');
$bnr_button_text     = get_field('banner_button_text');
$bnr_button_link     = get_field('banner_button_link');
$bnr_link_text       = get_field('banner_link_text');
$bnr_link            = get_field('banner_link');


?>
<?php
    /* ---------- FILE SIZE FUNCTION ----------- */
    function get_file_size_from_url($url) {
        if (!$url || !is_string($url)) return '';
        $path = parse_url($url, PHP_URL_PATH);
        if (!$path) return '';
        $file = $_SERVER['DOCUMENT_ROOT'] . $path;
        if (!file_exists($file)) return '';
        $size = filesize($file);
        if ($size >= 1048576) return round($size / 1048576, 2) . ' MB';
        if ($size >= 1024) return round($size / 1024, 2) . ' KB';
        return $size . ' bytes';
    }
?>
<?php if (
  $bnr_desktop_image ||
  $bnr_mobile_image ||
  $bnr_sub_heading ||
  $bnr_heading ||
  $bnr_description ||
  $bnr_button_text ||
  $bnr_button_link ||
  $bnr_link_text ||
  $bnr_link
) {
?>
  <section class="hero-banner-section pos-relative">
    <div class="container-lg">
      <div class="hero-banner-main flex">

        <?php if ($bnr_desktop_image) { ?>
          <div class="hero-banner-thumb">
            <div class="hero-banner-img">
              <picture class="object-fit" role="none">
                  <source srcset="<?php echo $bnr_desktop_image['url']; ?>" media="(min-width: 768px)" />
                  <img src="<?php echo $bnr_mobile_image['url']; ?>" alt="" />
              </picture>
            </div>
          </div>
        <?php } ?>

        <?php if ($bnr_sub_heading || $bnr_heading || $bnr_description || $bnr_button_text || $bnr_button_link || $bnr_link_text || $bnr_link) { ?>
          <div class="hero-banner-text">
            <div class="hero-banner-inner">

              <?php if ($bnr_sub_heading) { ?>
                <span class="optional-text"><?php echo $bnr_sub_heading; ?></span>
              <?php } ?>

              <?php if ($bnr_heading) { ?>
                <h1><?php echo $bnr_heading; ?></h1>
              <?php } ?>

              <?php if ($bnr_description) { ?>
                <?php echo $bnr_description; ?>
              <?php } ?>

              <?php if ($bnr_button_text || $bnr_link_text) { ?>
                <div class="btn-wrap">

                  <?php if ($bnr_button_text && $bnr_button_link) { ?>
                    <a href="<?php echo $bnr_button_link; ?>" class="button">
                      <?php echo $bnr_button_text; ?>
                    </a>
                  <?php } ?>

                  <?php if ($bnr_link_text && $bnr_link) { ?>
                    <a href="<?php echo $bnr_link; ?>" class="readmore">
                      <?php echo $bnr_link_text; ?>
                    </a>
                  <?php } ?>

                </div>
              <?php } ?>

            </div>
          </div>
        <?php } ?>

      </div>
    </div>
  </section>
<?php }
?>

<?php echo short_intro_section(); ?>

<?php 
$dividend_module_sub_heading = get_field('dividend_module_sub_heading');
$dividend_module_heading        = get_field('dividend_module_heading');
$dividend_module_script     = get_field('dividend_module_script');
if(!empty($dividend_module_heading || $dividend_module_sub_heading)){
?>
<section class="dividend-module">
    <div class="container">
        <section class="secwrapper flex">
            <?php if(!empty($dividend_module_heading || $dividend_module_sub_heading)){ ?>
                <section class="section-intro"> 
                    <?php if(!empty($dividend_module_sub_heading)){ ?>
                        <span class="optional-text"><?php echo $dividend_module_sub_heading; ?></span>
                    <?php } if(!empty($dividend_module_heading)){ ?>
                        <div class="h3"><?php echo $dividend_module_heading; ?></div>
                    <?php } ?>
                </section>
            <?php } ?>
            <!-- end of section-intro -->
            <section class="accordion-module">
                <div class="accordion-main">
                    <div class="accordion">
                        <div class="accordion-item"> <a href="#" class="accordion-heading"><span
                                    class="title">2025</span> </a>
                            <div class="content">
                                <table class="dividend-table">
                                    <thead>
                                        <tr>
                                            <th>Month</th>
                                            <th>Declaration Date</th>
                                            <th>Record Date</th>
                                            <th>Payment Date</th>
                                            <th>Dividend (PCS)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-th="Month"><strong>May</strong></td>
                                            <td data-th="Declaration Date">May 15, 2025</td>
                                            <td data-th="Record Date">May 30, 2025</td>
                                            <td data-th="Payment Date">June 13, 2025</td>
                                            <td data-th="Dividend (PCS)">$0.0780</td>
                                        </tr>
                                        <tr>
                                            <td data-th="Month"><strong>April</strong></td>
                                            <td data-th="Declaration Date">May 15, 2025</td>
                                            <td data-th="Record Date">May 30, 2025</td>
                                            <td data-th="Payment Date">June 13, 2025</td>
                                            <td data-th="Dividend (PCS)">$0.0780</td>
                                        </tr>
                                        <tr>
                                            <td data-th="Month"><strong>March</strong></td>
                                            <td data-th="Declaration Date">May 15, 2025</td>
                                            <td data-th="Record Date">May 30, 2025</td>
                                            <td data-th="Payment Date">June 13, 2025</td>
                                            <td data-th="Dividend (PCS)">$0.0780</td>
                                        </tr>
                                        <tr>
                                            <td data-th="Month"><strong>February</strong></td>
                                            <td data-th="Declaration Date">May 15, 2025</td>
                                            <td data-th="Record Date">May 30, 2025</td>
                                            <td data-th="Payment Date">June 13, 2025</td>
                                            <td data-th="Dividend (PCS)">$0.0780</td>
                                        </tr>
                                        <tr>
                                            <td data-th="Month"><strong>January</strong></td>
                                            <td data-th="Declaration Date">May 15, 2025</td>
                                            <td data-th="Record Date">May 30, 2025</td>
                                            <td data-th="Payment Date">June 13, 2025</td>
                                            <td data-th="Dividend (PCS)">$0.0780</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end of accordion -->
                    <div class="accordion">
                        <div class="accordion-item"> <a href="#" class="accordion-heading"><span
                                    class="title">2024</span> </a>
                            <div class="content">
                                <table class="dividend-table">
                                    <thead>
                                        <tr>
                                            <th>Month</th>
                                            <th>Declaration Date</th>
                                            <th>Record Date</th>
                                            <th>Payment Date</th>
                                            <th>Dividend (PCS)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-th="Month"><strong>May</strong></td>
                                            <td data-th="Declaration Date">May 15, 2025</td>
                                            <td data-th="Record Date">May 30, 2025</td>
                                            <td data-th="Payment Date">June 13, 2025</td>
                                            <td data-th="Dividend (PCS)">$0.0780</td>
                                        </tr>
                                        <tr>
                                            <td data-th="Month"><strong>April</strong></td>
                                            <td data-th="Declaration Date">May 15, 2025</td>
                                            <td data-th="Record Date">May 30, 2025</td>
                                            <td data-th="Payment Date">June 13, 2025</td>
                                            <td data-th="Dividend (PCS)">$0.0780</td>
                                        </tr>
                                        <tr>
                                            <td data-th="Month"><strong>March</strong></td>
                                            <td data-th="Declaration Date">May 15, 2025</td>
                                            <td data-th="Record Date">May 30, 2025</td>
                                            <td data-th="Payment Date">June 13, 2025</td>
                                            <td data-th="Dividend (PCS)">$0.0780</td>
                                        </tr>
                                        <tr>
                                            <td data-th="Month"><strong>February</strong></td>
                                            <td data-th="Declaration Date">May 15, 2025</td>
                                            <td data-th="Record Date">May 30, 2025</td>
                                            <td data-th="Payment Date">June 13, 2025</td>
                                            <td data-th="Dividend (PCS)">$0.0780</td>
                                        </tr>
                                        <tr>
                                            <td data-th="Month"><strong>January</strong></td>
                                            <td data-th="Declaration Date">May 15, 2025</td>
                                            <td data-th="Record Date">May 30, 2025</td>
                                            <td data-th="Payment Date">June 13, 2025</td>
                                            <td data-th="Dividend (PCS)">$0.0780</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end of accordion -->
                    <div class="accordion">
                        <div class="accordion-item"> <a href="#" class="accordion-heading"><span
                                    class="title">2023</span> </a>
                            <div class="content">
                                <table class="dividend-table">
                                    <thead>
                                        <tr>
                                            <th>Month</th>
                                            <th>Declaration Date</th>
                                            <th>Record Date</th>
                                            <th>Payment Date</th>
                                            <th>Dividend (PCS)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-th="Month"><strong>May</strong></td>
                                            <td data-th="Declaration Date">May 15, 2025</td>
                                            <td data-th="Record Date">May 30, 2025</td>
                                            <td data-th="Payment Date">June 13, 2025</td>
                                            <td data-th="Dividend (PCS)">$0.0780</td>
                                        </tr>
                                        <tr>
                                            <td data-th="Month"><strong>April</strong></td>
                                            <td data-th="Declaration Date">May 15, 2025</td>
                                            <td data-th="Record Date">May 30, 2025</td>
                                            <td data-th="Payment Date">June 13, 2025</td>
                                            <td data-th="Dividend (PCS)">$0.0780</td>
                                        </tr>
                                        <tr>
                                            <td data-th="Month"><strong>March</strong></td>
                                            <td data-th="Declaration Date">May 15, 2025</td>
                                            <td data-th="Record Date">May 30, 2025</td>
                                            <td data-th="Payment Date">June 13, 2025</td>
                                            <td data-th="Dividend (PCS)">$0.0780</td>
                                        </tr>
                                        <tr>
                                            <td data-th="Month"><strong>February</strong></td>
                                            <td data-th="Declaration Date">May 15, 2025</td>
                                            <td data-th="Record Date">May 30, 2025</td>
                                            <td data-th="Payment Date">June 13, 2025</td>
                                            <td data-th="Dividend (PCS)">$0.0780</td>
                                        </tr>
                                        <tr>
                                            <td data-th="Month"><strong>January</strong></td>
                                            <td data-th="Declaration Date">May 15, 2025</td>
                                            <td data-th="Record Date">May 30, 2025</td>
                                            <td data-th="Payment Date">June 13, 2025</td>
                                            <td data-th="Dividend (PCS)">$0.0780</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end of accordion -->
                    <div class="accordion">
                        <div class="accordion-item"> <a href="#" class="accordion-heading"><span
                                    class="title">2022</span> </a>
                            <div class="content">
                                <table class="dividend-table">
                                    <thead>
                                        <tr>
                                            <th>Month</th>
                                            <th>Declaration Date</th>
                                            <th>Record Date</th>
                                            <th>Payment Date</th>
                                            <th>Dividend (PCS)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-th="Month"><strong>May</strong></td>
                                            <td data-th="Declaration Date">May 15, 2025</td>
                                            <td data-th="Record Date">May 30, 2025</td>
                                            <td data-th="Payment Date">June 13, 2025</td>
                                            <td data-th="Dividend (PCS)">$0.0780</td>
                                        </tr>
                                        <tr>
                                            <td data-th="Month"><strong>April</strong></td>
                                            <td data-th="Declaration Date">May 15, 2025</td>
                                            <td data-th="Record Date">May 30, 2025</td>
                                            <td data-th="Payment Date">June 13, 2025</td>
                                            <td data-th="Dividend (PCS)">$0.0780</td>
                                        </tr>
                                        <tr>
                                            <td data-th="Month"><strong>March</strong></td>
                                            <td data-th="Declaration Date">May 15, 2025</td>
                                            <td data-th="Record Date">May 30, 2025</td>
                                            <td data-th="Payment Date">June 13, 2025</td>
                                            <td data-th="Dividend (PCS)">$0.0780</td>
                                        </tr>
                                        <tr>
                                            <td data-th="Month"><strong>February</strong></td>
                                            <td data-th="Declaration Date">May 15, 2025</td>
                                            <td data-th="Record Date">May 30, 2025</td>
                                            <td data-th="Payment Date">June 13, 2025</td>
                                            <td data-th="Dividend (PCS)">$0.0780</td>
                                        </tr>
                                        <tr>
                                            <td data-th="Month"><strong>January</strong></td>
                                            <td data-th="Declaration Date">May 15, 2025</td>
                                            <td data-th="Record Date">May 30, 2025</td>
                                            <td data-th="Payment Date">June 13, 2025</td>
                                            <td data-th="Dividend (PCS)">$0.0780</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end of accordion -->
                    <div class="accordion">
                        <div class="accordion-item"> <a href="#" class="accordion-heading"><span
                                    class="title">2021</span> </a>
                            <div class="content">
                                <table class="dividend-table">
                                    <thead>
                                        <tr>
                                            <th>Month</th>
                                            <th>Declaration Date</th>
                                            <th>Record Date</th>
                                            <th>Payment Date</th>
                                            <th>Dividend (PCS)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-th="Month"><strong>May</strong></td>
                                            <td data-th="Declaration Date">May 15, 2025</td>
                                            <td data-th="Record Date">May 30, 2025</td>
                                            <td data-th="Payment Date">June 13, 2025</td>
                                            <td data-th="Dividend (PCS)">$0.0780</td>
                                        </tr>
                                        <tr>
                                            <td data-th="Month"><strong>April</strong></td>
                                            <td data-th="Declaration Date">May 15, 2025</td>
                                            <td data-th="Record Date">May 30, 2025</td>
                                            <td data-th="Payment Date">June 13, 2025</td>
                                            <td data-th="Dividend (PCS)">$0.0780</td>
                                        </tr>
                                        <tr>
                                            <td data-th="Month"><strong>March</strong></td>
                                            <td data-th="Declaration Date">May 15, 2025</td>
                                            <td data-th="Record Date">May 30, 2025</td>
                                            <td data-th="Payment Date">June 13, 2025</td>
                                            <td data-th="Dividend (PCS)">$0.0780</td>
                                        </tr>
                                        <tr>
                                            <td data-th="Month"><strong>February</strong></td>
                                            <td data-th="Declaration Date">May 15, 2025</td>
                                            <td data-th="Record Date">May 30, 2025</td>
                                            <td data-th="Payment Date">June 13, 2025</td>
                                            <td data-th="Dividend (PCS)">$0.0780</td>
                                        </tr>
                                        <tr>
                                            <td data-th="Month"><strong>January</strong></td>
                                            <td data-th="Declaration Date">May 15, 2025</td>
                                            <td data-th="Record Date">May 30, 2025</td>
                                            <td data-th="Payment Date">June 13, 2025</td>
                                            <td data-th="Dividend (PCS)">$0.0780</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end of accordion -->
                </div>
            </section>
            <!-- end of accordion module -->
            <div class="btn-text"><a href="#" class="more">Show more years</a></div>
        </section>
    </div>
</section>
<?php } ?>
<?php 
$content = get_the_content();
if (!empty(trim($content))) {
?>
<section class="default-section">
    <div class="container">
        <div class="container-sm">
            <div class="default-main relative">
                <?php if (!empty(trim($content))) { ?>
                    <article class="default-article">                       
                    <?php echo apply_filters('the_content', $content); ?>
                    </article>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<?php 
$stock_quote_sub_heading    = get_field('stock_quote_sub_heading');
$stock_quote_heading        = get_field('stock_quote_heading');
$stock_quote_description    = get_field('stock_quote_description');
$stock_quote_link_text      = get_field('stock_quote_link_text');
$stock_quote_link           = get_field('stock_quote_link');
$stock_quote_script         = get_field('stock_quote_script');
if(!empty($stock_quote_heading || $stock_quote_description)){ 
?>
<section class="stock-quote">
    <div class="container">
        <div class="stock-quote-inner flex">
            <?php if(!empty($stock_quote_sub_heading || $stock_quote_description)){  ?>
            <div class="stock-quote-lt"> 
                <?php if(!empty($stock_quote_sub_heading)){ ?>
                    <span class="optional-text"><?php echo $stock_quote_sub_heading; ?></span>
                <?php } if(!empty($stock_quote_sub_heading)){ ?>
                    <div class="h3"><?php echo $stock_quote_sub_heading; ?></div>
                <?php } 
                    echo $stock_quote_description; 
                if(!empty($stock_quote_link_text && $stock_quote_link)){
                ?>                
                    <a href="<?php echo $stock_quote_link; ?>" class="readmore"><?php echo $stock_quote_link_text; ?></a>
                <?php } ?>
            </div>
            <?php } ?>
            <!-- end of stock quote lt -->
            <div class="stock-quote-rt">
                <div class="stock-quote-thumb">
                    <figure class="object-fit" role="none"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/chart-iframe@2x.jpg" alt="Chart"
                            title="Chart" /> </figure>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<?php
$sub_heading   = get_field('analyst_coverage_sub_heading');
$heading       = get_field('analyst_coverage_heading');
$description   = get_field('analyst_coverage_description');
$link_text     = get_field('analyst_coverage_link_text');
$link          = get_field('analyst_coverage_link');
$institutions  = get_field('analyst_coverage_institutions');
if(!empty($heading || $description || $institutions )){
?>

<section class="analyst-coverage">
    <div class="container">
        <div class="analyst-coverage-inner flex">
            <?php if(!empty($heading || $description )){ ?>
                <div class="analyst-coverage-lt">

                    <?php if ( !empty($sub_heading) ) : ?>
                        <span class="optional-text"><?php echo $sub_heading; ?></span>
                    <?php endif; ?>

                    <?php if ( !empty($heading) ) : ?>
                        <div class="h3"><?php echo $heading; ?></div>
                    <?php endif; ?>

                    <?php if ( !empty($description) ) : ?>
                        <p><?php echo $description; ?></p>
                    <?php endif; ?>

                    <?php if ( !empty($link_text) && !empty($link) ) : ?>
                        <a href="<?php echo $link; ?>" class="readmore"><?php echo $link_text; ?></a>
                    <?php endif; ?>
                </div>
            <?php } ?>
            <?php if ( !empty($institutions) ) : ?>
                <div class="analyst-coverage-rt">
                    <div class="analyst-coverage-grids flex">
                            <?php foreach ($institutions as $row) : ?>

                                <?php
                                $inst_name  = $row['analyst_coverage_institution_name'];
                                $first_name = $row['analyst_coverage_first_name'];
                                $phone_text = $row['analyst_coverage_phone_number_text'];
                                $phone      = $row['analyst_coverage_phone_number'];
                                $email      = $row['analyst_coverage_email'];
                                $email_text = $row['analyst_coverage_email_text'];
                                if(!empty($inst_name)){
                                ?>

                                <div class="ac-grid">

                                    <?php if ( !empty($inst_name) ) : ?>
                                        <div class="h6"><?php echo $inst_name; ?></div>
                                    <?php endif; ?>

                                    <?php if ( !empty($first_name) ) : ?>
                                        <div class="ac-name"><?php echo $first_name; ?></div>
                                    <?php endif; ?>

                                    <ul>

                                        <?php if ( !empty($phone_text && $phone) ) : ?>
                                            <li>
                                                <a href="tel:<?php echo $phone; ?>" class="flex flex-vcenter">
                                                    <span class="fa-sharp fa-regular fa-phone"></span>
                                                    <span><?php echo $phone_text; ?></span>
                                                </a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if ( !empty($email && $email_text) ) : ?>
                                            <li>
                                                <a href="mailto:<?php echo $email; ?>" class="flex flex-vcenter">
                                                    <span class="fa-sharp fa-regular fa-at"></span>
                                                    <span><?php echo $email_text; ?></span>
                                                </a>
                                            </li>
                                        <?php endif; ?>

                                    </ul>

                                </div>

                            <?php } endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php } ?>

<?php 
$display_report_module    = get_field('display_report_module');
$reports_module_heading   = get_field('reports_module_heading');
$reports_module_link_text = get_field('reports_module_link_text');
$reports_module_link      = get_field('reports_module_link');
$reports_module_select_report = get_field('reports_module_select_report');

/* ------------------ SELECTED POSTS OR DEFAULT CATEGORY ------------------ */
if (!empty($reports_module_select_report)) {

    $selected_posts = $reports_module_select_report;
    $total_posts = count($selected_posts);

} else {

    $args = array(
        'post_type'      => 'reports_and_doc',
        'posts_per_page' => -1,
        'tax_query'      => array(
            array(
                'taxonomy' => 'reports_categories',
                'field'    => 'term_id',
                'terms'    => 12,
            )
        )
    );

    $reports_query = new WP_Query($args);
    $selected_posts = $reports_query->posts;
    $total_posts = $reports_query->found_posts;
}

if (($display_report_module == "yes") && ($selected_posts)) { 
?>

<section class="large-reports-module">
    <div class="container">       
            <?php if (!empty($reports_module_heading || $reports_module_link_text)): ?>
                <div class="heading flex">
                    
                    <?php if (!empty($reports_module_heading)): ?>
                    <div class="heading-lt">
                        <h2 class="h4"><?php echo $reports_module_heading; ?></h2>
                    </div>
                    <?php endif; ?>

                    <?php if ($reports_module_link && $reports_module_link_text): ?>
                    <div class="heading-rt">
                        <div class="post-link">
                            <a href="<?php echo $reports_module_link; ?>" class="readmore" target="_blank">
                                <?php echo $reports_module_link_text; ?>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>

                </div>
            <?php endif; ?>
            

            <div class="lr-module-main">

                <?php
                $count = 0;
                foreach ($selected_posts as $post) : setup_postdata($post);

                    $img = get_field('report_image', $post->ID);
                    $description = get_field('reports_post_description', $post->ID);
                    $download_txt = get_field('post_download_button_text', $post->ID);
                    $upload = get_field('reports_post_upload_file', $post->ID);

                    $file_url = '';
                    if ($upload) {
                        if (is_array($upload) && isset($upload['url'])) $file_url = $upload['url'];
                        elseif (is_string($upload)) $file_url = $upload;
                    }

                    $file_size = $file_url ? get_file_size_from_url($file_url) : '';
                    $cta_text = get_field('reports_post_button_text', $post->ID);
                    $cta_link = get_field('reports_post_button_link', $post->ID);
                    $post_date = get_the_date('m/d/Y', $post->ID);
                ?>


                <?php if ($count == 0): ?>
                    <div class="lr-module-grid flex">
                        <div class="lr-txt">
                            <div class="h5"><a href="<?php echo $file_url; ?>" download><?php the_title(); ?></a></div>

                            <?php if ($description): ?>
                                <p><?php echo $description; ?></p>
                            <?php endif; ?>

                            <div class="lr-info">
                                <ul>
                                    <li>
                                        <span class="fa-sharp fa-regular fa-calendar"></span> 
                                        <span><?php echo $post_date; ?></span>
                                    </li>

                                    <?php if ($file_url): ?>
                                    <li>
                                        <span class="fa-sharp fa-regular fa-download"></span> 
                                        <span>PDF<?php echo $file_size ? ', ' . $file_size : ''; ?></span>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <?php if(!empty($download_txt || $cta_text)){ ?>
                            <div class="btn-wrap">
                                <?php if ($file_url): ?>
                                <a href="<?php echo $file_url; ?>" class="button" download><?php echo $download_txt; ?></a>
                                <?php endif; ?>

                                <?php if ($cta_link && $cta_text): ?>
                                <a href="<?php echo $cta_link; ?>" class="readmore" target="_blank"><?php echo $cta_text; ?></a>
                                <?php endif; ?>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="lr-thumb">
                            <?php if ($img): ?>
                            <a href="<?php echo $file_url; ?>" download>
                                <figure class="object-fit">
                                    <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" />
                                </figure>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php else: ?>            
                    <div class="lr-module-grid flex">
                        <div class="lr-txt">

                            <div class="h5"><a href="<?php echo $file_url; ?>" download><?php the_title(); ?></a></div>

                            <?php if ($description): ?>
                                <p><?php echo $description; ?></p>
                            <?php endif; ?>

                            <div class="lr-info">
                                <ul>
                                    <li>
                                        <span class="fa-sharp fa-regular fa-calendar"></span> 
                                        <span><?php echo $post_date; ?></span>
                                    </li>

                                    <?php if ($file_url): ?>
                                    <li>
                                        <span class="fa-sharp fa-regular fa-download"></span> 
                                        <span>PDF<?php echo $file_size ? ', ' . $file_size : ''; ?></span>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </div>

                        </div>

                        <div class="lr-thumb">
                            <?php if ($img): ?>
                                <a href="<?php echo $file_url; ?>" download>
                                    <figure class="object-fit">
                                        <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" />
                                    </figure>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                <?php endif; ?>

                <?php 
                $count++;
                endforeach;
                wp_reset_postdata();
                ?>

            </div>
    </div>
</section>

<?php } ?>




<?php
$continued_content_one = get_field('continued_content_one');
if(!empty($continued_content_one)){
?>
<section class="default-section">
    <div class="container">
        <div class="container-sm">
            <div class="default-main relative">
                <article class="default-article">
                    <?php echo $continued_content_one; ?>
                </article>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<?php

$display_financial_result   = get_field('display_financial_result');
$financial_result_heading   = get_field('financial_result_heading');

$taxonomy = 'year_taxonomy';
$selected_year = isset($_GET['year']) ? sanitize_text_field($_GET['year']) : "";

/* ---------------------------------------
   GET ALL YEARS THAT ACTUALLY HAVE POSTS
----------------------------------------*/
$all_years = get_terms([
    'taxonomy'   => $taxonomy,
    'hide_empty' => false,
]);

$year_list = [];

foreach ($all_years as $term) {

    $posts_count = new WP_Query([
        'post_type'      => 'reports_and_doc',
        'posts_per_page' => 1,
        'tax_query' => [
            [
                'taxonomy' => $taxonomy,
                'field'    => 'term_id',
                'terms'    => $term->term_id,
            ]
            ]
    ]);

    if ($posts_count->have_posts()) {
        $year_list[] = $term->name;
    }

    wp_reset_postdata();
}
rsort($year_list, SORT_NUMERIC);
if (empty($selected_year) && !empty($year_list)) {
    $selected_year = $year_list[0];
}

if ($display_financial_result == "yes") :
?>

<section class="financial-results-module">
    <div class="container">

        <div class="heading flex">
            <div class="heading-lt">
                <h2 class="h4"><?php echo $financial_result_heading; ?></h2>
            </div>

            <div class="heading-rt">
                <div class="fr-filter">
                    <ul class="year-filter">

                        <?php
                        $visible_years = array_slice($year_list, 0, 5);
                        $more_years    = array_slice($year_list, 5);

                        foreach ($visible_years as $year) : ?>
                            <li class="<?php echo ($year == $selected_year) ? 'active' : '' ?>">
                                <a id="<?php echo $year; ?>" href="javascript:void(0);"><?php echo $year; ?></a>
                            </li>
                        <?php endforeach; ?>
                        <ul class="more-menu" style="display:none;">
                                    <?php foreach ($more_years as $year) : ?>
                                        <li class="<?php echo ($year == $selected_year) ? 'active' : '' ?>">
                                            <a id="<?php echo $year; ?>" href="javascript:void(0);"><?php echo $year; ?></a>
                                        </li>
                                    <?php endforeach; ?>
                        </ul>

                        <?php if (!empty($more_years)) : ?>
                            <li class="more-yrs">
                                <a href="javascript:void(0);">More</a>
                                <ul class="more-menu">
                                    <?php foreach ($more_years as $year) : ?>
                                        <li class="<?php echo ($year == $selected_year) ? 'active' : '' ?>">
                                            <a id="<?php echo $year; ?>" href="javascript:void(0);"><?php echo $year; ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>
        </div>

        <div class="financial-results-main">

            <?php
            /* -----------------------------------
               MAIN QUERY FOR SELECTED YEAR
            -----------------------------------*/
            $query = new WP_Query([
                'post_type'      => 'reports_and_doc',
                'posts_per_page' => -1,
               
                'orderby' => 'date',
                'order'   => 'DESC'
            ]);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();

                    /* ACF fields */
                    $img = get_field('report_image');
                    $thumb = is_array($img) ? $img['url'] : $img;

                    $file = get_field('reports_post_upload_file');
                    $file_url = !empty($file['url']) ? $file['url'] : "";
                    $file_size = $file_url ? get_file_size_from_url($file_url) : "";

                    // $file = get_field('reports_post_upload_file');
                    // $file_url = $file ? $file['url'] : "";

                    // $file_size = get_field('file_size');
                    $short_desc = get_field('reports_post_description');

                    $docyear_terms = get_the_terms($post->ID, 'year_taxonomy');

                    $docyear_slugs = !empty($docyear_terms) && !is_wp_error($docyear_terms)
                        ? wp_list_pluck($docyear_terms, 'slug')
                        : [];

                    if(!empty($docyear_slugs[0])){


            ?>

                <div class="financial-results-grid flex <?php echo $docyear_slugs[0]; ?>" data-year="<?php echo $docyear_slugs[0]; ?>">

                    <div  class="fr-lt">
                        <div class="fr-thumb">
                            <a href="<?php echo $file_url; ?>" download>
                                <figure class="object-fit">
                                    <img src="<?php echo $thumb; ?>" alt="<?php the_title(); ?>">
                                </figure>
                            </a>
                        </div>

                        <div class="fr-txt">
                            <div class="h6">
                                <a href="<?php echo $file_url; ?>" download><?php the_title(); ?></a>
                            </div>

                            <?php echo $short_desc; ?>

                            <div class="fr-info">
                                <ul>
                                    <li>
                                        <span class="fa-sharp fa-regular fa-calendar"></span>
                                        <span>Updated <?php echo get_the_date('m/d/Y'); ?></span>
                                    </li>

                                    <?php if ($file) : ?>
                                        <li>
                                            <span class="fa-sharp fa-regular fa-file"></span>
                                            <span>PDF<?php echo $file_size ? ", $file_size" : ""; ?></span>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="fr-download">
                        <?php if ($file) : ?>
                            <a href="<?php echo $file_url; ?>" class="download-btn" target="_blank" download>
                                <span><em class="fa-sharp fa-regular fa-download"></em></span>
                            </a>
                        <?php endif; ?>
                    </div>

                </div>

            <?php } endwhile; endif; wp_reset_postdata(); ?>

        </div>
    </div>
</section>

<?php endif; ?>


<?php 
$continued_content_two = get_field('continued_content_two');
if(!empty($continued_content_two)){ 
?>
<section class="default-section">
    <div class="container">
        <div class="container-sm">
            <div class="default-main relative">
                <article class="default-article">
                    <?php echo $continued_content_two; ?>
                </article>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<?php
$display = get_field('display_regulatory_fillings');
$heading = get_field('regulatory_fillings_heading');
$link_text = get_field('regulatory_fillings_link_text');
$link = get_field('regulatory_fillings_link');
$selected = get_field('regulatory_fillings_select_report');

if (!empty($selected)) {

    $posts_list = $selected;
    $total_posts = count($posts_list);

} else {

    $args = array(
        'post_type' => 'reports_and_doc',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'reports_categories',
                'field'    => 'term_id',
                'terms'    => 14, 
            )
        )
    );

    $q = new WP_Query($args);
    $posts_list = $q->posts;
    $total_posts = $q->found_posts;
}

if ($display !== 'yes' || empty($posts_list)) return;

function rf_file_size($url){
    if (!$url || !is_string($url)) return '';
    $path = parse_url($url, PHP_URL_PATH);
    if (!$path) return '';
    $file = $_SERVER['DOCUMENT_ROOT'] . $path;
    if (!file_exists($file)) return '';
    $size = filesize($file);

    if ($size >= 1048576) return round($size/1048576,2) . ' MB';
    if ($size >= 1024) return round($size/1024,2) . ' KB';
    return $size . ' bytes';
}
?>

<section class="regulatory-filings-module">
    <div class="container">
        <?php if(!empty($heading || $link_text)){ ?>
        <div class="heading flex">
            <div class="heading-lt">
                <h2 class="h4"><?php echo $heading; ?></h2>
            </div>

            <?php if($link && $link_text): ?>
            <div class="heading-rt">
                <div class="post-link">
                    <a href="<?php echo $link; ?>" class="readmore" target="_blank"><?php echo $link_text; ?></a>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php } ?>

        <div class="regulatory-filings-main">

            <?php
            $i = 0;
            foreach ($posts_list as $post): setup_postdata($post);

                $img  = get_field('report_image', $post->ID);
                $desc = get_field('reports_post_description', $post->ID);
                $download_txt = get_field('post_download_button_text', $post->ID);
                $upload = get_field('reports_post_upload_file', $post->ID);

                $file_url = '';
                if ($upload) {
                    if (is_array($upload) && isset($upload['url'])) $file_url = $upload['url'];
                    elseif (is_string($upload)) $file_url = $upload;
                }

                $file_size = $file_url ? rf_file_size($file_url) : '';
                $date = get_the_date('m/d/Y', $post->ID);
            ?>

            <div class="regulatory-filings-grid flex">
                <div class="rf-lt">

                    <div class="rf-thumb">
                        <figure class="object-fit">
                            <?php if($img): ?>
                            <a href="<?php echo $file_url; ?>" download>
                                <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                            </a>
                            <?php endif; ?>
                        </figure>
                    </div>

                    <div class="rf-txt">
                        <div class="h6"><a href="<?php echo $file_url; ?>" download><?php the_title(); ?></a></div>

                        <?php if($desc): ?>
                        <?php echo $desc; ?>
                        <?php endif; ?>

                        <div class="rf-info">
                            <ul>
                                <li><span class="fa-sharp fa-regular fa-calendar"></span> 
                                    <span>Updated <?php echo $date; ?></span>
                                </li>

                                <?php if($file_url): ?>
                                <li>
                                    <span class="fa-sharp fa-regular fa-file"></span> 
                                    <span>PDF<?php echo $file_size ? ', '.$file_size : ''; ?></span>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="rf-download">
                    <?php if($file_url): ?>
                    <a href="<?php echo $file_url; ?>" class="download-btn" download>
                        <span><em class="fa-sharp fa-regular fa-download"></em></span>
                    </a>
                    <?php endif; ?>
                </div>

            </div>

            <?php $i++; endforeach; wp_reset_postdata(); ?>

        </div>
    </div>
</section>


<?php 
$continued_content_three    = get_field('continued_content_three');
if(!empty($continued_content_three)){ 
?>
<section class="default-section">
    <div class="container">
        <div class="container-sm">
            <div class="default-main relative">
                <article class="default-article">
                    <?php echo $continued_content_three; ?>
                </article>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<?php
echo cta_module();
echo news_letter_section(); ?>
<?php get_footer(); ?>

<script>
jQuery(document).ready(function(){
	const $jq = jQuery.noConflict();
const lists = $jq(".lr-module-main");
lists.each(function () {
  let list = $jq(this);
  let listItems = list.children(".lr-module-grid");
  let totalList = listItems.length;
  if (listItems.length > 5) {

    listItems.slice(5).hide();
    list.after(
      `<div class="btn-text"><a href="javascript:void(0);" class="more">Show all ${totalList} Documents</a></div>`
    );
   var button = list.next(".btn-text");
    button.on("click", function (e) {
        e.preventDefault();
      listItems.slice(5).fadeToggle("fast");
		
      $jq(this).toggleClass("expanded");
      $jq(this).text("");
      //   jQuery(this).text(
      //     jQuery(this).text() == "Read More" ? "Read Less" : "Read More"
      //   );
    });
  }
});
	// next code later some common class for now let it
const reglists = $jq(".regulatory-filings-main");
reglists.each(function () {
  let reglist = $jq(this);
  let reglistItems = reglist.children(".regulatory-filings-grid");
  let totalRegList = reglistItems.length;
  if (reglistItems.length > 6) {

    reglistItems.slice(6).hide();
    reglist.after(
      `<div class="btn-text"><a href="javascript:void(0);" class="more">Show all ${totalRegList} Documents</a></div>`
    );
   var button = reglist.next(".btn-text");
    button.on("click", function (e) {
        e.preventDefault();
      reglistItems.slice(6).fadeToggle("fast");
		
      $jq(this).toggleClass("expanded");
      $jq(this).text("");
      //   jQuery(this).text(
      //     jQuery(this).text() == "Read More" ? "Read Less" : "Read More"
      //   );
    });
  }
});
});
</script>
