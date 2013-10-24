$(document).ready(function(){
    $('#btn-novo').click(function(){
        var url = 'empresa/nova';
        window.location.href = url;
    });
    
    $('#btn-visualizar-conta').click(function(){
        var url = $('#btn-visualizar-conta').attr('link');
        window.location.href = url;
    });
    
    $('#btn-editar').click(function(){
        var url = $('#btn-editar').attr('link');
        window.location.href = url;
    });
    
    $('#btn-pagamento').click(function(){
        var url = $('#btn-pagamento').attr('link');
        window.location.href = url;
    });
    
    $('#btn-visualizar-funcionarios').click(function(){
        var url = $('#btn-visualizar-funcionarios').attr('link');
        window.location.href = url;
    });
    
    $('#accordion').accordion();
    
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
    
});

