(function () {
  const $jq = jQuery.noConflict();
  $jq(document).ready(function () {
    // ---------- OPEN TAB FUNCTION ----------
    function openTab(tabName) {
      if (!tabName) return;
      $jq("nav.tab-nav > li > a").attr("aria-selected", "false");
      $jq(`nav.tab-nav > li > a[href="#${tabName}"]`).attr("aria-selected", "true" );
      $jq(".tab-pane-container section.panel").stop(true, true).hide();
      $jq(`.tab-pane-container section[id="${tabName}"]`) .stop(true, true) .fadeIn(400);
    }
    // ---------- TAB CLICK ----------
    $jq("nav.tab-nav > li > a").on("click", function (e) {
      e.preventDefault();
      const href = $jq(this).attr("href");
      if (!href || !href.startsWith("#")) return;
      const tabName = href.slice(1);
      // update URL without jump
      history.pushState(null, null, `#${tabName}`);
      openTab(tabName);
    });
    // ---------- OPEN TAB ON PAGE LOAD / REFRESH ----------
      setTimeout(() => {
        const hash = window.location.hash;
        if (hash) {
          const tabName = hash.substring(1);
          if ($jq(`.tab-pane-container section[id="${tabName}"]`).length) {
            openTab(tabName);
            let newText = $jq(`nav.tab-nav > li > a[href="#${tabName}"]` ).text();
            $jq(".contact-filter-dropdown span:first").text(newText);
          }
        } else {
          const firstTab = $jq("nav.tab-nav > li > a") .first() .attr("href") ?.slice(1);
          openTab(firstTab);
        }
      }, 1000);
    
    // ---------- MOBILE DROPDOWN ----------
    if ($jq(window).width() <= 767) {
      $jq(".contact-filter-dropdown").on("click", function (event) {
        event.preventDefault();
        $jq(this).toggleClass("open");
        $jq("nav.tab-nav").slideToggle(500);
      });
      $jq("nav.tab-nav > li a").on("click", function () {
        $jq("nav.tab-nav").slideUp(500);
        $jq(".contact-filter-dropdown").removeClass("open");
        let newText = jQuery(this).find(".tab-name").text();
        // Update the dropdown's first span text
        $jq(".contact-filter-dropdown span:first").text(newText);
        // Optionally handle active state
        $jq("nav.tab-nav > li a").removeClass("active");
        $jq(this).addClass("active");
      });
    }
  });
})();