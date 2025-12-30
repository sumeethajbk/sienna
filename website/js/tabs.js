

jQuery(function() {
var $tabs = jQuery('#demoTabs .tab');


function activateTab($tab) {
    console.log('Activating tab:', $tab);
    // $tab.preventDefault();
// deactivate all
$tabs.attr('aria-selected', 'false').attr('tabindex', '-1');
// hide all panels
jQuery('[role="tabpanel"]').addClass('tab-hidden');


// activate chosen
$tab.attr('aria-selected', 'true').attr('tabindex', '0').focus();
var panelId = $tab.attr('aria-controls');
jQuery('#' + panelId).removeClass('tab-hidden');
}


// click
$tabs.on('click', function(e) {
activateTab(jQuery(this));
});


// keyboard navigation
$tabs.on('keydown', function(e) {
var $current = jQuery(this);
var idx = $tabs.index(this);
var nextIdx;


switch (e.which) {
case 37: // left arrow
case 38: // up arrow
e.preventDefault();
nextIdx = (idx - 1 + $tabs.length) % $tabs.length;
activateTab($tabs.eq(nextIdx));
break;
case 39: // right arrow
case 40: // down arrow
e.preventDefault();
nextIdx = (idx + 1) % $tabs.length;
activateTab($tabs.eq(nextIdx));
break;
case 36: // Home
e.preventDefault();
activateTab($tabs.first());
break;
case 35: // End
e.preventDefault();
activateTab($tabs.last());
break;
case 13: // Enter
case 32: // Space
e.preventDefault();
activateTab($current);
break;
}
});

// ensure initial state (in case HTML changed)
var $initial = $tabs.filter('[aria-selected="true"]').first();
if (!$initial.length) $initial = $tabs.first();
activateTab($initial);
});