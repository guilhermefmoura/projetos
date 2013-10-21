$(document).ready(function(){
    $('#btn-pesquisar').click(function(){
        var cliente = $('#hidden-intCliente').val();
        cliente = true;
        if(cliente){   
            $.devDialog.wait.open();
            
            var url = 'registrarconta/adicionar/' + cliente;
            window.location.href = url;
            
        }else {
            $.devDialog.alert('Selecione um cliente', 'Aviso');
            return false;
        }
    });
    
    $( "#txt-data-compra" ).datepicker();
    
});

