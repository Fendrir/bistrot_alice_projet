//Quand la fenêtre est chargée
$(window).ready(function(){
    //Si <img alt> de #events !== 'empty' on retire la class hidden
    if($('#events').children('img').attr('alt') !== 'empty'){
        $('#events').removeClass('hidden');
    };

    //Si alt de .imgEvent !== empty on retire la class hidden au bouton #buttonDeleteEvent
    //Sinon on cache .imgEvent et .titleEvent
    if($('.imgEvent').attr('alt') !== "empty"){
        $('#buttonDeleteEvent').removeClass('hidden');
    } else {
        $('.imgEvent').addClass('hidden');
        $('.titleEvent').addClass('hidden');
    }
});

//Au click sur les buttons dans <li> de <ul .buttons-administration>
$('.buttons-administration').children('li').children('button').click(function (){
    //On récupère l'id du bouton cliqué et on le stock dans une variable
    var buttonId = $(this).attr('id');
    //On ajoute hidden à toutes les <div .divToHide>
    $('.divToHide').addClass('hidden');
    //On retire les hiddens à tous les <input .inputName>
    $('.inputName').removeClass('hidden');
    //Si l'id du button === buttonDivers, on ajoute la classe hidden à <input .inputName>
    if(buttonId === 'buttonDivers'){
        $('.inputName').addClass('hidden');
    }
    //On retire la classe hidden à la div contenant l'id du button + 'Div' (ex : buttonPrez > buttonPrezDiv)
    $('.' + buttonId + 'Div').removeClass('hidden');
});

//fonction de récupération de donnée dans l'URL
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

//Stockage de la récupération du paramètre 'div' de l'URL dans une variable (équivalent à un $_GET PHP)
var backToTheDiv = GetURLParameter('div');
//On retire la class hidden à la div contenant la même classe que la récupération du paramètre précédent
$('.' + backToTheDiv).removeClass('hidden');
//Si la récupération est égale à buttonDiversDiv, on cache les <input .inputName>
if(backToTheDiv === 'buttonDiversDiv'){
    $('.inputName').addClass('hidden');
}

//On se sert de ce même système pour ajouter la classe .active aux button du menu en se servant de leurs ID
var menuButtonId = GetURLParameter('p');
//Si le visiteur vient d'arriver sur le site, 'p' ne sera pas égal à home, donc on set active manuellement
if (!menuButtonId){
    $('#home').addClass('active');
}
$('#' + menuButtonId).addClass('active');