$(window).ready(function(){
    if($('#events').children('img').attr('alt') !== 'empty'){
        $('#events').removeClass('hidden');
    };

    if($('.imgEvent').attr('alt') !== "empty"){
        $('#buttonDeleteEvent').removeClass('hidden');
    } else {
        $('.imgEvent').addClass('hidden');
        $('.titleEvent').addClass('hidden');
    }
});

$('.buttons-administration').children('li').children('button').click(function (){
    var buttonId = $(this).attr('id');
    if($('#'+ buttonId + 'Div').hasClass('hidden')){
        $('#' + buttonId + 'Div').removeClass('hidden');
    } else {

    }
});