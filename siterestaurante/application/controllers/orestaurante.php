<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orestaurante extends CI_Controller {
    
    public function index(){
        
        $dados = array (
            'titulo' => 'O Restaurante',
            'mensagem' => 'Prezado cliente, essa p�gina est� em constru��o!',
        );
        
        $this->template->show('o_restaurante', $dados);
        
    }
    
}

