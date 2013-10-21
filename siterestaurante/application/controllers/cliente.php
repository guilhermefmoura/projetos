<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        //verifica se existe uma sessão ativa
        if(!$this->session->userdata('CLIENTE_AUT')){
            redirect('login');
        }
        
        $this->load->model('cliente_model', 'cliente');
    }

        public function atualizar(){
        
        $dados = elements(array('celular', 'telefone', 'email_cliente'), $this->input->post());
        $dados['cod_cliente'] = $this->session->userdata('cod_cliente');
        $this->cliente->update($dados);
        
    }
    
}
