$(document).ready(function(){
    
    $('button').button({
        icons: { primary: "ui-icon-grip-dotted-vertical" }
    });
    
    $('#btn-pesquisar').button({
        icons: { primary: "ui-icon-search" }
    });
    
    $('#btn-novo').button({
        icons: { primary: "ui-icon-plus" }
    });
    $('#btn-salvar').button({
        icons: { primary: "ui-icon-disk" }
    });
    $('#btn-sair').button({
        icons: { primary: "ui-icon-power" }
    });
    
    $('#btn-editar').button({
        icons: { primary: "ui-icon-pencil" }
    });
    
    $('#btn-voltar').button({
        icons: { primary: "ui-icon-arrow-1-w" }
    });
    
    $('#btn-enviar-email').button({
        icons: { primary: "ui-icon-mail-open" }
    });
    
    $('#btn-imprimir').button({
        icons: { primary: "ui-icon-print" }
    });
    
    $('#btn-pagamento').button({
        icons: { primary: "ui-icon-calculator" }
    });
    
    $('#btn-visualizar-conta').button({
        icons: { primary: "ui-icon-document" }
    });
    
    $('#btn-redefinir-senha').button({
        icons: { primary: "ui-icon-key" }
    });
    
    $('#btn-desconto').button({
        icons: { primary: "ui-icon-minus" }
    });
    
    $('#btn-credito').button({
        icons: { primary: "ui-icon-check" }
    });
    
    $('#btn-adicionar').button({
        icons: { primary: "ui-icon-plus" }
    });
    
    $('#btn-cancelar').button({
        icons: { primary: "ui-icon-close" }
    });
    
    $('#btn-entrar').button();
    
    $(document).bind('keypress', function(e) {
            var code = (e.keyCode ? e.keyCode : e.which);
            if (code === 13) {
                $("#btn-entrar").trigger("click");
            }
//        alert(code);
        });
    
});

