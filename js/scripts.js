$(function(){

    $('.ButTun').click(function(){
        
        var listaMenu = $('nav.NaVe1 ul');

        if(listaMenu.is(':hidden') == true){
            var icone = $('.ButTun').find('i');
            icone.removeClass('bi bi-justify');
            icone.addClass('bi bi-x-lg');
            listaMenu.slideToggle();
        }else{
            var icone = $('.ButTun').find('i');
            icone.removeClass('bi bi-x-lg');
            icone.addClass('bi bi-justify');
            listaMenu.slideToggle();
        }

    });

})