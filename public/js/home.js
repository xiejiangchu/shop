(function($) {
    $.getUrlParam = function(name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);
        if (r != null)
            return unescape(r[2]);
        return 1;
    }
})(jQuery);

$(document).ready(function($) {

    var current = $.getUrlParam('page');

    var loading = false;
    var canLoad = true;
    var url = window.location.href;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document.body).infinite().on("infinite", function() {
        if (!canLoad) {
            return;
        }
        if (loading)
            return;
        loading = true;
        $('#loading').show();
        current = current + 1;
        $.post(url + '?page=' + current, {}, function(data, textStatus, xhr) {
            if ($(data).attr("value") == 'none') {
                canLoad = false;
            } else {
                $data = $(data);
                $('.right').append($data);
            }
            loading = false;
            $('#loading').hide();
        });
    });

    var width = $('body').width();
    $('.category').scrollLeft($('.category_item_active').offset().left - width / 2);

    $(".swiper-container").swiper({
        loop: true,
        autoplay: 3000
    });

    $(document).on('click', '.shopping-cart', function() {
        $('.shopping-cart-detail').toggle();
    });


    $(document).on('click', '.cart_add', function(event) {
        event.preventDefault();
        var gid = $(event.target).attr('gid');
        var before = parseInt($('#goods_' + gid).text());
        before++;
        $.ajax({
                url: '/cart/add',
                type: 'post',
                dataType: 'json',
                data: { 'gid': gid, 'amount': before }
            })
            .done(function(data) {
                $('#goods_' + $(event.target).attr('gid')).text(data.amount);
            })
            .fail(function(e) {
                $.toast(e.responseJSON.error, "forbidden");
            });
    });
    $(document).on('click', '.cart_sub', function(event) {
        event.preventDefault();
        var gid = $(event.target).attr('gid');
        var before = parseInt($('#goods_' + gid).text());
        if (before > 0) {
            before--;
            $.ajax({
                    url: '/cart/sub',
                    type: 'post',
                    dataType: 'json',
                    data: { 'gid': gid, 'amount': before },
                })
                .done(function(data) {
                    $('#goods_' + $(event.target).attr('gid')).text(data.amount);
                })
                .fail(function(e) {
                     $.toast(xhr.responseJSON.error, "forbidden");
                });
        }

    });

   
    
});
