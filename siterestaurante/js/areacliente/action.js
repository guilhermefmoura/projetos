$(document).ready(function(){
    $('#btnImprimirContaAtual')
    .button({
            icons: {
                primary: 'ui-icon-print'
            }
        });
   
   $('#btnEnviarPorEmail')
    .button({
            icons: {
                primary: 'ui-icon-mail-closed'
            }
        })
    .fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: true,
		closeClick	: false,
		openEffect	: 'elastic',
		closeEffect	: 'none'
                
	});
    
   
   $(".various").fancybox({
		fitToView	: false,
		autoSize	: true,
		closeClick	: false,
		openEffect	: 'elastic',
		closeEffect	: 'none',
                iframe : {
                    preload: false
                }
	});
        
    var icons = {
      header: "ui-icon-circle-arrow-e",
      activeHeader: "ui-icon-circle-arrow-s"
    };
    
    $("#accordion").accordion({
        icons: icons,
        heightStyle: "content"
    });
    
    $("#celular").mask("(99) 9999-9999");
    $("#telefone").mask("(99) 9999-9999");
     
});


