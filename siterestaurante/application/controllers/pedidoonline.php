<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedidoonline extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        //verifica se existe uma sessão ativa
        if(!$this->session->userdata('CLIENTE_AUT')){
            redirect('login');
        }
        
    }

        public function index(){
        
        $dados = array(
            'titulo'    => 'Pedido Online'
        );
        
        $this->template->show('pedido_online', $dados);
        
    }
    
}
