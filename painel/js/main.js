

$(function(){

    var open = true;
    var windowSize = $(window)[0].innerWidth;


    $('.menu-btn').click(function(){
    
        if(open){
            $('.menu').animate({'width':'0','padding':'0',},function(){
                open = false;
            });

           $('.content,header').css('width','100%');
           $('.content,header').animate({'left':0,},function(){
            open = false;
            });
        }else{

            $('.menu').animate({'width':'250px','padding-top':'10px'},function(){
                open = true;
            });

            if(windowSize > 768)
				$('.content,header').css('width','calc(100% - 250px)');
				$('.content,header').animate({'left':'250px'},function(){
				open = true;
		    });

        }

    });


    //FUNÇÂO ANTIGA COM BUG
    /*var open = true;
    var windowSize = $(window)[0].innerWidth;
    var targetSizeMenu = (windowSize <= 400) ? 200 : 300;*/

    /*if(windowSize <= 768){
        $('.menu').css('width','0').css('padding','0');
        open = false;
    }

    $('.menu-btn').click(function(){
        if(open){
            $('.menu').animate({'width':'0','padding':'0',},function(){
                open = false;
            });
            $('.content,header').css('width','100%');
            $('.content,header').animate({'left':0,},function(){
                open = false;
            });
        }else{
            $('.menu').css('display','block');
            $('.menu').animate({'width':targetSizeMenu+'px','padding-left':'0'},function(){
                
                open = true;
            });
            if(windowSize > 768)
				$('.content,header').css('width','calc(100% - 266px)');
				$('.content,header').animate({'left':targetSizeMenu+'px'},function(){
				open = true;
			});


           // $('.content,header').css('width','calc(100% - 300px)');
            //$('.content,header').animate({'left':targetSizeMenu+'px'},function(){
              //  open = true;
            //});
        }
    })
*/


    $(window).resize(function(){
		windowSize = $(window)[0].innerWidth;
		if(windowSize <= 768){
            $('.menu').css('width','0').css('padding','0');
            $('.content,header').css('width','100%').css('left','0');
            open = false;
        }
            targetSizeMenu = (windowSize <= 400) ? 200 : 250;
	})

    $('[formato=data]').mask('99/99/9999'); // server para dar formato aos input date precisa baixar o jquery.mask para usar



    $('[actionBtn=delete]').click(function(){ // serve para avisar se o usuario deseja mesmo deletar 
        var txt;
        var r = confirm("Deseja excluir o registro?");
        if (r == true) {
            return true;
        } else {
            return false;
        }
})





$('.daq').click(function(e){
    e.preventDefault();
    
    var el = $(this).parent().parent();
    var id = $(this).attr('Id');
    

    $.ajax({
          url:include_path+'/ajax/forms.php',
          data:{Id:id,tipo_acao:'del-servic'},
          method:'post'
    }).done(function(){
        el.fadeOut();
    })
    
})



$('.daqi').click(function(e){
    e.preventDefault();
    
    var el = $(this).parent().parent();
    var id = $(this).attr('Id');
    var imagem = $(this).attr('imagem');

    $.ajax({
          url:include_path+'/ajax/forms.php',
          data:{Imagem:imagem,Id:id,tipo_acao:'del-barbeiro'},
          method:'post'
    }).done(function(){
        el.fadeOut();
    })
    
})



$('.Imah').click(function(e){
   
    e.preventDefault();

    var el = $(this).parent().parent();
    var imagem = $(this).attr('Imag');

    $.ajax({
          url:include_path+'/ajax/forms.php',
          data:{Imagem:imagem,tipo_acao:'del-ImagBarb'},
          method:'post'
    }).done(function(){
        el.fadeOut();
    })
    
})



$('.Ativ').click(function(e){
   
    e.preventDefault();


    $.ajax({
          url:include_path+'/ajax/forms.php',
          data:{tipo_acao:'atv-sab'},
          method:'post'
    })
    
})

$('.Desatv').click(function(e){
   
    e.preventDefault();


    $.ajax({
          url:include_path+'/ajax/forms.php',
          data:{tipo_acao:'dstv-sab'},
          method:'post'
    })
    
})

$('.Desatv-domig').click(function(e){
   
    e.preventDefault();


    $.ajax({
          url:include_path+'/ajax/forms.php',
          data:{tipo_acao:'dstv-doming'},
          method:'post'
    })
    
})



$('.Ativ-domig').click(function(e){
   
    e.preventDefault();


    $.ajax({
          url:include_path+'/ajax/forms.php',
          data:{tipo_acao:'ativa-doming'},
          method:'post'
    })
    
})


$('.AtuAl').click(function(){
    var atua = setTimeout(function() {
    
    history.go(0);
    });
    
})


setTimeout(function(){
    $('.Swiu').hide();
},2000);

$('.Deltd').click(function(){
    var atua = setTimeout(function() {
    
    history.go(0);
    });
    
})

$('.Deltd').click(function(e){
   
    e.preventDefault();


    $.ajax({
          url:include_path+'/ajax/forms.php',
          data:{tipo_acao:'Del-tud'},
          method:'post'
    })
    
})



$('.Cancel').click(function(e){
   
    e.preventDefault();

    var el = $(this).parent().parent();
    var id = $(this).attr('id');

    $.ajax({
          url:include_path+'/ajax/forms.php',
          data:{Id:id,tipo_acao:'del-reserV'},
          method:'post'
    }).done(function(){
        el.fadeOut();
    })
    
})



$('.daqik').click(function(e){
    e.preventDefault();
    
    var el = $(this).parent().parent();
    var id = $(this).attr('Id');
    var imagem = $(this).attr('imagem');

    $.ajax({
          url:include_path+'/ajax/forms.php',
          data:{Imagem:imagem,Id:id,tipo_acao:'del-Usuario'},
          method:'post'
    }).done(function(){
        el.fadeOut();
    })
    
})


});

function mostrarSenhaPainel(){
    var inptuPassPa = document.getElementById('sENhA');
    var bntShowPa = document.getElementById('Btn_SenHa');

    if(inptuPassPa.type === 'password'){
        inptuPassPa.setAttribute('type','text')
        bntShowPa.classList.replace('bi-eye-slash','bi-eye')
    }else{
        inptuPassPa.setAttribute('type','password')
        bntShowPa.classList.replace('bi-eye','bi-eye-slash')
    }

}


function MudeSenhaj(){
    var inptuPassMd = document.getElementById('PasI');
    var bntShowMd = document.getElementById('Btj_passi');

    if(inptuPassMd.type === 'password'){
        inptuPassMd.setAttribute('type','text')
        bntShowMd.classList.replace('bi-eye-slash','bi-eye')
    }else{
        inptuPassMd.setAttribute('type','password')
        bntShowMd.classList.replace('bi-eye','bi-eye-slash')
    }

}
