$(document).ready(function(){

    //mascara dos campos
    $( "#txt-fechar-conta" ).datepicker().mask('00/00/0000');;
    $( "#txt-pagamento-conta" ).datepicker().mask('00/00/0000');
    $('#txt-valor-pago').mask("#.##0,00", {reverse: true, maxlength: false});
    
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
        
        var datafechamento = $('#txt-fechar-conta').val();
        
        if(!$.devValidacao.isDate(datafechamento)){
            
            $.devDialog.alert('Preencha o campo "Fechar conta até" com uma data válida!', 'Aviso');
            
            return false;
        }
        
        var datafechamento = $('#txt-pagamento-conta').val();
        
        if(!$.devValidacao.isDate(datafechamento)){
            
            $.devDialog.alert('Preencha o campo "Pago em" com uma data válida!', 'Aviso');
            
            return false;
        }
        
        var valorpagamento = $('#txt-valor-pago').val();
        
        if(!$.devValidacao.noEmpty(valorpagamento)){
            
            $.devDialog.alert('Preencha o campo "Valor Pago" corretamente!', 'Aviso');
            
            return false;
        }
        
        return true;
        
    }
});

