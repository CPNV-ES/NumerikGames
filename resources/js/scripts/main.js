// After the page is loaded
$(window).bind('load', function() {

    // ------------- VARIABLES ------------- //
    var prosesProjector1 = $('.background');
    var prosesProjector2 = $('.col-md-6');
    var totalSlideNumber = prosesProjector1.length; // Number of slides projector 1
    var totalSlideNumber2 = prosesProjector2.length; // Number of slides projector 2
    var slideDurationSetting = 30000; // Amount of time for which a slide is "locked"
    var speedSlides = 3000; // Speed animation between slides
    var isoff = true; // Check switch button for syllable counting, true by default
    var isoffHelper = true; // Check switch button for words helper, true by default
    var xhr = null;



    // Switch for syllable counting
    $('#switch-container').click(function(){
        $('.sw').toggleClass('sw-deactivated');
        $('#sw-check').trigger('click');


        if(isoff){
        $('#switch-selector').animate({
            opacity: 0.8,
            left: "+=44px"
        },100);

        $('#count-syllable').removeClass('d-none').addClass('d-block');

        // Will count the syllable at every change in the input
        $("#verse").on('input', function(){
            var verse = $(this).val();
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Ajay request for syllable counting
            xhr = $.ajax({
                url : "../ajaxRequestPostVerse",
                type : "POST",
                data : {'verse' : verse},
                dataType : "json",
                success : function(response){

                    if (response.success && !isoff)
                    {
                        $('.form-group span').html(response.data);
                        if(response.data >= 10 && response.data < 15) {
                            $('#verse').css("border", "3px solid #3CBC8D")
                        }
                        else if (response.data >= 15 && response.data < 20) {
                            $('#verse').css("border", "3px solid #e8f442")
                        }
                        else if (response.data >= 20 && response.data < 25){
                            $('#verse').css("border", "3px solid #f4ac41")
                        }
                        else if (response.data >= 25) {
                            $('#verse').css("border", "3px solid #f44941")
                        }
                        else {
                            $('#verse').css("border", "")
                        }
                    }
                },
                error : function(textStatus) {
                    console.log("Request failed : " + textStatus);
                },
                beforeSend: function () {
                    if (isoff) {
                        xhr.onreadystatechange === null;
                    }
                }
            });
        });

            isoff = false;
        }
        else
        {
            $('#count-syllable').removeClass('d-block').addClass('d-none');
            $('#verse').css("border", "")

        $('#switch-selector').animate({
            opacity: 1,
            left: "-=44px"
        },100);
            $('.container').animate({
            backgroundColor: '#222'
        }, 400);
            isoff = true;
        }

    });


    $('#unactive').css('display', 'none');
    $('#helpers-words').css('display', 'none') // Hide helper words

    $('input').on('click',function () {
        if ($('input').is(':checked')) {
            $('#unactive').css('display', 'inline-block');
        } else {
            $('#unactive').css('display', 'none');
        }
    });

    if($("#projectors-index").length > 0) {
        // Calls the function only for the projectors page
        if (totalSlideNumber != 0) {
            projectorsLoop();
        }
        setInterval(projectorsLoop, totalSlideNumber * slideDurationSetting * 3);
    }

    // Function that move the proses and verses from bottom to top with an infinite loop
    function projectorsLoop() {
        var proseHeight = prosesProjector1.height();
        // Loop trough every prose
        prosesProjector1.each(function(index) {
            $('html').animate({scrollTop: proseHeight}, speedSlides).delay(slideDurationSetting);
            proseHeight = proseHeight + prosesProjector1.height();
            $('.content-wrapper').animate({margin: "-320px"}).delay(slideDurationSetting);

            // Check if it's the last prose (-2 is for the 0 of the begining and the first prose that is omitted from the loop)
            if (index === totalSlideNumber-2) {
                return false;
            }
        });

        // Return to the top page
        $('html').animate({scrollTop: 0}, speedSlides);

    };

    if($("#projectors2-index").length > 0) {
        // Calls the function only for the projectors page
        if (totalSlideNumber2 != 0) {
            projectorsLoop2();
        }
        setInterval(projectorsLoop2, totalSlideNumber2 * slideDurationSetting* 3);
    }
    // Seconde page
    function projectorsLoop2() {
        var proseHeight = prosesProjector2.height() + $('.col-md-12').height();
        console.log(proseHeight)
        console.log($('.col-md-12').height())
        $('html').animate({scrollTop: 0}, speedSlides);
        // Loop trough every prose
        prosesProjector2.each(function(index, element) {
            $('html').animate({scrollTop: proseHeight}, speedSlides).delay(slideDurationSetting);
            // $(element).animate({opacity: 2}, speedSlides).delay(slideDurationSetting);
            proseHeight = proseHeight + prosesProjector2.height() + $('.col-md-12').height();
            // $(element).animate({opacity: 1}, speedSlides).delay(slideDurationSetting);
            console.log(index)
            // Check if it's the last prose (-2 is for the 0 of the begining and the first prose that is omitted from the loop)
            if (index === totalSlideNumber2-2) {
                return false;
            }
        });
        // Return to the top page
        $('html').animate({scrollTop: 0}, speedSlides);
    }

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

    // Switch for words helper
    $('#switch-container2').click(function(){
        $('.sw').toggleClass('sw-deactivated2');
        $('#sw-check2').trigger('click');


        if(isoffHelper){
            $('#switch-selector2').animate({
                opacity: 0.8,
                left: "+=44px"
            },100);
            isoffHelper = false;

            $('#helpers-words').css('display', 'flex')
            $('#helpers-words').addClass('fadeIn')
        }
        else
        {
        $('#switch-selector2').animate({
            opacity: 1,
            left: "-=44px"
        },100);
            $('.container2').animate({
            backgroundColor: '#222'
        }, 400);
            isoffHelper = true;

            $('#helpers-words').removeClass('fadeIn')
            $('#helpers-words').delay(1301).css('display', 'none')
        }

});

});

