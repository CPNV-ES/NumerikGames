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

    $(".prose").fadeIn()
        .css({top:800,position:'absolute'})        
        .animate({top: div.top}, 25000)

 });