$(document).ready(function() {

    $('.menu-toggle').on('click', function(e) {
        e.preventDefault();

        var $this = $(this),
            href  = $this.attr('href'),
            $menu = $(href);

        if ( $menu.length > 0 ) {
            $menu.slideToggle();
        }
    });

});
