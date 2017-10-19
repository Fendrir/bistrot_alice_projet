//Click on stuff with .myImg class will launch the function
$('img').click(function(){
    if($(this).hasClass('myImg')){
        //Showing the block with .myModal id
        $('#myModal').css("display", "block");
        //Setting the #imgModal source with the source of block we just clicked + Caption
        $('#imgModal').attr('src', $(this).attr('src'));
        $('#caption').html($(this).attr("alt"));
    } else if ($(this).hasClass('events')){
        // Showing the block with .myModal id
        $('#myModal').css("display", "block");
        //Setting the #imgModal source with the source of block we just clicked
        $('#imgModal').attr('src', $(this).attr('alt'));
        //Getting the alt of block we clicked to push it in block with .caption class
    }
});

$('.hvrbox').click(function(){
    var image = $(this).children('div').children('img');
    console.log(image)
    if(image.hasClass('myImg')){
        //Showing the block with .myModal id
        $('#myModal').css("display", "block");
        //Setting the #imgModal source with the source of block we just clicked + Caption
        $('#imgModal').attr('src', image.attr('src'));
        $('#caption').html(image.attr("alt"));
    } else if (image.hasClass('events')){
        // Showing the block with .myModal id
        $('#myModal').css("display", "block");
        //Setting the #imgModal source with the source of block we just clicked
        $('#imgModal').attr('src', image.attr('alt'));
        //Getting the alt of block we clicked to push it in block with .caption class
    }
});

//When clicking on block with .close class, launch the function
//P.s : it's .closeImg because if you use bootstraps (and maybe other frameworks)
//There's already a .close class
$('.closeImg').click(function () {
    //Hiding the block with .myModal class
    $('#myModal').css("display", "none");
});

//You can eventually put the whole code in a function :)