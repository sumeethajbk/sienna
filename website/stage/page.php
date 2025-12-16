<?php get_header();

$bnr_desktop_image   = get_field('banner_desktop_image');
$bnr_mobile_image    = get_field('banner_mobile_image');
$bnr_mobile_image    = $bnr_mobile_image ? $bnr_mobile_image : $bnr_desktop_image;
$bnr_sub_heading     = get_field('banner_sub_heading');
$bnr_heading         = get_field('banner_heading');
$bnr_heading         = $bnr_heading  ? $bnr_heading  : get_the_title();
$bnr_description     = get_field('banner_description');
$bnr_button_text     = get_field('banner_button_text');
$bnr_button_link     = get_field('banner_button_link');
$bnr_link_text       = get_field('banner_link_text');
$bnr_link            = get_field('banner_link');

if (
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

        <?php if ($bnr_desktop_image || $bnr_mobile_image) { ?>
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

short_intro_section();

$preheader_type              = get_field('optional_preheader_image_or_video');
$preheader_image             = get_field('optional_preheader_image');
$preheader_poster            = get_field('optional_preheader_poster_image');
$preheader_video_platform    = get_field('optional_preheader_video_platform');
$preheader_youtube_id        = get_field('optional_preheader_youtube_id');
$preheader_vimeo_id          = get_field('optional_preheader_vimeo_id');

$preheader_sub_heading       = get_field('optional_preheader_sub_heading');
$preheader_heading           = get_field('optional_preheader_heading');
$preheader_main_description  = get_field('optional_preheader_main_description');
$preheader_description       = get_field('optional_preheader_description');

if (
  $preheader_image ||
  $preheader_poster ||
  $preheader_youtube_id ||
  $preheader_vimeo_id ||
  $preheader_sub_heading ||
  $preheader_heading ||
  $preheader_main_description ||
  $preheader_description
) {
?>
  <section class="fcam-module">
    <div class="container">
      <section class="secwrapper flex">

        <?php if ($preheader_sub_heading || $preheader_heading || $preheader_main_description) { ?>
          <section class="section-intro">

            <?php if ($preheader_sub_heading) { ?>
              <span class="optional-text"><?php echo $preheader_sub_heading; ?></span>
            <?php }

            if ($preheader_heading) { ?>
              <div class="h1"><?php echo $preheader_heading; ?></div>
            <?php }

            if ($preheader_main_description) { ?>
              <div class="h4"><?php echo $preheader_main_description; ?></div>
            <?php } ?>

          </section>
        <?php } ?>

        <div class="fcam-wrap flex">

          <?php if ($preheader_type == 'image' || $preheader_type == 'video') { ?>
            <div class="fcam-thumb">

              <?php if ($preheader_type == 'image' && $preheader_image) { ?>
                <div class="video-thumbnail pos-relative">
                  <img src="<?php echo $preheader_image['url']; ?>" alt="">
                </div>
              <?php } ?>

              <?php if ($preheader_type == 'video') { ?>
                <div class="video-thumbnail pos-relative">

                  <?php if ($preheader_poster) { ?>
                    <img src="<?php echo $preheader_poster['url']; ?>" alt="">
                  <?php } ?>

                  <div class="play-btn-main flex flex-center">

                    <?php
                    // YOUTUBE
                    if ($preheader_video_platform == 'youtube' && $preheader_youtube_id) {
                      $youtube_url = "https://www.youtube.com/embed/" . $preheader_youtube_id;
                    ?>
                      <a class="play-btn popup-youtube flex flex-center" data-type="youtube" href="<?php echo $youtube_url; ?>">
                        <span class="play-btn-wrap"><img src="<?php echo get_template_directory_uri(); ?>/images/play.svg" alt=""></span>
                      </a>
                    <?php }

                    // VIMEO
                    if ($preheader_video_platform == 'vimeo' && $preheader_vimeo_id) {
                      $vimeo_url = "https://player.vimeo.com/video/" . $preheader_vimeo_id;
                    ?>
                      <a class="play-btn popup-vimeo flex flex-center" data-type="vimeo" href="<?php echo $vimeo_url; ?>">
                        <span class="play-btn-wrap"><img src="<?php echo get_template_directory_uri(); ?>/images/play.svg" alt=""></span>
                      </a>
                    <?php } ?>

                  </div>

                  <div class="shadow tp-rt pos-absolute"></div>
                </div>
              <?php } ?>

            </div>
          <?php }

          if ($preheader_description) { ?>
            <div class="fcam-txt">
              <?php echo $preheader_description; ?>
            </div>
          <?php } ?>

        </div>
      </section>
    </div>
  </section>
<?php }

short_sidebar();

repeater_cta();

$statistics_sub_heading   = get_field('statistics_sub_heading');
$statistics_heading       = get_field('statistics_heading');
$statistics_description   = get_field('statistics_description');

$statistics_repeater      = get_field('statistics_repeater');

if (!empty($statistics_sub_heading) || !empty($statistics_heading) || !empty($statistics_description) || !empty($statistics_repeater)) {
?>

  <section class="intro-module stats-module">
    <div class="container">
      <section class="secwrapper flex">

        <?php if (!empty($statistics_sub_heading) || !empty($statistics_heading) || !empty($statistics_description)) { ?>
          <section class="section-intro">

            <?php if (!empty($statistics_sub_heading)) { ?>
              <span class="optional-text"><?php echo $statistics_sub_heading; ?></span>
            <?php } ?>

            <?php if (!empty($statistics_heading)) { ?>
              <div class="h1"><?php echo $statistics_heading; ?></div>
            <?php } ?>

            <?php if (!empty($statistics_description)) { ?>
              <div class="h4"><?php echo $statistics_description; ?></div>
            <?php } ?>

          </section>
        <?php } ?>

        <?php if (!empty($statistics_repeater)) { ?>
          <div class="stats-wrap flex" data-counter-main="counter-main">

            <?php foreach ($statistics_repeater as $stat_item) {

              $before_number = $stat_item['before_number'];
              $number        = $stat_item['number'];
              $after_number  = $stat_item['after_number'];

              $stat_heading  = $stat_item['heading'];
              $stat_desc     = $stat_item['description'];
              $stat_link_txt = $stat_item['link_text'];
              $stat_link     = $stat_item['link']; ?>

              <div class="stats-grid">

                <?php if (!empty($before_number) || !empty($number) || !empty($after_number)) { ?>
                  <div class="number">

                    <?php if (!empty($before_number)) { ?>
                      <span class="counter-text"><?php echo $before_number; ?></span>
                    <?php } ?>

                    <?php if (!empty($number)) { ?>
                      <span class="counter" data-duration="3000" data-count-to="<?php echo $number; ?>">
                        <?php echo $number; ?>
                      </span>
                    <?php } ?>

                    <?php if (!empty($after_number)) { ?>
                      <span class="counter-text"><?php echo $after_number; ?></span>
                    <?php } ?>

                  </div>
                <?php } ?>

                <?php if (!empty($stat_heading)) { ?>
                  <div class="h6"><?php echo $stat_heading; ?></div>
                <?php } ?>

                <?php if (!empty($stat_desc)) { ?>
                  <?php echo $stat_desc; ?>
                <?php } ?>

                <?php if (!empty($stat_link_txt) && !empty($stat_link)) { ?>
                  <a href="<?php echo $stat_link; ?>" class="readmore"><?php echo $stat_link_txt; ?></a>
                <?php } ?>

              </div>
            <?php } ?>
          </div>
        <?php } ?>
      </section>
    </div>
  </section>

<?php }

$aff_sec_sub_heading    = get_field('affiliations_section_sub_heading');
$aff_sec_heading        = get_field('affiliations_section_heading');
$aff_sec_description    = get_field('affiliations_section_description');

$aff_sec_features       = get_field('affiliations_section_features');

if (!empty($aff_sec_sub_heading) || !empty($aff_sec_heading) || !empty($aff_sec_description) || !empty($aff_sec_features)) {
?>

  <section class="affiliates-module">
    <div class="container">
      <section class="secwrapper flex">

        <?php if (!empty($aff_sec_sub_heading) || !empty($aff_sec_heading) || !empty($aff_sec_description)) { ?>
          <section class="section-intro">

            <?php if (!empty($aff_sec_sub_heading)) { ?>
              <span class="optional-text"><?php echo $aff_sec_sub_heading; ?></span>
            <?php } ?>

            <?php if (!empty($aff_sec_heading)) { ?>
              <div class="h1"><?php echo $aff_sec_heading; ?></div>
            <?php } ?>

            <?php if (!empty($aff_sec_description)) { ?>
              <div class="h4"><?php echo $aff_sec_description; ?></div>
            <?php } ?>

          </section>
        <?php } ?>

        <?php if (!empty($aff_sec_features)) { ?>
          <div class="aff-mod-wrap flex">

            <?php foreach ($aff_sec_features as $aff_item) {

              $aff_logo = $aff_item['affiliations_section_features_logo'];
              $aff_desc = $aff_item['affiliations_section_features_description'];
              $aff_link = $aff_item['affiliations_section_features_link'];

              if (empty($aff_logo) && empty($aff_desc) && empty($aff_link)) {
                continue;
              }
            ?>

              <div class="aff-grid">

                <?php if (!empty($aff_logo)) { ?>
                  <div class="aff-thumb">
                    <figure>
                      <img src="<?php echo $aff_logo['url']; ?>" alt="<?php echo $aff_logo['alt']; ?>" title="<?php echo $aff_logo['title']; ?>">
                    </figure>
                  </div>
                <?php } ?>

                <?php if (!empty($aff_desc)) { ?>
                  <?php echo $aff_desc; ?>
                <?php } ?>

                <?php if (!empty($aff_link)) { ?>
                  <a href="<?php echo $aff_link; ?>" class="circle-arrow-btn flex flex-vcenter">
                    <span class="fa-sharp fa-regular fa-arrow-right-long"></span>
                    <span class="location-btn-text">
                      About this partner
                    </span>
                  </a>
                <?php } ?>
              </div>
            <?php } ?>
          </div>
        <?php } ?>
      </section>
    </div>
  </section>
<?php }

$opt_cta_image        = get_field('optional_cta_image');
$opt_cta_heading      = get_field('optional_cta_heading');
$opt_cta_description  = get_field('optional_cta_description');
$opt_cta_btn_text     = get_field('optional_cta_button_text');
$opt_cta_btn_link     = get_field('optional_cta_button_link');
$opt_cta_link_text    = get_field('optional_cta_link_text');
$opt_cta_link         = get_field('optional_cta_link');

if (
  !empty($opt_cta_image) ||
  !empty($opt_cta_heading) ||
  !empty($opt_cta_description) ||
  !empty($opt_cta_btn_text) ||
  !empty($opt_cta_btn_link) ||
  !empty($opt_cta_link_text) ||
  !empty($opt_cta_link)
) {
?>

  <section class="optional-cta-module pos-relative">
    <div class="container-lg">
      <div class="optional-cta-main flex">

        <?php if (!empty($opt_cta_heading) || !empty($opt_cta_description) || !empty($opt_cta_btn_text) || !empty($opt_cta_link_text)) { ?>
          <div class="optional-cta-text">

            <?php if (!empty($opt_cta_heading)) { ?>
              <div class="h1">
                <?php echo $opt_cta_heading; ?>
              </div>
            <?php } ?>

            <?php if (!empty($opt_cta_description)) { ?>

              <?php echo $opt_cta_description; ?>

            <?php } ?>

            <?php if (!empty($opt_cta_btn_text) || !empty($opt_cta_link_text)) { ?>
              <div class="btn-wrap">

                <?php if (!empty($opt_cta_btn_text) && !empty($opt_cta_btn_link)) { ?>
                  <a href="<?php echo $opt_cta_btn_link; ?>" class="button">
                    <?php echo $opt_cta_btn_text; ?>
                  </a>
                <?php } ?>

                <?php if (!empty($opt_cta_link_text) && !empty($opt_cta_link)) { ?>
                  <a href="<?php echo $opt_cta_link; ?>" class="readmore">
                    <?php echo $opt_cta_link_text; ?>
                  </a>
                <?php } ?>

              </div>
            <?php } ?>

          </div>
        <?php } ?>

        <?php if (!empty($opt_cta_image)) { ?>
          <div class="optional-cta-thumb">
            <figure class="object-fit">
              <img src="<?php echo $opt_cta_image['url']; ?>" alt="<?php echo $opt_cta_image['alt']; ?>" title="<?php echo $opt_cta_image['title']; ?>" />
            </figure>
          </div>
        <?php } ?>

      </div>
    </div>
  </section>

<?php }

$osl_heading = get_field('optional_sidebar_links_heading');
$osl_links   = get_field('optional_sidebar_links');

$sb_cta_heading     = get_field('sidebar_cta_heading');
$sb_cta_description = get_field('sidebar_cta_description');
$sb_cta_btn_text    = get_field('sidebar_cta_button_text');
$sb_cta_btn_link    = get_field('sidebar_cta_button_link');

$has_optional_links =
  (!empty($osl_heading)) ||
  (!empty($osl_links));

$has_sidebar_cta =
  (!empty($sb_cta_heading)) ||
  (!empty($sb_cta_description)) ||
  (!empty($sb_cta_btn_text) && !empty($sb_cta_btn_link));

if (have_posts() || $has_optional_links || $has_sidebar_cta) {
?>

  <section class="default-section">
    <div class="container">
      <div class="default-main flex relative">

        <article class="default-article">
          <?php
          while (have_posts()) {
            the_post();
            the_content();
          }
          wp_reset_postdata();
          ?>

          <div class="fixed-social-icons">
            <div class="sharethis-inline-share-buttons"></div>
            <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6846d45d7c84420012f17c7d&product=sop" async="async"></script>
          </div>
        </article>

        <?php if ($has_optional_links || $has_sidebar_cta) { ?>
          <aside class="default-aside">
            <div class="asidebar-nav">

              <?php if ($has_optional_links) { ?>
                  <?php if (!empty($osl_heading)) { ?>
                    <div class="h5"><?php echo $osl_heading; ?></div>
                    <hr>
                  <?php } ?>

                  <?php if (!empty($osl_links)) { ?>
                    <ul class="aside-links heading-font">
                      <?php foreach ($osl_links as $osl_item) {
                        $osl_text = $osl_item['link_text'];
                        $osl_url  = $osl_item['link'];

                        if (!empty($osl_text) && !empty($osl_url)) { ?>
                          <li>
                            <a href="<?php echo $osl_url; ?>" class="readmore">
                              <?php echo $osl_text; ?>
                            </a>
                          </li>
                      <?php }
                      } ?>
                    </ul>
                  <?php } ?>
              <?php } ?>


              <?php if ($has_sidebar_cta) { ?>
                <div class="aside-block heading-font fs-16 lh-24">

                  <?php if (!empty($sb_cta_heading)) { ?>
                    <h5><?php echo $sb_cta_heading; ?></h5>
                  <?php } ?>

                  <?php if (!empty($sb_cta_description)) { ?>
                    <?php echo $sb_cta_description; ?>
                  <?php } ?>

                  <?php if (!empty($sb_cta_btn_text) && !empty($sb_cta_btn_link)) { ?>
                    <a href="<?php echo $sb_cta_btn_link; ?>" class="button flex flex-center w-fit">
                      <?php echo $sb_cta_btn_text; ?>
                    </a>
                  <?php } ?>

                </div>
              <?php } ?>

            </div>
          </aside>
        <?php } ?>

      </div>
    </div>
  </section>

<?php } ?>


<?php

family_resources();

cta_module();

news_letter_section();

get_footer(); ?>