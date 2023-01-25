
$(document).ready(function() {
    $('.comments-wrap').click(function() {

        // if ($('.new-comment > input[name="username"]').hasClass('new-comment-username')) {
        //     // alert(1)
        //     // $('.new-comment > input[name="username"]').removeClass('new-comment-username')
        // }
        // if ($('.new-comment > textarea').hasClass('new-comment-textarea')) {
        //     // $('.new-comment > textarea').removeClass('new-comment-textarea');
        // }

    })
    $('.social-links__link').mouseenter(function() {
        $(this).find('svg').eq(0).attr('fill', '#000');
    })
    $('.social-links__link').mouseleave(function() {
        $(this).find('svg').eq(0).attr('fill', '#fff');
    })

    $('.comment-interaction-like > svg').click(function() {
        var comment_id = $(this).parents(1).siblings('input[name="id"]').eq(0).val();
        var _token = $('meta[name="csrf-token"]').attr('content');
        var interaction_name = $(this).siblings('input[name="interaction_name"]').val();

        $.post( "/post/comment/increase", {id: comment_id, _token: _token, interaction_name:interaction_name}, function( data ) {
            updateInteractionValues(comment_id, data);
        });
    })

    $('.comment-interaction-dislike > svg').click(function() {
        var comment_id = $(this).parents(1).siblings('input[name="id"]').eq(0).val();
        var _token = $('meta[name="csrf-token"]').attr('content');
        var interaction_name = $(this).siblings('input[name="interaction_name"]').val();

        $.post( "/post/comment/decrease", {id: comment_id, _token: _token, interaction_name:interaction_name}, function(data ) {
            updateInteractionValues(comment_id, data);
        });
    })

})

$(document).ready(function () {
    $(function () {
        var mySwiper = new Swiper('.swiper', {
            slidesPerView: 1,
            slidesPerView: 'auto',
            loop: true,
            speed: 700,
            autoplay: {
                delay: 2000,
            },
        });
    })

});
function updateInteractionValues(comment_id, data) {

    $('input[data_id="id_' + comment_id + '"]')
        .siblings('.comment-interaction-likes-dislikes')
        .find('.comment-interaction-like > span').html(data['total_likes']);
    $('input[data_id="id_' + comment_id + '"]')
        .siblings('.comment-interaction-likes-dislikes')
        .find('.comment-interaction-dislike > span').html(data['total_dislikes']);
}
