import { setInterval } from "timers";

// After the page is loaded
$(window).bind('load', function() {

    // ------------- VARIABLES ------------- //
    var prose = $('.background');
    var totalSlideNumber = prose.length;
    var slideDurationSetting = 5000; //Amount of time for which slide is "locked"
    var speedSlides = 5000;


    // Will count the syllable at every change in the input
    $("#verse").on('input', function(){
        var verse = $(this).val();
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
        $.ajax({
            url : "../ajaxRequestPostVerse",
            type : "POST",
            data : {'verse' : verse},
            dataType : "json",
            success : function(response){
                if (response.success)
                {
                    $('.form-group span').html(response.data);
                }
            },
            error : function(textStatus) {
                console.log("Request failed : " + textStatus);
            }
        });
    });

    $('#unactive').css('display', 'none');


    $('input').on('click',function () {
        if ($('input').is(':checked')) {
            $('#unactive').css('display', 'inline-block');
        } else {
            $('#unactive').css('display', 'none');
        }
    });

    // Calls the function only for the projectors page
    if (!totalSlideNumber) {
        projectorsLoop();
    }

    // Function that move the proses and verses from bottom to top with an infinite loop
    setInterval(function projectorsLoop() {
        // Time set for the first slide
        //setTimeout(slideDurationSetting);
        var proseHeight = prose.height();
        $('#projectors-index').each(function() {
            $('html').animate({scrollTop: proseHeight}, speedSlides).delay(slideDurationSetting);
            proseHeight = proseHeight + prose.height();
        });
        $('html').animate({scrollTop: 0}, speedSlides);

    }, totalSlideNumber * 10000);




    // Add the verse from the input to the modal if not empty
    function modalOpen() {
        var verse = $('#verse').val();
        if (!verse)
        {
            $('#error').addClass("alert alert-danger alert-block")
            $('#error strong').html("Vous n'avez pas spécifié de vers !");
        } else {
            var modal = $('#exampleModalCenter')
            modal.modal("show")
            // Hide the buttom if the verse is at 15
            if (parseInt($('.col-md-12 #verseActive:last').text()) + 1 >= $('#lastCountVerse').text()) {
                $("#continue").css("display", "none");
            }
            modal.find('.modal-body #modalVerse').text(verse)
            modal.find('.modal-body #verseModal').val(verse)
        }
    }

    // Trigger modal on Enter
    $("#verse").keypress(function (event) {
        if (event.which == 13) {
            event.preventDefault
            modalOpen()
        }
    })


    // Trigger modal on button click
    $('#addVerse').on('click', function () {
        modalOpen()
    })
});


