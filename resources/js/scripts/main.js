$(document).ready(function(){

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
    if ($("#projectors-index").length > 0) {
        projectorsLoop();
    }

    // Function that move the proses and verses from bottom to top with an infinite loop
    function projectorsLoop() {
        $('nav').css('z-index', 99999);
        var h_prose = $('.prose').height();
        $(".prose")
            .css({top:920,position:'fixed'})
            .animate({top: '-'+h_prose}, 130000, 'swing',
            function () {
                projectorsLoop()
            });
    }


    // Add the verse from the input to the modal if not empty
    $('#addVerse').on('click', function () {
        var verse = $('#verse').val();
        if (!verse)
        {
            $('#error').addClass("alert alert-danger alert-block")
            $('#error strong').html("Vous n'avez pas spécifié de vers !");
        } else {
            var modal = $('#exampleModalCenter')
            modal.modal("show")
            modal.find('.modal-body #modalVerse').text(verse)
            modal.find('.modal-body #verse').val(verse)
        }

      })


 });
