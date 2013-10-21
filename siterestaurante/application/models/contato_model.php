<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contato_model extends CI_Model {
    
    public function gravaContato($dados){
        
        //alterando o timezone
        date_default_timezone_set('America/Sao_Paulo');
        
        $data = array (
            'nome'              => $dados['txt_nome'],
            'assunto'           => $dados['txt_assunto'],
            'email'             => $dados['txt_email'],
            'dsc_mensagem'      => $dados['txt_mensagem'],
            'mensagem_error'    => $dados['mensagem_error'],
            'dat_operacao_log'  => date('Y-m-d H:i:s')
        );
        $this->db->insert('registro_contato', $data); 
        
    }
    
}