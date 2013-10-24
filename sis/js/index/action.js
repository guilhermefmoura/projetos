$(document).ready(function(){
    
    $('#txt-usuario').focus();
    
    $('#btn-entrar').click(function(){
        var usuario = $.trim($("input[name=txt-usuario]").val());
        var senha = $.trim($("input[name=txt-senha]").val());
        
        if(usuario && senha){
            $.devAjax({
                action: $.devUrlBase + '/login/entrar',
                context: jQuery('#frmLoginSistema'),
                success: function(response) {
                    if(!response.erro){
                        window.location.href = response.link;
                    }else{
                        $.devDialog.alert(response.mensagem, 'Aviso');
                    }
                }
            });
        }else{
            var erro = 'Preencha o usuário e senha corretamente';
        }
        
        if(erro){
            $.devDialog.alert(erro, 'Aviso');
        }
    }) 
});


