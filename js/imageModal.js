//Click on stuff with .myImg class will launch the function
$('.myImg').click(function () {
    //Showing the block with .myModal id
    $('#myModal').css("display", "block");
    //Setting the #imgModal source with the source of block we just clicked
    $('#imgModal').attr('src', $(this).attr('src'));
    //Getting the alt of block we clicked to push it in block with .caption class
    $('#caption').html($(this).attr("alt"));
});

//When clicking on block with .close class, launch the function
//P.s : it's .closeImg because if you use bootstraps (and maybe other frameworks)
//There's already a .close class
$('.closeImg').click(function () {
    //Hiding the block with .myModal class
    $('#myModal').css("display", "none");
});

//You can eventually put the whole code in a function :)