(function ($) {
    if ($('.carousel').length) {
        $('.carousel').carousel({
            interval: 5000 //changes the speed
        })
    }
    $('.college_image').click(function () {
        $('.college-list').toggle('slow');
    });
    $('.city').click(function () {
        $('.city-list').toggle('slow');
    });
    //$('#lstFruits').multiselect();
    Filter.init();
    Favourites.init();
    Favourites._showMyFavourites();
})(jQuery);