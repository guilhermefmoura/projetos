$(document).ready(function(){
        $( "#btn-pesquisar" ).click(function(){
            $.devAjax({
                    action: $.devUrlBase + "/cliente/buscar",
                    context: jQuery('#frmPesquisar'),
                    success: function(data) {
                        $('#tblClientes').html(data.html);
                    }
                });
                
                return false;
        });
        
        $('#icon-editar').click(function(){
            var codcliente = $('#icon-editar').attr('cliente');
            var url = 'cliente/editar/' + codcliente;
            window.location.href = url;
        });
        
//        $( "#txt-buscar" ).autocomplete({ 
//            source: function(request, response){
//                        
//                        $.ajax({
//                            url: "cliente/autocomplete/" + $('#txt-buscar').val(),
//                            dataType: "Json",
//                            type: 'POST',
//                            success: function(data) {
//                                response( $.map( data.myData, function( item ) {
//                                    return {
//                                        label: item.nome_cliente,
//                                        value: item.nome_cliente,
//                                        id: item.cod_cliente
//                                    }
//                                }));
//                            }
//                        });
//            },
//            select: function(event, ui){
//                $('#hidCodCliente').val(ui.item.id);
//            }
//        }).blur(function(){
//            if($( "#txt-buscar" ).val() == ''){
//                $('#hidCodCliente').val('');
//            }
//        });
    
    $('#btn-novo').click(function(){
        var url = 'cliente/novo';
        window.location.href = url;
    });
    
    $('#btn-editar').click(function(){
        var url = $('#btn-editar').attr('link');
        window.location.href = url;
    });
    
    $('#btn-visualizar-conta').click(function(){
        var url = $('#btn-visualizar-conta').attr('link');
        window.location.href = url;
    });
    
    $('#btn-pagamento').click(function(){
        var url = $('#btn-pagamento').attr('link');
        window.location.href = url;
    });
    
    $( "#accordion" ).accordion();
    
    $('.btn-desconto').fancybox({
                enableEscapeButton: true,
		fitToView	: false,
		autoSize	: true,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none',
                iframe : {
                    preload: true
                }
                
	});
    
    function validar(){
        
        var nome = $.trim($("#txt-nome").val());
        
        if(nome == '' || nome == null){
            
            $.devDialog.alert('Preencha o nome corretamente!', 'Aviso');
            return false;
        }
        
        return true;
    }
    
    $("#btn-salvar").click(function(){
        if(validar()){
            
            $.devAjax({
                action: $.devUrlBase + '/cliente/atualizar',
                context: jQuery('#frmCadastro'),
                success: function(response) {
                    if(!response.erro){
                        $.devDialog.alert(response.mensagem, 'Aviso');
                    }else{
                        $.devDialog.alert(response.mensagem, 'Aviso');
                    }
                }
            });
        }
        
        return false;
    });
    
    $(".conta").click(function(){
        
        var codconta = $(this).attr('codconta');
        
        $.devDialog.check(function(){
            $.devAjax({
                data: {
                    CODIGOCONTA: codconta
                },
                action: $.devUrlBase + '/cliente/excluirconta',
                success: function(response) {
                    if(!response.erro){
                        window.location.reload();
                    }else{
                        $.devDialog.alert(response.mensagem, 'Aviso');
                    }
                }
            });
        },function(){
            
        });
    });
    
    $('#btn-enviar-email').click(function(){
        
        $.devAjax({
           data: {
               EMAILINDIVIDUAL: 'S',
               CODCLIENTE: $('#btn-enviar-email').attr('codcliente')
           },
           action: $.devUrlBase + '/cliente/enviaremail',
           success: function(response){
                $.devDialog.alert(response.mensagem, 'Aviso');
           }
        });
        
    });
    
});

