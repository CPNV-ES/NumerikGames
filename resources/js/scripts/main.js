$(document).ready(function(){

    $('#unactive').css('display', 'none');


    $('input').on('click',function () {
        if ($('input').is(':checked')) {
            $('#unactive').css('display', 'inline-block');
        } else {
            $('#unactive').css('display', 'none');
        }
    });

    var $body = $('body');
    var h_prose = $('.prose').height();

    var bottom = $body.position().top + $body.offset().top + $body.outerHeight(true);

    console.log(bottom);


    $(".prose").fadeIn()
        .css({top:960,position:'fixed'})        
        .animate({top: h_prose}, 70000)

 });