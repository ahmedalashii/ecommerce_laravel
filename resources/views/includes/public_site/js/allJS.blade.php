<script src="{{ asset('public_site/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('public_site/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public_site/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('public_site/js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('public_site/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('public_site/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('public_site/js/mixitup.min.js') }}"></script>
<script src="{{ asset('public_site/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public_site/js/main.js') }}"></script>

<script>
    $(".header__menu").find('ul li a').each(function($index, $element) {
        if (window.location.href == $($element).attr('href')) {
            $($element).parents('li').addClass("active");
        } else {
            $($element).parents('li').removeClass("active");
        }
    });

    $(".shop__sidebar__price").find('ul li a').each(function($index, $element) {
        if (window.location.href == $($element).attr('href')) {
            $($element).css("color", "#111111");
        } else {
            $($element).css('color', '#b7b7b7');
        }
    });
</script>
