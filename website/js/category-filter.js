jQuery(function ($) {

    function getUrlParameter(name) {
        let param = new URLSearchParams(window.location.search);
        return param.get(name) || 'all';
    }

    let selectedCategory = getUrlParameter('cat');

    $('#category-list li').each(function () {
        const link = $(this).find('a');
        if (link.data('category') === selectedCategory) {
            $('#category-list li').removeClass('active');
            $(this).addClass('active');
        }
    });

    loadCategoryPosts(selectedCategory);

    $(document).on('click', '#category-list a', function (e) {
        e.preventDefault();
        const catSlug = $(this).data('category');

        if (catSlug === 'all') {
            window.location.href = '/blog/';
            return;
        }

        const newUrl = `${window.location.pathname}?cat=${catSlug}`;
        window.history.pushState(null, '', newUrl);

        $('#category-list li').removeClass('active');
        $(this).parent().addClass('active');

        loadCategoryPosts(catSlug);
    });

    function loadCategoryPosts(category) {
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'load_filtered_blog_posts',
                category: category
            },
            beforeSend: function () {
                $('#blog_list').html('<p>Loading...</p>');
            },
            success: function (response) {

                if (response.success) {
                    let $posts = $(response.data.data); 
                    let postCount = $posts.filter('.blog-list-grid').length;

                    console.log("Post count:", postCount);
                    $('#blog_list').html($posts);

                    if (postCount >= 12) {
                        $('#cat-load-more').show();
                    } else {
                        $('#cat-load-more').hide();
                    }
                }
            }
        });
    }
});
