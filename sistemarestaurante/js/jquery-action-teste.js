(function($) {
    
    $('body').append('<div id="progressbar"><div class="progress-label"></div></div>');
    var progressbar = $( "#progressbar" );
    var progressLabel = $( ".progress-label" );
    
    progressbar.dialog({
        title: 'Aguarde...',
        autoOpen: true,
        modal: true,
        closeOnEscape: false,
        draggable: false,
        resizable: false,
        height: 80
    });
    
    progressbar.progressbar({
        value: false
    });
    
    /* Remove o botão fechar do dialog */
    progressbar.prev('.ui-dialog-titlebar').find('.ui-dialog-titlebar-close').remove(); 
    
    var stateProgressBar = null;
    
    var moveProgressBar = function() {
    }
    
    $.devDialog = {
        wait: {
            open : function(){
                stateProgressBar = moveProgressBar();
                progressbar.dialog('open');
                //alert('aaaa');
            },
            close : function(){
                progressbar.dialog('close');
                clearInterval(stateProgressBar);
            }
        }
    }
    
})(jQuery);

