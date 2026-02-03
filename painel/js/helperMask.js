$(function(){
    $('[name=cpf]').mask('999.999.999-99');
    $('[name=cnpj]').mask('99.999.999/9999-99');
    $('[name=data]').mask('99-99-99');
    $('[name=dataD]').mask('99-99-99');
    $('[name=dataT]').mask('99-99-99');
    $('[name=dataQ]').mask('99-99-99');
    $('[name=dataC]').mask('99-99-99');
    $('[name=busca]').mask('9999-99-99');
    $('[name=hora]').mask('99:99');
    $('[name=product_price]').maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
    $('[name=preco]').maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
    
   $('[name=tipo]').change(function(){
        var val = $(this).val();
        if(val == 'fisico'){
            $('[name=cpf]').parent().show();
            $('[name=cnpj]').parent().hide();
        }else{
            $('[name=cpf]').parent().hide();
            $('[name=cnpj]').parent().show();
        }
   });
   
})

