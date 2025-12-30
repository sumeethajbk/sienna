
(function () {
  jQuery(document).ready(function () {
    jQuery(".contact-tab-main").hashTabs({
      smoothScroll: {
        enabled: true,
        initialTabId: "smooth-scroller",
      },
    });
  });
}).call(this);