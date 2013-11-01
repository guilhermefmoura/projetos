$(document).ready(function(){
    $('#btn-pesquisar').click(function(){
        
        var nome = $("#txt-buscar").val();
        
        $.devAjax({
           action: $.devUrlBase + '/registrarconta/buscarclientes',
           data: {
               NOME: nome
           },
           success: function(response){
               $("#tblClientes").html(response.HTML);
           }
        });
        
        return false;
    });
    
    $( "#txt-data-compra" ).datepicker();
    
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
    
    $('.btn-visualizar-conta').fancybox({
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
        
        $('.btn-editar').fancybox({
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
        
        $('.btn-produtos').fancybox({
                enableEscapeButton: true,
		fitToView	: false,
		autoSize	: true,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none',
                iframe : {
                    preload: true
                }
                
	}).button({
            icons: { primary: "ui-icon-grip-dotted-vertical" }
        });
});

