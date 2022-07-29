/* ADD TO FAVORITES (Movie) */
'use strict';

$(document).ready(function($){
    $('.article__favorites').on('click', function(e){
        e.preventDefault();
        var itemId = $(this).data('item');
        var $post = $(this);
        $.ajax({
            url: './../public/movie/addToFav.php',
            type: 'post',
            data: {'favmovie': 1, item: itemId },
            success: function(response){
                $post.addClass('article__favorited hidden');
                $post.siblings().removeClass('hidden');
            },
        });
    });

    $('.article__favorited').on('click', function(){
        var itemId = $(this).data('item');
        $post = $(this);
        $.ajax({
            url: './../public/movie/addToFav.php',
            type: 'post',
            data: {
                'unfavmovie': 1,
                'item': itemId
            },
            success: function(response){
                $post.addClass('hidden article__favorites');
                $post.siblings().removeClass('hidden');
            }
        });
    });
});