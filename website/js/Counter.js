 /*let $counter_elements = jQuery("[data-counter-main]");
 let $cwindow = jQuery(window);
 let animation_started = false;

 function check_if_view() {
   let window_height = $cwindow.height()
   let window_top_position = $cwindow.scrollTop();
   let window_bottom_position = window_top_position + window_height;

   $counter_elements.each(function() {
     let $element = jQuery(this);
     let element_height = $element.outerHeight();
     let element_top_position = $element.offset().top;
     let element_bottom_position = element_top_position + element_height;

     if (
       (element_bottom_position >= window_top_position) &&
       (element_top_position <= window_bottom_position) &&
       !animation_started
     ) {
       animation_started = true;

       $element.find(".counter").each(function() {
         let $this = jQuery(this);
         let countTo = parseInt($this.attr("data-count-to"));
         let countDuration = parseInt($this.attr("data-duration"));

         jQuery({ counter: 0.0 }).animate(
           {
             counter: countTo
           },
           {
             duration: countDuration,
             easing: "linear",
             step: function() {
               $this.text(Math.floor(this.counter));
             },
             complete: function() {
               $this.text(this.counter);
             }
           }
         );
       });
     }
   });
 }
 $cwindow.on("scroll load", check_if_view);
 $cwindow.trigger("scroll load");
*/
let $counter_elements = jQuery("[data-counter-main]");
let $cwindow = jQuery(window);
let animation_started = false;

function check_if_view() {
  let window_height = $cwindow.height();
  let window_top_position = $cwindow.scrollTop();
  let window_bottom_position = window_top_position + window_height;

  $counter_elements.each(function() {
    let $element = jQuery(this);
    let element_height = $element.outerHeight();
    let element_top_position = $element.offset().top;
    let element_bottom_position = element_top_position + element_height;

    if (
      (element_bottom_position >= window_top_position) &&
      (element_top_position <= window_bottom_position) &&
      !animation_started
    ) {
      animation_started = true;

      $element.find(".counter").each(function() {
        let $this = jQuery(this);
        let countFrom = 0; // Start from 0
        let countTo = parseFloat($this.attr("data-count-to")); // Get the exact number from data-count-to
        let countDuration = parseInt($this.attr("data-duration"));

        jQuery({ counter: countFrom }).animate(
          {
            counter: countTo
          },
          {
            duration: countDuration,
            easing: "linear",
            step: function() {
              // Directly update the counter to maintain original formatting
              $this.text(this.counter.toFixed($this.attr("data-count-to").split(".")[1]?.length || 0));
            },
            complete: function() {
              // Ensure the final value matches data-count-to, preserving any trailing zeros
              $this.text($this.attr("data-count-to"));
            }
          }
        );
      });
    }
  });
}

$cwindow.on("scroll load", check_if_view);
$cwindow.trigger("scroll load");





//let $counter_elements = jQuery("[data-counter-main]");
//let $cwindow = jQuery(window);
//let animation_started = false;
//
//function check_if_view() {
//  let window_height = $cwindow.height();
//  let window_top_position = $cwindow.scrollTop();
//  let window_bottom_position = window_top_position + window_height;
//
//  $counter_elements.each(function() {
//    let $element = jQuery(this);
//    let element_height = $element.outerHeight();
//    let element_top_position = $element.offset().top;
//    let element_bottom_position = element_top_position + element_height;
//
//    if (
//      (element_bottom_position >= window_top_position) &&
//      (element_top_position <= window_bottom_position) &&
//      !animation_started
//    ) {
//      animation_started = true;
//
//      $element.find(".counter").each(function() {
//        let $this = jQuery(this);
//        let countTo = parseFloat($this.attr("data-count-to")); // Parse as float
//        let countDuration = parseInt($this.attr("data-duration"));
//        
//        // Calculate increment step based on duration and desired frame rate
//        let frameRate = 60; // You can adjust this for smoother animations
//        let increment = countTo / (countDuration / (1000 / frameRate));
//
//        jQuery({ counter: 0.0 }).animate(
//          {
//            counter: countTo
//          },
//          {
//            duration: countDuration,
//            easing: "linear",
//            step: function() {
//              // Update the counter using the increment value
//              $this.text((this.counter).toFixed(1)); // Display one decimal place
//            },
//            complete: function() {
//              $this.text(this.counter.toFixed(1)); // Final value with one decimal
//            }
//          }
//        );
//      });
//    }
//  });
//}
//
//$cwindow.on("scroll load", check_if_view);
//$cwindow.trigger("scroll load");
