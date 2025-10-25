jQuery(function ($) {
    var page = 1;
    var canLoad = true;

        function getUrlParameter(name) {
        let param = new URLSearchParams(window.location.search);
        return param.get(name) || 'all';
    }

    $('#cat-load-more .button').on('click', function () {
        if (!canLoad) return;

        canLoad = false;
        page++;

      
    var category = getUrlParameter('cat');

        var data = {
            action: 'load_more_blog_cards',
            page: page,
            category: category 
        };

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    if (response.data.data !== '') {
                        $('#blog_list').append(response.data.data);
                        canLoad = true;
                    }
                    if (page >= response.data.totalpages) {
                        $('#cat-load-more').hide();
                    }
                }
            },
            error: function () {
                canLoad = true;
            }
        });
    });
});
