var jqr5 = jQuery.noConflict();
jqr5(function() {



    const currentPath = window.location.pathname;

    jqr5('.filterlist li').each(function () {
        const link = jqr5(this).find('a').attr('href');
        if (link) {
            const linkPath = new URL(link, window.location.origin).pathname;
            if (currentPath === linkPath) {
                jqr5('.filterlist li').removeClass('active');
                jqr5(this).addClass('active');
            }
        }
    });
    

// Scroll to CTA section on filter page load
if (jqr5('.blog-main').length) {
    jqr5('html, body').animate({
        scrollTop: (jqr5('.blog-main').offset().top - 104)
    }, 1000);
}



    if (jqr5("#topicblog_list").length) {
	 //e = 1,
           var t = true,
            n = false,
            r = jqr5(window),
            i = jqr5("#topicblog_list"),
            s = jqr5("#topicblog_list ul"),
            o = s.attr("data-path");
            p = s.attr("data-pageNumber");
	    if(p!=''){
		e = p;
	    } else {
		e = 1;
	    }
       console.log(p);
        if (o === undefined) {
          
            o = "<?php bloginfo('stylesheet_directory'); ?>/ajax-load-more-blog.php"
        }
        if (s.attr("data-button-text") === undefined) {
            jqr5button = "Older Posts"
        } else {
            jqr5button = s.attr("data-button-text")
        }
       
        console.log('oo',o);

        /*i.append('<div id="load-more" class="btn-center"><span class="loader"></span><div class="load-more"><span class="button">' + jqr5button + `
  <svg width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.12266 11.4123C7.4556..." fill="black"></path>
    <path d="M23.8535 9.50998L20.3655..." fill="black"></path></svg>`+"</span></div></div>");*/
    i.append(`
        </div><div id="load-more" class="btn-center">
        <div class="load-more">
            <span class="button"> ${jqr5button}</span>
        </div>
    </div>
      `);
      
        var u = function() {
            jqr5("#load-more").addClass("loading");
            jqr5("#load-more span.text").text("Loading...");
            jqr5.ajax({
                type: "GET",
                data: {
                    postType: s.attr("data-post-type"),
                    category: s.attr("data-category"),
                    term: s.attr("data-term"),
                    topic : s.attr("data-topic"),
                    author: s.attr("data-author"),
                    taxonomy: s.attr("data-taxonomy"),
                    tag: s.attr("data-tag"),
                    postNotIn: s.attr("data-post-not-in"),
                    postIn: s.attr("data-post-in"),
                    numPosts: s.attr("data-display-posts"),
                    year: s.attr("data-year"),
                    month: s.attr("data-month"),
                    searchblog: s.attr("data-searchblog"),
                    offset: s.attr("data-offset"),
                    order: s.attr("data-order"),
                    option: s.attr("data-option"),
                    postsCount: s.attr("data-postsCount"),
                    pageNumber: e,
                    pageOffset: e,
                },
                url: o + "/ajax-load-more-blog.php",
                beforeSend: function() {
                    if (e != 1) {
                        jqr5("#load-more").addClass("loading");
                        jqr5("#load-more span.text").text("Loading...")
                    }
                },
                success: function(e) { console.log("sucess")
                    jqr5data = jqr5(e);
                    if (jqr5data.length == 0) {
                        jqr5("#load-more").removeClass("loading");
                        if (jqr5(window).width() >= 600) {
                            jqr5("#load-more span.text").text("That's all!")
                        } else {
                            jqr5("#load-more span.text").text("That's all!")
                        }
                        t = false;
                        n = true
                    } else if (jqr5data.length > 0) {
                        jqr5data = jqr5(e);
                        jqr5data.hide();
                        s.append(jqr5data);
                        jqr5data.fadeIn(500, function() {
                            jqr5("#load-more").removeClass("loading");
                            jqr5("#load-more span.text").text(jqr5button);
                            t = false
                        })
                    }
                },
                error: function(e, t, n) {
                    jqr5("#load-more").removeClass("loading");
                    jqr5("#load-more span.text").text(jqr5button)
                }
            })
        };
        var remain = 0;
        var count = 0;
        var postsCount= s.attr("data-postsCount");
        if(postsCount <=12){
       jQuery("#load-more").hide(); 
          
        }
        if(postsCount == 0){ 
            jQuery("#ajax-load-more").append("<h3 class='no_result_found'>Sorry, No posts found.</h3>")
           }
        jqr5("#load-more").click(function() {
            if (!t && !n && !jqr5(this).hasClass("done")) {
                t = true;
                e++;
                u()
            }
        count +=1; 
           
          var postsCount= s.attr("data-postsCount");
          
            remain = postsCount - 12 * count;
          console.log(remain);
            if(remain <= 12){
               jQuery("#load-more").hide();
            }
        });
        u()
    }
})