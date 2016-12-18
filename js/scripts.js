$(document).ready(function() {

    $('.menu-toggle').on('click', function() {
        var $this = $(this),
            href  = $this.attr('href'),
            $menu = $(href);

        if ( $menu.size() > 0 ) {
            $menu.slideToggle();
        }
    });

});