$(document).ready(function(){

    //mascara dos campos
    $( "#txt_fechar_conta" ).datepicker().mask('00/00/0000');;
    $( "#txt_pagamento_conta" ).datepicker().mask('00/00/0000');
    $('#txt_valor_pago').mask("#.##0,00", {reverse: true, maxlength: false});
    
    $('#btn-calcular').button({
        icons: { primary: "ui-icon-search" }
    }).css({
        "width": '35px', 
        "height": '35px'
    }).click(function(){
            var dataconta = $('#txt_fechar_conta').val();
            var codcliente = $('#codcliente').val();
            var tpocliente = $('#tipocliente').val();
            $.devAjax({
                action: $.devUrlBase + "/pagamento/calcular",
                data:{
                    DATACONTA: dataconta,
                    TPOCLIENTE: tpocliente,
                    CODCLIENTE: codcliente
                } ,
                success: function(data) {
                    $('#txt_valor_conta').val(data.val_conta);
                }
            });
        
        return false;
    });
    
    $('#btn-salvar').click(function(){
        
        if(validar()){
            
            $.devAjax({
                    action: $.devUrlBase + "/pagamento/conta",
                    context: jQuery('#frmCadastro'),
                    success: function(data) {
                        $.devDialog.alert(data.mensagem, 'Aviso');
                    }
                });
            
        }
        return false;
    });
    
    function validar(){
        
        var datafechamento = $('#txt_fechar_conta').val();
        
        if(!$.devValidacao.isDate(datafechamento)){
            
            $.devDialog.alert('Preencha o campo "Fechar conta até" com uma data válida!', 'Aviso');
            
            return false;
        }
        
        var datafechamento = $('#txt_pagamento_conta').val();
        
        if(!$.devValidacao.isDate(datafechamento)){
            
            $.devDialog.alert('Preencha o campo "Pago em" com uma data válida!', 'Aviso');
            
            return false;
        }
        
        var valorpagamento = $('#txt_valor_pago').val();
        
        if(!$.devValidacao.noEmpty(valorpagamento)){
            
            $.devDialog.alert('Preencha o campo "Valor Pago" corretamente!', 'Aviso');
            
            return false;
        }
        
        return true;
        
    }
});

