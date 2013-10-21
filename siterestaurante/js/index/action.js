$(document).ready(function(){
   $('input[name=btn-login]').button();
   
   $("tbody tr:not(.sub)").hide();
   
   $(".sub").click(function(){
       
   });
    
   $('#btn-login').click(function(){
       
       $.ajax({           
           send: $("#progress").progressbar({value: false}),
           url: '/login/index/acao/logar/',
           type: 'post',
           data: $('#frmlogin').serialize(),
           success: function(){
               //$('#progress').text('');
               //window.location = 'http://localhost/cliente/index';
           }
       });
       
   });
   
  
   
});


