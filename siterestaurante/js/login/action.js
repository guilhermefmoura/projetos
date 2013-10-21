$(document).ready(function(){
   $('input[name=btn-login]').button();
   
   $('#btn-login').click(function(){
       
       $.ajax({           
           send: $("#progress").progressbar({value: false}),
           url: '/login/index/acao/logar/',
           type: 'post',
           data: $('#frmlogin').serialize(),
           success: function(){
               //window.location = 'http://localhost/cliente/index';
           }
       });
       
   })
   
});


