<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orestaurante extends CI_Controller {
    
    public function index(){
        
        $dados = array (
            'titulo' => 'O Restaurante',
            'mensagem' => 'Prezado cliente, essa página está em construção!',
        );
        
        $this->template->show('o_restaurante', $dados);
        
    }
    
}

