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
    $('.divToHide').addClass('hidden');
    $('.inputName').removeClass('hidden');
    if(buttonId === 'buttonDivers'){
        $('.inputName').addClass('hidden');
    }
    $('.' + buttonId + 'Div').removeClass('hidden');
});

function GetURLParameter(sParam) {
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++)
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] === sParam)
        {
            return sParameterName[1];
        }
    }
}

var backToTheDiv = GetURLParameter('div');
$('.' + backToTheDiv).removeClass('hidden');
if(backToTheDiv === 'buttonDiversDiv'){
    $('.inputName').addClass('hidden');
}

var menuButtonId = GetURLParameter('p');
if (!menuButtonId){
    $('#home').addClass('active');
}
$('#' + menuButtonId).addClass('active');