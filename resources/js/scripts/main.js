$(document).ready(function(){

    $('#unactive').css('display', 'none');


    $('input').on('click',function () {
        if ($('input').is(':checked')) {
            $('#unactive').css('display', 'inline-block');
        } else {
            $('#unactive').css('display', 'none');
        }
    });

    var body = $("body").offset();
    var div = $('.container').offset();
    var h_prose = $('.prose').height();

    console.log(h_prose);

    $(".prose").fadeIn()
        .css({top:950,position:'fixed'})        
        .animate({bottom: -3998.03}, 55000)

 });