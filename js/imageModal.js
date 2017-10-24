//Lors d'un click sur une image (ici, pour la bannière d'event en particulier)
$('img').click(function(){
    //Si l'image a la class .events
    if ($(this).hasClass('events')){
        // Pop du modal
        $('#myModal').css("display", "block");
        // Récupération de l'image via le alt
        $('#imgModal').attr('src', $(this).attr('alt'));
        // Reset du sous-titre de l'image
        $('#caption').html('');
    }
});

//Lors d'un click sur une image de plat
$('.hvrbox').click(function(){
    //Variable qui cible <img> dans <div> dans <div .hvrbox>
    var image = $(this).children('div').children('img');
    //Si l'img a la class .myImg
    if(image.hasClass('myImg')){
        // Pop du modal
        $('#myModal').css("display", "block");
        // Affichage de l'image
        $('#imgModal').attr('src', image.attr('src'));
        // Affichage du nom du plat dans le sous-titre de l'image
        $('#caption').html(image.attr("alt"));
    }
});

// Fermeture du modal lors d'un clic sur l'écran (sur la div globale du modal)
$('.closeImg').click(function () {
    $('#myModal').css("display", "none");
});