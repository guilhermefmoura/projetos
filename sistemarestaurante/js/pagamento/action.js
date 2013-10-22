$(document).ready(function(){
    $( "#txt-fechar-conta" ).datepicker();
    $( "#txt-pagamento-conta" ).datepicker();
    
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
            
            $.devDialog.alert('Preencha o campo "Fechar conta até" corretamente!', 'Aviso');
            
            return false;
        }
        
        var datafechamento = $('#txt-pagamento-conta').val();
        
        if(!$.devValidacao.isDate(datafechamento)){
            
            $.devDialog.alert('Preencha o campo "Pago em" corretamente!', 'Aviso');
            
            return false;
        }
        
        var valorpagamento = $('#txt-pagamento-conta').val();
        
        if(!$.devValidacao.noEmpty(valorpagamento)){
            
            $.devDialog.alert('Preencha o campo "Valor Pago" corretamente!', 'Aviso');
            
            return false;
        }
        
        return true;
        
    }
});

