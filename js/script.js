/**
 * Created by Alexg78bis on 22/11/2017.
 */
$(window).scroll(function() {

    var scroll = $(window).scrollTop();

    if (scroll >= 150) {
        $(".navbar").addClass("shadow");
    } else {
        $(".navbar").removeClass("shadow");
    }
});