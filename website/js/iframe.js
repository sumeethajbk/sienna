jQuery(document).ready(function () {
  if (jQuery('[data-vbg]').length < 0) return;
  jQuery('[data-vbg]').youtube_background();
    
jQuery('.slide-bg-wrapper').each(function () {
        var $wrapper = jQuery(this);
        var $iframe = $wrapper.find('iframe');
        var $picture = $wrapper.find('picture');

        if ($iframe.length && $picture.length) {
            $iframe.on('load', function () {
                $picture.fadeOut();
            });
        }
    });
});

