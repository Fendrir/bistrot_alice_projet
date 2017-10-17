$(window).ready(function(){
    if($('#events').children('img').attr('alt') !== 'empty'){
        $('#events').removeClass('hidden');
    };

    if($('.imgEvent').attr('alt') !== "empty"){
        $('#buttonDeleteEvent').removeClass('hidden');
    } else {
        $('.imgEvent').addClass('hidden');
    }
});