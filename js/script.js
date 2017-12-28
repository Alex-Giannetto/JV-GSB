/**
 * Fonction utile pour tout le site
 * @author Alexandre Giannetto
 * @package default
 */

// Fonction pour changer l'apparance de la bar de navigation lors du scroll
$(window).scroll(function() {
    var scroll = $(window).scrollTop();

    if (scroll >= 150) {
        $(".navbar").addClass("shadow");
    } else {
        $(".navbar").removeClass("shadow");
    }
});