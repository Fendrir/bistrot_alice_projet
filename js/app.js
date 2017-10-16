$(window).ready(function(){
    if($('#events').children('img').attr('alt') !== 'empty'){
        $('#events').removeClass('hidden');
    };

    if($('#titleEvent').html() !== "Pas d'évènement"){
        $('#buttonDeleteEvent').removeClass('hidden');
    } else {
        $('.imgEvent').addClass('hidden');
    }
});
