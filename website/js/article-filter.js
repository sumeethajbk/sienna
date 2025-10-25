jQuery(document).ready(function($) {
    $('.filterlist a').on('click', function(e) {
        e.preventDefault();
        let tagID = $(this).data('tag');

        $('.filterlist li').removeClass('active');
        $(this).parent().addClass('active');

        $.ajax({
             url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'filter_work_posts',
                tag_id: tagID
            },
            success: function(response) {
                $('.work-ex-item').html(response);
            }
        });
    });
});
