jQuery(document).ready(function($) {
    $("#carousel").Cloud9Carousel({
        buttonLeft: $("#buttons > .left"),
        buttonRight: $("#buttons > .right"),
        autoPlay: 1,
        speed: 5,
        autoPlayDelay: 3000,
        frontItemClass: 'front',
        bringToFront: true,
        mirror: {
            gap: 12,
            height: 0.2,
            opacity: 0.4
        }
    });
    var intervalId = window.setInterval(function(){
  				$('.title').html($('.front > img').attr('title'));	
			}, 150);
    $('#carousel img').on('swipeleft', { no: 1 }, eventHandler);
    $('#carousel img').on('swiperight', { no: -1 }, eventHandler);
    function eventHandler(event) {
        $('#carousel').data("carousel").go(event.data.no);
    }
});
