$(document).ready(function(){

    $('#unactive').css('display', 'none');


    $('input').on('click',function () {
        if ($('input').is(':checked')) {
            $('#unactive').css('display', 'inline-block');
        } else {
            $('#unactive').css('display', 'none');
        }
    });
    
    // Calls the function only for the projectors page
    if($('div').has('#projectors-index')) {
       projectorsLoop(); 
    }
    
    // Function that move the proses and verses from bottom to top with an infinite loop
    function projectorsLoop() {
        $('nav').css('z-index', 99999);
        var h_prose = $('.prose').height();
        $(".prose")
            .css({top:930,position:'fixed'})        
            .animate({top: '-'+h_prose}, 70000,
            function () {
                projectorsLoop()
            });
        }
 });